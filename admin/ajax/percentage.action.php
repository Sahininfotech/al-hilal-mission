<?php
require_once '../../_config/dbconnect.php';

require_once '../../classes/exam.class.php';



    $classes = new  Examination();



  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    
    $id   = $_POST["id"];
    $marks   = $_POST["marks"];

    $type = $_POST["type"];

    $session  = $_POST["session"];


    $result      = $classes->updatepassMarks($type, $marks, $session, $id);

    

    if($result){
      header("Location: ../exams.php");
  }
  else{
      header("Location: ../exams.php");
      
  }

      

  }

?>