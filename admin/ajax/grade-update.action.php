<?php
require_once '../../_config/dbconnect.php';

require_once '../../classes/exam.class.php';



    $classes = new  Examination();



  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    

    $min_marks   = $_POST["min_marks"];

    $max_marks = $_POST["max_marks"];

    $grade  = $_POST["grade"];

    $full_name  = $_POST["full_name"];

    $id  = $_POST["id"];


    $update      = $classes->gradeupdate($min_marks, $max_marks, $grade, $full_name, $id);

    

    if(!$update){

      header("Location: grade-show.ajax.php");

  }

  else{

    echo "<h1>Subject Grade Details Has Been Updated!<br><h1>";

      

  }

  }

?>