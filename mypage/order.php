<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php';
	$id = $_SESSION['user_id'];
	if(!isset($id)){
		header("location:http://".$http_host."/index.php");
	}

?>
<section class="container">
	<div class="visual store">
		<p class="subTitle">배송 조회</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>마이페이지</span>
			<span>&gt;</span>
			<span>배송조회</span>
		</div>
	</div>
	<div class="contents">
		<div class="btnTab">
			<a href="./order.php" class="on">배송 조회</a>
			<a href="./info.php" >정보 수정</a>
		</div>
		<div class="tabletInner">
			<div class="tblType01Wrap">
				<table class="tblType01 listView">
					<caption>주문정보</caption>
					<colgroup>
						<col style="width:120px;">
						<col>
						<col style="width:115px;">
						<col style="width:75px;">
						<col style="width:110px;">
						<col style="width:110px;">
						<col style="width:110px;">
						<col style="width:110px;">
					</colgroup>
					<thead>
						<tr>
							<th scope="col">주문일자</th>
							<th scope="col">상품명</th>
							<th scope="col">총액</th>
							<th scope="col">상태</th>
							<th scope="col">배송조회</th>
							<th scope="col">반품신청</th>
							<th scope="col">환불신청</th>
							<th scope="col">구매확정</th>
						</tr>
					</thead>
					<tbody>
						<?php
										
							$result = user_order_list($id);		
							while ($r = mysqli_fetch_array($result)) {
						?>
						<tr>
							<td><?=$r['fd_date']?></td>
							<td><?=$r['fd_name']?></td>
							<td><?=$r['fd_price']+$r['fd_del_fee']?></td>
							<td>
								<?php
									if($r['fd_status']==1) echo "주문완료";
									elseif($r['fd_status']==2) echo "상품준비중";
									elseif($r['fd_status']==3) echo "배송중";
									elseif($r['fd_status']==4) echo "배송완료";
									elseif($r['fd_status']==5) echo "구매확정";
									elseif($r['fd_status']==6) echo "주무문취소";
									elseif($r['fd_status']==7) echo "교환";
									elseif($r['fd_status']==8) echo "반품";
								?>
							</td>
							<td><a href="#a" class="btn type05">배송조회</a></td>
							<td><a href="#a" class="btn type05">반품신청</a></td>
							<td><a href="#a" class="btn type05">환불신청</a></td>
							<td><a href="#a" class="btn type05">구매확정</a></td>							
						</tr>
						<?php
							}
						?>	
						
					
					</tbody>
				</table>
			</div>
			<div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>

