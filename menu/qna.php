<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php'
?>
<section class="container">
	<div class="visual support">
		<p class="subTitle">문의하기</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>SUPPORT</span>
			<span>&gt;</span>
			<span>문의하기</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="btnTab">
				<a href="./notice.php">공지사항</a>
				<a href="./sw_download.php">S/W 다운로드</a>
				<a href="./qna.php" class="on">문의하기</a>
			</div>
			<table class="tblType02">
				<caption>문의하기</caption>
				<colgroup>
					<col style="width:170px;">
					<col>
				</colgroup>
				<tbody>
					<tr>
						<th scope="row">제목</th>
						<td><input type="text" class="inTbl" style="width:100%;"></td>
					</tr>
					<tr>
						<th scope="row">내용</th>
						<td>
							<textarea cols="" rows="" class="inTblTextarea"></textarea>
						</td>
					</tr>
					<tr>
						<th scope="row">첨부파일</th>
						<td><input type="file"></td>
					</tr>
					<tr>
						<th scope="row">비밀번호</th>
						<td><input type="password" class="inTbl"></td>
					</tr>
				</tbody>
			</table>
			<div class="mt20 ar">
				<a href="#a" class="btn type06">등록</a>
				<a href="#a" class="btn type06 st2">취소</a>
			</div>				
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>
