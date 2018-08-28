<link rel="stylesheet" href="{{ URL::asset('css/projects.css') }}"/>

<div class="Jproj1" id="myModal" >

	<div class="Jside-proj">
		<h3 class="">Add new project</h3>
		<p class=""><span>1</span>Project info</h3>
	</div>

	<div class="Jmain-proj">
		<form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.projects.store') }}">
			<fieldset>
				<div class="{{ ($errors->has('id')) ? 'has-error' : '' }}">
					<p>project number</p>
					<input class="" placeholder="Broj projekta" name="id" type="p" value="{{ old('id') }}" autofocus required/>
					{!! ($errors->has('id') ? $errors->first('id', '<p class="p-danger">:message</p>') : '') !!}
				</div>
				<div class="{{ ($errors->has('customer_id')) ? 'has-error' : '' }}">
					<p>client</p>
					<select class="" name="customer_id" id="sel1" required>
						<option disabled selected value></option>
						@foreach (DB::table('customers')->orderBy('naziv','ASC')->get() as $customer)
							<option name="customer_id" value="{{$customer->id }}">{{ $customer->naziv }}</option>
						@endforeach
					</select>
					{!! ($errors->has('customer_id') ? $errors->first('customer_id', '<p class="p-danger">:message</p>') : '') !!}
				</div>
				<div class="">
					<p>investor</p>
					<select class="" name="investitor_id"  id="sel1">
						<option disabled selected value></option>
						@foreach (DB::table('customers')->get() as $customer)
							<option name="investitor_id" value="{{$customer->id}}">{{ $customer->naziv }}</option>
						@endforeach
					</select>
				</div>
				<div class="{{ ($errors->has('user_id')) ? 'has-error' : '' }}">
				<p>project leader</p>
					<select class="" name="user_id" id="sel1" required>
						<option disabled selected value> </option>
						@foreach ($users as $user)
							<option name="user_id" value=" {{ $user->id}} ">{{ $user->first_name . ' ' . $user->last_name }}</option>
						@endforeach
					</select>
					 {!! ($errors->has('user_id') ? $errors->first('user_id', '<p class="p-danger">:message</p>') : '') !!}
				</div>	 
				
				<div class="{{ ($errors->has('objekt')) ? 'has-error' : '' }}">
					<p>object</p>
				   <input class=""  placeholder="Naziv objekta"  name="objekt" id="projekt-name"></input>
					{!! ($errors->has('objekt') ? $errors->first('objekt', '<p class="p-danger">:message</p>') : '') !!}
				</div>
				<div class="{{ ($errors->has('naziv')) ? 'has-error' : '' }}">
					<p>project name</p>
				   <textarea rows="3" wrap="hard" placeholder="Naziv projekta"  name="naziv" id="projekt-name" required></textarea>
					{!! ($errors->has('naziv') ? $errors->first('naziv', '<p class="p-danger">:message</p>') : '') !!}
				</div>

				<input name="_token" value="{{ csrf_token() }}" type="hidden">
				<input class="Proj-submit" type="submit" value="add">
			</fieldset>
		</form>
	</div>
</div>
<button type="button" class="Jbtn-close" data-dismiss="modal">&times</button>