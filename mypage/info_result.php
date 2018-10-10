<?php
	header ( "content-type:text/html; charset=utf-8" );	
	include '../header.php';
	include_once('../common.php');
	if(!isset($_SESSION['user_id'])&&!isset($_SESSION['user_name'])){
		header('location:http://localhost/index.php');
	}

?>
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>

<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/additional-methods.min.js"></script>
<script type="text/javascript" src="../js/register.js"></script>

<section class="container">
	<div class="visual etc">
		<p class="subTitle">정보수정</p>
		<div class="location">
			<img src="http://cilab.kr/images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>마이페이지</span>
			<span>&gt;</span>
			<span>정보수정</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="completeJoin">
				<p class="txt1">수정완료</p>
				<p class="txt2">정보 수정이 완료 되었습니다.</p>
			</div>
			<div class="mt20 ar">
				<a href="/" class="btn type07 st2">홈으로</a>
				<a href="./order.php" class="btn type07">마이페이지</a>
			</div>
		</div>
	</div>
</section>

<?php include '../footer.php' ?>

