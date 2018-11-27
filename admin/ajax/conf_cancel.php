<?php
	include_once('../../common.php');	
	
	$type = $_POST['type'];
	$no = $_POST['no'];

	if ($type==6){//취소 

	}else if($type==7){//교환
		$query = 'update tb_order set fd_status="9" where pk_no = "'.$no.'"';

	}else if($type==8){//반품
		$query = 'update tb_order set fd_status="10" where pk_no = "'.$no.'"';
	}
	echo $query;
	query_send_non_return($query);	

?>
