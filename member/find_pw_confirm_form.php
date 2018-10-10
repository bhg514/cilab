<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once("../common.php");
	$input_code = $_POST['input_code'];
	$form_code = $_SESSION['mail_code'];
	if($input_code == $form_code){
		$msg = null;
	}else{
		$msg = "입력하신 인증번호가 다릅니다.";
	}

?>
<?php
	include '../header.php'
?>
<script type="text/javascript" src="../js/register.js"></script>
<section class="container">
	<div class="visual etc">
		<p class="subTitle">비밀번호 찾기</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>비밀번호 찾기</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="loginBox">
				<div class="img"><img src="../images/common/img_idpw.png" alt="비밀번호찾기 이미지"></div>
				<?php
					if($msg != null){
				?>
						<div class="input">
							<p class="login"><?=$msg?></p>
						</div>
				<?php
					}else{
				?>
						<form id="change_pw" action="./change_pw.php" method="post">
							<div class="input">
								<p class="login">새로운 비밀번호를 입력해주세요.</p>
								
							</div>
							<div class="loginInput pwSt">
								<div>
									<input id="reg_mb_password" name="input_pw" type="password" placeholder="비밀번호">
									<input type="hidden" id="pw_chk" >
									<span id="good_pw" class="fcBl ml05 fs12 b hide">[안전] 사용 가능한 비밀번호입니다.</span>
									<span id="bad_pw" class="fcR ml05 fs12 b hide">[사용불가]비밀번호 기준에 맞지 않습니다.</span>
								</div>
								<div>
									<input id="reg_mb_password_re" type="password" placeholder="비밀번호 확인">
									<span id="right_pw" class="fcBl ml05 fs12 b hide">입력한 비밀번호가 일치합니다.</span>
									<span id="wrong_pw" class="fcR ml05 fs12 b hide">비밀번호가 일치하지 않습니다.</span>
								</div>
								<div>
									<input type="submit" id="change_pw_sub" class="loginBtn pwSt" value="확인">
								</div>
							</div>
						</form>
				<?php
					}
				?>
			</div>
			<div class="mt20 ar">
				<a href="./find_pw.php" class="btn type07 st2">ID 찾기</a>
				<a href="/index.php" class="btn type07">홈으로</a>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>
