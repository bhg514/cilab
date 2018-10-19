<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once("../../common.php");
	$invoice_arr = $_POST['invoice_arr'];
	$no_arr = $_POST['no_arr'];
	
	invoice_update($invoice_arr,$no_arr);
?>