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
				<div class="image"><img src="/admin/img/upload_image/<?=$info['fd_new_main_img']?>" alt="이미지 설명 입력란"></div>
				<ul>
					<?php 
						for($i=0; $i<count($sub_arr);$i++){
							echo '<li clas="mhide"><img class="pro_detail_sub" src="/admin/img/upload_image/'.$sub_arr[$i].'" alt="이미지 설명 입력란"></li>';
						}

					?>					
				</ul>
			</div>
			<div class="right">
				<p class="title"><?=$info['fd_name']?></p>
				<div class="itemViewInputNumber">
					<input type="number" value="1">
				</div>
				<div class="grayBox">
					<select>
						<?php
							for($i=0; $i<count($option_arr); $i++){
								$option_info = ex_option($option_arr[$i]);
								echo '<option>'.$option_info[0].' / '.$option_info[1].'</option>';
								
							}
						
						?>
					</select>
				</div>
				<div class="grayBox post">
					배송비
					<span class="priceSpan"><?=$info['fd_delivery']?></span>
				</div>
				<div class="priceBox">
					총 상품금액
					<span class="priceSpan">105,000</span>
				</div>
				<div class="mt20 ar">
					<a href="./store_purchase.php" class="btn type03">구매하기</a>
				</div>
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

