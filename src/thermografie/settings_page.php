<?php namespace Nen;  //EDIT THE NAMESPACE

function add_submenu() {
  add_submenu_page(
    'inspecties', //DONT TOUCH THIS
    __("NEN3140", "tlc-events"),  //NAME OF THE SUBMENU PAGE
    __("NEN3140", "tlc-events"),  //NAME OF THE SUBMENU PAGE
    'manage_options',
    'nen3140',  //MAKE THIS UNIQUE
    'Nen\render_settings_page'  //EDIT THE CALLBACK NAMESPACE
  );
}

function render_settings_page() {

  if (isset($_POST["nen-single-box-price"])) { //YOU SHOULD EDIT THIS TO MATCH THE FORM INPUT FIELD NAME AND ID
    update_option("nen-single-box-price", $_POST["nen-single-box-price"]); //THE OPTION NAME MUST BE UNIQUE
  }

  //SAME AS ABOVE
  if (isset($_POST["nen-multi-box-price"])) {
    update_option("nen-multi-box-price", $_POST["nen-multi-box-price"]);
  }

  //SAME AS ABOVE
  if (isset($_POST["nen-reiskosten"])) {
    update_option("nen-reiskosten", $_POST["nen-reiskosten"]);
  }

  //SAME AS ABOVE
  if (isset($_POST["nen-admin-email"])) {
    update_option("nen-admin-email", $_POST["nen-admin-email"]);
  }

  //EDIT THE OPTIONS NAME
  $single_box_price = get_option('nen-single-box-price', 550);
  $multi_box_price = get_option("nen-multi-box-price", 325);
  $reiskosten = get_option("nen-reiskosten", 51.50);
  $admin_email = get_option('nen-admin-email', 'avmensfoort@hoppenbrouwers.nl');
  ?>

  <style>
    .inspecties-formulier tr td:first-child {
      width: 20em;
    }
  </style>

  <div class="wrap">
    <h2>NEN3140 instellingen</h2>
    <form action="#" method="post">
      <table class="form-table inspecties-formulier">
        <tr>
          <td><label for="nen-single-box-price">Prijs van 1 verdeelkast:</label></td>
          <td><input type="text" name="nen-single-box-price" id="nen-single-box-price" value="<?= $single_box_price ?>" class="regular-text"></td>
        </tr>

        <tr>
          <td><label for="nen-multi-box-price">Meerdere distributiekasten prijs:</label></td>
          <td><input type="text" name="nen-multi-box-price" id="nen-multi-box-price" value="<?= $multi_box_price ?>" class="regular-text"></td>
        </tr>

        <tr>
          <td><label for="nen-reiskosten">Reiskosten:</label></td>
          <td><input type="text" name="nen-reiskosten" id="nen-reiskosten" value="<?= $reiskosten ?>" class="regular-text"></td>
        </tr>

        <tr>
          <td><label for="nen-admin-email">Admin e-mailadres:</label></td>
          <td><input type="email" name="nen-admin-email" id="nen-admin-email" value="<?= $admin_email ?>" class="regular-text"></td>
        </tr>
	<tr>
	  <td>Shortcode:</td>
	  <td>[nen_form]</td>
	</tr>
      </table>

      <input type="submit" value="Opslaan" class="button-primary">
    </form>
  </div>

  <?php
}

add_action('admin_menu', 'Nen\add_submenu');  //EDIT THE CALLBACK NAMESPACE
