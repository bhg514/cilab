<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");
?>

<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script type="text/javascript" src="../js/product_reg.js"></script>
<section class="container">	
	

	<div class="">
		<div class="tabletInner">
			<form enctype='multipart/form-data' id="product_form" action="./product_form.php" method="post">
				<fieldset>
					<div>
						<div class="admin_title">상품등록</div>
						<div class="admin_position">Home  » 상품 관리 » 상품 등록</div>
					</div>
					<hr class="garo" style="display: block;"> 
					<div class="btn_div">
						<input type="submit" value="상품등록" id="product_reg_btn" class="btn type05">
						<a href="/" class="btn type05">취소</a>
					</div>
					<h4>■ 상품정보</h4>
					<table class="product_reg_tb">
						<caption class="readHide">상품 등록</caption>
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
										<option value="1">Water Drone</option>
										<option value="2">Upgrade & Accessories</option>
										<option value="3">DIY & Parts</option>
										<option value="4">Water Education kit</option>
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
								<th scope="row">제조국</th>
								<td>
									<input type="type" name="made" value="">
								</td>
							</tr>		
							<tr>
								<th scope="row">대표이미지(썸네일)</th>
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
									<label><input type="radio" name="option" value="n" onclick="remove_option();" checked> 옵션 미설정</label>				
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
								<td ><?=date("Y-m-d H:i:s")?></td>
							</tr>
							<tr>
								<th scope="row">최종등록자</th>
								<td><?=$_SESSION['user_name']?></td>
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