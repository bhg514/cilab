<?php
	include_once('../../common.php');
	$get_uri = $_SERVER['PHP_SELF'];
	$uri_arr = explode('/',$get_uri);
	$user_name = $_SESSION['user_name'];
	$type = $_SESSION['user_type'];
	if($type!="a"){
		header("location:https://".$http_host."/member/login.php");
	}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="shortcut icon" href="/images/icon/favicon.png">
	<title>Water Drone - CiLab Admin</title>
	<link rel="stylesheet" type="text/css" href="/css/common.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/default.css">
	<link rel="stylesheet" type="text/css" href="/css/mobile_menu_styles.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" media="screen and (max-width:999px)" type="text/css" href="/css/tablet.css">
	<link rel="stylesheet" media="screen and (max-width:480px)" type="text/css" href="/css/mobile.css">
	<!-- include libraries(jQuery, bootstrap) -->
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

	<!--[if lt IE 9]>
		<script src="../js/respond.js"></script>
		<script src="../js/html5.js"></script>
	<![endif]-->
</head>
<body>
	<header class="admin_header">
		<h1><a href="/index.php">CiLab - Creative Idea Lab</a></h1>
		<div class="gnb">
			<div class="gnbInner"><?=$user_name?>
				님 환영합니다.				
				<a href="../../member/logout.php" class="gnb_login">로그아웃</a>
				
			</div>
		</div>
		<div class="admin_menu">
			<ul>				
				<li class="<?php if($uri_arr[2] == 'pm') echo 'selected' ; ?>"><a href="../pm/list.php">상품 관리</a></li>
				<li class="<?php if($uri_arr[2] == 'order') echo 'selected' ; ?>"><a href="../order/list.php?type=1">주문/배송 관리</a></li>
				<li class="<?php if($uri_arr[2] == 'board') echo 'selected' ; ?>"><a href="../board/list.php?type=1">게시판/콘텐츠 관리</a></li>
				<li class="<?php if($uri_arr[2] == 'um') echo 'selected' ; ?>"><a href="../um/list.php">회원 관리</a></li>
				<li class="<?php if($uri_arr[2] == 'am') echo 'selected' ; ?>"><a href="../am/list.php">관리자 관리</a></li>
				<li class="<?php if($uri_arr[2] == 'statistic') echo 'selected' ; ?>"><a href="../statistic/month.php">통계 관리</a></li>
			</ul>
		</div>

	</header>