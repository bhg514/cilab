<?php
// 옵션 사이즈 늘리기
	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");
	$no = $_GET['no'];
	$type = $_GET['type'];
	if($no==null && $type!=null){
		header("location:https://".$http_host."/admin/board/list.php?type=".$type);		
	}else if($no==null && $type==null){
		header("location:https://".$http_host."/admin/board/list.php?type=1");
	};

	$info = board_get_info($no,$type);
	if($info["fd_file"]!=null)
		$fd_file=explode('||',$info["fd_file"]);
?>

<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script type="text/javascript" src="../js/admin.js"></script>
<section class="container">	
	

	<div class="">
		<div class="tabletInner">
			<form enctype='multipart/form-data' id="qna_reply" action="qna_reply.php" method="post">
				<fieldset>
					<table class="list-table">
						<div>
							<div class="admin_title">1:1문의</div>
							<div class="admin_position">Home  » 게시판 관리 » 1:1문의</div>
						</div>
						<hr class="garo" style="display: block;"> 
						<div class="mt20 ar">
							<input type="submit" value="등록" id="notice_save_btn" class="btn type05">						
							<a href="/" class="btn type05">취소</a>
						</div>
						<h4>■ 1:1문의</h4>
						<caption>1:1문의</caption>
						<colgroup>
							<col style="width:170px;">
							<col>
						</colgroup>
						<tbody>
							<tr>						
								<th scope="row">성명</th>						
								<td colspan="3"><?=$info['fd_name']?>
									<input type="hidden" name="no" value="<?=$info['pk_no'] ?>">
								</td>
							</tr>					
							<tr>
								<th scope="row">연락처</th>
								<td colspan="3"><?=$info['fd_hp']?></td>
							</tr>
							<tr>
								<th scope="row">이메일</th>
								<td colspan="3"><?=$info['fd_mail']?></td>
							</tr>
							<tr>
								<th scope="row">제목</th>
								<td colspan="3"><?=$info['fd_title']?></td>
							</tr>
							<tr>
								<th scope="row">첨부파일</th>
								<td olspan="3">
                                    <?php 
                                        if($info['fd_file']!=""){                                            
                                            echo '<a href="file_down.php?file='.$info['fd_new_file'].'&name='.$info['fd_file'].'"><img src="/images/icon/save.png" class="save_img"><label>'.$info['fd_file'].'</label><br/></a>';
                                        }
                                    ?>
									
								</td>
								<input type="hidden" name="file_count" id="file_count" value="">
							</tr>
							<tr>
								<th scope="row">질문내용</th>
								<td colspan="3"><?=$info['fd_content']?></td>
							</tr>
							<tr>
								<th scope="row">상세내용</th>
								<td colspan="3">
									<textarea name="reply" class="reply"><?=$info['fd_reply']?></textarea>
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