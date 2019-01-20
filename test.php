<?php
require 'TCPDF/tcpdf.php';
require 'src/nen3140/pdfgen.php';

define('INSPECTIES_ASSETS_DIR', dirname(__FILE__) . '/assets');

Tlc\pdfgen(array('path' => dirname(__FILE__) . '/test.pdf'));