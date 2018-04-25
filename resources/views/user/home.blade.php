@extends('layouts.index')

@section('title', 'Duplico proizvodnja')

@section('content')

<div>
<h5>Popis projekata</h5>
@foreach($projects as $project)
	@if($project->user_id == Sentinel::getUser()->id )
		<div class="projekt">
			<p class="prInv">{{ $project->investitor }}</p>
			<p><a href="{{ route('admin.productions.show', $project->id) }}">{{ $project->id . ' - ' . $project->naziv }}</a></p>
		</div>
	@endif
@endforeach
</div>
@stop
