<?php
// 옵션 사이즈 늘리기
	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");
	$type = $_GET['type'];
?>
<!-- include libraries(jQuery, bootstrap) -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script type="text/javascript" src="../js/admin.js"></script>
<section class="container">	
	

	<div class="contents">
		<div class="tabletInner">
			<form enctype='multipart/form-data' id="new_insert" action="new_insert.php" method="post">
				<fieldset>
					<table class="product_reg_tb">
						<div>
							<div>공지사항</div>
							<div>Home  » 게시판/콘텐츠 관리 » 공지사항</div>
						</div>
						<hr class="garo" style="display: block;"> 
						<div>
							<a class="btn type07">등록</a>
							<a class="btn type07">취소</a>
						</div>
						<h3>■ 공지사항</h3>
						<caption>공지사항</caption>
						<colgroup>
							<col style="width:170px;">
							<col>
						</colgroup>
						<tbody>
							<tr>						
								<th scope="row">제목</th>						
								<td colspan="3">
									<input type="hidden" name="type" value="<?=$type?>">
									<input type="text" name="title" value="">
								</td>
							</tr>
							<?php
								if($type==1 || $type==2){

							?>					
							<tr>
								<th scope="row">첨부파일</th>
								<td id="files_td" colspan="3">
									<a id="add_file_btn">파일 추가</a>		
								</td>
								<input type="hidden" name="file_count" id="file_count" value="">
							</tr>
							<?php
								}
							?>
							<tr>
								<th scope="row">상세내용</th>
								<td colspan="3">
									<input type="hidden" name="content_val" id="content_hidden">
									<div id="summernote">										
									</div>
								</td>
							</tr>
											
						</tbody>
					</table>
					<div class="mt20 ar">
						<input type="submit" value="수정" id="notice_save_btn" class="btn type07 st2">						
						<a href="/" class="btn type07">취소</a>
					</div>
				</fieldset>
			</form>
		</div>
	</div>

</section>

<?php
	include '../admin_footer.php';
	

	echo "<script> 
			$('#summernote').summernote();
			$('.note-editable').html('".$info['fd_content']."');
		</script>";



?>