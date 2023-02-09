
<?php

require_once '../../_config/dbconnect.php';
require_once '../../classes/exam.class.php';

    $classes = new  Examination();

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $exam_name   = $_POST["exam_name"];
    $description = $_POST["description"];
    $class_name  = $_POST["class_name"];
    $id  = $_POST["id"];


    $update      = $classes->examupdate($exam_name, $description, $class_name, $id);
    
    if(!$update){
      header("Location: exam-show.ajax.php");
  }
  else{
    echo "<h1>Data is Successfully Updated. <br><h1>";
      
  }

  }
   
?>
