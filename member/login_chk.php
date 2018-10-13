<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once('../common.php');	
	$input_id = $_POST["id"]; 
	$input_pw = $_POST["pw"]; 
	$chk_info = get_all_info_to_id($input_id);	
	if (!$chk_info['fd_id'] || !check_password($input_pw, $chk_info['fd_pw'])) {
		alert("틀림","http://".$http_host."/member/login.php");	    
	}else{		
		$_SESSION['user_id'] = $chk_info['fd_id'];
		$_SESSION['user_name'] = $chk_info['fd_name'];
		$_SESSION['user_type'] = $chk_info['fd_type'];
		$pre_url = $_SESSION['pre_url'];
		if($_SESSION['user_type']=='a'){
			header("Location: http://".$http_host."/admin/pm/list.php");

		}else{
			if($pre_url !="http://".$http_host."/member/change_pw.php" )	{
				header("Location: ".$pre_url);
			}else{
				header("Location: http://".$http_host."/");
			}
		}
		
		
	}

?>
