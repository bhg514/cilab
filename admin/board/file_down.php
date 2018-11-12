<?php
$real_name = $_GET['file'];
$down_name = $_GET['name'];
if($real_name != null){
	$filepath .= "../files/".$real_name;                      
	$filesize = filesize($filepath);
	$path_parts = pathinfo($filepath);
	$filename = $path_parts['basename'];
	$extension = $path_parts['extension'];

	header("Pragma: public");
	header("Expires: 0");
	header("Content-Type: application/octet-stream");
	header("Content-Disposition: attachment; filename='$down_name'");
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: $filesize");

	ob_clean();
	flush();
	readfile($filepath);
}
?>



