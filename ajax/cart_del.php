<?php
	include_once('../common.php');	

	$no = $_POST['no'];	
	$query = 'DELETE from tb_cart where pk_no in ('.$no.')';
	query_send_non_return($query);

?>
