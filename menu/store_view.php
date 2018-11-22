<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php';
	$no = $_GET['no'];
	if($no==null){
		header("location:http://".$http_host."/admin/pm/list.php");
	};
	$info = product_info($no);

	$sub_arr=explode('||',$info['fd_new_sub_img']);
	$option_arr = explode('||', $info['fd_option']);
	function ex_option($option){
		return explode('^', $option);
	}
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
		<div class="imgView">
			<div class="left">
				<div class="image"><img src="/admin/img/upload_image/<?=$info['fd_new_main_img']?>" alt="이미지 설명 입력란" id="pd_main_img"></div>
				<ul>
					<li class="mhide"><img class="pro_detail_sub" src="/admin/img/upload_image/<?=$info['fd_new_main_img']?>" alt="이미지 설명 입력란"></li>
					<?php 						
						if($info['fd_new_sub_img']!=""){
							for($i=0; $i<count($sub_arr);$i++){
								echo '<li class="mhide"><img class="pro_detail_sub" src="/admin/img/upload_image/'.$sub_arr[$i].'" alt="이미지 설명 입력란"></li>';
							}
						}
					?>					
				</ul>
			</div>
			<div class="right">
				<form id='store_purchase' action="./store_purchase.php" method="post">
					<p class="title"><?=$info['fd_name']?></p>
					<input type="hidden" name="no" value="<?=$info['pk_no']?>">
					<div class="grayBox post">
					<input type="hidden" name="product_price" id="product_price" value="<?=$info['fd_price']?>">
					<?php
						if($info['fd_option']!=null){
					?>
						<label for="option_select">옵션</label>
						<input type="hidden" name="select_name" id="select_name" value="">
						<input type="hidden" name="select_price" id="select_price" value="">						
						<select id=option_select>
							<option hidden id="select_title">옵션을 선택하세요</option>
							<?php
								for($i=0; $i<count($option_arr); $i++){
									$option_info = ex_option($option_arr[$i]);
									if ($option_info[1]==0){
										echo '<option value="'.$option_info[1].'" name="'.$option_info[0].'">'.$option_info[0].'</option>';
									}else{
										echo '<option value="'.$option_info[1].'" name="'.$option_info[0].'">'.$option_info[0].' / '.number_format($option_info[1]).'won</option>';										
									}
								}
							?>
						</select>
					<?php
						}else{
							echo '가격 <span class=priceSpan id=pro_price>'.number_format($info["fd_price"]).'</span>';
						}
					?>
					</div>
					<div class="grayBox post">
						<label for="select_count">수량</label>
						<input type="button" class="bt_up" value="+">
						<input type="number" value="0" min="1"  id="select_count" name="select_count">
						<input type="button" class="bt_down" value="-">
					</div>
					<div class="grayBox post">
						<label for="del_fee">배송비</label>
						<span class="priceSpan" id="del_fee"><?=number_format($info['fd_delivery'])?></span>
					</div>				
					<div class="priceBox" >
						<label for="total_price">총 상품금액</label>					
						<span class="priceSpan" id="total_price">0</span>
					</div>

					<div class="mt20 ar">
						<input type="submit" id="buy_btn" class="btn type02" value="구매하기">
					</div>
				</form>
			</div>
			<div class="cb"></div>
			<div class="itemContentBox">
				<?=$info['fd_content']?>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>

