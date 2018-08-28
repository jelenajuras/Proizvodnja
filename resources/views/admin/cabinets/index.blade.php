@extends('layouts.admin')

@section('title', 'Ormari')

<link rel="stylesheet" href="{{ URL::asset('css/cabinets.css') }}"/>
<link rel="stylesheet" href="{{ URL::asset('css/user.css') }}"/>
@section('content')
<section>
	<header>
		<h3>Cabinets</h3>
		<div class='addUser'>
			<a class="load-ajax-modal" href="{{ route('admin.preparations.index')  }}" id="button1">status cabinets</a>
			<button data-path="{{ route('admin.cabinets.create') }}" 
				class="load-ajax-modal" role="button" data-toggle="modal" data-target="#myModal"">
				<i class="far fa-plus-square"></i>add cabinets
			</button>
		</div>
	</header> 

	<br>
	<div class="ProjIndex">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="table-responsive">
			@if(count($cabinets) > 0)
				<table id="table_id" class="display">
					<thead>
						<tr class="center">
							<th class="not-export-column">Opcije</th>
							<th>Broj</th>
							<th>Broj projekta, Investitor, naziv projekta</th>
							<th>Objekt</th>
							<th>Datum isporuke</th>
							<th>Proizvođač</th>
							<th>Naziv ormara (KKS)</th>
							<th>Dimenzija</th>
							<th>Tip</th>
							<th>Model</th>
							<th>Izvedba</th>
							<th>Materijal</th>
							<th>Nazivni napon</th>
							<th>Kontrolni napon</th>
							<th>Nazivna struja</th>
							<th>Prekidna moć</th>
							<th>Sustav zaštite</th>
							<th>IP zaštita ormara</th>
							
						</tr>
					</thead>
					<tbody>
					@foreach ($cabinets as $cabinet)
					<tr id="{{ $cabinet->id }}" class="ormari">
						<?php 
							if($cabinet) {
								$priprema = DB::table('preparations')->where('ormar_id',$cabinet->id)->value('id');
								$tvornickiBr = DB::table('productions')->where('ormar_id',$cabinet->id)->value('tvornickiBr');
							}
						?>
						<!--<td id="td1" class="sorting_1">
							<button data-path="{{ route('admin.cabinets.edit', $cabinet->id)}}" 
								class="load-ajax-modal" role="button" data-toggle="modal" data-target="#dynamic-modal" >
								<i class="far fa-edit"></i>edit 
							</button>
							@if($tvornickiBr)
							<a href="{{action('Admin\CabinetController@izjava', $cabinet->id) }}" class="izjava">
								<i class="far fa-file-alt"></i>Izjava
							</a>
							<a href="{{action('Admin\CabinetController@protokol', $cabinet->id) }}" class="izjava">
								<i class="far fa-file-alt"></i>Protokol
							</a>
							@endif
							<!--<a href="{{action('Admin\CabinetController@izjava_pdf', $cabinet->id) }}" class="load-ajax-modal">
								Izjava PDF
							</a>
							<a href="{{action('Admin\CabinetController@protokol_pdf', $cabinet->id) }}" class="load-ajax-modal">
								Protokol PDF
							</a>
						</td>-->
						<td>
							<button data-path="{{ route('admin.cabinets.edit', $cabinet->id)}}" 
								class="load-ajax-modal" role="button" data-toggle="modal" data-target="#myModal" >
								<i class="far fa-edit"></i> 
							</button>
							
							
							@if($tvornickiBr)
							<a href="{{action('Admin\CabinetController@izjava', $cabinet->id) }}" title="Izjava" target="_blank">
								<i class="far fa-file-alt"></i>
							</a>
							<a href="{{action('Admin\CabinetController@protokol', $cabinet->id) }}" title="Protokol" target="_blank">
								<i class="far fa-file-alt"></i>
							</a>
							@endif
							{{ $cabinet->brOrmara }}
						</td>
						<td>{{ $cabinet->PrBroj . ' - ' . $cabinet->investitor . ' - ' . $cabinet->PrNaziv }}</td>
						<td>{{ $cabinet->objekt }}</td>
						<td>{{ date('Y.m.d', strtotime($cabinet->datum_isporuke)) }}</td>
						<td>{{ $cabinet->proizvodjac }}</td>
						<td>{{ $cabinet->naziv }}</td>
						<td>{{ $cabinet->velicina }}</td>
						<td>{{ $cabinet->tip }}</td>
						<td>{{ $cabinet->model }}</td>
						<td>{{ $cabinet->izvedba }}</td>
						<td>{{ $cabinet->materijal }}</td>
						<td>{{ $cabinet->napon }}</td>
						<td>{{ $cabinet->kontrolni_napon }}</td>
						<td>{{ $cabinet->struja }}</td>
						<td>{{ $cabinet->prekidna_moc }}</td>
						<td>{{ $cabinet->sustav_zastite }}</td>
						<td>{{ $cabinet->ip_zastita }}</td>
					</tr>
					@endforeach
					<script>
						$(document).ready(function(){
						  $("#myInput").on("keyup", function() {
							var value = $(this).val().toLowerCase();
							$("#myTable tr").filter(function() {
							  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
							});
						  });
						});
					</script>
					
					</tbody>
				</table>
				@else
					{{'Nema unesenih ormara!'}}
				@endif
			</div>
		</div>
	</div>
</section>
@stop
