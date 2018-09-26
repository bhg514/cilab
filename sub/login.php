<!DOCTYPE html>
<html lang="ko">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<title>로그인 - CiLab</title>
	<link rel="stylesheet" type="text/css" href="../css/common.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/mobile_menu_styles.css">
	<link rel="stylesheet" media="screen and (max-width:999px)" type="text/css" href="../css/tablet.css">
	<link rel="stylesheet" media="screen and (max-width:480px)" type="text/css" href="../css/mobile.css">
	<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="../js/common.js"></script>
	<script type="text/javascript" src="../js/jquery.bxslider.js"></script>
    <script type="text/javascript" src="../js/mobile_menu_script.js"></script>
	<!--[if lt IE 9]>
		<script src="../js/respond.js"></script>
		<script src="../js/html5.js"></script>
	<![endif]-->
</head>
<body>
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
</body>
</html>
