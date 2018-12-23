<?php
// 옵션 사이즈 늘리기
	header ( "content-type:text/html; charset=utf-8" );

	include_once("../common.php");
	$no = $_GET['no'];

	if($no==null){
		header("location:https://".$http_host."/");
	};


?>
<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/popup.css">
<script type="text/javascript" src="../js/common.js"></script>
<section class="container">	
	<div class="">
		<div class="tabletInner">
			<fieldset>			
				<div>◎ 환불 사유</div>
				<div>
					<input type="text" name="">
				</div>
				<div>◎ 전화번호</div>
				<div>
					<input type="text" name="">
				</div>
				<div>
					<a onclick="" class="btn type05">신청하기</a>
				</div>												
			</fieldset>
		</div>
	</div>

</section>
</body>
</html>