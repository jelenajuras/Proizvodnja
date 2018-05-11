@extends('layouts.index')

@section('title', 'Duplico proizvodnja')
<link rel="stylesheet" href="{{ URL::asset('css/home.css') }}"/>
@section('content')

@if(count($projects))
	<div class="home">
		@foreach($projects as $project)
			@if($project->user_id == Sentinel::getUser()->id )
				<div class="projekt">
					<p><a href="{{ route('admin.productions.show', $project->id) }}">{{ $project->investitor }}<br>{{ $project->id . ' - ' . $project->naziv }}</a></p>
				</div>
			@endif
		@endforeach
	</div>
@endif
@stop
