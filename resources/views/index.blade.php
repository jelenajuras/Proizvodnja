@extends('layouts.index')

@section('title', 'Proizvodnja')

@section('content')
<section class="login">
    <header>
		<p>Za ulazak na stranice potrebna je prijava</p>
		<button><a href="{{ route('auth.login.form') }}">Prijavi se</a></button>
	</header>

</section>

@stop
