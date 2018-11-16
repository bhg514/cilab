<?php
    $option_name = "2번옵션";
    $a= "1번옵션^1000||2번옵션^3000||3번옵션^2000";
    $options = explode('||',$a);

    for($i=0; $i<count($options);$i++){
        $option = explode('^', $options[$i]);
        if($option[0]==$option_name){
            echo $option[1];
        }
    }

?>