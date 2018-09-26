<?php
	if (!isset($_POST['agree1']) || !$_POST['agree1']) {
		echo "<script>alert(\"이렇게 띄우면 되자나1\");location.replace('http://localhost/sub/join.php');</script>";	
	}elseif (!isset($_POST['agree2']) || !$_POST['agree2']) {
	    echo "<script>alert(\"이렇게 띄우면 되자나2\");location.replace('http://localhost/sub/join.php');</script>";	
	}

?>

