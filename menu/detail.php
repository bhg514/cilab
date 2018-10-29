<?php
    header ( "content-type:text/html; charset=utf-8" );
    include '../header.php';
    include_once('../common.php');  
    $type = $_GET['type'];
    $no = $_GET['no'];

    $info = get_board_info($no,$type);

    if($type==1) $head = "공지사항";
    elseif($type==2) $head = "S/W다운로드";    

    


?>
<link rel="stylesheet" type="text/css" href="../css/board_view.css">
<section class="container">
    <div class="visual support">
        <p class="subTitle"><?=$head?></p>
        <div class="location">
            <img alt="Home" src="/images/common/icon_home.png">
            <span>&gt;</span>
            <span>SUPPORT</span>
            <span>&gt;</span>
            <span><?=$head?></span>
        </div>
    </div>
    <div class="contents">
        <div class="tabletInner">
            <div class="btnTab">
                <a href="./list.php?type=1" class="<?php if($type==1) echo "on"?>" >공지사항</a>
                <a href="./list.php?type=2" class="<?php if($type==2) echo "on"?>" >S/W 다운로드</a>
                <a href="./list.php?type=4" class="<?php if($type==4) echo "on"?>" >문의하기</a>
            </div>            

            <article id="bo_v">
                <header>
                    <h1 id="bo_v_title"><?=$info['fd_title']?></h1>
                </header>
                <section id="bo_v_info">
                    <h2>페이지 정보</h2>
                    작성자 
                    <strong>
                        <span class="sv_member"><?=$info['fd_name']?></span>
                    </strong>
                    <span class="sound_only">작성일</span>
                    <strong><?=$info['fd_date']?></strong>
                    조회<strong><?=$info['fd_count']?>회</strong>
                </section>
                <section id="bo_v_file">
                    <h2>첨부파일</h2>
                    <ul>
                        <?php
                            $file_arr = explode('||', $info['fd_file']);
                            $new_file_arr = explode('||', $info['fd_new_file']);
                            if(count($file_arr)>1){                                

                                for ($i=0;$i< count($file_arr);$i++) {
                        ?>    
                            
                        <li>
                            <a href="file_down.php?file=<?=$new_file_arr[$i]?>&name=<?=$file_arr[$i]?>" class="view_file_download">
                                <img src="../images/icon/icon_file.png" alt="첨부">
                                <strong><?=$file_arr[$i]?></strong>(<?=formatSizeUnits(filesize('../admin/files/'.$new_file_arr[$i]))?>)
                            </a>                            
                        </li>
                        <?php
                                }
                            }
                        ?>
                    </ul>                    
                </section>
 

                <section id="bo_v_atc">
                    <h2 id="bo_v_atc_title">본문</h2>
                    <div id="bo_v_img">
                </div>                    

                <div id="bo_v_con">
                    <?=$info['fd_content']?>
                </div>
                </section>
                <div class="mt20 ar">               
                    <a href="list.php?type=<?=$type?>" class="btn type07">홈으로</a>
                </div>
            </article>
        </div>
    </div>
</section>

<?php
    include '../footer.php'
?>
