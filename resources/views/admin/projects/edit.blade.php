@extends('layouts.admin')

@section('title', 'Promjene podataka projekta')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <br/>
		<h3 class="panel-title">Promjeni podatke o projektu</h3>
		<br/>
		<div class="panel panel-default">
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.projects.update', $project->id) }}">
                <fieldset>
						<div class="form-group {{ ($errors->has('id')) ? 'has-error' : '' }}">
						<text>Broj projekta</text>
                        <input class="form-control" placeholder="Broj projekta" name="id" type="text" value="{{ $project->id }}" />
                        {!! ($errors->has('id') ? $errors->first('id', '<p class="text-danger">:message</p>') : '') !!}
						</div>
                    <div class="form-group">
						<text>Naručitelj</text>
						<select class="form-control" name="customer_id" id="sel1">	
							@if ($project->customer_id)
								<option selected="selected"  value="{{ $project->customer_id }}">
									{{$project->narucitelj['naziv']}}
								</option>
								<option value="0"></option>
							@else
								<option selected="selected" value="0"></option>
							@endif
							@foreach (DB::table('customers')->get() as $customer)
								<option name="customer_id" value=" {{$customer->id}} ">{{ $customer->naziv }}</option>
							@endforeach
						</select>
						{!! ($errors->has('customer_id') ? $errors->first('customer_id', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
						<text>Investitor</text>
						<select class="form-control" name="investitor_id" value="" id="sel1">
							@if ($project->investitor_id)
							<option selected="selected" value="{{ $project->investitor_id }}">
								{{$project->investitor['naziv']}}
							</option>
							<option value="0"></option>
							@else
								<option selected="selected" value="0"></option>
							@endif
							@foreach (DB::table('customers')->get() as $customer)
								<option name="investitor_id" value=" {{$customer->id}} ">{{ $customer->naziv }}</option>
							@endforeach	
						</select>
						{!! ($errors->has('investitor_id') ? $errors->first('investitor_id', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="form-group {{ ($errors->has('naziv')) ? 'has-error' : '' }}">
					   <text>Naziv projekta</text>
                       <textarea class="form-control" name="naziv" id="projekt-name" >{{ $project->naziv }}</textarea>
					   {!! ($errors->has('naziv') ? $errors->first('naziv', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group {{ ($errors->has('objekt')) ? 'has-error' : '' }}">
					   <text>Naziv objekta</text>
                       <textarea class="form-control" name="objekt" id="projekt-name" >{{ $project->objekt }}</textarea>
					   {!! ($errors->has('objekt') ? $errors->first('objekt', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					
					
					{{ csrf_field() }}
					{{ method_field('PUT') }}
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Unesi promjene" id="input2">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
