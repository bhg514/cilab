<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once("../common.php");
	$input_code = $_POST['input_code'];
	$form_code = $_SESSION['mail_code'];
	if($input_code == $form_code){
		$msg = null;
	}else{
		$msg = "The verification number you entered is different.";
	}

?>
<?php
	include '../header.php'
?>
<script type="text/javascript" src="../js/register.js"></script>
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
								<p class="login">Please enter the new password.</p>
								
							</div>
							<div class="loginInput pwSt">
								<div>
									<input id="reg_mb_password" name="input_pw" type="password" placeholder="password">
									<input type="hidden" id="pw_chk" >
									<span id="good_pw" class="fcBl ml05 fs12 b hide">[SAFE] Password available.</span>
									<span id="bad_pw" class="fcR ml05 fs12 b hide">[Not available] Password does not meet the criteria.</span>
									<p class="mt05">* Please enter a mixture of 9 lower case letters, special characters, and numbers.</p>
									<label id="mb_password-error" class="error" for="mb_password" style="display:none;" >Please enter a password</label>
								</div>
								<div>
									<input id="reg_mb_password_re" type="password" placeholder="Confirm password">
									<span id="right_pw" class="fcBl ml05 fs12 b hide">The password you entered matches.</span>
									<span id="wrong_pw" class="fcR ml05 fs12 b hide">Passwords do not match.</span>
								</div>
								<div>
									<input type="submit" id="change_pw_sub" class="loginBtn pwSt" value="Find">
								</div>
							</div>
						</form>
				<?php
					}
				?>
			</div>
			<div class="mt20 ar">
				<a href="./find_pw.php" class="btn type07 st2">Forgot ID</a>
				<a href="/index.php" class="btn type07">Home</a>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>
