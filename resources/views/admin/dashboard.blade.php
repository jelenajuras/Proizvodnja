@extends('layouts.admin')

@section('title', 'Admin - Dashboard')
<style>
	#jumbotron  {
		margin: auto;
		width: 100%;
	}

</style>
@section('content')

<div class="row" id="jumbotron">
    @if (Sentinel::check())
    <div class="jumbotron">
        <h2>Prijavljen/a si, {{ Sentinel::getUser()->first_name . ' ' . Sentinel::getUser()->last_name}}!</h2>
       
    </div>
    @else
        <div class="jumbotron">
            <h1>Welcome, Guest!</h1>
            <p>You must login to continue.</p>
            <p><a class="btn btn-primary btn-lg" href="{{ route('auth.login.form') }}" role="button">Log In</a></p>
        </div>
    @endif
</div>
@stop
