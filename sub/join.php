<!DOCTYPE html>
<html lang="ko">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<title>회원가입 - CiLab</title>
	<link rel="stylesheet" type="text/css" href="../css/common.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/mobile_menu_styles.css">
	<link rel="stylesheet" media="screen and (max-width:999px)" type="text/css" href="../css/tablet.css">
	<link rel="stylesheet" media="screen and (max-width:480px)" type="text/css" href="../css/mobile.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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
			<p class="subTitle">회원가입</p>
			<div class="location">
				<img src="../images/common/icon_home.png" alt="Home">
				<span>&gt;</span>
				<span>회원가입</span>
			</div>
		</div>
		<div class="contents">
			<div class="tabletInner">
				<div class="joinBox">
					<form action="join_form.php" method="post">
						<div class="contract1">
							<div class="title">◎회원약관 확인</div>
							<div class="content">
								<div class="subTitle"><b class="b_red">(필수)</b>사이트 이용약관</div>
								<textarea class="agree_text">전자상거래(인터넷사이버몰) 표준약관</textarea> 
								<div class="radio_chk">
									<input type="radio" name="agree1" value="y">동의함 
									<input type="radio" name="agree1" value="n">동의안함
								</div>
							</div>
						</div>
						<div class="contract2">
							<div class="title">◎개인정보보호법 제15조, 제24조에 의한 수집ㆍ이용에 동의</div>
							<div class="content">
								<div class="subTitle"><b class="b_red">(필수)</b>개인정보 수집 이용동의</div>
								<textarea class="agree_text">1. 개인정보의 처리 목적 (‘cilab.kr’이하 ‘cilab.kr’) 은(는) 다음의 목적을 위하여 개인정보를 처리하고 있으며, 다음의 목적 이외의 용도로는 이용하지 않습니다.</textarea>
								<div class="radio_chk">
									<input type="radio" name="agree2" value="y">동의함 
									<input type="radio" name="agree2" value="n">동의안함
								</div>
							</div>
						</div>					
					
						<div class="ac">
							<input type="submit" name="submit" class="btn_submit btn type07 st2" value="회원가입" OnClick="return fregister_submit()">
							<a href="/index.php" class="btn type07 st2">취소</a>
						</div>
					</form>		
					<script>
				    function fregister_submit(f)
				    {
						var agree1_val = $('input[name="agree1"]:checked').val()
						var agree2_val = $('input[name="agree2"]:checked').val()
						if(agree1_val == 'y' && agree2_val == 'y'){
							return true;
						}else if(agree1_val != 'y'){
							alert("회원가입약관의 내용에 동의하셔야 회원가입 하실 수 있습니다.");							
							return false;
						}else if(agree2_val != 'y'){
							alert("개인정보수집 이용동의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
							return false;
						}
				        
				    }
				    </script>			
				</div>
			</div>
		</div>
	</section>
	<?php
		include '../footer.php'
	?>
</body>
</html>
