@extends('layouts.master')

@section('content')

<h1>Create User</h1>

    {{ Form::open(array('route' => 'users.store')) }}
        <div  class={{{ empty($errors) ? 'has-error' : 'form-group' }}} >
            {{ Form::label('first_name', 'Fist Name:*', array('class' => '')) }}
                {{ Form::text('first_name', Input::old('first_name'),  array('placeholder'=>'Name', 'class'=> 'form-control')) }}
            <span class="help-inline">{{$errors->first('first_name')}}</span>
        </div>
        <div class="form-group">
                {{ Form::label('last_name', 'Last Name:', array('class' => '')) }}
                {{ Form::text('last_name', Input::old('last_name'), array('placeholder' => 'Username ','class'=> 'form-control')) }}
            <span class="help-inline">{{$errors->first('last_name')}}</span>
        </div>
        <?php $emailE = $errors->first('email'); ?>
        <div class={{{ empty($emailE) ? 'form-group' : 'has-error'  }}}>
            {{ Form::label('email', 'Email:*', array('class' => '')) }}
                {{ Form::text('email', Input::old('email'), array('placeholder' => 'Email', 'class'=> 'form-control')) }}
            <span class="help-inline">{{$errors->first('email')}}</span>
        </div>
        <?php $pass = $errors->first('password'); ?>
        <div class={{{ empty($pass) ? 'form-group' : 'has-error'  }}}>
            {{ Form::label('password', 'Password:', array('class' => '')) }}
                {{ Form::password('password', array('class'=> 'form-control', 'placeholder' => 'Password')) }}
            <div>{{$errors->first('password')}}</div>
        </div>
        <?php $cpass = $errors->first('password'); ?>
        <div class={{{ empty($cpass) ? 'form-group' : 'has-error'  }}}>
                {{ Form::label('password', 'Confirm Password:', array('class' => '')) }}
                {{ Form::password('password_confirmation', array(
                'class' => 'form-control' ,
                'placeholder' => 'Password Confirmation'
                )) }}
            <div>{{$errors->first('password')}}</div>
        </div>
        
        <div class="form-group">
            {{ Form::label('role', 'Role:', array('class' => '')) }}
        	{{Form::select('role', array('admin' => 'Admin', 'author' => 'Author'), Input::old('role'), array('class' => 'form-control')) }}
                
            <div>{{$errors->first('role')}}</div>
        </div>
        <div class="form-group">
            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
        </div>

    {{ Form::close() }}

@stop
