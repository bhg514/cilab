<?php

	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");
?>

<script type="text/javascript" src="../js/admin.js"></script>
<section class="container">	
	

	<div class="contents">
		<div class="tabletInner">
			<form enctype='multipart/form-data' id="user_update" action="user_update.php" method="post">
				<fieldset>
					<table class="product_reg_tb">
						<div>
							<div>회원관리</div>
							<div>Home  » 회원관리 » 회원관리</div>
						</div>
						<hr class="garo" style="display: block;"> 
						<div class="mt20 ar">
							<input type="submit" value="등록" id="save_btn" class="btn type07 st2">
							<a href="/" class="btn type07">취소</a>
						</div>
						<h3>■ 회원관리</h3>
						<caption>회원관리</caption>
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

<?php
	include '../admin_footer.php';
?>