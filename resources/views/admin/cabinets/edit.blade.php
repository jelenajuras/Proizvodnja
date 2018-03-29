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
								<input class="form-control" placeholder="Broj ormara" name="id" type="text" value="{{ $cabinet->id }}" />
								{!! ($errors->has('id') ? $errors->first('id', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Projekt:</label>
							<div class="form-group {{ ($errors->has('projekt_id')) ? 'has-error' : '' }}">
								<select class="form-control" name="projekt_id" id="sel1">
									<option selected="selected"  value="{{ $cabinet->projekt_id }}">{{ $cabinet->projekt_id }}
									@foreach ($projects as $project)
										<option name="projekt_id" value=" {{$project->id}}">{{ $project->id . ' ' . $project->naziv . ' (' . $project->brProjekta . ' - ' .  $project->nazivProjekta . ')' }}</option>
									@endforeach
								</select>
								{!! ($errors->has('projekt_id') ? $errors->first('projekt_id', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Proizvođač:</label>
							<div class="form-group">
								<input class="form-control" placeholder="Proizvođač" name="proizvodjac" type="text" value="{{ $cabinet->proizvodjac }}" />
								{!! ($errors->has('proizvodjac') ? $errors->first('proizvodjac', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Naziv ormara (KKS):</label>
							<div class="form-group">
								<input class="form-control" placeholder="Naziv" name="naziv" type="text" value="{{ $cabinet->naziv }}" />
								{!! ($errors->has('naziv') ? $errors->first('naziv', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Veličina ormara:</label>
							<div class="form-group">
								<input class="form-control" placeholder="Veličina" name="velicina" type="text" value="{{$cabinet->velicina }}" />
								{!! ($errors->has('velicina') ? $errors->first('velicina', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Izvedba:</label>
							<div class="form-group">
								<input class="form-control" placeholder="Izvedba" name="tip" type="text" value="{{ $cabinet->tip }}" />
								{!! ($errors->has('tip') ? $errors->first('tip', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<label>Model ormara:</label>
							<div class="form-group {{ ($errors->has('model')) ? 'has-error' : '' }}">
								<select class="form-control" name="model" value="{{ old('model') }}">
									<option selected="selected">{{ $cabinet->model }}
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
									<option selected="selected">{{ $cabinet->materijal }}
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
									<option selected="selected">{{ $cabinet->izvedba }}
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
						</div>
						<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 ">
						{{ csrf_field() }}
						{{ method_field('PUT') }}
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
