<?php

 /* data = file_get_contents('http://wp-admin.com.ua/nahodim-vse-kartinki-v-tekste/');
$images = array();
preg_match_all('/(img|src)=("|\')[^"\'>]+/i', $data, $media);
unset($data);
$data = preg_replace('/(img|src)("|\'|="|=\')(.*)/i', "$3", $media[0]);
 
foreach ($data as $url) {
    $info = pathinfo($url);
    if (isset($info['extension'])) {
        if (($info['extension'] == 'jpg') ||
                ($info['extension'] == 'jpeg') ||
                ($info['extension'] == 'gif') ||
                ($info['extension'] == 'png'))
            array_push($images, $url);
    }
}

foreach ($images as $key => $value) {
	$img = $value;
	if ( strpos($img, 'http://') === false) $img = 'http://wp-admin.com.ua' . $img;
	echo "<img src='" . $img . "'></img> <br />";

}


die(); */

require_once('webp.php');

$filename = isset($_REQUEST['f']) ? $_REQUEST['f'] : die('filename not set');

echo new Webp($filename);