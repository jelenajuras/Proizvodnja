@extends('layouts.admin')

@section('title', 'Priprema')
<style>
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
@if (Sentinel::check() && Sentinel::inRole('administrator') || Sentinel::inRole('nabava') || Sentinel::inRole('proizvodnja'))
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <br/>
		<h3 class="panel-title">Izmjeni status nabave</h3>
		<br/>
		<div class="panel panel-default">
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.purchases.update', $purchase->id) }}">
				<fieldset>
                    <?php $datum_1 = new DateTime($purchase->datum);	?>
					<div class="naslov">
						<p>Ormar: {{ $cabinet->brOrmara . ' ' . $cabinet->naziv }}</p>
						<input type="hidden" name="ormar_id" value="{{ $purchase->ormar_id }}"/>
						<label>Konačan datum isporuke stavaka ormara:</label>
						<input name="datum" class="date" type="text"  value = "{{ $datum_1->format('d-m-Y') }}"></td>
					</div>
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
									<td><input name="naruceno1" type="radio" value="DA" {{ ($purchase->naruceno1 == 'DA') ? 'checked' : '' }} />DA <input name="naruceno1" type="radio" value="NE" {{ ($purchase->naruceno1 == 'NE') ? 'checked' : '' }} />NE </td>
									<td><input name="rijeseno1" type="radio" value="DA" {{ ($purchase->rijeseno1 == 'DA') ? 'checked' : '' }} />DA <input name="rijeseno1" type="radio" value="NE" {{ ($purchase->rijeseno1 == 'NE') ? 'checked' : '' }} />NE </td>
									<td><input name="datum1" class="date form-control" type="text"  value = "{{ date('d-m-Y', strtotime( $purchase->datum1)) }}"></td>
									<td><input class="form-control" placeholder="Upiši komentar" name="koment_orm" type="text" value="{{ $purchase->koment_orm }}" /></td>
								</tr>
								<tr class="padd1">
									<td>Kanalice</td>
									<td><input name="naruceno2" type="radio" value="DA" {{ ($purchase->naruceno2 == 'DA') ? 'checked' : '' }} />DA <input name="naruceno2" type="radio" value="NE" {{ ($purchase->naruceno2 == 'NE') ? 'checked' : '' }}  />NE </td>
									<td><input name="rijeseno2" type="radio" value="DA" {{ ($purchase->rijeseno2 == 'DA') ? 'checked' : '' }} />DA <input name="rijeseno2" type="radio" value="NE" {{ ($purchase->rijeseno2 == 'NE') ? 'checked' : '' }}  />NE </td>
									<td><input name="datum2" class="date form-control" type="text"  value = "{{ date('d-m-Y', strtotime( $purchase->datum2)) }}"></td>
									<td><input class="form-control" placeholder="Upiši komentar" name="koment_kan" type="text" value="{{  $purchase->koment_kan }}" /></td>
								</tr>
								<tr class="padd1">
									<td>Din šine</td>
									<td><input name="naruceno3" type="radio" value="DA" {{ ($purchase->naruceno3 == 'DA') ? 'checked' : '' }} />DA <input name="naruceno3" type="radio" value="NE" {{ ($purchase->naruceno3 == 'NE') ? 'checked' : '' }}  />NE</td>
									<td><input name="rijeseno3" type="radio" value="DA" {{ ($purchase->rijeseno3 == 'DA') ? 'checked' : '' }} />DA <input name="rijeseno3" type="radio" value="NE" {{ ($purchase->rijeseno3 == 'NE') ? 'checked' : '' }}  />NE</td>
									<td><input name="datum3" class="date form-control" type="text"  value = "{{ date('d-m-Y', strtotime( $purchase->datum3)) }}"></td>
									<td><input class="form-control" placeholder="Upiši komentar" name="koment_sine" type="text" value="{{ $purchase->koment_sine }}" /></td>
								</tr>
								<tr class="padd1">
									<td>Vodič</td>
									<td><input name="naruceno4" type="radio" value="DA" {{ ($purchase->naruceno4 == 'DA') ? 'checked' : '' }}  />DA <input name="naruceno4" type="radio" value="NE" {{ ($purchase->naruceno4 == 'NE') ? 'checked' : '' }}  />NE </td>
									<td><input name="rijeseno4" type="radio" value="DA" {{ ($purchase->rijeseno4 == 'DA') ? 'checked' : '' }}  />DA <input name="rijeseno4" type="radio" value="NE" {{ ($purchase->rijeseno4 == 'NE') ? 'checked' : '' }}  />NE </td>
									<td><input name="datum4" class="date form-control" type="text"  value = "{{ date('d-m-Y', strtotime( $purchase->datum4)) }}"></td>
									<td><input class="form-control" placeholder="Upiši komentar" name="koment_vod" type="text" value="{{ $purchase->koment_vod }}" /></td>
								</tr>
								<tr class="padd1">
									<td>Bakar</td>
									<td><input name="naruceno5" type="radio" value="DA" {{ ($purchase->naruceno5 == 'DA') ? 'checked' : '' }}  />DA <input name="naruceno5" type="radio" value="NE" {{ ($purchase->naruceno5 == 'NE') ? 'checked' : '' }}  />NE </td>
									<td><input name="rijeseno5" type="radio" value="DA" {{ ($purchase->rijeseno5 == 'DA') ? 'checked' : '' }}  />DA <input name="rijeseno5" type="radio" value="NE" {{ ($purchase->rijeseno5 == 'NE') ? 'checked' : '' }}  />NE </td>
									<td><input name="datum5" class="date form-control" type="text"  value = "{{ date('d-m-Y', strtotime( $purchase->datum5)) }}"></td>
									<td><input class="form-control" placeholder="Upiši komentar" name="koment_bak" type="text" value="{{ $purchase->koment_bak }}" /></td>
								</tr>
								<tr class="padd1">
									<td>Redne stezaljke</td>
									<td><input name="naruceno6" type="radio" value="DA" {{ ($purchase->naruceno6 == 'DA') ? 'checked' : '' }} />DA <input name="naruceno6" type="radio" value="NE" {{ ($purchase->naruceno6 == 'NE') ? 'checked' : '' }}  />NE</td>
									<td><input name="rijeseno6" type="radio" value="DA" {{ ($purchase->rijeseno6 == 'DA') ? 'checked' : '' }} />DA <input name="rijeseno6" type="radio" value="NE" {{ ($purchase->rijeseno6 == 'NE') ? 'checked' : '' }}  />NE</td>
									<td><input name="datum6" class="date form-control" type="text"  value = "{{ date('d-m-Y', strtotime( $purchase->datum6)) }}"></td>
									<td><input class="form-control" placeholder="Upiši komentar" name="koment_stez" type="text" value="{{ $purchase->koment_stez }}" /></td>
								</tr>
								<tr class="padd1">
									<td>Sklopna oprema</td>
									<td><input name="naruceno7" type="radio" value="DA" {{ ($purchase->naruceno7 == 'DA') ? 'checked' : '' }} />DA <input name="naruceno7" type="radio" value="NE" {{ ($purchase->naruceno7 == 'NE') ? 'checked' : '' }}  />NE</td>
									<td><input name="rijeseno7" type="radio" value="DA" {{ ($purchase->rijeseno7 == 'DA') ? 'checked' : '' }} />DA <input name="rijeseno7" type="radio" value="NE" {{ ($purchase->rijeseno7 == 'NE') ? 'checked' : '' }}  />NE</td>
									<td><input name="datum7" class="date form-control" type="text"  value = "{{ date('d-m-Y', strtotime( $purchase->datum7)) }}"></td>
									<td><input class="form-control" placeholder="Upiši komentar" name="koment_sklOpr" type="text" value="{{ $purchase->koment_sklOpr }}" /></td>
								</tr>
								<tr class="padd1">
									<td>PLC</td>
									<td><input name="naruceno8" type="radio" value="DA" {{ ($purchase->naruceno8 == 'DA') ? 'checked' : '' }} />DA <input name="naruceno8" type="radio" value="NE" {{ ($purchase->naruceno8 == 'NE') ? 'checked' : '' }}  />NE</td>
									<td><input name="rijeseno8" type="radio" value="DA" {{ ($purchase->rijeseno8 == 'DA') ? 'checked' : '' }} />DA <input name="rijeseno8" type="radio" value="NE" {{ ($purchase->rijeseno8 == 'NE') ? 'checked' : '' }}  />NE</td>
									<td><input name="datum8" class="date form-control" type="text"  value = "{{ date('d-m-Y', strtotime( $purchase->datum8)) }}"></td>
									<td><input class="form-control" placeholder="Upiši komentar" name="koment_PLC" type="text" value="{{ $purchase->koment_PLC }}" /></td>
	
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
					{{ csrf_field() }}
					{{ method_field('PUT') }}
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="butt pull-right" type="submit" value="Upiši">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@stop
