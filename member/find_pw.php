<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php'
?>
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
				<div class="input">
					<p class="login">비밀번호 찾기</p>
					<form id="find_pw_form" action="./find_pw_chk.php" method="post">
						<div class="loginInput pwSt">
							<div>
								<input name="input_id" type="text" placeholder="ID">
							</div>
							<input type="submit" class="loginBtn pwSt" value="비밀번호 찾기">
						</div>
					</form>
				</div>
			</div>
			<div class="mt20 ar">
				<a href="./find_id.php" class="btn type07 st2">ID 찾기</a>
				<a href="/index.php" class="btn type07">홈으로</a>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>