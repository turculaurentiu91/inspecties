<?php namespace noodverlichting; //EDIT THE NAMESPACE


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

	 if ($type == OHO) {
		 $titel = "Onderhoudsovereenkomst";
		 $pagina1 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>4. Uitgangspunten overeenkomst</b><br />
Dit supplement is gebaseerd op het jaarlijks onderhouden van de noodverlichtings- en vluchtwegsignaleringsinstallatie.<br />
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>5. Frequentie</b><br />
De noodverlichtings- en vluchtwegsignaleringsinstallatie zal éénmaal per jaar worden gecontroleerd op juiste werking en onderhouden zoals omschreven.<br />
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>6. lngangstijd / looptijd</b><br />
Deze overeenkomst gaat in op 1 januari {$jaar} en heeft een looptijd van één jaar. Deze overeenkomst zal stilzwijgend verlengd worden met eenzelfde periode.";
		 $pagina2 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>7. Werkzaamheden</b><br />
De controle wordt uitgevoerd volgens de onderstaande functionele punten.<br />
<br />
<b>Jaarlijkse controle en onderhoud</b><br />
&bull; opstellen armaturenlijst;<br />
&bull; het aanbrengen en jaarlijks controleren van de codering(nummering);<br />
&bull; jaarlijks vervangen van de lichtbronnen die continu branden als vluchtwegsignalering; indien de noodverlichtingsarmaturen voorzien zijn van led-lichtbronnen, zullen deze <b>niet</b> preventief vervangen worden in verband met de levensduur van deze led-lichtbronnen;<br />
&bull; testen autonomietijd van de armaturen die geen zelftestfunctie hebben;<br />
&bull; uitlezen van de resultaten van de automatische testen die door de armaturen zelf worden gedaan;<br />
&bull; visuele controle van de armaturen;<br />
&bull; een functionele test waarbij zal worden nagegaan of de armaturen functioneren bij een netspanningsonderbreking;<br />
&bull; rapportage van constateringen;<br />
&bull; bijhouden logboek.<br />
<br />
<i>Het vervangen van lichtbronnen in gecombineerde- danwel niet permantbrandende- armaturen valt buiten het jaarlijks onderhoud.</i><br />
<br />
<b>Vierjaarlijks onderhoud</b><br />
&bull; vierjaarlijks vervangen van alle lichtbronnen in noodverlichtingsarmaturen;<br />
&bull; vierjaarlijks vervangen van de accu’s in decentrale armaturen.<br />
<br />
<b>Accu’s</b><br />
Bij het afsluiten van deze overeenkomst is onbekend wanneer de aanwezige accu’s inbedrijf zijn gesteld. De technische levensduur van accu’s is na 4 jaar bereikt wat betekend dat deze in de komende  jaren preventief vervangen dienen te worden. Wanneer geconstateerd wordt dat de accu’s hun technische levensduur hebben bereikt wordt het vervangen op <u>offertebasis</u> aangeboden.<br />
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>8. Toelichting</b><br />
Lichtbronnen die continu branden ten behoeve van de vluchtwegsignalering worden jaarlijks vervangen in verband met de levensduur (10.000 uur) van de lichtbron. Wij adviseren de overige lichtbronnen en accu’s in decentrale armaturen vierjaarlijks te vervangen.<br />
<br />
<b>Hoogwerker</b><br />
Voor het vervangen van accu’s tijdens het vierjaarlijks onderhoud in armaturen welke op hoogte hangen, zal daar waar nodig is een hoogwerker of stijger worden ingezet. Het gebruik van dit materieel is niet in deze overeenkomst meegenomen. Wanneer blijkt dat er tijdens het onderhoud hoogwerkers en/of stijgers benodigd zijn, wordt dit in overleg als meerwerk doorbelast.<br />
<br />
<b>Oplossen van gebreken</b><br />
Gebreken voortvloeiend uit het onderhoud worden in overleg direct voor u hersteld. Mochten de constateringen niet direct te verhelpen zijn dan ontvangt u een passende offerte. Kosten voor herstel zijn niet in deze overeenkomst inbegrepen.<br />
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>9. lnvestering</b><br />
<br />
<table cellspacing=\"0\" cellpadding=\"2\" style=\"width:650px\">
	<tr>
		<td style=\"width:550px\"><b>Jaarbedrag op basis van een looptijd van 1 jaar vanaf {$jaar}<br />(Prijspeil {$jaar}, exclusief 21% BTW)</b></td>
		<td style=\"width:100px\">&euro; {$iex}</td>
	</tr>
</table><br />
<br />
<i>*Vernoemde prijzen zijn incl. verbruiksmaterialen. Reistijd- en kilometervergoeding a &euro; 0,75 per km op basis van nacalculatie.</i><br />
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>10. Technisch dossier</b><br />
Wanneer u een onderhoudscontract heeft, verzorgd Hoppenbrouwers een back up van uw technisch dossier. Dit houd in dat wij al uw digitale rapportages en installatie gegevens voor u bewaren en u ten alle tijden kunnen aanleveren.<br />
<br />";
		 $pagina3 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>11. Specifieke uitsluitingen</b><br />
Het vervangen of controleren van de onderstaande zaken zijn in dit supplement zijn niet opgenomen:<br />
&bull; defecte voorschakelapparatuur;<br />
&bull; defecte noodverlichtingarmaturen;<br />
&bull; vervangen van accu’s in noodvoedingskasten;<br />
&bull; niet functionerende accu’s, buiten het reguliere onderhoud;<br />
&bull; beschadigde reflectoren, pictogrammen en beschermingsglazen;<br />
&bull; het inspecteren van vluchtwegen zowel bouwtechnisch als civiel technisch.<br />
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>12. Algemene voorwaarden</b><br />
Op alle onderhouds- en serviceovereenkomsten van Hoppenbrouwers zijn naast onderstaande voorwaarden ook de Algemene Leveringsvoorwaarden lnstallerende Bedrijven (ALlB 2007) van toepassing. Is de opdrachtgever consument, dan zijn van toepassing de Algemene Voorwaarden voor Installatiewerk voor Consumenten (AVIC). Beide Algemene Voorwaarden liggen bij ons ter inzage en worden op uw verzoek direct kostenloos toegezonden.<br />
&bull; Wanneer de omvang van de installatie gedurende de looptijd van de overeenkomst wijzigt, behoudt Hoppenbrouwers zich het recht voor om de prijs van de afgesloten overeenkomst aan te passen. U ontvangt hiervoor een nieuwe overeenkomst;<br />
&bull; Prijzen zullen jaarlijks geïndexeerd worden conform CBS;<br />
&bull; Deze aanbieding blijft tot één maand na datum geldig;<br />
&bull; Facturering zal geschieden 100% bij opdracht en in de opvolgende jaren in januari;<br />
&bull; Eenvoudige telefonische ondersteuning valt binnen het contract. Echter wanneer we ter plaatse ondersteuning moeten verlenen wordt dit gefactureerd;<br />
&bull; Het orderbedrag is exclusief het oplossen van storingen en aanpassingen, dit zal worden gezien als meerwerk.<br />
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>13. Akkoordverklaring</b><br />
Na akkoord uwerzijds gelieve deze onderhoudsovereenkomst, getekend ter bevestiging, aan ons te retourneren.<br />
<br />
		<table cellspacing=\"0\" cellpadding=\"2\" style=\"width:700px\">
	<tr>
		<td style=\"width:350px\"><b>Hoppenbrouwers Techniek BV</b></td>
		<td style=\"width:350px\"><b>{$bedrijfsnaam}</b></td>
	</tr>
	<tr>
		<td style=\"width:350px\">{$hopnaam}</td>
		<td style=\"width:350px\">{$naam}</td>
	</tr>
	<tr>
		<td style=\"width:350px\">Afdeling lnspectie en onderhoud</td>
		<td style=\"width:350px\">Functie:</td>
	</tr>
	<tr>
		<td style=\"width:350px\">&nbsp;</td>
		<td style=\"width:350px\">Handtekening:</td>
	</tr>
	<tr>
		<td style=\"width:350px\">&nbsp;</td>
		<td style=\"width:350px\">&nbsp;</td>
	</tr>
	<tr>
		<td style=\"width:350px\">&nbsp;</td>
		<td style=\"width:350px\">&nbsp;</td>
	</tr>
	<tr>
		<td style=\"width:350px\">&nbsp;</td>
		<td style=\"width:350px\">&nbsp;</td>
	</tr>
	<tr>
		<td style=\"width:350px\">&nbsp;</td>
		<td style=\"width:350px\">&nbsp;</td>
	</tr>
	<tr>
		<td style=\"width:350px\">&nbsp;</td>
		<td style=\"width:350px\">Datum:</td>
	</tr>
	<tr>
		<td style=\"width:350px\">&nbsp;</td>
		<td style=\"width:350px\">(Eventueel firmastempel)</td>
	</tr>";
		 $handtekeninghoogte = "145";
		}
	else {
		 $titel = "Offerte eenmalig onderhoud";
		 $pagina1 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>4. Werkzaamheden</b><br />
De controle wordt uitgevoerd volgens de onderstaande functionele punten.<br />
<br />
&bull; opstellen armaturenlijst;<br />
&bull; het aanbrengen en jaarlijks controleren van de codering(nummering);<br />
&bull; jaarlijks vervangen van de lichtbronnen die continu branden als vluchtwegsignalering; indien de noodverlichtingsarmaturen voorzien zijn van led-lichtbronnen, zullen deze <b>niet</b> preventief vervangen worden in verband met de levensduur van deze led-lichtbronnen;<br />
&bull; testen autonomietijd van de armaturen die geen zelftestfunctie hebben;<br />
&bull; uitlezen van de resultaten van de automatische testen die door de armaturen zelf worden gedaan;<br />
&bull; visuele controle van de armaturen;<br />
&bull; een functionele test waarbij zal worden nagegaan of de armaturen functioneren bij een netspanningsonderbreking;<br />
&bull; rapportage van constateringen;<br />
&bull; bijhouden logboek.";
		 $pagina2 = "<b>Accu’s & geconstateerde gebreken</b><br />
Het is onbekend wanneer de aanwezige accu’s inbedrijf zijn gesteld. De technische levensduur van accu’s is na 4 jaar bereikt wat betekend dat deze in de komende jaren preventief vervangen dienen te worden. Wanneer geconstateerd wordt dat de accu’s hun technische levensduur hebben bereikt wordt het vervangen op <u>offertebasis</u> aangeboden na uitvoering van het onderhoud. Mochten de constateringen niet direct te verhelpen zijn dan ontvangt u eveneens een passende offerte.<br />
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>5. Toelichting</b><br />
Lichtbronnen die continu branden ten behoeve van de vluchtwegsignalering worden jaarlijks vervangen in verband met de levensduur (10.000 uur) van de lichtbron. Wij adviseren de overige lichtbronnen en accu’s in decentrale armaturen vierjaarlijks te vervangen.<br />
<br />
<b>Hoogwerker</b><br />
Voor het vervangen van accu’s tijdens het vierjaarlijks onderhoud in armaturen welke op hoogte hangen, zal daar waar nodig is een hoogwerker of stijger worden ingezet. Het gebruik van dit materieel is niet in deze overeenkomst meegenomen. Wanneer blijkt dat er tijdens het onderhoud hoogwerkers en/of stijgers benodigd zijn, wordt dit in overleg als meerwerk doorbelast.<br />
<br />
<b>Oplossen van gebreken</b><br />
Gebreken voortvloeiend uit het onderhoud worden in overleg direct voor u hersteld. Mochten de constateringen niet direct te verhelpen zijn dan ontvangt u een passende offerte. Kosten voor herstel zijn niet in deze overeenkomst inbegrepen.<br />
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>6. lnvestering</b><br />
<br />
<table cellspacing=\"0\" cellpadding=\"2\" style=\"width:650px\">
	<tr>
		<td style=\"width:550px\"><b>Eenmalig onderhoud van uw noodverlichting<br />(Prijspeil {$jaar}, exclusief 21% BTW)</b></td>
		<td style=\"width:100px\">&euro; {$iex}</td>
	</tr>
</table><br />
<br />
<i>*Vernoemde prijzen zijn incl. verbruiksmaterialen. Reistijd- en kilometervergoeding a &euro; 0,75 per km op basis van nacalculatie.</i><br />
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>7. Specifieke uitsluitingen</b><br />
Het vervangen of controleren van de onderstaande zaken zijn in dit supplement zijn niet opgenomen:<br />
&bull; defecte voorschakelapparatuur;<br />
&bull; defecte noodverlichtingarmaturen;<br />
&bull; vervangen van accu’s in noodvoedingskasten;<br />
&bull; niet functionerende accu’s, buiten het reguliere onderhoud;<br />
&bull; beschadigde reflectoren, pictogrammen en beschermingsglazen;<br />
&bull; het inspecteren van vluchtwegen zowel bouwtechnisch als civiel technisch.";
		 $pagina3 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>8. Akkoordverklaring</b><br />
Na akkoord uwerzijds gelieve deze offerte, getekend ter bevestiging, aan ons te retourneren.<br />
<br />
		<table cellspacing=\"0\" cellpadding=\"2\" style=\"width:700px\">
	<tr>
		<td style=\"width:350px\"><b>Hoppenbrouwers Techniek BV</b></td>
		<td style=\"width:350px\"><b>{$bedrijfsnaam}</b></td>
	</tr>
	<tr>
		<td style=\"width:350px\">{$hopnaam}</td>
		<td style=\"width:350px\">{$naam}</td>
	</tr>
	<tr>
		<td style=\"width:350px\">Afdeling lnspectie en onderhoud</td>
		<td style=\"width:350px\">Functie:</td>
	</tr>
	<tr>
		<td style=\"width:350px\">&nbsp;</td>
		<td style=\"width:350px\">Handtekening:</td>
	</tr>
	<tr>
		<td style=\"width:350px\">&nbsp;</td>
		<td style=\"width:350px\">&nbsp;</td>
	</tr>
	<tr>
		<td style=\"width:350px\">&nbsp;</td>
		<td style=\"width:350px\">&nbsp;</td>
	</tr>
	<tr>
		<td style=\"width:350px\">&nbsp;</td>
		<td style=\"width:350px\">&nbsp;</td>
	</tr>
	<tr>
		<td style=\"width:350px\">&nbsp;</td>
		<td style=\"width:350px\">&nbsp;</td>
	</tr>
	<tr>
		<td style=\"width:350px\">&nbsp;</td>
		<td style=\"width:350px\">Datum:</td>
	</tr>
	<tr>
		<td style=\"width:350px\">&nbsp;</td>
		<td style=\"width:350px\">(Eventueel firmastempel)</td>
	</tr>";
		 $handtekeninghoogte = "55";
	 }

        $error_message = "";

        $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
        if (!preg_match($email_exp, $email)) {
            $error_message .= 'Het door u ingevulde e-mailadres is onjuist.<br />';
        }

        $string_exp = "/^[A-Za-z .'-]+$/";
        if (!preg_match($string_exp, $naam)) {
            $error_message .= 'De door u ingevulde naam is onjuist.<br />';
        }

        if (strlen($error_message) > 0) {
            died($error_message);
        }
		
		$types_counter = 1;
		if ($types_counter == 1) {

            // remove default header/footer
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf->SetMargins(10, 10, 20);

            // set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
                require_once(dirname(__FILE__) . '/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            // set font
            $pdf->SetFont('times', 'BI', 20);

            // add a page
            $pdf->AddPage();
	
	$pdf->Image('images/voorkant.jpg', 10, 90, 190, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);
	$pdf->Image('images/nb.png', 180, 260, 15, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);

            // header code start
            $pdf->SetXY(10, 5);
            $pdf->Image('images/hoppenbrouwers.jpg', 10, 5, 70, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);

            $pdf->setFontSpacing($spacing = '');
            $pdf->setColor('text', 25, 25, 25);
            $pdf->SetFont($fontname1, '', 9);

            $pdf->SetXY(10, 40);
            $html = <<<EOD
<font size="+15">{$titel}</font><br />
<font size="+10">Noodverlichting & Vluchtwegsignalering</font>
EOD;
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'C', true);
	
	$pdf->SetXY(72, 200);
	$html = <<<EOD
	<table frame="box" style="width:300px">
	<tr>
		<td style="width:75px">Projectnr.:</td>
		<td style="width:225px">O-{$postcode3}{$huisnummer3}-330</td>
	</tr>
	<tr>
		<td style="width:75px">&nbsp;</td>
		<td style="width:225px">{$bedrijfsnaam}</td>
	</tr>
	<tr>
		<td style="width:75px">&nbsp;</td>
		<td style="width:225px">{$adres3} {$huisnummer3}</td>
	</tr>
	<tr>
		<td style="width:75px">&nbsp;</td>
		<td style="width:225px">{$postcode3} {$woonplaats3}</td>
	</tr>
	</table>
EOD;
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    $pdf->SetXY(10, 265);
    $pdf->Image('images/Blokjes.jpg', 10, 265, 120, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);

    $pdf->SetXY(10, 300);
    $pdf->Cell(0, 10, '', '', 1, 'L');
	
            $pdf->SetXY(20, 5);
            $pdf->Image('images/hoppenbrouwers.jpg', 20, 5, 70, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);
			$pdf->Image('images/nb.png', 180, 260, 15, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);

            $pdf->SetXY(140, 5);
            $pdf->setFontSpacing($spacing = '');
            $pdf->setColor('text', 25, 25, 25);
            $pdf->SetFont($fontname1, '', 9);
            $pdf->Cell(0, 10, "Overeenkomst: O-{$postcode3}{$huisnummer3}-330", '', 1, 'L');

            $graph_light = array('width' => 0.00001, 'cap' => 'butt', 'join' => 'round', 'solid' => '0,0', 'color' => array(25, 25, 25));
            $pdf->Line(20, 20, 190, 20, $graph_light);

            $pdf->SetXY(20, 26);
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
		<td style="width:400px">: {$adres3} {$huisnummer3}</td>
	</tr>
	<tr>
		<td style="width:120px">Postcode</td>
		<td style="width:400px">: {$postcode3}</td>
	</tr>
	<tr>
		<td style="width:120px">Plaats</td>
		<td style="width:400px">: {$woonplaats3}</td>
	</tr>
	</table><br />
	<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>2. Motivatie</b><br />
Bij calamiteiten functioneert de stroomvoorziening vaak niet meer. Als het gaat om veiligheid speelt juist dan de noodverlichting een zeer belangrijke rol. Echter, het juist functioneren van een noodverlichtingsinstallatie kan slechts worden gewaarborgd als deze zich in een perfecte werkingsstaat bevindt. Daarom is een regelmatige controle dan ook noodzakelijk voor de goede werking tijdens spanningsuitval.<br />
<br />
<b>Waarom jaarlijks onderhoud door Hoppenbrouwers Techniek BV?</b><br />
&bull; U verhoogt de veiligheid in het gebouw.<br />
&bull; U stelt zeker dat uw noodverlichting écht werkt als het licht uitvalt.<br />
&bull; U verlengt de technische levensduur van de armaturen aanzienlijk.<br />
&bull; U waarborgt het vereiste lichtniveau op de vluchtroutes.<br />
&bull; U voldoet aan de wettelijke <b>zorgplicht</b>.<br />
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>3. Omschrijving installatie</b><br />
De noodverlichtings- en vluchtwegsignaleringsinstallatie welke is geïnstalleerd op bovengenoemde onderhoudslocatie. De installatie bestaat uit:<br />
<br />
<b>Aantal armaturen: {$armaturen}</b><br />
<br />
{$pagina1}
EOD;
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    $pdf->SetXY(20, 265);
    $pdf->Image('images/Blokjes.jpg', 20, 265, 120, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);

    }

    $pdf->SetXY(10, 300);
    $pdf->Cell(0, 10, '', '', 1, 'L');

	$pdf->SetXY(20, 5);
	$pdf->Image('images/hoppenbrouwers.jpg', 20, 5, 70, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);
	$pdf->Image('images/nb.png', 180, 260, 15, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);

		$pdf->SetXY(140, 5);
		$pdf->setFontSpacing($spacing = '');
		$pdf->setColor('text', 25, 25, 25);
		$pdf->SetFont($fontname1, '', 9);
		$pdf->Cell(0, 10, "Overeenkomst: O-{$postcode3}{$huisnummer3}-330", '', 1, 'L');

	$pdf->SetXY(7, 20);
	$graph_light = array('width' => 0.00001, 'cap' => 'butt', 'join' => 'round', 'solid' => '0,0', 'color' => array(25, 25, 25));
	$pdf->Line(20, 20, 190, 20, $graph_light);
	
