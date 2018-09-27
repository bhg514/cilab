<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php'
?>
<section class="container">
	<div class="visual etc">
		<p class="subTitle">로그인</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>로그인</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<p class="blt01">비밀번호 변경</p>
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
						<th scope="row">아이디</th>
						<td>abcdefg1234</td>
					</tr>
					<tr>
						<th scope="row">비밀번호</th>
						<td>
							<input type="password" class="inTbl">
							<span class="fcBl fs12 b">[안전] 사용 가능한 비밀번호입니다.</span>
							<span class="fcR fs12 b hide">[사용불가]비밀번호 기준에 맞지 않습니다.</span>	<!-- span tag에 hide 유무에 따라 화면에 표현이 결정됩니다.  -->
							<p class="mt05">* 9자리 이상의 영문 소문자,특수문자,숫자를 혼합하여 입력해주세요.</p>
						</td>
					</tr>
					<tr>
						<th scope="row">비밀번호 확인</th>
						<td>
							<input type="password" class="inTbl">
							<span class="fcBl fs12 b hide">입력한 비밀번호가 일치합니다.</span>
							<span class="fcR fs12 b">비밀번호가 일치하지 않습니다.</span> <!-- span tag에 hide 유무에 따라 화면에 표현이 결정됩니다.  -->
							<p class="mt05">* 9자리 이상의 영문 소문자,특수문자,숫자를 혼합하여 입력해주세요.</p>
						</td>
					</tr>
					<tr>
						<th scope="row">휴대전화번호</th>
						<td>
							<input type="text" class="inTbl phone1">
							-
							<input type="text" class="inTbl">
							-
							<input type="text" class="inTbl">
						</td>
					</tr>
					<tr>
						<th scope="row">이메일</th>
						<td>ffffffff</td>
					</tr>
					<tr>
						<th scope="row">주소</th>
						<td>ffffffff</td>
					</tr>
					<tr>
						<th scope="row">메일수신여부</th>
						<td>
							<label><input type="radio"> 동의함</label>
							<label><input type="radio"> 동의하지 않음</label>
						</td>
					</tr>
				</tbody>
			</table>

			<div class="mt20">
				<a href="#a" class="btn type07">회원가입</a>
			</div>
			<div class="ar loginRightBtnArea">
				<a href="./find_id.php" class="btn type07 st2">ID 찾기</a>
				<a href="./find_pw.php" class="btn type07 st2">P/W 찾기</a>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>
