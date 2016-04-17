@extends('layouts.master')

@section("content")
{{HTML::linkRoute('posts.create','Add New Post', null, array('class' => 'btn btn-primary btn-sm pull-right'))}}
<table class="table table-striped">
    <thead>
    <tr>
        <th>Title</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
    <tr>
        <td>{{{$post->title}}}</td>
        <td>
            {{HTML::linkRoute('post.edit','Edit',$post->id, array('class' => 'btn btn-primary btn-sm'))}}
            {{HTML::linkRoute('post.delete','Delete',$post->id, array('class' => 'btn btn-danger btn-sm'))}}
        </td>
        
    </tr>
    @endforeach
    </tbody>
</table>
<div style="float:right" >
    {{$posts->appends(array('sort' => 'title'))->links()}}
</div>
@stop