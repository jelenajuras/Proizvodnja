<link rel="stylesheet" href="{{ URL::asset('css/projects.css') }}"/>

<div class="Jproj" id="myModal" >
   	<div class="Jside-proj">
		<h3 class="">Add user</h3>
		<p class=""><span>1</span>User info</h3>
	</div>
	<div class="Jmain-user">
		<form accept-charset="UTF-8" role="form" method="post" action="{{ route('users.store') }}">
		<fieldset>
			<div class="{{ ($errors->has('first_name')) ? 'has-error' : '' }}">
				<input class="form-control" placeholder="Ime" name="first_name" type="text" value="{{ old('first_name') }}" autofocus />
				{!! ($errors->has('first_name') ? $errors->first('first_name', '<p class="text-danger">:message</p>') : '') !!}
			</div>
			<div class=" {{ ($errors->has('last_name')) ? 'has-error' : '' }}">
				<input class="form-control" placeholder="Prezime" name="last_name" type="text" value="{{ old('last_name') }}" />
				{!! ($errors->has('last_name') ? $errors->first('last_name', '<p class="text-danger">:message</p>') : '') !!}
			</div>
			<div class="{{ ($errors->has('email')) ? 'has-error' : '' }}">
				<input class="form-control" placeholder="E-mail" name="email" type="text" value="{{ old('email') }}">
				{!! ($errors->has('email') ? $errors->first('email', '<p class="text-danger">:message</p>') : '') !!}
			</div>
			<div class="">
				<input class="form-control" placeholder="Broj telefona" name="telefon" type="text" value="{{ old('telefon') }}">
			</div>
			<div class="  {{ ($errors->has('password')) ? 'has-error' : '' }}">
				<input class="form-control" placeholder="Password" name="password" type="password" value="">
				{!! ($errors->has('password') ? $errors->first('password', '<p class="text-danger">:message</p>') : '') !!}
			</div>
			<div class=" {{ ($errors->has('password_confirmation')) ? 'has-error' : '' }}">
				<input class="form-control" placeholder="Potvrdi password" name="password_confirmation" type="password" />
				{!! ($errors->has('password_confirmation') ? $errors->first('password_confirmation', '<p class="text-danger">:message</p>') : '') !!}
			</div>
			<h5>Dozvole</h5>
			@foreach ($roles as $role)
				<div class="checkbox">
					<label>
						<input type="checkbox" name="roles[{{ $role->slug }}]" value="{{ $role->id }}">
						{{ $role->name }}
					</label>
				</div>
			@endforeach
			<hr />
			
			<!--<div class="activ checkbox">
				<label>
					<input name="activate" type="checkbox" value="true" {{ old('activate') == 'true' ? 'checked' : ''}}> Aktivan
				</label>
			</div>-->
			<input name="_token" value="{{ csrf_token() }}" type="hidden">
			<input class="Proj-submit" type="submit" value="create" id="input2">

		</fieldset>
		</form>
    </div>

</div>
<button type="button" class="Jbtn-close" data-dismiss="modal">&times</button>