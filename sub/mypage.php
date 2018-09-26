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
			<div class="tabletInner">
				<div class="tblType01Wrap">
					<table class="tblType01 listView">
						<caption>주문정보</caption>
						<colgroup>
							<col style="width:120px;">
							<col>
							<col style="width:115px;">
							<col style="width:75px;">
							<col style="width:110px;">
							<col style="width:110px;">
							<col style="width:110px;">
							<col style="width:110px;">
						</colgroup>
						<thead>
							<tr>
								<th scope="col">주문일자</th>
								<th scope="col">상품명</th>
								<th scope="col">총액</th>
								<th scope="col">상태</th>
								<th scope="col">배송조회</th>
								<th scope="col">반품신청</th>
								<th scope="col">환불신청</th>
								<th scope="col">구매확정</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>2017.09.02</td>
								<td class="title">ROV1</td>
								<td>255,000원</td>
								<td>배송중</td>
								<td><a href="#a" class="btn type05">배송조회</a></td>
								<td><a href="#a" class="btn type05">반품신청</a></td>
								<td><a href="#a" class="btn type05">환불신청</a></td>
								<td><a href="#a" class="btn type05">구매확정</a></td>
							</tr>
							<tr>
								<td>2017.09.02</td>
								<td class="title">ROV1</td>
								<td>255,000원</td>
								<td>배송중</td>
								<td><a href="#a" class="btn type05">배송조회</a></td>
								<td><a href="#a" class="btn type05">반품신청</a></td>
								<td><a href="#a" class="btn type05">환불신청</a></td>
								<td><a href="#a" class="btn type05">구매확정</a></td>
							</tr>
							<tr>
								<td>2017.09.02</td>
								<td class="title">ROV1</td>
								<td>255,000원</td>
								<td>배송중</td>
								<td><a href="#a" class="btn type05">배송조회</a></td>
								<td><a href="#a" class="btn type05">반품신청</a></td>
								<td><a href="#a" class="btn type05">환불신청</a></td>
								<td><a href="#a" class="btn type05">구매확정</a></td>
							</tr>
							<tr>
								<td>2017.09.02</td>
								<td class="title">ROV1</td>
								<td>255,000원</td>
								<td>배송중</td>
								<td><a href="#a" class="btn type05">배송조회</a></td>
								<td><a href="#a" class="btn type05">반품신청</a></td>
								<td><a href="#a" class="btn type05">환불신청</a></td>
								<td><a href="#a" class="btn type05">구매확정</a></td>
							</tr>
							<tr>
								<td>2017.09.02</td>
								<td class="title">ROV1</td>
								<td>255,000원</td>
								<td>배송중</td>
								<td><a href="#a" class="btn type05">배송조회</a></td>
								<td><a href="#a" class="btn type05">반품신청</a></td>
								<td><a href="#a" class="btn type05">환불신청</a></td>
								<td><a href="#a" class="btn type05">구매확정</a></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="mt20 fs15">
					<label><input type="checkbox"> 상품구매에 동의합니다.</label>
				</div>
				<div class="mt20 ar">
					<a href="#a" class="btn type06">상품구매</a>
					<a href="#a" class="btn type06 st2">취소</a>
				</div>
			</div>
		</div>
	</section>
	<?php
		include '../footer.php'
	?>
</body>
</html>
