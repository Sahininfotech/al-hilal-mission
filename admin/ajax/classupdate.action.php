<?php
require_once '../../_config/dbconnect.php';



require_once '../../classes/institutedetails.class.php';



$institudeclass = new  InstituteDetails();



  if($_SERVER['REQUEST_METHOD'] == 'POST'){



    $classname   = $_POST["classname"];



    $description = $_POST["description"];



    $id = $_POST["id"];


    $new_image     = $_FILES['image']['name'];

    $img_tmp_name  = $_FILES['image']['tmp_name'];
 
    $image_folter  = '../image/'.$_FILES['image']['name'];
 
 
 
 
 
 
 
    if($new_image != ''){
 
       $c_image = $new_image;
 
    }else{
       $old_img       = $_POST['updateimg'];
       $c_image = $old_img;
 
    }
 
 
 
 
 
    move_uploaded_file( $img_tmp_name, $image_folter );



    $update      = $institudeclass->classupdate($classname, $description, $id, $c_image);



  



    if(!$update){



      header("Location: ../classes.php");



    }



    else{



      echo "<h1>Class Has Been Updated! <br><h1>";



    }







  }


?>