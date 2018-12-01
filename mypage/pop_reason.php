<?php
// 옵션 사이즈 늘리기
	header ( "content-type:text/html; charset=utf-8" );

	include_once("../common.php");
	$no = $_GET['no'];

	if($no==null){
		header("location:http://".$http_host."/");
	};
	$query = "select fd_status_msg from tb_order where pk_no=".$no;
	$result = query_send($query);
	$msg = mysqli_fetch_array($result);
	$msg = $msg[0];
	$msg_ex = explode('||', $msg);
	$msg_result = $msg_ex[1];


?>
<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/style.css">
<link rel="stylesheet" type="text/css" href="../css/popup.css">
<script type="text/javascript" src="../js/common.js"></script>
	<section >	
		<div class="contents">
			<div class="tabletInner">
				<table class="pop_table">
					<thead>
						<tr>
							<th>사유</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?=$msg_result?></td>							
						</tr>						
					</tbody>
				</table>				
				<div class="pop_btn">
					<a class="btn type05"  onclick="window.close();">닫기</a>
				</div>				
			</div>
		</div>
	</section>
</body>
</html>