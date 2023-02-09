<?php
  require_once '../../_config/dbconnect.php';

    require_once '../../classes/institutedetails.class.php';

    $classes = new  InstituteDetails();

    if(isset ($_POST["Submitdata"])){

        $studentmarks = $_POST["marks"];

        $studentIds   = $_POST["student_id"];

        for ($i = 0; $i < count($studentIds); $i++)  {



            for ($i = 0; $i < count($studentmarks); $i++)  {



             $student_id = $studentIds[$i];

             $marks      = $studentmarks[$i];

           

            $exam_id         = $_POST["exam_id"];

            $class_id        = $_POST["class_id"];

            $subject_id      = $_POST["subject_id"];

            $session         = $_POST["session"];             



            $result=$classes->marksInsert($marks, $session, $student_id, $class_id, $exam_id, $subject_id);    

            }

        }

    }
    if($result){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else{
    header('Location: ' . $_SERVER['HTTP_REFERER']);                            
    }

?>