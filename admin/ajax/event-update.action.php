<?php
require_once '../../_config/dbconnect.php';

require_once '../../classes/events.class.php';

$Events            = new Event();

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $eventname     = $_POST["eventname"];

    $description   = $_POST["description"];

    $eventdate     = $_POST["date"];

    $eventtime     = $_POST["time"];

    $id            = $_POST["id"];

    $new_image     = $_FILES['image']['name'];

    $img_tmp_name  = $_FILES['image']['tmp_name'];
 
    $image_folter  = '../image/'.$_FILES['image']['name'];
 
    if($new_image != ''){
 
       $c_image    = $new_image;
 
    }else{
       $old_img    = $_POST['updateimg'];
       $c_image    = $old_img;
 
    }
  
    move_uploaded_file( $img_tmp_name, $image_folter );

    $update      = $Events->eventUpdate($eventname, $description, $eventdate, $eventtime, $id, $c_image);

    if(!$update){

      header("Location: ../events.php");

    }

    else{

      echo "<h1>Event Has Been Updated! <br><h1>";

    }

  }


?>