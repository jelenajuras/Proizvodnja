@extends('layouts.admin')

@section('title', 'Priprema')
<style>

.padd1 td {
	padding: 5px;
	font-size:0.75rem;
}
.btn {
	width: 150px;
	margin: auto;
}
</style>
@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <br/>
		<h3 class="panel-title">Upiši status pripreme</h3>
		<br/>
		<div class="panel panel-default">
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.preparations.store') }}">
				<fieldset>
                    <label>Ormar: {{ $cabinet->brOrmara . ' ' . $cabinet->naziv }}</label>
					<input type="hidden" name="ormar_id" value="{{ $idOrmara }}"/>

					<div class="form-group">
						<table>
							<div class="form-group">
							<tr class="padd1">
								<?php $datum_1 = new DateTime($cabinet->datum_isporuke);
								$datum_1->modify('-18 days')?>
								<td>Rok završetka:</td>
								<td><input name="datum" class="date form-control" type="text"  value = "{{ $datum_1->format('d-m-Y') }}"></td>
							</tr>
							<tr class="padd1">
								<td><input name="rijeseno1" type="radio" value="DA" />DA <input name="rijeseno1" type="radio" value="NE" checked />NE </td>
								<td>Izrada 3p sheme</td>
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_3p" type="text" value="{{ old('koment_3p') }}" /></td>
							</tr>
							<tr class="padd1">
								<td><input name="rijeseno2" type="radio" value="DA" />DA <input name="rijeseno2" type="radio" value="NE" checked />NE </td>
								<td>Odobrenje 3p sheme</td>
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_3pOd" type="text" value="{{ old('koment_3pOd') }}" /></td>
							</tr>
							<tr class="padd1">
								<td><input name="rijeseno3" type="radio" value="DA" />DA <input name="rijeseno3" type="radio" value="NE" checked />NE </td>
								<td>Priprema rezne liste za Komax</td>
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_komax" type="text" value="{{ old('koment_komax') }}" /></td>
							</tr>
							<tr class="padd1">
								<td><input name="rijeseno4" type="radio" value="DA" />DA <input name="rijeseno4" type="radio" value="NE" checked />NE </td>
								<td>Priprema rezne liste za Perforex</td>
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_perf" type="text" value="{{ old('koment_perf') }}" /></td>
							</tr>
							<tr class="padd1">
								<td><input name="rijeseno5" type="radio" value="DA" />DA <input name="rijeseno5" type="radio" value="NE" checked />NE </td>
								<td>Odobrenje 3D izgleda ormara</td>
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_od" type="text" value="{{ old('koment_od') }}" /></td>
							</tr>
							<tr class="padd1">
								<td><input name="rijeseno6" type="radio" value="DA" />DA <input name="rijeseno6" type="radio" value="NE" checked />NE </td>
								<td>Eksportiranje oznaka</td>
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_exp" type="text" value="{{ old('koment_exp') }}" /></td>
							</tr>
							<tr class="padd1">
								<td><input name="rijeseno7" type="radio" value="DA" />DA <input name="rijeseno7" type="radio" value="NE" checked />NE </td>
								<td>Print tehničke dokumentacije</td>
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_pr" type="text" value="{{ old('koment_pr') }}" /></td>
							</tr>
						</table>
						<script type="text/javascript">
								$('.date').datepicker({  
								   format: 'dd-mm-yyyy',
								   startDate:'-60y',
								   endDate:'+1y'
								}); 
						</script> 
                    </div>
					
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn-default btn pull-right" type="submit" value="Upiši">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
