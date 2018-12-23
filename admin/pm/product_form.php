<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once("../../common.php");
	include_once("../data_upload.php");

	try{
	    $status = $_POST["status"] ?? '';
	    $product_name = $_POST["name"] ?? '';
	    $category = $_POST["category"] ?? '';
	    $price = $_POST["price"] ?? 0; // int
	    $count = $_POST["count"] ?? 0; // int
	    $delivery = $_POST["delivery"] ?? 0; //int
	    $made = $_POST["made"] ?? '';
	    $main_img = $_FILES["main_img"];
		$sub_img_arr = array();
		$sub_img_arr['sub_img1'] = $_FILES['sub_img1'];
		$sub_img_arr['sub_img2'] = $_FILES['sub_img2'];
		$sub_img_arr['sub_img3'] = $_FILES['sub_img3'];
		$sub_img_arr['sub_img4'] = $_FILES['sub_img4'];

		$option = $_POST["option_input"] ?? '';
		$content = $_POST["content_val"] ?? '';
		
		$new_content = editor_conv($content);
		$new_content = str_replace('"', "'", $new_content);

		$date_time = date("Y-m-d h:i:s");
		$user_name = $_SESSION['user_name'];

		$new_sub_img = "";
		$sub_img = "";
		foreach ($sub_img_arr as $img) {
			if($img['name']!=null){
				$new_sub_img .= file_upload($img)."||";
				$sub_img .= $img['name']."||";
			}
		}
		$sub_img = substr($sub_img, 0, -2);
		$new_sub_img = substr($new_sub_img, 0, -2);

		$new_main_img="";


		if($main_img['name']!=null){
			$new_main_img = file_upload($main_img);
			$main_img = $main_img['name'];
		}else{
			$main_img="";
		}


		$query = 'INSERT INTO tb_product (pk_no, fd_name, fd_price, fd_category, fd_content, fd_stock, fd_date, fd_status, fd_delivery, fd_made, fd_main_img, fd_new_main_img, fd_sub_img, fd_new_sub_img, fd_option, fk_admin) VALUES ((select IFNULL(max(pk_no),0)+1 from tb_product a), "'.$product_name.'", '.$price.', "'.$category.'", "'.$new_content.'", '.$count.', "'.$date_time.'", "'.$status.'", '.$delivery.', "'.$made.'", "'.$main_img.'", "'.$new_main_img.'", "'.$sub_img.'", "'.$new_sub_img.'", "'.$option.'", "'.$user_name.'");';
		query_send_non_return($query);
		//echo $query;
		header("location:https://".$http_host."/admin/pm/list.php");


	} catch(Exception $e){
		alert("에러 발생, 에러 원인 : ".$e,'#');
	}

?>