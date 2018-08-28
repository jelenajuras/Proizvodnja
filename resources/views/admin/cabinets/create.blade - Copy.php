<link rel="stylesheet" href="{{ URL::asset('css/cabinets.css') }}"/>
<div class="tabCab" id="myModal">
<button type="button" class="Jbtn-close" data-dismiss="modal">&times</button>
	<div>
		<div class="tabCab1" id="tabCab1">
			<p>Add new enclosure</p>
			<button class="tablinks" onclick="openCity(event, 'basic')" style="border:none;background-color: #f3f5f7;" id="defaultOpen"><span id="link1">1</span>Basic info</button>
			<button class="tablinks" onclick="openCity(event, 'info1')" style="border:none;background-color: #f3f5f7;"><span id="link2">2</span>Enclosure info</button>
			<button class="tablinks" onclick="openCity(event, 'info2')" style="border:none;background-color: #f3f5f7;"><span id="link3">3</span>Enclosure info 2</button>
			<button class="tablinks" onclick="openCity(event, 'info3')" style="border:none;background-color: #f3f5f7;"><span id="link4">4</span>Enclosure info 3</button>
			<button class="tablinks" onclick="openCity(event, 'finalizing')" style="border:none;background-color: #f3f5f7;"><span id="link5">5</span>Finalizing</button>
		</div>
		<form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.cabinets.store') }}">
		
			<div id="basic" class="tabcontent">
				<button type="button" class="tablinks Jbtn-next" onclick="openCity(event, 'info1')"><a href="#link1">next</a></button>

				<p>project:</p>
				<div class="{{ ($errors->has('projekt_id')) ? 'has-error' : '' }}">
					<select  name="projekt_id" id="sel1" value="{{ old('projekt_id') }}" autofocus required>
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
				<div class="{{ ($errors->has('projektirao_id')) ? 'has-error' : '' }}" required>
					<select  name="projektirao_id" id="sel1">
						<option disabled selected value></option>
						@foreach ($users as $user)
							<option name="projektirao_id" value=" {{ $user->id}} ">{{ $user->first_name . ' ' . $user->last_name }}</option>
						@endforeach
					</select>
					 {!! ($errors->has('projektirao_id') ? $errors->first('projektirao_id', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<p>enclosure approved by:</p>
				<div>
					<select  name="odobrio_id" id="sel1">
						<option disabled selected value></option>
						@foreach ($users as $user)
							<option name="odobrio_id" value=" {{ $user->id}} ">{{ $user->first_name . ' ' . $user->last_name }}</option>
						@endforeach
					</select>
				</div>	
				<p>date of delivery of the enclosure:</p>
				<div class="Jdate">
					<input name="datum_isporuke" class="date" type="text" value = "{{ Carbon\Carbon::now()->format('d-m-Y') }}" required>
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
					<select  name="proizvodjac" value="{{ old('proizvodjac') }}" id="proizvodjac" required>
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

			<div id="info1" class="tabcontent">
				<button type="button" class="tablinks Jbtn-back" onclick="openCity(event, 'basic')"><a href="#link1">back</a></button>
				<button type="button" class="tablinks Jbtn-next" onclick="openCity(event, 'info2')"><a href="#link2">next</a></button>
					<p>equipment manufacturer:</p> 
					<div class="Equip clearfix">
						<div>
							<label class="container">ABB
								<input type="checkbox" name="proizvodjacOpr_1" value="ABB">
								<span class="checkmark"></span>
							</label>
							<label class="container">Eaton
								<input type="checkbox" name="proizvodjacOpr_2" value="Eaton">
								<span class="checkmark"></span>
							</label>
							<label class="container">Rittal
								<input type="checkbox" name="proizvodjacOpr_3" value="Rittal">
								<span class="checkmark"></span>
							</label>
							<label class="container">Schneider
								<input type="checkbox" name="proizvodjacOpr_4" value="Schneider">
								<span class="checkmark"></span>
							</label>
						</div>
						<div>
							<label class="container">Schrack
								<input type="checkbox" name="proizvodjacOpr_5" value="Schrack">
								<span class="checkmark"></span>
							</label>
							<label class="container">Siemens
								<input type="checkbox" name="proizvodjacOpr_6" value="Siemens">
								<span class="checkmark"></span>
							</label>
							<label class="container">Free choice
								<input type="checkbox" name="proizvodjacOpr_7" value="Slobodan odabir">
								<span class="checkmark"></span>
							</label>
						</div>
						
					</div>
					<p>name of enclosure (KKS):</p>
					<div>
						<input name="naziv" type="text" value="{{ old('naziv') }}" required/>
						{!! ($errors->has('naziv') ? $errors->first('naziv', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<p>dimensions of cabinet (width x height x depth):</p>
					<div>
						<input  placeholder="[mm]" name="velicina" type="text" value="{{ old('velicina') }}" required/>
						{!! ($errors->has('velicina') ? $errors->first('velicina', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<p>enclosure layout:</p>
					<div>
						<select  name="izvedba" value="{{ old('izvedba') }}" required>
							<option disabled selected value></option>
							<option>Samostojeći</option>
							<option>Nazidni</option>
							<option>Ukopni</option>
						</select>
					</div>
					<p>type:</p>
					<div>
						<select  name="tip" value="{{ old('tip') }}" required>
							<option disabled selected value></option>
							<option>Razvodni</option>
							<option>Razvodno-upravljački</option>
							<option>Upravljačko-mjerni</option>
							<option>Mjerni</option>
							<option>MCC</option>
						</select>
					</div>
			</div>

			<div id="info2" class="tabcontent">
				<button type="button" class="tablinks Jbtn-back" onclick="openCity(event, 'info1')"><a href="#link2">back</a></button>
				<button type="button" class="tablinks Jbtn-next" onclick="openCity(event, 'info3')"><a href="#link3">next</a></button>
				<p>door design:</p>
				<div class="{{ ($errors->has('model')) ? 'has-error' : '' }}">
					<select  name="model" value="{{ old('model') }}" required>
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
					<select  name="materijal" value="{{ old('materijal') }}" required>
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
					<input  name="napon" type="text" value="{{ old('napon') }}" required/>
					{!! ($errors->has('napon') ? $errors->first('napon', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<p>controlling voltage [V]:</p>
				<div>
					<input  name="kontrolni_napon" type="text" value="{{ old('kontrolni_napon') }}" required/>
					{!! ($errors->has('kontrolni_napon') ? $errors->first('kontrolni_napon', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<p>rated current [A]:</p>
				<div>
					<input name="struja" type="text" value="{{ old('struja') }}" required/>
					{!! ($errors->has('struja') ? $errors->first('struja', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				
			</div>
				
			<div id="info3" class="tabcontent">
				<button type="button" class="tablinks Jbtn-back" onclick="openCity(event, 'info2')"><a href="#link3">back</a></button>
				<button type="button" class="tablinks Jbtn-next" onclick="openCity(event, 'finalizing')"><a href="#link4">next</a></button>
				<p style="display:inline-block;">breaking power</p><span> [kA]:</span>
				<div>
					<input  name="prekidna_moc" type="text" value="{{ old('prekidna_moc') }}" />
					{!! ($errors->has('prekidna_moc') ? $errors->first('prekidna_moc', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<p>protection system:</p>
				<div>
					<select class="protect" name="sustav_zastite" value="{{ old('sustav_zastite') }}" required>
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
					<span>IP</span><input class="ip1" placeholder="upiši broj" name="ip_zastita" type="text" value="{{ old('ip_zastita') }}" required/>
					{!! ($errors->has('ip_zastita') ? $errors->first('ip_zastita', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<p>cable entry:</p>
				<div>
					<select name="ulaz_kabela" value="{{ old('ulaz_kabela') }}" id="test" required>
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
				<!--<p>descriptive labels on the door of the enclosure:</p>
				<div>
					<input type="radio" name="oznake" value="DA">Yes<br>
					<input type="radio" name="oznake" value="NE" checked>No
				</div>-->
				<p>logo on the enclosure:</p>
				<div>
					<input type="radio" name="logo" value="Logo Duplico">Yes - Duplico logo<br>
					<input type="radio" name="logo" value="Logo Naručitelj">Yes - client logo<br>
					<input type="radio" name="logo" value="NE" checked>No
				</div>
			</div>
				
			<div id="finalizing" class="tabcontent">
				
				<button type="button" class="tablinks Jbtn-back" onclick="openCity(event, 'info3')"><a href="#link4">back</a></button>
				<input name="_token" value="{{ csrf_token() }}" type="hidden">
				<input class="Jsubmit" type="submit" value="add">
				<p class="note">note:</>
				<div>
					<textarea rows="4" cols="50" name="napomena" type="text" value="{{ old('napomena') }}" ></textarea>
				</div>
			</div>

		</form>
	</div>
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