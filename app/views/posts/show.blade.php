@extends('layouts.master')

@section("content")
	<div class="row">
	    <div class="col-sm-12">
		        <?php 
		        	$comments = $post->comments;
		        	$id = $post->id;
		        ?>
		        <h2><a href="#">{{ $post->title }}</a></h2>
		        <p class="lead">by <a href="#">{{ $post->author->first_name . '&nbsp;' .$post->author->last_name }}</a></p>
		        <p><span class="glyphicon glyphicon-time"></span> Posted on {{date('Y-m-d H:s', strtotime($post->created_at))}} &nbsp;<span class="glyphicon glyphicon-comment"></span>&nbsp; {{{ (count($comments->toArray()) !== 0) ? count($comments->toArray()).' Comments' : '0 Comment' }}}  </p>
		        <hr/>
		        <!-- show only incase of image uploaded -->
		        @if($post->image)
		            <img class="img-responsive img-thumbnail" src="{{'/uploads/'.$post->image}}"  alt="">
		            <hr/>
	            @endif
	            <p>{{ $post->body }}</p>
	             <hr/>
	            @include('comments.create', array('post_id'=> $id))
	            @foreach ($comments as $row)
	            	<p><strong>{{$row->author->first_name . '&nbsp;' .$row->author->last_name}}</strong>&nbsp;<span>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($row->created_at))->diffForHumans()}}</span></p>
	            	<p>{{$row->body}}</p>
	            	<!-- Allow edit only comment author -->
	            	@if(Auth::check())
		            	@if(Auth::User()->id === $row->author->id)
		            		@if(\Carbon\Carbon::createFromTimeStamp(strtotime($row->created_at))->diffInSeconds() === 30)
				            	<span class="pull-right">{{HTML::linkRoute('comment.destroy','',$row->id,array('class' => 'delete glyphicon glyphicon-remove', 'id'=>'comment-'. $row->id) )}}</span>
		            		@endif
		            	@endif
	            	@endif
	            	<br/>
	            @endforeach
	            
	    </div>
	</div>

@stop