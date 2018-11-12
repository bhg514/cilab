<?php
include_once('../../make_zip.php');
$zip_name = $_GET['zip'];
$new_files = $_GET['new_file'];
$files = $_GET['file'];

$new_arr = explode("||", $new_files);
$origin_arr = explode("||", $files);


$zip = new DirectZip();
$zip->open($zip_name.'.zip');

for($i=0; $i<count($new_arr);$i++){
	$zip->addFile('../files/'.$new_arr[$i], $origin_arr[$i]);
}
$zip->close();
?>