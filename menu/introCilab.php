<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php'
?>
<section class="container">
	<div class="visual intro">
		<p class="subTitle">소개</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>기업소개</span>
			<span>&gt;</span>
			<span>소개</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="btnTab">
				<a href="./introCilab.php" class="on">소개</a>
				<a href="./introCilab2.php">조직도</a>
				<a href="./introCilab3.php">찾아오시는 길</a>
			</div>
			<div class="cilab">
				<p class="img">Creative Idea Lab</p>
				<p class="text">기업에 대한 소개글 출력</p>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>
