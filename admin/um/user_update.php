<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once("../../common.php");

	try{
		$no = $_POST['no'];
		$pw = crypt($_POST['pw'],'');

		$query = "update tb_user set fd_pw = '".$pw."' where pk_no=".$no;

		query_send_non_return($query);
		header("location:http://".$http_host."/admin/um/list.php");


	} catch(Exception $e){
		alert("에러 발생, 에러 원인 : ".$e,'#');
	}

?>