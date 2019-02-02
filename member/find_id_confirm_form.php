<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once("../common.php");
	$input_code = $_POST['input_code'];
	$form_code = $_SESSION['mail_code'];
	if($input_code == $form_code){
		$mail = $_SESSION['input_mail'];
		$info = get_user_info_to_mail($mail);
		$id = $info['fd_id'];
		if($id!=null){
			$msg = "Your ID : ".$id;
		}else{
			$msg = "No ID found";
		}
	}else{
		$msg = "The verification number you entered is different.";
	}

?>
<?php
	include '../header.php'
?>
<section class="container">
	<div class="visual etc">
		<p class="subTitle">Forgot ID</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>Forgot ID</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="loginBox">
				<div class="img"><img src="../images/common/img_idpw.png" alt="find_img"></div>
				<div class="input">
					<p class="login"><?=$msg?></p>
				</div>
			</div>
			<div class="mt20 ar">
				<a href="./find_pw.php" class="btn type07 st2">Forgot password</a>
				<a href="/index.php" class="btn type07">Home</a>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>
