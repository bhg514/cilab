<?php
	header ( "content-type:text/html; charset=utf-8" );
	include 'header.php';
	$info = cur_notice();
?>
<section class="container">
	<div class="mainVisual">
		<p class="mainText">
			<span>I</span>nteresting <span>W</span>ater <span>D</span>rone
		</p>
		<ul class="mainMenu">
			<li><a href="../menu/introWD.php"><img src="../images/main/btn_01.png" alt="water drone"></a></li>
			<?php
				if (!isset($_SESSION['user_id']))
					echo '<li><a href="../member/login.php"><img src="../images/main/btn_02.png" alt="로그인"></a></li>'
			?>
			<!-- <li><a href="#a"><img src="../images/main/btn_03.png" alt="주문,배송조회"></a></li> -->
			<li><a href="../menu/introWD2.php"><img src="../images/main/btn_04.png" alt="water drone 활용"></a></li>
			<li><a href="../menu/list.php?type=2"><img src="../images/main/btn_05.png" alt="S/W다운로드"></a></li>
		</ul>
	</div>
	<div class="mainNotiWrap">
		<div class="mainNoti">
			<p class="title">
				<a href="/menu/detail.php?type=1&no=<?=$info['pk_no']?>"><?=$info['fd_title']?></a>
			</p>
			<p class="date">
				<?=$info['fd_date']?>			
			</p>
		</div>
	</div>
</section>
<?php
	include 'footer.php'
?>