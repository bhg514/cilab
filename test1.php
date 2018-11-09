<?php
$a = crypt(1,'');

if(crypt(1 , $a) == $a){
    echo "true";
}else{
    echo "false";
}


?>