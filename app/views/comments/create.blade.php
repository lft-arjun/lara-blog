
<?php $post_id?>
{{ Form::open(['route'=>['comment.store']]) }}
{{ Form::hidden('post_id', $post_id) }}
<div class="row">
    <div class={{{ empty($errors->has('body')) ? 'form-group' : 'has-error'  }}}>
        {{ Form::label('body','Comment:') }}
        {{ Form::textarea('body',Input::old('body'),['rows'=>5 , 'class' => 'form-control', 'id' => 'comment-body']) }}
        <div>{{{($errors->has()) ? $errors->first('body') : '' }}}</div>
    </div>
</div>
<div class="row">
    <div class="form-group">
    {{ Form::submit('Post',['class'=>'btn btn-primary']) }}
    </div>
</div>
{{ Form::close() }}

