<link rel="stylesheet" href="{{ URL::asset('css/production.css') }}"/>

<div class="Jprod">
<button type="button" class="Jbtn-close" data-dismiss="modal">&times</button>
	<div class="Jprep">
		<div class="Jprod-head prep_show clearfix">
			<h3 class="">production status</h3>

			<p>Project: <span>{{ $cabinet->projekt['naziv'] }}</span></p>
			<p>Enclosure: <span>{{ $cabinet->brOrmara . ' ' . $cabinet->naziv }}</span></p>

		</div>
		
		<div class="production">
			<table class="prep-tbl2">
				<tr class="padding10_t">
					<td colspan="2" class="padding10_t">Datum isporuke</td>
					<?php 
						$datum1 = new DateTime($production->datum);
						$cabinet= DB::table('cabinets')->where('id',$production->ormar_id)->first();
						$datum2 = new DateTime($cabinet->datum_isporuke);
						$razlika = $datum1->diff($datum2);
						?>
						@if( strtotime($production->datum) < time() )
							@if($production->rijeseno1 == 'DA' && $production->rijeseno2 == 'DA' && $production->rijeseno3 == 'DA' && $production->rijeseno4 == 'DA' && $production->rijeseno5 == 'DA' && $production->rijeseno6 == 'DA' && $production->rijeseno7 == 'DA' && $production->rijeseno8 == 'DA')
								<td class="center padding10_t" style="color:green">{{ date('d.m.Y', strtotime($production->datum)) }}</td>
							@else
								<td class="center padding10_t" style="color:red">{{ date('d.m.Y', strtotime($production->datum)) }}</td>
							@endif
						@endif
				</tr>
				<tr>	
					<td colspan="2" class="">Očekivana promjena roka</td>
					<td class="center">{{ $razlika->format('%d') . ' dana' }}</td>
				</tr>
				<tr class="Prep-tbl" style="border-bottom:1px solid #ccc">
					<th class="padding30_t">Item</th>
					<th class="padding30_t">resolved</th>
					<th class="padding30_t">comment</th>
				</tr>
				<tr>	
					<td class="padding10_t">Obrada montažne ploče</td>
					<td class="padding10_t circle">
						@if($production->rijeseno1 == 'NE')
							<span class="checkmark1"></span>
						@elseif($production->rijeseno1 == 'in progress')
							<span class="checkmark2"></span>
						@elseif($production->rijeseno1 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td class="padding10_t">{{ $production->koment_mp }}</td>
				</tr>
				<tr>	
					<td>Obrada ormara</td>
					<td class="padding10_t circle">
						@if($production->rijeseno2 == 'NE')
							<span class="checkmark1"></span>
						@elseif($production->rijeseno2 == 'in progress')
							<span class="checkmark2"></span>
						@elseif($production->rijeseno2 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td>{{ $production->koment_orm }}</td>
				</tr>
				<tr>	
					<td>Rezanje vodiča</td>
					<td class="padding10_t circle">
						@if($production->rijeseno3 == 'NE')
							<span class="checkmark1"></span>
						@elseif($production->rijeseno3 == 'in progress')
							<span class="checkmark2"></span>
						@elseif($production->rijeseno3 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td>{{ $production->koment_vod }}</td>
				</tr>
				<tr>	
					<td>Izrada oznaka</td>
					<td class="padding10_t circle">
						@if($production->rijeseno4 == 'NE')
							<span class="checkmark1"></span>
						@elseif($production->rijeseno4 == 'in progress')
							<span class="checkmark2"></span>
						@elseif($production->rijeseno4 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td>{{ $production->koment_ozn }}</td>
				</tr>
				<tr>	
					<td>Slaganje montažne ploče</td>
					<td class="padding10_t circle">
						@if($production->rijeseno5 == 'NE')
							<span class="checkmark1"></span>
						@elseif($production->rijeseno5 == 'in progress')
							<span class="checkmark2"></span>
						@elseif($production->rijeseno5 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td>{{ $production->koment_slMp }}</td>
				</tr>
				<tr>	
					<td>Označavanje montažne ploče</td>
					<td class="padding10_t circle">
						@if($production->rijeseno6 == 'NE')
							<span class="checkmark1"></span>
						@elseif($production->rijeseno6 == 'in progress')
							<span class="checkmark2"></span>
						@elseif($production->rijeseno6 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td>{{ $production->koment_oznMp }}</td>
				</tr>
				<tr>	
					<td>Ožičenje</td>
					<td class="padding10_t circle">
						@if($production->rijeseno7 == 'NE')
							<span class="checkmark1"></span>
						@elseif($production->rijeseno7 == 'in progress')
							<span class="checkmark2"></span>
						@elseif($production->rijeseno7 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td>{{ $production->koment_ozic }}</td>
				</tr>
				<tr>	
					<td>CE QR dokumentacija</td>
					<td class="padding10_t circle">
						@if($production->rijeseno8 == 'NE')
							<span class="checkmark1"></span>
						@elseif($production->rijeseno8 == 'in progress')
							<span class="checkmark2"></span>
						@elseif($production->rijeseno8 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td>{{ $production->koment_dok }}</td>
				</tr>
				<tr>	
					<td>Ispitivanje</td>
					<td class="padding10_t circle">
						@if($production->rijeseno9 == 'NE')
							<span class="checkmark1"></span>
						@elseif($production->rijeseno9 == 'in progress')
							<span class="checkmark2"></span>
						@elseif($production->rijeseno9 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td>{{ $production->koment_isp }}</td>
				</tr>
				<tr>
				<td></td>
				</tr>
			</table>
			
		</div>
	</div>
	
</div>
