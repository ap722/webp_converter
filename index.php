<?php



require_once('webp.php');

$filename = isset($_REQUEST['f']) ? $_REQUEST['f'] : die('filename not set');

echo new Webp($filename);