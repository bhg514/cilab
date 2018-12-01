<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php'
?>
<section class="container">
	<div class="visual intro">
		<p class="subTitle">Directions</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>Company Introduction</span>
			<span>&gt;</span>
			<span>Directions</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="btnTab">
				<a href="./introCilab.php">Introduction</a>
				<a href="./introCilab2.php">History</a>
				<a href="./introCilab3.php" class="on">Directions</a>
			</div>
			<div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2298.8603610752043!2d129.1461271689243!3d35.4280605821472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x35689d48698e42f7%3A0x9d88c11cde61cb70!2z7JiB7IKw64yA7ZWZ6rWQIOyWkeyCsOy6oO2NvOyKpA!5e0!3m2!1sko!2skr!4v1529819561419" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>				
				<p class="blt01">Use of public transportation</p>
				<table class="tblType02">
					<caption>Use of public transportation</caption>
					<colgroup>
						<col style="width:170px;">
						<col>
					</colgroup>
					<tbody>
						<tr>
							<th scope="row">Depart from Busan Terminal</th>
							<td>Take bus number 1127 → get off at Myeongdong village stop → take bus number 57 → arrive Yeongsan University stop → 8 minute walk</td>
						</tr>
						<tr>
							<th scope="row">Depart from Ulsan Terminal</th>
							<td>Take bus number 2100, 2300 → get off at North Town stop → take bus number 57A → arrive at Youngsan University Bus stop → 8 minute walk</td>
						</tr>
					</tbody>
				</table>
				<p class="blt01">Use of car</p>
				<table class="tblType02">
					<caption>Use of car</caption>
					<colgroup>
						<col style="width:170px;">
						<col>
					</colgroup>
					<tbody>
						<tr>
							<th scope="row">Starting from Busan</th>
							<td>Ulsan 7 National Highway → Samho intersection → Junnam Road → Youngsan University (Yangsan campus)</td>
						</tr>
						<tr>
							<th scope="row">Starting from Ulsan</th>
							<td>Gyeongbu Expressway Seoul - Busan Ulsan IC Departure: Ulsan IC → Busan Route 7 → Samho intersection → Junnam road → Youngsan University (Yangsan campus)</td>
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

