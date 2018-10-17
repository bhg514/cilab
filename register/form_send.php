<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once('../common.php');	
	try {
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
		$today = date("Y-m-d"); 
		$mail_reception = $_POST['mail_reception'];

		$sql = 'INSERT INTO tb_user (fd_id, fd_pw, fd_name, fd_hp, fd_mail, fd_zip, fd_address1, fd_address2, fd_reception, fd_date, fd_gender, fd_birthday) VALUES ("'.$id.'", "'.$pw.'", "'.$name.'","'.$hp.'","'.$mail.'", "'.$zip.'", "'.$addr1.'", "'.$addr2.'", "'.$mail_reception.'", "'.$today.'", "'.$gender.'", "'.$birthday.'")';
		
		query_send_non_return($sql);
		$_SESSION['reg_user_id'] = $id;		
	} catch (Exception $e) {
	    alert("회원가입 중 에러가 발생하였습니다\n 잠시 후 다시 시도해주세요.","http://".$http_host."/register/agree.php");
	}
	header("Location: http://".$http_host."/register/result.php");		
	

?>
