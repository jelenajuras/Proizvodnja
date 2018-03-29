@extends('layouts.admin')

@section('title', 'Upis novog naručitelja')

@section('content')
<div class="row" >
    <div class="col-md-6 col-md-offset-3">
        <br/>
		<h3 class="panel-title">Upiši novog naručitelja</h3>
		<br/>
		<div class="panel panel-default">
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.customers.store') }}">
					<fieldset>
						<div class="form-group {{ ($errors->has('naziv')) ? 'has-error' : '' }}">
						<text>Naziv firme</text>
							<input class="form-control" placeholder="Naziv firme" name="naziv" type="text" value="{{ old('naziv') }}" />
							{!! ($errors->has('naziv') ? $errors->first('naziv', '<p class="text-danger">:message</p>') : '') !!}
						</div>
						<div class="form-group {{ ($errors->has('adresa')) ? 'has-error' : '' }}">
						<text>Adresa</text>
							<input class="form-control" placeholder="Adresa" name="adresa" type="text" value="{{ old('adresa') }}" />
							{!! ($errors->has('adresa') ? $errors->first('adresa', '<p class="text-danger">:message</p>') : '') !!}
						</div>
						<div class="form-group {{ ($errors->has('grad')) ? 'has-error' : '' }}">
						<text>Grad</text>
							 <input class="form-control" placeholder="Grad" name="grad" type="text" value="{{ old('grad') }}" />
							{!! ($errors->has('grad') ? $errors->first('grad', '<p class="text-danger">:message</p>') : '') !!}
						</div>
						<div class="form-group {{ ($errors->has('oib')) ? 'has-error' : '' }}">
						<text>OIB</text>
							 <input class="form-control" placeholder="OIB" name="oib" type="text" value="{{ old('oib') }}" />
							{!! ($errors->has('oib') ? $errors->first('oib', '<p class="text-danger">:message</p>') : '') !!}
						</div>
						<input name="_token" value="{{ csrf_token() }}" type="hidden">
						<input class="btn btn-lg btn-primary btn-block" type="submit" value="Upiši naručitelja"  id="input2">
					</fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop