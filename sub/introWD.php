<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php'
?>
<section class="container">
	<div class="visual waterdrone">
		<p class="subTitle">Water Drone소개</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>Water Drone</span>
			<span>&gt;</span>
			<span>Water Drone소개</span>
		</div>
	</div>
	<div class="contents">
		<div class="btnTab">
			<a href="./introWD.php" class="on">Water Drone소개</a>
			<a href="./introWD2.php">Water Drone활용</a>
		</div>
		<div class="colImg1">
			<img src="../images/common/water_03.png" alt="원격으로 조정되는 심해자원 탐사 및 개발용 무인잠수정">
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>
