<?php
	include_once('../common.php');	
	if(!isset($_SESSION['user_id'])){
		echo "false";
	}else{
		$no = $_POST['no'];	
		$count = $_POST['count'];
		$option = $_POST['option'];
		$total = $_POST['total'];
		$user_id = $_SESSION['user_id'];
		$query = 'SELECT count(*) from tb_cart where fd_product_no = "'.$no.'" and fd_option = "'.$option.'" and fd_user_id = "'.$user_id.'"';

		$result = query_send($query);
		$re_count = mysqli_fetch_array($result);
		if($re_count[0] >0 ){
			$query = 'UPDATE tb_cart set fd_count = fd_count + '.$count.', fd_price = fd_price + '.$total.' where fd_product_no = "'.$no.'" and fd_option = "'.$option.'" and fd_user_id = "'.$user_id.'" ';
		}else{
			$query = 'INSERT INTO tb_cart (fd_user_id, fd_product_no, fd_option, fd_count, fd_price) VALUES ("'.$user_id.'", '.$no.', "'.$option.'", '.$count.', '.$total.')';
		}
		echo $query;
		query_send_non_return($query);

		
		//echo "true";
	}

?>
