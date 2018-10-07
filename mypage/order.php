<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php'
?>
<section class="container">
	<div class="visual store">
		<p class="subTitle">STORE</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>STORE</span>
		</div>
	</div>
	<div class="contents">
		<div class="btnTab">
			<a href="./info.php" >정보 수정</a>
			<a href="./order.php" class="on">배송 조회</a>
		</div>
		<div class="tabletInner">
			<div class="tblType01Wrap">
				<table class="tblType01 listView">
					<caption>주문정보</caption>
					<colgroup>
						<col style="width:120px;">
						<col>
						<col style="width:115px;">
						<col style="width:75px;">
						<col style="width:110px;">
						<col style="width:110px;">
						<col style="width:110px;">
						<col style="width:110px;">
					</colgroup>
					<thead>
						<tr>
							<th scope="col">주문일자</th>
							<th scope="col">상품명</th>
							<th scope="col">총액</th>
							<th scope="col">상태</th>
							<th scope="col">배송조회</th>
							<th scope="col">반품신청</th>
							<th scope="col">환불신청</th>
							<th scope="col">구매확정</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>2017.09.02</td>
							<td class="title">ROV1</td>
							<td>255,000원</td>
							<td>배송중</td>
							<td><a href="#a" class="btn type05">배송조회</a></td>
							<td><a href="#a" class="btn type05">반품신청</a></td>
							<td><a href="#a" class="btn type05">환불신청</a></td>
							<td><a href="#a" class="btn type05">구매확정</a></td>
						</tr>
						<tr>
							<td>2017.09.02</td>
							<td class="title">ROV1</td>
							<td>255,000원</td>
							<td>배송중</td>
							<td><a href="#a" class="btn type05">배송조회</a></td>
							<td><a href="#a" class="btn type05">반품신청</a></td>
							<td><a href="#a" class="btn type05">환불신청</a></td>
							<td><a href="#a" class="btn type05">구매확정</a></td>
						</tr>
						<tr>
							<td>2017.09.02</td>
							<td class="title">ROV1</td>
							<td>255,000원</td>
							<td>배송중</td>
							<td><a href="#a" class="btn type05">배송조회</a></td>
							<td><a href="#a" class="btn type05">반품신청</a></td>
							<td><a href="#a" class="btn type05">환불신청</a></td>
							<td><a href="#a" class="btn type05">구매확정</a></td>
						</tr>
						<tr>
							<td>2017.09.02</td>
							<td class="title">ROV1</td>
							<td>255,000원</td>
							<td>배송중</td>
							<td><a href="#a" class="btn type05">배송조회</a></td>
							<td><a href="#a" class="btn type05">반품신청</a></td>
							<td><a href="#a" class="btn type05">환불신청</a></td>
							<td><a href="#a" class="btn type05">구매확정</a></td>
						</tr>
						<tr>
							<td>2017.09.02</td>
							<td class="title">ROV1</td>
							<td>255,000원</td>
							<td>배송중</td>
							<td><a href="#a" class="btn type05">배송조회</a></td>
							<td><a href="#a" class="btn type05">반품신청</a></td>
							<td><a href="#a" class="btn type05">환불신청</a></td>
							<td><a href="#a" class="btn type05">구매확정</a></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="mt20 fs15">
				<label><input type="checkbox"> 상품구매에 동의합니다.</label>
			</div>
			<div class="mt20 ar">
				<a href="#a" class="btn type06">상품구매</a>
				<a href="#a" class="btn type06 st2">취소</a>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>

