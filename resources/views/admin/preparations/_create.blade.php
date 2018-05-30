@extends('layouts.admin')

@section('title', 'Priprema')
<style>

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
		<a class="btn btn-default btn-md" href="{{ route('admin.cabinets.index') }}">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			Natrag 
		</a>
	</div>
</div>
@if (Sentinel::check() && Sentinel::inRole('administrator') || Sentinel::inRole('priprema') || Sentinel::inRole('proizvodnja'))
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <br/>
		<h3 class="panel-title">Upiši status za ormar: {{ $cabinet->brOrmara . ' ' . $cabinet->naziv }}</h3>

		<br/>
		<h3 class="panel-title">Status pripreme </h3>
		<br/>
		<div class="panel panel-default">
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.preparations.store') }}">
				<fieldset>
					<input type="hidden" name="ormar_id" value="{{ $idOrmara }}"/>
					<div class="form-group">
						<table>
							
							<tr class="padd1">
								<?php $datum_1 = new DateTime($cabinet->datum_isporuke);
								$datum_1->modify('-18 days')?>
								<td>Rok završetka:</td>
								<td><input name="datum" class="date form-control" type="text"  value = "{{ $datum_1->format('d-m-Y') }}"></td>
							</tr>
							<thead>
								<tr>
									<th>Stavka</th>
									<th>Riješeno</th>
									<th>Napomena</th>
								</tr>
							</thead>
							<tr class="padd1">
								<td>Izrada 3p sheme</td>
								<td><input name="rijeseno1" type="radio" value="DA" />DA <input name="rijeseno1" type="radio" value="NE" checked />NE </td>
								
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_3p" type="text" value="{{ old('koment_3p') }}" /></td>
							</tr>
							<tr class="padd1">
								<td>Odobrenje 3p sheme</td>
								<td><input name="rijeseno2" type="radio" value="DA" />DA <input name="rijeseno2" type="radio" value="NE" checked />NE </td>
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_3pOd" type="text" value="{{ old('koment_3pOd') }}" /></td>
							</tr>
							<tr class="padd1">
								<td>Priprema rezne liste za Komax</td>
								<td><input name="rijeseno3" type="radio" value="DA" />DA <input name="rijeseno3" type="radio" value="NE" checked />NE </td>
								
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_komax" type="text" value="{{ old('koment_komax') }}" /></td>
							</tr>
							<tr class="padd1">
								<td>Priprema rezne liste za Perforex</td>
								<td><input name="rijeseno4" type="radio" value="DA" />DA <input name="rijeseno4" type="radio" value="NE" checked />NE </td>
								
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_perf" type="text" value="{{ old('koment_perf') }}" /></td>
							</tr>
							<tr class="padd1">
								<td>Odobrenje 3D izgleda ormara</td>
								<td><input name="rijeseno5" type="radio" value="DA" />DA <input name="rijeseno5" type="radio" value="NE" checked />NE </td>
								
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_od" type="text" value="{{ old('koment_od') }}" /></td>
							</tr>
							<tr class="padd1">
								<td>Eksportiranje oznaka</td>
								<td><input name="rijeseno6" type="radio" value="DA" />DA <input name="rijeseno6" type="radio" value="NE" checked />NE </td>
								
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_exp" type="text" value="{{ old('koment_exp') }}" /></td>
							</tr>
							<tr class="padd1">
								<td>Print tehničke dokumentacije</td>
								<td><input name="rijeseno7" type="radio" value="DA" />DA <input name="rijeseno7" type="radio" value="NE" checked />NE </td>
								
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
@endif
@if (Sentinel::check() && Sentinel::inRole('administrator') || Sentinel::inRole('nabava') || Sentinel::inRole('proizvodnja'))
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <br/>
		<h3 class="panel-title">Status nabave</h3>
		<br/>
		<div class="panel panel-default">
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.purchases.store') }}">
				<fieldset>
                    <?php 
						$datum_1 = new DateTime($cabinet->datum_isporuke);
						$datum_1->modify('-3 days');
					?>
				<!--	<div class="naslov">
						<p>Ormar: {{ $cabinet->brOrmara . ' ' . $cabinet->naziv }}</p>
						<input type="hidden" name="ormar_id" value="{{ $idOrmara }}"/>
						<label>Konačan datum isporuke stavaka ormara:</label>
						<input name="datum" class="date" type="text"  value = "{{ $datum_1->format('d-m-Y') }}">
					</div>-->

					<div class="form-group">
						<table>
							<thead>
								<tr>
									<th>Stavka</th>
									<th>Naručeno</th>
									<th>Dostavljeno</th>
									<th>Datum dostave</th>
									<th>Napomena</th>
								</tr>
							</thead>
							<tbody>
								<tr class="padd1">
									<td>Ormar</td>
									<td><input name="naruceno1" type="radio" value="DA" />DA <input name="naruceno1" type="radio" value="NE" checked />NE</td>
									<td><input name="rijeseno1" type="radio" value="DA" />DA <input name="rijeseno1" type="radio" value="NE" checked />NE</td>
									<td><input name="datum1" class="date form-control" type="text"  value = "{{ $datum_1->format('d-m-Y') }}"></td>
									<td><input class="form-control" placeholder="Upiši komentar" name="koment_orm" type="text" value="{{ old('koment_orm') }}" /></td>
								</tr>
								<tr class="padd1">
									<td>Kanalice</td>
									<td><input name="rijeseno2" type="radio" value="DA" />DA <input name="rijeseno2" type="radio" value="NE" checked />NE </td>
									<td><input name="naruceno2" type="radio" value="DA" />DA <input name="naruceno1" type="radio" value="NE" checked />NE</td>
									<td><input name="datum2" class="date form-control" type="text"  value = "{{ $datum_1->format('d-m-Y') }}"></td>
									<td><input class="form-control" placeholder="Upiši komentar" name="koment_kan" type="text" value="{{ old('koment_kan') }}" /></td>
								</tr>
								<tr class="padd1">
									<td>Din šine</td>
									<td><input name="rijeseno3" type="radio" value="DA" />DA <input name="rijeseno3" type="radio" value="NE" checked />NE </td>
									<td><input name="naruceno3" type="radio" value="DA" />DA <input name="naruceno1" type="radio" value="NE" checked />NE</td>
									<td><input name="datum3" class="date form-control" type="text"  value = "{{ $datum_1->format('d-m-Y') }}"></td>
									<td><input class="form-control" placeholder="Upiši komentar" name="koment_sine" type="text" value="{{ old('koment_sine') }}" /></td>
								</tr>
								<tr class="padd1">
									<td>Vodič</td>
									<td><input name="rijeseno4" type="radio" value="DA" />DA <input name="rijeseno4" type="radio" value="NE" checked />NE </td>
									<td><input name="naruceno4" type="radio" value="DA" />DA <input name="naruceno1" type="radio" value="NE" checked />NE</td>
									<td><input name="datum4" class="date form-control" type="text"  value = "{{ $datum_1->format('d-m-Y') }}"></td>
									<td><input class="form-control" placeholder="Upiši komentar" name="koment_vod" type="text" value="{{ old('koment_vod') }}" /></td>
								</tr>
								<tr class="padd1">
									<td>Bakar</td>
									<td><input name="rijeseno5" type="radio" value="DA" />DA <input name="rijeseno5" type="radio" value="NE" checked />NE </td>
									<td><input name="naruceno5" type="radio" value="DA" />DA <input name="naruceno1" type="radio" value="NE" checked />NE</td>
									<td><input name="datum5" class="date form-control" type="text"  value = "{{ $datum_1->format('d-m-Y') }}"></td>
									<td><input class="form-control" placeholder="Upiši komentar" name="koment_bak" type="text" value="{{ old('koment_bak') }}" /></td>
								</tr>
								<tr class="padd1">
									<td>Redne stezaljke</td>
									<td><input name="rijeseno6" type="radio" value="DA" />DA <input name="rijeseno6" type="radio" value="NE" checked />NE </td>
									<td><input name="naruceno6" type="radio" value="DA" />DA <input name="naruceno1" type="radio" value="NE" checked />NE</td>
									<td><input name="datum6" class="date form-control" type="text"  value = "{{ $datum_1->format('d-m-Y') }}"></td>
									<td><input class="form-control" placeholder="Upiši komentar" name="koment_stez" type="text" value="{{ old('koment_stez') }}" /></td>
								</tr>
								<tr class="padd1">
									<td>Sklopna oprema</td>
									<td><input name="rijeseno7" type="radio" value="DA" />DA <input name="rijeseno7" type="radio" value="NE" checked />NE </td>
									<td><input name="naruceno7" type="radio" value="DA" />DA <input name="naruceno1" type="radio" value="NE" checked />NE</td>
									<td><input name="datum7" class="date form-control" type="text"  value = "{{ $datum_1->format('d-m-Y') }}"></td>
									<td><input class="form-control" placeholder="Upiši komentar" name="koment_sklOpr" type="text" value="{{ old('koment_sklOpr') }}" /></td>
								</tr>
								<tr class="padd1">
									<td>PLC</td>
									<td><input name="rijeseno8" type="radio" value="DA" />DA <input name="rijeseno8" type="radio" value="NE" checked />NE </td>
									<td><input name="naruceno8" type="radio" value="DA" />DA <input name="naruceno1" type="radio" value="NE" checked />NE</td>
									<td><input name="datum8" class="date form-control" type="text"  value = "{{ $datum_1->format('d-m-Y') }}"></td>
									<td><input class="form-control" placeholder="Upiši komentar" name="koment_PLC" type="text" value="{{ old('koment_PLC') }}" /></td>
								</tr>
							</tbody>
							<script type="text/javascript">
								$('.date').datepicker({  
								   format: 'dd-mm-yyyy',
								   startDate:'-60y',
								   endDate:'+1y'
								}); 
							</script> 
						</table>
                    </div>
					
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn-default btn pull-right" type="submit" value="Upiši">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@if (Sentinel::check() && Sentinel::inRole('administrator') || Sentinel::inRole('proizvodnja'))
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <br/>
		<h3 class="panel-title">Status proizvodnje</h3>
		<br/>
		<div class="panel panel-default">
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.productions.store') }}">
				<fieldset>
                   <!-- <label>Ormar: {{ $cabinet->brOrmara . ' ' . $cabinet->naziv }}</label>
					<input type="hidden" name="ormar_id" value="{{ $idOrmara }}"/>-->
					<div>
					
					</div>
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
							<!--<tr class="padd1">
								<?php $datum_1 = new DateTime($cabinet->datum_isporuke);
								$datum_1->modify('-3 days')?>
								<td>Datum isporuke ormara:</td>
								<td><input name="datum" class="date form-control" type="text"  value = "{{ $datum_1->format('d-m-Y') }}"></td>
							</tr>-->
							<tr class="padd1">
								<td>Obrada montažne ploče</td>
								<td><input name="rijeseno1" type="radio" value="DA" />DA <input name="rijeseno1" type="radio" value="NE" checked />NE </td>
								
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_mp" type="text" value="{{ old('koment_mp') }}" /></td>
							</tr>
							<tr class="padd1">
								<td>Obrada ormara</td>
								<td><input name="rijeseno2" type="radio" value="DA" />DA <input name="rijeseno2" type="radio" value="NE" checked />NE </td>
								
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_orm" type="text" value="{{ old('koment_orm') }}" /></td>
							</tr>
							<tr class="padd1">
								<td>Rezanje vodiča</td>
								<td><input name="rijeseno3" type="radio" value="DA" />DA <input name="rijeseno3" type="radio" value="NE" checked />NE </td>
								
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_vod" type="text" value="{{ old('koment_vod') }}" /></td>
							</tr>
							<tr class="padd1">
								<td>Izrada oznaka</td>
								<td><input name="rijeseno4" type="radio" value="DA" />DA <input name="rijeseno4" type="radio" value="NE" checked />NE </td>
								
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_ozn" type="text" value="{{ old('koment_ozn') }}" /></td>
							</tr>
							<tr class="padd1">
								<td>Slaganje montažne ploče</td>
								<td><input name="rijeseno5" type="radio" value="DA" />DA <input name="rijeseno5" type="radio" value="NE" checked />NE </td>
								
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_slMp" type="text" value="{{ old('koment_slMp') }}" /></td>
							</tr>
							<tr class="padd1">
								<td>Označavanje montažne ploče</td>
								<td><input name="rijeseno6" type="radio" value="DA" />DA <input name="rijeseno6" type="radio" value="NE" checked />NE </td>
								
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_oznMp" type="text" value="{{ old('koment_oznMp') }}" /></td>
							</tr>
							<tr class="padd1">
								<td>Ožičenje</td>
								<td><input name="rijeseno7" type="radio" value="DA" />DA <input name="rijeseno7" type="radio" value="NE" checked />NE </td>
								
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_ozic" type="text" value="{{ old('koment_ozic') }}" /></td>
							</tr>
							<tr class="padd1">
								<td>CE QR dokumentacija</td>
								<td><input name="rijeseno8" type="radio" value="DA" />DA <input name="rijeseno8" type="radio" value="NE" checked />NE </td>
								
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_dok" type="text" value="{{ old('koment_dok') }}" /></td>
							</tr>
							<tr class="padd1">
								<td>Ispitivanje</td>
								<td><input name="rijeseno9" type="radio" value="DA" />DA <input name="rijeseno9" type="radio" value="NE" checked />NE </td>
								
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_isp" type="text" value="{{ old('koment_isp') }}" /></td>
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
					
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn-default btn pull-right" type="submit" value="Upiši">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
<div class="page-footer">
	<div class='btn-toolbar'>
		<a class="btn btn-default btn-md" href="{{ route('admin.cabinets.index') }}">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			Natrag
		</a>
	</div>
</div>
<br>
@stop
