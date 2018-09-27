<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php'
?>
<section class="container">
	<div class="visual waterdrone">
		<p class="subTitle">Water Drone활용</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>Water Drone</span>
			<span>&gt;</span>
			<span>Water Drone활용</span>
		</div>
	</div>
	<div class="contents">
		<div class="btnTab">
			<a href="./introWD.php">Water Drone소개</a>
			<a href="./introWD2.php" class="on">Water Drone활용</a>
		</div>
		<div class="colImg1">
			<img src="../images/common/water_01.png" alt="Water Drone를 활용한 환경 모니터링에 대한 간략한 설명 ">
		</div>
		<div class="ar colImg1">
			<img src="../images/common/water_02.png" alt="Water Drone를 활용한 수중 관광에 대한 간략한 설명 ">
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>
