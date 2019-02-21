<?php
// 옵션 사이즈 늘리기
	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");
	$no = $_GET['no'];
	if($no==null){
		header("location:https://".$http_host."/admin/um/list.php");		
	};

	$info = user_get_info($no,"tb_user");
?>

<script type="text/javascript" src="../js/admin.js"></script>
<section class="container">	
	
	<div class="">
		<div class="tabletInner">
			<form enctype='multipart/form-data' id="user_update" action="user_update.php" method="post">
				<fieldset>
					<table>
						<div>
							<div class="admin_title">회원관리</div>
							<div class="admin_position">Home  » 회원관리 » 회원관리</div>
						</div>
						<hr class="garo" style="display: block;"> 
						<div class="mt20 ar">
							<input type="submit" value="등록" id="save_btn" class="btn type05">
							<a id="info_del" class="btn type05">삭제</a>
							<a href="/admin/um/list.php" class="btn type05">목록</a>
						</div>
						<h4>■ 회원관리</h4>
						<caption>회원관리</caption>
						<colgroup>
							<col style="width:170px;">
							<col>
						</colgroup>
						<tbody>
							<tr>						
								<th scope="row">이름</th>						
								<td colspan="3"><?=$info['fd_name']?>
									<input type="hidden" name="no" id="no" value="<?=$info['pk_no'] ?>">
								</td>
							</tr>					
							<tr>
								<th scope="row">아이디</th>
								<td colspan="3"><?=$info['fd_id']?></td>
							</tr>
							<tr>
								<th scope="row">비밀번호</th>
								<td colspan="3"><input type="password" name="pw" id="pw"></td>
							</tr>
							<tr>
								<th scope="row">비밀번호 확인</th>
								<td colspan="3">
									<input type="password" name="pw_re" id="pw_re">
									<span id="wrong_pw" class="fcR ml05 fs12 b hide">비밀번호가 일치하지 않습니다.</span>
								</td>
								
							</tr>
							<tr>
								<th scope="row">이메일</th>
								<td colspan="3"><?=$info['fd_mail']?></td>
							</tr>
							<tr>
								<th scope="row">전화번호</th>
								<td colspan="3"><?=$info['fd_hp']?></td>								
							</tr>
							<tr>
								<th scope="row">주소</th>
								<td colspan="3">[<?=$info['fd_zip']?>]<?=$info['fd_address1']?> <?=$info['fd_address2']?></td>								
							</tr>
							<tr>
								<th scope="row">메일수신여부</th>
								<td colspan="3"><?=$info['fd_reception']?></td>
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