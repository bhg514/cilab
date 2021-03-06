<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");
	$no = $_GET['no'] ?? header("location:https://".$http_host."/admin/pm/list.php");

	$info = product_info($no);

	$sub_arr=explode('||',$info['fd_sub_img']);
?>

<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script type="text/javascript" src="../js/product_reg.js"></script>
<script type="text/javascript" src="../js/admin.js"></script>
<section class="container">	
	

	<div class="">
		<div class="tabletInner">
			<form enctype='multipart/form-data' id="product_update" action="product_update.php" method="post">
				<fieldset>
					<div>
						<div class="admin_title">상품관리</div>
						<div class="admin_position">Home  » 상품 관리 » 상품 관리</div>
					</div>
					<hr class="garo" style="display: block;"> 
					<div class="btn_div">
						<input type="submit" value="수정" id="product_reg_btn" class="btn type05">
						<a id="info_del" class="btn type05">삭제</a>
						<a href="/admin/pm/list.php" class="btn type05">목록</a>
					</div>
					<h4>■ 상품정보</h4>
					<table class="product_reg_tb">
						<caption class="readHide">상품 수정</caption>
						<tbody>
							<tr>						
								<th scope="row">상태</th>						
								<td>
									<input type="hidden" name="no" id="no" value="<?=$info['pk_no'] ?>">
									<select name="status" >
										<option value="판매중" <?php if($info['fd_status']=="판매중"){ echo "selected";}?> >판매중</option>
										<option value="판매중지" <?php if($info['fd_status']=="판매중지"){ echo "selected";}?> >판매중지</option>
									</select>
								</td>
							</tr>					
							<tr>
								<th scope="row">상품명</th>
								<td>
									<input type="text" name="name" value="<?=$info['fd_name']?>" class="inTbl frm_input required ">
								</td>
							</tr>
							<tr>
								<th scope="row">분류</th>
								<td>									
									<select name="category">
										<option value="1" <?php if($info['fd_category']=="1"){ echo "selected";}?> >Water Drone</option>
										<option value="2" <?php if($info['fd_category']=="2"){ echo "selected";}?> >Upgrade & Accessories</option>
										<option value="3" <?php if($info['fd_category']=="3"){ echo "selected";}?>  >DIY & Parts</option>
										<option value="4" <?php if($info['fd_category']=="4"){ echo "selected";}?>  >Water Education kit</option>
									</select>
								</td>
							</tr>
							<tr>
								<th scope="row">가격</th>
								<td>
									<input type="number" name="price" class="inTbl frm_input required" value="<?=$info['fd_price']?>">원
								</td>
							</tr>
							<tr>
								<th scope="row">수량</th>
								<td>
									<input type="number" name="count" value="<?=$info['fd_stock']?>">
								</td>
							</tr>							
							<tr>
								<th scope="row">제조국</th>
								<td>
									<input type="type" name="made" value="<?=$info['fd_made']?>">									
								</td>
							</tr>		
							<tr>
								<th scope="row">대표이미지(썸네일)</th>
								<td>									
									<input type="file" name="main_img" id="main_img" style="display:none;"/>
									<input type="hidden" name="old_main_img" value="<?= $info['fd_main_img'] ?>">

									<label for="main_img" id="main_img_label"><?php if($info['fd_main_img']!=""){ echo $info['fd_main_img'];}else{ echo '클릭하여 이미지 파일을 올려주세요';}?></label>									
								</td>
							</tr>
							<tr>
								<th scope="row">추가이미지</th>
								<td>
									<?php
										foreach ($sub_arr as $sub) {
									?>
									<input type="file" name="sub_img1" id="sub_img1" style="display:none;"/>
									<input type="hidden" name="old_sub_img1" value="<?php if($sub!=null){ echo $sub;}?>">
									<label for="sub_img1" id="sub_img1_label"><?php if($sub!=null){ echo $sub;}else{ echo '클릭하여 이미지 파일을 올려주세요';}?> </label>
									<br/>
									<?php
										}
									?>
								</td>
							</tr>					
							<tr>
								<th scope="row">옵션</th>
								<td>
									<label><input type="radio" name="option" value="y" onclick="pop_option();" <?php if($info['fd_option']!=""){ echo "checked";}?> > 옵션 설정</label>
									<label><input type="radio" name="option" value="n" onclick="remove_option();" <?php if($info['fd_option']==""){ echo "checked";}?> > 옵션 미설정</label>				
									<input type="hidden" id="option_input" name="option_input" value="<?=$info['fd_option']?>">												
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
				</fieldset>
			</form>
		</div>
	</div>

</section>
</body>
</html>
<?php
	echo '<script> 
			$(\'#summernote\').summernote();
			$(\'.note-editable\').html("'.$info['fd_content'].'");
		</script>';
?>