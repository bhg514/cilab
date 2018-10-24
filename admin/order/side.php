<?php
	$get_uri = $_SERVER['PHP_SELF'];
	$uri_arr = explode('/',$get_uri);

?>
<div class="sidenav">
	
	<a href="./list.php?type=1" class="<?php if($_GET["type"] ==1 ) echo 'selected' ; ?>">신규 주문 <span class="menu_point">&gt;</span></a>
	<a href="./list.php?type=2" class="<?php if($_GET["type"] ==2 ) echo 'selected' ; ?>">상품 준비 <span class="menu_point">&gt;</span></a>
	<a href="./list.php?type=3" class="<?php if($_GET["type"] ==3 ) echo 'selected' ; ?>">배송중 <span class="menu_point">&gt;</span></a>
	<a href="./list.php?type=4" class="<?php if($_GET["type"] ==4 ) echo 'selected' ; ?>">배송 완료 <span class="menu_point">&gt;</span></a>
	<a href="./complete_list.php" class="<?php if($uri_arr[3] =="complete_list.php" || $_GET["type"] ==5 ) echo 'selected' ; ?>">판매완료<span class="menu_point">&gt;</span></a>
	<a href="./list.php?type=6" class="<?php if($_GET["type"] ==6 ) echo 'selected' ; ?>">주문취소<span class="menu_point">&gt;</span></a>
	<a href="./list.php?type=7" class="<?php if($_GET["type"] ==7 ) echo 'selected' ; ?>">교환신청<span class="menu_point">&gt;</span></a>
	<a href="./list.php?type=8" class="<?php if($_GET["type"] ==8 ) echo 'selected' ; ?>">반품신청<span class="menu_point">&gt;</span></a>
</div>