@extends('layouts.admin')

@section('title', 'Projekti')

@section('content')
	 <div class="addUser">
	 <button data-path="{{ route('admin.projects.create') }}" 
		class="load-ajax-modal" role="button" data-toggle="modal" data-target="#dynamic-modal">
		<i class="far fa-plus-square"></i>add project
	</button>
	</div>
   <!-- <div class="btn-toolbar pull-right">
		<a class="btn btn-default btn-md" href="{{ route('admin.projects.create') }}" id="button">
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			add project
		</a>
	</div>  -->    
    <h3>Projekti</h3>

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
					<form id="myForm">
                        @foreach ($projects as $project)
                            <tr>
								<td>{{ $project->id }}</td>                            
                                <td>{{ $project->narucitelj['naziv'] }}</td>
								<td>{{ $project->investitor['naziv'] }}</td>
								<td><input type="text" id="naziv" value="{{ $project->naziv }}"></td>
								<td><input type="text" id="naziv" value="{{ $project->objekt }}"></td>
								<td>{{ $project->user['first_name'] . ' ' . $project->user['last_name'] }}</td>
                                  <td id="td1">
                                    <button data-path="{{ route('admin.projects.edit', $project->id) }}" 
									class="load-ajax-modal" role="button" data-toggle="modal" data-target="#dynamic-modal">
									<i class="far fa-edit"></i> edit
									</button>
									<!--<a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-default btn-md" id="button">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Ispravi
                                    </a>
                                    <a href="{{ route('admin.projects.destroy', $project->id) }}" class="btn btn-danger btn-md action_confirm" data-method="delete" data-token="{{ csrf_token() }}" id="button">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        Obriši
                                    </a>-->
                                </td>
                            </tr>
                        @endforeach
						<!--<button class="btn btn-primary" id="ajaxSubmit">Submit</button>-->
					</form>
					
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
				<!--<script src="http://code.jquery.com/jquery-3.3.1.min.js"
					integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
					crossorigin="anonymous">
					</script>
					<script>
						 jQuery(document).ready(function(){
							jQuery('#ajaxSubmit').click(function(e){
							   e.preventDefault();
							   $.ajaxSetup({
								  headers: {
									  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
								  }
							  });
							   jQuery.ajax({
								  url: "{{ route('admin.projects.update', $project->id) }}",
								  method: 'post',
								  data: {
									 name: jQuery('#naziv').val(),
									 objekt: jQuery('#objekt').val()
								  },
								  success: function(result){
									 console.log(result);
								  }});
							   });
							});
					</script>-->
				</body>
				@else
					{{'Nema unesenih projekata!'}}
				@endif
            </div>
			{!! $projects->render() !!}
        </div>
    </div>
@stop
