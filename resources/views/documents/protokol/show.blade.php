<link rel="stylesheet" href="{{ URL::asset('css/izjava.css') }}"/>

<div class="protokol container">
	<div class="Jhead">
		<img src="{{ asset('img/Logo_memorandum.png') }}" />
		<div class="adresa">
			</p>Duplico d.o.o.d.o.o., poduzeće za proizvodnju, trgovinu i usluge</p>
			</p>Svetonedeljska cesta 18, Kalinovica,10436 Rakov Potok</p>
		</div>
		
	</div>
	<?php
		$year = date("y");
		$napon = $cabinet->napon;
		$repl = array('V','Hz');
		$napon = str_replace($repl,'',$napon);
		$napon1 = strstr(str_replace('x','',strstr($napon,'x')),'/',true);
		$frekvencija = str_replace('/','',strstr(str_replace('x','',strstr($napon,'x')),'/'));
		$struja = str_replace('A','',$cabinet->struja);
	?>
	<h3>PROTOKOL br. <span class="font12 ital">(PROTOKOL No.)</span>{{ ' Pr_W_I - ' . $cabinet->projekt_id . '/' . $year . '-' . $cabinet->brOrmara }}<br><span class="font14 ">TVORNIČKO ISPITIVANJE NISKONAPONSKOG ORMARA</span><br><span class="font12 ital">(FACTORY LOW-VOLTAGE CUBICLE TYPE-TESTED)</span></h3>
	<div class="Jmain">
		<div class="inv">
			<table>
				<tr>
					<td class="righ_bord"><p class="bold font12">Investitor <span class="font10 ital">(Customer):</span></p></td>
					<td><p class="bold font12">Postrojenje <span class="font10 ital">(Plant):</span></p></td>
				</tr>
				<tr class="bott_bord">
					<td class="bott_bord righ_bord yell"><p>{{ $customer->naziv }}<br>{{ $customer->adresa . ', ' . $customer->grad }}</p></td>
					<td class="bott_bord yell"><p>{{ $project->objekt }}<br></p></td>
				</tr>
				<tr>
					<td class="righ_bord"><p class="bold font12">Tvornički broj ormara <span class="font10 ital">(Serial No.):</span></p></td>
					<td ><p class="bold font12">Uređaj <span class="font10 ital">(Device):</span></p></td>
				</tr>
				<tr>
					<td class="righ_bord yell"><p>{{ $tvornickiBr . '-' . $cabinet->projekt_id . '-' . $year }}</p></td>
					<td class=" yell"><p>{{ $cabinet->naziv }}<br></p></td>
				</tr>
			</table>
		</div>
		<div class="tehn">
			<p class="marg15_t bold font12">TEHNIČKA DOKUMENTACIJA <span class="font10 ital">(TEHNICAL DOCUMENTATION):</span></p>
			<table>
				<tr>
					<td class="righ_bord"><p class="bold font12">Projekt <span class="font10 ital">(Project No.):</span></p></td>
					<td class="yell"><p>{{ $project->naziv }}</p></td>
			</table>						
		</div>
		<div class="ispit">
			<p class="marg15_t bold font12">ISPITIVANJE <span class="font10 ital">(TESTING):</span></p>
			<table>
				<tr>
					<td class="bott_bord"><p class="bold font12">Nazivni napon: <span class="font10 ital">(Nominal voltage):</span></p></td>
					<td class="bott_bord yell"><p>{{ $napon1 }}</p></td>
					<td class="righ_bord bott_bord"><p>[V]</p></td>
					<td class="bott_bord"><p class="bold font12">Nazivna struja: <span class="font10 ital">(Nominal current):</span></p></td>
					<td class="bott_bord yell"><p>{{ $struja}}</p></td>
					<td class="righ_bord bott_bord"><p>[A]</p></td>
					<td class="bott_bord"><p class="bold font12">Nazivna frekvencija: <span class="font10 ital">(Nominal frequency):</span></p></td>
					<td class="bott_bord yell"><p>{{ $frekvencija }}</p></td>
					<td class="bott_bord"><p>[Hz]</p></td>
				</tr>
				<tr>
					<td class="padd10 bott_bord" colspan="5"><p class="font12">Funkcionalno ispitivanje obavljeno prema tehničkoj dokumentaciji:<br><span class="font10 ital">(Functional testing performed according tehnical documentation):</span></p></td>
					<td class="bott_bord" colspan="2"><p class="font12">Prihvatljivo:<span class="font10 ital">(Acceptable):</span></p></td>
					<td class="bott_bord" colspan="2"><p class="font12"><span class="da_ne">DA</span><span class="da_ne">NE</span><br></p></td>
				</tr>
				<tr>
					<td class="padd10" colspan="9"><p class="bold font12">Otpor izolacije <span class="font10 ital">(Isolation resistance):</span></p></td>
				</tr>
				<tr>
					<td colspan="5"><p class="font12">a) <span class="bold">Prema kućištu /uzemljenju/</span><span class="font10 ital">  (Between conductors /phases / ) </span><span class="bold"> 999 (MΩ )</span></p></td>
					
					<td colspan="2"><p class="font12">Prihvatljivo:<span class="font10 ital">(Acceptable):</span></p></td>
					<td colspan="2"><p class="font12"><span class="da_ne">DA</span><span class="da_ne">NE</span><br></p></td>
				</tr>
				<tr>
					<td class="padd10_b" colspan="5"><p class="font12">b) <span class="bold"> Između vodiča /faza/</span><span class="font10 ital"> (To housing /grounding /)</span><span class="bold"> >999 (MΩ )</span></p></td>
					
					<td colspan="2"><p class="font12">Prihvatljivo:<span class="font10 ital">(Acceptable):</span></p></td>
					<td colspan="2"><p class="font12"><span class="da_ne">DA</span><span class="da_ne">NE</span><br></p></td>
				</tr>
			</table>
		</div>
		<div class="rez">
			<p class="marg15_t bold font12">Rezultati ispitivanja potvrđuju tehničku prihvatljivost (ispravnost) uređaja.<br><span class="font10 ital">(Testing results approved that tested object is tehnicaly acceptable).</span></p>
			<table>
				<tr>
					<td class="padd10 bott_bord righ_bord"><p class="bold font12">Mjerni uređaj za ispitivanje:<br><span class="font10 ital">(Instruments used for testing):</span></p></td>
					<td class="padd10 bott_bord yell"><p>EUROTEST 61557 (Ovjernica br. 046-55-16)</p></td>
				</tr>
				<tr>
					<td class="padd10" ><p class="bold font12">Opaska:<span class="font10 ital">(Note):</span></p></td>
				</tr>
				<tr>
					<td class="padd10_b"><p class="bold font12">Ispitivanje obavljeno po normi EN 61439-1/2 / IEC 439 /<br><span class="font10 ital">(Testing performed according European Standards EN 61439-1/2 / IEC 439/) </span></p></td>

				</tr>
			</table>
		</div>		
		<div class="potp">
			<table>
				<tr>
					<td><p class="bold font12">Nadnevak:<br><span class="font10 ital">(Date):</span></p></td>
					<td><p class="bold font12">Ispitivanje obavio:<br><span class="font10 ital">(Testing performed by):</span></p></td>
					<td><p class="bold font12">Odgovorna osoba:<br><span class="font10 ital">(Responsibility person):</span></p></td>
				</tr>
				<tr>
					<td class="potp1 bott_bord"><p class="bold font12">17.05.2018.</p></td>
					<td class="bott_bord"></td>
					<td class="bott_bord"></td>
				</tr>
				<tr>
					<td></td>
					<td><p class="bold font12">Nikola Rendulić bacc.ing.el.</p></td>
					<td><p class="bold font12">Željko Rendulić</p></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="Jfoot">
		<div class="top_bord footer">
			<p>Servis: +385 1 6589 222; Inženjering: +385 1 2657 700; Fax: +385 1 6589 231<br>
			Addiko bank d.d. Zagreb, IBAN: HR0425000091101168917<br>
			Porezni broj (MB): 1687948; OIB: 41025754642</p>
		</div>
	</div>

</div>
