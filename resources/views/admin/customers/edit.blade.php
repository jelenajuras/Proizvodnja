@extends('layouts.admin')

@section('title', 'Ispravi podatke naručitelja')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <br/>
		<h3 class="panel-title">Ispravi podatke naručitelja</h3>
		<br/>
		<div class="panel panel-default">
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.customers.update', $customer->id) }}">
                <fieldset>
                    <text>Naziv firme</text>
					<div class="form-group {{ ($errors->has('naziv')) ? 'has-error' : '' }}">
                        <input class="form-control" name="naziv" type="text" value="{{ $customer->naziv}}"/>
                        {!! ($errors->has('naziv') ? $errors->first('naziv', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<text>Adresa</text>
					<div class="form-group {{ ($errors->has('adresa')) ? 'has-error' : '' }}">
                        <input class="form-control" name="adresa" type="text" value="{{ $customer->adresa }} "/>
                        {!! ($errors->has('adresa') ? $errors->first('adresa', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<text>Grad</text>
					<div class="form-group {{ ($errors->has('grad')) ? 'has-error' : '' }}">
                        <input class="form-control" name="grad" type="text" value="{{ $customer->grad }} "/>
                        {!! ($errors->has('grad') ? $errors->first('grad', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<text>OIB</text>
					<div class="form-group {{ ($errors->has('oib')) ? 'has-error' : '' }}">
                        <input class="form-control" name="oib" type="text" value="{{ $customer->oib }} "/>
                        {!! ($errors->has('oib') ? $errors->first('oib', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					{{ csrf_field() }}
					{{ method_field('PUT') }}
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Ispravi podatke"  id="input2">
                </fieldset>
                </form>
					
            </div>
        </div>
    </div>
</div>
@stop
