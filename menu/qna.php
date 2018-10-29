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
				<a href="./list.php?type=1" >공지사항</a>
                <a href="./list.php?type=2" >S/W 다운로드</a>
				<a href="./list.php?type=4" class="on">문의하기</a>
			</div>
			<table class="tblType02">
				<caption>문의하기</caption>
				<colgroup>
					<col style="width:170px;">
					<col>
				</colgroup>
				<tbody>
					<form enctype='multipart/form-data' id="product_form" action="./product_form.php" method="post">
						<tr>
							<th scope="row">제목</th>
							<td><input type="text" class="inTbl" name="title" style="width:100%;"></td>
						</tr>
						<tr>
							<th scope="row">내용</th>
							<td>
								<textarea cols="" rows="" class="inTblTextarea" name="content"></textarea>
							</td>
						</tr>
						<tr>
							<th scope="row">첨부파일</th>
							<td><input type="file" name=file></td>
						</tr>
						<tr>
							<th scope="row">비밀번호</th>
							<td><input type="password" class="inTbl" name=pw></td>
						</tr>
					</form>
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
