<?php
	include '../header.php';
	include_once('../common.php');
	if(isset($_SESSION['user_id'])){
		header("location:https://".$http_host."/index.php");
	}
	if($_SERVER["HTTP_REFERER"]!="https://".$http_host."/member/login_chk.php"){
		$_SESSION['pre_url']=$_SERVER["HTTP_REFERER"];
	}
?>
<script type="text/javascript" src="../js/login.js"></script>
<section class="container">
	<div class="visual etc">
		<p class="subTitle">Login</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>Login</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="loginBox">
				<div class="img"><img src="../images/common/img_login.png" alt="Login image"></div>
				<div class="input">
					<p class="login">LOGIN</p>
					<form id='user_login_form' action="./login_chk.php" method="post">
						<div class="loginInput">
							<div>
								<input name="id" type="text" placeholder="ID">
							</div>
							<div>
								<input name="pw" type="password" placeholder="Password">
							</div>
							<input type="submit" class="loginBtn" value="Login">
						</div>
						<div class="saveID">
							<label><input type="checkbox"> Save ID</label>
						</div>
					</form>

				</div>
			</div>
			<div class="mt20">
				<a href="../register/agree.php" class="btn type07">Sing Up</a>
			</div>
			<div class="ar loginRightBtnArea">
				<a href="./find_id.php" class="btn type07 st2">Find ID</a>
				<a href="./find_pw.php" class="btn type07 st2">Find Password</a>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php';
?>

