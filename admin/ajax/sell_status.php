<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once("../../common.php");
	$arr = $_POST['arr'];
	$type = $_POST['type'];
	arr_sell_status($arr,$type);
	
	

	echo 1;



?>