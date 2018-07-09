<!DOCTYPE html>
<html lang="hr">
	<head>
		<meta charset="utf-8">
	</head>
<style>
body { 
	font-family: DejaVu Sans, sans-serif;
	font-size: 10px;
}
</style>
	<body>

		<h4>Unesene su promjene ormara za projekt {{ $investitor . ', ' . $projekt->naziv }}</h4>
		
		<div>
			<p>{{ $brOrmaraProjekta . ' '. $naziv}}</p>
		</div>
		<div>
			<p>Datum isporuke:{{ $isporuka}} </p>
		</div>
	</body>
</html>