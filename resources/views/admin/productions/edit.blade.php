@extends('layouts.admin')

@section('title', 'Priprema')

<link rel="stylesheet" href="{{ URL::asset('css/production.css') }}"/>

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
		<h3 class="panel-title">Izmjeni status proizvodnje</h3>
		<br/>
		<div class="panel panel-default">
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.productions.update', $production->id) }}">
				<fieldset>
                    <label>Ormar: {{ $cabinet->brOrmara . ' ' . $cabinet->naziv }}</label>
					<input type="hidden" name="ormar_id" value="{{ $production->ormar_id }}"/>
					<div>
					
					</div>
					<div class="form-group">
						<table>
							<div class="form-group">
							<tr class="padd1">
								<?php $datum_1 = new DateTime($production->datum);	?>
								<td>Datum isporuke ormara:</td>
								<td><input name="datum" class="date form-control" type="text"  value = "{{ $datum_1->format('d-m-Y') }}"></td>
							</tr>
							<tr class="padd1">
								<td><input name="rijeseno1" type="radio" value="DA" {{ ($production->rijeseno1 == 'DA') ? 'checked' : '' }} />DA <input name="rijeseno1" type="radio" value="NE" {{ ($production->rijeseno1 == 'NE') ? 'checked' : '' }} />NE </td>
								<td>Obrada montažne ploče</td>
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_mp" type="text" value="{{ $production->koment_mp }}" /></td>
							</tr>
							<tr class="padd1">
								<td><input name="rijeseno2" type="radio" value="DA" {{ ($production->rijeseno2 == 'DA') ? 'checked' : '' }} />DA <input name="rijeseno2" type="radio" value="NE" {{ ($production->rijeseno2 == 'NE') ? 'checked' : '' }}  />NE </td>
								<td>Obrada ormara</td>
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_orm" type="text" value="{{  $production->koment_orm }}" /></td>
							</tr>
							<tr class="padd1">
								<td><input name="rijeseno3" type="radio" value="DA" {{ ($production->rijeseno3 == 'DA') ? 'checked' : '' }} />DA <input name="rijeseno3" type="radio" value="NE" {{ ($production->rijeseno3 == 'NE') ? 'checked' : '' }}  />NE </td>
								<td>Rezanje vodiča</td>
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_vod" type="text" value="{{ $production->koment_vod }}" /></td>
							</tr>
							<tr class="padd1">
								<td><input name="rijeseno4" type="radio" value="DA" {{ ($production->rijeseno4 == 'DA') ? 'checked' : '' }}  />DA <input name="rijeseno4" type="radio" value="NE" {{ ($production->rijeseno4 == 'NE') ? 'checked' : '' }}  />NE </td>
								<td>Izrada oznaka</td>
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_ozn" type="text" value="{{ $production->koment_ozn }}" /></td>
							</tr>
							<tr class="padd1">
								<td><input name="rijeseno5" type="radio" value="DA" {{ ($production->rijeseno5 == 'DA') ? 'checked' : '' }}  />DA <input name="rijeseno5" type="radio" value="NE" {{ ($production->rijeseno5 == 'NE') ? 'checked' : '' }}  />NE </td>
								<td>Slaganje montažne ploče</td>
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_slMp" type="text" value="{{ $production->koment_slMp }}" /></td>
							</tr>
							<tr class="padd1">
								<td><input name="rijeseno6" type="radio" value="DA" {{ ($production->rijeseno6 == 'DA') ? 'checked' : '' }} />DA <input name="rijeseno6" type="radio" value="NE" {{ ($production->rijeseno6 == 'NE') ? 'checked' : '' }}  />NE </td>
								<td>Označavanje montažne ploče</td>
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_oznMp" type="text" value="{{ $production->koment_oznMp }}" /></td>
							</tr>
							<tr class="padd1">
								<td><input name="rijeseno7" type="radio" value="DA" {{ ($production->rijeseno7 == 'DA') ? 'checked' : '' }} />DA <input name="rijeseno7" type="radio" value="NE" {{ ($production->rijeseno7 == 'NE') ? 'checked' : '' }}  />NE </td>
								<td>Ožičenje</td>
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_ozic" type="text" value="{{ $production->koment_ozic }}" /></td>
							</tr>
							<tr class="padd1">
								<td><input name="rijeseno8" type="radio" value="DA" {{ ($production->rijeseno8 == 'DA') ? 'checked' : '' }} />DA <input name="rijeseno8" type="radio" value="NE" {{ ($production->rijeseno8 == 'NE') ? 'checked' : '' }}  />NE </td>
								<td>CE QR dokumentacija</td>
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_dok" type="text" value="{{ $production->koment_dok }}" /></td>
							</tr>
							<tr class="padd1">
								<td><input name="rijeseno9" type="radio" value="DA" {{ ($production->rijeseno9 == 'DA') ? 'checked' : '' }} />DA <input name="rijeseno9" type="radio" value="NE" {{ ($production->rijeseno9 == 'NE') ? 'checked' : '' }}  />NE </td>
								<td>Ispitivanje</td>
								<td><input class="form-control" placeholder="Upiši komentar" name="koment_isp" type="text" value="{{ $production->koment_isp }}" /></td>
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
