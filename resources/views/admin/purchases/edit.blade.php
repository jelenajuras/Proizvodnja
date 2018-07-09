<link rel="stylesheet" href="{{ URL::asset('css/production.css') }}"/>

@if (Sentinel::check() && Sentinel::inRole('administrator') || Sentinel::inRole('nabava') || Sentinel::inRole('proizvodnja'))
<div class="Jpurch">
	<button type="button" class="Jbtn-close" data-dismiss="modal">&times</button>
    <div class="Jpurch-head clearfix">
		<h3 class="">Purchase status changes</h3>
		<div>
			<p>Project: <span>{{ $cabinet->projekt['naziv'] }}</span></p>
			<p>Enclosure: <span>{{ $cabinet->brOrmara . ' ' . $cabinet->naziv }}</span> </p>
		</div>
		
	</div>
	<div class="Jpurch-main">
		<form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.purchases.update', $purchase->id) }}">
			<fieldset>
				<div class="datum">
					<?php $datum_1 = new DateTime($purchase->datum); ?>
					<span>final delivery date:</span>
					<input name="datum" class="date" type="text"  value = "{{ $datum_1->format('d-m-Y') }}">
				</div>
				<div class="tblHead">
					<table class="Prep-tbl" style="border-bottom-color:white">
						<tr>
							<th>Item</th>
							<th>ordered</th>
							<th>delivered</th>
							<th>delivery date</th>
							<th>comment</th>
						</tr>
					</table>
				</div>
				<input type="hidden" name="ormar_id" value="{{ $purchase->ormar_id }}"/>
					<table class="Prep-tbl">
						<tr class="padd2">
							<th></th>
							<th><span class="ellipseR1"></span></th>
							<th><span class="ellipseG1"></span></th>
							<th><span class="ellipseR1"></span></th>
							<th><span class="ellipseG1"></span></th>
							<th></th>
							<th></th>
						</tr>
						<tr class="padd2">
							<th></th>
							<th>no</th>
							<th>yes</th>
							<th>no</th>
							<th>yes</th>
							<th></th>
							<th></th>
						</tr>

						<tr class="padd1">
							<td>Ormar</td>
							<td><label class="Jcontainer">
								  <input type="radio" name="naruceno1" value="NE" {{ ($purchase->naruceno1 == 'NE') ? 'checked' : '' }} />
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="naruceno1" value="DA" {{ ($purchase->naruceno1 == 'DA') ? 'checked' : '' }} />
								  <span class="checkmark3"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno1" value="NE" {{ ($purchase->rijeseno1 == 'NE') ? 'checked' : '' }} />
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno1" value="DA" {{ ($purchase->rijeseno1 == 'DA') ? 'checked' : '' }} >
								  <span class="checkmark3"></span>
								</label></td>
							<td class="comment"><input name="datum1" class="date" type="text"  value = "{{ date('d-m-Y', strtotime( $purchase->datum1)) }}"></td>
							<td class="comment"><input placeholder="write comment" name="koment_orm" type="text" value="{{ $purchase->koment_orm }}" /></td>
						</tr>
						<tr class="padd1">
							<td>Kanalice</td>
							<td><label class="Jcontainer">
								  <input type="radio" name="naruceno2" value="NE" {{ ($purchase->naruceno2 == 'NE') ? 'checked' : '' }} />
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="naruceno2" value="DA" {{ ($purchase->naruceno2 == 'DA') ? 'checked' : '' }} />
								  <span class="checkmark3"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno2" value="NE" {{ ($purchase->rijeseno2 == 'NE') ? 'checked' : '' }} />
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno2" value="DA" {{ ($purchase->rijeseno2 == 'DA') ? 'checked' : '' }} >
								  <span class="checkmark3"></span>
								</label></td>
							<td class="comment"><input name="datum2" class="date" type="text"  value = "{{ date('d-m-Y', strtotime( $purchase->datum2)) }}"></td>
							<td class="comment"><input placeholder="write comment" name="koment_kan" type="text" value="{{  $purchase->koment_kan }}" /></td>
						</tr>
						<tr class="padd1">
							<td>Din šine</td>
							<td><label class="Jcontainer">
								  <input type="radio" name="naruceno3" value="NE" {{ ($purchase->naruceno3 == 'NE') ? 'checked' : '' }} />
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="naruceno3" value="DA" {{ ($purchase->naruceno3 == 'DA') ? 'checked' : '' }} />
								  <span class="checkmark3"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno3" value="NE" {{ ($purchase->rijeseno3 == 'NE') ? 'checked' : '' }} />
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno3" value="DA" {{ ($purchase->rijeseno3 == 'DA') ? 'checked' : '' }} >
								  <span class="checkmark3"></span>
								</label></td>
							<td class="comment"><input name="datum3" class="date " type="text"  value = "{{ date('d-m-Y', strtotime( $purchase->datum3)) }}"></td>
							<td class="comment"><input placeholder="write comment" name="koment_sine" type="text" value="{{ $purchase->koment_sine }}" /></td>
						</tr>
						<tr class="padd1">
							<td>Vodič</td>
							<td><label class="Jcontainer">
								  <input type="radio" name="naruceno4" value="NE" {{ ($purchase->naruceno4 == 'NE') ? 'checked' : '' }} />
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="naruceno4" value="DA" {{ ($purchase->naruceno4 == 'DA') ? 'checked' : '' }} />
								  <span class="checkmark3"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno4" value="NE" {{ ($purchase->rijeseno4 == 'NE') ? 'checked' : '' }} />
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno4" value="DA" {{ ($purchase->rijeseno4 == 'DA') ? 'checked' : '' }} >
								  <span class="checkmark3"></span>
								</label></td>
							<td class="comment"><input name="datum4" class="date " type="text"  value = "{{ date('d-m-Y', strtotime( $purchase->datum4)) }}"></td>
							<td class="comment"><input placeholder="write comment" name="koment_vod" type="text" value="{{ $purchase->koment_vod }}" /></td>
						</tr>
						<tr class="padd1">
							<td>Bakar</td>
							<td><label class="Jcontainer">
								  <input type="radio" name="naruceno5" value="NE" {{ ($purchase->naruceno5 == 'NE') ? 'checked' : '' }} />
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="naruceno5" value="DA" {{ ($purchase->naruceno5 == 'DA') ? 'checked' : '' }} />
								  <span class="checkmark3"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno5" value="NE" {{ ($purchase->rijeseno5 == 'NE') ? 'checked' : '' }} />
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno5" value="DA" {{ ($purchase->rijeseno5 == 'DA') ? 'checked' : '' }} >
								  <span class="checkmark3"></span>
								</label></td>
							<td class="comment"><input name="datum5" class="date " type="text"  value = "{{ date('d-m-Y', strtotime( $purchase->datum5)) }}"></td>
							<td class="comment"><input placeholder="write comment" name="koment_bak" type="text" value="{{ $purchase->koment_bak }}" /></td>
						</tr>
						<tr class="padd1">
							<td>Redne stezaljke</td>
							<td><label class="Jcontainer">
								  <input type="radio" name="naruceno6" value="NE" {{ ($purchase->naruceno6 == 'NE') ? 'checked' : '' }} />
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="naruceno6" value="DA" {{ ($purchase->naruceno6 == 'DA') ? 'checked' : '' }} />
								  <span class="checkmark3"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno6" value="NE" {{ ($purchase->rijeseno6 == 'NE') ? 'checked' : '' }} />
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno6" value="DA" {{ ($purchase->rijeseno6 == 'DA') ? 'checked' : '' }} >
								  <span class="checkmark3"></span>
								</label></td>
							<td class="comment"><input name="datum6" class="date " type="text"  value = "{{ date('d-m-Y', strtotime( $purchase->datum6)) }}"></td>
							<td class="comment"><input placeholder="write comment" name="koment_stez" type="text" value="{{ $purchase->koment_stez }}" /></td>
						</tr>
						<tr class="padd1">
							<td>Sklopna oprema</td>
							<td><label class="Jcontainer">
								  <input type="radio" name="naruceno7" value="NE" {{ ($purchase->naruceno7 == 'NE') ? 'checked' : '' }} />
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="naruceno7" value="DA" {{ ($purchase->naruceno7 == 'DA') ? 'checked' : '' }} />
								  <span class="checkmark3"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno7" value="NE" {{ ($purchase->rijeseno7 == 'NE') ? 'checked' : '' }} />
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno7" value="DA" {{ ($purchase->rijeseno7 == 'DA') ? 'checked' : '' }} >
								  <span class="checkmark3"></span>
								</label></td>
							<td class="comment"><input name="datum7" class="date " type="text"  value = "{{ date('d-m-Y', strtotime( $purchase->datum7)) }}"></td>
							<td class="comment"><input placeholder="write comment" name="koment_sklOpr" type="text" value="{{ $purchase->koment_sklOpr }}" /></td>
						</tr>
						<tr class="padd1">
							<td>PLC</td>
							<td><label class="Jcontainer">
								  <input type="radio" name="naruceno8" value="NE" {{ ($purchase->naruceno8 == 'NE') ? 'checked' : '' }} />
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="naruceno8" value="DA" {{ ($purchase->naruceno8 == 'DA') ? 'checked' : '' }} />
								  <span class="checkmark3"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno8" value="NE" {{ ($purchase->rijeseno8 == 'NE') ? 'checked' : '' }} />
								  <span class="checkmark1"></span>
								</label></td>
							<td><label class="Jcontainer">
								  <input type="radio" name="rijeseno8" value="DA" {{ ($purchase->rijeseno8 == 'DA') ? 'checked' : '' }} >
								  <span class="checkmark3"></span>
								</label></td>
							<td class="comment"><input name="datum8" class="date " type="text"  value = "{{ date('d-m-Y', strtotime( $purchase->datum8)) }}"></td>
							<td class="comment"><input placeholder="write comment" name="koment_PLC" type="text" value="{{ $purchase->koment_PLC }}" /></td>

						</tr>
						<script type="text/javascript">
							$('.date').datepicker({  
							   format: 'dd-mm-yyyy',
							   startDate:'-60y',
							   endDate:'+1y'
							}); 
						</script> 
					</table>
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<input name="_token" value="{{ csrf_token() }}" type="hidden">
				<input class="Jsubmit" type="submit" value="Upiši">
			</fieldset>
		</form>
    </div>
</div>
@endif