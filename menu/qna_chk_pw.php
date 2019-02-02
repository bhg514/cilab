<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php'
?>
<section class="container">
	<div class="visual etc">
		<p class="subTitle">Q&amp;A</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>SUPPORT</span>
			<span>&gt;</span>
			<span>Q&amp;A</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="loginBox">
				<div class="img"><img src="../images/common/img_idpw.png" alt="find_pw_img"></div>
				<div class="input">
					<p class="login">Password</p>
					<form id="chk_pw_form" action="./chk_pw_form.php" method="post">
						<div class="loginInput pwSt">
							<div>
								<input name="pw" type="password" placeholder="pw">								
								<input name="no" type="hidden" value="<?=$_GET['no']?>">
							</div>
							<input type="submit" class="loginBtn pwSt" value="next">
						</div>
					</form>
				</div>
			</div>
			<div class="mt20 ar">				
				<a href="list.php?type=3" class="btn type07">Home</a>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>
