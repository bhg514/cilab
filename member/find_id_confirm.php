<?php
	header ( "content-type:text/html; charset=utf-8" );
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
					<p class="login">the verification number has been sent to your email that you entered when you signed up. <br> Please enter your verification number.</p>
					<form id="find_id_confirm_form" action="./find_id_confirm_form.php" method="post">
						<div class="loginInput pwSt">
							<div>
								<input name="input_code" type="text" placeholder="authorization code">
							</div>
							<input type="submit" class="loginBtn pwSt" value="Find">
						</div>
					</form>
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
