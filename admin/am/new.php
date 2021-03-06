<?php

	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");
?>

<script type="text/javascript" src="../js/admin.js"></script>
<section class="container">	
	
	<div class="">
		<div class="tabletInner">
			<form enctype='multipart/form-data' id="admin_insert" action="admin_insert.php" method="post">
				<fieldset>
					<table>
						<div>
							<div class="admin_title">관리자관리</div>
							<div class="admin_position">Home  » 관리자관리 » 관리자관리</div>
						</div>
						<hr class="garo" style="display: block;"> 
						<div class="mt20 ar">
							<input type="submit" value="등록" id="save_btn" class="btn type05">
							<a href="/" class="btn type05">취소</a>
						</div>
						<h4>■ 관리자관리</h4>
						<caption>관리자관리</caption>
						<colgroup>
							<col style="width:170px;">
							<col>
						</colgroup>
						<tbody>
							<tr>
								<th scope="row">아이디</th>
								<td colspan="3">
									<input type="text" name="id" value="">
								</td>
							</tr>
							<tr>
								<th scope="row">비밀번호</th>
								<td colspan="3"><input id="pw" type="password" name="pw"></td>
							</tr>
							<tr>
								<th scope="row">비밀번호 확인</th>
								<td colspan="3">
									<input id="pw_re" type="password" >
									<span id="wrong_pw" class="fcR ml05 fs12 b hide">비밀번호가 일치하지 않습니다.</span>
								</td>
							</tr>
							<tr>						
								<th scope="row">이름</th>						
								<td colspan="3">
									<input type="text" name="name" value="">
								</td>
							</tr>	
							<tr>
								<th scope="row">소속</th>
								<td colspan="3">
									<input type="text" name="group" value="">
								</td>
							</tr>
							<tr>
								<th scope="row">직위</th>
								<td colspan="3">
									<input type="text" name="position" vvalue="">
								</td>						
							</tr>
							<tr>
								<th scope="row">전화번호</th>
								<td colspan="3">
									<input type="text" name="hp1" value="">-
									<input type="text" name="hp2" value="">-
									<input type="text" name="hp3" value="">
								</td>								
							</tr>									
						</tbody>
					</table>
				</fieldset>
			</form>
		</div>
	</div>

</section>
</body>
</html>