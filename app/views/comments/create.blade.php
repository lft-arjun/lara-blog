

{{ Form::open(['route'=>['comment.store']]) }}
<div class="row">
    <?php $bodyE = $errors->first('body'); ?>
    <div class={{{ empty($bodyE) ? 'form-group' : 'has-error'  }}}>
        {{ Form::label('body','Comment:') }}
        {{ Form::textarea('body',Input::old('body'),['rows'=>5 , 'class' => 'form-control']) }}
        <div>{{{($errors->has()) ? $errors->first('body') : '' }}}</div>
    </div>
</div>
<div class="row">
    <div class="form-group">
    {{ Form::submit('Post',['class'=>'btn btn-primary']) }}
    </div>
</div>
{{ Form::close() }}

