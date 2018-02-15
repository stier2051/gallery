<?php
require_once 'dataManager.php';
header("Location: ".$_SERVER['HTTP_REFERER']);

function thumbnailImage($image_url, $thumb_url){
    $im = new \Imagick(realpath($image_url));
    $im->cropthumbnailimage(300, 168);
    header("Content-Type: image/jpg, image/jpeg, image/png, image/gif");
    file_put_contents($thumb_url, $im);
}
    
$new_image_name = date('YmdHis');
$upload_dir = 'images/upload/full/';
$image_url = $upload_dir.$new_image_name.".".basename($_FILES['userfile']['type']);
        
$thumb_name = 'thumb_'.basename($image_url);
$thumb_url = 'images/upload/thumbs/'.$thumb_name;

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $image_url)){
   thumbnailImage($image_url, $thumb_url);
   $db = new dataManager;
   $db->addImage("INSERT INTO upload (image_id, image, image_thumb, click) VALUES (NULL, ?, ?, '0')", [$image_url, $thumb_url]);
}
        
    
    


