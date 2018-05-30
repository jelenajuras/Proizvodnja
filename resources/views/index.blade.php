@extends('layouts.index')

@section('title', 'Proizvodnja')

@section('content')
<div class="col-12 col-md-10 col-lg-5 login2">
	<header class="head">
			<img src="{{ asset('img/Duplico_logo-mali.png') }}" /><h1 class="">production</h1>
	</header>
	<div class="loginForm">	
		<form accept-charset="UTF-8" role="form" method="post" action="{{ route('auth.login.attempt') }}">
			<fieldset>
				<label>Email</label>
				<div class="inp {{ ($errors->has('email')) ? 'has-error' : '' }}">
					 <span>&#9993;</span><input placeholder="E-mail" name="email" type="text" value="{{ old('email') }}">
					{!! ($errors->has('email') ? $errors->first('email', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<label>Password</label>
				<div class="inp {{ ($errors->has('password')) ? 'has-error' : '' }}">
					<span><i class="fas fa-key"></i></span><input placeholder="Password" name="password" type="password" value="">
					{!! ($errors->has('password') ? $errors->first('password', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<div class="">
					<label>
						<input name="remember" type="checkbox" value="true" {{ old('remember') == 'true' ? 'checked' : ''}}> Remember me
					</label>
				</div>
				<input name="_token" value="{{ csrf_token() }}" type="hidden">
				<input class="buttlogin" type="submit" value="log in">
				<!--<p style="margin-top:5px; margin-bottom:0"><a href="{{ route('auth.password.request.form') }}" type="submit">Forgot your password?</a></p>-->
			</fieldset>
		</form>
	</div>
</div>

@stop
