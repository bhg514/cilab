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
					$row = get_production_list(1);
					foreach ($row as $r) {
						# code...
					
					/*$sql = 'select * from board_free order by b_no desc';
					$result = $db->query($sql);
					while($row = $result->fetch_assoc())
					{
						$datetime = explode(' ', $row['b_date']);
						$date = $datetime[0];
						$time = $datetime[1];
						if($date == Date('Y-m-d'))
							$row['b_date'] = $time;
						else
							$row['b_date'] = $date;*/
					/*$count = 10;
					while ( $count>0) {
						$count --;*/

					
				?>
			<tr>
				<td class="no"><?php echo $row['b_no']?></td>
				<td class="title"><?php echo $row['b_title']?></td>
				<td class="author"><?php echo $row['b_id']?></td>
				<td class="date"><?php echo $row['b_date']?></td>
				<td class="hit"><?php echo $row['b_hit']?></td>
			</tr>
			<tr>
				<td><input type="checkbox" name=""></td>
				<td class="no">1</td>
				<td class="title">2</td>
				<td class="author">3</td>
				<td class="date">4</td>
				<td class="hit">5</td>
			</tr>

				<?php
					}
				?>
		</tbody>
	</table>
</section>

