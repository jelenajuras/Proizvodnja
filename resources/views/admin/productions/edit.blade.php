<link rel="stylesheet" href="{{ URL::asset('css/production.css') }}"/>

@if (Sentinel::check() && Sentinel::inRole('administrator') || Sentinel::inRole('priprema') || Sentinel::inRole('proizvodnja'))
<div class="Jproduct">
<button type="button" class="Jbtn-close" data-dismiss="modal">&times</button>
    <div class="Jproduct-head clearfix">
		<h3 class="">Production status changes</h3>
		<div>
			<p>Project: <span></span></p>
			<p>Enclosure: <span>{{ $cabinet->brOrmara . ' ' . $cabinet->naziv }}</span> </p>
		</div>
		
	</div>
	<div class="Jproduct-main">
		<form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.productions.update', $production->id) }}">
		<fieldset>
			<div class="datum">
				<?php $datum_1 = new DateTime($production->datum);	?>
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
			<input type="hidden" name="ormar_id" value="{{ $production->ormar_id }}"/>
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
					<th>not started</th>
					<th>in progress</th>
					<th>complited</th>
					<th></th>
				</tr>
				<tr class="padd1">
					<td>Obrada montažne ploče</td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno1" value="NE" {{ ($production->rijeseno1 == 'NE') ? 'checked' : '' }} name="radio">
					  <span class="checkmark1"></span>
					</label></td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno1" value="in progress" {{ ($production->rijeseno1 == 'in progress') ? 'checked' : '' }} name="radio">
					  <span class="checkmark2"></span>
					</label></td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno1" value="DA" {{ ($production->rijeseno1 == 'DA') ? 'checked' : '' }} name="radio">
					  <span class="checkmark3"></span>
					</label></td>
					<td class="comment"><input placeholder="write comment" name="koment_mp" type="text" value="{{ $production->koment_mp }}" /></td>
				</tr>
				<tr class="padd1">
					<td>Obrada ormara</td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno2" value="NE" {{ ($production->rijeseno2 == 'NE') ? 'checked' : '' }} name="radio">
					  <span class="checkmark1"></span>
					</label></td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno2" value="in progress" {{ ($production->rijeseno2 == 'in progress') ? 'checked' : '' }} name="radio">
					  <span class="checkmark2"></span>
					</label></td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno2" value="DA" {{ ($production->rijeseno2 == 'DA') ? 'checked' : '' }} name="radio">
					  <span class="checkmark3"></span>
					</label></td>
					<td class="comment"><input placeholder="write comment" name="koment_orm" type="text" value="{{  $production->koment_orm }}" /></td>
				</tr>
				<tr class="padd1">
					<td>Rezanje vodiča</td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno3" value="NE" {{ ($production->rijeseno3 == 'NE') ? 'checked' : '' }} name="radio">
					  <span class="checkmark1"></span>
					</label></td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno3" value="in progress" {{ ($production->rijeseno3 == 'in progress') ? 'checked' : '' }} name="radio">
					  <span class="checkmark2"></span>
					</label></td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno3" value="DA" {{ ($production->rijeseno3 == 'DA') ? 'checked' : '' }} name="radio">
					  <span class="checkmark3"></span>
					</label></td>
					<td class="comment"><input placeholder="write comment" name="koment_vod" type="text" value="{{ $production->koment_vod }}" /></td>
				</tr>
				<tr class="padd1">
					<td>Izrada oznaka</td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno4" value="NE" {{ ($production->rijeseno4 == 'NE') ? 'checked' : '' }} name="radio">
					  <span class="checkmark1"></span>
					</label></td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno4" value="in progress" {{ ($production->rijeseno4 == 'in progress') ? 'checked' : '' }} name="radio">
					  <span class="checkmark2"></span>
					</label></td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno4" value="DA" {{ ($production->rijeseno4 == 'DA') ? 'checked' : '' }} name="radio">
					  <span class="checkmark3"></span>
					</label></td>
					<td class="comment"><input placeholder="write comment" name="koment_ozn" type="text" value="{{ $production->koment_ozn }}" /></td>
				</tr>
				<tr class="padd1">
					<td>Slaganje montažne ploče</td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno5" value="NE" {{ ($production->rijeseno5 == 'NE') ? 'checked' : '' }} name="radio">
					  <span class="checkmark1"></span>
					</label></td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno5" value="in progress" {{ ($production->rijeseno5 == 'in progress') ? 'checked' : '' }} name="radio">
					  <span class="checkmark2"></span>
					</label></td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno5" value="DA" {{ ($production->rijeseno5 == 'DA') ? 'checked' : '' }} name="radio">
					  <span class="checkmark3"></span>
					</label></td>
					<td class="comment"><input placeholder="write comment" name="koment_slMp" type="text" value="{{ $production->koment_slMp }}" /></td>
				</tr>
				<tr class="padd1">
					<td>Označavanje montažne ploče</td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno6" value="NE" {{ ($production->rijeseno6 == 'NE') ? 'checked' : '' }} name="radio">
					  <span class="checkmark1"></span>
					</label></td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno6" value="in progress" {{ ($production->rijeseno6 == 'in progress') ? 'checked' : '' }} name="radio">
					  <span class="checkmark2"></span>
					</label></td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno6" value="DA" {{ ($production->rijeseno6 == 'DA') ? 'checked' : '' }} name="radio">
					  <span class="checkmark3"></span>
					</label></td>
					<td class="comment"><input placeholder="write comment" name="koment_oznMp" type="text" value="{{ $production->koment_oznMp }}" /></td>
				</tr>
				<tr class="padd1">
					<td>Ožičenje</td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno7" value="NE" {{ ($production->rijeseno7 == 'NE') ? 'checked' : '' }} name="radio">
					  <span class="checkmark1"></span>
					</label></td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno7" value="in progress" {{ ($production->rijeseno7 == 'in progress') ? 'checked' : '' }} name="radio">
					  <span class="checkmark2"></span>
					</label></td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno7" value="DA" {{ ($production->rijeseno7 == 'DA') ? 'checked' : '' }} name="radio">
					  <span class="checkmark3"></span>
					</label></td>
					<td class="comment"><input placeholder="write comment" name="koment_ozic" type="text" value="{{ $production->koment_ozic }}" /></td>
				</tr>
				<tr class="padd1">
					<td>CE QR dokumentacija</td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno8" value="NE" {{ ($production->rijeseno8 == 'NE') ? 'checked' : '' }} name="radio">
					  <span class="checkmark1"></span>
					</label></td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno8" value="in progress" {{ ($production->rijeseno8 == 'in progress') ? 'checked' : '' }} name="radio">
					  <span class="checkmark2"></span>
					</label></td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno8" value="DA" {{ ($production->rijeseno8 == 'DA') ? 'checked' : '' }} name="radio">
					  <span class="checkmark3"></span>
					</label></td>
					<td class="comment"><input placeholder="write comment" name="koment_dok" type="text" value="{{ $production->koment_dok }}" /></td>
				</tr>
				<tr class="padd1">
					<td>Ispitivanje</td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno9" value="NE" {{ ($production->rijeseno9 == 'NE') ? 'checked' : '' }} name="radio">
					  <span class="checkmark1"></span>
					</label></td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno9" value="in progress" {{ ($production->rijeseno9 == 'in progress') ? 'checked' : '' }} name="radio">
					  <span class="checkmark2"></span>
					</label></td>
					<td class="circle"><label class="Jcontainer">
					  <input type="radio" name="rijeseno9" value="DA" {{ ($production->rijeseno9 == 'DA') ? 'checked' : '' }} name="radio">
					  <span class="checkmark3"></span>
					</label></td>
					<td class="comment"><input placeholder="write comment" name="koment_isp" type="text" value="{{ $production->koment_isp }}" /></td>
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
			<input class="Jsubmit" type="submit" value="save">
		</fieldset>
		</form>
    </div>
</div>
@endif