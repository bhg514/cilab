<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php';
	include_once('../common.php');	
	$type= $_GET['type'] ?? 1;
	$page = $_GET['page'] ?? 1;		

	
	if($type==1) $head = "Notice";
	elseif($type==2) $head = "S/W download";
	elseif($type==4) $head = "Q&A";
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
				<a href="./list.php?type=1" class='<?php if($type==1) echo "on"?>'>Notice</a>
                <a href="./list.php?type=2" class="<?php if($type==2) echo "on"?>">S/W download</a>
				<a href="./list.php?type=4" class="<?php if($type==4) echo "on"?>">Q&A</a>
			</div>
			<table class="tblType01 listView">
				<caption><?=$head?></caption>
				<colgroup>
				<col style="width:70px;" class="mhide">
					<col>
				<?php
						if($type==1||$type==2){
				?>
					<col class="listDate">
					<col class="listCount">
				<?php
						}else if($type==4){
				?>
					<col class="listWriter">
					<col class="listDate">
					<col class="listFile">
				<?php
						}
				?>
				</colgroup>
				<thead>
					<tr>
						<th scope="col" class="mhide">No</th>
						<?php
							if($type==1) {
                                echo '<th scope="col">Title</th>
                                <th scope="col">Date</th>
                                <th scope="col">Views</th>';
							}elseif($type==2) {
							    echo '<th scope="col">S/W</th>
                                <th scope="col">Version</th>
                                <th scope="col">Download</th>';
							}else if($type==4){
								echo '<th scope="col">Title</th>
								<th scope="col">Writer</th>
								<th scope="col">Date</th>
								<th scope="col">Attach</th>';
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
							if($type==1){
								echo '<td class="title"><a href="detail.php?type='.$type.'&no='.$r["pk_no"].'">'.$r["fd_title"].'</a></td>';
								echo "<td>".$r['fd_date']."</td>";
								echo "<td>".$r['fd_count']."</td>";						
							}else if($type==2){
								echo '<td class="title"><a href="detail.php?type='.$type.'&no='.$r["pk_no"].'">'.$r["fd_title"].'</a></td>';
								echo "<td>".$r['fd_version']."</td>";
								if($r['fd_new_file']!=""){
									echo "<td><a href='./zip_down.php?zip=".$r["fd_title"]."&new_file=".$r['fd_new_file']."&file=".$r['fd_file']."'><img src='/images/icon/icon_file.png' class='save_img'></a></td>";	
								}else{
								    echo "<td></td>";
								}
							}else if($type==4){
								echo '<td class="title"><a href="qna_chk_pw.php?no='.$r["pk_no"].'">'.$r["fd_title"].'</a></td>';
								echo "<td>".$r['fd_name']."</td>";
								echo "<td>".$r['fd_date']."</td>";
								if($r['fd_new_file']!=""){
									echo "<td><a href='./zip_down.php?zip=".$r["fd_title"]."&new_file=".$r['fd_new_file']."&file=".$r['fd_file']."'><img src='/images/icon/icon_file.png' class='save_img'></a></td>";	
								}else{
								    echo "<td></td>";
								}
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
					$page_info = make_page($page,$total_count,$query_string,10);
				?>
				<a href="?<?=$query_string?>page=<?php if($page<$page_info[0]){ echo $page+1;}else{ echo $page_info[1];} ?>">
					<img src="/images/icon/btn_next.png" alt="pre" id="next_img" class="page_nav_btn">
				</a>
				<a href="?<?=$query_string?>page=<?=$page_info[0]?>">
					<img src="/images/icon/btn_last.png" alt="pre" id="last_img" class="page_nav_btn">
				</a>
			</div>				
			<div>
				<?php if($type==4) echo '<a href="qna.php" class="btn type07">Contact us</a>';?>
			</div>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>