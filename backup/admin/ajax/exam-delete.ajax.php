<?php
require_once '../../_config/dbconnect.php';
require_once '../../classes/exam.class.php';

  $Examination = new  Examination();

  if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $Id     = $_GET["id"];
    
    $update = $Examination->deleteExam($Id);
    
  }

  if($update){
    echo "<script>
              alert('Exam Data Delete Sucessfull');
              document.location = '../exams.php';
          </script>";
  }
  else{
    echo "<script>
              alert('Exam deletion failed!');
              document.location = '../exams.php';
          </script>";
  }

?>