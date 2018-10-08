<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once('../common.php');	
	$input_id = $_POST["id"]; 
	$input_pw = $_POST["pw"]; 
	$chk_info = get_user_info_to_id($input_id);	
	if (!$chk_info['fd_id'] || !check_password($input_pw, $chk_info['fd_pw'])) {
		alert("틀림","http://localhost/member/login.php");	    
	}else{
		$_SESSION['user_id'] = $chk_info['fd_id'];
		$_SESSION['user_name'] = $chk_info['fd_name'];
		$pre_url = $_SESSION['pre_url'];		
		header("Location: ".$pre_url);				
		
	}

?>
