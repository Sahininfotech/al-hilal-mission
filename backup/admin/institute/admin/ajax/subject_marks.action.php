  <?php
require_once '../../_config/dbconnect.php';

      require_once '../../classes/institutedetails.class.php';

      $classes = new  InstituteDetails();

            $marks      = $_POST["marks11"];
            $session      = $_POST["session11"];
            $student_id = $_POST["student_id11"];
            $exam_id    = $_POST["exam_id11"];
            $class_id   = $_POST['class_id11'];
            $subject_id = $_POST['subject_id11'];
            // $id      = $_POST["id11"];
            
            
            $result     = $classes->marksInsert($marks, $session, $student_id, $class_id, $exam_id, $subject_id);
               
               
         if($result){
            echo 1;
         }else{
            echo 0;
         }

         
      ?>
