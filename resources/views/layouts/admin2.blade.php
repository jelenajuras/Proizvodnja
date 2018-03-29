<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		@stack('stylesheet')
    </head>
	<style>	
		#duplico{
			color:#ff6600;
		}
		body{
			font-size: 12px;
		}
		
		#input1 {
			background-color:#ff6600;
			color:#262626;
		}
		#input2 {
			background-color:#262626;
			color:#ff6600;
		}
		th {
			text-align: center;
			font-size: 10px;
			font-weight: normal;
		}

	</style>
    <body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="{{ route('admin.dashboard') }}" id="duplico">Duplico</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="{{ route('admin.dashboard') }}">Naslovna</a></li>
					<!-- Vidi samo administrator -->
					@if (Sentinel::check() && Sentinel::inRole('administrator'))
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Opći podaci<span class="caret"></span></a>
					<ul class="dropdown-menu">
					    <li class="{{ Request::is('admin/users*') ? 'active' : '' }}"><a href="{{ route('users.index') }}">Korisnici</a></li>
						<li class="{{ Request::is('admin/roles*') ? 'active' : '' }}"><a href="{{ route('roles.index') }}">Dozvole</a></li>
					  <li><a href="#"></a></li>
					  <li><a href="#"></a></li>
					</ul>
					@endif
					<!-- Vidi administrator i proizvodnja -->
					@if (Sentinel::check() && Sentinel::inRole('proizvodnja') || Sentinel::inRole('administrator'))
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Projekti<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li class="{{ Request::is('proizvodnja/*') ? 'active' : '' }}"><a href="{{ route('admin.customers.index') }}">Naručitelji</a></li>
						<li class="{{ Request::is('proizvodnja/*') ? 'active' : '' }}"><a href="{{ route('admin.projects.index') }}">Projekti</a></li>
					  <li><a href="#"></a></li>
					  <li><a href="#"></a></li>
					</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ormari<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li class="{{ Request::is('proizvodnja/*') ? 'active' : '' }}"><a href="{{ route('admin.cabinets.index') }}">Ormari</a></li>
						<li class="{{ Request::is('proizvodnja/*') ? 'active' : '' }}"><a href="">Ispitivanja</a></li>
						<li class="{{ Request::is('proizvodnja/*') ? 'active' : '' }}"><a href=""></a></li>
						<li><a href="#"></a></li>
						<li><a href="#"></a></li>
					</ul>
					</li>
					@endif
					
				</ul>
				<form class="navbar-form navbar-left" action="/action_page.php">
				  <div class="form-group">
					<input type="text" class="form-control" placeholder="Traži..." name="search" id="myInput">
				  </div>
				
				</form>
				<ul class="nav navbar-nav navbar-right">
                    @if (Sentinel::check())
                        <li>
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="user"></span> {{ Sentinel::getUser()->first_name }} <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="{{ route('auth.logout') }}">Odjava</a></li>
                          </ul>
                        </li>
                    @else
                        <li><a href="{{ route('auth.login.form') }}">Prijava</a></li>
                        <li><a href="{{ route('auth.register.form') }}">Registracija</a></li>
                    @endif
                </ul>
			</div>
		</nav>

        <div class="container">
            @include('notifications')
            @yield('content')
        </div>

		@stack('script')
    </body>
</html>
