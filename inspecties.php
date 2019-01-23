<?php
/*
Plugin Name: Inspectie tools
Plugin URI: https://www.hoppenbrouwerstechniek.nl
Author URI: https://www.hoppenbrouwerstechniek.nl
Version: 1.0.0
Author: Marnick van den Brand
Text Domain: Alle inspectie tools
*/

define('INSPECTIES_ASSETS_URL', plugin_dir_url(__FILE__) . '/assets');
define('INSPECTIES_ASSETS_DIR', dirname(__FILE__) . '/assets');

require_once('settings_menu.php');
require_once('TCPDF/tcpdf.php');
require_once('activation_hook.php');

register_activation_hook(__FILE__, 'Inspecties\activation_hook');

// --HERE YOU SHOULD ADD ANY SUB DIRECTORY MAIN FILE
require_once('src/nen3140/nen3140.php');
require_once('src/noodverlichting/noodverlichting.php');