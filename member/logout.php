<?php
	include_once('../common.php');	
	session_destroy();
	$pre_url = $_SERVER["HTTP_REFERER"];
	if($pre_url == "http://localhost/mypage/info.php" || $pre_url=="http://localhost/mypage/order.php"){
		header("Location: http://localhost/index.php");
	}else{
		header("Location: ".$pre_url);			
	}	
	
?>