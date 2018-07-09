<link rel="stylesheet" href="{{ URL::asset('css/izjava.css') }}"/>

<div class="izjava container">
	<div class="Jhead">
		<img src="{{ asset('img/Logo_memorandum.png') }}" />
		<div class="adresa">
			</p>Duplico d.o.o.d.o.o., poduzeće za proizvodnju, trgovinu i usluge</p>
			</p>Svetonedeljska cesta 18, Kalinovica,10436 Rakov Potok</p>
		</div>
		
	</div>
	<?php
		$year = date("y");
		 
	?>
	<h3>Izjava o sukladnosti<br>br. {{ 'I - ' . $cabinet->projekt_id . '/' . $year . '-' . $cabinet->brOrmara }}</h3>
	<div class="Jmain">
		<table class="dupl">
			<tr>
				<td>Mi:</td>
				<td>Duplico d.o.o.</td>
			</tr>
			<tr>
				<td></td>
				<td>Svetonedeljska cesta 18, Kalinovica</td>
			</tr>
			<tr>
				<td></td>
				<td>10436 Rakov Potok</td>
			</tr>
			<tr>
				<td></td>
				<td>Hrvatska</td>
			</tr>

		</table>
		<div class="Jorm">
			<p>	kao proizvođač izjavljujemo pod vlastitom odgovornošću da proizvod:</p>

			<table class="orm-spec">
				<tr>
					<td>PROIZVOD:</td>
					<td>{{ $cabinet->tip . ' ormar, ' . $cabinet->materijal . ', ' . $cabinet->izvedba }}  </td>
				</tr>
				<tr>
					<td>MEHANIČKA ZAŠTITA:</td>
					<td>{{ $cabinet->ip_zastita }}</td>
				</tr>
				<tr>
					<td>OZNAKA ORMARA:</td>
					<td>{{ $cabinet->naziv }}</td>
				</tr>
				<tr>
					<td>SERIJSKI BROJ:</td>
					<td>{{ $tvornickiBr . '-' . $cabinet->projekt_id  . '-' . $year }}</td>
				</tr>
			</table>
			
			<p>	odgovara sljedećim standardima ili normama:</p>
			<p>	Niskonaponska direktiva 2014/35/EU (Pravilnik o električnoj opremi namjenjenoj za
			uporabu unutar određenih naponskih granica  NN 43/2016)</p>
			<p>	Elektromagnetska kompatibilnost 89/23/EEC</p>
			<p>Proizvod je tipski i tvornički ispitan u skladu s IEC 61439-1/2.</p>
		</div>
	</div>
	<div class="Jfoot">
		<p>U Kalinovici, 25.04.2018.</p>
		<div class="potpis">
			<p>Za Duplico d.o.o.</p>
			<p>Nikola Rendulić bacc.ing.el.</p>
		</div>
		
		<div class="footer">
			<p>Servis: +385 1 6589 222; Inženjering: +385 1 2657 700; Fax: +385 1 6589 231<br>
			Addiko bank d.d. Zagreb, IBAN: HR0425000091101168917<br>
			Porezni broj (MB): 1687948; OIB: 41025754642</p>
		</div>

	</div>
	
</div>