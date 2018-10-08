<?php
	header ( "content-type:text/html; charset=utf-8" );	
	include '../header.php';
	include_once('../common.php');
	if(isset($_SESSION['user_id'])&&isset($_SESSION['user_name'])){
		header('location:http://localhost/index.php');
	}

?>
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>

<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/additional-methods.min.js"></script>
<script type="text/javascript" src="../js/register.js"></script>

<section class="container">
	<div class="visual etc">
		<p class="subTitle">회원가입</p>
		<div class="location">
			<img src="http://cilab.kr/images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>회원가입</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="completeJoin">
				<p class="txt1">가입완료</p>
				<p class="txt2">회원이 되신 것을 진심으로 축하합니다.</p>
			</div>
			<div class="mt20 ar">
				<a href="/" class="btn type07 st2">홈으로</a>
				<a href="/member/login.php" class="btn type07">로그인</a>
			</div>
		</div>
	</div>
</section>

<?php include '../footer.php' ?>

<?php	  	
	if (isset($_SESSION['reg_user_id'])){
  		session_destroy();
	}else{
		header("Location: http://localhost");
	}
  	
?>