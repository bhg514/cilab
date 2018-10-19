<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once("../../common.php");
	$no = $_POST['no'];
	detail_order_status($no);		

	
?>