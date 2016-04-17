@extends('layouts.master')

@section("content")
<table class="table table-striped">
    <thead>
    <tr>
        <th>Comment</th>
        <th>Comment By</th>
        <th>Post Title</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($comments as $comment)
    <tr>
        <td>{{{$comment->body}}}</td>
        <td>{{{$comment->author->first_name}}}</td>
        <td>{{{$comment->post->title}}}</td>
        <td>
            <!-- {{HTML::linkRoute('comment.edit','Edit',$comment->id, array('class' => 'btn btn-primary btn-sm'))}} -->
            {{HTML::linkRoute('comment.delete','Delete',$comment->id, array('class' => 'btn btn-danger btn-sm'))}}
        </td>
        
    </tr>
    @endforeach
    </tbody>
</table>
<div style="float:right" >
    {{$comments->appends(array('sort' => 'body'))->links()}}
</div>
@stop