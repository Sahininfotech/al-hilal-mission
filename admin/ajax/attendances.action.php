<?php
require_once '../../_config/dbconnect.php';

require_once '../../classes/student.class.php';

$Student        = new Student();



            $roll_no      = $_POST["roll_no"];

            $name         = $_POST["name"];

            $class        = $_POST["class"];

            $status       = $_POST["status"];

            $session      = $_POST['session'];

            $student_id   = $_POST['student_id'];

            $date         = $_POST['date'];

            $subject      = $_POST['subject'];
        
            $result = $Student->addattendance($roll_no, $name, $class, $status, $session, $student_id, $date, $subject);

            if($result){
               echo $result;
            }
?>