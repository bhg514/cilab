<?php
	include_once('../common.php');	
	session_destroy();
	$pre_url = $_SERVER["HTTP_REFERER"];
	header("location:".$pre_url);
?>