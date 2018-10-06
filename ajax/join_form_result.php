<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once('../common.php');	
	try {
		$name = $_POST['name'];
		$id = $_POST['id'];
		$pw = password_hash($_POST['pw'], PASSWORD_BCRYPT);
		$hp = $_POST['hp'];
		$gender = $_POST['gender'];
		$birthday = $_POST['birthday'];
		$mail = $_POST['mail'];
		$zip = $_POST['zip'];
		$addr1 = $_POST['addr1'];
		$addr2 = $_POST['addr2'];
		$today = date("Y-m-d"); 
		$mail_reception = $_POST['mail_reception'];
		$sql = 'INSERT INTO tb_user (fd_id, fd_pw, fd_name, fd_mail, fd_zip, fd_address1, fd_address2, fd_reception, fd_date, fd_gender, fd_birthday) VALUES ("'.$id.'", "'.$pw.'", "'.$name.'", "'.$mail.'", "'.$zip.'", "'.$addr1.'", "'.$addr2.'", "'.$mail_reception.'", "'.$today.'", "'.$gender.'", "'.$birthday.'")';

		mysql_q($sql);
		$_SESSION['reg_user_id'] = $id;
	} catch (Exception $e) {
	    echo $e;
	}
	echo 1;

?>
