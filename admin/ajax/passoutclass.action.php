<?php
  require_once '../../_config/dbconnect.php';
  require_once '../../classes/student.class.php';
  require_once '../../classes/fees-accounts.class.php';

  $Student     = new  Student();
  $FeesAccount            = new FeesAccount();
  if(isset ( $_POST["submitdata"])){          

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