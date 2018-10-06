<?php
	include_once('../common.php');	

	$id = $_POST['id'];
	$sql = 'select count(fd_id) from tb_user where fd_id = "'.$id.'"';
	$result = mysqli_query($mysqli,$sql);
    $id_count = mysqli_fetch_array($result);
	echo $id_count[0];


?>
