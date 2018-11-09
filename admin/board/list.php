<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");
	$page = $_GET['page'] ?? 1;		
	$start_num = 1;
	$type = $_GET['type'] ?? 1;
	$search = $_GET['search'] ?? '';

	$query_string = $_SERVER['QUERY_STRING']; 
	$query_arr = explode('&', $query_string);
	
	$query_string ="";

	foreach ($query_arr as $query) {
		$query_sp = explode('=', $query);
		
		if($query_sp[0]!='page'){
			$query_string .= $query."&";
		}
	}
	if($type==1) $head = '공지사항';
	elseif($type==2) $head = 'SW다운로드';
	elseif($type==3) $head = '콘텐츠관리';
	elseif($type==4) $head = '1:1 문의';

?>
<script type="text/javascript" src="../js/admin.js"></script>
<section class="container">			
	<div>
		<div class="admin_title"><?=$head?></div>		
		<div class="admin_position">Home  » 게시판/콘텐츠관리 » <?=$head?></div>			
		<hr class="garo" style="display: block;"> 
	</div>
	<div class="search_div">
		<select id="search_select">
			<option value="order_number">제목</option>	
		</select>
		<input type="text" id="search_input">		
		<a class="btn type05" id="board_search_btn">검색</a>

	</div>	
	<div class="btn_div">
		<?php if($type!=4)
			echo '<a class="btn type05" href="new_data.php?type=<?=$type?>">등록</a>'
		?>		
	</div>
	<table>
		<caption class="readHide">상품 관리</caption>
		<thead class="admin_list">
			<tr>
				<th scope="col" class="thead_th">No.</th>
				<th scope="col" class="thead_th">제목</th>
				<th scope="col" class="thead_th">작성자</th>
				<th scope="col" class="thead_th">작성일</th>
				<?php
					if($type==1 || $type==2){

				?>
				<th scope="col" class="thead_th">조회수</th>
				<th scope="col" class="thead_th">첨부파일</th>
				<?php
					}elseif ($type==4) {
						echo '<th scope="col" class="thead_th">답변여부</th>';
					}	
				?>				
			</tr>
		</thead>
		<tbody>
				<?php
								
					$result = while_get_board_list($page,$search,$type);		
					while ($r = mysqli_fetch_array($result)) {
				?>
			<tr>				
				<td class="tbody_td"><?= $r['row']?></td>
				<?php
					if($type!=4){
						echo '<td class="tbody_td"><a href="detail.php?type='.$type.'&no='.$r["pk_no"].'">'.$r["fd_title"].'</a></td>';
					}else{
						echo '<td class="tbody_td"><a href="qna.php?type='.$type.'&no='.$r["pk_no"].'">'.$r["fd_title"].'</a></td>';
					}
				?>
				<td class="tbody_td"><?= $r['fd_name']?></td>
				<td class="tbody_td"><?=$r['fd_date']?></td>
				<?php
					if($type==1 || $type==2){

				?>
				<td class="tbody_td"><?=$r['fd_count']?></td>
				<td class="tbody_td"><?php if($r['fd_file']!=null) echo '<img src="/images/icon/save.png" class="save_img">';?></td>
				<?php
					}elseif ($type==4) {
						if($r['fd_reply']!=null)
							echo '<td class="tbody_td">답변완료</td>';
						else echo '<td class="tbody_td">미답변</td>';				
					}	
				?>				
			</tr>
			

				<?php
				}
				?>
		</tbody>
	</table>
	<div class="page_nav">
		<a href="?<?=$query_string?>page=1">
			<img src="/images/icon/btn_first.png" alt="pre" id="first_img" class="page_nav_btn">
		</a>
		<a href="?<?=$query_string?>page=<?php if($page>1){ echo $page-1;}else{ echo '1';} ?>">
			<img src="/images/icon/btn_prev.png" alt="pre" id="prev_img" class="page_nav_btn" >
		</a>
		<?php
			$total_count = board_count($type, $search);
			$page_info = make_page($page,$total_count,$query_string,10);

			

		?>
		<a href="?<?=$query_string?>page=<?php if($page<$page_info[0]){ echo $page+1;}else{ echo $page_info[1];} ?>">
			<img src="/images/icon/btn_next.png" alt="pre" id="next_img" class="page_nav_btn">
		</a>
		<a href="?<?=$query_string?>page=<?=$page_info[0]?>">
			<img src="/images/icon/btn_last.png" alt="pre" id="last_img" class="page_nav_btn">
		</a>
	</div>	
	
	<div class="wrap-loading display-none">
	    <div><img src="/images/icon/loading.gif" /></div>
	</div>  




</section>

