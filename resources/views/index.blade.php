@extends('layouts.index')

@section('title', 'Proizvodnja')

@section('content')
<aside class="Jside col-12 col-md-12 col-lg-4">
	<div class="box overlay black"></div>
	<div class="Jlogo">
		<img src="{{ asset('img/Duplico_logo_white.png') }}" class="logo"/>
	</div>
	<div class="slideshow-container">
		<h2>how does duplico production work</h2>

		<div class="mySlides fade2">
		  <p>1. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
		</div>
		<div class="mySlides fade2">
		  <p>2. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
		</div>
		<div class="mySlides fade2">
		  <p>3. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
		</div>
	</div>
	<br>
	<div class="ikone">
		<span class="dot" onclick="currentSlide(1)"></span> 
		<span class="dot" onclick="currentSlide(2)"></span> 
		<span class="dot" onclick="currentSlide(3)"></span> 
		<a class="next" onclick="plusSlides(1)"><img src="{{ asset('img/left-arrow.png') }}"/></a>
	</div>
</aside>
<section class="Jlogin col-12 col-md-12 col-lg-8" >
	<div class="col-12 col-md-12 col-lg-8 login2">
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
					<div class="inp {{ ($errors->has('password')) ? 'has-error' : '' }}" style="margin-bottom: 20px;">
						<span><i class="fas fa-key"></i></span><input placeholder="Password" name="password" type="password" value="">
						{!! ($errors->has('password') ? $errors->first('password', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<div>
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
</section>
@stop
