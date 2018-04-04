@extends('layouts.admin')

@section('title', 'Novi ormar')

@section('content')

<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-xs-offset-1 col-sm-offset-1 ">
        <br/>
		<h3 class="panel-title">Upiši novi ormar</h3>
		<br/>
		<div class="panel panel-default">
            
            <div class="panel-body">
				<form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.cabinets.store') }}">
					<fieldset>
						<div class="col-lg-6">
							<label>Broj ormara:</label>
							<div class="form-group {{ ($errors->has('id')) ? 'has-error' : '' }}">
								<input class="form-control" placeholder="Broj ormara" name="id" type="text" value="{{ old('id') }}" />
								{!! ($errors->has('id') ? $errors->first('id', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Projekt:</label>
							<div class="form-group {{ ($errors->has('projekt_id')) ? 'has-error' : '' }}">
								<select class="form-control" name="projekt_id" id="sel1">
									<option disabled selected value></option>
									@foreach ($projects as $project)
										<option name="projekt_id" value=" {{$project->id}}">{{ $project->id . ' ' . $project->naziv . ' (' . $project->brProjekta . ' - ' .  $project->nazivProjekta . ')' }}</option>
									@endforeach
								</select>
								{!! ($errors->has('projekt_id') ? $errors->first('projekt_id', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Proizvođač:</label>
							<div class="form-group">
								<select class="form-control" name="proizvodjac" value="{{ old('proizvodjac') }}">
									<option value="0"></option>
									<option>ABB</option>
									<option>Eaton</option>
									<option>Rittal</option>
									<option>Schneider</option>
									<option>Schrack</option>
									<option>Siemens</option>
								</select>
								{!! ($errors->has('proizvodjac') ? $errors->first('proizvodjac', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<!--<label> Drugi proizvođač:</label>
							<div class="form-group">
								<input class="form-control" placeholder="Proizvođač" name="proizvodjac" type="text" value="{{ old('proizvodjac') }}">
							</div>-->
							<label>Naziv ormara (KKS):</label>
							<div class="form-group">
								<input class="form-control" placeholder="Naziv" name="naziv" type="text" value="{{ old('naziv') }}" />
								{!! ($errors->has('naziv') ? $errors->first('naziv', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Veličina ormara:</label>
							<div class="form-group">
								<input class="form-control" placeholder="Veličina" name="velicina" type="text" value="{{ old('velicina') }}" />
								{!! ($errors->has('velicina') ? $errors->first('velicina', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Izvedba:</label>
							<div class="form-group">
								<input class="form-control" placeholder="Izvedba" name="tip" type="text" value="{{ old('tip') }}" />
								{!! ($errors->has('tip') ? $errors->first('tip', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Model ormara:</label>
							<div class="form-group {{ ($errors->has('model')) ? 'has-error' : '' }}">
								<select class="form-control" name="model" value="{{ old('model') }}">
									<option>Jednokrilni - desni</option>
									<option>Jednokrilni - lijevi</option>
									<option>Dvokrilni - desni</option>
									<option>Dvokrilni - lijevi</option>
								</select>
								{!! ($errors->has('model') ? $errors->first('model', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Materijal:</label>
							<div class="form-group {{ ($errors->has('materijal')) ? 'has-error' : '' }}">
								<select class="form-control" name="materijal" value="{{ old('materijal') }}">
									<option>Čelični</option>
									<option>Inox</option>
									<option>Plastični</option>
									<option>Aluminijski</option>
								</select>
								{!! ($errors->has('materijal') ? $errors->first('materijal', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Tip:</label>
							<div class="form-group {{ ($errors->has('izvedba')) ? 'has-error' : '' }}">
								<select class="form-control" name="izvedba" value="{{ old('izvedba') }}">
									<option>Samostojeći</option>
									<option>Nazidni</option>
									<option>Ukopni</option>
								</select>
								{!! ($errors->has('izvedba') ? $errors->first('izvedba', '<p class="text-danger">:message</p>') : '') !!}
							</div>
						</div>
						<div class="col-lg-6">
							<label>Nazivni napon:</label>
							<div class="form-group">
								<input class="form-control" placeholder="napon" name="napon" type="text" value="{{ old('napon') }}" />
								{!! ($errors->has('napon') ? $errors->first('napon', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Nazivna struja:</label>
							<div class="form-group">
								<input class="form-control" placeholder="Struja" name="struja" type="text" value="{{ old('struja') }}" />
								{!! ($errors->has('struja') ? $errors->first('struja', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Prekidna moć:</label>
							<div class="form-group">
								<input class="form-control" placeholder="Prekidna moć" name="prekidna_moc" type="text" value="{{ old('prekidna_moc') }}" />
								{!! ($errors->has('prekidna_moc') ? $errors->first('prekidna_moc', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Sustav zaštite:</label>
							<div class="form-group">
								<input class="form-control" placeholder="Sustav zaštite" name="sustav_zastite" type="text" value="{{ old('sustav_zastite') }}"/>
								{!! ($errors->has('sustav_zastite') ? $errors->first('sustav_zastite', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>IP zaštita ormara:</label>
							<div class="form-group">
								<input class="form-control" placeholder="IP zaštita ormara" name="ip_zastita" type="text" value="{{ old('ip_zastita') }}"/>
								{!! ($errors->has('ip_zastita') ? $errors->first('ip_zastita', '<p class="text-danger">:message</p>') : '') !!}
							</div>
						</div>
						<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 ">
						<input name="_token" value="{{ csrf_token() }}" type="hidden">
						<input class="btn btn-lg btn-primary pull-right" type="submit" value="Upiši ormar" id="input2">
						</div>
					</fieldset>
				</form>
			</div>
		</div>
    </div>
</div>
@stop
