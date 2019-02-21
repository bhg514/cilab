<?php
    header ( "content-type:text/html; charset=utf-8" );
    include '../header.php';
    $id = $_SESSION['user_id'];
    if(!$id){
		header("location:https://".$http_host."/index.php");
	}

	$ex_rate = ex_rate();

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
			<input type="checkbox" value="all" id="all_select">
			<label for="all_select" class="pointer">select all</label>
			<span>|</span>
			<span id="del_select" class="pointer">delete selected items</span>
		</div>
		<div id="flex_div">
			<div id="item_list">
				<?php  
					$result = while_del_fee();
					$del_arr = [];
					while($re_val = mysqli_fetch_array($result)){
						array_push($del_arr, $re_val);
					}
					$_SESSION['del_arr'] = $del_arr;

                    $result = while_cart_list($id);  
                    while ($r = mysqli_fetch_array($result)) {                            
                        
                ?>
					<div class="item">
						<input type="checkbox" id="<?=$r['pk_no']?>" class="cart_checkbox">
						<input type="hidden" class="product_no" value="<?=$r['fd_product_no']?>">
						<div class="thumbnail">
							<a href="/menu/store_view.php?no=<?=$r['fd_product_no']?>"><img src="/admin/img/upload_image/<?=$r['fd_new_main_img']?>" alt="<?=$r['fd_name']?>"></a>
						</div>
						<div class="item_name">
							<a href="/menu/store_view.php?no=<?=$r['fd_product_no']?>" class="pro_name"><?=$r['fd_name']?></a>
						</div>
						<div class="item_option">
							<span>
								Option : <span class="option" ><?=$r['fd_option']?></span>
							</span>
						</div>
						<div class="item_count">
							<span>
								Quantity : <span class="count"><?=$r['fd_count']?></span>
							</span>
						</div>
						<div class="total_price">
							<p><label>price</label><span class="price product_price"><?=number_format($r['fd_price'])?></span>(<?=number_format($r['fd_price']/$ex_rate,2)?>$)</p>
							<span>+</span>
							<p>
								<label>delivery</label><span class="price delivery">
								<?php
									$del_fee = end($del_arr)[2] ;
									foreach($del_arr as $del_fee_info){
										if(floor($del_fee_info[0]*$ex_rate)<$r['fd_price'] and floor($del_fee_info[1]*$ex_rate)>=$r['fd_price']){
											$del_fee = $del_fee_info[2];
											break;
										}
									}
									echo number_format($del_fee);
								?>
								
								</span>
								<?php
									echo "(".number_format($del_fee/$ex_rate,2)."$)"
								?>
							</p>
							<span>=</span>
							<p><label>total</label><span class="price total"><?=number_format($r['fd_price']+$del_fee)?></span>(<?=number_format(($r['fd_price']+$del_fee)/$ex_rate,2)?>$)</p>
						</div>
					</div>
				<?php
					}
				?>

			</div>
			
			<div id="total_order">
				<label for="order_info" id="total_order_label">Payment information</label>
				<ul id="order_info">
					<li><label>Quantity</label><span id ="chk_count" class="price">0</span></li>
					<li><label>Price</label><span id ="chk_price" class="price">0</span></li>
					<li><label>Delivery Charge</label><span id ="chk_del" class="price">0</span></li>
					<li><label>Order total</label><span class="price" id="total_order_price">0</span></li>
				</ul>
				<button id="order_btn">Order</button>
				<form id='cart_order_form' action="./cart_order.php" method="post">
					<input type="hidden" id="chk_info" name="chk_info">
					<input type="hidden" id="ex_rate" value="<?=$ex_rate?>">
				</form>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	var del_arr = <?=json_encode($del_arr)?>;

</script>