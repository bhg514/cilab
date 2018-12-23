<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once("../../common.php");
	include_once("../data_upload.php");

	try{
		$title = $_POST['title'];
		$files = $_POST['file_count'];	

		
		$content = $_POST["content_val"];
		$type = $_POST['type'];

		$new_content = editor_conv($content);
		$file_arr = array();
		
		$files = explode(',', $files);
		if(is_array($files)){			
			foreach ($files as $file) {								
				$file_arr[$file] = $_FILES[$file];
			}		
		}

		$file_name = "";
		$new_file_name = "";

		foreach ($file_arr as $file) {
			if($file['name']!=null){
				$new_file_name .= file_save($file,'../files/')."||";
				$file_name .= $file['name']."||";
			}
		}

		$new_file_name = substr($new_file_name, 0, -2);
		$file_name = substr($file_name, 0, -2);

		$table = table_name($type);
		if($type==3)
			$query = 'insert into '.$table.' (fd_title,fd_name,fd_date,fd_content) values("'.$title.'","'.$_SESSION['user_name'].'","'.date("Y-m-d").'","'.$new_content.'")';
		else if($type==1)
			$query = 'insert into '.$table.' (fd_title,fd_name,fd_date,fd_file,fd_new_file,fd_content) values("'.$title.'","'.$_SESSION['user_name'].'","'.date("Y-m-d").'","'.$file_name.'","'.$new_file_name.'","'.$new_content.'")';
		elseif($type==2){
			$version = $_POST['sw_ver'];
			$query = 'insert into '.$table.' (fd_title,fd_name,fd_date,fd_file,fd_new_file,fd_content,fd_version) values("'.$title.'","'.$_SESSION['user_name'].'","'.date("Y-m-d").'","'.$file_name.'","'.$new_file_name.'","'.$new_content.'","'.$version.'")';
		}
		query_send_non_return($query);
		
		header("location:https://".$http_host."/admin/board/list.php?type=".$type);


	} catch(Exception $e){
		alert("에러 발생, 에러 원인 : ".$e,'#');
	}

?>