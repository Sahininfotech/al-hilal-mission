<?php
require_once '../../_config/dbconnect.php';
require_once '../../classes/exam.class.php';

    $classes = new  Examination();


    if(isset ($_POST["submit"])){

        $exam_name   = $_POST["exam_name"];
        $class_name  = $_POST["class_name"];
        $description = $_POST["description"];
        $year        = $_POST["year"];
        $max_marks   = $_POST["max_marks"];
        
        $resultclass = $classes->addExam($class_name, $exam_name, $description, $year, $max_marks); 
        
        if($resultclass){
            header("Location: ../exams.php");
        }
        else{
            header("Location: ../exams.php");
            
        }

    }
    
?>