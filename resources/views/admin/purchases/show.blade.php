<link rel="stylesheet" href="{{ URL::asset('css/production.css') }}"/>

<div class="Jprod">
<button type="button" class="Jbtn-close" data-dismiss="modal">&times</button>
	<div class="Jprep">
		<div class="Jprod-head prep_show clearfix">
			<h3 class="">Purchase status</h3>

			<p>Project: <span>{{ $cabinet->projekt['naziv'] }}</span></p>
			<p>Enclosure: <span>{{ $cabinet->brOrmara . ' ' . $cabinet->naziv }}</span></p>

		</div>
		
		<div class="purchase">
			<table class="prep-tbl2">
				<tr>
					<td colspan="2" class="padding10_t">Datum isporuke</td>
					<?php 
						$datum1 = new DateTime($purchase->datum);
						$datum3 = $datum1->modify('+18 days');
						$cabinet= DB::table('cabinets')->where('id',$purchase->ormar_id)->first();
						$datum2 = new DateTime($cabinet->datum_isporuke);
						$razlika = $datum3->diff($datum2);
						?>
						@if( strtotime($purchase->datum) < time() )
							@if($purchase->rijeseno1 == 'DA' && $purchase->rijeseno2 == 'DA' && $purchase->rijeseno3 == 'DA' && $purchase->rijeseno4 == 'DA' && $purchase->rijeseno5 == 'DA' && $purchase->rijeseno6 == 'DA' && $purchase->rijeseno7 == 'DA')
								<td class="center padding10_t" style="color:green">{{ date('d.m.Y', strtotime($purchase->datum)) }}</td>
							@else
								<td class="center " style="color:red">{{ date('d.m.Y', strtotime($purchase->datum)) }}</td>
							@endif
						@endif
				</tr>
				<tr>	
					<td colspan="2" class="">Očekivana promjena roka</td>
					<td class="center">{{ $razlika->format('%d') . ' dana' }}</td>
				</tr>
				<tr class="Prep-tbl" style="border-bottom:1px solid #ccc">
					<th class="padding30_t">Item</th>
					<th class="padding30_t">ordered</th>
					<th class="padding30_t">delivered</th>
					<th class="padding30_t">delivery date</th>
					<th class="padding30_t">comment</th>
				</tr>
				<tr>	
					<td class="padding10_t">Ormar</td>
					<td class="padding10_t circle">
						@if($purchase->naruceno1 == 'NE')
							<span class="checkmark1"></span>
						@elseif($purchase->naruceno1 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td class="padding10_t circle">
						@if($purchase->rijeseno1 == 'NE')
							<span class="checkmark1"></span>
						@elseif($purchase->rijeseno1 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td class="padding10_t">{{ date('d.m.Y', strtotime($purchase->datum1 )) }}</td>
					<td class="padding10_t">{{ $purchase->koment_orm }}</td>
				</tr>
				<tr>	
					<td>Kanalice</td>
					<td class="circle">
						@if($purchase->naruceno2 == 'NE')
							<span class="checkmark1"></span>
						@elseif($purchase->naruceno2 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td class="circle">
						@if($purchase->rijeseno2 == 'NE')
							<span class="checkmark1"></span>
						@elseif($purchase->rijeseno2 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td class="padding10_t">{{ date('d.m.Y', strtotime($purchase->datum2 )) }}</td>
					<td>{{ $purchase->koment_kan }}</td>
				</tr>
				<tr>	
					<td>Din šine</td>
					<td class="circle">
						@if($purchase->naruceno3 == 'NE')
							<span class="checkmark1"></span>
						@elseif($purchase->naruceno3 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td class="circle">
						@if($purchase->rijeseno3 == 'NE')
							<span class="checkmark1"></span>
						@elseif($purchase->rijeseno3 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td class="padding10_t">{{ date('d.m.Y', strtotime($purchase->datum3 )) }}</td>
					<td>{{ $purchase->koment_sine }}</td>
				</tr>
				<tr>	
					<td>Vodič</td>
					<td class="circle">
						@if($purchase->naruceno4 == 'NE')
							<span class="checkmark1"></span>
						@elseif($purchase->naruceno4 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td class="circle">
						@if($purchase->rijeseno4 == 'NE')
							<span class="checkmark1"></span>
						@elseif($purchase->rijeseno4 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td class="padding10_t">{{ date('d.m.Y', strtotime($purchase->datum4 )) }}</td>
					<td>{{ $purchase->koment_vod }}</td>
				</tr>
				<tr>	
					<td>Bakar</td>
					<td class="circle">
						@if($purchase->naruceno5 == 'NE')
							<span class="checkmark1"></span>
						@elseif($purchase->naruceno5 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td class="circle">
						@if($purchase->rijeseno5 == 'NE')
							<span class="checkmark1"></span>
						@elseif($purchase->rijeseno5 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td class="padding10_t">{{ date('d.m.Y', strtotime($purchase->datum5 )) }}</td>
					<td>{{ $purchase->koment_bak }}</td>
				</tr>
				<tr>	
					<td>Redne stezaljke</td>
					<td class="circle">
						@if($purchase->naruceno6 == 'NE')
							<span class="checkmark1"></span>
						@elseif($purchase->naruceno6 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td class="circle">
						@if($purchase->rijeseno6 == 'NE')
							<span class="checkmark1"></span>
						@elseif($purchase->rijeseno6 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td class="padding10_t">{{ date('d.m.Y', strtotime($purchase->datum6 )) }}</td>
					<td>{{ $purchase->koment_stez }}</td>
				</tr>
				<tr>	
					<td>Sklopna oprema</td>
					<td class="circle">
						@if($purchase->naruceno7 == 'NE')
							<span class="checkmark1"></span>
						@elseif($purchase->naruceno7 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td class="circle">
						@if($purchase->rijeseno7 == 'NE')
							<span class="checkmark1"></span>
						@elseif($purchase->rijeseno7 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td class="padding10_t">{{ date('d.m.Y', strtotime($purchase->datum7 )) }}</td>
					<td>{{ $purchase->koment_sklOpr }}</td>
				</tr>
				<tr>	
					<td>PLC</td>
					<td class="circle">
						@if($purchase->naruceno8 == 'NE')
							<span class="checkmark1"></span>
						@elseif($purchase->naruceno8 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td class="circle">
						@if($purchase->rijeseno8 == 'NE')
							<span class="checkmark1"></span>
						@elseif($purchase->rijeseno8 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td class="padding10_t">{{ date('d.m.Y', strtotime($purchase->datum8 )) }}</td>
					<td>{{ $purchase->koment_PLC }}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
