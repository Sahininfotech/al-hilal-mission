<?php
require_once '../../_config/dbconnect.php';
require_once '../../classes/gallery.class.php';

$Photos = new  Photos();

$folder_name = '../image/';

$upload_pageName = "gallery.php";

if(!empty($_FILES))
{
    $temp_file = $_FILES['file']['tmp_name'];
    $location = $folder_name . $_FILES['file']['name'];
    $image_folter     = '../image/'.$image;
    move_uploaded_file($temp_file, $location);
    $result=$Photos->photoInsert($location, $upload_pageName);
}

// ========================preview image & image remove process =============================

// if(isset($_POST["name"]))
// {
//  $filename = $folder_name.$_POST["name"];
// // $filename =$_POST["name"];
//  unlink($filename);
// }

// $result = array();

// $files = scandir($folder_name);

// $output = '<div class="row">';

// if(false !== $files)
// {
//  foreach($files as $file)
//  {
//   if('.' !=  $file && '..' != $file)
//   {
//    $output .= '
//    <div class="col-md-2">
//     <img src="'.$folder_name.$file.'" class="img-thumbnail" width="175" height="175" style="height:175px;" />
//     <button type="button" class="btn btn-link remove_image" id="'.$file.'">Remove</button>
//    </div>
//    ';
//   }
//  }
// }
// $output .= '</div>';
// echo $output;

?>