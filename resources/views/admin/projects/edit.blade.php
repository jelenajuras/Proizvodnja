<link rel="stylesheet" href="{{ URL::asset('css/projects.css') }}"/>

<div class="Jproj" id="myModal" >
    <div class="Jside-proj">
		<h3 class="">Edit project</h3>
		<p class=""><span>1</span>Project info</h3>
	</div>
	<div class="Jmain-proj">
		<form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.projects.update', $project->id) }}">
			<fieldset>
				<div class="{{ ($errors->has('id')) ? 'has-error' : '' }}">
				<text>Broj projekta</text>
				<input class="" placeholder="Broj projekta" name="id" type="text" value="{{ $project->id }}" />
				{!! ($errors->has('id') ? $errors->first('id', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<div class="">
					<text>Naručitelj</text>
					<select class="" name="customer_id" id="sel1">	
						@if ($project->customer_id)
							<option selected="selected"  value="{{ $project->customer_id }}">
								{{$project->narucitelj['naziv']}}
							</option>
							<option value="0"></option>
						@else
							<option selected="selected" value="0"></option>
						@endif
						@foreach (DB::table('customers')->get() as $customer)
							<option name="customer_id" value=" {{$customer->id}} ">{{ $customer->naziv }}</option>
						@endforeach
					</select>
					{!! ($errors->has('customer_id') ? $errors->first('customer_id', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<div class="">
					<text>Investitor</text>
					<select class="" name="investitor_id" value="" id="sel1">
						@if ($project->investitor_id)
						<option selected="selected" value="{{ $project->investitor_id }}">
							{{$project->investitor['naziv']}}
						</option>
						<option value="0"></option>
						@else
							<option selected="selected" value="0"></option>
						@endif
						@foreach (DB::table('customers')->get() as $customer)
							<option name="investitor_id" value=" {{$customer->id}} ">{{ $customer->naziv }}</option>
						@endforeach	
					</select>
					{!! ($errors->has('investitor_id') ? $errors->first('investitor_id', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<div class="{{ ($errors->has('naziv')) ? 'has-error' : '' }}">
				   <text>Naziv projekta</text>
				   <textarea class="" name="naziv" id="projekt-name" >{{ $project->naziv }}</textarea>
				   {!! ($errors->has('naziv') ? $errors->first('naziv', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<div class="{{ ($errors->has('objekt')) ? 'has-error' : '' }}">
				   <text>Naziv objekta</text>
				   <textarea class="" name="objekt" id="projekt-name" >{{ $project->objekt }}</textarea>
				   {!! ($errors->has('objekt') ? $errors->first('objekt', '<p class="text-danger">:message</p>') : '') !!}
				</div>
				<div class="{{ ($errors->has('user_id')) ? 'has-error' : '' }}">
				<text>Voditelj projekta</text>
					<select class="" name="user_id" id="sel1">
						<option selected="selected" value="{{ $project->user_id }}">
						{{ $project->user['first_name'] . ' '. $project->user['last_name']}} </option>
						@foreach ($users as $user)
							<option name="user_id" value=" {{ $user->id}} ">{{ $user->first_name . ' ' . $user->last_name }}</option>
						@endforeach
					</select>
					 {!! ($errors->has('user_id') ? $errors->first('user_id', '<p class="text-danger">:message</p>') : '') !!}
				</div>	
				
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<input name="_token" value="{{ csrf_token() }}" type="hidden">
				<input class="Proj-submit" type="submit" value="edit" id="input2">
			</fieldset>
		</form>
    </div>
</div>
<button type="button" class="Jbtn-close" data-dismiss="modal">&times</button>