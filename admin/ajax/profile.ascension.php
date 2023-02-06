<?php
  require_once '../../_config/dbconnect.php';
  require_once '../../classes/admin.class.php';

  $profileclass = new  Admin();

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name       = $_POST["name"];
    $email      = $_POST["email"];
    $address    = $_POST["address"];
    $ph_no      = $_POST["ph_no"];
    $institute  = $_POST["institute"];
    $profession = $_POST["profession"];
    // $twitter    = $_POST["twitter"];
    // $facebook   = $_POST["facebook"];
    // $instagram  = $_POST["instagram"];
    // $linkedin   = $_POST["linkedin"];
    $country    = $_POST["country"];
    $id         = $_POST["id"];

    $old_img       = $_POST['updateimg'];

    $new_image     = $_FILES['Profile_image']['name'];
 
    $img_tmp_name  =$_FILES['Profile_image']['tmp_name'];
 
    $image_folter  = '../image/'.$_FILES['Profile_image']['name'];
 
 
 
 
//  echo $old_imgs;
//  exit;
 
 
    if($new_image != ''){
 
       $c_image = '../image/'.$_FILES['Profile_image']['name'];
 
    }else{
 
       $c_image = $old_img;
 
    }
 
 
 
 
 
    move_uploaded_file( $img_tmp_name, $image_folter );


    $update     = $profileclass->update($id, $name, $country, $email, $ph_no, $address, $institute, $profession, $c_image);

  }

  if(!$update){
  echo "<h1>update data is sucessfull <br><h1>";
  header("Location: ../users-profile.php");
  }
  else{
   header("Location: ../users-profile.php");

  }

?>