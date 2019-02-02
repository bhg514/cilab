<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php';

    $type = $_GET['type'] ?? 5;
    $search = $_GET['search'] ?? '';
    $page = $_GET['page'] ?? 1;
    $query_string = $_SERVER['QUERY_STRING']; 
    $query_arr = explode('&', $query_string);
    
    $query_string ="";

    $exchange_url="http://free.currencyconverterapi.com/api/v6/convert?q=USD_KRW&compact=y";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $exchange_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
    $rt = curl_exec($ch);
    curl_close($ch);
    $hwan_api = json_decode($rt);
    $hwan_krw = $hwan_api->USD_KRW->val;

    foreach ($query_arr as $query) {
        $query_sp = explode('=', $query);
        
        if($query_sp[0]!='page'){
            $query_string .= $query."&";
        }
    }


?>
<section class="container">
	<div class="visual store">
		<p class="subTitle">STORE</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>STORE</span>
		</div>
	</div>
	<div class="contents">
		<div id="category_menu">
			<div class="category_logo">CiLab - Creative Idea Lab</div>
			<ul id="ui-id-1" role="menu" tabindex="0" class="ui-menu ui-widget ui-widget-content" aria-activedescendant="ui-id-2">
				<li class="ui-menu-item">
					<div id="ui-id-2" tabindex="-1" role="menuitem" class="ui-menu-item-wrapper ui-state-active">
						<a href="?type=5" class="">Total</a>
					</div>
				</li>

				<li class="ui-menu-item">
					<div id="ui-id-3" tabindex="-1" role="menuitem" class="ui-menu-item-wrapper">
						<a href="?type=1">Water Drones</a>
					</div>
				</li>
				<li class="ui-menu-item">
					<div id="ui-id-4" tabindex="-1" role="menuitem" class="ui-menu-item-wrapper">
						<a href="?type=2">Upgrade &amp; Accessories</a>
					</div>
				</li>  
				<li class="ui-menu-item">
					<div id="ui-id-5" tabindex="-1" role="menuitem" class="ui-menu-item-wrapper">
						<a href="?type=3">DIY &amp; Parts</a>
					</div>
				</li>
				<li class="ui-menu-item">
					<div id="ui-id-6" tabindex="-1" role="menuitem" class="ui-menu-item-wrapper">
						<a href="?type=4">Water Education kit</a>
					</div>
				</li>
                <li class="ui-menu-item">
                    <div id="ui-id-6" tabindex="-1" role="menuitem" class="ui-menu-item-wrapper">
                        <a href="https://smartstore.naver.com/cilab" target="_blank">Korea store</a>
                    </div>
                </li>
                
                 <!-- <li class="ui-menu-item">
                    <div id="ui-id-4" tabindex="-1" role="menuitem" class="ui-menu-item-wrapper">
                        <a href="?type=2">Water Drones &amp; Accessories</a>
                    </div>
                </li>  
                <li class="ui-menu-item">
                    <div id="ui-id-5" tabindex="-1" role="menuitem" class="ui-menu-item-wrapper">
                        <a href="?type=3">DIY &amp; Parts</a>
                    </div>
                </li> -->
			</ul>
		</div>
    	<div class="category_content">
            <div class="imgType01">
                <ul>
                    <?php    
                                 

                        $result = while_product_list($page,$type,$search);  
                        $count = 0;
                        while ($r = mysqli_fetch_array($result)) {                            
                            if($count%3==0 && $count!=0){
                                echo '</ul><ul>';
                            }
                    ?>
                    <li class="product_li">
                        <a href="./store_view.php?no=<?=$r['pk_no']?>">
                            <div class="image"><img src="/admin/img/upload_image/<?=$r['fd_new_main_img']?>" alt="product image" class="pd_img"></div>
                            <p class="price">
                                <span class="redbox">price</span>
                                
                                <?=number_format($r['fd_price'])?>KRW(<?=number_format($r['fd_price']/$hwan_krw,2)?>$)
                            </p>
                            <p class="name"><?=$r['fd_name']?></p>
                            
                        </a>
                    </li>
                    <?php                        
                        $count=$count+1;
                        }
                    ?>


                </ul>
            </div>
    		<div class="page_nav">
                <a href="?<?=$query_string?>page=1">
                    <img src="/images/icon/btn_first.png" alt="pre" id="first_img" class="page_nav_btn">
                </a>
                <a href="?<?=$query_string?>page=<?php if($page>1){ echo $page-1;}else{ echo '1';} ?>">
                    <img src="/images/icon/btn_prev.png" alt="pre" id="prev_img" class="page_nav_btn" >
                </a>
                <?php
                
                    $total_count = product_get_count($search,$type,1);
                    $page_info = make_page($page,$total_count,$query_string,9);



                ?>
                <a href="?<?=$query_string?>page=<?php if($page<$page_info[0]){ echo $page+1;}else{ echo $page_info[1];} ?>">
                    <img src="/images/icon/btn_next.png" alt="pre" id="next_img" class="page_nav_btn">
                </a>
                <a href="?<?=$query_string?>page=<?=$page_info[0]?>">
                    <img src="/images/icon/btn_last.png" alt="pre" id="last_img" class="page_nav_btn">
                </a>
            </div>
    	</div>
    </div>
</section>

<?php
    echo "<script>
    if($('.category_content .imgType01 ul li').length==0)
        $('.category_content .imgType01 ul').html('<a style=\"font-size: 20px;\">There is no registered product.</a>')
    </script>";
	include '../footer.php'
?>