<!DOCTYPE html>
<html lang="ko">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<title>비밀번호 변경 - CiLab</title>
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
				<p class="blt01">비밀번호 변경</p>
				<table class="tblType02">
					<caption>구매자정보</caption>
					<colgroup>
						<col style="width:170px;">
						<col>
					</colgroup>
					<tbody>
						<tr>
							<th scope="row">이름</th>
							<td>홍길동</td>
						</tr>
						<tr>
							<th scope="row">아이디</th>
							<td>abcdefg1234</td>
						</tr>
						<tr>
							<th scope="row">비밀번호</th>
							<td>
								<input type="password" class="inTbl">
								<span class="fcBl fs12 b">[안전] 사용 가능한 비밀번호입니다.</span>
								<span class="fcR fs12 b hide">[사용불가]비밀번호 기준에 맞지 않습니다.</span>	<!-- span tag에 hide 유무에 따라 화면에 표현이 결정됩니다.  -->
								<p class="mt05">* 9자리 이상의 영문 소문자,특수문자,숫자를 혼합하여 입력해주세요.</p>
							</td>
						</tr>
						<tr>
							<th scope="row">비밀번호 확인</th>
							<td>
								<input type="password" class="inTbl">
								<span class="fcBl fs12 b hide">입력한 비밀번호가 일치합니다.</span>
								<span class="fcR fs12 b">비밀번호가 일치하지 않습니다.</span> <!-- span tag에 hide 유무에 따라 화면에 표현이 결정됩니다.  -->
								<p class="mt05">* 9자리 이상의 영문 소문자,특수문자,숫자를 혼합하여 입력해주세요.</p>
							</td>
						</tr>
						<tr>
							<th scope="row">휴대전화번호</th>
							<td>
								<input type="text" class="inTbl phone1">
								-
								<input type="text" class="inTbl">
								-
								<input type="text" class="inTbl">
							</td>
						</tr>
						<tr>
							<th scope="row">이메일</th>
							<td>ffffffff</td>
						</tr>
						<tr>
							<th scope="row">주소</th>
							<td>ffffffff</td>
						</tr>
						<tr>
							<th scope="row">메일수신여부</th>
							<td>
								<label><input type="radio"> 동의함</label>
								<label><input type="radio"> 동의하지 않음</label>
							</td>
						</tr>
					</tbody>
				</table>

				<div class="mt20">
					<a href="#a" class="btn type07">회원가입</a>
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
