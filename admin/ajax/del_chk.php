<?php 
header ( "content-type:text/html; charset=utf-8" );
include_once('simple_html_dom.php');
include_once("../../common.php");


$results = while_get_order_invoice();

while ($info = mysqli_fetch_array($results)) {
	$invoice_number = $info['fd_invoice_number'];
	$url = 'https://service.epost.go.kr/trace.RetrieveDomRigiTraceList.comm?sid1='.$invoice_number.'&displayHeader=N';		
	$html = file_get_html($url);
	$result = $html->find('div[id=print] table tbody tr td',3);
	if($result!=null){
		del_chk($info['pk_no'],4);			
	}
	

	
}



	

?>

