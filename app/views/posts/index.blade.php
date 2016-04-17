@extends('layouts.master')

@section("content")

	<div class="row">
	    <div class="col-sm-12">
		@foreach($posts as $key => $post)
	        <?php $comments = $post->comments ;?>
	        <h2><a href="{{ URL::route('post.show', $post->id) }}">{{ $post->title }}</a></h2>
	        <p class="lead">by <a href="#">{{ $post->author->first_name . '&nbsp;'.$post->author->last_name }}</a></p>
	        <p><span class="glyphicon glyphicon-time"></span> Posted on {{date('F j, Y, g:i a', strtotime($post->created_at))}} &nbsp;<span class="glyphicon glyphicon-comment"></span>&nbsp; {{{ (count($comments->toArray()) !== 0) ? count($comments->toArray()).' Comments' : '0 Comment' }}}  </p>
	        <hr/>
	        <!-- show only incase of image uploaded -->
	        @if($post->image)
            	<img class="img-responsive img-thumbnail" src="{{'/uploads/'.$post->image}}"  alt="">
            	<hr/>
            @endif
            <p>{{ Str::limit($post->body, 225) }}</p>
            @if(strlen ($post->body) > 225)
            <a class="btn btn-primary" href="{{ URL::route('post.show', $post->id) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            @endif
            <hr>
	            
		@endforeach
	    </div>
	</div>
	<div style="float:right" >
    	{{$posts->appends(array('sort' => 'id'))->links()}}
	</div>

@stop
