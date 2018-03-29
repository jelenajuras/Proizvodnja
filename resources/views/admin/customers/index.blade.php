@extends('layouts.admin')

@section('title', 'Naručitelji')

@section('content')
	<div class='btn-toolbar pull-right'>
		<a class="btn btn-default btn-md" href="{{ route('admin.customers.create') }}" >
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			Dodaj naručitelja
		</a>
	</div>
	
	<h3>Naručitelji</h3>
		<!--<input class="form-control" id="myInput" type="text" placeholder="Traži..">-->

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
			@if(count($customers) > 0)
                <table class="table table-hover">
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
                                <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn btn-default ">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Ispravi
                                </a>
                                <!--<a href="{{ route('admin.customers.destroy', $customer->id) }}" class="btn btn-danger action_confirm" data-method="delete" data-token="{{ csrf_token() }}">
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
