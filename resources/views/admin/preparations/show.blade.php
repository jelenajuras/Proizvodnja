<link rel="stylesheet" href="{{ URL::asset('css/production.css') }}"/>

<div class="Jprod">
<button type="button" class="Jbtn-close" data-dismiss="modal">&times</button>
	<div class="Jprep">
		<div class="Jprod-head clearfix">
			<h3 class="">Preparation status</h3>

			<p>Project: <span>{{ $cabinet->projekt['naziv'] }}</span></p>
			<p>Enclosure: <span>{{ $cabinet->brOrmara . ' ' . $cabinet->naziv }}</span></p>

		</div>
		
		<div class="production">
			
			<table class="prep-tbl2">
				<tr>
					<td colspan="2" class="padding10_t">Datum isporuke</td>
					<?php 
						$datum1 = new DateTime($preparation->datum);
						$datum3 = $datum1->modify('+18 days');
						$cabinet= DB::table('cabinets')->where('id',$preparation->ormar_id)->first();
						$datum2 = new DateTime($cabinet->datum_isporuke);
						$razlika = $datum3->diff($datum2);
						?>
						@if( strtotime($preparation->datum) < time() )
							@if($preparation->rijeseno1 == 'DA' && $preparation->rijeseno2 == 'DA' && $preparation->rijeseno3 == 'DA' && $preparation->rijeseno4 == 'DA' && $preparation->rijeseno5 == 'DA' && $preparation->rijeseno6 == 'DA' && $preparation->rijeseno7 == 'DA')
								<td class="center padding10_t" style="color:green">{{ date('d.m.Y', strtotime($preparation->datum)) }}</td>
							@else
								<td class="center " style="color:red">{{ date('d.m.Y', strtotime($preparation->datum)) }}</td>
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
					<td class="padding10_t">Napravljena 3p shema</td>
					<td class="padding10_t circle">
						@if($preparation->rijeseno1 == 'NE')
							<span class="checkmark1"></span>
						@elseif($preparation->rijeseno1 == 'PROG')
							<span class="checkmark2"></span>
						@elseif($preparation->rijeseno1 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td class="padding10_t">{{ $preparation->koment_3p }}</td>
				</tr>
				<tr>	
					<td>Odobrena 3p shema</td>
					<td class="padding10_t circle">
						@if($preparation->rijeseno2 == 'NE')
							<span class="checkmark1"></span>
						@elseif($preparation->rijeseno2 == 'PROG')
							<span class="checkmark2"></span>
						@elseif($preparation->rijeseno2 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td>{{ $preparation->koment_3pOd }}</td>
				</tr>
				<tr>	
					<td>Pripremljena rezna lista za Komax</td>
					<td class="padding10_t circle">
						@if($preparation->rijeseno3 == 'NE')
							<span class="checkmark1"></span>
						@elseif($preparation->rijeseno3 == 'PROG')
							<span class="checkmark2"></span>
						@elseif($preparation->rijeseno3 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td>{{ $preparation->koment_komax }}</td>
				</tr>
				<tr>	
					<td>Pripremljena rezna lista za Perforex</td>
					<td class="padding10_t circle">
						@if($preparation->rijeseno4 == 'NE')
							<span class="checkmark1"></span>
						@elseif($preparation->rijeseno4 == 'PROG')
							<span class="checkmark2"></span>
						@elseif($preparation->rijeseno4 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td>{{ $preparation->koment_perf }}</td>
				</tr>
				<tr>	
					<td>Odobren 3D izgled ormara</td>
					<td class="padding10_t circle">
						@if($preparation->rijeseno5 == 'NE')
							<span class="checkmark1"></span>
						@elseif($preparation->rijeseno5 == 'PROG')
							<span class="checkmark2"></span>
						@elseif($preparation->rijeseno5 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td>{{ $preparation->koment_od }}</td>
				</tr>
				<tr>	
					<td>Oznake eksportirane</td>
					<td class="padding10_t circle">
						@if($preparation->rijeseno6 == 'NE')
							<span class="checkmark1"></span>
						@elseif($preparation->rijeseno6 == 'PROG')
							<span class="checkmark2"></span>
						@elseif($preparation->rijeseno6 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td>{{ $preparation->koment_exp }}</td>
				</tr>
				<tr>	
					<td>Tehnička dokumentacija isprintana</td>
					<td class="padding10_t circle">
						@if($preparation->rijeseno7 == 'NE')
							<span class="checkmark1"></span>
						@elseif($preparation->rijeseno7 == 'PROG')
							<span class="checkmark2"></span>
						@elseif($preparation->rijeseno7 == 'DA')
							<span class="checkmark3"></span>
						@endif
					</td>
					<td>{{ $preparation->koment_pr }}</td>
				</tr>

			</table>
		</div>
	</div>
</div>
