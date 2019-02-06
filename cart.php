<?php
    header ( "content-type:text/html; charset=utf-8" );
    include '../header.php';
    $id = $_SESSION['user_id'];
    if(!$id){
		header("location:https://".$http_host."/index.php");
	}
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
	<div class="contents cart">
		<div class="select_div">
			<input type="checkbox" value="all" id="all_select" class="cart_checkbox">
			<label for="all_select">select all</label>
			<span>|</span>
			<span id="del_select">delete selected items</span>
		</div>
		<div id="flex_div">
			<div id="item_list">
				<?php  
					$result = while_del_fee();
					$del_arr = [];
					while($re_val = mysqli_fetch_array($result)){
						array_push($del_arr, $re_val);
					}
                    $result = while_cart_list($id);  
                    $count = 0;
                    $total = 0;
                    while ($r = mysqli_fetch_array($result)) {                            
                        
                ?>
					<div class="item">
						<input type="checkbox" id="" class="cart_checkbox">
						<div class="thumbnail">
							<a href="/menu/store_view.php?no=22"><img src="/admin/img/upload_image/5c494456ebe50.jpg" alt="BLDC waterproof motor module"></a>
						</div>
						<div class="item_name">
							<a href="/menu/store_view.php?no=22">BLDC waterproof motor module</a>
						</div>
						<div class="item_option">
							<span><?=$r['fd_option']?></span>
						</div>
						<div class="item_count">
							<span><?=$r['fd_count']?></span>
						</div>
						<div class="item_price">
							<span><?=number_format($r['fd_price'])?></span>
						</div>
						<div class="total_price">
							<p><label>price</label><span class="price"><?=number_format($r['fd_price'])?></span></p>
							<span>+</span>
							<p>
								<label>delivery</label><span class="price delivery">
								<?php
									foreach($del_arr as $del_fee_info){
										if($del_fee_info[0]<=$r['fd_price'] and $del_fee_info[1]>$r['fd_price']){
											echo number_format($del_fee_info[2]);
											break;
										}
									}

								?>
								
								</span>
							</p>
							<span>=</span>
							<p><label>total</label><span class="price total">68,500</span></p>
						</div>
					</div>
				<?php
						$total = $total + $r['fd_price'];
						$count = $count+1;
					}
					
					$del_fee = 2500;

						
				?>

			</div>
			
			<div id="total_order">
				<label for="order_info" id="total_order_label">Payment information</label>
				<ul id="order_info">
					<li><label>Quantity</label><span class="price"><?=$count?></span></li>
					<li><label>Price</label><span class="price"><?=number_format($total)?></span></li>
					<li><label>Delivery Charge</label><span class="price"><?=number_format($del_fee)?></span></li>
					<li><label>Order total</label><span class="price" id="total_order_price"><?=number_format($total+$del_fee)?></span></li>
				</ul>
				<button id="order_btn">Order</button>
			</div>
		</div
	</div>
</section>