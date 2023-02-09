<?php
require_once '../../_config/dbconnect.php';
require_once '../../classes/studdetails.class.php';

$StudentDetails = new StudentDetails();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $name          = $_POST["name"];
    $status        = $_POST["status"];
    $email         = $_POST["email"];
    $class         = $_POST["class"];
    $roll_no       = $_POST["roll_no"];
    $id            = $_POST["id"];
    $address       = $_POST["address"];

    $old_img       = $_POST['updateimg'];

    $new_image     = $_FILES['image']['name'];
    $img_tmp_name  =$_FILES['image']['tmp_name'];
    $image_folter  = '../image/'.$_FILES['image']['name'];
 
 
 
    if($new_image != ''){
       $c_image = '../image/'.$_FILES['image']['name'];
    }else{
       $c_image = $old_img;
    }
 
 
    move_uploaded_file( $img_tmp_name, $image_folter );

    $update     = $StudentDetails->studentaction($name, $status, $email, $class, $roll_no, $address, $id, $c_image);
    
    if(!$update){
      echo header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else{
      echo "<h1>Student Details Has Been Updated!<br><h1>";
    
    }
    
  }
   
?>