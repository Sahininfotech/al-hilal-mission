<?php
  require_once '../../_config/dbconnect.php';
  require_once '../../classes/student.class.php';
  require_once '../../classes/fees-accounts.class.php';

  $Student     = new  Student();
  $FeesAccount            = new FeesAccount();
  if(isset ( $_POST["submitdata"])){          

    // echo $name, $student_id,  $roll_no, $class_id, $total_amount, $session;
    // exit;

    // if($class == "12"){
    //   $results=$Student->studentdelect($class);
    // }
    // else
    // {
    //   $results=$Student->changedata($class_id, $class, $session);
    // $results=$Student->feeschangedata($name, $student_id, $roll_no, $gurdian_name, $class_id, $total_amount, $session);
    
    // } 


    $name           = $_POST["name"];
    $student_id     = $_POST["student_id"];
      
    $conc_remark    = $_POST["conc_remark"];
    $amount         = $_POST["total_amount"];
    $gurdian_name   = $_POST["gurdian"];
    $academic_year  = $_POST["session"];
    $roll_no        = $_POST["roll_no"];
    $class          = $_POST["class"];
  
     $discount       = '';
    
     if (isset($_POST["discount"])) {

    if($discount       = $_POST["discount"]){
     $payable_fee   = $amount - $discount;
    }
   else{
    
      $payable_fee    = $amount;     
       
     }}


         $result   = $FeesAccount->addFeesAccounts($student_id, $discount, $name, $conc_remark, $payable_fee, $gurdian_name, $academic_year, $roll_no, $class);
 
     } 

    if($result){
      echo "<script>alert('Student Details Has Been Updated!');document.location='../studentdetails.php'</script>";
    }
    else{
      echo "<script>alert('Failed to Student Details');document.location='../studentdetails.php'</script>";
    }
  

?>