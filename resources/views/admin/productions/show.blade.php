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
		font-size: 0.75rem;
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
		font-size: 1.75rem;
	}

	.topright:hover {color: red;}
	#pomak {
		padding-left: 20px;
	}
	table {
		font-size: 0.66rem;
	}
	#Priprema th {
		padding: 10px 30px;
		border-bottom: solid 1px #ccc;
		font-size: 0.63rem;
	}
	#Priprema td {
		padding: 10px;
	}
	#Nabava th {
		padding: 10px 30px;
		border-bottom: solid 1px #ccc;
		font-size: 0.63rem;
	}
	#Nabava td {
		padding: 10px;
	}
	#Proizvodnja th {
		padding: 10px 30px;
		border-bottom: solid 1px #ccc;
		font-size: 0.63rem;
	}
	#Proizvodnja td {
		padding: 10px;
	}
	#Status p{
		margin:0;
		padding: 5px 0px;
	}
	#Status .rght {
		padding-left:20px;
	}
	#Status .rght span {
		color: green;
		font-weight: bold;
	}
	
	#Status div .bordB{
		padding: 10px 10px;
		border-bottom: solid 1px black;
	}
</style>
@section('content')
	<h5>{{ 'Naziv projekta: '}}<b>{{ $project->id . ' - ' . $project->naziv }}</b></h5>
	<div class="tab">
		@if (Sentinel::check() && Sentinel::inRole('proizvodnja') || Sentinel::inRole('administrator'))
			<button class="tablinks" onclick="openCity(event, 'Opći')" id="defaultOpen">Opći podaci</button>
			<button class="tablinks" onclick="openCity(event, 'Ormari')" id="defaultOpen">Ormari</button>
			<button class="tablinks" onclick="openCity(event, 'Priprema')" id="defaultOpen">Priprema</button>
			<button class="tablinks" onclick="openCity(event, 'Nabava')" id="defaultOpen">Nabava</button>
			<button class="tablinks" onclick="openCity(event, 'Proizvodnja')" id="defaultOpen">Proizvodnja</button>
		@endif
		@if (Sentinel::check() && Sentinel::inRole('kupac') || Sentinel::inRole('basic'))
			<button class="tablinks" onclick="openCity(event, 'Status')" id="defaultOpen">Status ormara</button>
		@endif
	</div>
	<!-- Opći podaci projekta -->
	@if (Sentinel::check() && Sentinel::inRole('proizvodnja') || Sentinel::inRole('administrator'))
	<div id="Opći" class="tabcontent">
		<!--<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>-->
		
		<div class="row">
			<div class="col-xs-8 col-md-8 col-md-10 col-lg-12">
				<div class="panel-heading">
					<h5>{{ 'Naziv projekta: '}}<b>{{ $project->id . ' - ' . $project->naziv }}</b></h5>
					<p>{{ 'Naručitelj: '}}<b>{{ $project->investitor }}</b></p>
					<p>{{ 'Voditelj projekta: '}}<b>{{ $project->user['first_name'] . ' ' . $project->user['last_name'] }}</b></p>
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
		<hr>
		<div class="row">
			<div class="col-sm-6 col-md-6 col-lg-4">
			<h4><small>Dodaj novi kontakt</small></h4>
			</br>
				<form accept-charset="UTF-8" role="form" method="post" action="{{ route('customer.contact')}}">
					<fieldset>
						<div>
							<input class="form-control" name="productionProject_id" type="hidden" value="{{ $project->id }}"/>
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

	<!-- Opći podaci ormara -->
	<div id="Ormari" class="tabcontent a">
		<!--<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>-->
		<div class="row">
			<div class="col-xs-6 col-md-8 col-md-10 col-lg-12">
					<h5>Popis ormara</h5>
					<br>
					 <table id="table_id" class="display proizv">
						<thead>
							<tr>
								<th>Proizvodni broj ormara</th>
								<th>Projektirao</th>
								<th>Odobrio</th>
								<th>Datum isporuke</th>
								<th>Proizvođač ormara</th>
								<th>Proizvođač opreme</th>
								<th>Naziv (KKS)</th>
								<th>Dimenzija</th>
								<th>Izvedba</th>
								<th>Tip</th>
								<th>Izvedba vrata</th>
								<th>Materijal</th>
								<th>Nazivni napon</th>
								<th>Nazivna struja</th>
								<th>Prekidna moć:</th>
								<th>Sustav zaštite</th>
								<th>IP zaštita ormara</th>
								<th>Ulaz kabela</th>
								<th>Oznake</th>
								<th>Logo</th>
								<th>Napomena</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($cabinets as $cabinet)
							<tr>
								<td><a href="{{ route('admin.cabinets.edit', $cabinet->id) }}">{{ $cabinet->brOrmara }}</a></td>
								<td>{{ $cabinet->projektirao_user['last_name'] }}</td>
								<td>{{ $cabinet->odobrio_user['last_name'] }}</td>
								<td>{{ date('d.m.Y', strtotime($cabinet->datum_isporuke)) }}</td>
								<td>{{ $cabinet->proizvodjac }}</td>
								<td>{{ $cabinet->proizvodjacOpr }}</td>
								<td>{{ $cabinet->naziv }}</td>
								<td>{{ $cabinet->velicina}}</td>
								<td>{{ $cabinet->izvedba }}</td>
								<td>{{ $cabinet->tip }}</td>
								<td>{{ $cabinet->model }}</td>
								<td>{{ $cabinet->materijal }}</td>
								<td>{{ $cabinet->napon }}</td>
								<td>{{ $cabinet->struja }}</td>
								<td>{{ $cabinet->prekidna_moc }}</td>
								<td>{{ $cabinet->sustav_zastite }}</td>
								<td>{{ $cabinet->ip_zastita }}</td>
								<td>{{ $cabinet->ulaz_kabela }}</td>
								<td>{{ $cabinet->oznake }}</td>
								<td>{{ $cabinet->logo }}</td>
								<td>{{ $cabinet->napomena }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>

			</div>
		</div>
	</div>
	
	<!-- Priprema -->
	<div id="Priprema" class="tabcontent">
		<!--<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>-->

		<div class='btn-toolbar pull-right'>
		
        </div>
		<table>
			<thead>
				<tr>	
					<th>Broj ormara, naziv</td>
					<th>izmjena</td>
					<th>Rok</td>
					<th>Očekivana promjena roka</td>
					<th>Napravljena 3p shema</td>
					<th>Odobrena 3p shema</td>
					<th>Pripremljena rezna lista za Komax</td>
					<th>Pripremljena rezna lista za Perforex</td>
					<th>Odobren 3D izgled ormara</td>
					<th>Oznake eksportirane</td>
					<th>Tehnička dokumentacija isprintana</td>
				</tr>
			</thead>
			<tbody>
				@foreach($cabinets as $cabinet)
					<tr>
						<td>{{ $cabinet->brOrmara }}</td>
						@if(!$preparations->where('ormar_id','=', $cabinet->id)->first())
							<td>
								<a href="{{ route('admin.preparations.create', ['id' => $cabinet->id]) }}">Dodaj status pripreme</a>
							</td>
							<?php $datum_1 = new DateTime($cabinet->datum_isporuke);
								$datum_1->modify('-18 days')?>
							<td>{{ date_format($datum_1,'d.m.Y') }}</td>
						@endif
						@foreach($preparations as $preparation)
							@if($preparation->ormar_id == $cabinet->id)
							<td><a href="{{ route('admin.preparations.edit', ['id' => $preparation->id] ) }}" >Izmjeni status pripreme</a></td>
							<td>{{ date('d.m.Y', strtotime($preparation->datum)) }}</td>
							<?php 
							$datum1 = new DateTime($preparation->datum);
							$datum1->modify('+18 days');
							$datum2 = new DateTime($cabinet->datum_isporuke);
							$razlika = $datum1->diff($datum2);
							?>
							<td>{{ $razlika->format('%d') . ' dana' }}</td>
							<td>{{ $preparation->rijeseno1 . ' ' . $preparation->koment_3p }}</td>
							<td>{{ $preparation->rijeseno2 . ' ' . $preparation->koment_3pOd }}</td>
							<td>{{ $preparation->rijeseno3 . ' ' . $preparation->koment_komax }}</td>
							<td>{{ $preparation->rijeseno4 . ' ' . $preparation->koment_perf }}</td>
							<td>{{ $preparation->rijeseno5 . ' ' . $preparation->koment_od }}</td>
							<td>{{ $preparation->rijeseno6 . ' ' . $preparation->koment_exp }}</td>
							<td>{{ $preparation->rijeseno7 . ' ' . $preparation->koment_pr }}</td>
							@endif
						@endforeach
					</tr>
				@endforeach
			</tbody>
		</table>
		
	</div>
	
	<!-- Nabava -->
	<div id="Nabava" class="tabcontent">
	 <!--<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>-->
		
		<table>
			<thead>
				<tr>	
					<th>Broj ormara, naziv</td>
					<th>izmjena</td>
					<th>Rok</td>
					<th>Očekivana promjena roka isporuke</td>
					<th>Ormar</td>
					<th>Kanalice</td>
					<th>Din šine</td>
					<th>Vodič</td>
					<th>Bakar</td>
					<th>Redne stezaljke</td>
					<th>Sklopna oprema</td>
				</tr>
			</thead>
			<tbody>
				@foreach($cabinets as $cabinet)
					<tr>
						<td>{{ $cabinet->brOrmara }}</td>
						@if(!$purchases->where('ormar_id','=', $cabinet->id)->first())
						<td>
							<a href="{{ route('admin.purchases.create', ['id' => $cabinet->id]) }}">Dodaj status pripreme</a>
						</td>
						<?php 
						$preparation = $preparations->where('ormar_id','=', $cabinet->id)->first();
						if($preparation) {
							$datum_1 = new DateTime($preparation->datum);
							$datum_1->modify('+15 days');
						} else {
							$datum_1 = new DateTime($cabinet->datum_isporuke);
							$datum_1->modify('-3 days');
						}
						?>
						<td>{{ date_format($datum_1,'d.m.Y') }}</td>
						@endif
						
						@foreach($purchases as $purchase)
							@if($purchase->ormar_id == $cabinet->id)
							<td><a href="{{ route('admin.purchases.edit', ['id' => $purchase->id] ) }}" >Izmjeni status pripreme</a></td>
							<td>{{ date('d.m.Y', strtotime($purchase->datum)) }}</td>
							<?php 
							$datum1 = new DateTime($purchase->datum);
							$datum1->modify('+3 days');
							$datum2 = new DateTime($cabinet->datum_isporuke);
							$razlika = $datum1->diff($datum2);
							?>
							<td>{{ $razlika->format('%d') . ' dana' }}</td>
							<td>{{ $purchase->rijeseno1 . ' ' . $purchase->koment_orm }}</td>
							<td>{{ $purchase->rijeseno2 . ' ' . $purchase->koment_kan }}</td>
							<td>{{ $purchase->rijeseno3 . ' ' . $purchase->koment_sine }}</td>
							<td>{{ $purchase->rijeseno4 . ' ' . $purchase->koment_vod }}</td>
							<td>{{ $purchase->rijeseno5 . ' ' . $purchase->koment_bak }}</td>
							<td>{{ $purchase->rijeseno6 . ' ' . $purchase->koment_stez }}</td>
							<td>{{ $purchase->rijeseno7 . ' ' . $purchase->koment_sklOpr }}</td>
							
							@endif
						@endforeach
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
	<!-- Proizvodnja -->
	<div id="Proizvodnja" class="tabcontent">
	  <!--<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>-->
	  
	  <table>
			<thead>
				<tr>	
					<th>Broj ormara, naziv</td>
					<th>izmjena</td>
					<th>Rok</td>
					<th>Očekivana promjena roka isporuke</td>
					<th>Obrada montažne ploče</td>
					<th>Obrada ormara</td>
					<th>Rezanje vodiča</td>
					<th>Izrada oznaka</td>
					<th>Slaganje MP</td>
					<th>Označavanje MP</td>
					<th>Ožičenje</td>
					<th>CE QR dokumentacija</td>
					<th>Ispitivanje</td>
				</tr>
			</thead>
			<tbody>
				@foreach($cabinets as $cabinet)
					<tr>
						<td>{{ $cabinet->brOrmara }}</td>
						@if(!$productions->where('ormar_id','=', $cabinet->id)->first())
						<td>
							<a href="{{ route('admin.productions.create', ['id' => $cabinet->id]) }}">Dodaj status pripreme</a>
						</td>
						<?php 
						$purchase = $purchases->where('ormar_id','=', $cabinet->id)->first();
						if($purchase){
						$datum_1 = new DateTime($purchase->datum);
						$datum_1->modify('+2 days');
						} else {
						$datum_1 = new DateTime($cabinet->datum_isporuke);
						$datum_1->modify('-1 days');
						}
						?>
						<td>{{ date_format($datum_1,'d.m.Y') }}</td>
						@endif
						
						@foreach($productions as $production)
							@if($production->ormar_id == $cabinet->id)
							<td><a href="{{ route('admin.productions.edit', ['id' => $production->id] ) }}" >Izmjeni status pripreme</a></td>
							<td>{{ date('d.m.Y', strtotime($production->datum)) }}</td>
							<?php 
							$datum1 = new DateTime($production->datum);
							$datum1->modify('+1 days');
							$datum2 = new DateTime($cabinet->datum_isporuke);
							$razlika = $datum1->diff($datum2);
							?>
							<td>{{ $razlika->format('%d') . ' dana' }}</td>
							<td>{{ $production->rijeseno1 . ' ' . $production->koment_mp }}</td>
							<td>{{ $production->rijeseno2 . ' ' . $production->koment_orm }}</td>
							<td>{{ $production->rijeseno3 . ' ' . $production->koment_vod }}</td>
							<td>{{ $production->rijeseno4 . ' ' . $production->koment_ozn }}</td>
							<td>{{ $production->rijeseno5 . ' ' . $production->koment_slMp }}</td>
							<td>{{ $production->rijeseno6 . ' ' . $production->koment_oznMp }}</td>
							<td>{{ $production->rijeseno7 . ' ' . $production->koment_ozic }}</td>
							<td>{{ $production->rijeseno8 . ' ' . $production->koment_dok }}</td>
							<td>{{ $production->rijeseno9 . ' ' . $production->koment_isp }}</td>
							@endif
						@endforeach
					</tr>
				@endforeach
			</tbody>
		</table>
		
	</div>
	@endif
	
	<!-- Status -->
	@if (Sentinel::check() && Sentinel::inRole('kupac') || Sentinel::inRole('basic'))
	<div id="Status" class="tabcontent">
	  <!--<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>-->

		<div class="row">
			<div class="col-xs-8 col-md-8 col-md-10 col-lg-12">
				<div class="bordB panel-heading">
					<h5><b>{{ $project->id . ' - ' . $project->naziv }}</b></h5>
					<p>{{ 'Naručitelj: '}}<b>{{ $project->investitor }}</b></p>
					<p>{{ 'Voditelj projekta: '}}<b>{{ $project->user['first_name'] . ' ' . $project->user['last_name'] }}</b></p>
				</div>

				@foreach($cabinets as $cabinet)
				<?php   $prep = $preparations->where('ormar_id',$cabinet->id)->first(); 
					    $purch = $purchases->where('ormar_id',$cabinet->id)->first();
					    $prod = $productions->where('ormar_id',$cabinet->id)->first();
						if($prod) {
						$datum_isp = new DateTime($prod->datum);
						$datum_isp->modify('+1 days');	
						}
						
				?>
					<div class="bordB col-md-4">
						<p><b>Proizvodni broj ormara: {{ $cabinet->brOrmara }}</b></p>
								<p><ins>Status</ins></p>
								<p class="rght">Priprema: <span>{{ ( 
								$prep &&
								$prep->rijeseno1 == 'DA' && 
								$prep->rijeseno2 == 'DA' && 
								$prep->rijeseno3 == 'DA' && 
								$prep->rijeseno4 == 'DA' && 
								$prep->rijeseno5 == 'DA' && 
								$prep->rijeseno6 == 'DA' && 
								$prep->rijeseno7 == 'DA') ? 'završeno' : '' }}</span></p>
								<p class="rght">Nabava: <span>{{ ( 
								$purch &&
								$purch->rijeseno1 == 'DA' && 
								$purch->rijeseno2 == 'DA' && 
								$purch->rijeseno3 == 'DA' && 
								$purch->rijeseno4 == 'DA' && 
								$purch->rijeseno5 == 'DA' && 
								$purch->rijeseno6 == 'DA' && 
								$purch->rijeseno7 == 'DA') ? 'završeno' : '' }}</span></p>
								<p class="rght">Proizvodnja: <span>{{ ( 
								$prod &&
								$prod->rijeseno1 == 'DA' && 
								$prod->rijeseno2 == 'DA' && 
								$prod->rijeseno3 == 'DA' && 
								$prod->rijeseno4 == 'DA' && 
								$prod->rijeseno5 == 'DA' && 
								$prod->rijeseno6 == 'DA' && 
								$prod->rijeseno7 == 'DA' && 
								$prod->rijeseno8 == 'DA' && 
								$prod->rijeseno9 == 'DA') ? 'završeno' : '' }}</span></p>
								
								@if($prod)
								<p><b>Datum isporuke: {{ date_format($datum_isp,'d.m.Y') }}</b></p>
								@else
								<p><b>Datum isporuke: {{ date('d.m.Y', strtotime($cabinet->datum_isporuke)) }}</b></p>
								@endif
						<hr>
						<p>Projektirao: {{ $cabinet->projektirao_user['first_name'] . ' ' . $cabinet->projektirao_user['last_name'] }}</p>
						<p>Odobrio: {{ $cabinet->odobrio_user['last_name'] }}</p>
						<p>Proizvođač ormara: {{ $cabinet->proizvodjac }}</p>
						<p>Proizvođač opreme: {{ $cabinet->proizvodjacOpr }}</p>
						<p>Naziv (KKS): {{ $cabinet->naziv }}</p>
						<p>Dimenzija: {{ $cabinet->velicina}}</p>
						<p>Izvedba: {{ $cabinet->izvedba }}</p>
						<p>Tip: {{ $cabinet->tip }}</p>
						<p>Izvedba vrata: {{ $cabinet->model }}</p>
						<p>Materijal: {{ $cabinet->materijal }}</p>
						<p>Nazivni napon: {{ $cabinet->napon }}</p>
						<p>Nazivna struja:  {{ $cabinet->struja }}</p>
						<p>Prekidna moć: {{ $cabinet->prekidna_moc }}</p>
						<p>Sustav zaštite: {{ $cabinet->sustav_zastite }}</p>
						<p>IP zaštita ormara: {{ $cabinet->ip_zastita }}</p>
						<p>Ulaz kabela: {{ $cabinet->ulaz_kabela }}</p>
						<p>Oznake: {{ $cabinet->oznake }}</p>
						<p>Logo: {{ $cabinet->logo }}</p>
						<p>Napomena: {{ $cabinet->napomena }}</p>
					</div>

				@endforeach
			</div>
		</div>
	</div>
	@endif
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
