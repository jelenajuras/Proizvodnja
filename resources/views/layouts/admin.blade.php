<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">	
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
	
	<!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,400,800,900" rel="stylesheet">
		
	<!-- Date picker-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
	
	<!-- Side dropdown -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- Awesome icon -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
	
	<link rel="stylesheet" href="{{ URL::asset('css/admin.css') }}"/>
	<link rel="stylesheet" href="{{ URL::asset('css/w3_dropdown.css') }}"/>
	
	@stack('stylesheet')
	
</head>

<body>
	@if (Sentinel::check() && Sentinel::inRole('administrator') || Sentinel::inRole('proizvodnja') || Sentinel::inRole('voditelj'))
		<section class="side col-12 col-md-12 col-lg-3">
			<header class="col-12">
				<img src="//www.gravatar.com/avatar/{{ md5(Sentinel::getUser()->email) }}?d=mm" alt="{{ Sentinel::getUser()->email }}" class="img-circle">
				<h2>{{ Sentinel::getUser()->first_name }}</h2>
				<p>Duplico</p>
				<div class="dropdwn">
					<div class="w3-dropdown-hover">
						<button class="w3-button"><i class="fas fa-ellipsis-v"></i></button>
						<div class="dropdwn-hv w3-dropdown-content">
							<a href="{{ route('admin.projects.create') }}" class="w3-bar-item w3-button">add new project</a>
							<a href="{{ route('admin.customers.create') }}" class="w3-bar-item w3-button">add new customers</a>
							<a href="{{ route('admin.cabinets.index') }}" class="w3-bar-item w3-button" >show all</a>
							@if (Sentinel::check() && Sentinel::inRole('administrator') )
							<a href="{{ route('users.index') }}" class="w3-bar-item w3-button">Users</a>
							<a href="{{ route('roles.index') }}" class="w3-bar-item w3-button">permissions</a>
							<a href="{{ route('admin.projects.index') }}" class="w3-bar-item w3-button">projects</a>
							@endif
							<a href="{{ route('auth.logout') }}" class="w3-bar-item w3-button">log out</a>
							
						</div>
					</div>
				</div>

			</header>
			<article class="col-12">
				<div class="Jsearch">
					<i class="fas fa-search"></i><input id="myInput" type="text" placeholder="Search..">
				</div>
				<div class="Jfilter">
					filter<i class="fas fa-filter"></i>
				</div>
			</article>
			<article class="projects col-12">
				<table id="myTable">
					@foreach(DB::table('projects')->join('customers','projects.investitor_id','customers.id')->select('projects.*','customers.naziv as investitor')->get() as $project)
						@if($project->id == Sentinel::getUser()->productionProject_id || $project->user_id == Sentinel::getUser()->id)
						<tr>
							<td>
								<div class="project col-12 col-md-12 col-lg-12">
									<a href="{{ route('admin.productions.show', $project->id) }}">
										<p>id: <span>{{ $project->id }}</span></p>
										<p>name: <span>{{ $project->naziv}}</span></p>
										<p>client: <span>{{ $project->investitor}}</span></p>
									</a>
								</div>
							</td>
						</tr>
						@endif
					@if (Sentinel::check() && Sentinel::inRole('proizvodnja') || Sentinel::inRole('administrator') )
						<tr>
							<td>
								<div class="project col-12 col-md-12 col-lg-12">
									<a href="{{ route('admin.productions.show', $project->id) }}">
										<p>id: <span>{{ $project->id }}</span></p>
										<p>name: <span>{{ $project->naziv}}</span></p>
										<p>client: <span>{{ $project->investitor}}</span></p>
									</a>
								</div>
							</td>
						</tr>
					@endif
					@endforeach	
					<!-- Search -->
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
				</table>
			</article>
		</section>
		
	@endif
	
	<section class="Jmain col-12 col-md-12 col-lg-9">
		<!--<span style="font-size:30px;cursor:pointer" id="open" onclick="openNav()">&#9776; </span>-->
		@include('notifications')
		@yield('content')
		

	</section>
	
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
        <!-- Latest compiled and minified JavaScript -->
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
			
		</script>
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
					 "lengthMenu": [ 25, 50, 75, 100 ]
					/* dom: 'Bfrtip',
						buttons: [
							//'copy', 'excel', 'pdf', 'print',
					{
						extend: 'pdfHtml5',
						text: 'Izradi PDF',
						exportOptions: {
							columns: ":not(.not-export-column)"
							}
						},
						{
					extend: 'excelHtml5',
					text: 'Izradi XLS',
					exportOptions: {
						columns: ":not(.not-export-column)"
					}
					},
					 ],*/
				});
				/* get id from selected row*/
				var table = $('#table_id').DataTable();
 
				$('#table_id tbody').on( 'click', 'tr', function () {
					var id = table.row( this ).id();
					 $("#ormarId").val(id);
					/* $.ajax({
					  type: 'POST',
					  url: 'index.php',
					  data: ({name:"ormarId"}),
					  cache: false,
					  success: function(data){
						$('#results').html(data);
					  }
					})
					return false;*/
				} );
				/* Row selection (multiple rows) 
					var table = $('#table_id').DataTable();
				 
					$('#table_id tbody').on( 'click', 'tr', function () {
						$(this).toggleClass('selected');
					} );
				 
					$('#button').click( function () {
						alert( table.rows('.selected').data().length +' row(s) selected' );
					} );*/
				
			});
		</script>
		
		@stack('script')
    </body>
</html>