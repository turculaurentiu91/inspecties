<?php namespace Nen; //EDIT THE NAMESPACE


function pdfgen($data) {
	extract($data);

	// create new PDF document
	$pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$fontname1 = \TCPDF_FONTS::addTTFfont(INSPECTIES_ASSETS_DIR . '/fonts/OpenSans-Regular.ttf', 'TrueTypeUnicode', '', 32);
	$fontname2 = \TCPDF_FONTS::addTTFfont(INSPECTIES_ASSETS_DIR . '/fonts/OpenSans-Semibold.ttf', 'TrueTypeUnicode', '', 32);
	$fontname3 = \TCPDF_FONTS::addTTFfont(INSPECTIES_ASSETS_DIR . '/fonts/OpenSans-Bold.ttf', 'TrueTypeUnicode', '', 32);
	
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	$pdf->SetMargins(7, -5, 7);
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
	if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
		require_once(dirname(__FILE__) . '/lang/eng.php');
		$pdf->setLanguageArray($l);
	}

	$pdf->SetFont('times', 'BI', 20);

	$pdf->AddPage();

	$pdf->Image(INSPECTIES_ASSETS_DIR . '/images/voorkant.jpg', 10, 90, 190, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);
	$pdf->Image(INSPECTIES_ASSETS_DIR . '/images/nb.png', 180, 260, 15, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);

	// header code start
	$pdf->SetXY(10, 5);
	$pdf->Image(INSPECTIES_ASSETS_DIR . '/images/hoppenbrouwers.jpg', 10, 5, 70, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);

	$pdf->setFontSpacing($spacing = '');
	$pdf->setColor('text', 25, 25, 25);
	$pdf->SetFont($fontname1, '', 9);

	$pdf->SetXY(10, 40);
	$html = <<<EOD
		<font size="+15">Onderhoudsovereenkomst</font><br />
		<font size="+10">lnspectie volgens de NEN3140:2011</font>
EOD;
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'C', true);
	
	$pdf->SetXY(72, 200);
	$html = <<<EOD
		<table frame="box" style="width:300px">
		<tr>
			<td style="width:75px">Projectnr.:</td>
			<td style="width:225px">O-{$postcode}{$huisnummer}-310</td>
		</tr>
		<tr>
			<td style="width:75px">&nbsp;</td>
			<td style="width:225px">{$bedrijfsnaam}</td>
		</tr>
		<tr>
			<td style="width:75px">&nbsp;</td>
			<td style="width:225px">{$adres} {$huisnummer}</td>
		</tr>
		<tr>
			<td style="width:75px">&nbsp;</td>
			<td style="width:225px">{$postcode} {$woonplaats}</td>
		</tr>
		</table>
