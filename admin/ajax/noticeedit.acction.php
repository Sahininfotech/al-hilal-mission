<?php
  require_once '../../_config/dbconnect.php';
require_once '../../classes/employee.class.php';

  $employees = new  Employee();

      if($_SERVER['REQUEST_METHOD'] == 'POST'){

          $id            = $_POST["id"];
          $notice        = $_POST["notice"];
          $subject       = $_POST["subject"];
          $old_img       = $_POST['updateimg'];

          $new_image     = $_FILES['signature']['name'];
          $img_tmp_name  =$_FILES['signature']['tmp_name'];
          $image_folter  = '../image/'.$_FILES['signature']['name'];
       
       
       
          if($new_image != ''){
             $c_image = '../image/'.$_FILES['signature']['name'];
          }else{
             $c_image = $old_img;
          }
       
       
          move_uploaded_file( $img_tmp_name, $image_folter );
      
      $update=$employees->noticeedit($id, $c_image, $notice, $subject);
      
        }
      if($update){
        echo "<h1>message data send <br><h1>";
        }
        else{
        echo header("Location: staffnotice.php");

  }

      ?>