<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once("../../common.php");
	include_once("../data_upload.php");

	try{
		$no = $_POST['no'];
		$reply = $_POST['reply'];

		$query = "update tb_qna set fd_reply = '".$reply."' where pk_no=".$no;

		query_send_non_return($query);
		header("location:https://".$http_host."/admin/board/list.php?type=4");


	} catch(Exception $e){
		alert("에러 발생, 에러 원인 : ".$e,'#');
	}

?>