$pdf->SetXY(20, 26);
$html = <<<EOD
{$pagina2}
EOD;
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    $pdf->SetXY(20, 265);
    $pdf->Image('images/Blokjes.jpg', 20, 265, 120, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);

    }

    $pdf->SetXY(10, 300);
    $pdf->Cell(0, 10, '', '', 1, 'L');

	$pdf->SetXY(20, 5);
	$pdf->Image('images/hoppenbrouwers.jpg', 20, 5, 70, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);
	$pdf->Image('images/nb.png', 180, 260, 15, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);

	$pdf->SetXY(20, 5);
	$pdf->Image($handtekening, 20, $handtekeninghoogte, 40, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);

		$pdf->SetXY(140, 5);
		$pdf->setFontSpacing($spacing = '');
		$pdf->setColor('text', 25, 25, 25);
		$pdf->SetFont($fontname1, '', 9);
		$pdf->Cell(0, 10, "Overeenkomst: O-{$postcode3}{$huisnummer3}-330", '', 1, 'L');

	$pdf->SetXY(7, 20);
	$graph_light = array('width' => 0.00001, 'cap' => 'butt', 'join' => 'round', 'solid' => '0,0', 'color' => array(25, 25, 25));
	$pdf->Line(20, 20, 190, 20, $graph_light);
	
$pdf->SetXY(20, 26);
$html = <<<EOD
{$pagina3}
EOD;
            $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
      //  }

    $pdf->SetXY(20, 265);
    $pdf->Image('images/Blokjes.jpg', 20, 265, 120, 'JPG', '', '', '', true, 300, '', false, false, 0, false, false, false);

	$pdf->Output($path, "F");
}