<?php
// 옵션 사이즈 늘리기
	header ( "content-type:text/html; charset=utf-8" );

	include_once("../common.php");
	$no = $_GET['no'];

	if($no==null){
		header("location:http://".$http_host."/");
	};


?>
<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/popup.css">
<section class="container">	
	<div class="">
		<div class="tabletInner">
			<fieldset>			
				<div>◎ 교환 / 환불 사유 입력</div>
				<div>
					<input type="text" name="">
				</div>
				<div>◎ 전화번호</div>
				<div>
					<input type="text" name="">
				</div>
				<div>◎ 환불받을 계좌번호</div>
				<div>
					<input type="text" name="">
				</div>

				
					
												
			</fieldset>
		</div>
	</div>

</section>
</body>
</html>