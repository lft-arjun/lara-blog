@extends('layouts.master')

@section("content")
	<div class="row">
	    <div class="col-sm-12">
		        <?php 
		        	$comments = $post->comments;
		        	$id = $post->id;
		        ?>
		        <h2><a href="#">{{ $post->title }}</a></h2>
		        <p class="lead">by <a href="#">{{ $post->author->first_name }}</a></p>
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
	            	<p>{{$row->author->first_name}}&nbsp;<span>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($row->created_at))->diffForHumans()}}</span></p>
	            	<p>{{$row->body}}</p>
	            	<p>
	            	<!-- Allow edit only comment author -->
	            	@if(Auth::check())
		            	@if(Auth::User()->id === $row->author->id)
		            		@if(\Carbon\Carbon::createFromTimeStamp(strtotime($row->created_at))->diffInSeconds() == 20)
				            	<span>{{HTML::linkRoute('comment.destroy','Delete',$row->id,array('class' => 'delete', 'id'=>'comment-'. $row->id) )}}</span>
				            	<span>{{HTML::linkRoute('comment.edit','Edit',$row->id, array('class' => 'test', 'id'=>'comment-'. $row->id))}}</span>

		            		@endif
		            	@endif
	            	@endif
	            	</p>
	            	<br/>
	            @endforeach
	            
	    </div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(event) {
			$('.delete').click(function(event) {

				event.preventDefault();
				var ids = $(this).attr('id');
				var id = ids.split("-").pop();
				var url = 'http://localhost:8000/comment/'+ id +'/delete';
				ajaxCall(url);
			});
			$('.test').click(function(event) {

				event.preventDefault();
				var ids = $(this).attr('id');
				var id = ids.split("-").pop();
				var url = 'http://localhost:8000/comment/'+ id +'/show';
				ajaxCall(url);
			});
		});

		function ajaxCall(url) {
			$.ajax({
					url: url,
					data: {
					 format: 'json'
					},
					error: function(error) {
				      console.log(error);
					},
		
					success: function(data) {
						location.reload();
						$('#comment-body').val(data.comment);
					},
					type: 'GET'
			   });
		}
	</script>
@stop