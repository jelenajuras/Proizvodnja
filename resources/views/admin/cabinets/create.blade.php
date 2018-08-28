<link rel="stylesheet" href="{{ URL::asset('css/cabinets.css') }}"/>
	
<div class="tabCab" id="myModal">
	<button type="button" class="Jbtn-close" data-dismiss="modal">&times</button>
	<div class="tabCab1" >
		<p>Add new enclosure</p>
		<p><span class="step">1</span>Basic info</p>
		<p><span class="step">2</span>Enclosure info</p>
		<p><span class="step">3</span>Enclosure info 2</p>
		<p><span class="step">4</span>Enclosure info 3</p>
		<p><span class="step">5</span>Finalizing</p>
	</div>
	<form id="regForm"  accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.cabinets.store') }}">
		<div class="tab">
			<p>project:</p>
				<div class="{{ ($errors->has('projekt_id')) ? 'has-error' : '' }}">
					<select  name="projekt_id" value="{{ old('projekt_id') }}" oninput="this.className = ''"  autofocus >
						<option disabled selected value></option>
						@if (Sentinel::check() && Sentinel::inRole('priprema') || Sentinel::inRole('proizvodnja') || Sentinel::inRole('administrator') )
							@foreach ($projects_all as $project_all)
							<option name="projekt_id" value="{{ $project_all->id}}">{{ $project_all->id . ' - ' . $project_all->investitor . ', ' . $project_all->naziv }}</option>
							@endforeach		
						@else
							@foreach ($projects as $project)
								<option name="projekt_id" value=" {{ $project->id}}">{{ $project->id . ' - ' . $project->investitor . ', ' . $project->naziv }}</option>
							@endforeach
						@endif
					</select>
					{!! ($errors->has('projekt_id') ? $errors->first('projekt_id', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<p>designed by:</p>
				<div class="{{ ($errors->has('projektirao_id')) ? 'has-error' : '' }}" >
					<select  name="projektirao_id" oninput="this.className = ''" >
						<option disabled selected value></option>
						@foreach ($users as $user)
							<option name="projektirao_id" value=" {{ $user->id}} ">{{ $user->first_name . ' ' . $user->last_name }}</option>
						@endforeach
					</select>
					 {!! ($errors->has('projektirao_id') ? $errors->first('projektirao_id', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<p>enclosure approved by:</p>
				<div>
					<select  name="odobrio_id" oninput="this.className = ''" >
						<option disabled selected value></option>
						@foreach ($users as $user)
							<option name="odobrio_id" value=" {{ $user->id}} ">{{ $user->first_name . ' ' . $user->last_name }}</option>
						@endforeach
					</select>
				</div>	
				<p>date of delivery of the enclosure:</p>
				<div class="Jdate">
					<input name="datum_isporuke" class="date" type="text" value = "{{ Carbon\Carbon::now()->format('d-m-Y') }}" oninput="this.className = ''" >
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
						<option disabled selected value></option>
						<option>ABB</option>
						<option>Eaton</option>
						<option>Filko</option>
						<option>Rittal</option>
						<option>Schneider</option>
						<option>Schrack</option>
						<option>Siemens</option>
						<option>Slobodan odabir</option>
						<option class="editable1" value="0">Unos drugog proizvođača...</option>
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
						<input type="checkbox" name="proizvodjacOpr_1" value="ABB" oninput="this.className = ''">
						<span class="checkmark"></span>
					</label>
					<label class="container">Eaton
						<input type="checkbox" name="proizvodjacOpr_2" value="Eaton" oninput="this.className = ''">
						<span class="checkmark"></span>
					</label>
					<label class="container">Rittal
						<input type="checkbox" name="proizvodjacOpr_3" value="Rittal" oninput="this.className = ''">
						<span class="checkmark"></span>
					</label>
					<label class="container">Schneider
						<input type="checkbox" name="proizvodjacOpr_4" value="Schneider" oninput="this.className = ''">
						<span class="checkmark"></span>
					</label>
				</div>
				<div>
					<label class="container">Schrack
						<input type="checkbox" name="proizvodjacOpr_5" value="Schrack" oninput="this.className = ''">
						<span class="checkmark"></span>
					</label>
					<label class="container">Siemens
						<input type="checkbox" name="proizvodjacOpr_6" value="Siemens" oninput="this.className = ''">
						<span class="checkmark"></span>
					</label>
					<label class="container">Free choice
						<input type="checkbox" name="proizvodjacOpr_7" value="Slobodan odabir" oninput="this.className = ''">
						<span class="checkmark"></span>
					</label>
				</div>
				
			</div>
			<p style="padding-top: 5px;">name of enclosure (KKS):</p>
			<div>
				<input name="naziv" type="text" value="{{ old('naziv') }}" oninput="this.className = ''"/>
				{!! ($errors->has('naziv') ? $errors->first('naziv', '<p class="text-danger">:message</p>') : '') !!}
			</div>
			<p>dimensions of cabinet (width x height x depth):</p>
			<div>
				<input  placeholder="[mm]" name="velicina" type="text" value="{{ old('velicina') }}" oninput="this.className = ''"/>
				{!! ($errors->has('velicina') ? $errors->first('velicina', '<p class="text-danger">:message</p>') : '') !!}
			</div>
			<p>enclosure layout:</p>
			<div>
				<select  name="izvedba" value="{{ old('izvedba') }}" oninput="this.className = ''">
					<option disabled selected value></option>
					<option>Samostojeći</option>
					<option>Nazidni</option>
					<option>Ukopni</option>
				</select>
			</div>
			<p>type:</p>
			<div>
				<select  name="tip" value="{{ old('tip') }}" oninput="this.className = ''">
					<option disabled selected value></option>
					<option>Razvodni</option>
					<option>Razvodno-upravljački</option>
					<option>Upravljačko-mjerni</option>
					<option>Mjerni</option>
					<option>MCC</option>
				</select>
			</div>
		</div>
		<div class="tab">
			<p>door design:</p>
			<div class="{{ ($errors->has('model')) ? 'has-error' : '' }}">
				<select  name="model" value="{{ old('model') }}" oninput="this.className = ''">
					<option disabled selected value></option>
					<option>Jednokrilni desni</option>
					<option>Jednokrilni lijevi</option>
					<option>Dvokrilni desni</option>
					<option>Dvokrilni lijevi</option>
					<option>Dvokrilni x2 desni</option>
					<option>Dvokrilni x2 lijevi</option>
				</select>
				{!! ($errors->has('model') ? $errors->first('model', '<p class="text-danger">:message</p>') : '') !!}
			</div>
			<p>material:</p>
			<div class="{{ ($errors->has('materijal')) ? 'has-error' : '' }}">
				<select  name="materijal" value="{{ old('materijal') }}" oninput="this.className = ''">
					<option disabled selected value></option>
					<option>Čelični</option>
					<option>Inox</option>
					<option>Poliesterski</option>
					<option>Aluminijski</option>
				</select>
				{!! ($errors->has('materijal') ? $errors->first('materijal', '<p class="text-danger">:message</p>') : '') !!}
			</div>
			<p>nominal voltage [V]:</p>
			<div>
				<input  name="napon" type="text" value="{{ old('napon') }}" oninput="this.className = ''"/>
				{!! ($errors->has('napon') ? $errors->first('napon', '<p class="text-danger">:message</p>') : '') !!}
			</div>
			<p>controlling voltage [V]:</p>
			<div>
				<input  name="kontrolni_napon" type="text" value="{{ old('kontrolni_napon') }}" oninput="this.className = ''"/>
				{!! ($errors->has('kontrolni_napon') ? $errors->first('kontrolni_napon', '<p class="text-danger">:message</p>') : '') !!}
			</div>
			<p>rated current [A]:</p>
			<div>
				<input name="struja" type="text" value="{{ old('struja') }}" oninput="this.className = ''"/>
				{!! ($errors->has('struja') ? $errors->first('struja', '<p class="text-danger">:message</p>') : '') !!}
			</div>
		</div>
		<div class="tab">
			<p style="display:inline-block;">breaking power</p><span> [kA]:</span>
			<div>
				<input  name="prekidna_moc" type="text" value="{{ old('prekidna_moc') }}" oninput="this.className = ''" />
				{!! ($errors->has('prekidna_moc') ? $errors->first('prekidna_moc', '<p class="text-danger">:message</p>') : '') !!}
			</div>
			<p>protection system:</p>
			<div>
				<select class="protect" name="sustav_zastite" value="{{ old('sustav_zastite') }}" oninput="this.className = ''">
					<option disabled selected value></option>
					<option>TN-S</option>
					<option>TN-C</option>
					<option>TN-C/S</option>
					<option>TT</option>
					<option>IT</option>
				</select>
			</div>
			<p>IP protection cabinets:</p>
			<div class="ip">
				<span>IP</span><input class="ip1" id="ip1" placeholder="upiši broj" name="ip_zastita" type="text" value="{{ old('ip_zastita') }}" oninput="this.className = ''"/>
				{!! ($errors->has('ip_zastita') ? $errors->first('ip_zastita', '<p class="text-danger">:message</p>') : '') !!}
			</div>
			<p>cable entry:</p>
			<div>
				<select name="ulaz_kabela" value="{{ old('ulaz_kabela') }}" id="test" oninput="this.className = ''">
					<option disabled selected value></option>
					<option class="non">Uvodnice gore</option>
					<option class="non">Uvodnice dolje</option>
					<option class="editable">Otvor u krovu za kabele</option>
					<option class="editable">Otvor u podnici</option>
					<option class="editable">Otvor - bočna lijeva stranica</option>
					<option class="editable">Otvor - bočna desna stranica</option>
				</select>
			</div>
			<div>
				<input class="editOption" style="display:none;" name="kab_dimenzija" placeholder="upiši dimenziju (ŠxV) u mm"></input>
			</div>
			
			<p>logo on the enclosure:</p>
			<div class="logo">
				<input type="radio" name="logo" value="Logo Duplico"><span>Yes, Duplico logo</span>
				<input type="radio" name="logo" value="Logo Naručitelj"><span>Yes, client logo </span>
				<input type="radio" name="logo" value="NE" checked><span>No</span>
			</div>
		</div>
		<div class="tab">
			<p class="note">note:</>
			<div>
				<textarea rows="4" cols="50" name="napomena" type="text" value="{{ old('napomena') }}" ></textarea>
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