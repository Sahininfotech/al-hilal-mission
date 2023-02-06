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

            $total = $_POST['totalmark11'];
            // $id      = $_POST["id11"];

            $marksdata      = $total + $marks;
            
            
            $results     = $classes->marksInsert($marks, $session, $student_id, $class_id, $exam_id, $subject_id);
               
            $result=$classes->marksTotal($marksdata, $session, $student_id, $class_id, $total, $marks) ;  
   //       if($result){
   //          $subscriber =  "save";
   //          echo $subscriber;
   //       }else{
   //          $subscriber =  "save data update";
   //  echo $subscriber;
   //       }


   // $datacount = 00;

   // if ($results != null || $results != '') {

   //     $datacount = count($results);
      
   //     }
   //     if( $datacount == 0){
        
   //       $save =  "save";
   //       echo $save;
   //    }else{
   //       $save =  "save data update";
   //   echo $save;
   //    }
   if($results){
      echo $results;
   }
         
      ?>
