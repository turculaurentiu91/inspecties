<?php
/*
Plugin Name: Inspecties
Plugin URI: https://www.fiverr.com/laurentiuturcu
Author URI: https://www.fiverr.com/laurentiuturcu
Version: 1.0.0
Author: Turcu Laurentiu
Text Domain: inspecties
*/

define('INSPECTIES_ASSETS_URL', plugin_dir_url(__FILE__) . '/assets');
define('INSPECTIES_ASSETS_DIR', dirname(__FILE__) . '/assets');

require_once('settings_menu.php');
require_once('TCPDF/tcpdf.php');

register_activation_hook(__FILE__, 'Inspecties\activation_hook');

// --HERE YOU SHOULD ADD ANY SUB DIRECTORY MAIN FILE
require_once('src/nen3140/nen3140.php');