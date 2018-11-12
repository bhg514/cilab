<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once('../common.php');	
	try {
		$no = $_POST['pk_no'];
		$name = $_POST['mb_name'];
		$id = $_POST['mb_id'];
		$pw = crypt($_POST['mb_password'],'');
		$gender = $_POST['mb_gender'];
		$birthday = $_POST['mb_bd'];
		$hp1 = $_POST['mb_hp1'];
		$hp2 = $_POST['mb_hp2'];
		$hp3 = $_POST['mb_hp3'];
		$hp = $hp1.'-'.$hp2.'-'.$hp3;
		$mail1 = $_POST['mb_email1'];
		$mail2 = $_POST['mb_email2'];
		$mail = $mail1.'@'.$mail2;
		$zip = $_POST['mb_zip'];
		$addr1 = $_POST['mb_addr1'];
		$addr2 = $_POST['mb_addr2'];
		$addr3 = $_POST['mb_addr3'];
		$addr4 = $_POST['mb_addr4'];
		$today = date("Y-m-d"); 
		$mail_reception = $_POST['mail_reception'];

		$sql = 'UPDATE tb_user SET fd_id = "'.$id.'", fd_pw = "'.$pw.'", fd_name = "'.$name.'", fd_hp = "'.$hp.'", fd_mail = "'.$mail.'", fd_zip = "'.$zip.'", fd_address1 =  "'.$addr1.'", fd_address2 =  "'.$addr2.'", fd_address3 =  "'.$addr3.'", fd_address4 =  "'.$addr4.'", fd_reception = "'.$mail_reception.'", fd_date = "'.$today.'", fd_gender = "'.$gender.'", fd_birthday = "'.$birthday.'" WHERE pk_no="'.$no.'"';		
		query_send_non_return($sql);
		$_SESSION['reg_user_id'] = $id;		
	} catch (Exception $e) {
	    alert('회원가입 중 에러가 발생하였습니다\n 잠시 후 다시 시도해주세요.','http://".$http_host."/register/agree.php');
	}
	header("Location: http://".$http_host."/mypage/info_result.php");		

?>