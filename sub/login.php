<?php
	include '../header.php'
?>
<section class="container">
	<div class="visual etc">
		<p class="subTitle">로그인</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>로그인</span>
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
				<a href="./join.php" class="btn type07">회원가입</a>
			</div>
			<div class="ar loginRightBtnArea">
				<a href="./find_id.php" class="btn type07 st2">ID 찾기</a>
				<a href="./find_pw.php" class="btn type07 st2">P/W 찾기</a>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>

