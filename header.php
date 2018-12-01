<?php
	include_once('common.php');
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="shortcut icon" href="/images/icon/favicon.png">
	<title>Water Drone - CiLab</title>
	<link rel="stylesheet" type="text/css" href="../css/default.css">
	<link rel="stylesheet" type="text/css" href="../css/common.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/mobile_menu_styles.css">
	<link rel="stylesheet" media="screen and (max-width:999px)" type="text/css" href="../css/tablet.css">
	<link rel="stylesheet" media="screen and (max-width:480px)" type="text/css" href="../css/mobile.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" ></script>		
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
					if(!isset($_SESSION['user_id'])){
				?>
				<a href="../member/login.php" class="gnb_login">로그인</a>
				<a href="../register/agree.php" class="gnb_join">회원가입</a>
				<?php 
					}else{
						echo "<p>".$_SESSION['user_name']."님 환영합니다</p>";
				?>				
				<a href="../member/logout.php" class="gnb_login">로그아웃</a>
				
				<?php
						if($_SESSION['user_type']=='u')
							echo '<a href="../mypage/order.php" class="gnb_join">마이페이지</a>';
						else 
							echo '<a href="../admin/pm/list.php" class="gnb_join">관리자페이지</a>';
					}
				?>
				<a href="../sub/sitemap.php" class="gnb_sitemap">사이트맵</a>
			</div>
		</div>
		<div id="cssmenu">
			<ul>
				<li><a href="../menu/introWD.php">Water Drone</a></li>
				<li><a href="../menu/store.php?type=5">STORE</a></li>
				<li><a href="../menu/list.php?type=1">SUPPORT</a></li>
				<li><a href="../menu/introCilab.php">Company Introduction</a></li>
			</ul>
		</div>
	</header>