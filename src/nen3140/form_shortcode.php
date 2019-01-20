<?php namespace Nen;  //EDIT THE NAMESPACE

function register_shortcode() {
  add_shortcode(
    'nen_form',   // the sortcode name
    '\Nen\render_form'  //the callback namespace
  );
}

function file_path($postcode, $huisnummer) {
  return WP_CONTENT_DIR . '/uploads/inspecties/' . $postcode . '-' . $huisnummer . '.pdf'; 
}

function render_form() {
  ob_start();

  if (isset($_POST['email'])) {
    require_once('pdfgen.php');
    require_once('costs_calculator.php');
    require_once('email_client.php');
    require_once('email_admin.php');

    extract($_POST);
    extract(costs_calc($verdeelkast));

    pdfgen([
      'path' => file_path($postcode, $huisnummer),
      'postcode' => $postcode,
      'huisnummer' => $huisnummer,
      'bedrijfsnaam' => $bedrijfsnaam,
      'adres' => $adres,
      'woonplaats' => $woonplaats,
      'naam' => $naam,
      'telefoon' => $telefoon,
      'email' => $email,
      'jaar' => date('Y'),
      'verdeelkast' => $verdeelkast,
      'jaarbedrag' => $jaarbedrag,
      'iex' => $iex,
    ]);
    email_client($_POST);
    email_admin($_POST);
    unlink(file_path($postcode, $huisnummer));

    echo '<div class="inspecties-success">We hebben je zojuist een e-mail gestuurd met de aanbieding.</div>';
  }

  ?>

  <style>
    .inspecties-success {
      background-color: green;
      padding: 20px 40px;
      margin-bottom: 100px;
    }
  </style>

  <form action="#" method="POST">

    <h3>Uw situatie</h3>

    <label for="verdeelkast">Aantal verdeelkasten:<label>
    <input type="number" name="verdeelkast" id="verdeelkast" min="1" required>
  

    <h3>Uw gegevens</h3>

    <label for="bedrijfsnaam">Bedrijfsnaam:</label>
    <input type="text" id="bedrijfsnaam" name="bedrijfsnaam" required>

    <label for="naam">Uw naam:</label>
    <input type="text" id="naam" name="naam" required>

    <label for="adres">Adres:</label>
    <input type="text" name="adres" id="adres" required>

    <label for="huisnummer">Huisnummer:</label>
    <input type="text" name="huisnummer" id="huisnummer" required>

    <label for="postcode">Postcode:</label>
    <input type="text" name="postcode" id="postcode" required minlength="6">

    <label for="woonplaats">Plaatsnaam:</label>
    <input type="text" name="woonplaats" id="woonplaats" required>

    <label for="telefoon">Telefoonnummer:</label>
    <input type="tel" name="telefoon" id="telefoon" required>

    <label for="email">E-mailadres:</label>
    <input type="email" name="email" id="email" required>

    <input type="submit" value="Verzenden">

  </form>

  <?php
  $htmlData = ob_get_contents();
  ob_end_clean();
  return $htmlData;
}

\add_action('init', 'Nen\register_shortcode');  //definetly edit callback namespace
