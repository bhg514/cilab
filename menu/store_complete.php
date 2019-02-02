<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php'
?>
<section class="container">
	<div class="visual store">
		<p class="subTitle">STORE</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>STORE</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="saleCompleteArea">
				<div class="img"><img src="../images/common/img_sale.png" alt=""></div>
				<div class="text">
					<p class="txt1">Thank you, your order has been placed.</p>
					<p class="txt2">* 주문/배송현황은 주문/배송조회 메뉴에서 확인 가능합니다.</p>
					<div class="btnArea">
						<a href="../mypage/order.php" class="btn type06">review or edit your order</a>
						<a href="../index.php" class="btn type06 st2">Home</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>

