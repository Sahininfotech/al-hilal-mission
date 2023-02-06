<?php
require_once '../../_config/dbconnect.php';

require_once '../../classes/exam.class.php';



    $classes = new  Examination();



  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    

    $rank_type   = $_POST["rank_type"];

    $min_marks = $_POST["min_marks"];

    $max_marks  = $_POST["max_mark"];

    $result_type  = $_POST["result_type"];

    $session  = $_POST["session"];


    $result      = $classes->percentageType($rank_type, $min_marks, $max_marks, $result_type, $session);

    

    if($result){
      header("Location: ../exams.php");
  }
  else{
      header("Location: ../exams.php");
      
  }

      

  }

?>