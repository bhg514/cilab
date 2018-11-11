<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php';
	$id = $_SESSION['user_id'];
	if(!isset($id) || $_SESSION['user_type']=="a"){
		header("location:http://".$http_host."/index.php");
	}
?>
<section class="container">
	<div class="visual etc">
		<p class="subTitle">본인인증</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>마이페이지</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="loginBox">				
				<div class="input">
					<p class="login">회원정보변경은 본인인증을 거친 후에 가능합니다. <br>비밀번호를 입력해주세요.</p>
					<form id="user_chk_form" action="./user_chk_form.php" method="post">
						<div class="loginInput pwSt">							
							<div>
								<input name="input_pw" type="password" placeholder="PW">
							</div>
							<input type="submit" class="loginBtn pwSt" value="확인">
						</div>
					</form>
				</div>
			</div>
			<div class="mt20 ar">
				<a href="/index.php" class="btn type07">홈으로</a>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>
