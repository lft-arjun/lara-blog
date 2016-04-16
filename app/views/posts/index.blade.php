@extends('layouts.master')

@section("content")

	@foreach($posts as $post)
	     <div class="row">
	    <div class="col-sm-12">
	        <div class="thumbnail">

	         
	            <div class="caption">
	                <p>{{ $post->title }}</p>
	                <p>{{ $post->body }}</p>
	                <p>{{ $post->created_at}}</p>
	                <p>{{HTML::linkRoute('post.edit','Edit',$post->id)}}</p>
	                <p>{{HTML::linkRoute('post.delete','Delete',$post->id)}}</p>
	                <p>{{HTML::linkRoute('post.show','View',$post->id,['target'=>'_blank'])}}</p>
	            </div>
	        </div>
	    </div>
	</div>
	@endforeach

@stop
