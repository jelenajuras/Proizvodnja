@extends('layouts.admin')

@section('title', 'Proizvodni projekt')
<style>
	#pomak {
		padding-left: 20px;
	}
	table {
		font-size: 12px;
	}
</style>
@section('content')
    <div class="page-header">
        <div class='btn-toolbar'>
            <a class="btn btn-default btn-md" href="{{ url()->previous() }}">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                Natrag
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel-heading">
				<h5>{{ 'Naziv proizvodnog projekta: '}}<b>{{ $production_project->id . ' - ' . $production_project->naziv }}</b></h5>
				<p>{{ 'Projekt: '}}<b>{{ $production_project->projekt_id . ' ' . $production_project->project['naziv'] }}</b></p>
				<p>{{ 'Naručitelj: '}}<b>{{ $production_project->investitor }}</b></p>
				<p>{{ 'Voditelj projekta: '}}<b>{{ $production_project->user['first_name'] . ' ' . $production_project->user['last_name'] }}</b></p>
				<p>{{ 'Kontakti: '}}</p>
				
				<div id="pomak">
					<table>
					@foreach($contacts as $contact)
						<tr>
							<td>
								<p><b>{{ $contact->first_name . ' ' . $contact->last_name }}</b>
								</p>
							</td>
							<td>
								<a href="{{ route('users.edit', $contact->id) }}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Ispravi</a>
							</td>
						</tr>
						<tr>
							<td>
								<p>Telefon: {{ $contact->telefon }}</p>
							</td>	
						</tr>
						<tr>
							<td>
								<p>e-mail: {{ $contact->email }}</p> 
							</td>
						</tr>
						@if(DB::table('role_users')->where('user_id', $contact->id)->first())
						<tr>
							<td>
								<p><ins>Glavni kontakt</ins></p> 
							</td>
						</tr>
						@endif
					@endforeach
					</table>
				</div>
			</div>
			<div class="panel-body">
			
				<div class="row">
					<h4><small>Dodaj novi kontakt</small></h4>
					</br>
					<form accept-charset="UTF-8" role="form" method="post" action="{{ route('customer.contact')}}">
						<fieldset>
							<div>
								<input class="form-control" name="productionProject_id" type="hidden" value="{{ $production_project->id }}"/>
							</div>
							<div class="form-group {{ ($errors->has('first_name')) ? 'has-error' : '' }}">
								<input class="form-control" placeholder="Ime" name="first_name" type="text" value="{{ old('first_name') }}" />
								{!! ($errors->has('first_name') ? $errors->first('first_name', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<div class="form-group {{ ($errors->has('last_name')) ? 'has-error' : '' }}">
								<input class="form-control" placeholder="Prezime" name="last_name" type="text" value="{{ old('last_name') }}" />
								{!! ($errors->has('last_name') ? $errors->first('last_name', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<div class="form-group {{ ($errors->has('telefon')) ? 'has-error' : '' }}">
								<input class="form-control" placeholder="Broj telefona" name="telefon" type="text" value="{{ old('telefon') }}" />
								{!! ($errors->has('telefon') ? $errors->first('telefon', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
								<input class="form-control" placeholder="E-mail" name="email" type="text" value="{{ old('email') }}">
								{!! ($errors->has('email') ? $errors->first('email', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<div class="form-group  {{ ($errors->has('password')) ? 'has-error' : '' }}">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
								{!! ($errors->has('password') ? $errors->first('password', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<div class="form-group {{ ($errors->has('password_confirmation')) ? 'has-error' : '' }}">
								<input class="form-control" placeholder="Potvrdi password" name="password_confirmation" type="password" />
								{!! ($errors->has('password_confirmation') ? $errors->first('password_confirmation', '<p class="text-danger">:message</p>') : '') !!}
							</div>
							<h5>Dozvola</h5>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="roles[{{ $roles->slug }}]" value="{{ $roles->id }}">
										{{ $roles->name . ' (Ima pristup stranici)' }}
									</label>
								</div>
								</br>
							{{ csrf_field() }}
						</fieldset>
							<input class="btn btn-default btn-md" type="submit" value="Unesi kontakt">
						</div>
					</form>

				</div>
			</div>
		</div>
@stop
