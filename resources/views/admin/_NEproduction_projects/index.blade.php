@extends('layouts.admin')

@section('title', 'Proizvodni projekti')

@section('content')
		<div class='btn-toolbar pull-right'>
            <a class="btn btn-default btn-md" href="{{ route('admin.production_projects.create') }}" id="button">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Dodaj projekt
            </a>
        </div>

        <h3>Proizvodni projekti</h3>
		<!--<input class="form-control" id="myInput" type="text" placeholder="Traži..">-->

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
			@if(count($production_projects) > 0)
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>Broj projekta</th>
							<th>Naziv proizvornog projekta</th>
							<th>Naziv projekta</th>
                            <th>Investitor</th>
                            <th>Voditelj</th>
							<th class="not-export-column">Opcije</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
					@foreach ($production_projects as $production_project)
                        <tr>
							<td>{{ $production_project->id }}</td>
							<td><a href="{{ route('admin.production_projects.show', $production_project->id ) }}"</a>{{ $production_project->naziv }}</td>
							<td>{{ $production_project->project['id'] . ' ' . $production_project->project['naziv'] }}</td>
							<td>{{ $production_project->investitor }}</td>
							<td>{{ $production_project->user['first_name'] . ' ' .  $production_project->user['last_name'] }}</td>
                            <td id="td1">
                                <a href="{{ route('admin.production_projects.edit', $production_project->id) }}" class="btn btn-default btn-md" id="button">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Ispravi
                                </a>
                                <!--<a href="{{ route('admin.production_projects.destroy', $production_project->id) }}" class="btn btn-danger btn-md action_confirm" data-method="delete" data-token="{{ csrf_token() }}" id="button">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        Obriši
                                </a>-->
                            </td>
                        </tr>
                    @endforeach
				<!--	<script>
					$(document).ready(function(){
					  $("#myInput").on("keyup", function() {
						var value = $(this).val().toLowerCase();
						$("#myTable tr").filter(function() {
						  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
						});
					  });
					});
				</script>-->
                    </tbody>
                </table>
				@else
					{{'Nema unesenih projekata!'}}
				@endif
            </div>
        </div>
    </div>
@stop
