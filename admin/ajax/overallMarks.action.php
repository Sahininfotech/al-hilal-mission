<?php
  require_once '../../_config/dbconnect.php';

    require_once '../../classes/exam.class.php';

    $Examination        = new Examination();

    if(isset ($_POST["Submitdata"])){

        $studentmarks   = $_POST["marks"];

        $classnameIds   = $_POST["classname"];

        $classIds       = $_POST["id"];

        for ($i = 0; $i < count($classnameIds); $i++)  {

            for ($i = 0; $i < count($studentmarks); $i++)  {

                for ($i = 0; $i < count($classIds); $i++)  {

             $class_name   = $classnameIds[$i];

             $marks        = $studentmarks[$i];

             $classId      = $classIds[$i];

            $result=$Examination->overalMarks($marks, $class_name, $classId);    

            }

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