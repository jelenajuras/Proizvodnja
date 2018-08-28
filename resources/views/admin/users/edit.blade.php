<link rel="stylesheet" href="{{ URL::asset('css/user.css') }}"/>

<div class="Juser" >
	<button type="button" class="Jbtn-close" data-dismiss="modal">&times</button>
	<div>
		<div class="Jside-user" id="tabCab1">
			<h3 class="">Edit user</h3>
			<button class="tablinks" onclick="openCity(event, 'user_info')" style="border:none;background-color: #f3f5f7;" id="defaultOpen"><span id="link1">1</span>User info</button>
			<button class="tablinks" onclick="openCity(event, 'permitions')" style="border:none;background-color: #f3f5f7;" id="defaultOpen"><span id="link2">2</span>Permitions</button>
		</div>
		<div class="Jmain-user">
			<form accept-charset="UTF-8" role="form" method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
				<div id="user_info" class="tabcontent">
					<button type="button" class="tablinks Jbtn-next" onclick="openCity(event, 'permitions')"><a href="#link2">next</a></button>
					<p class="av1">Avatar</p>
					<div class="avatar">
					<img id="output" style="max-height: 100%; max-width: 100%;"/></div>
					<div class="avatar1">
						<label for="files"><span>click to upload</span><span> .png .jpg</span></label>
						<input id="files" accept="image/*" onchange="loadFile(event)" style="visibility:hidden;" type="file" name="avatar"/>
					</div>
					<p>name</p>
					<div class=" {{ ($errors->has('first_name')) ? 'has-error' : '' }}">
						<input class="form-control" placeholder="Ime" name="first_name" type="text" value="{{ $user->first_name }}" required/>
						{!! ($errors->has('first_name') ? $errors->first('first_name', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<p>surname</p>
					<div class=" {{ ($errors->has('last_name')) ? 'has-error' : '' }}">
						<input class="form-control" placeholder="Prezime" name="last_name" type="text" value="{{ $user->last_name }}" required/>
						{!! ($errors->has('last_name') ? $errors->first('last_name', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<p>email</p>
					<div class=" {{ ($errors->has('email')) ? 'has-error' : '' }}">
						<input class="form-control" placeholder="E-mail" name="email" type="text" value="{{ $user->email }}" required>
						{!! ($errors->has('email') ? $errors->first('email', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<p>phone</p>
					<div class="">
						<input class="form-control" placeholder="Broj telefona" name="telefon" type="text" value="{{ $user->telefon }}" required>
					</div>
				</div>	
				<div id="permitions" class="tabcontent">
					<button type="button" class="tablinks Jbtn-back" onclick="openCity(event, 'user_info')"><a href="#link1">back</a></button>
					<p style="padding:0;">permitions</p>
					@foreach ($roles as $role)
						<div class="checkbox">
							<label class="container">{{ $role->name }}
							  <input type="checkbox" name="roles[{{ $role->slug }}]" value="{{ $role->id }}" {{ $user->inRole($role) ? 'checked' : '' }}>
							  <span class="checkmark"></span>
							</label>

						</div>
					@endforeach
					<p>password</p>
					<div class="{{ ($errors->has('password')) ? 'has-error' : '' }}">
						<input class="form-control" placeholder="Password" name="password" type="Promjeni password" value="" >
						{!! ($errors->has('password') ? $errors->first('password', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<p>repeat password</p>
					<div class="{{ ($errors->has('password_confirmation')) ? 'has-error' : '' }}">
						<input class="form-control" placeholder="Potvrdi password" name="password_confirmation" type="password" value="{{ old('password_confirmation') }}" />
						{!! ($errors->has('password_confirmation') ? $errors->first('password_confirmation', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					
					

					<input name="_token" value="{{ csrf_token() }}" type="hidden">
					<input name="_method" value="PUT" type="hidden">
					<input class="Proj-submit" type="submit" value="edit" id="input2">
				</div>
			</form>
		</div>
	</div>
<script>
//Preview an image before it is uploaded
$("#files").change(function() {
  filename = this.files[0].name
  console.log(filename);
});
</script>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>

<script>
//open tab
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