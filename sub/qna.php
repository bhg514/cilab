<!DOCTYPE html>
<html lang="ko">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<title>문의하기 - CiLab</title>
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
		<div class="visual support">
			<p class="subTitle">문의하기</p>
			<div class="location">
				<img src="../images/common/icon_home.png" alt="Home">
				<span>&gt;</span>
				<span>SUPPORT</span>
				<span>&gt;</span>
				<span>문의하기</span>
			</div>
		</div>
		<div class="contents">
			<div class="tabletInner">
				<div class="btnTab">
					<a href="./notice.php">공지사항</a>
					<a href="./sw_download.php">S/W 다운로드</a>
					<a href="./qna.php" class="on">문의하기</a>
				</div>
				<table class="tblType02">
					<caption>문의하기</caption>
					<colgroup>
						<col style="width:170px;">
						<col>
					</colgroup>
					<tbody>
						<tr>
							<th scope="row">제목</th>
							<td><input type="text" class="inTbl" style="width:100%;"></td>
						</tr>
						<tr>
							<th scope="row">내용</th>
							<td>
								<textarea cols="" rows="" class="inTblTextarea"></textarea>
							</td>
						</tr>
						<tr>
							<th scope="row">첨부파일</th>
							<td><input type="file"></td>
						</tr>
						<tr>
							<th scope="row">비밀번호</th>
							<td><input type="password" class="inTbl"></td>
						</tr>
					</tbody>
				</table>
				<div class="mt20 ar">
					<a href="#a" class="btn type06">등록</a>
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
