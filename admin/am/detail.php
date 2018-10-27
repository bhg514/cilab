<?php

	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");
	$no = $_GET['no'];
	if($no==null){
		header("location:http://".$http_host."/admin/um/list.php");		
	}

	$info = user_get_info($no,"tb_admin");
	$hp = explode('-', $info['fd_hp']);
	

?>

<script type="text/javascript" src="../js/admin.js"></script>
<section class="container">	
	

	<div class="contents">
		<div class="tabletInner">
			<form enctype='multipart/form-data' id="admin_update" action="admin_update.php" method="post">
				<fieldset>
					<table class="product_reg_tb">
						<div>
							<div>회원관리</div>
							<div>Home  » 회원관리 » 회원관리</div>
						</div>
						<hr class="garo" style="display: block;"> 
						<div class="mt20 ar">
							<input type="submit" value="수정" id="save_btn" class="btn type07 st2">
							<a id="info_del" class="btn type07">삭제</a>
							<a href="/admin/am/list.php" class="btn type07">목록</a>
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
								<td colspan="3"><?=$info['fd_id']?></td>
								<input type="hidden" id="no" name="no" value="<?=$info['pk_no'] ?>">
							</tr>
											
							
							<tr>
								<th scope="row">비밀번호</th>
								<td colspan="3"><input type="password" id="pw" name="pw"></td>
							</tr>
							<tr>
								<th scope="row">비밀번호 확인</th>
								<td colspan="3">
									<input type="password" id="pw_re">
									<span id="wrong_pw" class="fcR ml05 fs12 b hide">비밀번호가 일치하지 않습니다.</span>
								</td>
							</tr>
							<tr>						
								<th scope="row">이름</th>						
								<td colspan="3">
									<input type="text" name="name" value="<?=$info['fd_name'] ?>">
								</td>
							</tr>	
							<tr>
								<th scope="row">소속</th>
								<td colspan="3">
									<input type="text" name="group" value="<?=$info['fd_group'] ?>">
								</td>
							</tr>
							<tr>
								<th scope="row">직위</th>
								<td colspan="3">
									<input type="text" name="position" value="<?=$info['fd_position'] ?>">
								</td>						
							</tr>
							<tr>
								<th scope="row">전화번호</th>
								<td colspan="3">
									<input type="text" name="hp1" value="<?=$hp[0]?>">-
									<input type="text" name="hp2" value="<?=$hp[1]?>">-
									<input type="text" name="hp3" value="<?=$hp[2]?>">
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