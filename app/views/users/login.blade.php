@extends('layouts.master')

@section("content")
<div class="login-container">
	<div class="login-header">
	    <h4>Sign in</h4>
	</div>
	{{ Form::open() }}
	@if (isset($error))
      {{ $errors }}<br />
    @endif
	<div class="form-group">
		<label for="email" >{{ Form::label("email", "Email") }}</label>
		{{ Form::text("email", null, array('placeholder' => 'Email', 'class'=> 'form-control')) }}
		<i class="icon-user"></i>
	</div>
	<div class="form-group">
		<label for="password">{{ Form::label("password", "Password") }} </label>
		{{ Form::password("password", array('placeholder' => 'Password', 'class'=> 'form-control')) }}
		<!-- <i class="icon-lock"></i> -->
	</div>
	<div class="login-button">
		{{ Form::submit("login", array('class' => 'btn btn-primary')) }}
	</div>
	{{ Form::close() }}
</div>

@stop