EOD;
	$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

	$pdf->SetXY(10, 265);
	$pdf->Image(INSPECTIES_ASSETS_DIR . '/images/Blokjes.jpg', 10, 265, 120, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);

	$pdf->SetXY(10, 300);
	$pdf->Cell(0, 10, '', '', 1, 'L');
	
	$pdf->SetXY(10, 5);
	$pdf->Image(INSPECTIES_ASSETS_DIR . '/images/hoppenbrouwers.jpg', 10, 5, 70, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);
	$pdf->Image(INSPECTIES_ASSETS_DIR . '/images/nb.png', 180, 260, 15, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);

	$pdf->SetXY(140, 5);
	$pdf->setFontSpacing($spacing = '');
	$pdf->setColor('text', 25, 25, 25);
	$pdf->SetFont($fontname1, '', 9);
	$pdf->Cell(0, 10, "Overeenkomst: O-{$postcode}{$huisnummer}-310", '', 1, 'L');

	$graph_light = array('width' => 0.00001, 'cap' => 'butt', 'join' => 'round', 'solid' => '0,0', 'color' => array(25, 25, 25));
	$pdf->Line(7, 20, 203, 20, $graph_light);

	$pdf->SetXY(10, 26);
	$html = <<<EOD
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>1. Algemene gegevens</b><br />
					<br />
					<b>1.1 Opdrachtgever</b><br />
				<table cellspacing="0" cellpadding="2" style="width:520px">
			<tr>
				<td style="width:120px">Bedrijfsnaam</td>
				<td style="width:400px">: {$bedrijfsnaam}</td>
			</tr>
			<tr>
				<td style="width:120px">Contactpersoon</td>
				<td style="width:400px">: {$naam}</td>
			</tr>
			<tr>
				<td style="width:120px">Adres</td>
				<td style="width:400px">: {$adres} {$huisnummer}</td>
			</tr>
			<tr>
				<td style="width:120px">Postcode</td>
				<td style="width:400px">: {$postcode}</td>
			</tr>
			<tr>
				<td style="width:120px">Plaats</td>
				<td style="width:400px">: {$woonplaats}</td>
			</tr>
			<tr>
				<td style="width:120px">Telefoonnummer</td>
				<td style="width:400px">: {$telefoon}</td>
			</tr>
			<tr>
				<td style="width:120px">E-mailadres</td>
				<td style="width:400px">: {$email}</td>
			</tr>
			</table><br />
			<br />
					<b>1.2 Onderhoudslocatie</b><br />
				<table cellspacing="0" cellpadding="2" style="width:520px">
			<tr>
				<td style="width:120px">Bedrijfsnaam</td>
				<td style="width:400px">: {$bedrijfsnaam}</td>
			</tr>
			<tr>
				<td style="width:120px">Contactpersoon</td>
				<td style="width:400px">: {$naam}</td>
			</tr>
			<tr>
				<td style="width:120px">Adres</td>
				<td style="width:400px">: {$adres} {$huisnummer}</td>
			</tr>
			<tr>
				<td style="width:120px">Postcode</td>
				<td style="width:400px">: {$postcode}</td>
			</tr>
			<tr>
				<td style="width:120px">Plaats</td>
				<td style="width:400px">: {$woonplaats}</td>
			</tr>
			</table><br />
			<br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>2. Motivatie</b><br />
		De huidige Arbo-wet (zie artikel 3.4, “Elektrische installaties”) verplicht de werkgevers om de werknemers en derden (bezoeker, inleners, etc,) een veilige en gezonde werkomgeving te bieden. De werkgever zal er zorg voor moeten dragen dat de elektrotechnische installatie aantoonbaar periodiek gecontroleerd wordt op de veiligheid van de installatie.<br />
		<br />
		<b>Periodieke controle</b><br />
		Een elektrotechnische installatie is onderhevig aan slijtage door onder andere gebruik en veroudering, daarom dient u uw elektrotechnische installatie periodiek te laten inspecteren zodat u verzekerd bent van een veilige installatie. Bovendien kunt naar de arbeidsinspectie en verzekeraars aantonen dat al het mogelijke is gedaan om ongevallen en gevaarlijke situaties te voorkomen.<br />
		<br />
		<b>Visuele en meettechnische inspectie</b><br />
		Met een visuele inspectie kan al in een vroeg stadium bekeken worden wat de eventuele tekortkomingen aan de elektrotechnische installatie zijn. Door na een visuele inspectie ook een meettechnische inspectie uit te voeren wordt duidelijk gemaakt wat de eventuele afwijkingen in belasting of beveiliging zijn.<br />
		<br />
		<b>Normen</b><br />
		De NEN 3140 is geen wet. Maar in geval van calamiteiten moet u aantonen dat de installatie veilig is. De rechter en de arbeidsinspectie hanteren deze twee normen als minimale eis om te beoordelen of de veiligheid gewaarborgd is.<br />
		<br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>3. Omschrijving installatie</b><br />
		De elektrotechnische installatie die is geïnstalleerd is op bovengenoemde onderhoudslocatie. De installatie bestaat uit:<br />
		<br />
		<b>Aantal verdeelkasten: {$verdeelkast} stuks</b><br />
		<br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>4. Uitgangspunten overeenkomst</b><br />
		Dit supplement is gebaseerd op de uitvoering van een periodieke inspectie van de omschreven gebouwgebonden elektrotechnische licht/kracht installatie conform de huidige NEN3140.<br />
		<br />
