<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once('../common.php');

	try{
		$infos = $_POST['infos'];
		$info_arr = json_decode($infos, true);
		$total_price = $_POST['total_price'];
		$del_fee = $_POST['del_fee'];

		$order_type = $_POST['order_type'];

		/*$no = $_POST['no'];
		$product_name = $_POST['product_name'];
		$product_option = $_POST['product_option'];
		$product_count = $_POST['product_count'];
		$del_fee = $_POST['del_fee'];*/


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
		$user_id = $_SESSION['user_id'];
		$imp_uid = $_POST['imp_uid'];
		$merchant_uid = $_POST['merchant_uid'];
		$date = date("Y-m-d");
		$date_2 = date("ymd");
		$order_number = "(select case when count(fk_order_number)=0 then '".$date_2."001' else CAST(fk_order_number AS UNSIGNED)+1 end as a from tb_order a where fd_date='".$date."' order by pk_no desc limit 1)";


		$query_order = "INSERT into tb_order (fk_order_number, fd_date, fd_product_count, fd_order_id, fd_order_hp, fd_order_name, fd_order_mail, fd_del_name, fd_del_zip, fd_del_address1, fd_del_address2,fd_del_address3, fd_del_address4, fd_del_hp, fd_price, fd_del_fee, fd_imp_uid, fd_merchant_uid) VALUES(".$order_number.",'".$date."',".count($info_arr['id']).",'".$user_id."', '".$order_hp."', '".$order_name."', '".$order_mail."', '".$del_name."', '".$del_zip."', '".$del_addr1."', '".$del_addr2."', '".$del_addr3."', '".$del_addr4."', '".$del_hp."', '".$total_price."', '".$del_fee."', '".$imp_uid."', '".$merchant_uid."')";
		query_send_non_return($query_order);

		$last_uid = insert_id();


		$query_detail = "INSERT into tb_order_detail (fk_order_number, fk_product_no, fd_price, fd_product_name, fd_option, fd_count) VALUES";
		$id_str="";
		for($i=0; $i<count($info_arr['id']); $i++){
			$id_str = $id_str.','.$info_arr['id'][$i];
			$query_detail .= "(".$last_uid.", '".$info_arr['product_no'][$i]."', '".str_replace(',','',$info_arr['price'][$i])."' , '".$info_arr['name'][$i]."' ,'".$info_arr['option'][$i]."' ,".$info_arr['count'][$i]." ),";

		$query = 'UPDATE tb_product SET fd_stock=fd_stock-1 WHERE pk_no='.$info_arr['product_no'][$i];
		//query_send_non_return($query);
		}



		query_send_non_return(substr($query_detail,0,-1));

		if($order_type == 'cart'){
			$query = 'DELETE from tb_cart where pk_no in ('.substr($id_str,1).')';
			query_send_non_return($query);
		}

	}catch(Exception $e){
		alert("Error, Error description: ".$e,'#');
	}
	include_once('send_mail.php');
	header("Location:store_complete.php");
?>