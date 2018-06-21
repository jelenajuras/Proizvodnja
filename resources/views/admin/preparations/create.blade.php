<link rel="stylesheet" href="{{ URL::asset('css/production.css') }}"/>

@if (Sentinel::check() && Sentinel::inRole('administrator') || Sentinel::inRole('priprema') || Sentinel::inRole('proizvodnja'))
<div class="Jprod">
	<button type="button" class="Jbtn-close" data-dismiss="modal">&times</button>
    <div class="Jprod-head clearfix">
		<h3 class="">Preparation status changes</h3>
		<div>
			<p>Project: <span></span></p>
			<p>Enclosure: <span>{{ $cabinet->brOrmara . ' ' . $cabinet->naziv }}</span> </p>
		</div>
	</div>
	<div class="Jprod-main">
		<form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.preparations.store') }}">
			<fieldset>
				<div class="datum">
					<?php $datum_1 = new DateTime($cabinet->datum_isporuke);
					$datum_1->modify('-18 days')?>
					<span>delivery date:</span>
					<input name="datum" class="date" type="text"  value = "{{ $datum_1->format('d-m-Y') }}">
				</div>
				<div class="tblHead">
					<table class="Prep-tbl" style="border-bottom-color:white">
						<tr>
							<th>Item</th>
							<th>resolved</th>
							<th>comment</th>
						</tr>
					</table>
				</div>
				<input type="hidden" name="ormar_id" value="{{ $idOrmara }}"/>
				
					<table class="Prep-tbl">
						<tr class="padd2">
							<th></th>
							<th><span class="ellipseR1"></span></th>
							<th><span class="ellipseO1"></span></th>
							<th><span class="ellipseG1"></span></th>
							<th></th>
						</tr>
						<tr class="padd2">
							<th></th>
							<th></span>not started</th>
							<th>in progress</th>
							<th>complited</th>
							<th></th>
						</tr>
						<tr class="padd1">
							<td>Izrada 3p sheme</td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno1" value="NE" checked>
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno1" value="PROG" >
								  <span class="checkmark2"></span>
								</label></td>
							<td><label class="Jcontainer">
							  <input type="radio" name="rijeseno1" value="DA" >
							  <span class="checkmark3"></span>
							</label></td>
							<td class="comment"><input class="" placeholder="write comment" name="koment_3p" type="text" value="{{ old('koment_3p') }}" /></td>
						</tr>
						<tr class="padd1">
							<td>Odobrenje 3p sheme</td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno2" value="NE" checked>
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno2" value="PROG" >
								  <span class="checkmark2"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno2" value="DA" >
								  <span class="checkmark3"></span>
								</label></td>
							<td class="comment"><input class="" placeholder="write comment" name="koment_3pOd" type="text" value="{{ old('koment_3pOd') }}" /></td>
						</tr>
						<tr class="padd1">
							<td>Priprema rezne liste za Komax</td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno3" value="NE" checked>
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno3" value="PROG" >
								  <span class="checkmark2"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno3" value="DA" >
								  <span class="checkmark3"></span>
								</label></td>
							<td class="comment"><input class="" placeholder="write comment" name="koment_komax" type="text" value="{{ old('koment_komax') }}" /></td>
						</tr>
						<tr class="padd1">
							<td>Priprema rezne liste za Perforex</td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno4" value="NE" checked>
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno4" value="PROG" >
								  <span class="checkmark2"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno4" value="DA" >
								  <span class="checkmark3"></span>
								</label></td>
							<td class="comment"><input class="" placeholder="write comment" name="koment_perf" type="text" value="{{ old('koment_perf') }}" /></td>
						</tr>
						<tr class="padd1">
							<td>Odobrenje 3D izgleda ormara</td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno5" value="NE" checked>
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno5" value="PROG" >
								  <span class="checkmark2"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno5" value="DA" >
								  <span class="checkmark3"></span>
								</label></td>
							<td class="comment"><input class="" placeholder="write comment" name="koment_od" type="text" value="{{ old('koment_od') }}" /></td>
						</tr>
						<tr class="padd1">
							<td>Eksportiranje oznaka</td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno6" value="NE" checked>
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno6" value="PROG" >
								  <span class="checkmark2"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno6" value="DA" >
								  <span class="checkmark3"></span>
								</label></td>
							<td class="comment"><input class="" placeholder="write comment" name="koment_exp" type="text" value="{{ old('koment_exp') }}" /></td>
						</tr>
						<tr class="padd1">
							<td>Print tehničke dokumentacije</td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno7" value="NE" checked>
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno7" value="PROG" >
								  <span class="checkmark2"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno7" value="DA" >
								  <span class="checkmark3"></span>
								</label></td>
							<td class="comment"><input class="" placeholder="write comment" name="koment_pr" type="text" value="{{ old('koment_pr') }}" /></td>
						</tr>
					</table>
					<script type="text/javascript">
						$('.date').datepicker({  
						   format: 'dd-mm-yyyy',
						   startDate:'-60y',
						   endDate:'+1y'
						}); 
					</script> 
				<input name="_token" value="{{ csrf_token() }}" type="hidden">
				<input class="Jsubmit" type="submit" value="save">
			</fieldset>
		</form>
	</div>
</div>
@endif