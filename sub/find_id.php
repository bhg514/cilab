<!DOCTYPE html>
<html lang="ko">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<title>아이디 찾기 - CiLab</title>
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
			<p class="subTitle">아이디 찾기</p>
			<div class="location">
				<img src="../images/common/icon_home.png" alt="Home">
				<span>&gt;</span>
				<span>아이디 찾기</span>
			</div>
		</div>
		<div class="contents">
			<div class="tabletInner">
				<div class="loginBox">
					<div class="img"><img src="../images/common/img_idpw.png" alt="비밀번호찾기 이미지"></div>
					<div class="input">
						<p class="login">가입 시 입력한 이메일을 입력해주세요.</p>
						<div class="loginInput pwSt">
							<div>
								<input type="text" placeholder="E-mail">
							</div>
							<a href="#a" class="loginBtn pwSt">아이디 찾기</a>
						</div>
					</div>
				</div>
				<div class="mt20 ar">
					<a href="./find_pw.php" class="btn type07 st2">비밀번호 찾기</a>
					<a href="/index.php" class="btn type07">홈으로</a>
				</div>
			</div>
		</div>
	</section>
	<?php
		include '../footer.php'
	?>
</body>
</html>
