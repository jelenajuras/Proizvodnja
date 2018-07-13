@extends('layouts.admin')

@section('title', 'Naručitelji')

@section('content')
	<div class="addUser">
		<button data-path="{{ route('admin.customers.create') }}" 
			class="load-ajax-modal" role="button" data-toggle="modal" data-target="#dynamic-modal">
			<i class="far fa-plus-square"></i>create client
		</button>
	</div>
	
	<h5>Duplico proizvodnja - Clients</h5>
		<!--<input class="form-control" id="myInput" type="text" placeholder="Traži..">-->

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
			@if(count($customers) > 0)
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>Firma</th>
                            <th>Adresa</th>
							<th>Grad</th>
							<th>OIB</th>
                            <th>Opcije</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
					@foreach ($customers as $customer)
                        <tr>
							<td>{{ $customer->naziv }}</td>
							<td>{{ $customer->adresa}}</td>
							<td>{{ $customer->grad }}</td>
							<td>{{ $customer->oib }}</td>
                            <td id="td1">
                                <button data-path="{{ route('admin.customers.edit', $customer->id)}}" 
									class="load-ajax-modal" role="button" data-toggle="modal" data-target="#dynamic-modal">
									<i class="far fa-edit"></i>edit 
								</button>
									
                                <!--<a href="{{ route('admin.customers.destroy', $customer->id) }}" class="btn btn-danger btn-md action_confirm" data-method="delete" data-token="{{ csrf_token() }}" id="button">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        Obriši
                                </a>-->
                            </td>
                        </tr>
                    @endforeach
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
                    </tbody>
                </table>
				@else
					<td>{{'Nema unesenih naručitelja!'}}</td>
				@endif
            </div>

        </div>
    </div>
@stop
