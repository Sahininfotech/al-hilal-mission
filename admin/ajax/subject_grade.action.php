<?php
require_once '../../_config/dbconnect.php';

require_once '../../classes/exam.class.php';



    $classes = new  Examination();



  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    
    $max_marks        = $_POST["max_marks"];
    $nim_marks     = $_POST["nim_marks"];

    $grade_name      = $_POST["grade_name"];

    $full_name   = $_POST["full_name"];


    $result    = $classes->addgrade($nim_marks, $max_marks, $grade_name, $full_name);

    

    if($result){
      header("Location: ../exams.php");
  }
  else{
      header("Location: ../exams.php");
      
  }

      

  }




?>