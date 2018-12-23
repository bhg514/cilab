<?php
	header ( "content-type:text/html; charset=utf-8" );	
	include '../header.php';
	include_once('../common.php');
	if(isset($_SESSION['user_id'])){
		header("location:https://".$http_host."/index.php");
	}

?>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/additional-methods.min.js"></script>
<script type="text/javascript" src="../js/register.js"></script>

<section class="container">
	<div class="visual etc">
		<p class="subTitle">Sign Up</p>
		<div class="location">
			<img src="https://cilab.kr/images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>Membership</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="completeJoin">
				<p class="txt1">Signed up</p>
				<p class="txt2">I sincerely congratulate you on becoming a member.</p>
			</div>
			<div class="mt20 ar">
				<a href="/" class="btn type07 st2">Home</a>
				<a href="/member/login.php" class="btn type07">Login</a>
			</div>
		</div>
	</div>
</section>

<?php include '../footer.php' ?>

<?php	  	
	if (isset($_SESSION['reg_user_id'])){
  		session_destroy();
	}else{
		header("Location: https://".$http_host."");
	}
  	
?>