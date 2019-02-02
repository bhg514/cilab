<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php'
?>
<section class="container">
	<div class="visual etc">
		<p class="subTitle">Forgot password</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>Forgot password</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="loginBox">
				<div class="img"><img src="../images/common/img_idpw.png" alt="find_img"></div>
				<div class="input">
					<p class="login">Forgot password</p>
					<form id="find_pw_form" action="./find_pw_chk.php" method="post">
						<div class="loginInput pwSt">
							<div>
								<input name="input_id" type="text" placeholder="ID">
							</div>
							<input type="submit" class="loginBtn pwSt" value="Find">
						</div>
					</form>
				</div>
			</div>
			<div class="mt20 ar">
				<a href="./find_id.php" class="btn type07 st2">Forgot ID </a>
				<a href="/index.php" class="btn type07">Home</a>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>
