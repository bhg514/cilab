<?php
	include_once('config/db_config.php'); 
	session_start();
	$mysqli = new mysqli($host, $user, $pw, $dbName);

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
	function get_id_pw($id){
		global $mysqli;
		$query = 'select * from tb_user where fd_id = "'.$id.'"';
		$result = mysqli_query($mysqli, $query);
   		$id_count = mysqli_fetch_array($result);
		return $id_count;
	}

	function get_id_to_mail($mail){
		$query = 'select fd_id from tb_user where fd_mail="'.$mail.'"';
		$result = mysqli_query($query);
		$id - mysqli_fetch_array($result);
		return $id;
	}

	function check_password($pw, $hash){
		if(password_verify($pw , $hash)){
			return true;
		}else{
			return false;
		}
	}

	function alert($msg,$url){
		echo "<script>alert(\"".$msg."\");location.replace('".$url."');</script>";
	}

	
?>