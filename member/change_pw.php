<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once('../common.php');	
	try{
		$new_pw = crypt($_POST['input_pw']);
		$pk_no = $_SESSION['pk_no'];
		$sql = "UPDATE tb_user set fd_pw='".$new_pw."' where pk_no='".$pk_no."'";
		mysql_q($sql);		
	}catch(Exception $e){
		alert('비밀전호 변경 중 에러가 발생하였습니다\n 잠시 후 다시 시도해주세요.','http://localhost/member/find_pw_confirm_form.php');
	}
	alert("정상적으로 변경되었습니다. 다시 로그인 해주세요.",'http://localhost/member/login.php');
?>