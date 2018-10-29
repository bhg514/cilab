<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once('../common.php');
	$no = $_POST['no'];
	$pw = $_POST['pw'];
	$get_pw = get_qna_pw($no);	

	if ($get_pw[0]==null || !check_password($pw, $get_pw[0])) {
		alert('비밀번호가 틀립니다.',$_SERVER["HTTP_REFERER"]);		
	}

?>

<form name='fr' action='qna_detail.php' method='POST'>
	<input type='hidden' name='post_no' value="<?=$no?>">	
</form>


<?php
	echo "<script type='text/javascript'> document.fr.submit(); </script>";
?>