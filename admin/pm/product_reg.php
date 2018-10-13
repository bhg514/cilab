<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");

?>
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<section class="container">	
	

	<div class="contents">
		<div class="tabletInner">
			<form id="product_form" action="./product_form.php" method="post">
				<fieldset>
					<table class="product_reg_tb">
						<dir>
							<dir>상품관리</dir>
							<dir>Home  » 상품 관리 » 상품 관리</dir>
						</dir>
						<hr class="garo" style="display: block;"> 
						<dir>
							<a class="btn type07">저장</a>
							<a class="btn type07">삭제</a>
							<a class="btn type07">목록</a>
						</dir>
						<h3>■ 상품정보</h3>
						<caption>상품 등록</caption>
						<colgroup>
							<col style="width:170px;">
							<col>
						</colgroup>
						<tbody>
							<tr>						
								<th scope="row">상태</th>						
								<td>
									<select>
										<option>판매 중</option>
										<option>판매 중지</option>
									</select>
								</td>
							</tr>					
							<tr>
								<th scope="row">상품명</th>
								<td>
									<input type="text" name="mb_id" value="" id="reg_mb_id" class="inTbl frm_input required " minlength="6" maxlength="12">
								</td>
							</tr>
							<tr>
								<th scope="row">분류</th>
								<td>
									<select>
										<option>Water Drone</option>
										<option>Upgrade & Accessories</option>
										<option>DIY & Parts</option>
										<option>Water Education kit</option>
									</select>
								</td>
							</tr>
							<tr>
								<th scope="row">가격</th>
								<td>
									<input type="text" name="mb_password_re" id="reg_mb_password_re" class="inTbl frm_input required" minlength="9" maxlength="20">원
								</td>
							</tr>
							<tr>
								<th scope="row">수량</th>
								<td>
									<input type="text" name="">
								</td>
							</tr>
							<tr>
								<th scope="row">배송비</th>
								<td>
									<input type="text" name="">원
									<label><input type="radio" name="mail_reception" value="n"> 배송비 무료</label>
								</td>
							</tr>
							<tr>
								<th scope="row">제조국</th>
								<td>
									<select>
										<option>대한민국</option>
									</select>
								</td>
							</tr>		
							<tr>
								<th scope="row">대표이미지(썸네일이미지)</th>
								<td>
									<form enctype='multipart/form-data' action='upload_ok.php' method='post'>
										<input type='file' name='myfile'>
									</form>
								</td>
							</tr>
							<tr>
								<th scope="row">추가이미지</th>
								<td>
									<form enctype='multipart/form-data' action='upload_ok.php' method='post'>
										<input type='file' name='myfile'>										
									</form>
									<form enctype='multipart/form-data' action='upload_ok.php' method='post'>
										<input type='file' name='myfile'>
									</form>
									<form enctype='multipart/form-data' action='upload_ok.php' method='post'>
										<input type='file' name='myfile'>
									</form>
									<form enctype='multipart/form-data' action='upload_ok.php' method='post'>
										<input type='file' name='myfile'>
									</form>									
								</td>
							</tr>					
							<tr>
								<th scope="row">옵션</th>
								<td>
									<label><input type="radio" name="mail_reception" value="y"> 옵션 설정</label>
									<label><input type="radio" name="mail_reception" value="n"> 옵션 미설정</label>
									<span id="wrong_mail_reception" class="fcR ml05 fs12 b hide">메일 수신 여부를 선택하세요</span>										
								</td>
							</tr>	
							<tr>
								<th scope="row">상세내용</th>
								<td>
									<textarea name="area2" style="width: 100%; height:100%;"></textarea><br />
								</td>
							</tr>
							<tr>
								<th scope="row">최종수정일</th>
								<td><?=date("Y-m-d h:i:s")?></td>
							</tr>
							<tr>
								<th scope="row">최종등록자</th>
								<td><?=$_SESSION['user_name']?></td>
							</tr>				
						</tbody>
					</table>

					<div class="mt20 ar">
						<!-- <input type="submit" value="회원가입" id="btn_submit" class="btn_submit" accesskey="s"> -->
						<input type="submit" value="회원가입" id="sub_btn" class="btn type07 st2">
						<!-- <a href="javascript:login_do();" class="btn type07 st2">회원가입</a> -->
						<a href="/" class="btn type07">취소</a>
					</div>
				</fieldset>
			</form>
		</div>
	</div>

</section>
<?php
	include '../admin_footer.php';
?>