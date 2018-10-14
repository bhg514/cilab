<?php
	@ob_start();
	header ( "content-type:text/html; charset=utf-8" );
	session_start();
	include_once('config/db_config.php'); 
	$mysqli = new mysqli($host, $user, $pw, $dbName);
	$http_host = $_SERVER['HTTP_HOST'];

	function mysql_q($query){
		global $mysqli;
		mysqli_query($mysqli, $query);
	}

	function get_id($id){
		global $mysqli;
		$query = 'select fd_id from tb_user where fd_id = "'.$id.'"';
		$result = mysqli_query($mysqli, $query);
   		$id_count = mysqli_fetch_array($result);
		return $id_count[0];
	}

	function id_chk($id){
		global $mysqli;
		$query = 'select count(*) from (select fd_id from tb_admin where fd_id="'.$id.'" union select fd_id from tb_user where fd_id="'.$id.'") a';
		//$query = 'select count(*) from tb_user where fd_id="'.$id.'"';
		$result = mysqli_query($mysqli, $query);
    	$id_count = mysqli_fetch_array($result);
    	return $id_count[0];
	}

	function get_user_info_to_id($id){
		global $mysqli;
		$query = 'select * from tb_user where fd_id = "'.$id.'"';
		$result = mysqli_query($mysqli, $query);
   		$info = mysqli_fetch_array($result);
		return $info;
	}

	function get_all_info_to_id($id){
		global $mysqli;
		$query = 'select * from (select fd_id, fd_pw, fd_type, fd_name from tb_admin where fd_id="'.$id.'" union select fd_id, fd_pw, fd_type ,fd_name from tb_user where fd_id="'.$id.'") a';
		$result = mysqli_query($mysqli, $query);
		$info = mysqli_fetch_array($result);
		return $info;
	}

	function get_user_info_to_mail($mail){
		global $mysqli;
		$query = 'select * from tb_user where fd_mail="'.$mail.'"';			
		$result = mysqli_query($mysqli, $query);
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
		global $mysqli;
		$query = 'select * from tb_product where pk_no>='.$start_num.' order by pk_no limit 10';
		$result = mysqli_query($mysqli, $query);
		
		return $result;
	}

	
?>