<link rel="stylesheet" href="{{ URL::asset('css/projects.css') }}"/>


<div class="Jproj" id="myModal" >

    <div class="Jside-proj">
		<h3 class="">Add new client</h3>
		<p class=""><span>1</span>Client info</h3>
		
	</div>
	<br/>
	<div class="Jmain-proj">
            
		<form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.customers.store') }}">
			<fieldset>
				<div class="{{ ($errors->has('naziv')) ? 'has-error' : '' }}">
				<p>clint name</p>
					<input class="form-control" name="naziv" type="p" value="{{ old('naziv') }}" autofocus />
					{!! ($errors->has('naziv') ? $errors->first('naziv', '<p class="p-danger">:message</p>') : '') !!}
				</div>
				<div class="{{ ($errors->has('adresa')) ? 'has-error' : '' }}">
				<p>address</p>
					<input class="" name="adresa" type="p" value="{{ old('adresa') }}" />
					{!! ($errors->has('adresa') ? $errors->first('adresa', '<p class="p-danger">:message</p>') : '') !!}
				</div>
				<div class="{{ ($errors->has('grad')) ? 'has-error' : '' }}">
				<p>city</p>
					 <input class="form-control" name="grad" type="p" value="{{ old('grad') }}" />
					{!! ($errors->has('grad') ? $errors->first('grad', '<p class="p-danger">:message</p>') : '') !!}
				</div>
				<div class="{{ ($errors->has('oib')) ? 'has-error' : '' }}">
				<p>OIB</p>
					 <input class="" name="oib" type="p" value="{{ old('oib') }}" />
					{!! ($errors->has('oib') ? $errors->first('oib', '<p class="p-danger">:message</p>') : '') !!}
				</div>
				<input name="_token" value="{{ csrf_token() }}" type="hidden">
				<input class="Proj-submit" type="submit" value="add">
			</fieldset>
		</form>
    </div>
</div>
<button type="button" class="Jbtn-close" data-dismiss="modal">&times</button>