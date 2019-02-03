<?php
	include_once('../common.php');	

	$no = $_POST['no'];	
	$count = $_POST['count'];
	$option = $_POST['option'];
	$total = $_POST['total'];
	$user_id = $_SESSION['user_id'];

	$query = 'INSERT INTO tb_cart (fd_user_id, fd_product_no, fd_option, fd_count, fd_total) VALUES ("'.$user_id.'", '.$no.', "'.$option.'", '.$count.', '.$total.')';
	echo $query;
	query_send_non_return($query);

?>
