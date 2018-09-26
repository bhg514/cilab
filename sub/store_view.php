<!DOCTYPE html>
<html lang="ko">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<title>STORE - CiLab</title>
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
		<div class="visual store">
			<p class="subTitle">STORE</p>
			<div class="location">
				<img src="../images/common/icon_home.png" alt="Home">
				<span>&gt;</span>
				<span>STORE</span>
			</div>
		</div>
		<div class="contents">
			<div class="imgView">
				<div class="left">
					<div class="image"><img src="../images/common/@img2.png" alt="이미지 설명 입력란"></div>
					<ul>
						<li><img src="../images/common/@img3.png" alt="이미지 설명 입력란"></li>
						<li class="on"><img src="../images/common/@img3.png" alt="이미지 설명 입력란"></li>
						<li class="mhide"><img src="../images/common/@img4.png" alt="이미지 설명 입력란"></li>
					</ul>
				</div>
				<div class="right">
					<p class="title">Water Drone 1</p>
					<div class="itemViewInputNumber">
						<input type="number" value="1">
					</div>
					<div class="grayBox">
						<ul class="itemView">
							<li>
								<label><input type="radio"> 패키지 선택안함</label>
								<span class="priceSpan">100,000</span>
								<ul class="stpe2">
									<li>
										<img src="../images/icon/icon_reply.png" alt="세부내용 아이콘">
										<label><input type="checkbox"> 추가구성1</label>
										<span class="priceSpan">+20,000</span>
									</li>
									<li>
										<img src="../images/icon/icon_reply.png" alt="세부내용 아이콘">
										<label><input type="checkbox"> 추가구성2</label>
										<span class="priceSpan">+50,000</span>
									</li>
								</ul>
							</li>
							<li>
								<label><input type="radio"> 패키지1(구성품)</label>
								<span class="priceSpan">120,000</span>
							</li>
							<li>
								<label><input type="radio"> 패키지2(구성품)</label>
								<span class="priceSpan">150,000</span>
							</li>
							<li>
								<label><input type="radio"> 패키지3(구성품)</label>
								<span class="priceSpan">170,000</span>
							</li>
						</ul>
					</div>
					<div class="grayBox post">
						배송비
						<span class="priceSpan">5,000</span>
					</div>
					<div class="priceBox">
						총 상품금액
						<span class="priceSpan">105,000</span>
					</div>
					<div class="mt20 ar">
						<a href="./store_purchase.php" class="btn type03">구매하기</a>
					</div>
				</div>
				<div class="cb"></div>
				<div class="itemContentBox">
					<img src="../images/common/@img5.jpg" alt="제품 상세 이미지 영역">
					<img src="../images/common/@img5.jpg" alt="제품 상세 이미지 영역">
					<img src="../images/common/@img5.jpg" alt="제품 상세 이미지 영역">
				</div>
			</div>
		</div>
	</section>
	<?php
		include '../footer.php'
	?>
</body>
</html>
