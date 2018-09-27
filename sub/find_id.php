<?php
	header ( "content-type:text/html; charset=utf-8" );
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
					<p class="login">가입 시 입력한 이메일을 입력해주세요.</p>
					<div class="loginInput pwSt">
						<div>
							<input type="text" placeholder="E-mail">
						</div>
						<a href="#a" class="loginBtn pwSt">아이디 찾기</a>
					</div>
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
