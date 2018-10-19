<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once("../../common.php");
	$arr = $_POST['arr'];	
	$type = $_POST['type'];	
	if($type == 'pm') $type = 'tb_product';
	else if($type == 'order') $type = 'tb_order'; 
	list_dell($arr,$type);



?>