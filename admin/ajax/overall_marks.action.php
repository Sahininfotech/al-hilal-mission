<?php
require_once '../../_config/dbconnect.php';

require_once '../../classes/exam.class.php';

$Examination        = new Examination();


            $classId      = $_POST["ids"];

            $class_name   = $_POST["class_ids"];

            $marks        = $_POST["marks"];     
            
            // echo $marks, $class_name, $classId;
            // exit;

            $result = $Examination->overalMarks($marks, $class_name, $classId);

            if($result){
               echo $result;
            }
?>