<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once("../../common.php");
	include_once("./img_upload.php");

	try{
		$no = $_POST['no'];
		$status = $_POST["status"];
		$product_name = $_POST["name"];
		$category = $_POST["category"];
		$price = $_POST["price"]; // int
		$count = $_POST["count"]; // int
		$delivery = $_POST["delivery"]; //int
		$made = $_POST["made"];
		$main_img = $_FILES["main_img"];
		$old_main_img = $_POST["old_main_img"];
		$old_sub_img_arr = array();
		$old_sub_img_arr['img1'] = $_POST['old_sub_img1'];
		$old_sub_img_arr['img2'] = $_POST['old_sub_img2'];
		$old_sub_img_arr['img3'] = $_POST['old_sub_img3'];
		$old_sub_img_arr['img4'] = $_POST['old_sub_img4'];

		$sub_img_arr = array();
		$sub_img_arr['sub_img1'] = $_FILES['sub_img1'];
		$sub_img_arr['sub_img2'] = $_FILES['sub_img2'];
		$sub_img_arr['sub_img3'] = $_FILES['sub_img3'];
		$sub_img_arr['sub_img4'] = $_FILES['sub_img4'];
		
		$option = $_POST["option_input"];
		$content = $_POST["content_val"];
		
		$new_content = editor_conv($content);

		$date_time = date("Y-m-d h:i:s");
		$user_name = $_SESSION['user_name'];		

		$new_main_img="";
		$sub_img = "";
		$new_sub_img = "";

		if($main_img['name']!=null){
			$new_main_img = file_upload($main_img);
			$main_img = $main_img['name'];
		}
		
		foreach ($sub_img_arr as $img) {
			if($img['name']!=null){
				$new_sub_img .= file_upload($img)."||";
				$sub_img .= $img['name']."||";
			}
		}
		$new_sub_img = substr($new_sub_img, 0, -2);


		$query = 'update tb_product set fd_name = "'.$product_name.'", fd_price = '.$price.', fd_category = "'.$category.'", fd_content = "'.$new_content.'", fd_stock = '.$count.', fd_date = "'.$date_time.'", fd_status = "'.$status.'", fd_delivery = "'.$delivery.'", fd_made = "'.$made.'",';
		if($main_img['name']!=null){
			$query .=' fd_main_img = "'.$main_img.'", fd_new_main_img = "'.$new_main_img.'",';
		}
		if($new_sub_img!=null){
			$query .=  ' fd_sub_img = "'.$sub_img.'", fd_new_sub_img = "'.$new_sub_img.'",' ;	
		}
		$query.= ' fd_option = "'.$option.'", fk_admin = "'.$user_name.'" where pk_no ='.$no;

		//echo $query;
		query_send_non_return($query);
		header("location:".$_SERVER["HTTP_REFERER"]);


	} catch(Exception $e){
		alert("에러 발생, 에러 원인 : ".$e,'#');
	}

?>