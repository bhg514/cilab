<?php
	if (!isset($_POST['agree1']) || !$_POST['agree1']) {
		echo "<script>alert(\"회원가입약관의 내용에 동의하셔야 회원가입 하실 수 있습니다.\");location.replace('http://localhost/sub/join.php');</script>";	
	}elseif (!isset($_POST['agree2']) || !$_POST['agree2']) {
	    echo "<script>alert(\"개인정보수집 이용동의 내용에 동의하셔야 회원가입 하실 수 있습니다.\");location.replace('http://localhost/sub/join.php');</script>";	
	}

?>

