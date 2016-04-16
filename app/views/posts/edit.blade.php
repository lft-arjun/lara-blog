
@extends('layouts.master')

@section('content')
<h2 class="new-post">
    Add New Post
    <span class="right">{{ HTML::link('admin/dash-board','Cancel',['class' => 'button tiny radius']) }}</span>
</h2>
<hr>
{{ Form::model($post, array('method' => 'PATCH', 'route' => array('post.update', $post->id))) }}
<div class="row">
    <?php $titleE = $errors->first('title'); ?>
    <div class={{{ empty($titleE) ? 'form-group' : 'has-error'  }}}>
        {{ Form::label('title','Title:') }}
        {{ Form::text('title',Input::old('title'), ['placeholder' => 'Post Title', 'class' => 'form-control']) }}
        <div>{{$errors->first('title')}}</div>
    </div>
</div>
<div class="row">
    <?php $bodyE = $errors->first('body'); ?>
    <div class={{{ empty($bodyE) ? 'form-group' : 'has-error'  }}}>
        {{ Form::label('body','Content:') }}
        {{ Form::textarea('body',Input::old('body'),['rows'=>5 , 'class' => 'form-control']) }}
        <div>{{{($errors->has()) ? $errors->first('body') : '' }}}</div>
    </div>
</div>
<div class="row">
    <?php $activeE = $errors->first('is_active'); ?>
    <div class={{{ empty($activeE) ? 'form-group' : 'has-error'  }}}>
        {{ Form::label('is_active','Publish:') }}
        {{ Form::checkbox('is_active', Input::old('is_active')); }}
        <div>{{{($errors->has()) ? $errors->first('is_active') : '' }}}</div>
    </div>
</div>
<div class="row">
    <div class="form-group">
    {{ Form::submit('Post',['class'=>'btn btn-primary']) }}
    </div>
</div>
{{ Form::close() }}
@stop

