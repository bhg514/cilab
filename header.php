<!DOCTYPE html>
<html lang="ko">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<title>Water Drone소개 - CiLab</title>
	<link rel="stylesheet" type="text/css" href="../css/common.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/default.css">
	<link rel="stylesheet" type="text/css" href="../css/mobile_menu_styles.css">
	<link rel="stylesheet" media="screen and (max-width:999px)" type="text/css" href="../css/tablet.css">
	<link rel="stylesheet" media="screen and (max-width:480px)" type="text/css" href="../css/mobile.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" ></script>		
	<script type="text/javascript" src="../js/common.js"></script>
	<script type="text/javascript" src="../js/jquery.bxslider.js"></script>
	<script type="text/javascript" src="../js/mobile_menu_script.js"></script>

	<!--[if lt IE 9]>
		<script src="../js/respond.js"></script>
		<script src="../js/html5.js"></script>
	<![endif]-->
</head>
<body>
	<header>
		<h1><a href="/index.php">CiLab - Creative Idea Lab</a></h1>
		<div class="gnb">
			<div class="gnbInner">
				<?php 
					include_once('common.php');
					if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_name']) ){

				?>
				<a href="../member/login.php" class="gnb_login">로그인</a>
				<a href="../register/agree.php" class="gnb_join">회원가입</a>
				<?php 
					}else{
				?>

				<a href="../member/logout.php" class="gnb_login">로그아웃</a>
				<a href="../mypage/info.php" class="gnb_join">마이페이지</a>
				<?php
					}
				?>
				<a href="../sub/sitemap.php" class="gnb_sitemap">사이트맵</a>
			</div>
		</div>
		<div id="cssmenu">
			<ul>
				<li><a href="../menu/introWD.php">Water Drone</a></li>
				<li><a href="../menu/introCilab.php">기업소개</a></li>
				<li><a href="../menu/notice.php">SUPPORT</a></li>
				<li><a href="../menu/store.php">STORE</a></li>
			</ul>
		</div>
	</header>