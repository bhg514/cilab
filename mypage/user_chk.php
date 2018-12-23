<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php';
	$id = $_SESSION['user_id'];
	if(!isset($id) || $_SESSION['user_type']=="a"){
		header("location:https://".$http_host."/index.php");
	}
?>
<section class="container">
	<div class="visual etc">
		<p class="subTitle">Authorization</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>My Page</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="loginBox">				
				<div class="input">
					<p class="login">Membership information can be changed after you have been authenticated.<br>Please enter a password.</p>
					<form id="user_chk_form" action="./user_chk_form.php" method="post">
						<div class="loginInput pwSt">							
							<div>
								<input name="input_pw" type="password" placeholder="PW">
							</div>
							<input type="submit" class="loginBtn pwSt" value="Confirm">
						</div>
					</form>
				</div>
			</div>
			<div class="mt20 ar">
				<a href="/index.php" class="btn type07">Home</a>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>
