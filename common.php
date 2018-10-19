<?php
	@ob_start();
	header ( "content-type:text/html; charset=utf-8" );
	session_start();
	include_once('config/db_config.php'); 
	$mysqli = new mysqli($host, $user, $pw, $dbName);
	$http_host = $_SERVER['HTTP_HOST'];

	function query_send_non_return($query){
		global $mysqli;
		mysqli_query($mysqli, $query);
	}

	function query_send($query){
		global $mysqli;
		return mysqli_query($mysqli, $query);
	}

	function get_id($id){		
		$query = 'select fd_id from tb_user where fd_id = "'.$id.'"';
		$result = query_send($$query);
   		$id_count = mysqli_fetch_array($result);
		return $id_count[0];
	}

	function id_chk($id){		
		$query = 'select count(*) from (select fd_id from tb_admin where fd_id="'.$id.'" union select fd_id from tb_user where fd_id="'.$id.'") a';
		//$query = 'select count(*) from tb_user where fd_id="'.$id.'"';
		$result = query_send($query);
    	$id_count = mysqli_fetch_array($result);
    	return $id_count[0];
	}

	function get_user_info_to_id($id){		
		$query = 'select * from tb_user where fd_id = "'.$id.'"';
		$result = query_send($query);
   		$info = mysqli_fetch_array($result);
		return $info;
	}

	function get_all_info_to_id($id){
		$query = 'select * from (select fd_id, fd_pw, fd_type, fd_name from tb_admin where fd_id="'.$id.'" union select fd_id, fd_pw, fd_type ,fd_name from tb_user where fd_id="'.$id.'") a';
		$result = query_send($query);
		$info = mysqli_fetch_array($result);
		return $info;
	}

	function get_user_info_to_mail($mail){
		$query = 'select * from tb_user where fd_mail="'.$mail.'"';			
		$result = query_send($query);
		$info = mysqli_fetch_array($result);
		return $info;
	}

	function check_password($pw, $hash){
		if(crypt($pw , $hash) == $hash){
			return true;
		}else{
			return false;
		}
	}

	function alert($msg,$url){
		echo "<script>alert(\"".$msg."\");location.replace('".$url."');</script>";
	}	

	function while_get_production_list($start_num,$name,$category,$status){
		$start_num = ($start_num-1)*10;		
		$query = 'SELECT @ROWNUM := @ROWNUM + 1 AS row, p.* FROM tb_product p, (SELECT @ROWNUM := '.$start_num.') R where p.fd_name like "%'.$name.'%" and p.fd_category like "%'.$category.'%" and p.fd_status like "%'.$status.'%" order by pk_no limit '.$start_num.', 10 ';		

		$result = query_send($query);		
		return $result;
	}

	function arr_sell_status($arr,$type){
		$arr2str = implode(",", $arr);		
		if($type=="start"){
			$query = 'update tb_product set fd_status = "판매중" where pk_no in('.$arr2str.')';
		}else{
			$query = 'update tb_product set fd_status = "판매중지" where pk_no in('.$arr2str.')';
			
		}			
		query_send_non_return($query);		

	}

	function product_get_count($name,$category,$status){
		$query = 'select count(*) from tb_product where fd_name like "%'.$name.'%" and fd_category like "%'.$category.'%" and fd_status like "%'.$status.'%"';
		
		$result = query_send($query);
		$count = mysqli_fetch_array($result);

		return $count;

	}

	function list_dell($arr,$table){
		$arr2str = implode(',', $arr);
		$query = 'delete from '.$table.' where pk_no in ('.$arr2str.')';
		query_send_non_return($query);
		if($table=='tb_order'){
			$query = 'delete from tb_order_detail where fk_order_no in ('.$arr2str.')';			
			query_send_non_return($query);
		}
	}

	function product_info($no){
		$query = 'select * from tb_product where pk_no='.$no;
		$result = query_send($query);
		$info = mysqli_fetch_array($result);

		return $info;
	}

	function while_get_order_list($start_num,$order_number,$order_name,$order_no,$status){
		$start_num = ($start_num-1)*10;		
		if($order_no == null){
			$query = 'SELECT @ROWNUM := @ROWNUM + 1 AS row, o.* FROM tb_order o, (SELECT @ROWNUM := '.$start_num.') R where o.fk_order_number like "%'.$order_number.'%" and o.fd_order_name like "%'.$order_name.'%" and fd_status like "%'.$status.'%" order by pk_no limit '.$start_num.', 10 ';					
		}else{
			$query = 'SELECT @ROWNUM := @ROWNUM + 1 AS row, o.* FROM tb_order o, (SELECT @ROWNUM := '.$start_num.') R where o.pk_no in ('.$order_no.') order by pk_no limit '.$start_num.', 10';					
		}		
		$result = query_send($query);		
		return $result;
	}

	function order_get_count($order_number,$order_name,$order_no,$status){
		if($order_no == null){
			$query = 'select count(*) from tb_order where fk_order_number like "%'.$order_number.'%" and fd_order_name like "%'.$order_name.'%" and fd_status like "%'.$status.'%"';
		}else{
			$query = 'select count(*) from tb_order where pk_no in ("'.$order_no.'") and fd_status ="'.$status.'"';
		}		
		$result = query_send($query);
		$count = mysqli_fetch_array($result);
		return $count;

	}


	function order_get_order_no($name){
		$query = 'select DISTINCT(fk_order_no) from tb_order_detail where fd_product_name like "%'.$name.'%"';
		$result = query_send($query);
		$order_no = mysqli_fetch_array($result);

		if($order_no!=null){
			$order_no_str = implode(',', $order_no);			
		}else{
			$order_no_str = "''";
		}
		return $order_no_str;
	}

	function order_status($arr){		
		$arr2str = implode(",", $arr);		
		$query = 'update tb_order set fd_status = "2" where pk_no in('.$arr2str.')';
		query_send_non_return($query);				

	}

	function detail_order_status($no){				
		$query = 'update tb_order set fd_status = "2" where pk_no ='.$no;		
		query_send_non_return($query);				
	}

	function order_detail($no){
		$query = 'select * from tb_order where pk_no = '.$no;
		$result = query_send($query);
		$info = mysqli_fetch_array($result);
		return $info;

	}

	function while_get_order_product($no){
		$query = 'select * from tb_order_detail where fk_order_no = '.$no;		
		$result = query_send($query);		
		return $result;
	}

	function invoice_update($invoice_arr, $no_arr){
		for ($i=0; $i<count($invoice_arr); $i++){
			if($invoice_arr[$i]!=""){
				$query = 'update tb_order set fd_invoice_number="'.$invoice_arr[$i].'", fd_status="3" where pk_no = '.$no_arr[$i];					
				query_send_non_return($query);		
			}
		}
		
	}


?>