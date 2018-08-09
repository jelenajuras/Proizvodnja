@extends('layouts.admin')

@section('title', 'Naručitelji')
<link rel="stylesheet" href="{{ URL::asset('css/user.css') }}" />
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
                <table id="table_id" class="display client">
                    <thead>
                        <tr>
                            <th colspan="2">Logo</th>
							<th>Firma</th>
                            <th>Adresa</th>
							<th>Grad</th>
							<th>OIB</th>
                            
                        </tr>
                    </thead>
                    <tbody id="myTable">
					@foreach ($customers as $customer)
                        <tr class="client1">
							<td style="position:relative";><img src="{{ asset('img/Duplico_logo-mali.png') }}"/></td>
							<td class="v2"></td>
							<td>{{ $customer->naziv }}<span class="vl"></span></td>
							<td>{{ $customer->adresa}}<span class="vl"></span></td>
							<td>{{ $customer->grad }}<span class="vl"></span></td>
							<td>{{ $customer->oib }}
								<button data-path="{{ route('admin.customers.edit', $customer->id)}}" 
									class="load-ajax-modal" role="button" data-toggle="modal" data-target="#dynamic-modal">
									<i class="far fa-edit"></i> 
								</button>
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
