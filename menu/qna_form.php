<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once("../../common.php");
	include_once("/admin/data_upload.php");

	try{
		
		
		$title = $_POST["title"];
		$content = $_POST["content"];
		$file = $_FILES["file"];
		$pw = crypt($_POST["pw"]);

		$date_time = date("Y-m-d h:i:s");

		if($file['name']!=null){
			$new_file_name = file_save($file);			
			$file_name = $file['name'];
		}



		$query = 'INSERT INTO tb_qna (fd_title, fd_content, fd_pw, fd_file, fd_new_file, fd_name, fd_hp, fd_mail ) select "'.$title.'", "'.$content.'", "'.$pw.'", "'.$new_file_name.'", "'.$file_name.'", fd_name, fd_hp, fd_mail from tb_user where fd_id ="'.$_SESSION['user_id'].'"';
		//query_send_non_return($query);
		header("location:http://".$http_host."/menu/list.php?type=4");


	} catch(Exception $e){
		alert("에러 발생, 에러 원인 : ".$e,'#');
	}

?>