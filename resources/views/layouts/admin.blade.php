<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title')</title>

	<!-- Bootstrap - Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Date picker-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
	
	<!-- Side dropdown -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ URL::asset('css/admin.css') }}"/>
	
	@stack('stylesheet')
	
</head>

<body>
	<div class="sidenav">
		<!--<img src="{{ asset('img/Duplico_logo-mali.png') }}"/>-->
		<a class="navbar-brand" href="{{ route('admin.dashboard') }}" id="duplico">Duplico</a>
	
	<!-- Vide administrator i proizvodnja -->
		@if (Sentinel::check() && Sentinel::inRole('administrator') || Sentinel::inRole('proizvodnja'))
			<button class="dropdown-btn">Opći podaci 
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
				<a class="{{ Request::is('admin/users*') ? 'active' : '' }}" href="{{ route('users.index') }}">Korisnici</a>
				<a class="{{ Request::is('admin/roles*') ? 'active' : '' }}" href="{{ route('roles.index') }}">Dozvole</a>
				<a class="{{ Request::is('proizvodnja/*') ? 'active' : '' }}" href="{{ route('admin.customers.index') }}">Naručitelji</a>
				<a class="{{ Request::is('proizvodnja/*') ? 'active' : '' }}" href="{{ route('admin.projects.index') }}">Projekti</a>
				<a class="{{ Request::is('proizvodnja/*') ? 'active' : '' }}" href="{{ route('admin.cabinets.index') }}">Ormari</a>
			</div>

			<button class="dropdown-btn">Proizvodnja
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
				@foreach(DB::table('projects')->get() as $project)
					<a class="{{ Request::is('proizvodnja/*') ? 'active' : '' }}" href="{{ route('admin.productions.show', $project->id) }}">{{ $project->id . ' ' . $project->naziv}}</a>
				@endforeach
			</div>
			
			<!-- <button class="dropdown-btn">...
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
				<a class="" href="">...</a>
				<a href="">...</a>
				<a href="">...</a>
			</div>-->
		@endif
		
	<!-- Vidi kupac i basic -->
		@if (Sentinel::check() && Sentinel::inRole('basic'))
			<button class="dropdown-btn">Opći podaci 
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
				<a class="{{ Request::is('proizvodnja/*') ? 'active' : '' }}" href="{{ route('admin.cabinets.index') }}">Ormari</a>
			</div>
		@endif
		@if (Sentinel::check() && Sentinel::inRole('kupac') || Sentinel::inRole('basic'))
			<button class="dropdown-btn">Proizvodnja
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
			@foreach(DB::table('projects')->get() as $project)
				@if($project->id == Sentinel::getUser()->productionProject_id || $project->user_id == Sentinel::getUser()->id)
					<a class="{{ Request::is('kupac/*') ? 'active' : '' }}" href="{{ route('admin.productions.show', $project->id) }}">{{ $project->id . ' ' . $project->naziv}}</a>
				@endif
			@endforeach
			</div>
		@endif
	</div>
	
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			@if (Sentinel::check())
			<!--<form class="navbar-form navbar-left" action="/action_page.php" id="center">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Traži na stranici..." name="search" id="myInput">
				</div>
			</form>-->
			@endif	
			<div class="navbar-header navbar-right" id="nav-right" >
				@if (Sentinel::check())
				<li>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="nav-right"><span class="user"></span> {{ Sentinel::getUser()->first_name }} <span class="caret"></span></a>
					<ul class="dropdown-menu">
					<li><a href="{{ route('auth.logout') }}">Odjava</a></li>
					</ul>
				</li>
				@else
					<li><a href="{{ route('auth.login.form') }}">Prijava</a></li>
					<li><a href="{{ route('auth.register.form') }}">Registracija</a></li>
				@endif				
			</div>
		</div>
	</nav>
	<div class="main">
		@include('notifications')
		@yield('content')
	</div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- Restfulizer.js - A tool for simulating put,patch and delete requests -->
        <script src="{{ asset('js/restfulizer.js') }}"></script>
		
		<script>
		/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
		var dropdown = document.getElementsByClassName("dropdown-btn");
		var i;

		for (i = 0; i < dropdown.length; i++) {
		dropdown[i].addEventListener("click", function() {
		this.classList.toggle("active");
		var dropdownContent = this.nextElementSibling;
		if (dropdownContent.style.display === "block") {
		  dropdownContent.style.display = "none";
		} else {
		  dropdownContent.style.display = "block";
		}
		});
		}
	</script>
	    
	<!-- DataTables -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/datatables.min.css"/>
		 
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/datatables.min.js"></script>


		<script>
			$(document).ready( function () {
				$('#table_id').DataTable( {
					language: {
						paginate: {
							previous: 'Prethodna',
							next:     'Slijedeća',
						},
						"info": "Prikaz _START_ do _END_ od _TOTAL_ zapisa",
						"search": "Filtriraj:",
						"lengthMenu": "Prikaži _MENU_ zapisa"
					},
					 "lengthMenu": [ 25, 50, 75, 100 ],
					 dom: 'Bfrtip',
						buttons: [
							//'copy', 'excel', 'pdf', 'print',
					/*{
						extend: 'pdfHtml5',
						text: 'Izradi PDF',
						exportOptions: {
							columns: ":not(.not-export-column)"
							}
						},*/
						{
					extend: 'excelHtml5',
					text: 'Izradi XLS',
					exportOptions: {
						columns: ":not(.not-export-column)"
					}
					},
					 ],
				});
			});
		</script>
		@stack('script')
    </body>
</html>
