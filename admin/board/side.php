<?php
	$get_uri = $_SERVER['PHP_SELF'];
	$uri_arr = explode('/',$get_uri);
	$type = $_GET['type'];
?>
<div class="sidenav">
	<div class="side_title">게시판 관리</div>
	<a href="./list.php?type=1" class="<?php if($type ==1) echo 'selected' ; ?>">공지사항 <span class="menu_point">&gt;</span></a>
	<a href="./list.php?type=2" class="<?php if($type ==2) echo 'selected' ; ?>">SW다운로드 <span class="menu_point">&gt;</span></a>
	<a href="./list.php?type=3" class="<?php if($type ==3) echo 'selected' ; ?>">1:1 문의 <span class="menu_point">&gt;</span></a>
</div>