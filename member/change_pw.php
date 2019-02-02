<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once('../common.php');	
	try{
		$new_pw = crypt($_POST['input_pw'],'');
		$pk_no = $_SESSION['pk_no'];
		$sql = "UPDATE tb_user set fd_pw='".$new_pw."' where pk_no='".$pk_no."'";
		query_send_non_return($sql);		
	}catch(Exception $e){
		alert("An error occurred while changing the secret number\nPlease try again later.","https://".$http_host."/member/find_pw_confirm_form.php");
	}
	alert("Changed successfully\nPlease login again.","httsp://".$http_host."/member/login.php");
?>