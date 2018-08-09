<link rel="stylesheet" href="{{ URL::asset('css/cabinets.css') }}" />

<div class="tabCab">
<button type="button" class="Jbtn-close" data-dismiss="modal">&times</button>
	<div>
		<div class="tabCab1" id="tabCab1">
			<p>Edit enclocure</p>
			<button class="tablinks" onclick="openCity(event, 'basic')" style="border:none;background-color: #f3f5f7;" id="defaultOpen"><span id="link1">1</span>Basic info</button>
			<button class="tablinks" onclick="openCity(event, 'info1')" style="border:none;background-color: #f3f5f7;"><span id="link2">2</span>Enclosure info</button>
			<button class="tablinks" onclick="openCity(event, 'info2')" style="border:none;background-color: #f3f5f7;"><span id="link3">3</span>Enclosure info 2</button>
			<button class="tablinks" onclick="openCity(event, 'info3')" style="border:none;background-color: #f3f5f7;"><span id="link4">4</span>Enclosure info 3</button>
			<button class="tablinks" onclick="openCity(event, 'finalizing')" style="border:none;background-color: #f3f5f7;"><span id="link5">5</span>Finalizing</button>
		</div>
		<form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.cabinets.update', $cabinet->id) }}">
				<div id="basic" class="tabcontent">
					<button type="button" class="tablinks Jbtn-next" onclick="openCity(event, 'info1')"><a href="#link1">next</a></button>
					<p>enclosure number: {{ $cabinet->brOrmara }}</p>
					
					<p>designed by:</p>
					<div class=" {{ ($errors->has('projektirao_id')) ? 'has-error' : '' }}">
						<select name="projektirao_id" id="sel1">
							<option selected="selected" value="{{ $cabinet->projektirao_id}}">{{ $cabinet->projektirao_user['first_name'] . ' ' . $cabinet->projektirao_user['last_name']}}</option>
							@foreach ($users as $user)
								<option name="projektirao_id" value=" {{ $user->id}} ">{{ $user->first_name . ' ' . $user->last_name }}</option>
							@endforeach
						</select>
						 {!! ($errors->has('projektirao_id') ? $errors->first('projektirao_id', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<p>enclosure approved by:</p>
					<div>
						<select name="odobrio_id" id="sel1">
							<option selected="selected" value="{{ $cabinet->odobrio_id}}">{{ $cabinet->odobrio_user['first_name'] . ' ' . $cabinet->odobrio_user['last_name']}}</option>
							@foreach ($users as $user)
								<option name="odobrio_id" value=" {{ $user->id}} ">{{ $user->first_name . ' ' . $user->last_name }}</option>
							@endforeach
						</select>
					</div>	 
					<p>project:</p>
					<div class=" {{ ($errors->has('projekt_id')) ? 'has-error' : '' }}">
						<select name="projekt_id" id="sel1">
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
					<p>date of delivery of the enclosure:</p>
					<div class="Jdate">
						<input name="datum_isporuke" class="date" type="text" value ="{{ date('d-m-Y', strtotime($cabinet->datum_isporuke)) }}"/>
						{!! ($errors->has('datum_isporuke') ? $errors->first('datum_isporuke', '<p class="text-danger">:message</p>') : '') !!}
						<i class="fas fa-calendar-alt"></i>
					</div>
					<script type="text/javascript">
						$('.date').datepicker({  
						   format: 'dd-mm-yyyy',
						   startDate:'-60y',
						   endDate:'+1y'
						}); 
					</script> 
					<p>manufacturer of cabinets:</p>
					<div class="Equip clearfix">
						<select class="form-control" name="proizvodjac" id="proizvodjac">
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
				</div>
				<div id="info1" class="tabcontent">
					<button type="button" class="tablinks Jbtn-back" onclick="openCity(event, 'basic')"><a href="#link1">back</a></button>
					<button type="button" class="tablinks Jbtn-next" onclick="openCity(event, 'info2')"><a href="#link2">next</a></button>
					<p>equipment manufacturer:</p> 
					<div class="Equip clearfix">
						<div>
							<label class="container">ABB
								<input type="checkbox" name="proizvodjacOpr_1" value="ABB" {!! (in_array('ABB',$proizvodjacOpr)? 'checked' : '') !!}>
								<span class="checkmark"></span>
							</label>
							<label class="container">Eaton
								<input type="checkbox" name="proizvodjacOpr_2" value="Eaton" {!! (in_array('Eaton',$proizvodjacOpr)? 'checked' : '') !!}>
								<span class="checkmark"></span>
							</label>
							<label class="container">Rittal
								<input type="checkbox" name="proizvodjacOpr_3" value="Rittal" {!! (in_array('Rittal',$proizvodjacOpr)? 'checked' : '') !!}>
								<span class="checkmark"></span>
							</label>
							<label class="container">Schneider
								<input type="checkbox" name="proizvodjacOpr_4" value="Schneider" {!! (in_array('Schneider',$proizvodjacOpr)? 'checked' : '') !!}>
								<span class="checkmark"></span>
							</label>
						</div>
						<div>
							<label class="container">Schrack
								<input type="checkbox" name="proizvodjacOpr_5" value="Schrack" {!! (in_array('Schrack',$proizvodjacOpr)? 'checked' : '') !!}>
								<span class="checkmark"></span>
							</label>
							<label class="container">Siemens
								<input type="checkbox" name="proizvodjacOpr_6" value="Siemens" {!! (in_array('Siemens',$proizvodjacOpr)? 'checked' : '') !!}>
								<span class="checkmark"></span>
							</label>
							<label class="container">Free choice
								<input type="checkbox" name="proizvodjacOpr_7" value="Slobodan odabir" {!! (in_array('Slobodan odabir',$proizvodjacOpr)? 'checked' : '') !!}>
								<span class="checkmark"></span>
							</label>
						</div>
						
					</div>
				
					<p>name of enclosure (KKS):</p>
					<div>
						<input placeholder="Naziv" name="naziv" type="text" value="{{ $cabinet->naziv }}" />
						{!! ($errors->has('naziv') ? $errors->first('naziv', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<p>dimensions of cabinet (width x height x depth):</p>
					<div>
						<input placeholder="Veličina" name="velicina" type="text" value="{{ $cabinet->velicina }}" />
						{!! ($errors->has('velicina') ? $errors->first('velicina', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<p>enclosure layout:</p>
					<div>
						<select name="izvedba">
							<option {!! ($cabinet->izvedba == 'Samostojeći' ? 'selected' : '') !!} >Samostojeći</option>
							<option {!! ($cabinet->izvedba == 'Nazidni' ? 'selected' : '') !!}>Nazidni</option>
							<option {!! ($cabinet->izvedba == 'Ukopni' ? 'selected' : '') !!}>Ukopni</option>
						</select>
					</div>
					<p>type:</p>
					<div>
						<select name="tip">
							<option {!! ($cabinet->tip == 'Razvodni' ? 'selected' : '') !!} >Razvodni</option>
							<option {!! ($cabinet->tip == 'Razvodno-upravljački' ? 'selected' : '') !!} >Razvodno-upravljački</option>
							<option {!! ($cabinet->tip == 'Upravljačko-mjerni' ? 'selected' : '') !!} >Upravljačko-mjerni</option>
							<option {!! ($cabinet->tip == 'Mjerni' ? 'selected' : '') !!} >Mjerni</option>
							<option {!! ($cabinet->tip == 'MCC' ? 'selected' : '') !!} >MCC</option>
						</select>
					</div>
				</div>
				<div id="info2" class="tabcontent">
					<button type="button" class="tablinks Jbtn-back" onclick="openCity(event, 'info1')"><a href="#link2">back</a></button>
					<button type="button" class="tablinks Jbtn-next" onclick="openCity(event, 'info3')"><a href="#link3">next</a></button>
					<p>door design:</p>
					<div class=" {{ ($errors->has('model')) ? 'has-error' : '' }}">
						<select name="model">
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
					<div class=" {{ ($errors->has('materijal')) ? 'has-error' : '' }}">
						<select name="materijal">
							<option {!! ($cabinet->materijal == 'Čelični' ? 'selected' : '') !!}>Čelični</option>
							<option {!! ($cabinet->materijal == 'Inox' ? 'selected' : '') !!}>Inox</option>
							<option {!! ($cabinet->materijal == 'Poliesterski' ? 'selected' : '') !!}>Poliesterski</option>
							<option {!! ($cabinet->materijal == 'Aluminijski' ? 'selected' : '') !!}>Aluminijski</option>
						</select>
						{!! ($errors->has('materijal') ? $errors->first('materijal', '<p class="text-danger">:message</p>') : '') !!}
					</div>
				
					<p>nominal voltage [V]:</p>
					<div>
						<input placeholder="napon" name="napon" type="text" value="{{ $cabinet->napon }}" />
						{!! ($errors->has('napon') ? $errors->first('napon', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<p>controlling voltage [V]:</p>
					<div>
						<input  name="kontrolni_napon" type="text" value="{{ $cabinet->napon }}" />
						{!! ($errors->has('kontrolni_napon') ? $errors->first('kontrolni_napon', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<p>rated current [A]:</p>
					<div>
						<input placeholder="Struja" name="struja" type="text" value="{{ $cabinet->struja }}" />
						{!! ($errors->has('struja') ? $errors->first('struja', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<p style="display:inline-block;">breaking power</p><span> [kA]:</span>
					<div>
						<input placeholder="Prekidna moć" name="prekidna_moc" type="text" value="{{ $cabinet->prekidna_moc }}" />
						{!! ($errors->has('prekidna_moc') ? $errors->first('prekidna_moc', '<p class="text-danger">:message</p>') : '') !!}
					</div>
				</div>
				<div id="info3" class="tabcontent">
					<button type="button" class="tablinks Jbtn-back" onclick="openCity(event, 'info2')"><a href="#link3">back</a></button>
					<button type="button" class="tablinks Jbtn-next" onclick="openCity(event, 'finalizing')"><a href="#link4">next</a></button>
					<p>protection system:</p>
					<div>
						<select class="protect" name="sustav_zastite" value="{{ old('sustav_zastite') }}">
						<option {!! ($cabinet->sustav_zastite == 'TN-S' ? 'selected' : '') !!} >TN-S</option>
						<option {!! ($cabinet->sustav_zastite == 'TN-C' ? 'selected' : '') !!} >TN-C</option>
						<option {!! ($cabinet->sustav_zastite == 'TN-C/S' ? 'selected' : '') !!} >TN-C/S</option>
						<option {!! ($cabinet->sustav_zastite == 'TT' ? 'selected' : '') !!} >TT</option>
						<option {!! ($cabinet->sustav_zastite == 'IT' ? 'selected' : '') !!} >IT</option>
					</select>
					</div>
					<p>IP protection cabinets:</p>
					<div class="ip ">
						<span>IP</span><input class="ip1" placeholder="IP zaštita ormara" name="ip_zastita" type="text" value="{{ substr_replace($cabinet->ip_zastita,'',0,2) }}"/>
						{!! ($errors->has('ip_zastita') ? $errors->first('ip_zastita', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<p>cable entry:</p>
					<div>
						<select name="ulaz_kabela" value="{{ $cabinet->ulaz_kabela }}" id="test">
							<option class="non" {!! ($cabinet->ulaz_kabela == 'Uvodnice gore' ? 'selected' : '') !!} >Uvodnice gore</option>
							<option class="non" {!! ($cabinet->ulaz_kabela == 'Uvodnice dolje' ? 'selected' : '') !!}>Uvodnice dolje</option>
							<option class="editable" {!! ($ulaz_kabela == 'Otvor u krovu' ? 'selected' : '') !!}>Otvor u krovu</option>
							<option class="editable" {!! ($ulaz_kabela == 'Otvor u podnici' ? 'selected' : '') !!}>Otvor u podnici</option>
							<option class="editable" {!! ($ulaz_kabela == 'Otvor - bočna lijeva stranica' ? 'selected' : '') !!}>Otvor - bočna lijeva stranica</option>
							<option class="editable" {!! ($ulaz_kabela == 'Otvor - bočna desna stranica' ? 'selected' : '') !!}>Otvor - bočna desna stranica</option>
						</select>
					</div>
					<div>
						<input class="editOption " name="kab_dimenzija" placeholder="upiši dimenziju (ŠxV) u mm" {!! ( !$kab_dimenzija ? 'style="display:none"' : '' ) !!} value="{{ $kab_dimenzija }}"></input>
					</div>
				
					<p>descriptive labels on the door of the enclosure:</p>
					<div>
						<input type="radio" name="oznake" value="DA" {{ ($cabinet->oznake == 'DA') ? 'checked' : '' }}> DA<br>
						<input type="radio" name="oznake" value="NE" {{ ($cabinet->oznake == 'NE') ? 'checked' : '' }}> NE
					</div>
					<p>logo on the enclosure:</p>
					<div>
						<input type="radio" name="logo" value="Logo Duplico" {{ ($cabinet->logo == 'Logo Duplico') ? 'checked' : '' }}> DA - Duplico logo<br>
						<input type="radio" name="logo" value="Logo Naručitelj" {{ ($cabinet->logo == 'Logo Naručitelj') ? 'checked' : '' }}> DA - Naručiteljev logo<br>
						<input type="radio" name="logo" value="NE" {{ ($cabinet->logo == 'NE') ? 'checked' : '' }}> NE
					</div>
				</div>
				<div id="finalizing" class="tabcontent">
					<button type="button" class="tablinks Jbtn-back" onclick="openCity(event, 'info3')"><a href="#link4">back</a></button>
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<input name="_token" value="{{ csrf_token() }}" type="hidden">
					<input class="Jsubmit" type="submit" value="add">
					<p>Napomena:</p>
					<div>
						<textarea rows="4" cols="50" name="napomena" type="text" value="{{ $cabinet->napomena  }}" ></textarea>
						
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