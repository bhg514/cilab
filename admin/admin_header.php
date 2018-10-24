<?php
	include_once('../../common.php');
	$get_uri = $_SERVER['PHP_SELF'];
	$uri_arr = explode('/',$get_uri);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<title>Water Drone소개 - CiLab</title>
	<link rel="stylesheet" type="text/css" href="/css/common.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/default.css">
	<link rel="stylesheet" type="text/css" href="/css/mobile_menu_styles.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" media="screen and (max-width:999px)" type="text/css" href="/css/tablet.css">
	<link rel="stylesheet" media="screen and (max-width:480px)" type="text/css" href="/css/mobile.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" ></script>		


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
				<?=$_SESSION['user_name']?>님 환영합니다.				
				<a href="../../member/logout.php" class="gnb_login">로그아웃</a>
				
			</div>
		</div>
		<div class="admin_menu">
			<ul>				
				<li class="<?php if($uri_arr[2] == 'pm') echo 'selected' ; ?>"><a href="../pm/list.php">상품 관리</a></li>
				<li class="<?php if($uri_arr[2] == 'order') echo 'selected' ; ?>"><a href="../order/list.php?type=1">주문/배송 관리</a></li>
				<li class="<?php if($uri_arr[2] == 'board') echo 'selected' ; ?>"><a href="../board/notice.php">게시판/콘텐츠 관리</a></li>
				<li class="<?php if($uri_arr[2] == '') echo 'selected' ; ?>"><a href="../um/list.php">회원 관리</a></li>
				<li class="<?php if($uri_arr[2] == '') echo 'selected' ; ?>"><a href="../am/list.php">관리자 관리</a></li>
				<li class="<?php if($uri_arr[2] == '') echo 'selected' ; ?>"><a href="../statistic/month.php">통계 관리</a></li>
			</ul>
		</div>

	</header>