<?php namespace noodverlichting;  //EDIT THE NAMESPACE

function number($string)
{
    return number_format($string, 2, ',', '.');
}


// Here you make any calculations you need to do n order to render the pdf document
function costs_calc($armaturen) {
	
	if ($armaturen < 31) {
		$kosten_armaturen = 17;
	} elseif ($armaturen < 81) {
		$kosten_armaturen = 15;
	} elseif ($armaturen > 80) {
		$kosten_armaturen = 13;
		};
	$reiskosten = get_option('noodverlichting-reiskosten', 51.50);

	$totaal_excl = ($kosten_armaturen * $armaturen) + $reiskosten;
	$iex = number($totaal_excl);
	$jaarbedrag = number($totaal_excl/4);
  
	return(array(
    'iex' => $iex,
    'jaarbedrag' => $jaarbedrag,
  ));
}