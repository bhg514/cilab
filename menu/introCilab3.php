<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php'
?>
<section class="container">
	<div class="visual intro">
		<p class="subTitle">찾아오시는 길</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>기업소개</span>
			<span>&gt;</span>
			<span>찾아오시는 길</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="btnTab">
				<a href="./introCilab.php">소개</a>
				<a href="./introCilab2.php">History</a>
				<a href="./introCilab3.php" class="on">찾아오시는 길</a>
			</div>
			<div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2298.8603610752043!2d129.1461271689243!3d35.4280605821472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x35689d48698e42f7%3A0x9d88c11cde61cb70!2z7JiB7IKw64yA7ZWZ6rWQIOyWkeyCsOy6oO2NvOyKpA!5e0!3m2!1sko!2skr!4v1529819561419" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>				
				<p class="blt01">대중교통 이용시</p>
				<table class="tblType02">
					<caption>대중교통 이용시</caption>
					<colgroup>
						<col style="width:170px;">
						<col>
					</colgroup>
					<tbody>
						<tr>
							<th scope="row">부산터미널 이용시</th>
							<td>1127번 버스 탑승 → 명동마을 정류장 하차 → 57번 버스 탑승 → 영산대학교 정류장 도착 → 도보 8분</td>
						</tr>
						<tr>
							<th scope="row">울산터미널 이용시</th>
							<td>2100, 2300번 버스 탑승 → 북부마을 정류장 하차 → 57A번 버스 탑승 → 영산대학교 정류장 도착 → 도보 8분</td>
						</tr>
					</tbody>
				</table>
				<p class="blt01">자가용 이용시</p>
				<table class="tblType02">
					<caption>자가용 이용시</caption>
					<colgroup>
						<col style="width:170px;">
						<col>
					</colgroup>
					<tbody>
						<tr>
							<th scope="row">부산 방면</th>
							<td>울산방향 7번 국도 → 삼호사거리 → 주남로 →영산대학교(양산캠퍼스)</td>
						</tr>
						<tr>
							<th scope="row">울산 방면</th>
							<td>경부고속도로 서울-부산방향 울산IC 출발 : 울산IC → 부산방향 7번 국도 → 삼호사거리 → 주남로 → 영산대학교(양산캠퍼스)</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>