EOD;
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    $pdf->SetXY(10, 265);
    $pdf->Image(INSPECTIES_ASSETS_DIR . '/images/Blokjes.jpg', 10, 265, 120, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);

    $pdf->SetXY(10, 300);
    $pdf->Cell(0, 10, '', '', 1, 'L');

	$pdf->SetXY(10, 5);
	$pdf->Image(INSPECTIES_ASSETS_DIR . '/images/hoppenbrouwers.jpg', 10, 5, 70, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);
	$pdf->Image(INSPECTIES_ASSETS_DIR . '/images/nb.png', 180, 260, 15, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);

	$pdf->SetXY(140, 5);
	$pdf->setFontSpacing($spacing = '');
	$pdf->setColor('text', 25, 25, 25);
	$pdf->SetFont($fontname1, '', 9);
	$pdf->Cell(0, 10, "Overeenkomst: O-{$postcode}{$huisnummer}-310", '', 1, 'L');

	$pdf->SetXY(7, 20);
	$graph_light = array('width' => 0.00001, 'cap' => 'butt', 'join' => 'round', 'solid' => '0,0', 'color' => array(25, 25, 25));
	$pdf->Line(7, 20, 203, 20, $graph_light);
	
	$pdf->SetXY(10, 26);
	$html = <<<EOD
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>5. Werkzaamheden</b><br />
		De genoemde installatie zal van af het aansluitpunt van de energieleverancier tot aan de hoofdschakelaar van de eindgebruiker, wandcontactdoos of eindgroep worden geïnspecteerd volgens het “Plan van toezicht”. De gehele inspectie bestaat uit twee delen; de visuele en meettechnische inspectie.<br />
		<br />
		<b>Visuele inspectie</b><br />
		<br />
		Bij de visuele inspectie wordt gecontroleerd op de volgende zaken:
		&bull; aanwezigheid en compleetheid van tekeningen;<br />
		&bull; opschriften en aanduidingen van hoofd- en onderverdeelinrichtingen;<br />
		&bull; elektrisch materieel tenminste in overeenstemming is met de installatie-eisen;<br />
		&bull; verbinding van zichtbare beschermingsleidingen in orde zijn;<br />
		&bull; beveiligingstoestellen aanwezig zijn en juist ingesteld;<br />
		&bull; de veiligheidsketens in orde zijn;<br />
		&bull; vrije ruimten en vluchtwegen goed toegankelijk zijn;<br />
		&bull; aanwezige meetinstrumenten, signaallampen en dergelijke functioneren.<br />
			<br />
		<b>Meettechnische inspectie</b><br />
		<br />
		Bij de meettechnische inspectie wordt gecontroleerd op de volgende zaken:<br />
		&bull; het onderbroken zijn van de beschermingsleiding en aansluitingen hiervan;<br />
		&bull; de isolatieweerstand van de beschermingsleiding van de installatie;<br />
		&bull; veilige scheiding van de stroomketens;<br />
		&bull; aardverspreidingweerstand van aardelektroden;<br />
		&bull; weerstand van beschermingsleidingen;<br />
		&bull; impedantie van foutstroomketens van het stroomstelsel;<br />
		&bull; kortsluitstromen en weerstanden;<br />
		&bull; de aanspreekstroom en –tijd van aardlekbeveiligingen;<br />
		&bull; de juiste werking van uitschakelcontacten van beveiligingstoestellen tegen overstroom;<br />
		&bull; de maatregelen tegen te hoge temperatuur bij normaal bedrijf;<br />
		&bull; de juiste werking van de veiligheidsketens.<br />
		<br />
		<b>Normen</b><br />
		<br />
		De elektrische installatie zal worden onderworpen aan de eisen in de volgende normen:<br />
		&bull; NEN 3140: 2011<br />
		&bull; NEN 1010: 2007 + C1/A1: 2011.<br />
		<br />
		<b>Rapportage</b><br />
		<br />
		Alle gegevens worden na de inspectie verzameld en aan u overhandigd in een rapportage. Deze rapportage bevat de volgende elementen:<br />
		&bull; checklisten van alle geïnspecteerde installatiedelen;<br />
		&bull; geconstateerde afwijkingen;<br />
		&bull; eindoordeel.<br />
		<br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>6. Frequentie</b><br />
		<b>Periodieke NEN 3140 lnspectie</b><br />
		<br />
		De installatie zal éénmaal per 4 jaar worden geïnspecteerd conform de NEN 3140:2011. De onderhoudsfrequentie is bepaald aan de hand van een risicoanalyse. <br />
		<br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>7. lngangstijd / looptijd</b><br />
		Deze overeenkomst gaat in op 1 januari {$jaar} en heeft een looptijd overeenkomstig de inspectiefrequentie. Deze overeenkomst zal stilzwijgend verlengd worden met eenzelfde periode.<br />
		<br />
