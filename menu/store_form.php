<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once('../common.php');
	try{
		$no = $_POST['no'];
		$price = $_POST['price'];
		$product_name = $_POST['product_name'];
		$product_option = $_POST['product_option'];
		$product_count = $_POST['product_count'];
		$del_fee = $_POST['del_fee'];
		$order_name = $_POST['order_name'];
		$order_hp = $_POST['order_hp'];
		$order_mail = $_POST['order_mail'];
		$del_name = $_POST['del_name'];
		$del_zip = $_POST['mb_zip'];
		$del_addr1 = $_POST['mb_addr1'];
		$del_addr2 = $_POST['mb_addr2'];
		$del_addr3 = $_POST['mb_addr3'];
		$del_addr4 = $_POST['mb_addr4'];
		$del_hp = $_POST['del_hp'];
		$comment = $_POST['comment_sel'];
		$user_id = $_SESSION['user_id'];
		$imp_uid = $_POST['imp_uid'];
		$merchant_uid = $_POST['merchant_uid'];
		if ($comment=="직접입력") $comment = $_POST['comment_input'];
		$date = date("Y-m-d");
		$date_2 = date("ymd");
		$query = "INSERT into tb_order (fk_order_number, fd_date, fd_product_no, fd_product_name, fd_product_option, fd_product_count, fd_order_id, fd_order_hp, fd_order_name, fd_order_mail, fd_del_name, fd_del_zip, fd_del_address1, fd_del_address2,fd_del_address3, fd_del_address4, fd_del_hp, fd_del_comment, fd_price, fd_del_fee, fd_imp_uid, fd_merchant_uid) VALUES((select case when count(fk_order_number)=0 then '".$date_2."001' else CAST(fk_order_number AS UNSIGNED)+1 end as a from tb_order a where fd_date='".$date."' order by pk_no desc limit 1),'".$date."', ".$no.",'".$product_name."' ,'".$product_option."' ,".$product_count." ,'".$user_id."', '".$order_hp."', '".$order_name."', '".$order_mail."', '".$del_name."', '".$del_zip."', '".$del_addr1."', '".$del_addr2."', '".$del_addr3."', '".$del_addr4."', '".$del_hp."', '".$comment."', '".$price."', '".$del_fee."', '".$imp_uid."', '".$merchant_uid."')";
		
		query_send_non_return($query);
		$query = 'UPDATE tb_product SET fd_stock=fd_stock-1 WHERE pk_no='.$no;
		query_send_non_return($query);

	}catch(Exception $e){
		alert("에러 발생, 에러 원인 : ".$e,'#');
	}
	header("Location:store_complete.php");
?>