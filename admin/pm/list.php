<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");

?>
<section class="container">		
	<h3>상품관리</h3>	
	<table>
		<caption class="readHide">자유게시판</caption>
		<thead>
			<tr>
				<th> 
					<input type="checkbox" name="">
				</th>
				<th scope="col" class="no">분류</th>
				<th scope="col" class="title">상품명</th>
				<th scope="col" class="author">수량</th>
				<th scope="col" class="date">가격</th>
				<th scope="col" class="hit">최종수정일</th>
				<th scope="col" class="hit">상태</th>
			</tr>
		</thead>
		<tbody>
				<?php
					$result = while_get_production_list(1);
					while ($r = mysqli_fetch_array($result)) {
				?>
			<tr>
				<td> 
					<input type="checkbox" name="">
				</td>
				<td class="no"><?= $r['fd_category']?></td>
				<td class="title"><?= $r['fd_name']?></td>
				<td class="author"><?=$r['fd_stock']?></td>
				<td class="date"><?=$r['fd_price']?></td>
				<td class="hit"><?=$r['fd_date']?></td>
				<td class="hit"><?=$r['fd_status']?></td>
			</tr>
			

				<?php
					}
				?>
		</tbody>
	</table>
</section>

