<link rel="stylesheet" href="{{ URL::asset('css/projects.css') }}"/>

<div class="Jproj" id="myModal" >
<button type="button" class="Jbtn-close" data-dismiss="modal">&times</button>
   	<div class="Jside-proj">
		<h3 class="">Edit role</h3>
		<p class=""><span>1</span>Role info</h3>
	</div>
	<div class="Jmain-role">
		<form accept-charset="UTF-8" role="form" method="post" action="{{ route('roles.update', $role->id) }}">
			<fieldset>
				<div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
					<input class="form-control" placeholder="Naziv" name="name" type="text" value="{{ $role->name }}" />
					{!! ($errors->has('name') ? $errors->first('name', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<div class="form-group {{ ($errors->has('slug')) ? 'has-error' : '' }}">
					<input class="form-control" placeholder="slug" name="slug" type="text" value="{{ $role->slug }}" />
					{!! ($errors->has('slug') ? $errors->first('slug', '<p class="text-danger">:message</p>') : '') !!}
				</div>

				<h5>Permissions:</h5>
				<div class="">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[users.create]" value="1" {{ $role->hasAccess('users.create') ? 'checked' : '' }}>
							users.create
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[users.update]" value="1" {{ $role->hasAccess('users.update') ? 'checked' : '' }}>
							users.update
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[users.view]" value="1" {{ $role->hasAccess('users.view') ? 'checked' : '' }}>
							users.view
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[users.destroy]" value="1" {{ $role->hasAccess('users.destroy') ? 'checked' : '' }}>
							users.destroy
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[roles.create]" value="1" {{ $role->hasAccess('roles.create') ? 'checked' : '' }}>
							roles.create
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[roles.update]" value="1" {{ $role->hasAccess('roles.update') ? 'checked' : '' }}>
							roles.update
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[roles.view]" value="1" {{ $role->hasAccess('roles.view') ? 'checked' : '' }}>
							roles.view
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[roles.delete]" value="1" {{ $role->hasAccess('roles.delete') ? 'checked' : '' }}>
							roles.delete
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[customers.create]" value="1" {{ $role->hasAccess('customers.create') ? 'checked' : '' }}>
							customers.create
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[customers.update]" value="1" {{ $role->hasAccess('customers.update') ? 'checked' : '' }}>
							customers.update
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[customers.view]" value="1" {{ $role->hasAccess('customers.view') ? 'checked' : '' }}>
							customers.view
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[customers.delete]" value="1" {{ $role->hasAccess('customers.delete') ? 'checked' : '' }}>
							customers.delete
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[projects.create]" value="1" {{ $role->hasAccess('projects.create') ? 'checked' : '' }}>
							projects.create
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[projects.update]" value="1" {{ $role->hasAccess('projects.update') ? 'checked' : '' }}>
							projects.update
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[projects.view]" value="1" {{ $role->hasAccess('projects.view') ? 'checked' : '' }}>
							projects.view
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[projects.delete]" value="1" {{ $role->hasAccess('projects.delete') ? 'checked' : '' }}>
							projects.delete
						</label>
					</div>
				</div>
				<div class="">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[productions.create]" value="1" {{ $role->hasAccess('productions.create') ? 'checked' : '' }}>
							productions.create
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[productions.update]" value="1" {{ $role->hasAccess('productions.update') ? 'checked' : '' }}>
							productions.update
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[productions.view]" value="1" {{ $role->hasAccess('productions.view') ? 'checked' : '' }}>
							productions.view
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[productions.delete]" value="1" {{ $role->hasAccess('productions.delete') ? 'checked' : '' }}>
							productions.delete
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[cabinets.create]" value="1" {{ $role->hasAccess('cabinets.create') ? 'checked' : '' }}>
							cabinets.create
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[cabinets.update]" value="1" {{ $role->hasAccess('cabinets.update') ? 'checked' : '' }}>
							cabinets.update
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[cabinets.view]" value="1" {{ $role->hasAccess('cabinets.view') ? 'checked' : '' }}>
							cabinets.view
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[cabinets.delete]" value="1" {{ $role->hasAccess('cabinets.delete') ? 'checked' : '' }}>
							cabinets.delete
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[preparations.create]" value="1" {{ $role->hasAccess('preparations.create') ? 'checked' : '' }}>
							preparations.create
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[preparations.update]" value="1" {{ $role->hasAccess('preparations.update') ? 'checked' : '' }}>
							preparations.update
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[preparations.view]" value="1" {{ $role->hasAccess('preparations.view') ? 'checked' : '' }}>
							preparations.view
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[preparations.delete]" value="1" {{ $role->hasAccess('preparations.delete') ? 'checked' : '' }}>
							preparations.delete
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[purchases.create]" value="1" {{ $role->hasAccess('purchases.create') ? 'checked' : '' }}>
							purchases.create
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[purchases.update]" value="1" {{ $role->hasAccess('purchases.update') ? 'checked' : '' }}>
							purchases.update
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[purchases.view]" value="1" {{ $role->hasAccess('purchases.view') ? 'checked' : '' }}>
							purchases.view
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[purchases.delete]" value="1" {{ $role->hasAccess('purchases.delete') ? 'checked' : '' }}>
							purchases.delete
						</label>
					</div>
				</div>
				
				<input name="_token" value="{{ csrf_token() }}" type="hidden">
				<input name="_method" value="PUT" type="hidden">
				<input class="Proj-submit" type="submit" value="edit" id="input2">
			</fieldset>
		</form>
    </div>
</div>
