<link rel="stylesheet" href="{{ URL::asset('css/projects.css') }}"/>

<div class="Jproj" id="myModal" >
    <div class="Jside-proj">
		<h3 class="">Add new client</h3>
		<p class=""><span>1</span>Client info</h3>
	</div>
	<br/>
	<div class="Jmain-proj">
		<form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.customers.update', $customer->id) }}">
			<fieldset>
				<text>Naziv firme</text>
				<div class=" {{ ($errors->has('naziv')) ? 'has-error' : '' }}">
					<input class="form-control" name="naziv" type="text" value="{{ $customer->naziv}}" required/>
					{!! ($errors->has('naziv') ? $errors->first('naziv', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<text>Adresa</text>
				<div class=" {{ ($errors->has('adresa')) ? 'has-error' : '' }}">
					<input class="form-control" name="adresa" type="text" value="{{ $customer->adresa }}" required/>
					{!! ($errors->has('adresa') ? $errors->first('adresa', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<text>Grad</text>
				<div class=" {{ ($errors->has('grad')) ? 'has-error' : '' }}">
					<input class="form-control" name="grad" type="text" value="{{ $customer->grad }}" required/>
					{!! ($errors->has('grad') ? $errors->first('grad', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<text>OIB</text>
				<div class=" {{ ($errors->has('oib')) ? 'has-error' : '' }}">
					<input class="form-control" name="oib" type="text" value="{{ $customer->oib }} " required/>
					{!! ($errors->has('oib') ? $errors->first('oib', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<input name="_token" value="{{ csrf_token() }}" type="hidden">
				<input class="Proj-submit" type="submit" value="edit">
			</fieldset>
		</form>
    </div>
</div>
<button type="button" class="Jbtn-close" data-dismiss="modal">&times</button>