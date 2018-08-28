@extends('layouts.admin')

@section('title', 'Proizvodni projekti')
<link rel="stylesheet" href="{{ URL::asset('css/production.css') }}"/>

@section('content')
	<section>
		<div class="addEnc">
			@if (Sentinel::check() && Sentinel::inRole('proizvodnja') || Sentinel::inRole('administrator') || Sentinel::inRole('voditelj'))
			<!-- Trigger/Open The Modal -->
			<button data-path="{{ route('admin.cabinets.create') }}" 
			   class="load-ajax-modal" role="button" data-toggle="modal" data-target="#myModal">
			   <i class="far fa-plus-square"></i>add enclosure
			</button>
			@endif
			<h2>{{ 'Project name: '}}<b>{{ $project->id . ' - ' . $project->naziv }}</b></h2>
		</div>
		
		@foreach($cabinets as $cabinet)
		<?php 
			if($cabinet) {
				$preparation = DB::table('preparations')->where('ormar_id',$cabinet->id)->first();
				$purchase = DB::table('purchases')->where('ormar_id',$cabinet->id)->first();
				$production = DB::table('productions')->where('ormar_id',$cabinet->id)->first();
			}
		?>
		<div class="tab clearfix">
			<div class="tab1">
				<img src="{{ asset('img/cab.png') }}"/>
			</div>
			<div class="tab4">
				<div class="tab2">
					@if (Sentinel::check() && Sentinel::inRole('proizvodnja') || Sentinel::inRole('administrator') || Sentinel::inRole('voditelj') || Sentinel::inRole('kupac') )
						<div class="Jtab">
							<div class="icons clearfix">
								@if($preparation)
									@if($preparation->rijeseno1 == 'DA' &&
									$preparation->rijeseno2 == 'DA' &&
									$preparation->rijeseno3 == 'DA' &&
									$preparation->rijeseno4 == 'DA' &&
									$preparation->rijeseno5 == 'DA' &&
									$preparation->rijeseno6 == 'DA' &&
									$preparation->rijeseno7 == 'DA')
										<span class="ellipseG"></span>
										<?php $status_Prep ='Complited'; ?>
									@elseif($preparation->rijeseno1 == 'NE' &&
									$preparation->rijeseno2 == 'NE' &&
									$preparation->rijeseno3 == 'NE' &&
									$preparation->rijeseno4 == 'NE' &&
									$preparation->rijeseno5 == 'NE' &&
									$preparation->rijeseno6 == 'NE' &&
									$preparation->rijeseno7 == 'DA')
										<span class="ellipseR"></span>
										<?php $status_Prep ='Havent started'; ?>
									@else
										<span class="ellipseO"></span>
										<?php $status_Prep ='In progress'; ?>
									@endif
									<button data-path="{{ route('admin.preparations.show', $preparation->id) }}" 
									class="load-ajax-modal" role="button" data-toggle="modal" data-target="#myModal">
									<i class="fas fa-info-circle"></i>
									</button>
									@if (Sentinel::inRole('voditelj') || Sentinel::inRole('kupac'))
								
									@else
										<button data-path="{{ route('admin.preparations.edit', $preparation->id) }}" 
										class="load-ajax-modal" role="button" data-toggle="modal" data-target="#myModal">
										<i class="far fa-edit" ></i>
										</button>
									@endif
								@else
									<span class="ellipseR"></span>
									<?php $status_Prep ='Havent started'; ?>
									<button >
									<i class="fas fa-info-circle" title="Havent started!"></i>
									</button>
									@if (Sentinel::inRole('voditelj') || Sentinel::inRole('kupac'))
								
									@else
										<button data-path="{{ route('admin.preparations.create', ['id' => $cabinet->id]) }}" 
										class="load-ajax-modal {{ Request::is('admin/users*') ? 'active' : '' }}" role="button" data-toggle="modal" data-target="#myModal">
										<i class="far fa-edit"></i>
										</button>
									@endif
								@endif
	
							</div>
							<p class="tablinks" onclick="openCity(event, 'preparation')" id="defaultOpen">
								preparation<span>status: {{ $status_Prep }} </span>
							</p>
						</div>
						<div class="Jtab">
							<div class="icons clearfix">
								@if($purchase)
									@if($purchase->rijeseno1 == 'DA' &&
									$purchase->rijeseno2 == 'DA' &&
									$purchase->rijeseno3 == 'DA' &&
									$purchase->rijeseno4 == 'DA' &&
									$purchase->rijeseno5 == 'DA' &&
									$purchase->rijeseno6 == 'DA' &&
									$purchase->rijeseno7 == 'DA' && 
									$purchase->rijeseno8 == 'DA')
										<span class="ellipseG"></span>
										<?php $status_Purch ='Complited'; ?>
									@elseif($purchase->naruceno1 == 'NE' &&
									$purchase->naruceno2 == 'NE' &&
									$purchase->naruceno3 == 'NE' &&
									$purchase->naruceno4 == 'NE' &&
									$purchase->naruceno5 == 'NE' &&
									$purchase->naruceno6 == 'NE' &&
									$purchase->naruceno7 == 'NE' &&
									$purchase->naruceno8 == 'NE' &&
									$purchase->rijeseno1 == 'NE' &&
									$purchase->rijeseno2 == 'NE' &&
									$purchase->rijeseno3 == 'NE' &&
									$purchase->rijeseno4 == 'NE' &&
									$purchase->rijeseno5 == 'NE' &&
									$purchase->rijeseno6 == 'NE' &&
									$purchase->rijeseno7 == 'NE' && 
									$purchase->rijeseno8 == 'NE')
										<span class="ellipseR"></span>
										<?php $status_Purch ='Havent started'; ?>	
									@else
										<span class="ellipseO"></span>
										<?php $status_Purch ='In progress'; ?>
									@endif
									<button data-path="{{ route('admin.purchases.show', $purchase->id) }}" 
										class="load-ajax-modal" role="button" data-toggle="modal" data-target="#myModal">
										<i class="fas fa-info-circle"></i>
										</button>
										@if (Sentinel::inRole('voditelj') || Sentinel::inRole('kupac'))
										
										@else
											<button data-path="{{ route('admin.purchases.edit', $purchase->id) }}" 
												class="load-ajax-modal {{ Request::is('admin/users*') ? 'active' : '' }}" role="button" data-toggle="modal" data-target="#myModal">
												<i class="far fa-edit"></i>
											</button>
										@endif
								@else
									<span class="ellipseR"></span>
									<?php $status_Purch ='Havent started'; ?>
									<button >
									<i class="fas fa-info-circle" title="Havent started!"></i>
									</button>
										@if (Sentinel::inRole('voditelj') || Sentinel::inRole('kupac'))
									
										@else
											<button data-path="{{ route('admin.purchases.create', ['id' => $cabinet->id]) }}" 
											class="load-ajax-modal {{ Request::is('admin/users*') ? 'active' : '' }}" role="button" data-toggle="modal" data-target="#myModal">
											<i class="far fa-edit"></i>
											</button>
										@endif
								@endif
								
							</div>
							<p class="tablinks" onclick="openCity(event, 'purchase')" id="defaultOpen">
								purchase<span>status: {{ $status_Purch }} </span>
							</p>
						</div>
						<div class="Jtab">
							<div class="icons clearfix">
								@if($production)
									@if($production->rijeseno1 == 'DA' &&
									$production->rijeseno2 == 'DA' &&
									$production->rijeseno3 == 'DA' &&
									$production->rijeseno4 == 'DA' &&
									$production->rijeseno5 == 'DA' &&
									$production->rijeseno6 == 'DA' &&
									$production->rijeseno7 == 'DA' &&
									$production->rijeseno8 == 'DA')
										<span class="ellipseG"></span>
										<?php $status_Prod  ='Complited'; ?>
									@elseif($production->rijeseno1 == 'NE' &&
									$production->rijeseno2 == 'NE' &&
									$production->rijeseno3 == 'NE' &&
									$production->rijeseno4 == 'NE' &&
									$production->rijeseno5 == 'NE' &&
									$production->rijeseno6 == 'NE' &&
									$production->rijeseno7 == 'NE' &&
									$production->rijeseno8 == 'NE')
										<span class="ellipseR"></span>
										<?php $status_Prod ='Havent started'; ?>
									@else
										<span class="ellipseO"></span>
										<?php $status_Prod ='In progress'; ?>
									@endif
									<button data-path="{{ route('admin.productions.show', $production->id) }}" 
									class="load-ajax-modal" role="button" data-toggle="modal" data-target="#myModal">
									<i class="fas fa-info-circle"></i>
									</button>
									@if (Sentinel::inRole('voditelj') || Sentinel::inRole('kupac'))
									
									@else
										<button data-path="{{ route('admin.productions.edit', $production->id) }}" 
										class="load-ajax-modal {{ Request::is('admin/users*') ? 'active' : '' }}" role="button" data-toggle="modal" data-target="#myModal">
										<i class="far fa-edit"></i>
										</button>
									@endif
								@else
									<span class="ellipseR"></span>
									<?php $status_Prod ='Havent started'; ?>
									<button >
									<i class="fas fa-info-circle" title="Havent started!"></i>
									</button>
									@if (Sentinel::inRole('voditelj') || Sentinel::inRole('kupac'))
								
									@else
									<button data-path="{{ route('admin.productions.create', ['id' => $cabinet->id]) }}" 
									class="load-ajax-modal {{ Request::is('admin/users*') ? 'active' : '' }}" role="button" data-toggle="modal" data-target="#myModal">
									<i class="far fa-edit"></i>
									</button>
									@endif
								@endif
								
							</div>
							<p class="tablinks" onclick="openCity(event, 'production')" id="defaultOpen">
								production<span>status: {{ $status_Prod }} </span>
							</p>
						</div>
						<div class="Jtab">
							<div class="icons clearfix">
								<span class="ellipseO"></span>
								<button>
									<i class="fas fa-info-circle"></i>
								</button>
								<button>
								<i class="far fa-edit"></i>
								</button>
							</div>
							<p class="tablinks" onclick="openCity(event, 'delivery')" id="defaultOpen">
							delivery<span>status: In progress</span>
							</p>
						</div>
					@endif
	
				</div>
				<div class="Jcontent">
					<div class="cont1">
						<p>client: </p><span>{{ $project->investitor }}</span>
						<p>enclosure title:</p><span> {{ $cabinet->naziv }}</span>
						<p>enclosure number: </p><span>{{ $cabinet->brOrmara }}</span>
						<p>contracted delivery date: </p><span>{{ $cabinet->	datum_isporuke }}</span>
						<p>delivery date: </p><span>{{ $cabinet->datum_isporuke }}</span>
					</div>
					<div class="cont1">
						<p>Project leader:</p><span> {{ $project->user['first_name'] . ' ' . $cabinet->user['last_name'] }}</span>
						<p>Designed by: </p><span>{{ $cabinet->projektirao_user['first_name'] . ' ' . $cabinet->projektirao_user['last_name'] }}</span>
						<p>approved by: </p><span>{{ $cabinet->odobrio_user['first_name'] . ' ' . $cabinet->odobrio_user['last_name'] }}</span>
						<p>manufacturer of cabinets: </p><span>{{ $cabinet->proizvodjac }}</span>
						<p>equipment manufacturer: </p><span>{{ $cabinet->proizvodjacOpr }}</span>
					</div>
					<div class="cont1">
						<p>dimension: </p><span>{{ $cabinet->velicina}}</span>
						<p>design: </p><span>{{ $cabinet->izvedba }}</span>
						<p>type: </p><span>{{ $cabinet->tip }}</span>
						<p>door design: </p><span>{{ $cabinet->model }}</span>
						<p>material: </p><span>{{ $cabinet->materijal }}</span>
					</div>
					<div class="cont1">
						<p>Rated voltage: </p><span>{{ $cabinet->napon }}</span>
						<p>Rated current:  </p><span>{{ $cabinet->struja }}</span>
						<p>Breaking power: </p><span>{{ $cabinet->prekidna_moc }}</span>
						<p>Protection system: </p><span>{{ $cabinet->sustav_zastite }}</span>
						<p>IP protection of cabinets: </p><span>{{ $cabinet->ip_zastita }}</span>
					</div>
					<div class="cont1">
						<p>Cable entry: </p><span>{{ $cabinet->ulaz_kabela }}</span>
						<p>Tags: </p><span>{{ $cabinet->oznake }}</span>
						<p>Logo: </p><span>{{ $cabinet->logo }}</span>
						<p>note: </p><span>{{ $cabinet->napomena }}</span>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</section>
@stop