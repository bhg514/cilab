<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php'
?>
<section class="container">
	<div class="visual etc">
		<p class="subTitle">Login</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>Login</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<p class="blt01">Change Password</p>
			<table class="tblType02">
				<caption>User Info</caption>
				<colgroup>
					<col style="width:170px;">
					<col>
				</colgroup>
				<tbody>
					<tr>
						<th scope="row">Name</th>
						<td>홍길동</td>
					</tr>
					<tr>
						<th scope="row">ID</th>
						<td>abcdefg1234</td>
					</tr>
					<tr>
						<th scope="row">Password</th>
						<td>
							<input type="password" class="inTbl">
							<span class="fcBl fs12 b">[안전] 사용 가능한 비밀번호입니다.</span>
							<span class="fcR fs12 b hide">[사용불가] 비밀번호 기준에 맞지 않습니다.</span>	<!-- span tag에 hide 유무에 따라 화면에 표현이 결정됩니다.  -->
							<p class="mt05">* 9자리 이상의 영문 소문자,특수문자,숫자를 혼합하여 입력해주세요.</p>
						</td>
					</tr>
					<tr>
						<th scope="row">Confirm Password</th>
						<td>
							<input type="password" class="inTbl">
							<span class="fcBl fs12 b hide">입력한 비밀번호가 일치합니다.</span>
							<span class="fcR fs12 b">비밀번호가 일치하지 않습니다.</span> <!-- span tag에 hide 유무에 따라 화면에 표현이 결정됩니다.  -->
							<p class="mt05">* 9자리 이상의 영문 소문자,특수문자,숫자를 혼합하여 입력해주세요.</p>
						</td>
					</tr>
					<tr>
						<th scope="row">Cellphone</th>
						<td>
							<input type="text" class="inTbl phone1">
							-
							<input type="text" class="inTbl">
							-
							<input type="text" class="inTbl">
						</td>
					</tr>
					<tr>
						<th scope="row">E-mail</th>
						<td></td>
					</tr>
					<tr>
						<th scope="row">Adrress</th>
						<td></td>
					</tr>
					<tr>
						<th scope="row">Whether to receive email</th>
						<td>
							<label><input type="radio">Agree</label>
							<label><input type="radio">Disagree</label>
						</td>
					</tr>
				</tbody>
			</table>

			<div class="mt20">
				<a href="#a" class="btn type07">Register</a>
			</div>
			<div class="ar loginRightBtnArea">
				<a href="./find_id.php" class="btn type07 st2">Find ID</a>
				<a href="./find_pw.php" class="btn type07 st2">Find Password</a>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>
