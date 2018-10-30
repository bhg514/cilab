<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php';
	include_once('../common.php');	
	$type= $_GET['type'] ?? 1;
	$start_num = 1;
	$page = $_GET['page'] ?? 1;		
	if($type==1) $head = "공지사항";
	elseif($type==2) $head = "S/W다운로드";
	elseif($type==4) $head = "문의하기";
?>
<section class="container">
	<div class="visual support">
		<p class="subTitle"><?=$head?></p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>SUPPORT</span>
			<span>&gt;</span>
			<span><?=$head?></span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<div class="btnTab">
				<a href="./list.php?type=1" class='<?php if($type==1) echo "on"?>' >공지사항</a>
                <a href="./list.php?type=2" class="<?php if($type==2) echo "on"?>">S/W 다운로드</a>
				<a href="./list.php?type=4" class="<?php if($type==4) echo "on"?>">문의하기</a>
			</div>
			<table class="tblType01 listView">
				<caption><?=$head?></caption>
				<colgroup>
					<col style="width:70px;" class="mhide">
					<col>
					<col class="noticeDate">
					<col class="noticeCount">
				</colgroup>
				<thead>
					<tr>
						<th scope="col">번호</th>
						<?php
							if($type==1||$type==2){
						?>
								<th scope="col">제목</th>
						<?php
								if($type==1) echo '<th scope="col">날짜</th>';
								elseif($type==2) echo '<th scope="col">버전</th>';
						?>
						
								<th scope="col">조회수</th>
						<?php
							}else if($type==4){

						?>
								<th scope="col">문의제목</th>
								<th scope="col">작성자</th>
								<th scope="col">작성일</th>
								<th scope="col">첨부파일</th>
						<?php
							}
						?>
					</tr>
				</thead>
				<tbody>
					<?php
									
						$result = while_get_board_list($page,null,$type);		
						while ($r = mysqli_fetch_array($result)) {
					?>
					<tr>
						<td class="mhide"><?=$r['row']?></td>
						<?php
							if($type==1||$type==2){
								echo '<td class="title"><a href="detail.php?type='.$type.'&no='.$r["pk_no"].'">'.$r["fd_title"].'</a></td>';
								echo "<td>".$r['fd_date']."</td>";
								echo "<td>".$r['fd_count']."</td>";						
							}else if($type==4){
								echo '<td class="title"><a href="qna_chk_pw.php?no='.$r["pk_no"].'">'.$r["fd_title"].'</a></td>';
								echo "<td>".$r['fd_name']."</td>";
								echo "<td>".$r['fd_date']."</td>";
								echo "<td>".$r['fd_file']."</td>";
							}

						?>
					</tr>
					<?php
						}
					?>					
				</tbody>
			</table>
			<div id="paging" class="page_nav">
				<a href="?<?=$query_string?>page=1">
					<img src="/images/icon/btn_first.png" alt="pre" id="first_img" class="page_nav_btn">
				</a>
				<a href="?<?=$query_string?>page=<?php if($page>1){ echo $page-1;}else{ echo '1';} ?>">
					<img src="/images/icon/btn_prev.png" alt="pre" id="prev_img" class="page_nav_btn" >
				</a>
				<?php
					$total_count = board_count($type, null);
					$total_count = $total_count[0];
					if($total_count == 0 ) $total_count = 1;
					
					$end_num = 10;
					$total_page = ceil($total_count/10);
					if($end_num>$total_page){
						$for_end = $total_page;
					}else{
						$for_end = $end_num;
					};
					for($i=$start_num; $i<=$for_end;$i++){			
						if ($page ==$i){
							echo "<a class = 'page_num on'>".$i."</a>";
						}else{
							echo "<a href='?".$query_string."page=".$i."' class = 'page_nav_btn page_num'>".$i."</a>";
							
						}
					}

					

				?>
				<a href="?<?=$query_string?>page=<?php if($page<$for_end){ echo $page+1;}else{ echo $for_end;} ?>">
					<img src="/images/icon/btn_next.png" alt="pre" id="next_img" class="page_nav_btn">
				</a>
				<a href="?<?=$query_string?>page=<?=$for_end?>">
					<img src="/images/icon/btn_last.png" alt="pre" id="last_img" class="page_nav_btn">
				</a>
			</div>				
			<div>
				<?php if($type==4) echo '<a href="qna.php" class="btn type07">문의하기</a>';?>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>