<?php
require_once '../../_config/dbconnect.php';

require_once '../../classes/exam.class.php';

$Examination              = new Examination();


            $classId      = $_POST["ids"];

            $class_name   = $_POST["class_ids"];

            $marks        = $_POST["marks"];   
            
            $class_ids    = $_POST["classId"]; 
            
            // echo $marks, $class_name, $classId, $class_ids;
            // exit;

            $result = $Examination->subjectpassMarks($marks, $class_name, $classId, $class_ids);

            if($result){
               echo $result;
            }
?>