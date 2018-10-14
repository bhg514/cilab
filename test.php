<?php
function img_save($data){
	list($type, $imageData) = explode(';', $data);
	list(,$extension) = explode('/',$type);
	list(,$imageData)      = explode(',', $imageData);
	$fileName = "./admin/img/upload_image/".uniqid().'.'.$extension;
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
			str_replace($old_img_tag_arr[$i], $new_img_tag_arr[$i], $contents);
		}
	}
	return $contents;
}


?>