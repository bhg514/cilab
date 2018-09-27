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
		<div class="tabletInner">
			<p class="blt01 mt00">주문정보</p>
			<div class="tblType01Wrap">
				<table class="tblType01">
					<caption>주문정보</caption>
					<colgroup>
						<col>
						<col>
						<col style="width:105px;">
						<col style="width:115px;">
						<col style="width:105px;">
						<col style="width:115px;">
					</colgroup>
					<thead>
						<tr>
							<th scope="col">상품명</th>
							<th scope="col">주문옵션</th>
							<th scope="col">수량</th>
							<th scope="col">가격</th>
							<th scope="col">배송비</th>
							<th scope="col">총액</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Water Drone1</td>
							<td>패키지1(구성품)</td>
							<td>1</td>
							<td>240,000</td>
							<td>5,000</td>
							<td>245,000</td>
						</tr>
					</tbody>
				</table>
			</div>
			<p class="blt01">구매자정보</p>
			<table class="tblType02">
				<caption>구매자정보</caption>
				<colgroup>
					<col style="width:170px;">
					<col>
				</colgroup>
				<tbody>
					<tr>
						<th scope="row">이름</th>
						<td>홍길동</td>
					</tr>
					<tr>
						<th scope="row">전화번호</th>
						<td>010-1234-1234</td>
					</tr>
					<tr>
						<th scope="row">이메일</th>
						<td>1234@naver.com</td>
					</tr>
					<tr>
						<th scope="row">주소</th>
						<td>서울시 강동구 천호동</td>
					</tr>
				</tbody>
			</table>
			<p class="blt01">배송지정보</p>
			<div class="ar">
				<a href="#a" class="btn type04">배송지 변경</a>
			</div>
			<table class="tblType02">
				<caption>배송지정보</caption>
				<colgroup>
					<col style="width:170px;">
					<col>
				</colgroup>
				<tbody>
					<tr>
						<th scope="row">받는사람</th>
						<td><input type="text" class="inTbl" placeholder="홍길동"></td>
					</tr>
					<tr>
						<th scope="row">주소</th>
						<td>
							<div><input type="text" class="inTbl"> <a href="#a" class="btn type05">우편번호</a></div>
							<div class="mt05"><input type="text" class="inTbl" placeholder="상세주소를 입력하세요."></div>
						</td>
					</tr>
					<tr>
						<th scope="row">전화번호</th>
						<td>1234@naver.com</td>
					</tr>
					<tr>
						<th scope="row">배송시 요청사항</th>
						<td>서울시 강동구 천호동</td>
					</tr>
				</tbody>
			</table>
			<p class="blt01">결제정보</p>
			<table class="tblType02">
				<caption>결제정보</caption>
				<colgroup>
					<col style="width:170px;">
					<col>
				</colgroup>
				<tbody>
					<tr>
						<th scope="row">총액</th>
						<td>255,000</td>
					</tr>
					<tr>
						<th scope="row">결제방법</th>
						<td>
							<div>
								<label><input type="radio"> 신용카드</label>
								<label><input type="radio"> 무통장 입금</label>
								<label><input type="radio"> 핸드폰 결제</label>
							</div>
							<div class="mt05">
								<select class="inTbl">
									<option>카드사 선택</option>
								</select>
								<select class="inTbl">
									<option>할부 선택</option>
								</select>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="mt20 fs14">
				<label><input type="checkbox"> 상품구매에 동의합니다.</label>
			</div>
			<div class="mt20 ar">
				<a href="./store_complete.php" class="btn type06">상품구매</a>
				<a href="#a" class="btn type06 st2">취소</a>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>

