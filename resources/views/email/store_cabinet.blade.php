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

		<h4>Unesen je novi ormar za projekt {{ $investitor . ', ' . $ormar->naziv }}</h4>
		
		<div>
			<p>{{ $brOrmara . ' ' .  $naziv}}</p>
		</div>
		<div>
			<p>Datum isporuke:{{ $isporuka}} </p>
		</div>
	</body>
</html>