EOD;
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    $pdf->SetXY(10, 265);
    $pdf->Image(INSPECTIES_ASSETS_DIR . '/images/Blokjes.jpg', 10, 265, 120, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);

    

    $pdf->SetXY(10, 300);
    $pdf->Cell(0, 10, '', '', 1, 'L');

	$pdf->SetXY(10, 5);
	$pdf->Image(INSPECTIES_ASSETS_DIR . '/images/hoppenbrouwers.jpg', 10, 5, 70, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);
	$pdf->Image(INSPECTIES_ASSETS_DIR . '/images/nb.png', 180, 260, 15, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);

	$pdf->SetXY(140, 5);
	$pdf->setFontSpacing($spacing = '');
	$pdf->setColor('text', 25, 25, 25);
	$pdf->SetFont($fontname1, '', 9);
	$pdf->Cell(0, 10, "Overeenkomst: O-{$postcode}{$huisnummer}-310", '', 1, 'L');

	$pdf->SetXY(7, 20);
	$graph_light = array('width' => 0.00001, 'cap' => 'butt', 'join' => 'round', 'solid' => '0,0', 'color' => array(25, 25, 25));
	$pdf->Line(7, 20, 203, 20, $graph_light);
	
	$pdf->SetXY(10, 26);
	$html = <<<EOD
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>8. Toelichting</b><br />
		<b>Begeleiding</b><br />
		<br />
		De werkzaamheden zullen geheel zelfstandig door Hoppenbrouwers worden uitgevoerd waardoor begeleiding niet noodzakelijk is. Echter dient er tijdens alle werkzaamheden een verantwoordelijke van de opdrachtgever (telefonisch) bereikbaar te zijn.<br />
		<br />
		<b>Schakelen</b><br />
		<br />
		Sommige installatiedelen zullen spanningsloos geïnspecteerd moeten worden. Daarom geeft u Hoppenbrouwers middels deze overeenkomst tevens toestemming om te schakelen. Voorafgaand aan de inspectie worden de schakelmomenten met u besproken.<br />
		<br />
		<b>Werkzaamheden buiten normale werktijden</b><br />
		<br />
		Bij het inspecteren en onderhouden van de installaties kan het mogelijk zijn dat een installatie spanningsloos gemaakt dient te worden. ln deze overeenkomst is er vanuit gegaan dat de werkzaamheden in normale werkuren kan worden uitgevoerd. Wanneer er uitsluitend in het weekend geschakeld kan worden zal dit als meerwerk aan u worden doorbelast.<br />
		<br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>9. lnvestering</b><br />
		<br />
		<table cellspacing="0" cellpadding="2" style="width:650px">
			<tr>
				<td style="width:550px"><b>Bedrag van de eerste inspectie, tevens 0-meting.</b></td>
				<td style="width:100px">&euro; {$iex}</td>
			</tr>
			<tr>
				<td style="width:550px"><b>Jaarbedrag op basis van een looptijd van 4 jaar vanaf {$jaar}<br />(Prijspeil {$jaar}, exclusief 21% BTW)</b></td>
				<td style="width:100px">&euro; {$jaarbedrag}</td>
			</tr>
		</table><br />
		<br />
		<i>Vernoemde prijzen zijn incl. verbruiksmaterialen. Reistijd- en kilometervergoeding a &euro; 0,75 per km op basis van nacalculatie.<br />
		Prijs is op basis van gemiddeld 12 groepen per verdeelkast. Meer groepen op basis van nacalculatie.</i><br />
		<br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>10. Technisch dossier</b><br />
		Wanneer u een onderhoudscontract heeft, verzorgd Hoppenbrouwers een back up van uw technisch dossier. Dit houd in dat wij al uw digitale rapportages en installatie gegevens voor u bewaren en u ten alle tijden kunnen aanleveren.<br />
		<br />

		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>11. Specifieke uitsluitingen</b><br />
		ln dit supplement zijn onderstaande punten uitgesloten:<br />
		&bull; inspecteren van elektrische gereedschappen en/of besturingsprocessen;<br />
		&bull; inspecteren van besturingskasten voor de regelinstallatie;<br />
		&bull; repareren en vervangen van componenten, accu’s, lichtbronnen en dergelijke;<br />
		&bull; controleren van aandraaimomenten;<br />
		&bull; alle installatiedelen boven 2,5 meter;<br />
		&bull; alle niet toegankelijke installatiedelen;<br />
		&bull; controle op brandwerende doorvoeringen;<br />
		&bull; uitvoeren en implementeren van het aanwijzingsbeleid, zoals omschreven in artikel 3.5 van de Arbo-wet;<br />
		&bull; testen van functionele- en mechanische werking van installatieonderdelen zoals onder andere; zonweringsinstallaties en elektrisch bedienbare poorten en deuren.<br />
		<br />
