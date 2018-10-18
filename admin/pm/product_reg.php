<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");

?>
<!-- include libraries(jQuery, bootstrap) -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script type="text/javascript" src="../js/product_reg.js"></script>
<section class="container">	
	

	<div class="contents">
		<div class="tabletInner">
			<form enctype='multipart/form-data' id="product_form" action="./product_form.php" method="post">
				<fieldset>
					<table class="product_reg_tb">
						<div>
							<div>상품관리</div>
							<div>Home  » 상품 관리 » 상품 관리</div>
						</div>
						<hr class="garo" style="display: block;"> 
						<div>
							<a class="btn type07">저장</a>
							<a class="btn type07">삭제</a>
							<a class="btn type07">목록</a>
						</div>
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
									<select name="status" >
										<option value="판매중">판매중</option>
										<option value="판매중지">판매중지</option>
									</select>
								</td>
							</tr>					
							<tr>
								<th scope="row">상품명</th>
								<td>
									<input type="text" name="name" value="" class="inTbl frm_input required ">
								</td>
							</tr>
							<tr>
								<th scope="row">분류</th>
								<td>
									<select name="category">
										<option value="Water Drone">Water Drone</option>
										<option value="Upgrade & Accessories">Upgrade & Accessories</option>
										<option value="DIY & Parts">DIY & Parts</option>
										<option value="Water Education kit">Water Education kit</option>
									</select>
								</td>
							</tr>
							<tr>
								<th scope="row">가격</th>
								<td>
									<input type="number" name="price" class="inTbl frm_input required">원
								</td>
							</tr>
							<tr>
								<th scope="row">수량</th>
								<td>
									<input type="number" name="count">
								</td>
							</tr>
							<tr>
								<th scope="row">배송비</th>
								<td>
									<input type="number" name="delivery" id="delivery_input" onclick="del_non_free()">원
									<label><input type="radio" id="free_chk" onclick="del_free();"> 배송비 무료</label>
								</td>
							</tr>
							<tr>
								<th scope="row">제조국</th>
								<td>
									<select name="made">
										<option value="대한민국">대한민국</option>
									</select>
								</td>
							</tr>		
							<tr>
								<th scope="row">대표이미지(썸네일이미지)</th>
								<td>									
									<input type="file" name="main_img" id="main_img" style="display:none;"/>
									<label for="main_img" id="main_img_label">클릭하여 이미지 파일을 올려주세요 </label>									
								</td>
							</tr>
							<tr>
								<th scope="row">추가이미지</th>
								<td>
									<input type="file" name="sub_img1" id="sub_img1" style="display:none;"/>
									<label for="sub_img1" id="sub_img1_label">클릭하여 이미지 파일을 올려주세요 </label>
									<br/>
									<input type="file" name="sub_img2" id="sub_img2" style="display:none;"/>
									<label for="sub_img2" id="sub_img2_label">클릭하여 이미지 파일을 올려주세요 </label>
									<br/>
									<input type="file" name="sub_img3" id="sub_img3" style="display:none;"/>
									<label for="sub_img3" id="sub_img3_label">클릭하여 이미지 파일을 올려주세요 </label>
									<br/>
									<input type="file" name="sub_img4" id="sub_img4" style="display:none;"/>
									<label for="sub_img4" id="sub_img4_label">클릭하여 이미지 파일을 올려주세요 </label>
								</td>
							</tr>						
							<tr>
								<th scope="row">옵션</th>
								<td>
									<label><input type="radio" name="option" value="y" onclick="pop_option();"> 옵션 설정</label>
									<label><input type="radio" name="option" value="n" checked> 옵션 미설정</label>				
									<input type="text" id="option_input" name="option_input">												
								</td>
							</tr>	
							<tr>
								<th scope="row">상세내용</th>
								<td>
									<input type="hidden" name="content_val" id="content_hidden">
									<div id="summernote"></div>
								</td>
							</tr>
							<tr>
								<th scope="row">최종수정일</th>
								<td ><?=date("Y-m-d h:i:s")?></td>
							</tr>
							<tr>
								<th scope="row">최종등록자</th>
								<td><?=$_SESSION['user_name']?></td>
							</tr>				
						</tbody>
					</table>

					<div class="mt20 ar">
						<input type="submit" value="상품등록" id="product_reg_btn" class="btn type07 st2">
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