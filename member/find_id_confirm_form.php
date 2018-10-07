<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once("../common.php");
	$input_code = $_POST['input_code'];
	$form_code = $_SESSION['mail_code'];
	if($input_code == $form_code){
		$mail = $_SESSION['input_mail'];
		$id = get_id_to_mail($mail);
		if($id!=null){
			$msg = "고객님의 아이디는 ".$id."입니다.";
		}else{
			$msg = "아이디가 없습니다.";
		}
	}else{
		$msg = "입력하신 인증번호가 다릅니다.";
	}

?>
<?php
	include '../header.php'
?>
<section class="container">
	<div class="visual etc">
		<p class="subTitle">아이디 찾기</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>아이디 찾기</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="loginBox">
				<div class="img"><img src="../images/common/img_idpw.png" alt="비밀번호찾기 이미지"></div>
				<div class="input">
					<p class="login"><?=$msg?></p>
				</div>
			</div>
			<div class="mt20 ar">
				<a href="./find_pw.php" class="btn type07 st2">비밀번호 찾기</a>
				<a href="/index.php" class="btn type07">홈으로</a>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>
