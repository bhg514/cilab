<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';

?>


<section class="container">			
	<div>
		<div class="admin_title">상품일괄등록</div>
		<div class="admin_position">Home  » 상품 관리 » 상품일괄등록</div>	
		<hr class="garo" style="display: block;"> 
	</div>	
	<div class="btn_div">
		<form enctype='multipart/form-data' id="product_upload_form" action="./product_upload_form.php" method="post">
			<input type="file" name="excel_file" id="excel_file">
			<input type="submit" value="상품등록" id="excel_up_btn" class="btn type05">
			<a class="btn type05" href="./Classes/upload_sample.xlsx">샘플파일다운로드</a>
		</form>
	</div>
	<table class="list-table">
		<caption class="readHide">상품 관리</caption>
		<thead class="admin_list">
			<tr>
				<th scope="col" class="thead_th">상품명</th>
				<th scope="col" class="thead_th">가격</th>
				<th scope="col" class="thead_th">분류</th>
				<th scope="col" class="thead_th">수량</th>
				<th scope="col" class="thead_th">상태</th>
				<th scope="col" class="thead_th">배송비</th>
				<th scope="col" class="thead_th">생산국</th>
				<th scope="col" class="thead_th">옵션</th>
				<th scope="col" class="thead_th">관리자이름</th>

			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="tbody_td">WD_1</td>
				<td class="tbody_td">250000</td>
				<td class="tbody_td">1</td>
				<td class="tbody_td">500</td>
				<td class="tbody_td">판매중</td>
				<td class="tbody_td">2500</td>
				<td class="tbody_td">대한민국</td>
				<td class="tbody_td">빨간색^300000||검은색^350000</td>
				<td class="tbody_td">김관리</td>
			</tr>
			<tr>
				<td class="tbody_td">WD_2</td>
				<td class="tbody_td">150000</td>
				<td class="tbody_td">1</td>
				<td class="tbody_td">200</td>
				<td class="tbody_td">판매중</td>
				<td class="tbody_td">2000</td>
				<td class="tbody_td">중국</td>
				<td class="tbody_td">빨간색^200000||검은색^250000</td>
				<td class="tbody_td">김관리</td>
			</tr>
			


		</tbody>
	</table>
	<p class="file_upload_notice">*주의사항*</p>
	<p class="file_upload_notice">1)분류는 아래 해당하는 숫자로 기입</p>
	<p class="file_upload_notice">1:Water Drone, 2:Upgrade & Accessories, 3:DIY & Parts,4:Water Education kit</p>
	<p class="file_upload_notice">2)옵션은 아래와 같은 포맷으로 작성</p>
	<p class="file_upload_notice">옵션명1^가격1||옵션명2^가격2</p>


</section>