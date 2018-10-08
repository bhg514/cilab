<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once('../common.php');	
	$input_id = $_POST['input_id'];
	$input_pw = $_POST['input_pw'];
	echo $input_id;
	
	$chk_info = get_user_info_to_id($input_id);
	if (!$chk_info['fd_id'] || !check_password($input_pw, $chk_info['fd_pw'])) {
	    echo 0;
	}else{
		echo 1;
	}

?>
