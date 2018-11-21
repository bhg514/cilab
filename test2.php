<?php
	$data = "{'status': 'error', 'message': '결제금액 재확인'}";

	$a = json_encode($data);
	echo "<br/>";
	print_r($a);
	echo ($a[0]['status']);
?>