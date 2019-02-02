<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php';
	if(!isset($_SESSION['user_id'])){
		alert('Please try again after login.','https://'.$http_host.'/member/login.php');
	};
	
?>
<section class="container">
	<div class="visual support">
		<p class="subTitle">Q&amp;A</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>SUPPORT</span>
			<span>&gt;</span>
			<span>Q&amp;A</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="btnTab">
				<a href="./list.php?type=1" >Notice</a>
                <a href="./list.php?type=2" >S/W download</a>
				<a href="./list.php?type=3" class="on">Q&amp;A</a>
			</div>
			<form enctype='multipart/form-data' id="qna_form" action="./qna_form.php" method="post">
				<table class="tblType02">
					<caption>Q&amp;A</caption>
					<colgroup>
						<col style="width:170px;">
						<col>
					</colgroup>
					<tbody>
						<tr>
							<th scope="row">Title</th>
							<td><input type="text" class="inTbl" name="title" style="width:100%;"></td>
						</tr>
						<tr>
							<th scope="row">Contents</th>
							<td>
								<textarea cols="" rows="" class="inTblTextarea" name="content"></textarea>
							</td>
						</tr>
						<tr>
							<th scope="row">Attachments</th>
							<td><input type="file" name=file></td>
						</tr>
						<tr>
							<th scope="row">Password</th>
							<td><input type="password" class="inTbl" name=pw></td>
						</tr>
					</tbody>
				</table>
				<div class="mt20 ar">
					<input type="submit" value="Write" id="qna_btn" class="btn type07 st2">
					<a href="./list.php?type=3" class="btn type06 st2">Cancel</a>
				</div>				
			</form>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>
