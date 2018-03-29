<!DOCTYPE html>

<html lang="en">
<head>
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Side dropdown -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		@stack('stylesheet')
   </head>
<style>
	body {
		font-family: "Lato", sans-serif;
		font-size: 12px;
	}

	/* Fixed sidenav, full height */
	.sidenav {
		height: 100%;
		width: 180px;
		position: fixed;
		z-index: 1;
		top: 0;
		left: 0;
		background-color: #111;
		overflow-x: hidden;
		padding-top: 15px;
	}

	/* Style the sidenav links and the dropdown button */
	.sidenav a, .dropdown-btn {
		padding: 6px 8px 6px 16px;
		text-decoration: none;
		font-size: 12px;
		color: #818181;
		display: block;
		border: none;
		background: none;
		width: 100%;
		text-align: left;
		cursor: pointer;
		outline: none;
	}

	/* On mouse-over */
	.sidenav a:hover, .dropdown-btn:hover {
		color: #f1f1f1;
	}

	/* Main content */
	.main {
		margin-left: 220px; /* Same as the width of the sidenav */
		font-size: 12px; /* Increased text to enable scrolling */
		padding: 5px 0px ;
		
	}

	/* Add an active class to the active dropdown button */
	.active {
		background-color: orange;
		color: black;
	}

	/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
	.dropdown-container {
		display: none;
		background-color: #262626;
		padding-left: 16px;
	}

	/* Optional: Style the caret down icon */
	.fa-caret-down {
		float: right;
		padding-right: 8px;
	}

	/* Some media queries for responsiveness */
	@media screen and (max-height: 450px) {
		.sidenav {padding-top: 15px;}
		.sidenav a {font-size: 18px;}
	}
	#duplico {
		color: #ff6600;
		font-size: 20px;
	}
	#nav-right {
		color: #818181;
		padding-top: 13px;
		list-style-type: none;
	}
	#input2 {
		background-color:#262626;
		color:#ff6600;
	}
	th {
		text-align: center;
		font-weight: normal;
	}
	#center{
		padding-left: 180px;
	}
</style>
</head>
<body>

	<div class="sidenav">
		<a class="navbar-brand" href="{{ route('admin.dashboard') }}" id="duplico">Duplico</a>
		<!-- Vidi samo administrator -->
		@if (Sentinel::check() && Sentinel::inRole('administrator') || Sentinel::inRole('proizvodnja'))
		<button class="dropdown-btn">Opći podaci 
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-container">
			<a class="{{ Request::is('admin/users*') ? 'active' : '' }}" href="{{ route('users.index') }}">Korisnici</a>
			<a class="{{ Request::is('admin/roles*') ? 'active' : '' }}" href="{{ route('roles.index') }}">Dozvole</a>
			<a class="{{ Request::is('proizvodnja/*') ? 'active' : '' }}" href="{{ route('admin.customers.index') }}">Naručitelji</a>
			<a class="{{ Request::is('proizvodnja/*') ? 'active' : '' }}" href="{{ route('admin.projects.index') }}">Projekti</a>
			<a class="{{ Request::is('proizvodnja/users*') ? 'active' : '' }}" href="{{ route('admin.production_projects.index') }}">Projekti proizvodnje</a>
			<a class="{{ Request::is('proizvodnja/*') ? 'active' : '' }}" href="{{ route('admin.cabinets.index') }}">Ormari</a>
		</div>
		@endif
		<!-- Vidi administrator i proizvodnja -->
		@if (Sentinel::check() && Sentinel::inRole('proizvodnja') || Sentinel::inRole('administrator'))
		<button class="dropdown-btn">Proizvodnja
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-container">
			<a class="" href="">...</a>
		</div>

		<button class="dropdown-btn">...
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-container">
			<a class="" href="">...</a>
			<a href="">...</a>
			<a href="">...</a>
		</div>
		
		@endif


	</div>
	<nav class="navbar navbar-inverse">
				
		<div class="container-fluid">
			@if (Sentinel::check())
			<form class="navbar-form navbar-left" action="/action_page.php" id="center">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Traži na stranici..." name="search" id="myInput">
				</div>		
			</form>
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

       <div class="main">
		@include('notifications')
            @yield('content')
		</div>

		@stack('script')
    </body>
</html>
