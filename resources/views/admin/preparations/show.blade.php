@extends('layouts.admin')

@section('title', 'Priprema')

@section('content')
<div class="page-header">
	<div class='btn-toolbar'>
		<a class="btn btn-default btn-md" href="{{ url()->previous() }}">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			Go Back
		</a>
	</div>
</div>
<div class="">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
		<div class="priprema">
			<table>
				<tr >	
					<td>Broj ormara, naziv</td>
					<td class="center">{{ $preparation->brOrmara }}</td>
				</tr>
				<tr>
					<td>izmjena</td>
					<td class="center">
						<a href="{{ route('admin.preparations.edit', ['id' => $preparation->id] ) }}" >Izmjeni status pripreme</a>
					</td>
				</tr>
				<tr class="proba">
					<td>Rok</td>
					<?php 
						$datum1 = new DateTime($preparation->datum);
						$datum3 = $datum1->modify('+18 days');
						$cabinet= DB::table('cabinets')->where('id',$preparation->ormar_id)->first();
						$datum2 = new DateTime($cabinet->datum_isporuke);
						$razlika = $datum3->diff($datum2);
						?>
						@if( strtotime($preparation->datum) < time() )
							@if($preparation->rijeseno1 == 'DA' && $preparation->rijeseno2 == 'DA' && $preparation->rijeseno3 == 'DA' && $preparation->rijeseno4 == 'DA' && $preparation->rijeseno5 == 'DA' && $preparation->rijeseno6 == 'DA' && $preparation->rijeseno7 == 'DA')
								<td class="center" style="color:green">{{ date('d.m.Y', strtotime($preparation->datum)) }}</td>
							@else
								<td class="center" style="color:red">{{ date('d.m.Y', strtotime($preparation->datum)) }}</td>
							@endif
						@endif
				</tr>
				<tr>	
					<td>Očekivana promjena roka</td>
					<td class="center">{{ $razlika->format('%d') . ' dana' }}</td>
				</tr>
				<tr>	
					<td>Napravljena 3p shema</td>
					<td>{{ $preparation->rijeseno1 . ' ' . $preparation->koment_3p }}</td>
				</tr>
				<tr>	
					<td>Odobrena 3p shema</td>
					<td>{{ $preparation->rijeseno2 . ' ' . $preparation->koment_3pOd }}</td>
				</tr>
				<tr>	
					<td>Pripremljena rezna lista za Komax</td>
					<td>{{ $preparation->rijeseno3 . ' ' . $preparation->koment_komax }}</td>
				</tr>
				<tr>	
					<td>Pripremljena rezna lista za Perforex</td>
					<td>{{ $preparation->rijeseno4 . ' ' . $preparation->koment_perf }}</td>
				</tr>
				<tr>	
					<td>Odobren 3D izgled ormara</td>
					<td>{{ $preparation->rijeseno5 . ' ' . $preparation->koment_od }}</td>
				</tr>
				<tr>	
					<td>Oznake eksportirane</td>
					<td>{{ $preparation->rijeseno6 . ' ' . $preparation->koment_exp }}</td>
				</tr>
				<tr>	
					<td>Tehnička dokumentacija isprintana</td>
					<td>{{ $preparation->rijeseno7 . ' ' . $preparation->koment_pr }}</td>
				</tr>

			</table>
		</div>
	</div>
</div>
<div class="nabava">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
		<div class="">
			
		</div>
	</div>
</div>
@stop
