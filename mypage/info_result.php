<?php
	header ( "content-type:text/html; charset=utf-8" );	
	include '../header.php';
	include_once('../common.php');
	if(!isset($_SESSION['user_id'])|| $_SESSION['user_type']=="a"){
		header("location:https://".$http_host."/index.php");
	}

?>

<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/additional-methods.min.js"></script>
<script type="text/javascript" src="../js/register.js"></script>

<section class="container">
	<div class="visual etc">
		<p class="subTitle">Modify information</p>
		<div class="location">
			<img src="https://cilab.kr/images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>My page</span>
			<span>&gt;</span>
			<span>Modify information</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="completeJoin">
				<p class="txt1">Modifications completed</p>
				<p class="txt2">Your information has been modified.</p>
			</div>
			<div class="mt20 ar">
				<a href="/" class="btn type07 st2">Home</a>
				<a href="./order.php" class="btn type07">Mypage</a>
			</div>
		</div>
	</div>
</section>

<?php include '../footer.php' ?>

