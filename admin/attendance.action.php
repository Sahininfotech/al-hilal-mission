<?php
  require_once '../../_config/dbconnect.php';

    require_once '../../classes/student.class.php';

    $Student        = new Student();
    
    if(isset ($_POST["submit"])){
    
        $roll_nos       = $_POST["roll_no"];
        $names          = $_POST["name"];
       
        $statuses       = $_POST["status"];
        $studentIds     = $_POST["student_id"];
        $classes        = $_POST["class"];
        $sessions       = $_POST["session"];
    
        
    
        for ($i = 0; $i < count($studentIds); $i++)  {
    
            for ($i = 0; $i < count($roll_nos); $i++)  {
    
                for ($i = 0; $i < count($names); $i++)  {
    
                        for ($i = 0; $i < count($statuses); $i++)  {
                            for ($i = 0; $i < count($classes); $i++)  {
    
                                for ($i = 0; $i < count($sessions); $i++)  {
    
             $student_id   = $studentIds[$i];
             $roll_no      = $roll_nos[$i];
             $name         = $names[$i];
             
             $status        = $statuses[$i];
    
             $class         = $classes[$i];
             
             $session        = $sessions[$i];
             $date           = $_POST["date"];
             $subject        = $_POST["subject"];
            
            
            //  echo $subject;
            //  exit;
    
           $result = $Student->addattendance($roll_no, $name, $class, $status, $session, $student_id, $date, $subject);
    
            if($result){
            echo "<script>
            window.history.back();
            </script>";
            }
            else{
            echo "<script>
            window.history.back();
    
            </script>";                            
            }
    
        }}}}}}}
?>