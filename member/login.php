<?php
	include '../header.php';
	include_once('../common.php');
	if(isset($_SESSION['user_id'])){
		header("location:http://".$http_host."/index.php");
	}
	if($_SERVER["HTTP_REFERER"]!="http://".$http_host."/member/login_chk.php"){
		$_SESSION['pre_url']=$_SERVER["HTTP_REFERER"];
	}
?>
<script type="text/javascript" src="../js/login.js"></script>
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
					<form id='user_login_form' action="./login_chk.php" method="post">
						<div class="loginInput">
							<div>
								<input name="id" type="text" placeholder="ID">
							</div>
							<div>
								<input name="pw" type="password" placeholder="Password">
							</div>
							<input type="submit" class="loginBtn" value="로그인">
						</div>
						<div class="saveID">
							<label><input type="checkbox"> ID저장</label>
						</div>
					</form>

				</div>
			</div>
			<div class="mt20">
				<a href="../register/agree.php" class="btn type07">회원가입</a>
			</div>
			<div class="ar loginRightBtnArea">
				<a href="./find_id.php" class="btn type07 st2">ID 찾기</a>
				<a href="./find_pw.php" class="btn type07 st2">P/W 찾기</a>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php';
?>

