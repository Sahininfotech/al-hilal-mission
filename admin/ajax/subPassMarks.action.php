<?php
  require_once '../../_config/dbconnect.php';

    require_once '../../classes/exam.class.php';

    $Examination        = new Examination();

    if(isset ($_POST["Submitsubject"])){

        $studentmarks   = $_POST["subjectmarks"];

        $classnameIds   = $_POST["subjectname"];

        $classIds       = $_POST["id"];

        $class_id       = $_POST["class_id"];

        for ($i = 0; $i < count($classnameIds); $i++)  {

            for ($i = 0; $i < count($studentmarks); $i++)  {

                for ($i = 0; $i < count($classIds); $i++)  {

                    for ($i = 0; $i < count($class_id); $i++)  {

             $class_name   = $classnameIds[$i];

             $marks        = $studentmarks[$i];

             $classId      = $classIds[$i];

             $class_ids      = $class_id[$i];

            $result=$Examination->subjectpassMarks($marks, $class_name, $classId, $class_ids);    

            }

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