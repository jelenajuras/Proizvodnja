@extends('layouts.admin')

@section('title', 'Dashboard')

<link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}"/>

@section('content')
<div class="dashb col-12 col-md-12 col-lg-12">

    @if (Sentinel::check())
		<div >
			@foreach($projects as $project)
				@if($project->user_id == Sentinel::getUser()->id )
					<div class="projekt1">
						<a href="{{ route('admin.projects.show', $project->id) }}">
						<p class="prInv">{{ $project->investitor }}</p>
						<p>{{ $project->id . ' - ' . $project->naziv }}</p>
						
						
						
						@foreach(DB::table('cabinets')->where('cabinets.projekt_id',$project->id)->get() as $cabinet)
							<p class="orm">Naziv ormara:<span>{{ $cabinet->naziv}}</span></p>
						@endforeach
						</a>
					</div>
						
						
						
				@endif
			@endforeach
		</div>

    @endif
</div>
@stop
