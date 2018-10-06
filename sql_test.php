<?php
    include_once('./config/db_config.php');
    $id = 'test12';
    $sql = "SELECT * FROM tb_user";
	$result = mysqli_query($mysqli,$sql);
    $row = mysqli_fetch_array($result);
    echo $row['fd_id'];
?>