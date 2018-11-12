<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");
	$page = $_GET['page'] ?? 1;		
	$start_num = 1;

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

?>
<script type="text/javascript" src="../js/admin.js"></script>
<section class="container">			
	<div>
		<div class="admin_title">회원관리</div>		
		<div class="admin_position">Home  » 회원관리 » 회원관리</div>			
		<hr class="garo" style="display: block;"> 
	</div>
	<div class="search_div">
		<select id="search_select">
			<option value="order_number">이름</option>	
		</select>
		<input type="text" id="search_input">		
		<a class="btn type05" id="user_search_btn">검색</a>

	</div>	
	<div class="btn_div">
		<a class="btn type05" href="../data_download.php?type1=user">엑셀다운로드</a>	
	</div>
	<table class="list-table">
		<caption class="readHide">회원관리</caption>
		<thead class="admin_list">
			<tr>
				<th scope="col" class="thead_th">No.</th>
				<th scope="col" class="thead_th">ID</th>
				<th scope="col" class="thead_th">성명</th>
				<th scope="col" class="thead_th">성별</th>
				<th scope="col" class="thead_th">생년월일</th>
				<th scope="col" class="thead_th">가입일</th>
			</tr>
		</thead>
		<tbody>
				<?php
					$result = while_get_user_list($page,$search,"tb_user");
					while ($r = mysqli_fetch_array($result)) {
				?>
			<tr>				
				<td class="tbody_td"><?= $r['row']?></td>
				<td class="tbody_td"><a href="detail.php?no=<?=$r["pk_no"]?>"><?= $r['fd_id']?></a></td>
				<td class="tbody_td"><?=$r['fd_name']?></td>
				<td class="tbody_td"><?php if($r['fd_gender']=='m') echo '남';else echo '여';?></td>
				<td class="tbody_td"><?=$r['fd_birthday']?></td>
				<td class="tbody_td"><?=$r['fd_date']?></td>				
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
			$total_count = user_count($search);
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
</body>
</html>
