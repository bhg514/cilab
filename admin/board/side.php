<?php
	$get_uri = $_SERVER['PHP_SELF'];
	$uri_arr = explode('/',$get_uri);

?>
<div class="sidenav">
	<a href="./notice.php" class="<?php if($uri_arr[3] =='notice.php') echo 'selected' ; ?>">공지사항 <span class="menu_point">&gt;</span></a>
	<a href="./sw.php" class="<?php if($uri_arr[3] =='sw.php') echo 'selected' ; ?>">SW다운로드 <span class="menu_point">&gt;</span></a>
	<a href="./contents.php" class="<?php if($uri_arr[3] =='contents.php') echo 'selected' ; ?>">콘텐츠관리 <span class="menu_point">&gt;</span></a>
	<a href="./qna.php" class="<?php if($uri_arr[3] =='qna.php') echo 'selected' ; ?>">1:1 문의 <span class="menu_point">&gt;</span></a>
</div>