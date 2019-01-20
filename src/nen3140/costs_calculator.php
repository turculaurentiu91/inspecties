<?php namespace Nen;

function number($string)
{
    return number_format($string, 2, ',', '.');
}

function costs_calc($verdeelkast) {
  $singe_box_price = get_option('nen-single-box-price', 550);
  $multi_box_price = get_option('nen-multi-box-price', 325);
  $reiskosten = get_option('nen-reiskosten', 51.50);

  $kosten_verdeelkast = $verdeelkast == 1 ? 550 : 325;
	$totaal_excl = ($kosten_verdeelkast * $verdeelkast) + $reiskosten;
	$iex = number($totaal_excl);
  $jaarbedrag = number($totaal_excl/4);
  
  return(array(
    'iex' => $iex,
    'jaarbedrag' => $jaarbedrag,
  ));
}