<?php namespace noodverlichting;  //EDIT THE NAMESPACE

function add_submenu() {
  add_submenu_page(
    'inspecties', //DONT TOUCH THIS
    __("Noodverlichting", "tlc-events"),  //NAME OF THE SUBMENU PAGE
    __("Noodverlichting", "tlc-events"),  //NAME OF THE SUBMENU PAGE
    'manage_options',
    'noodverlichting',  //MAKE THIS UNIQUE
    'noodverlichting\render_settings_page'  //EDIT THE CALLBACK NAMESPACE
  );
}

function render_settings_page() {

  if (isset($_POST["noodverlichting-single-box-price"])) { //YOU SHOULD EDIT THIS TO MATCH THE FORM INPUT FIELD NAME AND ID
    update_option("noodverlichting-single-box-price", $_POST["noodverlichting-single-box-price"]); //THE OPTION NAME MUST BE UNIQUE
  }

  //SAME AS ABOVE
  if (isset($_POST["noodverlichting-multi-box-price"])) {
    update_option("noodverlichting-multi-box-price", $_POST["noodverlichting-multi-box-price"]);
  }

  //SAME AS ABOVE
  if (isset($_POST["noodverlichting-reiskosten"])) {
    update_option("noodverlichting-reiskosten", $_POST["noodverlichting-reiskosten"]);
  }

  //SAME AS ABOVE
  if (isset($_POST["noodverlichting-admin-email"])) {
    update_option("noodverlichting-admin-email", $_POST["noodverlichting-admin-email"]);
  }

  //EDIT THE OPTIONS NAME
  $single_box_price = get_option('noodverlichting-single-box-price', 550);
  $multi_box_price = get_option("noodverlichting-multi-box-price", 325);
  $reiskosten = get_option("noodverlichting-reiskosten", 51.50);
  $admin_email = get_option('noodverlichting-admin-email', 'avmensfoort@hoppenbrouwers.nl');
  ?>

  <style>
    .inspecties-formulier tr td:first-child {
      width: 20em;
    }
  </style>

  <div class="wrap">
    <h2>Noodverlichting instellingen</h2>
    <form action="#" method="post">
      <table class="form-table inspecties-formulier">
        <tr>
          <td><label for="noodverlichting-single-box-price">Prijs van 1 armatuur:</label></td>
          <td><input type="text" name="noodverlichting-single-box-price" id="noodverlichting-single-box-price" value="<?= $single_box_price ?>" class="regular-text"></td>
        </tr>

        <tr>
          <td><label for="noodverlichting-multi-box-price">Prijs meerdere armaturen:</label></td>
          <td><input type="text" name="noodverlichting-multi-box-price" id="noodverlichting-multi-box-price" value="<?= $multi_box_price ?>" class="regular-text"></td>
        </tr>

        <tr>
          <td><label for="noodverlichting-reiskosten">Reiskosten:</label></td>
          <td><input type="text" name="noodverlichting-reiskosten" id="noodverlichting-reiskosten" value="<?= $reiskosten ?>" class="regular-text"></td>
        </tr>

        <tr>
          <td><label for="noodverlichting-admin-email">Admin e-mailadres:</label></td>
          <td><input type="email" name="noodverlichting-admin-email" id="noodverlichting-admin-email" value="<?= $admin_email ?>" class="regular-text"></td>
        </tr>
	<tr>
	  <td>Shortcode:</td>
	  <td>[noodverlichting]</td>
	</tr>
      </table>

      <input type="submit" value="Opslaan" class="button-primary">
    </form>
  </div>

  <?php
}

add_action('admin_menu', 'noodverlichting\add_submenu');  //EDIT THE CALLBACK NAMESPACE
