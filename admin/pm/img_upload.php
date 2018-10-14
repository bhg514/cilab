<!-- 참고용  -->

<?php

	function file_upload($file_info){

		$uploads_dir = '../img/upload_image/';
		$allowed_ext = array('jpg','jpeg','png','gif');
		 
		// 변수 정리
		$error = $file_info['error'];
		$name = $file_info['name'];
		$tmp = explode('.', $name);
		$ext = array_pop($tmp);
		$new_name = uniqid().".".$ext;
		 
		// 오류 확인
		if( $error != UPLOAD_ERR_OK ) {
			switch( $error ) {
				case UPLOAD_ERR_INI_SIZE:
				case UPLOAD_ERR_FORM_SIZE:
					echo "파일이 너무 큽니다. ($error)";
					break;
				case UPLOAD_ERR_NO_FILE:
					echo "파일이 첨부되지 않았습니다. ($error)";
					break;
				default:
					echo "파일이 제대로 업로드되지 않았습니다. ($error)";
			}
			exit;
		}
		 
		// 확장자 확인
		if( !in_array($ext, $allowed_ext) ) {
			echo "허용되지 않는 확장자입니다.";
			exit;
		}
		 
		// 파일 이동

		move_uploaded_file( $file_info['tmp_name'], "$uploads_dir/".$new_name);

		return $new_name;
	}

	function img_save($data){
		list($type, $imageData) = explode(';', $data);
		list(,$extension) = explode('/',$type);
		list(,$imageData) = explode(',', $imageData);
		$fileName = "../img/upload_image/".uniqid().'.'.$extension;
		$imageData = base64_decode($imageData);
		file_put_contents($fileName, $imageData);
		return $fileName;
		}

	function editor_conv($contents){
		//$contents = ""; 에디터이 값 js = $('#summernote').summernote('code');
		
		preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $contents, $matches);
		if(count($matches[0]) >0){ // img가 있을 때 
			$img_data_arr = $matches[1];
			$old_img_tag_arr = $matches[0];
			$new_img_tag_arr = array();
			foreach ($img_data_arr as $img_data) {
				$file_name = img_save($img_data);
				$img_tag = "<img src='".$file_name."'>";
				array_push($new_img_tag_arr, $img_tag);
			}

			for ($i=0; $i<count($old_img_tag_arr); $i++) {
				$contents = str_replace($old_img_tag_arr[$i], $new_img_tag_arr[$i], $contents);
			}
		}
		return $contents;
	}
?>