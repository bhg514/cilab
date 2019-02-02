<?php
	include_once('../../common.php');	
	
	$arr = $_POST['arr'];

	$query = 'insert into tb_del_fee (fd_start, fd_end, fd_fee) value ';
	foreach ($arr as $data) {
	    $query .= '('.$data[0].','.$data[1].','.$data[2].'),';
	}
	$query = substr($query, 0,-1);
	query_send_non_return("delete from tb_del_fee");	
	query_send_non_return($query);	

?>
