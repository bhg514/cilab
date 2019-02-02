<?php
    header ( "content-type:text/html; charset=utf-8" );
    include '../header.php';
    include_once('../common.php');  

    $no = $_POST['post_no'];

    if( $no==null){        
        alert('It is a wrong approach.','list.php?type=3');
    }

    $info = get_board_info($no,3);

?>
<link rel="stylesheet" type="text/css" href="../css/board_view.css">
<section class="container">
    <div class="visual support">
        <p class="subTitle">Q&amp;A</p>
        <div class="location">
            <img alt="Home" src="/images/common/icon_home.png">
            <span>&gt;</span>
            <span>SUPPORT</span>
            <span>&gt;</span>
            <span>Q&amp;A</span>
        </div>
    </div>
    <div class="contents">
        <div class="tabletInner">
            <div class="btnTab">
                <a href="./list.php?type=1" >Notice</a>
                <a href="./list.php?type=2" >S/W download</a>
                <a href="./list.php?type=3" class="on" >Q&amp;A</a>
            </div>            

            <article id="bo_v">
                <section id="bo_v_atc">
                    <h2 id="bo_v_atc_title">Q&amp;A</h2>
                    <table class="qna_answer_tb">                        
                        <tbody>
                            <tr>                        
                                <th scope="row">Title</th>                     
                                <td colspan="3"><?=$info['fd_title']?>
                                    <input type="hidden" name="no" value="<?=$info['pk_no'] ?>">
                                </td>
                            </tr>                   
                            <tr>
                                <th scope="row">Question</th>
                                <td colspan="3"><?=$info['fd_content']?></td>
                            </tr>
                            <tr>
                                <th scope="row">Attachments</th>
                                <td olspan="3">
                                    <?php 
                                        if($info['fd_file']!=""){                                            
                                            echo '<a href="file_down.php?file='.$info['fd_new_file'].'&name='.$info['fd_file'].'"><img src="../images/icon/icon_file.png" class="save_img"><label>'.$info['fd_file'].'</label><br/></a>';
                                        }
                                    ?>
                                	<input type="hidden" name="file_count" id="file_count" value="">
                                </td>
                            </tr>                            
                            <tr>
                                <th scope="row">Answer</th>
                                <td colspan="3">
                                    <?php
                                        if($info['fd_reply']==null){
                                            echo "No answer yet.";    
                                        }else{
                                            echo $info['fd_reply'];
                                        }
                                        
                                    ?>
                                </td>
                            </tr>
                                            
                        </tbody>
                    </table>                    
                </section>
                <div class="mt20 ar">               
                    <a href="list.php?type=3" class="btn type07">Home</a>
                </div>
            </article>
        </div>
    </div>
</section>

<?php
    include '../footer.php'
?>
