<?php
	$get_uri = $_SERVER['PHP_SELF'];
	$uri_arr = explode('/',$get_uri);

?>
<div class="sidenav">
	<div class="side_title">상품 관리</div>
	<a href="./list.php?page=1" class="<?php if($uri_arr[3] =='list.php' || $uri_arr[3] == 'detail.php') echo 'selected' ; ?>" >상품 관리 <span class="menu_point">&gt;</span></a>
	<a href="./product_reg.php" class="<?php if($uri_arr[3] =='product_reg.php') echo 'selected' ; ?>" >상품 등록 <span class="menu_point">&gt;</span></a>
	<a href="./product_upload.php"  class="<?php if($uri_arr[3] =='product_upload.php') echo 'selected' ; ?>" >상품 일괄등록 <span class="menu_point">&gt;</span></a>	
</div>