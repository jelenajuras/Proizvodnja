@extends('layouts.admin')

@section('title', 'Status ormara')
<style>

table {
	box-sizing: border-box;
	width:100%;
	font-size: 0.75rem;
	border: solid 1px #ccc;
	margin: 20px;
	padding: 20px;
}

.status th, .status td{
	padding: 10px;
	border: solid 1px #ccc;
}

.status th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    border-bottom: solid 1px #ccc;
}
.status .bord-bott {
	border-bottom: solid 1px black;
}

.status .bord-rght {
	border-right: solid 1px black;
}

td {
	text-align:center;
}

.rok {
	min-width: 100px;
}
</style>
@section('content')
    <div class="page-header">
        <div class='btn-toolbar'>
            <a class="btn btn-default btn-md" href="{{ url()->previous() }}">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                Natrag
            </a>
        </div>
		<h3>Status ormara proizvodnje</h3>
    </div>
    <div class="row">
        <div class="status col-xs-12 col-sm-12 col-md-12 col-lg-12">
            
				
				<table id="table_id" class="display">
					<thead>
						<tr>
							<th rowspan="3" class="bord-bott">Broj projekta</th>
							<th rowspan="3" class="bord-bott">Broj ormara</th>
							<th rowspan="3" class="bord-bott bord-rght">Naziv ormara</th>
							<th colspan="8" class="bord-rght">Priprema</th>
							<th colspan="17" class="bord-rght">Nabava</th>
							<th colspan="10">Proizvodnja</th>
						</tr>
						<tr>
							<th rowspan="2" class="bord-bott">Rok</td>
							<th rowspan="2" class="bord-bott">Napravljena 3p shema</td>
							<th rowspan="2" class="bord-bott">Odobrena 3p shema</td>
							<th rowspan="2" class="bord-bott">Pripremljena rezna lista za Komax</td>
							<th rowspan="2" class="bord-bott">Pripremljena rezna lista za Perforex</td>
							<th rowspan="2" class="bord-bott">Odobren 3D izgled ormara</td>
							<th rowspan="2" class="bord-bott">Oznake eksportirane</td>
							<th rowspan="2" class="bord-rght bord-bott">Tehnička dokumentacija isprintana</td>
							<th rowspan="2" class="bord-bott rok">Rok</td>
							<th colspan="2">Ormar</td>
							<th colspan="2">Kanalice</td>
							<th colspan="2">Din šine</td>
							<th colspan="2">Vodič</td>
							<th colspan="2">Bakar</td>
							<th colspan="2">Redne stezaljke</td>
							<th colspan="2">Sklopna oprema</td>
							<th colspan="2" class="bord-rght">PLC</td>
							<th rowspan="2" class="bord-bott rok">Rok</td>
							<th rowspan="2" class="bord-bott">Obrada montažne ploče</td>
							<th rowspan="2" class="bord-bott">Obrada ormara</td>
							<th rowspan="2" class="bord-bott">Rezanje vodiča</td>
							<th rowspan="2" class="bord-bott">Izrada oznaka</td>
							<th rowspan="2" class="bord-bott">Slaganje MP</td>
							<th rowspan="2" class="bord-bott">Označavanje MP</td>
							<th rowspan="2" class="bord-bott">Ožičenje</td>
							<th rowspan="2" class="bord-bott">CE QR dokumentacija</td>
							<th rowspan="2" class="bord-bott">Ispitivanje</td>
						</tr>
						<tr>
							<th class="bord-bott">Naručeno</th>
							<th class="bord-bott">Riješeno</th>
							<th class="bord-bott">Naručeno</th>
							<th class="bord-bott">Riješeno</th>
							<th class="bord-bott">Naručeno</th>
							<th class="bord-bott">Riješeno</th>
							<th class="bord-bott">Naručeno</th>
							<th class="bord-bott">Riješeno</th>
							<th class="bord-bott">Naručeno</th>
							<th class="bord-bott">Riješeno</th>
							<th class="bord-bott">Naručeno</th>
							<th class="bord-bott">Riješeno</th>
							<th class="bord-bott">Naručeno</th>
							<th class="bord-bott">Riješeno</th>
							<th class="bord-bott">Naručeno</th>
							<th class="bord-bott">Riješeno</th>
						</tr>
					</thead>
					<tbody>
					@foreach($cabinets as $cabinet) 
						<tr>
							<td>{{ $cabinet->projekt_id }}</td>
							<td>{{ $cabinet->brOrmara }}</td>
							<td class="bord-rght">{{ $cabinet->naziv }}</td>
							<td class="rok">{{ $cabinet->preparation['datum'] }}</td>
							<td>{{ $cabinet->preparation['rijeseno1'] }}</td>
							<td>{{ $cabinet->preparation['rijeseno2'] }}</td>
							<td>{{ $cabinet->preparation['rijeseno3'] }}</td>
							<td>{{ $cabinet->preparation['rijeseno4'] }}</td>
							<td>{{ $cabinet->preparation['rijeseno5'] }}</td>
							<td>{{ $cabinet->preparation['rijeseno6'] }}</td>
							<td class="bord-rght">{{ $cabinet->preparation['rijeseno7'] }}</td>
							<td class="rok">{{ $cabinet->purchase['datum'] }}</td>
							<td>{{ $cabinet->purchase['naruceno1'] }}</td>
							<td>{{ $cabinet->purchase['rijeseno1'] }}</td>
							<td>{{ $cabinet->purchase['naruceno2'] }}</td>
							<td>{{ $cabinet->purchase['rijeseno2'] }}</td>
							<td>{{ $cabinet->purchase['naruceno3'] }}</td>
							<td>{{ $cabinet->purchase['rijeseno3'] }}</td>
							<td>{{ $cabinet->purchase['naruceno4'] }}</td>
							<td>{{ $cabinet->purchase['rijeseno4'] }}</td>
							<td>{{ $cabinet->purchase['naruceno5'] }}</td>
							<td>{{ $cabinet->purchase['rijeseno5'] }}</td>
							<td>{{ $cabinet->purchase['naruceno6'] }}</td>
							<td>{{ $cabinet->purchase['rijeseno6'] }}</td>
							<td>{{ $cabinet->purchase['naruceno7'] }}</td>
							<td>{{ $cabinet->purchase['rijeseno7'] }}</td>
							<td>{{ $cabinet->purchase['naruceno8'] }}</td>
							<td class="bord-rght">{{ $cabinet->purchase['rijeseno8'] }}</td>
							<td class="rok">{{ $cabinet->production['datum'] }}</td>
							<td>{{ $cabinet->production['rijeseno1'] }}</td>
							<td>{{ $cabinet->production['rijeseno2'] }}</td>
							<td>{{ $cabinet->production['rijeseno3'] }}</td>
							<td>{{ $cabinet->production['rijeseno4'] }}</td>
							<td>{{ $cabinet->production['rijeseno5'] }}</td>
							<td>{{ $cabinet->production['rijeseno6'] }}</td>
							<td>{{ $cabinet->production['rijeseno7'] }}</td>
							<td>{{ $cabinet->production['rijeseno8'] }}</td>
							<td>{{ $cabinet->production['rijeseno9'] }}</td>
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
					
			</div>
           		
        

    </div>
	
	<div class="page-header">
        <div class='btn-toolbar'>
            <a class="btn btn-default btn-md" href="{{ url()->previous() }}">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                Natrag
            </a>
        </div>
    </div>

@stop
