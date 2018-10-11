<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once('../common.php');	
	$id = $_SESSION['user_id'];
	$input_pw = $_POST["input_pw"]; 

	$chk_info = get_user_info_to_id($id);	
	if (!$chk_info['fd_id'] || !check_password($input_pw, $chk_info['fd_pw'])) {
		alert("틀림","http://".$http_host."/mypage/user_chk.php");	    
	}else{
		$_SESSION['user_chk']="1";
		header("Location: http://".$http_host."/mypage/info.php");		
	}


?>