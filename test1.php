<?php
$imagePath = 'admin/img/upload_image/5be5c9cb8fb34.png';
$type = "png";
echo 'data:image/'.$type.';base64,'.base64_encode(file_get_contents($imagePath));
//echo base64_decode('/admin/img/upload_image/5be5c9cb8fb34.png');


?>