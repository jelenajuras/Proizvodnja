@extends('layouts.index')

@section('title', 'Register')
<link rel="stylesheet" href="{{ URL::asset('css/login.css') }}"/>

@section('content')
<div class="col-12 col-md-10 col-lg-5 login2">
	<header class="head">
		<img src="{{ asset('img/Duplico_logo-mali.png') }}" /><h1 class="">production</h1>
	</header>
	<div class="loginForm">	
		<form accept-charset="UTF-8" role="form" method="post" action="{{ route('auth.login.attempt') }}">
			<fieldset>
				<label>Name</label>
				<div class="inp1 {{ ($errors->has('first_name')) ? 'has-error' : '' }}">
					 <input placeholder="exp.John" name="first_name" type="text" value="{{ old('first_name') }}">
					{!! ($errors->has('first_name') ? $errors->first('first_name', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<label>Surname</label>
				<div class="inp1 {{ ($errors->has('first_name')) ? 'has-error' : '' }}">
					 <input placeholder="exp.Smith..." name="last_name" type="text" value="{{ old('first_name') }}">
					{!! ($errors->has('first_name') ? $errors->first('first_name', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<label>Email</label>
				<div class="inp {{ ($errors->has('email')) ? 'has-error' : '' }}">
					<input placeholder="example@email.com" name="email" type="text" value="{{ old('email') }}">
					{!! ($errors->has('email') ? $errors->first('email', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<label>Password</label>
				<div class="inp1 {{ ($errors->has('password')) ? 'has-error' : '' }}">
					<input placeholder="Password" name="password" type="password" value="">
					{!! ($errors->has('password') ? $errors->first('password', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<label>Repeat password</label>
				<div class="inp1 {{ ($errors->has('password_confirmation')) ? 'has-error' : '' }}">
					</i></span><input placeholder="Password" name="password_confirmation" type="password" value="">
					{!! ($errors->has('password_confirmation') ? $errors->first('password_confirmation', '<p class="text-danger">:message</p>') : '') !!}
				</div>

				
				<input name="_token" value="{{ csrf_token() }}" type="hidden">
				<input class="buttlogin" type="submit" value="register">
				<!--<p style="margin-top:5px; margin-bottom:0"><a href="{{ route('auth.password.request.form') }}" type="submit">Forgot your password?</a></p>-->
			</fieldset>
		</form>
	</div>
</div>
@stop
