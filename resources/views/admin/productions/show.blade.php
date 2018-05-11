@extends('layouts.admin')

@section('title', 'Proizvodni projekti')
<link rel="stylesheet" href="{{ URL::asset('css/production.css') }}"/>

@section('content')
	<h5>{{ 'Naziv projekta: '}}<b>{{ $project->id . ' - ' . $project->naziv }}</b></h5>
	<div class="tab">
		@if (Sentinel::check() && Sentinel::inRole('proizvodnja') || Sentinel::inRole('administrator'))
		<!--	<button class="tablinks" onclick="openCity(event, 'Opći')" id="defaultOpen">Opći podaci</button>-->
			<button class="tablinks" onclick="openCity(event, 'Ormari')" id="defaultOpen">Ormari</button>
			<button class="tablinks" onclick="openCity(event, 'Priprema')" id="defaultOpen">Priprema</button>
			<button class="tablinks" onclick="openCity(event, 'Nabava')" id="defaultOpen">Nabava</button>
			<button class="tablinks" onclick="openCity(event, 'Proizvodnja')" id="defaultOpen">Proizvodnja</button>
			<!--<button class="tablinks" onclick="openCity(event, 'Status')" id="defaultOpen">Status ormara</button>-->
		@endif
		@if (Sentinel::check() && Sentinel::inRole('voditelj'))
			<button class="tablinks" onclick="openCity(event, 'Opći')" id="defaultOpen">Opći podaci</button>
			<button class="tablinks" onclick="openCity(event, 'Status')" id="defaultOpen">Status ormara</button>
			
		@endif
		@if (Sentinel::check() && Sentinel::inRole('kupac') )
		
			<button class="tablinks" onclick="openCity(event, 'Status')" id="defaultOpen">Status ormara</button>
			
		@endif
	</div>
	<!-- Opći podaci projekta -->
	@if (Sentinel::check() && Sentinel::inRole('proizvodnja') || Sentinel::inRole('administrator') || Sentinel::inRole('voditelj'))
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
						<table style="width:50%">
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
							<tr class="zadnjiRed">
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
			 <div class="panel-heading">
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
							<tr class="OrmProiz">
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
	
	@endif
	@if (Sentinel::check() && Sentinel::inRole('proizvodnja') || Sentinel::inRole('administrator'))
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
						<td class="center">{{ $cabinet->brOrmara }}</td>
						@if(!$preparations->where('ormar_id','=', $cabinet->id)->first())
							<td class="center">
								<a href="{{ route('admin.preparations.create', ['id' => $cabinet->id]) }}">Dodaj status pripreme</a>
							</td>
							<?php $datum_1 = new DateTime($cabinet->datum_isporuke);
								$datum_1->modify('-18 days');
								$danas = new DateTime('now');
								$interval = $danas->diff($datum_1); 
								$dana = $interval->format("%r%a");
								?>
								@if($dana <= 0)
									<td style="color:red">{{ date_format($datum_1,'d.m.Y') }}</td>
								@else
									<td>{{ date_format($datum_1,'d.m.Y') }}</td>
								@endif
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
						@else
							@foreach($preparations as $preparation)
								@if($preparation->ormar_id == $cabinet->id)
								<td class="center">
									<a href="{{ route('admin.preparations.edit', ['id' => $preparation->id] ) }}" >Izmjeni status pripreme</a>
								</td>
								<?php 
								$datum1 = new DateTime($preparation->datum);
								$datum3 = $datum1->modify('+18 days');
								$datum2 = new DateTime($cabinet->datum_isporuke);
								$razlika = $datum3->diff($datum2);
								?>
								@if( strtotime($preparation->datum) < time() )
									@if($preparation->rijeseno1 == 'DA' && $preparation->rijeseno2 == 'DA' && $preparation->rijeseno3 == 'DA' && $preparation->rijeseno4 == 'DA' && $preparation->rijeseno5 == 'DA' && $preparation->rijeseno6 == 'DA' && $preparation->rijeseno7 == 'DA')
										<td class="center" style="color:green">{{ date('d.m.Y', strtotime($preparation->datum)) }}</td>
									@else
										<td class="center" style="color:red">{{ date('d.m.Y', strtotime($preparation->datum)) }}</td>
									@endif
								@else
									<td class="center">{{ date('d.m.Y', strtotime($preparation->datum)) }}</td>
								@endif
								<td class="center">{{ $razlika->format('%d') . ' dana' }}</td>
								<td>{{ $preparation->rijeseno1 . ' ' . $preparation->koment_3p }}</td>
								<td>{{ $preparation->rijeseno2 . ' ' . $preparation->koment_3pOd }}</td>
								<td>{{ $preparation->rijeseno3 . ' ' . $preparation->koment_komax }}</td>
								<td>{{ $preparation->rijeseno4 . ' ' . $preparation->koment_perf }}</td>
								<td>{{ $preparation->rijeseno5 . ' ' . $preparation->koment_od }}</td>
								<td>{{ $preparation->rijeseno6 . ' ' . $preparation->koment_exp }}</td>
								<td>{{ $preparation->rijeseno7 . ' ' . $preparation->koment_pr }}</td>
								@endif
							@endforeach
						@endif
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
					<th colspan="2">Ormar</td>
					<th colspan="2">Kanalice</td>
					<th colspan="2">Din šine</td>
					<th colspan="2">Vodič</td>
					<th colspan="2">Bakar</td>
					<th colspan="2">Redne stezaljke</td>
					<th colspan="2">Sklopna oprema</td>
					<th colspan="2">PLC</td>
				</tr>
				<tr>	
					<th></td>
					<th></td>
					<th></td>
					<th></td>
					<th>Naručeno</td>
					<th>Dostavljeno</td>
					<th>Naručeno</td>
					<th>Dostavljeno</td>
					<th>Naručeno</td>
					<th>Dostavljeno</td>
					<th>Naručeno</td>
					<th>Dostavljeno</td>
					<th>Naručeno</td>
					<th>Dostavljeno</td>
					<th>Naručeno</td>
					<th>Dostavljeno</td>
					<th>Naručeno</td>
					<th>Dostavljeno</td>
					<th>Naručeno</td>
					<th>Dostavljeno</td>
				</tr>
			</thead>
			<tbody>
				@foreach($cabinets as $cabinet)
					<tr>
						<td class="center">{{ $cabinet->brOrmara }}</td>
						@if(!$purchases->where('ormar_id','=', $cabinet->id)->first())
							<td class="center">
								<a href="{{ route('admin.purchases.create', ['id' => $cabinet->id]) }}">Dodaj status pripreme</a>
							</td>
							<?php 
							$preparation = $preparations->where('ormar_id','=', $cabinet->id)->first();
							if($preparation) {
								$datum_1 = new DateTime($preparation->datum);
								$datum_2 = $datum_1->modify('+15 days');
							} else {
								$datum_1 = new DateTime($cabinet->datum_isporuke);
								$datum_2 = $datum_1->modify('-3 days');
								$danas = new DateTime('now');
							}
							?>
							@if($datum_2 <= $danas)
								<td class="center" style="color:red">{{ date_format($datum_2,'d.m.Y') }}</td>
							@else
								<td class="center" >{{ date_format($datum_2,'d.m.Y') }}</td>
							@endif
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						@else
							@foreach($purchases as $purchase)
								@if($purchase->ormar_id == $cabinet->id)
									<td class="center"><a href="{{ route('admin.purchases.edit', ['id' => $purchase->id] ) }}" >Izmjeni status pripreme</a></td>
									@if(strtotime($purchase->datum) <= time())
										@if($purchase->rijeseno1 == 'DA' && $purchase->rijeseno2 == 'DA' && $purchase->rijeseno3 == 'DA' && $purchase->rijeseno4 == 'DA' && $purchase->rijeseno5 == 'DA' && $purchase->rijeseno6 == 'DA' && $purchase->rijeseno7 == 'DA' && $purchase->rijeseno8 == 'DA')
											<td class="center" style="color:green">{{ date('d.m.Y', strtotime($purchase->datum)) }}</td>
										@else
											<td class="center" style="color:red">{{ date('d.m.Y', strtotime($purchase->datum)) }}</td>
										@endif
									@else
										<td class="center">{{ date('d.m.Y', strtotime($purchase->datum)) }}</td>
									@endif

									<?php 
									$datum1 = new DateTime($purchase->datum);
									$datum1->modify('+3 days');
									$datum2 = new DateTime($cabinet->datum_isporuke);
									$razlika = $datum1->diff($datum2);
									?>
									<td class="center">{{ $razlika->format('%d') . ' dana' }}</td>
									<td>{{ $purchase->rijeseno1 }}</td>
									<td>{{ $purchase->naruceno1 }}</td>
									<td>{{ $purchase->rijeseno2 }}</td>
									<td>{{ $purchase->naruceno2 }}</td>
									<td>{{ $purchase->rijeseno3 }}</td>
									<td>{{ $purchase->naruceno3 }}</td>
									<td>{{ $purchase->rijeseno4 }}</td>
									<td>{{ $purchase->naruceno4 }}</td>
									<td>{{ $purchase->rijeseno5 }}</td>
									<td>{{ $purchase->naruceno5 }}</td>
									<td>{{ $purchase->rijeseno6 }}</td>
									<td>{{ $purchase->naruceno6 }}</td>
									<td>{{ $purchase->rijeseno7 }}</td>
									<td>{{ $purchase->naruceno7 }}</td>
									<td>{{ $purchase->rijeseno8 }}</td>
									<td>{{ $purchase->naruceno8 }}</td>
								
									<!--<td>{{ $purchase->rijeseno1 . ' ' . $purchase->koment_orm }}</td>
									<td>{{ $purchase->rijeseno2 . ' ' . $purchase->koment_kan }}</td>
									<td>{{ $purchase->rijeseno3 . ' ' . $purchase->koment_sine }}</td>
									<td>{{ $purchase->rijeseno4 . ' ' . $purchase->koment_vod }}</td>
									<td>{{ $purchase->rijeseno5 . ' ' . $purchase->koment_bak }}</td>
									<td>{{ $purchase->rijeseno6 . ' ' . $purchase->koment_stez }}</td>
									<td>{{ $purchase->rijeseno7 . ' ' . $purchase->koment_sklOpr }}</td>-->
								
								@endif
							@endforeach
						@endif
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
						<td class="center">{{ $cabinet->brOrmara }}</td>
						@if(!$productions->where('ormar_id','=', $cabinet->id)->first())
							<td class="center">
								<a href="{{ route('admin.productions.create', ['id' => $cabinet->id]) }}">Dodaj status pripreme</a>
							</td>
							<?php 
							$purchase = $purchases->where('ormar_id','=', $cabinet->id)->first();
							if($purchase){
							$datum_1 = new DateTime($purchase->datum);
							$datum_2 = $datum_1->modify('+2 days');
							$danas = new DateTime('now');
							} else {
							$datum_1 = new DateTime($cabinet->datum_isporuke);
							$datum_2 = $datum_1->modify('-1 days');
							$danas = new DateTime('now');
							}
							?>
						
							@if($datum_2 <= $danas)
								<td class="center" style="color:red">{{ date_format($datum_2,'d.m.Y') }}</td>
							@else
								<td class="center">{{ date_format($datum_2,'d.m.Y') }}</td>
							@endif
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						@endif
						
						@foreach($productions as $production)
							@if($production->ormar_id == $cabinet->id)
							<td class="center"><a href="{{ route('admin.productions.edit', ['id' => $production->id] ) }}" >Izmjeni status pripreme</a></td>
							@if(strtotime($production->datum) <= time())
								@if($production->rijeseno1 == 'DA' && $production->rijeseno2 == 'DA' && $production->rijeseno3 == 'DA' && $production->rijeseno4 == 'DA' && $production->rijeseno5 == 'DA' && $production->rijeseno6 == 'DA' && $production->rijeseno7 == 'DA')
									<td class="center" style="color:green">{{ date('d.m.Y', strtotime($production->datum)) }}</td>
								@else
									<td class="center" style="color:red">{{ date('d.m.Y', strtotime($production->datum)) }}</td>
								@endif
							@else
								<td class="center">{{ date('d.m.Y', strtotime($production->datum)) }}</td>
							@endif
							
							
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
	@if (Sentinel::check() && Sentinel::inRole('kupac') || Sentinel::inRole('voditelj') || Sentinel::inRole('administrator') )
	<div id="Status" class="clearfix tabcontent">
	  <!--<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>-->

		<div class="row">
			<div class="col-xs-12 col-md-12 col-md-10 col-lg-12">
				<div class="header panel-heading">
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
					<div class="bordB  col-md-4">
						<h6><b>Proizvodni broj ormara: {{ $cabinet->brOrmara }}</b></h6>
								<p><ins>Status</ins></p>
								@if($prep &&
								$prep->rijeseno1 == 'DA' && 
								$prep->rijeseno2 == 'DA' && 
								$prep->rijeseno3 == 'DA' && 
								$prep->rijeseno4 == 'DA' && 
								$prep->rijeseno5 == 'DA' && 
								$prep->rijeseno6 == 'DA' && 
								$prep->rijeseno7 == 'DA')
									<p class="rght">Priprema: <span class="završeno">završeno</span>
								@else
									<p class="rght">Priprema: <span class="uradu">u postupku</span>
								@endif
								@if($purch &&
								$purch->rijeseno1 == 'DA' && 
								$purch->rijeseno2 == 'DA' && 
								$purch->rijeseno3 == 'DA' && 
								$purch->rijeseno4 == 'DA' && 
								$purch->rijeseno5 == 'DA' && 
								$purch->rijeseno6 == 'DA' && 
								$purch->rijeseno7 == 'DA')
									<p class="rght">Nabava: <span class="završeno">završeno</span>
								@else
									<p class="rght">Nabava: <span class="uradu">u postupku</span>
								@endif

								@if($prod &&
								$prod->rijeseno1 == 'DA' && 
								$prod->rijeseno2 == 'DA' && 
								$prod->rijeseno3 == 'DA' && 
								$prod->rijeseno4 == 'DA' && 
								$prod->rijeseno5 == 'DA' && 
								$prod->rijeseno6 == 'DA' && 
								$prod->rijeseno7 == 'DA')
									<p class="rght">Proizvodnja: <span class="završeno">završeno</span>
								@else
									<p class="rght">Proizvodnja: <span class="uradu">u postupku</span>
								@endif 
								
								
						
								@if($prod)
									<p><b>Datum isporuke: {{ date_format($datum_isp,'d.m.Y') }}</b></p>
									<p><b>Ugovoreni datum isporuke: {{ date('d.m.Y', strtotime($cabinet->datum_isporuke)) }}</b></p>
								@else
									<p><b>Datum isporuke: </b></p>
								<p><b>Ugovoreni datum isporuke: {{ date('d.m.Y', strtotime($cabinet->datum_isporuke)) }}</b></p>

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
	
	<script>
			$(document).ready(function(){
				$(".OrmProiz").click(function(){
					$("p").toggle();
				});
			});
	</script>
@stop
