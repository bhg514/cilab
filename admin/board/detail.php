<?php
// 옵션 사이즈 늘리기
	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");
	$no = $_GET['no'];
	$type = $_GET['type'];
	if($no==null && $type!=null){
		header("location:http://".$http_host."/admin/board/list.php?type=".$type);		
	}else if($no==null && $type==null){
		header("location:http://".$http_host."/admin/board/list.php?type=1");
	};

	$info = board_get_info($no,$type);
	if($type!=3){
		if($info["fd_file"]!=null)
			$fd_file=explode('||',$info["fd_file"]);
	}

	if($type==1) $head = '공지사항';
	elseif($type==2) $head = 'SW다운로드';
	elseif($type==3) $head = '콘텐츠관리';


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
			<form enctype='multipart/form-data' id="detail_update" action="detail_update.php" method="post">
				<fieldset>
					<table class="product_reg_tb">
						<div>
							<div><?=$head?></div>
							<div>Home  » 게시판/콘텐츠 관리 » <?=$head?></div>
						</div>
						<hr class="garo" style="display: block;"> 
						<div class="mt20 ar">
							<input type="submit" value="수정" id="notice_save_btn" class="btn type07 st2">
							<a id="info_del" class="btn type07">삭제</a>
							<a href="/admin/board/list.php?type=<?=$type?>" class="btn type07">목록</a>
						</div>						
						<h3>■ <?=$head?></h3>
						<caption><?=$head?></caption>
						<colgroup>
							<col style="width:170px;">
							<col>
						</colgroup>
						<tbody>
							<tr>						
								<th scope="row">*제목</th>						
								<td colspan="3">
									<input type="hidden" name="type" value="<?=$type?>">
									<input type="hidden" id="no" name="no" value="<?=$info['pk_no'] ?>">
									<input type="text" name="title" value="<?=$info['fd_title']?>">
								</td>
							</tr>					
							<?php
								if($type==1 ||$type==2){

							?>

							<tr>
								<th scope="row">*작성자</th>
								<td colspan="3"><?=$info['fd_name']?></td>
							</tr>
							<tr>
								<th scope="row">작성일</th>
								<td><?=$info['fd_date']?></td>
								<th scope="row">조회수</th>
								<td><?=$info['fd_count']?></td>
							</tr>
							<tr>
								<th scope="row">첨부파일</th>
								<td id="files_td" colspan="3">
									<?php 
										if($info['fd_file']!=""){
											foreach ($fd_file as $file) {
												echo '<img src="/images/icon/save.png" class="save_img"><label>'.$file.'</label><br/>';
											}
											echo '<a id="old_file_remove">전체 삭제</a>';
										}else{ 
											echo '<a id="add_file_btn">파일 추가</a>';
										}
									?>
									
									
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

<?php
	include '../admin_footer.php';
	

	echo "<script> 
			$('#summernote').summernote();
			$('.note-editable').html('".$info['fd_content']."');
		</script>";



?>