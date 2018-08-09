@extends('layouts.admin')

@section('title', 'Projekti')
<link rel="stylesheet" href="{{ URL::asset('css/user.css') }}" />
@section('content')
	<div class="addUser">
	<button data-path="{{ route('admin.projects.create') }}" 
		class="load-ajax-modal" role="button" data-toggle="modal" data-target="#dynamic-modal">
		<i class="far fa-plus-square"></i>add project
	</button>
	</div>
    <h5>Duplico proizvodnja - Projects</h5>

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
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($projects as $project)
                            <tr class="projekti clickable-row" data-href="{{ route('admin.projects.show', $project->id) }}">
								<td>{{ $project->id }}<div class="vl"></div></td>                            
                                <td>{{ $project->narucitelj['naziv'] }}<div class="vl"></div></td>
								<td>{{ $project->investitor['naziv'] }}<div class="vl"></div></td>
								<!--<td><input type="text" id="naziv" value="{{ $project->naziv }}"></td>
								<td><input type="text" id="objekt" value="{{ $project->objekt }}"></td>-->
								<td>{{ $project->naziv }}<div class="vl"></div></td>
								<td>{{ $project->objekt }}<div class="vl"></div></td>
								<td>{{ $project->user['first_name'] . ' ' . $project->user['last_name'] }}
									<button data-path="{{ route('admin.projects.edit', $project->id) }}" 
										class="load-ajax-modal" role="button" data-toggle="modal" data-target="#dynamic-modal">
										<i class="far fa-edit"></i>
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
	<script>
	jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
	});
	</script>
	
@stop
