<link rel="stylesheet" href="{{ URL::asset('css/projects.css') }}"/>

<div class="Jproj" id="myModal" >
<button type="button" class="Jbtn-close" data-dismiss="modal">&times</button>
   	<div class="Jside-proj">
		<h3 class="">Add role</h3>
		<p class=""><span>1</span>Role info</h3>
	</div>
	<div class="Jmain-role">
		<form accept-charset="UTF-8" role="form" method="post" action="{{ route('roles.store') }}">
			<fieldset>
				<div class=" {{ ($errors->has('name')) ? 'has-error' : '' }}">
					<input class="form-control" placeholder="Naziv" name="name" type="text" value="{{ old('name') }}" autofocus/>
					{!! ($errors->has('name') ? $errors->first('name', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<div class=" {{ ($errors->has('slug')) ? 'has-error' : '' }}">
					<input class="form-control" placeholder="slug" name="slug" type="text" value="{{ old('slug') }}" />
					{!! ($errors->has('slug') ? $errors->first('slug', '<p class="text-danger">:message</p>') : '') !!}
				</div>

				<p>Permissions:</p>
				<div class="role">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[users.create]" value="1">
							users.create
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[users.update]" value="1">
							users.update
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[users.view]" value="1">
							users.view
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[users.destroy]" value="1">
							users.destroy
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[roles.create]" value="1">
							roles.create
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[roles.update]" value="1">
							roles.update
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[roles.view]" value="1">
							roles.view
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[roles.delete]" value="1">
							roles.delete
						</label>
					</div>
					<!--<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[posts.create]" value="1">
							posts.create
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[posts.update]" value="1">
							posts.update
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[posts.view]" value="1">
							posts.view
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[posts.delete]" value="1">
							posts.delete
						</label>
					</div>-->
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[customers.create]" value="1">
							customers.create
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[customers.update]" value="1">
							customers.update
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[customers.view]" value="1">
							customers.view
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[customers.delete]" value="1">
							customers.delete
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[projects.create]" value="1">
							projects.create
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[projects.update]" value="1">
							projects.update
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[projects.view]" value="1">
							projects.view
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[projects.delete]" value="1">
							projects.delete
						</label>
					</div>
				</div>
				<div class="">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[productions.create]" value="1">
							productions.create
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[productions.update]" value="1">
							productions.update
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[productions.view]" value="1">
							productions.view
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[productions.delete]" value="1">
							productions.delete
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[cabinets.create]" value="1">
							cabinets.create
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[cabinets.update]" value="1">
							cabinets.update
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[cabinets.view]" value="1">
							cabinets.view
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[cabinets.delete]" value="1">
							cabinets.delete
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[preparations.create]" value="1">
							preparations.create
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[preparations.update]" value="1">
							preparations.update
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[preparations.view]" value="1">
							preparations.view
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[preparations.delete]" value="1">
							preparations.delete
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[purchases.create]" value="1">
							purchases.create
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[purchases.update]" value="1">
							purchases.update
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[purchases.view]" value="1">
							purchases.view
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="permissions[purchases.delete]" value="1">
							purchases.delete
						</label>
					</div>
				</div>
							
				<input name="_token" value="{{ csrf_token() }}" type="hidden">
				<input class="Proj-submit" type="submit" value="create" id="input2">
			</fieldset>
		</form>
			
	</div>
</div>

