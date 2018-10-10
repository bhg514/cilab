<?php
	include_once('../common.php');	

	$id = $_POST['id'];
	$sql = 'select count(*) from (select fd_id from tb_admin where fd_id="'.$id.'" union select fd_id from tb_user where fd_id="'.$id.'") a';
	$result = mysqli_query($mysqli,$sql);
    $id_count = mysqli_fetch_array($result);
	echo $id_count[0];


?>
