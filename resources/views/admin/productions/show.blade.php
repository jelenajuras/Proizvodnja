@extends('layouts.admin')

@section('title', 'Proizvodni projekti')

<style>
	body {font-family: "Lato", sans-serif;}

	/* Style the tab */
	.tab {
		overflow: hidden;
		border: 1px solid #ccc;
		background-color: #ff751a;
	}

	/* Style the buttons inside the tab */
	.tab button {
		background-color: inherit;
		float: center;
		border: none;
		outline: none;
		cursor: pointer;
		padding: 10px 10px;
		width: 100px;
		transition: 0.3s;
		font-size: 12px;
	}

	/* Change background color of buttons on hover */
	.tab button:hover {
		background-color: #ddd;
	}

	/* Create an active/current tablink class */
	.tab button.active {
		background-color: #666666;
		color: #ff751a;
		font-weight: bold;
	}

	/* Style the tab content */
	.tabcontent {
		display: none;
		padding: 6px 12px;
		border: 1px solid #ccc;
		border-top: none;
	}

	/* Style the close button */
	.topright {
		float: right;
		cursor: pointer;
		font-size: 28px;
	}

	.topright:hover {color: red;}
	#pomak {
		padding-left: 20px;
	}
	table {
		font-size: 12px;
	}
</style>
@section('content')
	
	<div class="tab">
	  <button class="tablinks" onclick="openCity(event, 'Opći')" id="defaultOpen">Opći podaci</button>
	  <button class="tablinks" onclick="openCity(event, 'Ormari')" id="defaultOpen">Ormari</button>
	  <button class="tablinks" onclick="openCity(event, 'Priprema')" id="defaultOpen">Priprema</button>
	  <button class="tablinks" onclick="openCity(event, 'Nabava')">Nabava</button>
	  <button class="tablinks" onclick="openCity(event, 'Proizvodnja')">Proizvodnja</button>
	</div>
	<!-- Opći podaci projekta -->
	<div id="Opći" class="tabcontent">
		<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
		
		<div class="row">
			<div class="col-xs-6 col-md-8 col-md-10 col-lg-12">
				<div class="panel-heading">
					<h5>{{ 'Naziv proizvodnog projekta: '}}<b>{{ $production->id . ' - ' . $production->naziv }}</b></h5>
					<p>{{ 'Projekt: '}}<b>{{ $production->projekt_id . ' ' . $production->project['naziv'] }}</b></p>
					<p>{{ 'Naručitelj: '}}<b>{{ $production->investitor }}</b></p>
					<p>{{ 'Voditelj projekta: '}}<b>{{ $production->user['first_name'] . ' ' . $production->user['last_name'] }}</b></p>
					<p>{{ 'Kontakti: '}}</p>
					
					<div id="pomak">
						<table>
						@foreach($contacts as $contact)
							<tr>
								<td>
									<p><b>{{ $contact->first_name . ' ' . $contact->last_name }}</b>
									</p>
								</td>
								<td>
									<a href="{{ route('users.edit', $contact->id) }}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Ispravi</a>
								</td>
							</tr>
							<tr>
								<td>
									<p>Telefon: {{ $contact->telefon }}</p>
								</td>	
							</tr>
							<tr>
								<td>
									<p>e-mail: {{ $contact->email }}</p> 
								</td>
							</tr>
							@if(DB::table('role_users')->where('user_id', $contact->id)->first())
							<tr>
								<td>
									<p><ins>Glavni kontakt</ins></p> 
								</td>
							</tr>
							@endif
						@endforeach
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-6 col-md-6 col-lg-4">
				<h4><small>Dodaj novi kontakt</small></h4>
				</br>
					<form accept-charset="UTF-8" role="form" method="post" action="{{ route('customer.contact')}}">
						<fieldset>
							<div>
								<input class="form-control" name="productionProject_id" type="hidden" value="{{ $production->id }}"/>
							</div>
							<div class="form-group {{ ($errors->has('first_name')) ? 'has-error' : '' }}">
								<input class="form-control" placeholder="Ime" name="first_name" type="text" value="{{ old('first_name') }}" />
								{!! ($errors->has('first_name') ? $errors->first('first_name', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<div class="form-group {{ ($errors->has('last_name')) ? 'has-error' : '' }}">
								<input class="form-control" placeholder="Prezime" name="last_name" type="text" value="{{ old('last_name') }}" />
								{!! ($errors->has('last_name') ? $errors->first('last_name', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<div class="form-group {{ ($errors->has('telefon')) ? 'has-error' : '' }}">
								<input class="form-control" placeholder="Broj telefona" name="telefon" type="text" value="{{ old('telefon') }}" />
								{!! ($errors->has('telefon') ? $errors->first('telefon', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
								<input class="form-control" placeholder="E-mail" name="email" type="text" value="{{ old('email') }}">
								{!! ($errors->has('email') ? $errors->first('email', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<div class="form-group  {{ ($errors->has('password')) ? 'has-error' : '' }}">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
								{!! ($errors->has('password') ? $errors->first('password', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<div class="form-group {{ ($errors->has('password_confirmation')) ? 'has-error' : '' }}">
								<input class="form-control" placeholder="Potvrdi password" name="password_confirmation" type="password" />
								{!! ($errors->has('password_confirmation') ? $errors->first('password_confirmation', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<h5>Dozvola</h5>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="roles[{{ $roles->slug }}]" value="{{ $roles->id }}">
										{{ $roles->name . ' (Ima pristup stranici)' }}
									</label>
								</div>
								</br>
							{{ csrf_field() }}
						</fieldset>
						<input class="btn btn-default btn-md" type="submit" value="Unesi kontakt">
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Opći podaci ormara -->
	<div id="Ormari" class="tabcontent">
	  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
	  
	  
	</div>
	
	<div id="Priprema" class="tabcontent">
	  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
	  <h4>Priprema</h4>
	  <p></p>
	</div>

	<div id="Nabava" class="tabcontent">
	  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
	  <h4>Nabava</h4>
	  <p></p> 
	</div>

	<div id="Proizvodnja" class="tabcontent">
	  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
	  <h4>Proizvodnja</h4>
	  <p></p>
	</div>
	
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
@stop
