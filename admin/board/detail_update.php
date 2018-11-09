<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once("../../common.php");
	include_once("../data_upload.php");

	try{
		$no = $_POST['no'];
		$title = $_POST['title'];
		$files = $_POST['file_count'];	
		$type = $_POST['type'];

		
		$content = $_POST["content_val"];

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
				$new_file_name .= file_save($file)."||";
				$file_name .= $file['name']."||";
			}
		}

		$new_file_name = substr($new_file_name, 0, -2);
		$file_name = substr($file_name, 0, -2);

		$table = table_name($type);
		$query = 'update '.$table.' set fd_title = "'.$title.'",';
		if($new_file_name!=""){
			$query .=  ' fd_file = "'.$file_name.'", fd_new_file = "'.$new_file_name.'",' ;	
		}
		$query.= ' fd_content = "'.$new_content.'" where pk_no ='.$no;

		
		query_send_non_return($query);
		header("location:".$_SERVER["HTTP_REFERER"]);


	} catch(Exception $e){
		alert("에러 발생, 에러 원인 : ".$e,'#');
	}

?>