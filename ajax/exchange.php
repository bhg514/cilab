<?php
	include_once('../common.php');	

	$phone = $_POST['phone'];	
	$reason = $_POST['reason'];
	$no = $_POST['no'];
	$modal_type = $_POST['modal_type'];
	if($modal_type == "exchange"){
		$type_num = "7";

	}elseif ($modal_type == "refund") {
		$type_num = "8";
	}
	$query = 'update tb_order set fd_pre_status=fd_status where pk_no = "'.$no.'"';
	query_send_non_return($query);	
	$query = 'update tb_order set fd_del_hp = "'.$phone.'", fd_status_msg="'.$reason.'", fd_status="'.$type_num.'" where pk_no = "'.$no.'"';
	query_send_non_return($query);	

?>
