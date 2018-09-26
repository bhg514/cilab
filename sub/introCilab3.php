<!DOCTYPE html>
<html lang="ko">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<title>찾아오시는 길 - CiLab</title>
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
		<div class="visual intro">
			<p class="subTitle">조직도</p>
			<div class="location">
				<img src="../images/common/icon_home.png" alt="Home">
				<span>&gt;</span>
				<span>기업소개</span>
				<span>&gt;</span>
				<span>찾아오시는 길</span>
			</div>
		</div>
		<div class="contents">
			<div class="tabletInner">
				<div class="btnTab">
					<a href="./introCilab.php">소개</a>
					<a href="./introCilab2.php">조직도</a>
					<a href="./introCilab3.php" class="on">찾아오시는 길</a>
				</div>
				<div class="map">
					<img src="../images/common/map.png" alt="cilab 찾아오시는 길">
					<p class="blt01">대중교통 이용시</p>
					<table class="tblType02">
						<caption>대중교통 이용시</caption>
						<colgroup>
							<col style="width:170px;">
							<col>
						</colgroup>
						<tbody>
							<tr>
								<th scope="row">부산터미널 이용시</th>
								<td>1127번 버스 탑승 → 명동마을 정류장 하차 → 57번 버스 탑승 → 영산대학교 정류장 도착 → 도보 8분</td>
							</tr>
							<tr>
								<th scope="row">울산터미널 이용시</th>
								<td>2100, 2300번 버스 탑승 → 북부마을 정류장 하차 → 57A번 버스 탑승 → 영산대학교 정류장 도착 → 도보 8분</td>
							</tr>
						</tbody>
					</table>
					<p class="blt01">자가용 이용시</p>
					<table class="tblType02">
						<caption>자가용 이용시</caption>
						<colgroup>
							<col style="width:170px;">
							<col>
						</colgroup>
						<tbody>
							<tr>
								<th scope="row">부산 방면</th>
								<td>울산방향 7번 국도 → 삼호사거리 → 주남로 →영산대학교(양산캠퍼스)</td>
							</tr>
							<tr>
								<th scope="row">울산 방면</th>
								<td>경부고속도로 서울-부산방향 울산IC 출발 : 울산IC → 부산방향 7번 국도 → 삼호사거리 → 주남로 → 영산대학교(양산캠퍼스)</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<?php
		include '../footer.php'
	?>
</body>
</html>
