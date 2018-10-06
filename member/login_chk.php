<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once('../common.php');	
	$input_id = filter_input(INPUT_POST, "input_id"); 
	$input_pw = filter_input(INPUT_POST, "input_pw"); 
	$chk_info = get_id_pw($input_id);

	if (!$chk_info['fd_id'] || !check_password($input_pw, $chk_info['fd_pw'])) {

		alert("틀림","http://localhost/member/login.php");	    
	}else{
		$_SESSION['user_id'] = $chk_info['fd_id'];
		$_SESSION['user_name'] = $chk_info['fd_name'];
		$pre_url = $_SESSION['pre_url'];
		if($pre_url == "http://localhost/register/agree.php" || $pre_url=="http://localhost/member/login.php"){
			header("location:http://localhost/index.php");
		}else{
			header("location:".$pre_url);	
		}
		
	}

?>
