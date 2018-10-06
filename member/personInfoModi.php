<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php'
?>
<section class="container">
	<div class="visual etc">
		<p class="subTitle">회원정보 변경</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>회원정보 변경</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="loginBox">
				<div class="img"><img src="../images/common/img_personInfoModi.png" alt="회원정보 변경 이미지"></div>
				<div class="input">
					<p class="login">회원정보 변경</p>
					<div class="loginInput pwSt">
						<div>
							<input type="text" placeholder="Password">
						</div>
						<a href="#a" class="loginBtn pwSt">로그인</a>
					</div>
				</div>
			</div>
			<div class="emptyArea"></div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>

