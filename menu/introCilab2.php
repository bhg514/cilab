<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php'
?>
<section class="container">
	<div class="visual intro">
		<p class="subTitle">조직도</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>기업소개</span>
			<span>&gt;</span>
			<span>조직도</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="btnTab">
				<a href="./introCilab.php">소개</a>
				<a href="./introCilab2.php" class="on">조직도</a>
				<a href="./introCilab3.php">찾아오시는 길</a>
			</div>
			<div class="oraganization">
				<img src="../images/common/img_organization.png" alt="cilab 조직도">
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>

