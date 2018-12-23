<?php
	include_once('../common.php');	
	session_destroy();
	$pre_url = $_SERVER["HTTP_REFERER"];
	if($pre_url == "https://".$http_host."/mypage/info.php" || $pre_url=="https://".$http_host."/mypage/order.php"){
		header("Location: https://".$http_host."/index.php");
	}else{
		header("Location: ".$pre_url);			
	}	
	
?>