@extends('layouts.admin')

@section('title', 'Ispravi proizvodni projekt')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <br/>
		<h3 class="panel-title">Ispravi podatke proizvodnog projekta</h3>
		<br/>
		<div class="panel panel-default">
            
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.production_projects.update', $production_project->id ) }}">
                <fieldset>
                    <div class="form-group {{ ($errors->has('id')) ? 'has-error' : '' }}">
                        <text>Broj projekta: {{ $production_project->id }}</text>
						<input type="hidden" class="form-control" placeholder="Broj projekta" name="id" type="text" value="{{ $production_project->id }}" />
                        {!! ($errors->has('id') ? $errors->first('id', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					
					<div class="form-group {{ ($errors->has('naziv')) ? 'has-error' : '' }}">
                        <text>Naziv proizvodnog projekta</text>
						<input class="form-control" placeholder="Naziv proizvodnog projekta" name="naziv" type="text" value="{{ $production_project->naziv }}" />
                        {!! ($errors->has('naziv') ? $errors->first('naziv', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group {{ ($errors->has('projekt_id')) ? 'has-error' : '' }}">
                        <text>Projekt</text>
						<select class="form-control" name="projekt_id" id="sel1">
							<option selected="selected"  value="{{ $production_project->projekt_id }}">
									{{ $production_project->project['id'] . ' ' . $production_project->project['naziv'] }}
							</option>
							@foreach ($projects as $project)
								<option name="projekt_id" value=" {{ $project->id }} ">{{  $project->id . ' ' .  $project->investitor . ' ' .  $project->naziv }}</option>
								
							@endforeach
						</select>
							
						 {!! ($errors->has('projekt_id') ? $errors->first('projekt_id', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group {{ ($errors->has('user_id')) ? 'has-error' : '' }}">
					<text>Voditelj projekta</text>
						<select class="form-control" name="user_id" id="sel1">
							<option selected="selected"  value="{{ $production_project->user_id }}">
									{{ $production_project->user['first_name'] . ' ' . $production_project->user['last_name'] }}
							</option>
							@foreach ($users as $user)
								<option name="user_id" value="{{$user->id}} ">{{ $user->first_name . ' ' . $user->last_name }}</option>
							@endforeach
						</select>
						 {!! ($errors->has('user_id') ? $errors->first('user_id', '<p class="text-danger">:message</p>') : '') !!}
					</div>	 
					{{ csrf_field() }}
					{{ method_field('PUT') }}	 
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Ispravi projekt" id="input2">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