EOD;
	$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

	$pdf->SetXY(10, 265);
	$pdf->Image(INSPECTIES_ASSETS_DIR . '/images/Blokjes.jpg', 10, 265, 120, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);

	$pdf->SetXY(10, 300);
	$pdf->Cell(0, 10, '', '', 1, 'L');

	$pdf->SetXY(10, 5);
	$pdf->Image(INSPECTIES_ASSETS_DIR . '/images/hoppenbrouwers.jpg', 10, 5, 70, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);
	$pdf->Image(INSPECTIES_ASSETS_DIR . '/images/nb.png', 180, 260, 15, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);

	$pdf->SetXY(10, 5);
	$pdf->Image(INSPECTIES_ASSETS_DIR . '/images/handtekening_anton.png', 20, 100, 40, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);

	$pdf->SetXY(140, 5);
	$pdf->setFontSpacing($spacing = '');
	$pdf->setColor('text', 25, 25, 25);
	$pdf->SetFont($fontname1, '', 9);
	$pdf->Cell(0, 10, "Overeenkomst: O-{$postcode}{$huisnummer}-310", '', 1, 'L');

	$pdf->SetXY(7, 20);
	$graph_light = array('width' => 0.00001, 'cap' => 'butt', 'join' => 'round', 'solid' => '0,0', 'color' => array(25, 25, 25));
	$pdf->Line(7, 20, 203, 20, $graph_light);
	
	$pdf->SetXY(10, 26);
	$html = <<<EOD
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>12. Algemene voorwaarden</b><br />
		Op alle onderhouds- en serviceovereenkomsten van Hoppenbrouwers zijn naast onderstaande voorwaarden ook de Algemene Leveringsvoorwaarden lnstallerende Bedrijven (ALlB 2007) van toepassing. <br />
		&bull; Wanneer de omvang van de installatie gedurende de looptijd van de overeenkomst wijzigt, behoudt Hoppenbrouwers elektrotechniek b.v. zich het recht voor om de prijs van de afgesloten overeenkomst aan te passen. U ontvangt hiervoor een nieuwe overeenkomst;<br />
		&bull; Prijzen zullen jaarlijks geïndexeerd worden conform CBS;<br />
		&bull; Deze aanbieding blijft tot één maand na datum geldig;<br />
		&bull; Facturering zal geschieden 100% bij opdracht en in de opvolgende jaren in januari;<br />
		&bull; Eenvoudige telefonische ondersteuning valt binnen het contract. Echter wanneer we ter plaatse ondersteuning moeten verlenen wordt dit gefactureerd;<br />
		&bull; Het orderbedrag is exclusief het oplossen van storingen en aanpassingen, dit zal worden gezien als meerwerk.<br />
		<br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>13. Akkoordverklaring</b><br />
		Na akkoord uwerzijds gelieve deze onderhoudsovereenkomst, getekend ter bevestiging, aan ons te retourneren.<br />
		<br />
				<table cellspacing="0" cellpadding="2" style="width:700px">
			<tr>
				<td style="width:350px"><b>Hoppenbrouwers Techniek BV</b></td>
				<td style="width:350px"><b>{$bedrijfsnaam}</b></td>
			</tr>
			<tr>
				<td style="width:350px">Anton van Mensfoort</td>
				<td style="width:350px">{$naam}</td>
			</tr>
			<tr>
				<td style="width:350px">Afdeling lnspectie en onderhoud</td>
				<td style="width:350px">Functie:</td>
			</tr>
			<tr>
				<td style="width:350px">&nbsp;</td>
				<td style="width:350px">Handtekening:</td>
			</tr>
			<tr>
				<td style="width:350px">&nbsp;</td>
				<td style="width:350px">&nbsp;</td>
			</tr>
			<tr>
				<td style="width:350px">&nbsp;</td>
				<td style="width:350px">&nbsp;</td>
			</tr>
			<tr>
				<td style="width:350px">&nbsp;</td>
				<td style="width:350px">&nbsp;</td>
			</tr>
			<tr>
				<td style="width:350px">&nbsp;</td>
				<td style="width:350px">&nbsp;</td>
			</tr>
			<tr>
				<td style="width:350px">&nbsp;</td>
				<td style="width:350px">Datum:</td>
			</tr>
			<tr>
				<td style="width:350px">&nbsp;</td>
				<td style="width:350px">(Eventueel firmastempel)</td>
			</tr>
EOD;
	$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

	$pdf->SetXY(10, 265);
	$pdf->Image(INSPECTIES_ASSETS_DIR . '/images/Blokjes.jpg', 10, 265, 120, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);

	$pdf->Output($path, "F");
}