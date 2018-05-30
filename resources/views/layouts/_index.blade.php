<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title')</title>
		
        <!-- Bootstrap - Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
		
		<link rel="stylesheet" href="{{ URL::asset('css/index.css') }}"/>
</head>
<body class="body">
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <div class="logo">
				<img src="{{ asset('img/Duplico_logo-mali.png') }}" />
		  </div>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				@if (Sentinel::check())
					<li>
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="user"></span> {{ Sentinel::getUser()->first_name }} <span class="caret"></span></a>
					  <ul class="dropdown-menu">
						<li><a href="{{ route('auth.logout') }}">Odjava</a></li>
					  </ul>
					</li>
				@else
					<!--<li><a href="{{ route('auth.login.form') }}">Prijava</a></li>-->
					<li><a href="{{ route('auth.register.form') }}">Registracija</a></li>
				@endif
			</ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<section>
		<header class="head">
			<img src="{{ asset('img/struja.jpeg') }}"/>
		</header>
		<article>
		
		</article>
		
		<footer>
		</footer>
	</section>
	<div class="main container">
		@include('notifications')
		@yield('content')
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- Restfulizer.js - A tool for simulating put,patch and delete requests -->
	<script src="{{ asset('js/restfulizer.js') }}"></script>
</body>

<footer>
	<div class="row">
	  <div class="col-xs-2 col-sm-3 col-md-4 col-lg-4">
		<ul>
			<li><a>O nama</a></li>
			<li><a>...</a></li>
			<li><a>...</a></li>
		</ul>
	  </div>
	  <div class="col-xs-2 col-sm-3 col-md-4 col-lg-4">
		<ul>
			<li><a>...</a></li>
			<li><a>...</a></li>
			<li><a>...</a></li>
		</ul>	
	  </div>
	  <div class="col-xs-2 col-sm-3 col-md-4 col-lg-4">
		<p class="kontakt">Kontakt:</p>
		<ul>
			<li>Duplico d.o.o.</li>
			<li>Svetonedeljska cesta 18</li>
			<li>Kalinovica, 10436 Rakov Potok</li>
			<li>Inženjering: +385 1 2657 700</li>
			<li>Fax: +385 1 6589 231</li>
			<li>e-mail: duplico@duplico.hr</li>
		</ul>
	  </div>
	</div>
</footer>
</html>
