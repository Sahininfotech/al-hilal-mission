<?php 
session_start();

require_once '../../_config/dbconnect.php';
require_once '../../classes/student.class.php';
require_once '../../classes/fees-accounts.class.php';



   $insertEmpQuery=false;

   require_once '../../classes/admin.class.php';
   require_once '../../classes/studdetails.class.php';
   require_once '../../classes/institutedetails.class.php';
   require_once '../../classes/studdetails.class.php';


   
   $FeesAccount            = new FeesAccount();
   $Student                = new  Student();
   
   $Admin                  = new Admin();
   $Institute              = new InstituteDetails();                                
   $StudentDetails         = new StudentDetails();
  

   

   
    $insertEmpQuery=false;
   
     if(isset ($_POST["submitdata"])){

      $amounts   = $_POST["amount"];
      $purposess   = $_POST["purpose"];
    
      // $sum = 0;
  

      for ($i = 0; $i < count($amounts); $i++)  {
         
        $total_amount = array_sum($amounts);

        // echo $total_amount;


        // for ($i = 0; $i < count($purposess); $i++)  {
       
          
        //    $amount = $amounts[$i];
        //    $purposes = $purposess[$i];
     

        //   }
        }
          //  $total = $amounts[0] + $amounts[1] + $amounts[2];
          
    
   
       $name           = $_POST["name"];
       $email          = $_POST["email"];
       $gurdian_name   = $_POST["gurdian_name"];
       $contact_no     = $_POST["contact_no"];
       $gender         = $_POST["gender"];
       $class          = $_POST["class"];
       $stream         = '';
       if (isset($_POST["stream"])) {
           $stream         = $_POST["stream"];
       }
       $address        = $_POST["address"];
       $post_office    = $_POST["post_office"];
       $police_station = $_POST["police_station"];
       $pin_code       = $_POST["pin_code"];
       $sdo            = $_POST["sdo_or_bdo"];
       $district       = $_POST["district"];
       $state          = $_POST["state"];
       $status         = 1;
       $date_of_birth  = $_POST["date_of_birth"];
       $academic_year  = $_POST["session"];
       $roll_no        = $_POST["roll_no"];
      //  $total_amount   = $_POST["total_amount"];

       $student_id     = $_POST["student_id"];
   
      
    
   
   
   
       $result         = $Student->addtStudent( $student_id, $name,  $email, $gurdian_name, $contact_no, $gender, $post_office, $police_station, $pin_code, $sdo, $district, $state, $date_of_birth, $class, $stream, $address, $academic_year, $status, $roll_no, $total_amount);
   
     } 
   
     if(isset ($_POST["submitdata"])){
   
       $class_id = $_POST["class"];
   
       $result   = $Student->studenclasstInsert($student_id, $class_id);
     }
   
     if(isset ($_POST["submitdata"])){
       if($class == 11||$class == 12){
         $class_id =  $_POST["class"];
         $dept_id  =  $_POST["stream"];
         $result   = $Student->studenstreamtInsert($student_id, $class_id, $dept_id);
       }
     }
   
    
    //  if(isset ( $_POST["submitdata"])){
       
    //    foreach($_POST as $purposes => $amounts) {
    //      echo  $purposes . "=>" . $amounts;
   
    //      $purposesw = $purposes;
    //      $amountsw  = $amounts;
   
    //      $result   = $FeesAccount->addFeesAccounts($student_id, $purposesw, $amountsw);
   
   
    //    }
      
   
   
    //    } 



     
     if(isset ( $_POST["submitdata"])){
       
      $amounts   = $_POST["amount"];
      $purposess   = $_POST["purpose"];

      for ($i = 0; $i < count($amounts); $i++)  {
        for ($i = 0; $i < count($purposess); $i++)  {
       

           $amount = $amounts[$i];
           $purposes = $purposess[$i];

           $result   = $FeesAccount->addFeesAccounts($student_id, $purposes, $amount);
   
       } }}

  if($result){
    ?>
    <script>
        alert('Successfull!');
        location.href = `../addnewstudent.php`; 
      </script>
    <?php
  }
  else{
    ?>
    <script>
        alert('Failed!');
        location.href = `../addnewstudent.php`; 
      </script>
    <?php
   }



?>