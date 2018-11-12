<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once('../common.php');
	try{
		$no = $_POST['no'];
		$price = $_POST['price'];
		$del_fee = $_POST['del_fee'];
		$order_name = $_POST['order_name'];
		$order_hp = $_POST['order_hp'];
		$order_mail = $_POST['order_mail'];
		$del_name = $_POST['del_name'];
		$del_zip = $_POST['mb_zip'];
		$del_addr1 = $_POST['mb_addr1'];
		$del_addr2 = $_POST['mb_addr2'];
		$del_hp = $_POST['del_hp'];
		$comment = $_POST['comment_sel'];
		$user_id = $_SESSION['user_id'];
		if ($comment=="직접입력") $comment = $_POST['comment_input'];
		$date = date("Y-m-d");
		$date_2 = date("ymd");
		$query = "INSERT into tb_order (fk_order_number, fd_date, fd_product_no, fd_order_id, fd_order_hp, fd_order_name, fd_order_mail, fd_del_name, fd_del_zip, fd_del_address1, fd_del_address2, fd_del_hp, fd_del_comment, fd_price, fd_del_fee) VALUES((select ifnull(CAST(fk_order_number AS UNSIGNED)+1,'".$date_2."001') from tb_order a where fd_date='".$date."' order by pk_no desc limit 1),'".$date."', ".$no.", '".$user_id."', '".$order_hp."', '".$order_name."', '".$order_mail."', '".$del_name."', '".$del_zip."', '".$del_addr1."', '".$del_addr2."', '".$del_hp."', '".$comment."', '".$price."', '".$del_fee."')";
		
		query_send_non_return($query);

	}catch(Exception $e){
		alert("에러 발생, 에러 원인 : ".$e,'#');
	}
	header("Location:store_complete.php");
?>