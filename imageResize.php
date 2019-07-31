<?php

#1 change content type
header("Content-type: image/jpeg");


#2 check if image is set
if(isset($_GET['image'])){
    $image = $_GET['image'];
    // if ($image['type'] == 'jpeg' || $image['type'] == 'jpg') {
    //     # code...
    //     header("Content-type: image/jpeg");
    // } else {
    //     # code...
    //     header("Content-type: image/png");
    // }
    
#3 get image size
    $imageSize = getimagesize($image);

#4 get image width and heigth
    $imageWidth = $imageSize[0];
    $imageHeight = $imageSize[1];

#5 specify a new size of the image
    $new_size = ($imageWidth + $imageHeight)/($imageWidth * ($imageHeight /200));

#6 create new height and width
    $newHeight = $imageHeight * $new_size;
    $newWidth = $imageWidth * $new_size;

#7 create a new image
    $newImage = imagecreatetruecolor($newWidth,$newHeight);
    $oldImage = imagecreatefromjpeg($image);
  
#8 resize the image
    /*
    parameters
    1 destination image which is the new image
    2 the old image
    7 destination width the new width
    8 destination height the new width
    9 old width
    10 old height
    */
    imagecopyresized($newImage, $oldImage, 0, 0, 0, 0, $newWidth,$newHeight, $imageWidth, $imageHeight);

#9 display image and save image
    imagejpeg($newImage);

}
 