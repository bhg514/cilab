<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once("../../common.php");

	try{
		$id = $_POST['id'];
		$pw = crypt($_POST['pw'],'');
		$name = $_POST['name'];
		$group = $_POST['group'];
		$position = $_POST['position'];
		$hp1 = $_POST['hp1'];
		$hp2 = $_POST['hp2'];
		$hp3 = $_POST['hp3'];
		$hp = $hp1.'-'.$hp2.'-'.$hp3;


		$query = "insert tb_admin set fd_pw = '".$pw."', fd_name = '".$name."', fd_group = '".$group."', fd_position = '".$position."', fd_hp = '".$hp."', fd_id='".$id."'";

		query_send_non_return($query);
		echo $query;
		header("location:https://".$http_host."/admin/am/list.php");


	} catch(Exception $e){
		alert("에러 발생, 에러 원인 : ".$e,'#');
	}

?>