@extends('layouts.admin')

@section('title', 'Priprema')
<style>

.padd1 td {
	padding: 5px;
	font-size:0.75rem
}
.btn {
	width: 150px;
	margin: auto;
}
table {
	width:auto;
}


tr th {
	border-bottom: 1px solid #b3b3b3;
}

.naslov {
	margin-bottom: 20px;
}

.naslov p {
	font-weight:bold;
	font-size: 0.88rem;
}

.padd1 td {
	padding: 15px;
	font-size:0.75rem
}

.butt {
	width: 200px;
	margin: 5px;
	padding: 10px;
	background-color: #e6e6e6;
	border: solid 1px #b3b3b3; 
	border-radius:5px;
}

.butt:hover {
	background-color: white;
	font-weight:bold;
	color: #e64d00;
}

.date {
	padding: 5px;
	border: solid 1px #bfbfbf; 
	border-radius:5px;
	text-align: center;
	font-size: 0.88rem;
	margin-left: 20px;
	
}
</style>
@section('content')
<div class="page-header">
	<div class='btn-toolbar'>
		<a class="btn btn-default btn-md" href="{{ route('admin.productions.show', $cabinet->projekt_id) }}">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			Go Back
		</a>
	</div>
</div>
@if (Sentinel::check() && Sentinel::inRole('administrator') || Sentinel::inRole('priprema') || Sentinel::inRole('proizvodnja'))
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <br/>
		<h3 class="panel-title">Izmjeni status za ormar {{ $cabinet->brOrmara . ' ' . $cabinet->naziv }}</h3>
		<br/>
		<br/>
		<h3 class="panel-title">Status pripreme</h3>
		<br/>
		<div class="panel panel-default">
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.preparations.update', $preparation->id) }}">
				<fieldset>

					<input type="hidden" name="ormar_id" value="{{ $preparation->ormar_id }}"/>

					<div class="form-group">
						<table>
							<thead>
								<tr>
									<th>Stavka</th>
									<th>Riješeno</th>
									<th>Napomena</th>
								</tr>
							</thead>
							<div class="form-group">
							<tr class="padd1">
								<?php $datum_1 = new DateTime($preparation->datum);	?>
								<td>Rok završetka:</td>
								<td><input name="datum" class="date form-control" type="text"  value = "{{ $datum_1->format('d-m-Y') }}"></td>
							</tr>
							<tr class="padd1">
								<td>Izrada 3p sheme</td>
								<td><input name="rijeseno1" type="radio" value="DA" {{ ($preparation->rijeseno1 == 'DA') ? 'checked' : '' }} />DA <input name="rijeseno1" type="radio" value="NE" {{ ($preparation->rijeseno1 == 'NE') ? 'checked' : '' }} />NE </td>
								
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_3p" type="text" value="{{ $preparation->koment_3p }}" /></td>
							</tr>
							<tr class="padd1">
								<td>Odobrenje 3p sheme</td>
								<td><input name="rijeseno2" type="radio" value="DA" {{ ($preparation->rijeseno2 == 'DA') ? 'checked' : '' }} />DA <input name="rijeseno2" type="radio" value="NE" {{ ($preparation->rijeseno2 == 'NE') ? 'checked' : '' }}  />NE </td>
								
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_3pOd" type="text" value="{{  $preparation->koment_3pOd }}" /></td>
							</tr>
							<tr class="padd1">
								<td>Priprema rezne liste za Komax</td>
								<td><input name="rijeseno3" type="radio" value="DA" {{ ($preparation->rijeseno3 == 'DA') ? 'checked' : '' }} />DA <input name="rijeseno3" type="radio" value="NE" {{ ($preparation->rijeseno3 == 'NE') ? 'checked' : '' }}  />NE </td>
								
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_komax" type="text" value="{{ $preparation->koment_komax }}" /></td>
							</tr>
							<tr class="padd1">
								<td>Priprema rezne liste za Perforex</td>
								<td><input name="rijeseno4" type="radio" value="DA" {{ ($preparation->rijeseno4 == 'DA') ? 'checked' : '' }}  />DA <input name="rijeseno4" type="radio" value="NE" {{ ($preparation->rijeseno4 == 'NE') ? 'checked' : '' }}  />NE </td>
								
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_perf" type="text" value="{{ $preparation->koment_perf }}" /></td>
							</tr>
							<tr class="padd1">
								<td>Odobrenje 3D izgleda ormara</td>
								<td><input name="rijeseno5" type="radio" value="DA" {{ ($preparation->rijeseno5 == 'DA') ? 'checked' : '' }}  />DA <input name="rijeseno5" type="radio" value="NE" {{ ($preparation->rijeseno5 == 'NE') ? 'checked' : '' }}  />NE </td>
								
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_od" type="text" value="{{ $preparation->koment_od }}" /></td>
							</tr>
							<tr class="padd1">
								<td>Eksportiranje oznaka</td>
								<td><input name="rijeseno6" type="radio" value="DA" {{ ($preparation->rijeseno6 == 'DA') ? 'checked' : '' }} />DA <input name="rijeseno6" type="radio" value="NE" {{ ($preparation->rijeseno6 == 'NE') ? 'checked' : '' }}  />NE </td>
								
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_exp" type="text" value="{{ $preparation->koment_exp }}" /></td>
							</tr>
							<tr class="padd1">
								<td>Print tehničke dokumentacije</td>
								<td><input name="rijeseno7" type="radio" value="DA" {{ ($preparation->rijeseno7 == 'DA') ? 'checked' : '' }} />DA <input name="rijeseno7" type="radio" value="NE" {{ ($preparation->rijeseno7 == 'NE') ? 'checked' : '' }}  />NE </td>
								
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_pr" type="text" value="{{ $preparation->koment_pr }}" /></td>
							</tr>
							<script type="text/javascript">
								$('.date').datepicker({  
								   format: 'dd-mm-yyyy',
								   startDate:'-60y',
								   endDate:'+1y'
								}); 
							</script> 
						</table>
                    </div>
					{{ csrf_field() }}
					{{ method_field('PUT') }}
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn-default btn pull-right" type="submit" value="Upiši">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

@stop
