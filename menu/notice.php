<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php'
?>
<section class="container">
	<div class="visual support">
		<p class="subTitle">공지사항</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>SUPPORT</span>
			<span>&gt;</span>
			<span>공지사항</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="btnTab">
				<a href="./notice.php" class="on">공지사항</a>
				<a href="./sw_download.php">S/W 다운로드</a>
				<a href="./qna.php">문의하기</a>
			</div>
			<table class="tblType01 listView">
				<caption>문의하기</caption>
				<colgroup>
					<col style="width:70px;" class="mhide">
					<col>
					<col class="qnaVersion">
					<col class="qnaDown">
				</colgroup>
				<thead>
					<tr>
						<th scope="col" class="mhide">번호</th>
						<th scope="col" class="mNoBg">S/W 명</th>
						<th scope="col">버전</th>
						<th scope="col">다운로드</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="mhide">10</td>
						<td class="title"><a href="#a">Water Drone 매뉴얼Water Drone 매뉴얼Water Drone 매뉴얼Water Drone 매뉴얼Water Drone 매뉴얼Water Drone 매뉴얼Water Drone 매뉴얼Water Drone 매뉴얼Water Drone 매뉴얼Water Drone 매뉴얼Water Drone 매뉴얼Water Drone 매뉴얼</a></td>
						<td>1.0</td>
						<td><a href="#a"><img src="../images/icon/icon_down.png" alt="다운로드"></a></td>
					</tr>
					<tr>
						<td class="mhide">8</td>
						<td class="title"><a href="#a">Water Drone 제품 드라이버</a></td>
						<td>1.5</td>
						<td><a href="#a"><img src="../images/icon/icon_down.png" alt="다운로드"></a></td>
					</tr>
					<tr>
						<td class="mhide">10</td>
						<td class="title"><a href="#a">Water Drone 매뉴얼</a></td>
						<td>1.0</td>
						<td><a href="#a"><img src="../images/icon/icon_down.png" alt="다운로드"></a></td>
					</tr>
					<tr>
						<td class="mhide">8</td>
						<td class="title"><a href="#a">Water Drone 제품 드라이버</a></td>
						<td>1.5</td>
						<td><a href="#a"><img src="../images/icon/icon_down.png" alt="다운로드"></a></td>
					</tr>
					<tr>
						<td class="mhide">10</td>
						<td class="title"><a href="#a">Water Drone 매뉴얼</a></td>
						<td>1.0</td>
						<td><a href="#a"><img src="../images/icon/icon_down.png" alt="다운로드"></a></td>
					</tr>
					<tr>
						<td class="mhide">8</td>
						<td class="title"><a href="#a">Water Drone 제품 드라이버</a></td>
						<td>1.5</td>
						<td><a href="#a"><img src="../images/icon/icon_down.png" alt="다운로드"></a></td>
					</tr>
					<tr>
						<td class="mhide">10</td>
						<td class="title"><a href="#a">Water Drone 매뉴얼</a></td>
						<td>1.0</td>
						<td><a href="#a"><img src="../images/icon/icon_down.png" alt="다운로드"></a></td>
					</tr>
					<tr>
						<td class="mhide">8</td>
						<td class="title"><a href="#a">Water Drone 제품 드라이버</a></td>
						<td>1.5</td>
						<td><a href="#a"><img src="../images/icon/icon_down.png" alt="다운로드"></a></td>
					</tr>
					<tr>
						<td class="mhide">10</td>
						<td class="title"><a href="#a">Water Drone 매뉴얼</a></td>
						<td>1.0</td>
						<td><a href="#a"><img src="../images/icon/icon_down.png" alt="다운로드"></a></td>
					</tr>
					<tr>
						<td class="mhide">8</td>
						<td class="title"><a href="#a">Water Drone 제품 드라이버</a></td>
						<td>1.5</td>
						<td><a href="#a"><img src="../images/icon/icon_down.png" alt="다운로드"></a></td>
					</tr>
				</tbody>
			</table>
			<div id="paging">
				<a href="#a"><img src="../images/icon/btn_first.png" alt="처음으로"></a>
				<a href="#a"><img src="../images/icon/btn_prev.png" alt="이전으로"></a>
				<a href="#a">1</a>
				<a href="#a" class="on">2</a>
				<a href="#a">3</a>
				<a href="#a" class="mhide">4</a>
				<a href="#a" class="mhide">5</a>
				<a href="#a" class="mhide">6</a>
				<a href="#a" class="mhide">7</a>
				<a href="#a" class="mhide">8</a>
				<a href="#a" class="mhide">9</a>
				<a href="#a" class="mhide">10</a>
				<a href="#a"><img src="../images/icon/btn_next.png" alt="다음으로"></a>
				<a href="#a"><img src="../images/icon/btn_last.png" alt="마지막으로"></a>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>