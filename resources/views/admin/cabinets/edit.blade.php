<link rel="stylesheet" href="{{ URL::asset('css/cabinets.css') }}"/>
	
<div class="tabCab" id="myModal">
	<button type="button" class="Jbtn-close" data-dismiss="modal">&times</button>
	<div class="tabCab1" id="tabCab1" >
		<p>Edit enclocure</p>
		<p><span class="step">1</span>Basic info</p>
		<p><span class="step">2</span>Enclosure info</p>
		<p><span class="step">3</span>Enclosure info 2</p>
		<p><span class="step">4</span>Enclosure info 3</p>
		<p><span class="step">5</span>Finalizing</p>
	</div>
	<form id="regForm"  accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.cabinets.update', $cabinet->id) }}">
		<div class="tab">
			<p>enclosure number: {{ $cabinet->brOrmara }}</p>
			<p>project:</p>
				<div class="{{ ($errors->has('projekt_id')) ? 'has-error' : '' }}">
					<select  name="projekt_id" value="{{ $cabinet->projekt_id }}" oninput="this.className = ''"  autofocus >
						<option selected="selected"  value="{{ $cabinet->projekt_id }}">{{ $cabinet->projekt_id . ' - '. $cabinet->projekt['naziv'] }}</option>
							@if (Sentinel::check() && Sentinel::inRole('priprema') || Sentinel::inRole('proizvodnja') || Sentinel::inRole('administrator') )
								@foreach ($projects_all as $project_all)
								<option name="projekt_id" value=" {{$project_all->id}}">{{ $project_all->id . ' - ' . $project_all->investitor . ', ' . $project_all->naziv }}</option>
								@endforeach		
							@else
								@foreach ($projects as $project)
									<option name="projekt_id" value=" {{$project->id}}">{{ $project->id . ' - ' . $project->naziv }}</option>
								@endforeach
							@endif
					</select>
					{!! ($errors->has('projekt_id') ? $errors->first('projekt_id', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<p>designed by:</p>
				<div class="{{ ($errors->has('projektirao_id')) ? 'has-error' : '' }}" >
					<select  name="projektirao_id" oninput="this.className = ''" >
						<option selected="selected" value="{{ $cabinet->projektirao_id}}">{{  $cabinet->projektirao_user['first_name'] . ' ' . $cabinet->projektirao_user['last_name']}}</option>
							@foreach ($users as $user)
								<option name="projektirao_id" value=" {{ $user->id}} ">{{ $user->first_name . ' ' . $user->last_name }}</option>
							@endforeach
					</select>
					 {!! ($errors->has('projektirao_id') ? $errors->first('projektirao_id', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<p>enclosure approved by:</p>
				<div>
					<select  name="odobrio_id" oninput="this.className = ''" >
						<option selected="selected" value="{{ $cabinet->odobrio_id}}">{{ $cabinet->odobrio_user['first_name'] . ' ' . $cabinet->odobrio_user['last_name']}}</option>
							@foreach ($users as $user)
								<option name="odobrio_id" value=" {{ $user->id}} ">{{ $user->first_name . ' ' . $user->last_name }}</option>
							@endforeach
					</select>
				</div>	
				<p>date of delivery of the enclosure:</p>
				<div class="Jdate">
					<input name="datum_isporuke" class="date" type="text" value = "{{ date('d-m-Y', strtotime($cabinet->datum_isporuke)) }}" oninput="this.className = ''" >
					{!! ($errors->has('datum_isporuke') ? $errors->first('datum_isporuke', '<p class="text-danger">:message</p>') : '') !!}
					<i class="fas fa-calendar-alt"></i>
				</div>
				  <script type="text/javascript">
					$('.date').datepicker({  
					   format: 'dd-mm-yyyy',
					   startDate:'-60y',
					   endDate:'+1y',
					}); 
					</script>
				<p>manufacturer of cabinets:</p>
				<div>
					<select  name="proizvodjac" value="{{ old('proizvodjac') }}" id="proizvodjac" oninput="this.className = ''" >
						<option {!! ($cabinet->proizvodjac == 'ABB' ? 'selected' : '') !!} >ABB</option>
						<option {!! ($cabinet->proizvodjac == 'Eaton' ? 'selected' : '') !!}>Eaton</option>
						<option {!! ($cabinet->proizvodjac == 'Filko' ? 'selected' : '') !!}>Filko</option>
						<option {!! ($cabinet->proizvodjac == 'Rittal' ? 'selected' : '') !!}>Rittal</option>
						<option {!! ($cabinet->proizvodjac == 'Schneider' ? 'selected' : '') !!}>Schneider</option>
						<option {!! ($cabinet->proizvodjac == 'Schrack' ? 'selected' : '') !!}>Schrack</option>
						<option {!! ($cabinet->proizvodjac == 'Siemens' ? 'selected' : '') !!}>Siemens</option>
						<option {!! ($cabinet->proizvodjac == 'Slobodan odabir' ? 'selected' : '') !!}>Slobodan odabir</option>
						<option value="{{$cabinet->proizvodjac}}" selected>{{$cabinet->proizvodjac}}</option>
					</select>
					{!! ($errors->has('proizvodjac') ? $errors->first('proizvodjac', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<div>
					<input name="proizvodjac" class="editOption1" placeholder="Unesi drugog proizvođača" type="text" value="{{ old('proizvodjac') }}" style="display:none;"></input>
				</div>
		</div>
		<div class="tab">
			<p >equipment manufacturer:</p> 
			<div class="Equip clearfix">
				<div>
					<label class="container">ABB
						<input type="checkbox" name="proizvodjacOpr_1" value="ABB" oninput="this.className = ''" {!! (in_array('ABB',$proizvodjacOpr)? 'checked' : '') !!}>
						<span class="checkmark"></span>
					</label>
					<label class="container">Eaton
						<input type="checkbox" name="proizvodjacOpr_2" value="Eaton" oninput="this.className = ''"  {!! (in_array('Eaton',$proizvodjacOpr)? 'checked' : '') !!}>
						<span class="checkmark"></span>
					</label>
					<label class="container">Rittal
						<input type="checkbox" name="proizvodjacOpr_3" value="Rittal" oninput="this.className = ''" {!! (in_array('Rittal',$proizvodjacOpr)? 'checked' : '') !!}>
						<span class="checkmark"></span>
					</label>
					<label class="container">Schneider
						<input type="checkbox" name="proizvodjacOpr_4" value="Schneider" oninput="this.className = ''" {!! (in_array('Schneider',$proizvodjacOpr)? 'checked' : '') !!}>
						<span class="checkmark"></span>
					</label>
				</div>
				<div>
					<label class="container">Schrack
						<input type="checkbox" name="proizvodjacOpr_5" value="Schrack" oninput="this.className = ''" {!! (in_array('Schrack',$proizvodjacOpr)? 'checked' : '') !!}>
						<span class="checkmark"></span>
					</label>
					<label class="container">Siemens
						<input type="checkbox" name="proizvodjacOpr_6" value="Siemens" oninput="this.className = ''" {!! (in_array('Siemens',$proizvodjacOpr)? 'checked' : '') !!}>
						<span class="checkmark"></span>
					</label>
					<label class="container">Free choice
						<input type="checkbox" name="proizvodjacOpr_7" value="Slobodan odabir" oninput="this.className = ''" {!! (in_array('Slobodan odabir',$proizvodjacOpr)? 'checked' : '') !!}>
						<span class="checkmark"></span>
					</label>
				</div>
				
			</div>
			<p style="padding-top: 5px;">name of enclosure (KKS):</p>
			<div>
				<input name="naziv" type="text" value="{{ $cabinet->naziv  }}" oninput="this.className = ''"/>
				{!! ($errors->has('naziv') ? $errors->first('naziv', '<p class="text-danger">:message</p>') : '') !!}
			</div>
			<p>dimensions of cabinet (width x height x depth):</p>
			<div>
				<input  placeholder="[mm]" name="velicina" type="text" value="{{ $cabinet->velicina }}" oninput="this.className = ''"/>
				{!! ($errors->has('velicina') ? $errors->first('velicina', '<p class="text-danger">:message</p>') : '') !!}
			</div>
			<p>enclosure layout:</p>
			<div>
				<select  name="izvedba" value="{{ old('izvedba') }}" oninput="this.className = ''">
					<option {!! ($cabinet->izvedba == 'Samostojeći' ? 'selected' : '') !!} >Samostojeći</option>
					<option {!! ($cabinet->izvedba == 'Nazidni' ? 'selected' : '') !!}>Nazidni</option>
					<option {!! ($cabinet->izvedba == 'Ukopni' ? 'selected' : '') !!}>Ukopni</option>
				</select>
			</div>
			<p>type:</p>
			<div>
				<select  name="tip" value="{{ old('tip') }}" oninput="this.className = ''">
					<option {!! ($cabinet->tip == 'Razvodni' ? 'selected' : '') !!} >Razvodni</option>
					<option {!! ($cabinet->tip == 'Razvodno-upravljački' ? 'selected' : '') !!} >Razvodno-upravljački</option>
					<option {!! ($cabinet->tip == 'Upravljačko-mjerni' ? 'selected' : '') !!} >Upravljačko-mjerni</option>
					<option {!! ($cabinet->tip == 'Mjerni' ? 'selected' : '') !!} >Mjerni</option>
					<option {!! ($cabinet->tip == 'MCC' ? 'selected' : '') !!} >MCC</option>
				</select>
			</div>
		</div>
		<div class="tab">
			<p>door design:</p>
			<div class="{{ ($errors->has('model')) ? 'has-error' : '' }}">
				<select  name="model" value="{{ old('model') }}" oninput="this.className = ''">
					<option {!! ($cabinet->model == 'Jednokrilni desni' ? 'selected' : '') !!} >Jednokrilni desni</option>
					<option {!! ($cabinet->model == 'Jednokrilni lijevi' ? 'selected' : '') !!} >Jednokrilni lijevi</option>
					<option {!! ($cabinet->model == 'Dvokrilni desni' ? 'selected' : '') !!} >Dvokrilni desni</option>
					<option {!! ($cabinet->model == 'Dvokrilni lijevi' ? 'selected' : '') !!} >Dvokrilni lijevi</option>
					<option {!! ($cabinet->model == 'Dvokrilni x2 desni' ? 'selected' : '') !!} >Dvokrilni x2 desni</option>
					<option {!! ($cabinet->model == 'Dvokrilni x2 lijevi' ? 'selected' : '') !!} >Dvokrilni x2 lijevi</option>
				</select>
				{!! ($errors->has('model') ? $errors->first('model', '<p class="text-danger">:message</p>') : '') !!}
			</div>
			<p>material:</p>
			<div class="{{ ($errors->has('materijal')) ? 'has-error' : '' }}">
				<select  name="materijal" value="{{ old('materijal') }}" oninput="this.className = ''">
					<option {!! ($cabinet->materijal == 'Čelični' ? 'selected' : '') !!}>Čelični</option>
					<option {!! ($cabinet->materijal == 'Inox' ? 'selected' : '') !!}>Inox</option>
					<option {!! ($cabinet->materijal == 'Poliesterski' ? 'selected' : '') !!}>Poliesterski</option>
					<option {!! ($cabinet->materijal == 'Aluminijski' ? 'selected' : '') !!}>Aluminijski</option>
				</select>
				{!! ($errors->has('materijal') ? $errors->first('materijal', '<p class="text-danger">:message</p>') : '') !!}
			</div>
			<p>nominal voltage [V]:</p>
			<div>
				<input  name="napon" type="text" value="{{ $cabinet->napon }}" oninput="this.className = ''"/>
				{!! ($errors->has('napon') ? $errors->first('napon', '<p class="text-danger">:message</p>') : '') !!}
			</div>
			<p>controlling voltage [V]:</p>
			<div>
				<input  name="kontrolni_napon" type="text" value="{{ $cabinet->kontrolni_napon }}" oninput="this.className = ''"/>
				{!! ($errors->has('kontrolni_napon') ? $errors->first('kontrolni_napon', '<p class="text-danger">:message</p>') : '') !!}
			</div>
			<p>rated current [A]:</p>
			<div>
				<input name="struja" type="text" value="{{ $cabinet->struja }}" oninput="this.className = ''"/>
				{!! ($errors->has('struja') ? $errors->first('struja', '<p class="text-danger">:message</p>') : '') !!}
			</div>
		</div>
		<div class="tab">
			<p style="display:inline-block;">breaking power</p><span> [kA]:</span>
			<div>
				<input  name="prekidna_moc" type="text" value="{{ $cabinet->prekidna_moc }}" oninput="this.className = ''" />
				{!! ($errors->has('prekidna_moc') ? $errors->first('prekidna_moc', '<p class="text-danger">:message</p>') : '') !!}
			</div>
			<p>protection system:</p>
			<div>
				<select class="protect" name="sustav_zastite" value="{{ old('sustav_zastite') }}" oninput="this.className = ''">
					<option {!! ($cabinet->sustav_zastite == 'TN-S' ? 'selected' : '') !!} >TN-S</option>
					<option {!! ($cabinet->sustav_zastite == 'TN-C' ? 'selected' : '') !!} >TN-C</option>
					<option {!! ($cabinet->sustav_zastite == 'TN-C/S' ? 'selected' : '') !!} >TN-C/S</option>
					<option {!! ($cabinet->sustav_zastite == 'TT' ? 'selected' : '') !!} >TT</option>
					<option {!! ($cabinet->sustav_zastite == 'IT' ? 'selected' : '') !!} >IT</option>
				</select>
			</div>
			<p>IP protection cabinets:</p>
			<div class="ip">
				<span>IP</span><input class="ip1" id="ip1" placeholder="upiši broj" name="ip_zastita" type="text" value="{{ substr_replace($cabinet->ip_zastita,'',0,2) }}" oninput="this.className = ''"/>
				{!! ($errors->has('ip_zastita') ? $errors->first('ip_zastita', '<p class="text-danger">:message</p>') : '') !!}
			</div>
			<p>cable entry:</p>
			<div>
				<select name="ulaz_kabela" value="{{ old('ulaz_kabela') }}" id="test" oninput="this.className = ''">
					<option class="non" {!! ($cabinet->ulaz_kabela == 'Uvodnice gore' ? 'selected' : '') !!} >Uvodnice gore</option>
					<option class="non" {!! ($cabinet->ulaz_kabela == 'Uvodnice dolje' ? 'selected' : '') !!}>Uvodnice dolje</option>
					<option class="editable" {!! ($ulaz_kabela == 'Otvor u krovu' ? 'selected' : '') !!}>Otvor u krovu</option>
					<option class="editable" {!! ($ulaz_kabela == 'Otvor u podnici' ? 'selected' : '') !!}>Otvor u podnici</option>
					<option class="editable" {!! ($ulaz_kabela == 'Otvor - bočna lijeva stranica' ? 'selected' : '') !!}>Otvor - bočna lijeva stranica</option>
					<option class="editable" {!! ($ulaz_kabela == 'Otvor - bočna desna stranica' ? 'selected' : '') !!}>Otvor - bočna desna stranica</option>
				</select>
			</div>
			<div>
				<input class="editOption" style="display:none;" name="kab_dimenzija" placeholder="upiši dimenziju (ŠxV) u mm" {!! ( !$kab_dimenzija ? 'style="display:none"' : '' ) !!} value="{{ $kab_dimenzija }}" ></input>
			</div>
			
			<p>logo on the enclosure:</p>
			<div class="logo">
				<input type="radio" name="logo" value="Logo Duplico" {{ ($cabinet->logo == 'Logo Duplico') ? 'checked' : '' }}> DA - Duplico logo<br>
				<input type="radio" name="logo" value="Logo Naručitelj" {{ ($cabinet->logo == 'Logo Naručitelj') ? 'checked' : '' }}> DA - Naručiteljev logo<br>
				<input type="radio" name="logo" value="NE" {{ ($cabinet->logo == 'NE') ? 'checked' : '' }}> NE
			</div>
		</div>
		<div class="tab">
			<p class="note">note:</>
			<div>
				<textarea rows="4" cols="50" name="napomena" type="text" value="{{ $cabinet->napomena }}" ></textarea>
			</div>
			
		</div>
		<div style="overflow:auto;">
		<div style="float:right;">
		
		
		<button type="button" id="prevBtn" onclick="nextPrev(-1)">Back</button>
		<button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
		<input name="_token" value="{{ csrf_token() }}" type="hidden">
		<input class="Jsubmit" id="submit" type="submit">

		</div>
		</div>
	  
	</form>
</div>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
	// This function will display the specified tab of the form...
	var x = document.getElementsByClassName("tab");
	x[n].style.display = "block";
	//... and fix the Previous/Next buttons:
	if (n == 0) {
	document.getElementById("prevBtn").style.display = "none";
	document.getElementById("submit").style.display = "none";
	} else {
	document.getElementById("prevBtn").style.display = "inline";
	document.getElementById("submit").style.display = "none";
	}
	if (n == (x.length - 2)) {
	document.getElementById("submit").style.display= "inline";
	document.getElementById("submit").innerHTML = "Submit";
	document.getElementById("nextBtn").style.display = "none";
	} else {
	document.getElementById("nextBtn").innerHTML = "Next";
	}
	//... and run a function that will display the correct step indicator:
	fixStepIndicator(n)
}

function nextPrev(n) {
	// This function will figure out which tab to display
	var x = document.getElementsByClassName("tab");
	// Exit the function if any field in the current tab is invalid:
	if (n == 1 && !validateForm()) return false;
		
	// Hide the current tab:
	x[currentTab].style.display = "none";
	// Increase or decrease the current tab by 1:
	currentTab = currentTab + n;
	// if you have reached the end of the form...
	if (currentTab >= x.length) {
	// ... the form gets submitted:
	document.getElementById("regForm").submit();
	return false;
	}
	// Otherwise, display the correct tab:
	showTab(currentTab);
}

function validateForm() {
	// This function deals with validation of the form fields
	var x, y, i, valid = true;
	x = document.getElementsByClassName("tab");
	y = x[currentTab].querySelectorAll("input, select");

	// A loop that checks every input field in the current tab:

	for (i = 0; i < y.length; i++) {
	// If a field is empty...
		if (y[i].value == ''  && y[i].className != 'editOption1' && y[i].className != 'editOption') {
		  // add an "invalid" class to the field:
		  y[i].className += ' invalid'
		  // and set the current valid status to false
		  valid = false
		}
	}

	// If the valid status is true, mark the step as finished and valid:
	if (valid) {
	document.getElementsByClassName('step')[currentTab].className += ' finish'
	}
	return valid // return the valid status
}


function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

<!-- dodavanje dimenzije za kanale -->
<script>
	var initialText = $('.editable').val();
	$('#test').change(function(){
	var selected = $('option:selected', this).attr('class');
	var optionText = $('.editable').text();
	if(selected == "editable"){
	  $('.editOption').show();
	}else{
	  $('.editOption').hide();
	  
	}
	});
	
</script>
<script>
	var initialText = $('.editable1').val();
	$('#proizvodjac').change(function(){
	var selected = $('option:selected', this).attr('class');
	var optionText = $('.editable1').text();
	if(selected == "editable1"){
	  $('.editOption1').show();
	}else{
	  $('.editOption1').hide();
	  
	}
	});
	
</script>