<?php
// 옵션 사이즈 늘리기
	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");
	$type = $_GET['type'];
	if($type==1) $title = "공지사항";
	elseif($type==2) $title = "SW다운로드";
	elseif($type==3) $title = "콘텐츠관리";
?>

<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script type="text/javascript" src="../js/admin.js"></script>
<section class="container">	

	<div class="">
		<div class="tabletInner">
			<form enctype='multipart/form-data' id="new_insert" action="new_insert.php" method="post">
				<fieldset>
					<table>
						<div>
							<div class="admin_title"><?=$title?></div>
							<div class="admin_position">Home  » 게시판/콘텐츠 관리 » <?=$title?></div>
						</div>
						<hr class="garo" style="display: block;"> 
						<div class="mt20 ar">
							<input type="submit" value="등록" id="notice_save_btn" class="btn type05">				
							<a href="/" class="btn type05">취소</a>

						</div>
						<h4>■ <?=$title?></h4>
						<caption><?=$title?></caption>
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
				</fieldset>
			</form>
		</div>
	</div>

</section>
</body>
</html>
<?php
	echo "<script> 
			$('#summernote').summernote();
		</script>";
?>