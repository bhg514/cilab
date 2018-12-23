<?php
	include_once('../common.php');	

	$no = $_POST['no'];	
	$query = 'update tb_order set fd_status=5 where pk_no='.$no;	
	query_send_non_return($query);	

?>
