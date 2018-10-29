<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php'
?>
<section class="container">
	<div class="visual etc">
		<p class="subTitle">문의하기</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>SUPPORT</span>
			<span>&gt;</span>
			<span>문의하기</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="loginBox">
				<div class="img"><img src="../images/common/img_idpw.png" alt="비밀번호찾기 이미지"></div>
				<div class="input">
					<p class="login">문의글 비밀번호</p>
					<form id="chk_pw_form" action="./chk_pw_form.php" method="post">
						<div class="loginInput pwSt">
							<div>
								<input name="pw" type="password" placeholder="pw">								
								<input name="no" type="hidden" value="<?=$_GET['no']?>">
							</div>
							<input type="submit" class="loginBtn pwSt" value="확인">
						</div>
					</form>
				</div>
			</div>
			<div class="mt20 ar">				
				<a href="list.php?type=4" class="btn type07">홈으로</a>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>
