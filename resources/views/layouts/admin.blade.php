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

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,400,800,900|Roboto" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.min.css" rel="stylesheet" defer>
	{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
	<!-- DataTables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css" defer>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/datatables.min.css" defer>

	<!-- Awesome icon -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">

	<link rel="stylesheet" href="{{ URL::asset('css/admin.css') }}" />
	
	<link rel="stylesheet" href="{{ URL::asset('css/w3_dropdown.css') }}" />
	

	@stack('stylesheet')

	<!-- Date picker-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>

	<!-- Restfulizer.js - A tool for simulating put,patch and delete requests -->
	<script src="{{ asset('js/restfulizer.js') }}"></script>

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
					<button class="w3-button">
						<i class="fas fa-ellipsis-v"></i>
					</button>
					<div class="dropdwn-hv w3-dropdown-content">
						<button data-path="{{ route('admin.projects.create') }}" 
						class="load-ajax-modal" role="button" data-toggle="modal" data-target="#dynamic-modal">
						add new project
						</button>
						<button data-path="{{ route('admin.customers.create') }}" 
						class="load-ajax-modal" role="button" data-toggle="modal" data-target="#dynamic-modal">
						add new customers
						</button>

						<a href="{{ route('admin.cabinets.index') }}" class="w3-bar-item w3-button">show all</a>
						@if (Sentinel::check() && Sentinel::inRole('administrator') )
						<a href="{{ route('users.index') }}" class="w3-bar-item w3-button">Users</a>
						<a href="{{ route('roles.index') }}" class="w3-bar-item w3-button">permissions</a>
						<a href="{{ route('admin.customers.index') }}" class="w3-bar-item w3-button">clients</a>
						<a href="{{ route('admin.projects.index') }}" class="w3-bar-item w3-button">projects</a>
						@endif
						<a href="{{ route('auth.logout') }}" class="w3-bar-item w3-button">log out</a>

					</div>
					<div class="modal fade" id="dynamic-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-body">
								</div>
							
							</div>
						</div>
					</div>
				</div>
			</div>

		</header>
		<article class="col-12">
			<div class="Jsearch">
				<input id="myInput" type="text" placeholder="Search..">
				<i class="fas fa-search"></i>
			</div>
			<div class="Jfilter">
				filter
				<i class="fas fa-filter"></i>
			</div>
		</article>
		<article class="projects col-12">
			<table id="myTable" style="font-size:0.75rem">
				@foreach(DB::table('projects')->join('customers','projects.investitor_id','customers.id')->select('projects.*','customers.naziv as investitor')->get() as $project)
				
				@if($project->id == Sentinel::getUser()->productionProject_id || $project->user_id == Sentinel::getUser()->id)
				<tr>
					<td>
						<div class="project col-12 col-md-12 col-lg-12">
							<a href="{{ route('admin.productions.show', $project->id) }}">
								<p>id:
									<span>{{ $project->id }}</span>
								</p>
								<p>name:
									<span>{{ $project->naziv}}</span>
								</p>
								<p>client:
									<span>{{ $project->investitor}}</span>
								</p>
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
								<p>id:
									<span>{{ $project->id }}</span>
								</p>
								<p>name:
									<span>{{ $project->naziv}}</span>
								</p>
								<p>client:
									<span>{{ $project->investitor}}</span>
								</p>
							</a>
						</div>
					</td>
				</tr>
				@endif
				
				@endforeach
				<!-- Search -->
				<script>
					$(document).ready(function() {
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

	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/datatables.min.js"></script>

	<script>
		$(document).ready(function() {
			$('#table_id').DataTable({
				language: {
					paginate: {
						previous: 'Previous',
						next: 'Next',
					},
					"info": "Show _START_ to _END_ of _TOTAL_ entries",
					"search": "Search:",
					"lengthMenu": "Show _MENU_ entries"
				},
				"lengthMenu": [25, 50, 75, 100]
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
			
		});
	</script>
	<script>
	  const fetching = `
		<div style="display:flex;height:100%;justify-content:center;align-items:center;">
		  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"><path opacity=".2" fill="#FF6700" d="M20.201 5.169c-8.254 0-14.946 6.692-14.946 14.946 0 8.255 6.692 14.946 14.946 14.946s14.946-6.691 14.946-14.946c-.001-8.254-6.692-14.946-14.946-14.946zm0 26.58c-6.425 0-11.634-5.208-11.634-11.634 0-6.425 5.209-11.634 11.634-11.634 6.425 0 11.633 5.209 11.633 11.634 0 6.426-5.208 11.634-11.633 11.634z"/><path fill="#FF6700" d="M26.013 10.047l1.654-2.866a14.855 14.855 0 0 0-7.466-2.012v3.312c2.119 0 4.1.576 5.812 1.566z"><animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 20 20" to="360 20 20" dur="0.5s" repeatCount="indefinite"/></path></svg>
		</div>
	  `

	  $.ajaxSetup({
		headers: {
		  'X-CSRF-Token': $('meta[name="_token"]').attr('content')
		}
	  });
	 
	  $('.load-ajax-modal').click(function() {
		const dest = $('#dynamic-modal div.modal-body')
		dest.html(fetching);
	 
		$.ajax({
		  type: 'GET',
		  url: $(this).data('path'),

		  success: function(result) {
			setTimeout(() => {
			  dest.hide().html(result).fadeIn();
			}, 250);
		  }
		});
	  });
	</script>
	
	
	<script>
			$(document).ready(function(){
				$(".OrmProiz").click(function(){
					$("p").toggle();
				});
			});
	</script>

	
	@stack('script')
</body>

</html>