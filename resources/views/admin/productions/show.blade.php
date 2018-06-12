@extends('layouts.admin')

@section('title', 'Proizvodni projekti')
<link rel="stylesheet" href="{{ URL::asset('css/production.css') }}"/>

@section('content')
	<section>
		<div class="addEnc">
			<!-- Trigger/Open The Modal -->
			<button data-path="{{ route('admin.cabinets.create') }}" 
			   class="load-ajax-modal" 
			   role="button" 
			   data-toggle="modal" data-target="#dynamic-modal">
			   <span class="glyphicon glyphicon-eye-open"></span> add enclosure
			</button>

			<div class="modal fade" id="dynamic-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
			
			  <div class="modal-dialog" style="width:647px">
				<div class="modal-content">
				 
					
				  <div class="modal-body">
					
				  </div>
				  <button type="button" class="Jbtn-close" data-dismiss="modal">&times</button>
				  
				
				</div>
			  </div>
			</div>
			<script src="custom.js"></script>
		
			<h2>{{ 'Naziv projekta: '}}<b>{{ $project->id . ' - ' . $project->naziv }}</b></h2>
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
					@if (Sentinel::check() && Sentinel::inRole('proizvodnja') || Sentinel::inRole('administrator') || Sentinel::inRole('voditelj') )
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
										@elseif($preparation->rijeseno1 == 'DA' ||
										$preparation->rijeseno2 == 'DA' || 
										$preparation->rijeseno3 == 'DA' ||
										$preparation->rijeseno4 == 'DA' ||
										$preparation->rijeseno5 == 'DA' ||
										$preparation->rijeseno6 == 'DA' ||
										$preparation->rijeseno7 == 'DA')
											<span class="ellipseO"></span>
											<?php $status_Prep ='In progress'; ?>
										@else
											<span class="ellipseR"></span>
											<?php $status_Prep ='Havent started'; ?>
										@endif
									@else
										<span class="ellipseR"></span>
										<?php $status_Prep ='Havent started'; ?>
									@endif
									<a href="#"><i class="fas fa-info-circle"></i></a>
									@if($preparation)
										<a class="{{ Request::is('admin/users*') ? 'active' : '' }}" href="{{ route('admin.preparations.edit', $preparation->id) }}"><i class="far fa-edit"></i></a>
									@else
										<a class="{{ Request::is('admin/users*') ? 'active' : '' }}" href="{{ route('admin.preparations.create', ['id' => $cabinet->id]) }}"><i class="far fa-edit"></i></a>
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
										@elseif($purchase->rijeseno1 == 'DA' ||
										$purchase->rijeseno2 == 'DA' || 
										$purchase->rijeseno3 == 'DA' ||
										$purchase->rijeseno4 == 'DA' ||
										$purchase->rijeseno5 == 'DA' ||
										$purchase->rijeseno6 == 'DA' ||
										$purchase->rijeseno7 == 'DA' || 
										$purchase->rijeseno8 == 'DA')
											<span class="ellipseO"></span>
											<?php $status_Purch ='In progress'; ?>
										@else
											<span class="ellipseR"></span>
											<?php $status_Purch ='Havent started'; ?>	
										@endif
									@else
										<span class="ellipseR"></span>
										<?php $status_Purch ='Havent started'; ?>
									@endif
									<a href="#"><i class="fas fa-info-circle"></i></a>
									@if($purchase)
										<a class="{{ Request::is('admin/users*') ? 'active' : '' }}" href="{{ route('admin.purchases.edit', $purchase->id) }}"><i class="far fa-edit"></i></a>
									@else
										<a class="{{ Request::is('admin/users*') ? 'active' : '' }}" href="{{ route('admin.purchases.create', ['id' => $cabinet->id]) }}"><i class="far fa-edit"></i></a>
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
											<?php $status_Prod ='Complited'; ?>
										@elseif($production->rijeseno1 == 'DA' ||
										$production->rijeseno2 == 'DA' ||
										$production->rijeseno3 == 'DA' ||
										$production->rijeseno4 == 'DA' ||
										$production->rijeseno5 == 'DA' ||
										$production->rijeseno6 == 'DA' ||
										$production->rijeseno7 == 'DA' ||
										$production->rijeseno8 == 'DA')
											<span class="ellipseO"></span>
											<?php $status_Prod ='In progress'; ?>
										@else
											<span class="ellipseR"></span>
											<?php $status_Prod ='Havent started'; ?>
										@endif
									@else
										<span class="ellipseR"></span>
										<?php $status_Prod ='Havent started'; ?>
									@endif
									<i class="fas fa-info-circle"></i>
									@if($production)
										<a class="{{ Request::is('admin/users*') ? 'active' : '' }}" href="{{ route('admin.productions.edit', $production->id ) }}"><i class="far fa-edit"></i></a>
									@else
										<a class="{{ Request::is('admin/users*') ? 'active' : '' }}" href="{{ route('admin.productions.create', ['id' => $cabinet->id]) }}"><i class="far fa-edit"></i></a>
									@endif	
								</div>
								<p class="tablinks" onclick="openCity(event, 'production')" id="defaultOpen">
								production<span>status: {{ $status_Prod }}</span>
								</p>
							</div>
							<div class="Jtab">
								<div class="icons clearfix">
									<span class="ellipseO"></span>
									<i class="fas fa-info-circle"></i>
									<i class="far fa-edit"></i>
									
								</div>
								<p class="tablinks" onclick="openCity(event, 'delivery')" id="defaultOpen">
								delivery<span>status: In progress</span>
								</p>
							</div>
						
					@endif
					@if (Sentinel::check() && Sentinel::inRole('kupac'))
						<div class="Jtab">
								<div class="icons clearfix">
									<span class="ellipseO"></span>
									<i class="fas fa-info-circle"></i>
									<i class="far fa-edit"></i>
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

	<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name="_token"]').attr('content')
		}
	});
	
	$('.load-ajax-modal').click(function(){

    $.ajax({
        type : 'GET',
        url : $(this).data('path'),

        success: function(result) {
            $('#dynamic-modal div.modal-body').html(result);
        }
    });
	});
	</script>
	
	<script>
			$(document).ready(function(){
				$(".OrmProiz").click(function(){
					$("p").toggle();
				});
			});
	</script>
@stop
