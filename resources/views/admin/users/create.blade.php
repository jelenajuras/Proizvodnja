<link rel="stylesheet" href="{{ URL::asset('css/user.css') }}"/>

<div class="Juser" >
	<button type="button" class="Jbtn-close" data-dismiss="modal">&times</button>
   	<div>
		<div class="Jside-user" id="tabCab1">
			<h3 class="">Add new user</h3>
			<button class="tablinks" onclick="openCity(event, 'user_info')" style="border:none;background-color: #f3f5f7;" id="defaultOpen"><span id="link1">1</span>User info</button>
			<button class="tablinks" onclick="openCity(event, 'permitions')" style="border:none;background-color: #f3f5f7;"><span id="link2">2</span>Permitions</button>
		</div>
		<div class="Jmain-user">
			<form accept-charset="UTF-8" role="form" method="post" action="{{ route('users.store') }}" enctype="multipart/form-data" id="form">
				<div id="user_info" class="tabcontent">
					<button type="button" class="tablinks Jbtn-next" onclick="openCity(event, 'permitions')"><a href="#link2" onclick="check_values('email');">next</a></button>
					<p class="av1">Avatar</p>
						<div class="avatar">
						<img id="output" style="height: auto;"/></div>
						<div class="avatar1">
							<label for="files"><span>click to upload</span><span> .png .jpg</span></label>
							<input id="files" accept="image/*" onchange="loadFile(event)" style="visibility:hidden;" type="file" name="avatar"/>
						</div>
					<p>name</p>
					<div class="{{ ($errors->has('first_name')) ? 'has-error' : '' }}">
						<input class="form-control" placeholder="Ime" name="first_name" type="text" value="{{ old('first_name') }}" autofocus required />
						{!! ($errors->has('first_name') ? $errors->first('first_name', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<p>surname</p>
					<div class=" {{ ($errors->has('last_name')) ? 'has-error' : '' }}">
						<input class="form-control" placeholder="Prezime" name="last_name" type="text" value="{{ old('last_name') }}" required />
						{!! ($errors->has('last_name') ? $errors->first('last_name', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<p>email</p>
					<div class="{{ ($errors->has('email')) ? 'has-error' : '' }}">
						<input id="new_user_email" class="form-control" placeholder="E-mail" name="email" type="text" value="{{ old('email') }}" required>
						{!! ($errors->has('email') ? $errors->first('email', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<p>phone</p>
					<div class="">
						<input class="form-control" placeholder="Broj telefona" name="telefon" type="text" value="{{ old('telefon') }}" required>
					</div>
				</div>
				<div id="permitions" class="tabcontent">
					<button type="button" class="tablinks Jbtn-back" onclick="error_state = false; openCity(event, 'user_info')"><a href="#link1">back</a></button>
					<p style="padding:0;">permitions</p>
					@foreach ($roles as $role)
						<div class="checkbox">
							<label class="container">{{ $role->name }}
							  <input type="checkbox" name="roles[{{ $role->slug }}]" value="{{ $role->id }}">
							  <span class="checkmark"></span>
							</label>
						</div>						
					@endforeach
					<p>password</p>
					<div class="  {{ ($errors->has('password')) ? 'has-error' : '' }}">
						<input id="input_password" class="form-control" placeholder="Password" name="password" type="password" value="" required>
						{!! ($errors->has('password') ? $errors->first('password', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<p>repeat password</p>
					<div class=" {{ ($errors->has('password_confirmation')) ? 'has-error' : '' }}">
						<input id="input_repeat_password" class="form-control" placeholder="Potvrdi password" name="password_confirmation" type="password" required />
						{!! ($errors->has('password_confirmation') ? $errors->first('password_confirmation', '<p class="text-danger">:message</p>') : '') !!}
					</div>

					<!--<div class="activ checkbox">
						<label>
							<input name="activate" type="checkbox" value="true" {{ old('activate') == 'true' ? 'checked' : ''}}> Aktivan
						</label>
					</div>-->
					<input name="_token" value="{{ csrf_token() }}" type="hidden">
					<input class="Proj-submit" type="submit" value="add" id="input2" onclick="if(!check_values('password')) return false;">
				</div>
			</form>
		</div>
	</div>
</div>



<script>
var error_state = false;
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
		
		if(!error_state)
		{
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
	}

	// Get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click();
</script>

<script>
function check_values(type)
{
	if(type == "email")
	{
		var email = document.getElementById("new_user_email").value;
		if(!validateEmail(email))
		{
			alert('email nije ispravan');
			error_state = true;
			return false;
		}
		else
		{
			error_state = false;
			return true;
		}
	}
	else if(type == "password")
	{
		var pass1 = document.getElementById("input_password").value;
		var pass2 = document.getElementById("input_repeat_password").value;
		if(pass1.length < 6)
		{
			alert('lozinka mora sadržavati minimalno 6 znakova');
			error_state = true;
			return false;
		}
		else if(pass1 != pass2)
		{
			alert('lozinke se ne podudaraju');
			error_state = true; 
			return false;
		}
		else
		{
			error_state = false;
			return true;
		}
	}
}
function validateEmail(email) 
{
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
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