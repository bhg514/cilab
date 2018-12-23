<?php
	header ( "content-type:text/html; charset=utf-8" );
	include 'header.php';
	$info = cur_notice();
?>
<!-- <script type="text/javascript">
	popup('test_popup.html',null,400,200)
</script> -->
<section class="container">
	<div class="mainVisual">
		<p class="mainText">
			<span>I</span>nteresting <span>W</span>ater <span>D</span>rone
		</p>
		<ul class="mainMenu">
			<li>
				<a href="../menu/introWD.php">
					<img src="../images/main/btn_001.png" alt="Water Drone">
					<p>Water Drone</p>
				</a>
			</li>
			<?php
				if (!isset($_SESSION['user_id']))
					echo '<li><a href="../member/login.php"><img src="../images/main/btn_002.png" alt="Login"><p>Login</p></a></li>';
				else echo '<li><a href="../mypage/order.php"><img src="../images/main/btn_003.png" alt="Order information"><p>Order information</p></a></li>';
			?>	
			<li><a href="../menu/introWD2.php"><img src="../images/main/btn_004.png" alt="Utilization of water drone"><p>Utilization of <br>water drone</p></a></li>
			<li><a href="../menu/list.php?type=2"><img src="../images/main/btn_005.png" alt="S/W Download"><p>S/W Download</p></a></li>
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