<?php
	$get_uri = $_SERVER['PHP_SELF'];
	$uri_arr = explode('/',$get_uri);
?>

<div class="sidenav">
	<a href="./month.php?year=<?=date("Y")?>" class="<?php if($uri_arr[3] =='month.php') echo 'selected' ; ?>" >월별 통계 <span class="menu_point">&gt;</span></a>
	<a href="./day.php?year=<?=date("Y")?>&month=<?=date("m");?>" class="<?php if($uri_arr[3] =='day.php') echo 'selected' ; ?>" >일별 통계 <span class="menu_point">&gt;</span></a>
</div>