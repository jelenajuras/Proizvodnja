@extends('layouts.admin')

@section('title', 'Projekti')

@section('content')

    <div class='btn-toolbar pull-right' id="button2">
		<a class="btn btn-default btn-md" href="{{ route('admin.projects.create') }}" id="button">
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			Dodaj projekt
		</a>
	</div>      
    <h3>Projekti</h3>
		<!--<input class="form-control" id="myInput" type="text" placeholder="Traži..">-->


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
			@if(count($projects) > 0)
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>Broj projekta</th>
							<th>Naručitelj</th>
							<th>Investitor</th>
							<th>Naziv projekta</th>
							<th>Naziv objekta</th>
							<th>Voditelj projekta</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($projects as $project)
                            <tr>
								<td>{{ $project->id }}</td>                            
                                <td>{{ $project->narucitelj['naziv'] }}</td>
								<td>{{ $project->investitor['naziv'] }}</td>
								<td>{{ $project->naziv }}</td>
								<td>{{ $project->objekt }}</td>
								<td>{{ $project->user['first_name'] . ' ' . $project->user['last_name'] }}</td>
                                  <td id="td1">
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-default btn-md" id="button">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Ispravi
                                    </a>
                                    <!--<a href="{{ route('admin.projects.destroy', $project->id) }}" class="btn btn-danger btn-md action_confirm" data-method="delete" data-token="{{ csrf_token() }}" id="button">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        Obriši
                                    </a>-->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
				<script>
					$(document).ready(function(){
					  $("#myInput").on("keyup", function() {
						var value = $(this).val().toLowerCase();
						$("#myTable tr").filter(function() {
						  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
						});
					  });
					});
				</script>
				</body>
				@else
					{{'Nema unesenih projekata!'}}
				@endif
            </div>
			{!! $projects->render() !!}
        </div>
    </div>
@stop
