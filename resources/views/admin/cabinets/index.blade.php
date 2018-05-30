@extends('layouts.admin')

@section('title', 'Ormari')

<link rel="stylesheet" href="{{ URL::asset('css/cabinets.css') }}"/>

@section('content')
<section>
	<div class='btn-toolbar pull-right'>
		<a class="btn btn-default btn-md" href="{{ route('admin.preparations.index')  }}" id="button1">Status ormara</a>
		<a class="btn btn-default btn-md" href="{{ route('admin.cabinets.create') }}" id="button1">
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			Dodaj novi ormar
		</a>
	</div>

	<h3>Ormari</h3> 

	<br>
	<!--<form accept-charset="UTF-8" role="form" method="post" action="{!! (isset($_POST['name']) ? route('admin.cabinets.edit', '<span id="results"></span>') : '') !!}">
		<input type="text" id="ormarId" name="ormarId" value="">
		<input name="_token" value="{{ csrf_token() }}" type="hidden">
		<input class="btn-default btn pull-right" type="submit" value="Upiši">
	</form> 

	<p>ormarId <input type="text" id="ormarId" value=""></p>-->
	<!--
	<button id="button">Row count</button>-->

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="table-responsive">
			@if(count($cabinets) > 0)
				<table id="table_id" class="display">
					<thead>
						<tr class="center">
							<!--<th></th>-->
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
							<th>Nazivna struja</th>
							<th>Prekidna moć</th>
							<th>Sustav zaštite</th>
							<th>IP zaštita ormara</th>
							<th class="not-export-column">Opcije</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($cabinets as $cabinet)
					<tr id="{{ $cabinet->id }}">
						<?php 
							if($cabinet) {
								$priprema = DB::table('preparations')->where('ormar_id',$cabinet->id)->value('id');
							}
						?>
						<!--<td>
							@if($priprema)
								<a href="{{ route('admin.preparations.edit', $priprema  ) }}" class="btn btn-default btn-md" id="button">
									Izmjeni pripremu
								</a>
							<!--	<a href="{{ route('admin.preparations.show', $priprema  ) }}" class="btn btn-default btn-md" id="button">
									Status pripreme
								</a>-->
							<!--@else
								<a href="{{ route('admin.preparations.create', ['id' => $cabinet->id] ) }}" class="btn btn-default btn-md" id="button">
									Status pripreme
								</a>

							@endif
						</td>-->
						<td>
							{{ $cabinet->brOrmara }}
						</td>
						<td>{{ $cabinet->PrBroj . ' - ' . $cabinet->investitor . ' - ' . $cabinet->PrNaziv }}</td>
						<td>{{ $cabinet->objekt }}</td>
						<td>{{  date('Y.m.d', strtotime($cabinet->datum_isporuke)) }}</td>
						<td>{{ $cabinet->proizvodjac }}</td>
						<td>{{ $cabinet->naziv }}</td>
						<td>{{ $cabinet->velicina }}</td>
						<td>{{ $cabinet->tip }}</td>
						<td>{{ $cabinet->model }}</td>
						<td>{{ $cabinet->izvedba }}</td>
						<td>{{ $cabinet->materijal }}</td>
						<td>{{ $cabinet->napon }}</td>
						<td>{{ $cabinet->struja }}</td>
						<td>{{ $cabinet->prekidna_moc }}</td>
						<td>{{ $cabinet->sustav_zastite }}</td>
						<td>{{ $cabinet->ip_zastita }}</td>
						
						<td id="td1">
							<a href="{{ route('admin.cabinets.edit', $cabinet->id) }}" class="btn btn-default btn-md" id="button">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
									Ispravi
							</a>
						</td>
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
