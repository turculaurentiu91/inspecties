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
require_once('src/nen3140/nen3140.php');