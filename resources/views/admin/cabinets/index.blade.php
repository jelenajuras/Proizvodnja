@extends('layouts.admin')

@section('title', 'Ormari')
<style>
	th {
		font-size: 10px;
	}
	td {
		font-size: 12px;
	}
	#tr1 {
		text-align: center;
	}
	
</style>
@section('content')
   
<div class='btn-toolbar pull-right'>
	<a class="btn btn-default btn-md" href="{{ route('admin.cabinets.create') }}" id="button">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
		Dodaj novi ormar
	</a>
</div>

<h3>Ormari</h3>
<!--<input class="form-control" id="myInput" type="text" placeholder="Traži..">-->

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="table-responsive">
		@if(count($cabinets) > 0)
			<table id="table_id" class="display">
				<thead>
					<tr  class="center">
						<th>Broj</th>
						<th>Broj projekta, Investitor, naziv projekta</th>
						<th>Objekt</th>
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
				<tbody >
				@foreach ($cabinets as $cabinet)
				<tr>
						<td>{{ $cabinet->id }}</td>
						<td>{{ $cabinet->PrBroj . ' - ' . $cabinet->investitor . ' - ' . $cabinet->PrNaziv }}</td>
						<td>{{ $cabinet->objekt }}</td>
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
							<!--<a href="{{ route('admin.cabinets.destroy', $cabinet->id) }}" class="btn btn-danger action_confirm" data-method="delete" data-token="{{ csrf_token() }}">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
									Obriši
							</a>-->
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
@stop
