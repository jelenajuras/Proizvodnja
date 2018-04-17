@extends('layouts.admin')

@section('title', 'Proizvodni projekti')

<style>
	body {font-family: "Lato", sans-serif;}

	/* Style the tab */
	.tab {
		overflow: hidden;
		border: 1px solid #ccc;
		background-color: #ff751a;
	}

	/* Style the buttons inside the tab */
	.tab button {
		background-color: inherit;
		float: center;
		border: none;
		outline: none;
		cursor: pointer;
		padding: 10px 10px;
		width: 100px;
		transition: 0.3s;
		font-size: 12px;
	}

	/* Change background color of buttons on hover */
	.tab button:hover {
		background-color: #ddd;
	}

	/* Create an active/current tablink class */
	.tab button.active {
		background-color: #666666;
		color: #ff751a;
		font-weight: bold;
	}

	/* Style the tab content */
	.tabcontent {
		display: none;
		padding: 6px 12px;
		border: 1px solid #ccc;
		border-top: none;
	}

	/* Style the close button */
	.topright {
		float: right;
		cursor: pointer;
		font-size: 28px;
	}

	.topright:hover {color: red;}
</style>
@section('content')
	
	<div class="tab">
	  <button class="tablinks" onclick="openCity(event, 'Opći')" id="defaultOpen">Opći podaci</button>
	  <button class="tablinks" onclick="openCity(event, 'Priprema')" id="defaultOpen">Priprema</button>
	  <button class="tablinks" onclick="openCity(event, 'Nabava')">Nabava</button>
	  <button class="tablinks" onclick="openCity(event, 'Proizvodnja')">Proizvodnja</button>
	  <button class="tablinks" onclick="openCity(event, 'Status')">Status ormara</button>
	</div>

	<div id="Opći" class="tabcontent">
	  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
	  <h4>Opći podaci</h4>
	  <p></p>
	</div>

	<div id="Priprema" class="tabcontent">
	  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
	  <h4>Priprema</h4>
	  <p></p>
	</div>

	<div id="Nabava" class="tabcontent">
	  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
	  <h4>Nabava</h4>
	  <p></p> 
	</div>

	<div id="Proizvodnja" class="tabcontent">
	  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
	  <h4>Proizvodnja</h4>
	  <p></p>
	</div>

	<div id="Status" class="tabcontent">
	  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
	  <h4>Status ormara</h4>
	  <p></p>
	</div>
	
	<script type="text/javascript">
		$('.date').datepicker({  
		   format: 'dd-mm-yyyy',
		   startDate:'-60y',
		   endDate:'+1y',
		}); 
	</script> 
	<script>
	function openCity(evt, cityName) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
	}

	// Get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click();
	</script>
@stop
