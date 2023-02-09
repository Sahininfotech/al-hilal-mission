<?php
require_once '../../_config/dbconnect.php';
require_once '../../classes/exam.class.php';

    $classes = new  Examination();


    if(isset ($_GET["submit"])){

        $exam_name   = ($_GET["exam_name"]);
        $class_name  = ($_GET["class_name"]);
        $description = ($_GET["description"]);
        $year        = ($_GET["year"]);
        
        $resultclass = $classes->addExam( $class_name, $exam_name, $description, $year); 
        
        if($resultclass){
            header("Location: ../exams.php");
        }
        else{
            header("Location: ../exams.php");
            
        }

    }
    
?>