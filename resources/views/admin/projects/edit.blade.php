<link rel="stylesheet" href="{{ URL::asset('css/projects.css') }}"/>

<div class="Jproj" id="myModal" >
    <div class="Jside-proj">
		<h3 class="">Edit project</h3>
		<button class="tablinks" onclick="openCity(event, 'basic')" style="border:none;background-color: #f3f5f7;" id="defaultOpen"><span id="link1">1</span>Project info</button>
		<button class="tablinks" onclick="openCity(event, 'info1')" style="border:none;background-color: #f3f5f7;"><span id="link2">2</span>Contact</button>
	</div>
	<div class="Jmain-proj">
		<div id="basic" class="tabcontent">
		<form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.projects.update', $project->id) }}">
			<fieldset>
				<div class="{{ ($errors->has('id')) ? 'has-error' : '' }}">
				<text>Broj projekta</text>
				<input class="" placeholder="Broj projekta" name="id" type="text" value="{{ $project->id }}" />
				{!! ($errors->has('id') ? $errors->first('id', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<div class="">
					<text>Naručitelj</text>
					<select class="" name="customer_id" id="sel1">	
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
				<div class="">
					<text>Investitor</text>
					<select class="" name="investitor_id" value="" id="sel1">
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
				<div class="{{ ($errors->has('naziv')) ? 'has-error' : '' }}">
				   <text>Naziv projekta</text>
				   <textarea class="" name="naziv" id="projekt-name" >{{ $project->naziv }}</textarea>
				   {!! ($errors->has('naziv') ? $errors->first('naziv', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<div class="{{ ($errors->has('objekt')) ? 'has-error' : '' }}">
				   <text>Naziv objekta</text>
				   <textarea class="" name="objekt" id="projekt-name" >{{ $project->objekt }}</textarea>
				   {!! ($errors->has('objekt') ? $errors->first('objekt', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<div class="{{ ($errors->has('user_id')) ? 'has-error' : '' }}">
				<text>Voditelj projekta</text>
					<select class="" name="user_id" id="sel1">
						<option selected="selected" value="{{ $project->user_id }}">
						{{ $project->user['first_name'] . ' '. $project->user['last_name']}} </option>
						@foreach ($users as $user)
							<option name="user_id" value=" {{ $user->id}} ">{{ $user->first_name . ' ' . $user->last_name }}</option>
						@endforeach
					</select>
					 {!! ($errors->has('user_id') ? $errors->first('user_id', '<p class="text-danger">:message</p>') : '') !!}
				</div>	
				
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<input name="_token" value="{{ csrf_token() }}" type="hidden">
				<input class="Proj-submit" type="submit" value="edit" id="input2">
			</fieldset>
		</form>
		</div>
		<div id="info1" class="tabcontent">
			<form accept-charset="UTF-8" role="form" method="post" action="{{ route('users.store') }}">
				<fieldset>
					<p>Ime:</p>
					<div class="{{ ($errors->has('first_name')) ? 'has-error' : '' }}">
						<input placeholder="Ime" name="first_name" type="text" value="{{ old('first_name') }}" autofocus />
						{!! ($errors->has('first_name') ? $errors->first('first_name', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<p>Prezime:</p>
					<div class=" {{ ($errors->has('last_name')) ? 'has-error' : '' }}">
						<input placeholder="Prezime" name="last_name" type="text" value="{{ old('last_name') }}" />
						{!! ($errors->has('last_name') ? $errors->first('last_name', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<p>e-mail:</p>
					<div class="{{ ($errors->has('email')) ? 'has-error' : '' }}">
						<input placeholder="E-mail" name="email" type="text" value="{{ old('email') }}">
						{!! ($errors->has('email') ? $errors->first('email', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<p>Telefon:</p>
					<div>
						<input placeholder="Broj telefona" name="telefon" type="text" value="{{ old('telefon') }}">
					</div>
					<p>Lozinka:</p>
					<div class="  {{ ($errors->has('password')) ? 'has-error' : '' }}">
						<input placeholder="Password" name="password" type="password" value="">
						{!! ($errors->has('password') ? $errors->first('password', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<p>Potvrdi lozinku:</p>
					<div class=" {{ ($errors->has('password_confirmation')) ? 'has-error' : '' }}">
						<input placeholder="Potvrdi password" name="password_confirmation" type="password" />
						{!! ($errors->has('password_confirmation') ? $errors->first('password_confirmation', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					
					<div class="dozvola">
						<p>Dozvola</p>
							<label>{{ 'Pristup stranici' }}</label>
								<input type="checkbox" name=" roles[{{ 'kupac' }}]" value="{{ '4' }}">
						</div>
					<hr />	
					<input name="productionProject_id" value="{{ $project->id }}" type="hidden">
					<!--<div class="activ checkbox">
						<label>
							<input name="activate" type="checkbox" value="true" {{ old('activate') == 'true' ? 'checked' : ''}}> Aktivan
						</label>
					</div>-->
					<input name="_token" value="{{ csrf_token() }}" type="hidden">
					<input class="Proj-submit" type="submit" value="add">

				</fieldset>
			</form>
		</div>
    </div>
</div>
<button type="button" class="Jbtn-close" data-dismiss="modal">&times</button>
<script>
	function openCity(evt, cityName) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
	}

	// Get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click();
</script>
	
<script>
	// Add active class to the current button (highlight it)
	var header = document.getElementById("tabCab1");
	var btns = header.getElementsByClassName("tablinks");
	for (var i = 0; i < btns.length; i++) {
	  btns[i].addEventListener("click", function() {
		var current = document.getElementsByClassName("active");
		current[0].className = current[0].className.replace(" active", "");
		this.className += " active";
	  });
	}
</script>
