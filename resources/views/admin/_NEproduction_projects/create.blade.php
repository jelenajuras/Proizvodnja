@extends('layouts.admin')

@section('title', 'Novi proizvodni projekt')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <br/>
		<h3 class="panel-title">Upiši novi proizvodni projekt</h3>
		<br/>
		<div class="panel panel-default">
            
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.production_projects.store') }}">
                <fieldset>
                    <div class="form-group {{ ($errors->has('id')) ? 'has-error' : '' }}">
                        <text>Broj projekta {{ $brojPr }}</text>
						<input  type="hidden" class="form-control" placeholder="{{ $brojPr }}" name="id" type="text" value="{{ $brojPr }}" />
                        {!! ($errors->has('id') ? $errors->first('id', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group {{ ($errors->has('projekt_id')) ? 'has-error' : '' }}">
                        <text>Projekt</text>
						<select class="form-control" name="projekt_id" id="sel1">
							<option disabled selected value> </option>
							@foreach ($projects as $project)
								<option name="projekt_id" value=" {{ $project->id }} ">{{  $project->id . ' ' .  $project->investitor . ' ' .  $project->naziv }}</option>
							@endforeach
						
						</select>
						
						 {!! ($errors->has('projekt_id') ? $errors->first('projekt_id', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group {{ ($errors->has('naziv')) ? 'has-error' : '' }}">
                        <text>Naziv proizvodnog projekta</text>
						<input class="form-control" placeholder="Naziv proizvodnog projekta" name="naziv" type="text" value="{{ old('naziv') }}" />
                        {!! ($errors->has('naziv') ? $errors->first('naziv', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group {{ ($errors->has('user_id')) ? 'has-error' : '' }}">
					<text>Voditelj projekta</text>
						<select class="form-control" name="user_id" id="sel1">
							<option disabled selected value> </option>
							@foreach ($users as $user)
								@if($user->id)
								<option name="user_id" value=" {{ $user->id}} ">{{ $user->first_name . ' ' . $user->last_name }}</option>
							@endforeach
						</select>
						 {!! ($errors->has('user_id') ? $errors->first('user_id', '<p class="text-danger">:message</p>') : '') !!}
					</div>	 
                   <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Upiši projekt" id="input2">
                </fieldset>
                </form>
				
            </div>
        </div>
    </div>
</div>


@stop
