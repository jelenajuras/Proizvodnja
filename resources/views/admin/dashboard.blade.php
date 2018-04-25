@extends('layouts.admin')

@section('title', 'Admin - Dashboard')

<link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}"/>

@section('content')

<div class="db row">
    @if (Sentinel::check())
    <div>
        <h4>Popis projekata:</h4>
    </div>

	<div>
		@foreach($projects as $project)
			@if($project->user_id == Sentinel::getUser()->id )
				<div class="projekt">
					<p class="prInv">{{ $project->investitor }}</p>
					<p><a href="{{ route('admin.productions.show', $project->id) }}">{{ $project->id . ' - ' . $project->naziv }}</p>
					</a></div>
			@endif
		@endforeach
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
