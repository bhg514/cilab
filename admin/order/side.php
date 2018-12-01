<?php
	$get_uri = $_SERVER['PHP_SELF'];
	$uri_arr = explode('/',$get_uri);

?>
<div class="sidenav">
	<div class="side_title">주문/배송 관리</div>
	<a href="./list.php?type=1" class="<?php if($_GET["type"] ==1 ) echo 'selected' ; ?>"><span class="menu_title">신규 주문</span><span class="menu_point">&gt;</span></a>
	<a href="./list.php?type=2" class="<?php if($_GET["type"] ==2 ) echo 'selected' ; ?>"><span class="menu_title">상품 준비</span><span class="menu_point">&gt;</span></a>
	<a href="./list.php?type=3" class="<?php if($_GET["type"] ==3 ) echo 'selected' ; ?>"><span class="menu_title">배송중</span><span class="menu_point">&gt;</span></a>
	<a href="./list.php?type=4" class="<?php if($_GET["type"] ==4 ) echo 'selected' ; ?>"><span class="menu_title">배송완료</span><span class="menu_point">&gt;</span></a>
	<a href="./complete_list.php?type=5" class="<?php if($uri_arr[3] =="complete_list.php" || $_GET["type"] ==5 ) echo 'selected' ; ?>"><span class="menu_title">판매완료</span><span class="menu_point">&gt;</span></a>
	<a href="./list.php?type=6" class="<?php if($_GET["type"] ==6 ) echo 'selected' ; ?>"><span class="menu_title">주문취소</span><span class="menu_point">&gt;</span></a>
	<a href="./list.php?type=7" class="<?php if($_GET["type"] ==7 ) echo 'selected' ; ?>"><span class="menu_title">교환신청</span><span class="menu_point">&gt;</span></a>
	<a href="./list.php?type=8" class="<?php if($_GET["type"] ==8 ) echo 'selected' ; ?>"><span class="menu_title">반품신청</span><span class="menu_point">&gt;</span></a>
	<a href="./list.php?type=9" class="<?php if($_GET["type"] ==9 ) echo 'selected' ; ?>"><span class="menu_title">교환승인</span><span class="menu_point">&gt;</span></a>
	<a href="./list.php?type=10" class="<?php if($_GET["type"] ==10 ) echo 'selected' ; ?>"><span class="menu_title">반품승인</span><span class="menu_point">&gt;</span></a>
	<a href="./list.php?type=11" class="<?php if($_GET["type"] ==11 ) echo 'selected' ; ?>"><span class="menu_title">교환반려</span><span class="menu_point">&gt;</span></a>
	<a href="./list.php?type=12" class="<?php if($_GET["type"] ==12 ) echo 'selected' ; ?>"><span class="menu_title">반품반려</span><span class="menu_point">&gt;</span></a>
</div>