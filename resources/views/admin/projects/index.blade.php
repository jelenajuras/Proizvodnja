@extends('layouts.admin')

@section('title', 'Projekti')

@section('content')
	 <div class="addUser">
	 <button data-path="{{ route('admin.projects.create') }}" 
		class="load-ajax-modal" role="button" data-toggle="modal" data-target="#dynamic-modal">
		<i class="far fa-plus-square"></i>add project
	</button>
	</div>
    <h3>Projects</h3>

    <div class="Jproj row">
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
								<td><input type="text" id="naziv" value="{{ $project->naziv }}"></td>
								<td><input type="text" id="objekt" value="{{ $project->objekt }}"></td>
								<td>{{ $project->user['first_name'] . ' ' . $project->user['last_name'] }}</td>
                                  <td id="td1">
									<button data-path="{{ route('admin.projects.edit', $project->id) }}" 
									class="load-ajax-modal" role="button" data-toggle="modal" data-target="#dynamic-modal">
									<i class="far fa-edit"></i> edit
									</button>
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
