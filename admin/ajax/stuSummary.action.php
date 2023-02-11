<?php
require_once '../../_config/dbconnect.php';
require_once '../../classes/admin.class.php';
require_once '../../classes/studdetails.class.php';
require_once '../../classes/institutedetails.class.php';
require_once '../../classes/studdetails.class.php';
require_once '../../classes/fees-accounts.class.php';
require_once '../../classes/student.class.php';

$Admin                  = new Admin();
$Institute              = new InstituteDetails();                                
$StudentDetails         = new StudentDetails();
$FeesAccount            = new FeesAccount();
$Student     = new  Student();   

$insertEmpQuery=false;

  if(isset ( $_POST["Submitdata"])){

    $name           = $_POST["name"];
    $student_id          = $_POST["student_id"];
   
    $roll_no     = $_POST["roll_no"];
    $address         = $_POST["address"];
    $contact          = $_POST["contact"];
    // $stream         = '';
    // if (isset($_POST["stream"])) {
        $stream         = $_POST["stream"];
    // }
    $post_office        = $_POST["post_office"];
    $police_station = $_POST["police_station"];
    $gurdian       = $_POST["gurdian"];
    $sdo            = $_POST["sdo_or_bdo"];
    $total_amount       = $_POST["total_amount"];
    $total_due          = $_POST["total_due"];
  
    $pin_code  = $_POST["pin_code"];
    $academic_year  = $_POST["academic_year"];
    $state        = $_POST["state"];

    $district      = $_POST["district"];

    $date_of_birth  = $_POST["date_of_birth"];
    $dded_by  = $_POST["dded_by"];
    $added_on        = $_POST["added_on"];

    $date      = $_POST["date"];

    $exam_status      = $_POST["exam_status"];

    $new_class      = $_POST["newclass"];

    for ($i = 0; $i < count($name); $i++)  {

        for ($i = 0; $i < count($student_id); $i++)  {

            for ($i = 0; $i < count($roll_no); $i++)  {

                for ($i = 0; $i < count($address); $i++)  {

                    for ($i = 0; $i < count($contact); $i++)  {

                        for ($i = 0; $i < count($stream); $i++)  {

                            for ($i = 0; $i < count($post_office); $i++)  {

                                for ($i = 0; $i < count($police_station); $i++)  {
                        
                                    for ($i = 0; $i < count($gurdian); $i++)  {
                        
                                        for ($i = 0; $i < count($sdo); $i++)  {
                        
                                            for ($i = 0; $i < count($total_amount); $i++)  {
                        
                                                for ($i = 0; $i < count($total_due); $i++)  {

                                                    for ($i = 0; $i < count($pin_code); $i++)  {

                                                        for ($i = 0; $i < count($academic_year); $i++)  {
                                                
                                                            for ($i = 0; $i < count($state); $i++)  {
                                                
                                                                for ($i = 0; $i < count($district); $i++)  {
                                                
                                                                    for ($i = 0; $i < count($date_of_birth); $i++)  {
                                                
                                                                        for ($i = 0; $i < count($dded_by); $i++)  {

                                                                            for ($i = 0; $i < count($added_on); $i++)  {
                                                
                                                                                for ($i = 0; $i < count($date); $i++)  {
                                                                                    for ($i = 0; $i < count($exam_status); $i++)  {

                                                                                        for ($i = 0; $i < count($new_class); $i++)  {
                                                                                
        
         $names            = $name[$i];
         $student_ids      = $student_id[$i];
         $roll_nos            = $roll_no[$i];
         $addresss      = $address[$i];
         $contacts            = $contact[$i];
         $streams      = $stream[$i];

         $post_offices            = $post_office[$i];
         $police_stations      = $police_station[$i];
         $gurdians            = $gurdian[$i];
         $sdos      = $sdo[$i];
         $total_amounts            = $total_amount[$i];
         $total_dues      = $total_due[$i];

         $pin_codes            = $pin_code[$i];
         $academic_years      = $academic_year[$i];
         $states            = $state[$i];
         $districts      = $district[$i];
         $date_of_births            = $date_of_birth[$i];
         $dded_bys      = $dded_by[$i];

         $added_ons            = $added_on[$i];
         $dates      = $date[$i];
         
         $Status      = $exam_status[$i];
         $newclass      = $new_class[$i];
      
         $class   = $_POST["class"];
         $session  = $_POST["session"];

         $result=$Student->studentsummaryadd($names, $student_ids, $roll_nos, $addresss, $contacts, $streams, $post_offices, 
         $police_stations, $gurdians, $sdos, $total_amounts, $total_dues,    
         $pin_codes, $academic_years, $states, $districts, $date_of_births,    
         $dded_bys, $added_ons, $dates, $class, $Status); 

         if($class == "12"){
      $results=$Student->studentdelect($class);
    }
    else
    {
         $results=$Student->changedata($newclass, $class, $session, $student_ids); 
    }
        }}}}}}

    }}}}}}

}}}}}}}}}}
  }     

  if($result & $results){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else{
    header('Location: ' . $_SERVER['HTTP_REFERER']);                            
    }
?>