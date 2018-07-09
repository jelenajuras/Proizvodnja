@extends('layouts.admin')

@section('title', 'Admin - Dashboard')

<link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}"/>

@section('content')
<div class="dashb col-12 col-md-12 col-lg-12">

    @if (Sentinel::check())
		<div class="">
			@foreach($projects as $project)
				@if($project->user_id == Sentinel::getUser()->id )
					<div class="projekt">
						<p class="prInv">{{ $project->investitor }}</p>
						<p><a href="{{ route('admin.projects.show', $project->id) }}">{{ $project->id . ' - ' . $project->naziv }}</p>
						</a></div>
				@endif
			@endforeach
		</div>

    @endif
</div>
@stop
