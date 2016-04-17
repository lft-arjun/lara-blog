
<?php $post_id?>
{{ Form::open(['route'=>['comment.store']]) }}
{{ Form::hidden('post_id', $post_id) }}
<div class="row">
    <?php $bodyE = $errors->first('body'); ?>
    <div class={{{ empty($bodyE) ? 'form-group' : 'has-error'  }}}>
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

