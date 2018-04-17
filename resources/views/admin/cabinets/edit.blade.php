@extends('layouts.admin')

@section('title', 'Ispravi ormar')

@section('content')

<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-xs-offset-1 col-sm-offset-1 ">
        <br/>
		<h3 class="panel-title">Ispravi podatke ormara</h3>
		<br/>
		<div class="panel panel-default">
            <div class="panel-body">
				<form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.cabinets.update', $cabinet->id) }}">
					<fieldset>
						<div class="col-lg-6">
							<label>Broj ormara:</label>
							<div class="form-group {{ ($errors->has('id')) ? 'has-error' : '' }}">
								<input class="form-control" placeholder="Broj ormara" name="brOrmara" type="text" value="{{ $cabinet->brOrmara }}" />
								{!! ($errors->has('id') ? $errors->first('id', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Projektirao ormar: </label>
							<div class="form-group {{ ($errors->has('projektirao_id')) ? 'has-error' : '' }}">
								<select class="form-control" name="projektirao_id" id="sel1">
									<option selected="selected" value="{{ $cabinet->projektirao_id}}">{{ $cabinet->projektirao_user['first_name'] . ' ' . $cabinet->projektirao_user['last_name']}}</option>
									@foreach ($users as $user)
										<option name="projektirao_id" value=" {{ $user->id}} ">{{ $user->first_name . ' ' . $user->last_name }}</option>
									@endforeach
								</select>
								 {!! ($errors->has('projektirao_id') ? $errors->first('projektirao_id', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Odobrio ormar: </label>
							<div class="form-group">
								<select class="form-control" name="odobrio_id" id="sel1">
									<option selected="selected" value="{{ $cabinet->odobrio_id}}">{{ $cabinet->odobrio_user['first_name'] . ' ' . $cabinet->odobrio_user['last_name']}}</option>
									@foreach ($users as $user)
										<option name="odobrio_id" value=" {{ $user->id}} ">{{ $user->first_name . ' ' . $user->last_name }}</option>
									@endforeach
								</select>
							</div>	 
							<label>Projekt:</label>
							<div class="form-group {{ ($errors->has('projekt_id')) ? 'has-error' : '' }}">
								<select class="form-control" name="projekt_id" id="sel1">
									<option selected="selected"  value="{{ $cabinet->projekt_id }}">{{ $cabinet->projekt_id . ' - '. $cabinet->projekt['naziv'] }}
									@foreach ($projects as $project)
										<option name="projekt_id" value=" {{$project->id}}">{{ $project->id . ' - ' . $project->naziv }}</option>
									@endforeach
								</select>
								{!! ($errors->has('projekt_id') ? $errors->first('projekt_id', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<div class="form-group">
								<label>Datum isporuke ormara: </label>
								<input name="datum_isporuke" class="date form-control" type="text" value ="{{ date('d-m-Y', strtotime($cabinet->datum_isporuke)) }}">
								{!! ($errors->has('datum_isporuke') ? $errors->first('datum_isporuke', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<script type="text/javascript">
								$('.date').datepicker({  
								   format: 'dd-mm-yyyy',
								   startDate:'-60y',
								   endDate:'+1y'
								}); 
							</script> 
							<label>Proizvođač ormara:</label>
							<div class="form-group">
								<select class="form-control" name="proizvodjac">
									<option selected="selected">{{ $cabinet->proizvodjac }}
									<option>ABB</option>
									<option>Eaton</option>
									<option>Filko</option>
									<option>Rittal</option>
									<option>Schneider</option>
									<option>Schrack</option>
									<option>Siemens</option>
									<option>Slobodan odabir</option>
								</select>
								{!! ($errors->has('proizvodjac') ? $errors->first('proizvodjac', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Proizvođač opreme:</label>
							<div class="form-group">
								<select class="form-control" name="proizvodjacOpr">
									<option selected="selected">{{ $cabinet->proizvodjacOpr }}
									<option>ABB</option>
									<option>Eaton</option>
									<option>Rittal</option>
									<option>Schneider</option>
									<option>Schrack</option>
									<option>Siemens</option>
									<option>Slobodan odabir</option>
								</select>
							</div>
							<label>Naziv ormara (KKS):</label>
							<div class="form-group">
								<input class="form-control" placeholder="Naziv" name="naziv" type="text" value="{{ $cabinet->naziv }}" />
								{!! ($errors->has('naziv') ? $errors->first('naziv', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Veličina ormara:</label>
							<div class="form-group">
								<input class="form-control" placeholder="Veličina" name="velicina" type="text" value="{{ $cabinet->velicina }}" />
								{!! ($errors->has('velicina') ? $errors->first('velicina', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Izvedba:</label>
							<div class="form-group">
								<select class="form-control" name="izvedba">
									<option selected="selected">{{ $cabinet->izvedba }}	
									<option>Samostojeći</option>
									<option>Nazidni</option>
									<option>Ukopni</option>
								</select>
							</div>
							<label>Tip:</label>
							<div class="form-group">
								<select class="form-control" name="tip">
									<option selected="selected">{{ $cabinet->tip }}
									<option>Razvodni</option>
									<option>Upravljački</option>
									<option>MCC</option>
								</select>
							</div>
							<label>Izvedba vrata:</label>
							<div class="form-group {{ ($errors->has('model')) ? 'has-error' : '' }}">
								<select class="form-control" name="model">
									<option selected="selected">{{ $cabinet->model }}
									<option>Jednokrilni desni</option>
									<option>Jednokrilni lijevi</option>
									<option>Dvokrilni desni</option>
									<option>Dvokrilni lijevi</option>
									<option>Dvokrilni x2 desni</option>
									<option>Dvokrilni x2 lijevi</option>
								</select>
								{!! ($errors->has('model') ? $errors->first('model', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Materijal:</label>
							<div class="form-group {{ ($errors->has('materijal')) ? 'has-error' : '' }}">
								<select class="form-control" name="materijal">
									<option selected="selected">{{ $cabinet->materijal }}
									<option>Čelični</option>
									<option>Inox</option>
									<option>Plastični</option>
									<option>Aluminijski</option>
								</select>
								{!! ($errors->has('materijal') ? $errors->first('materijal', '<p class="text-danger">:message</p>') : '') !!}
							</div>
						</div>
						<div class="col-lg-6">
							<label>Nazivni napon:</label>
							<div class="form-group">
								<input class="form-control" placeholder="napon" name="napon" type="text" value="{{ $cabinet->napon }}" />
								{!! ($errors->has('napon') ? $errors->first('napon', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Nazivna struja:</label>
							<div class="form-group">
								<input class="form-control" placeholder="Struja" name="struja" type="text" value="{{ $cabinet->struja }}" />
								{!! ($errors->has('struja') ? $errors->first('struja', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Prekidna moć:</label>
							<div class="form-group">
								<input class="form-control" placeholder="Prekidna moć" name="prekidna_moc" type="text" value="{{ $cabinet->prekidna_moc }}" />
								{!! ($errors->has('prekidna_moc') ? $errors->first('prekidna_moc', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Sustav zaštite:</label>
							<div class="form-group">
								<input class="form-control" placeholder="Sustav zaštite" name="sustav_zastite" type="text" value="{{ $cabinet->sustav_zastite }}"/>
								{!! ($errors->has('sustav_zastite') ? $errors->first('sustav_zastite', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>IP zaštita ormara:</label>
							<div class="form-group">
								<input class="form-control" placeholder="IP zaštita ormara" name="ip_zastita" type="text" value="{{ $cabinet->ip_zastita }}"/>
								{!! ($errors->has('ip_zastita') ? $errors->first('ip_zastita', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Ulaz kanala:</label>
							<div class="form-group">
								<select class="form-control" name="ulaz_kabela" value="{{ $cabinet->ulaz_kabela }}" id="test">
									<option class="non">Uvodnice gore</option>
									<option class="non">Uvodnice dolje</option>
									<option class="editable">Otvor u krovu</option>
									<option class="editable">Otvor u podnici</option>
									<option class="editable">Otvor bočno lijevo</option>
									<option class="editable">Otvor bočno desno</option>
								</select>
							</div>
							<div class="form-group">
								<input class="editOption form-control" style="display:none;" name="kab_dimenzija" placeholder="upiši dimenziju (ŠxV) u mm"></input>
							</div>
						
							<label>Opisne oznake na vrata ormara</label>
							<div class="form-group">
								<input type="radio" name="oznake" value="DA" {{ ($cabinet->oznake == 'DA') ? 'checked' : '' }}> DA<br>
								<input type="radio" name="oznake" value="NE" {{ ($cabinet->oznake == 'NE') ? 'checked' : '' }}> NE
							</div>
							<label>Logo na ormaru</label>
							<div class="form-group"">
								<input type="radio" name="logo" value="Logo Duplico" {{ ($cabinet->logo == 'Logo Duplico') ? 'checked' : '' }}> DA - Duplico logo<br>
								<input type="radio" name="logo" value="Logo Naručitelj" {{ ($cabinet->logo == 'Logo Naručitelj') ? 'checked' : '' }}> DA - Naručiteljev logo<br>
								<input type="radio" name="logo" value="NE" {{ ($cabinet->logo == 'NE') ? 'checked' : '' }}> NE
							</div>
							<label>Napomena:</label>
							<div class="form-group">
								<input class="form-control" placeholder="Napomena" name="napomena" type="text" value="{{ $cabinet->napomena }}" />
							</div>
							<div>
							{{ csrf_field() }}
							{{ method_field('PUT') }}
							<input name="_token" value="{{ csrf_token() }}" type="hidden">
							<input class="button btn btn-md btn-default pull-right" type="submit" value="Ispravi podatke ormara" >
						</div>
						</div>
						
					</fieldset>
					
				</form>
				<!-- dodavanje dimenzije za kanale -->
				<script>
					var initialText = $('.editable').val();
					$('#test').change(function(){
					var selected = $('option:selected', this).attr('class');
					var optionText = $('.editable').text();

					if(selected == "editable"){
					  $('.editOption').show();
					}else{
					  $('.editOption').hide();
					  
					}
					});
					
				</script>
			</div>
		</div>
    </div>
</div>
@stop
