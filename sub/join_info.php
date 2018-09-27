<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php'
?>
<section class="container">
	<div class="visual etc">
		<p class="subTitle">회원가입</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>회원가입</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="loginBox">
				<div class="img"><img src="../images/common/img_login.png" alt="로그인 이미지"></div>
				<div class="input">
					<p class="login">LOGIN</p>
					<div class="loginInput">
						<div>
							<input type="text" placeholder="ID">
						</div>
						<div>
							<input type="password" placeholder="Password">
						</div>
						<a href="#a" class="loginBtn">로그인</a>
					</div>
					<div class="saveID">
						<label><input type="checkbox"> ID저장</label>
					</div>
				</div>
			</div>
			<div class="mt20">
				<a href="#a" class="btn type07">회원가입</a>
			</div>
			<div class="ar loginRightBtnArea">
				<a href="./join_info.php" class="btn type07 st2">확인</a>
				<a href="/index.php" class="btn type07 st2">취소</a>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>
