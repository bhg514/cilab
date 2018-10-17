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

	function while_get_production_list($start_num){
		$start_num = ($start_num-1)*10;
		//$query = 'SELECT @rownum:=@rownum+1 as row, tb_product.* FROM tb_product limit '.$start_num.', 10;';	
		$query = 'SELECT @ROWNUM := @ROWNUM + 1 AS row, tb_product.* FROM tb_product, (SELECT @ROWNUM := '.$start_num.') R limit '.$start_num.', 10';
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
		$result = query_send($query);		

	}

	function product_get_count(){
		$query = 'select count(*) from tb_product';
		$result = query_send($query);
		$count = mysqli_fetch_array($result);

		return $count;

	}


?>