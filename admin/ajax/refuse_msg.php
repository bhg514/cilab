<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once('../../common.php');	
	try {
		$input_msg = $_POST['input_msg'];
		$no = $_POST['no'];

		refuse_msg($no, $input_msg);	
	} catch (Exception $e) {
	    alert('잠시 후 다시 시도해주세요.','#');
	}	

?>