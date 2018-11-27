<?php
	include_once('../common.php');	

	$phone = $_POST['phone'];	
	$reason = $_POST['reason'];
	$no = $_POST['no'];
	$query = 'update tb_order set fd_del_hp = "'.$phone.'", fd_status_msg="'.$reason.'", fd_status="7" where pk_no = "'.$no.'"';
	echo $query;
	query_send_non_return($query);	

?>
