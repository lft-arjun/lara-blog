@extends('layouts.master')

@section("content")

	@foreach($posts as $key => $post)
	     <div class="row">
	    <div class="col-sm-12">
	        <div class="thumbnail">
	        	<?php $comments = $post->comments ;?>
	         
	            <div class="caption">
	                <p><h1>{{ $post->title }}</h1></p>
	                <p>Author: {{ $post->author->first_name }}<br/>Published:{{date('Y-m-d', strtotime($post->created_at))}}</p>
	                <p>{{ $post->body }}</p>
	                <p>{{HTML::linkRoute('post.edit','Edit',$post->id)}}</p>
	                <p>{{HTML::linkRoute('post.delete','Delete',$post->id)}}</p>
	                <p>{{HTML::linkRoute('post.show','View',$post->id,['target'=>'_blank'])}}</p>
	            </div>
	            <p>{{{ (count($comments->toArray()) !== 0) ? count($comments->toArray()).' Comments' : '0 Comment' }}} </p>
	            <hr/>
	            @include('comments.create')
	            @foreach ($comments as $row)
	            	<p>{{$row->author->first_name}}</p>
	            	<p>{{$row->body}}</p>
	            	<br/>
	            @endforeach
	        </div>
	    </div>
	</div>
	@endforeach

@stop
