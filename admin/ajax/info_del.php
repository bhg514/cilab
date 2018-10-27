<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once("../../common.php");
	$no = $_POST['no'];	
	$type = $_POST['type'];	
	if($type == 'pm') $table = 'tb_product';
	else if($type == 'order') $table = 'tb_order';
	else if($type == 'notice') $table = 'tb_notice';
	else if($type == 'sw') $table = 'tb_sw';
	else if($type == 'contents') $table = 'tb_contents';

	else if($type == 'um') $table = 'tb_user';
	else if($type == 'am') $table = 'tb_admin';

	info_dell($no,$table);
	


?>