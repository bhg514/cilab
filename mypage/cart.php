<?php
    header ( "content-type:text/html; charset=utf-8" );
    include '../header.php';
    $id = $_SESSION['user_id'];
    /* $no = $_GET['no'];
    $info = product_info($no) */
?>

<section class="container">
	<div class="visual store">
		<p class="subTitle">Cart</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>Mypage</span>
			<span>&gt;</span>
			<span>Cart</span>
		</div>
	</div>
	<div class="contents">
		<div class="select_div">
			<input type="checkbox" value="all" id="all_select">
			<label for="all_select">select all</label>
			<span>|</span>
			<span id="del_select">delete selected items</span>
		</div>
		<div>
			<div id="items">
				<div class="item">
					<input type="checkbox" id="">
					<p class="item_name">
						<a href="/menu/store_view.php?no=22">BLDC waterproof motor module</a>
					</p>
					<div class="thumbnail">
						<img src="/admin/img/upload_image/5c494456ebe50.jpg" alt="이미지 설명 입력란">
					</div>
					<div class="item_count">
						<input type="button" class="bt_up" value="+">
						<input type="number" value="0" min="1" max="<?=$info['fd_stock']?>" id="select_count" name="select_count">
						<input type="button" class="bt_down" value="-">	
					</div>
					<div>
						<span class="item_price">$info["fd_price"]</span>
					</div>
					<hr>
					<div>
						<p><label>price</label><span class="price">66,000</span></p>
						<span>+</span>
						<p><label>delivery</label><span class="price delivery">2,500</span></p>
						<span>=</span>
						<p><label>total</label><span class="price total">68,500</span></p>
					</div>
				</div>
			</div>
			<div id="total_order">
				<label>Order Info</label>
				<hr>
				<ul>
					<li><label>Quantity</label><span class="price"></span></li>
					<li><label>Price</label><span class="price"></span></li>
					<li><labe>Delivery</labe><span class="price"></span></li>
				</ul>
				<label>Total Price</label><span class="price"></span>
				<button id="order">Order</button>
			</div>
		</div>
	</div>
</section>