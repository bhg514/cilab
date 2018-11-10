<?php
$a='<img style="width: 50%;" src="data:image/png;base64,iVBORw0KGgoAA" data-filename="test.png">';
$b='<img style="width: 50%;" src="data:image/png;base64,iVBORw0KGgoAA" data-filename="test.png">';


function img_save($data){
    //$data = data:image/png;base64,iVBORw0KGgoAA
    list($type, $imageData) = explode(';', $data); // data:image/png  , base64,iVBORw0KGgoAA
    list(,$extension) = explode('/',$type);  //  data:image   ,   png
    list(,$imageData) = explode(',', $imageData); // base64    ,    iVBORw0KGgoAA
    $fileName = "../img/upload_image/".uniqid().'.'.$extension;
    /*
    $extension = png
    $imageData = iVBORw0KGgoAA

    */

    //$imageData = base64_decode($imageData);
    //file_put_contents($fileName, $imageData);       
    return $fileName;
}

preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $a, $matches);



if(count($matches[0]) >0){ // img가 있을 때 
    
    $img_data_arr = $matches[1];
    $old_img_tag_arr = $matches[0];
    $test = $old_img_tag_arr;
    $new_img_tag_arr = array();         

    for($i=0; $i<count($img_data_arr); $i++){

        $file_name = img_save($img_data_arr[$i]); //이미지 저장

        $file_name=str_replace("..", "/admin", $file_name); //path 설정
        $img_tag=preg_replace("/ src=(\"|\')?([^\"\']+)(\"|\')?/","src=".$file_name,$old_img_tag_arr[$i]);
        $img_tag = preg_replace("/ data-filename=(\"|\')?([^\"\']+)(\"|\')?/","",$img_tag);

        array_push($new_img_tag_arr, $img_tag);
    }

    for ($i=0; $i<count($old_img_tag_arr); $i++) {
        $contents = str_replace($old_img_tag_arr[$i], $new_img_tag_arr[$i], $contents);
    }
}
?>