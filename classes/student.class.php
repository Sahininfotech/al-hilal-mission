<?php
  
class Student extends DatabaseConnection{ 

//   inshat dada start
// auto id
function addtStudent($student_id, $name,  $email, $gurdian_name, $contact_no, $gender, $post_office, $police_station, $pin_code, $sdo, $district, $state, $date_of_birth, $class, $stream, $address, $academic_year, $status, $roll_no, $image){



$sql = "INSERT INTO `student` ( `student_id`,`name`, `email`, `gurdian_name`, `contact_no`, `gender`, `post_office`, `police_station`,`pin_code`, `sdo_or_bdo`, `district`, `state`, `date_of_birth`, `class`, `stream`,`address`, `academic_year`, `status`, `roll_no`, `image`, `date`)           
VALUES ( '$student_id', '$name',  '$email', '$gurdian_name', '$contact_no',  '$gender', '$post_office', '$police_station', '$pin_code',  '$sdo', '$district', '$state', '$date_of_birth', '$class', '$stream','$address','$academic_year', '$status', '$roll_no', '$image', current_timestamp())";

$insertEmpQuery = $this->conn->query($sql);

return $insertEmpQuery;


}




function studenclasstInsert($student_id, $class_id){

$sql = "INSERT INTO `student_class` (`student_id`, `class_id`) VALUES ('$student_id', '$class_id')";

$insertEmpQuery = $this->conn->query($sql);

return $insertEmpQuery;

}





function studenstreamtInsert($student_id, $class_id, $dept_id){
  //  $dept_id = !empty($dept_id) ? "'$dept_id'" : "NULL";
    

    $sql = "INSERT INTO `student_stream` (`student_id`, `class_id`, `dept_id`) VALUES ('$student_id', '$class_id', '$dept_id')";
    
    $insertEmpQuery = $this->conn->query($sql);
    
    return $insertEmpQuery;
    
    // inshat data end
    }
    









// delete start
function deleteEmp($deleteEmpId){

    $stu_id = $_GET['id'];

    $sqldal = "DELETE FROM `student` WHERE  `id` = {$stu_id}";

    $result1 = $this->conn->query($sqldal);

    return $result1;
}// end deleteDocCat function
   








// update start
function update( $name,  $email, $address, $contactno, $gender, $qualification, $experience/*Last Variable for id which one you want to update */ ){

    $rn = $_POST['id'];

$fn = $_POST ['name'];

$ln = $_POST['email'];

$dn = $_POST['added_by'];

$en = $_POST['added_on'];

    $sqledit = "UPDATE  `student` SET `id` = '{$rn}', `name`= '{$fn}', `email` = '{$ln}', `added_by` = '{$dn}' WHERE `student`.`id` = '{$rn}'";

    $editQuery = $this->conn->query($sqledit);

    // echo $editQuery.$this->conn->error;
    // exit;

    return $editQuery;   
}//end updateEmp function







// =====================================================================================




// display start
function studentById($studentId){

    $data = array();
    $sql = "SELECT * FROM `student` WHERE `id` = '$studentId'";
    $empQuery = $this->conn->query($sql);
    if ($empQuery->num_rows > 0) {
        while($row = $empQuery->fetch_array()){
            $data[]	= $row;
        }
    }
    return $data;

}
// end display



function studentByClass($classId){

    $data = array();
    $sql = "SELECT * FROM `student` WHERE `class` = '$classId'";
    $studentTypeQuery = $this->conn->query($sql);
    $rows = $studentTypeQuery->num_rows;
    if ($rows == 0) {
        return 0;
    }else{
        while ($result = $studentTypeQuery->fetch_array()) {
        $data[] = $result;
    }
    return $data;
    }
}
// end studentDetails function





// display start
function studentsByFees($student_Id){

    $data = array();
    // $sql = "SELECT * FROM `student_payment_dtls` WHERE `student_id` = '$student_Id'";

    $sql = "SELECT * , SUM(amount) AS 'Total' FROM `student_payment_dtls` WHERE `student_id` = '$student_Id'";

    $empQuery = $this->conn->query($sql);
    if ($empQuery->num_rows > 0) {
        while($row = $empQuery->fetch_array()){
            $data[]	= $row;
        }
    }
    return $data;

}
// end display 





// display start
function studentFeesaccount($student_Id, $feesaccounts){

    $data = array();

    $sql = "SELECT * FROM `studentfees` WHERE `student_id` = '$student_Id' and `purpose` = '$feesaccounts'";

    // $sql = "SELECT *, SUM(amount) as sum FROM `student_payment_dtls` WHERE `student_id` = '$student_Id' and `Fees_account` = '$feesaccounts'";

    $empQuery = $this->conn->query($sql);
    if ($empQuery->num_rows > 0) {
        while($row = $empQuery->fetch_array()){
            $data[]	= $row;
        }
    }
    return $data;

}
// end display 








// display start
function sameFeesaccount($student_Id, $feesaccounts){

    $data = array();

    $sql = "SELECT *, SUM(amount) as sum FROM `student_payment_dtls` WHERE `student_id` = '$student_Id' and `Fees_account` = '$feesaccounts'";

    $empQuery = $this->conn->query($sql);
    if ($empQuery->num_rows > 0) {
        while($row = $empQuery->fetch_array()){
            $data[]	= $row;
        }
    }
    return $data;

}
// end display student_payment_dtls








// display start
function studentFeesId($studentId){

    $data = array();
    $sql = "SELECT * FROM `student` WHERE `student_id` = '$studentId'";
    $empQuery = $this->conn->query($sql);
    if ($empQuery->num_rows > 0) {
        while($row = $empQuery->fetch_array()){
            $data[]	= $row;
        }
    }
    return $data;

}
// end display




//show student 

function studentchartday($student_chart){

    $sql = "SELECT * FROM `student` where day(DATE)=(SELECT day(CURDATE())) and month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE()))";

    $studentTypeQuery = $this->conn->query($sql);
    $rows = $studentTypeQuery->num_rows;
    if ($rows == 0) {
    return 0;
    }else{
    while ($result = $studentTypeQuery->fetch_array()) {
    $data[] = $result;
    }
    return $data;
    }


}

function studentchartmonth($student_chart){

    $sql = "SELECT * FROM `student` where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE()))";

    $studentTypeQuery = $this->conn->query($sql);
    $rows = $studentTypeQuery->num_rows;
    if ($rows == 0) {
    return 0;
    }else{
    while ($result = $studentTypeQuery->fetch_array()) {
    $data[] = $result;
    }
    return $data;
    }


}


function studentchartyear($student_chart){

    $sql = "SELECT * FROM `student` where year(DATE)=(SELECT YEAR(CURDATE()))";

    $studentTypeQuery = $this->conn->query($sql);
    $rows = $studentTypeQuery->num_rows;
    if ($rows == 0) {
    return 0;
    }else{
    while ($result = $studentTypeQuery->fetch_array()) {
    $data[] = $result;
    }
    return $data;
    }


}

// end show student



function studentClassatteb($classId, $session){

    $data = array();
    $sql = "SELECT * FROM `student` WHERE `class` = '$classId' and `academic_year` = '$session'";
    $studentTypeQuery = $this->conn->query($sql);
    $rows = $studentTypeQuery->num_rows;
    if ($rows == 0) {
        return 0;
    }else{
        while ($result = $studentTypeQuery->fetch_array()) {
        $data[] = $result;
    }
    return $data;
    }
}



function addattendance($roll_no, $name, $class, $status, $session, $student_id, $date, $subject){

    $sql = "SELECT * FROM `student_attendance` WHERE `student_attendance`.`student_id` = '$student_id' and `student_attendance`.`dates` = '$date'and `student_attendance`.`subject` = '$subject'";
    
     $selectdata   = $this->conn->query($sql);

     $rows = $selectdata->num_rows;

     if ($rows == 0) {
          
        $sql = "INSERT INTO `student_attendance` (`roll`, `name`, `classname`, `status`, `session`, `student_id`, `dates`, `subject`)           
        VALUES ('$roll_no', '$name', '$class', '$status', '$session', '$student_id', '$date', '$subject')";
        
        $insertEmpQuery = $this->conn->query($sql);
        
        return "save";
        
        
    }
        else
    {
             
             $sqledit = "UPDATE `student_attendance` SET `status` = '$status' WHERE  `student_attendance`.`student_id` = '$student_id' and `student_attendance`.`dates` = '$date'and `student_attendance`.`subject` = '$subject'";

             $result1 = $this->conn->query($sqledit);
     
             return "save data update";

    }
         

}



  // ----------attendance report-------------





function attendancechartday($student_chart, $class){

    $sql = "SELECT * FROM `student_attendance` where day(dates)=(SELECT day(CURDATE())) and month(dates)=(SELECT MONTH(CURDATE())) AND year(dates)=(SELECT YEAR(CURDATE())) AND `classname` = '$class' GROUP BY dates";

    $studentTypeQuery = $this->conn->query($sql);
    $rows = $studentTypeQuery->num_rows;
    if ($rows == 0) {
    return 0;
    }else{
    while ($result = $studentTypeQuery->fetch_array()) {
    $data[] = $result;
    }
    return $data;
    }


}



function attendancechartdays($showdatewise, $class){

    $sql = "SELECT * FROM `student_attendance` where day(dates)=(SELECT day(CURDATE())) and month(dates)=(SELECT MONTH(CURDATE())) AND year(dates)=(SELECT YEAR(CURDATE())) AND `classname` = '$class' AND `dates` = '$showdatewise'";

    $studentTypeQuery = $this->conn->query($sql);
    $rows = $studentTypeQuery->num_rows;
    if ($rows == 0) {
    return 0;
    }else{
    while ($result = $studentTypeQuery->fetch_array()) {
    $data[] = $result;
    }
    return $data;
    }


}




function attendancechartmonth($student_chart, $class){

    $sql = "SELECT * FROM `student_attendance` where month(dates)=(SELECT MONTH(CURDATE())) AND year(dates)=(SELECT YEAR(CURDATE())) AND `classname` = '$class' GROUP BY dates";

    $studentTypeQuery = $this->conn->query($sql);
    $rows = $studentTypeQuery->num_rows;
    if ($rows == 0) {
    return 0;
    }else{
    while ($result = $studentTypeQuery->fetch_array()) {
    $data[] = $result;
    }
    return $data;
    }


}




function attendancechartmonths($showdatewise, $class){

    $sql = "SELECT * FROM `student_attendance` where month(dates)=(SELECT MONTH(CURDATE())) AND year(dates)=(SELECT YEAR(CURDATE())) AND `classname` = '$class' AND `dates` = '$showdatewise'";

    $studentTypeQuery = $this->conn->query($sql);
    $rows = $studentTypeQuery->num_rows;
    if ($rows == 0) {
    return 0;
    }else{
    while ($result = $studentTypeQuery->fetch_array()) {
    $data[] = $result;
    }
    return $data;
    }


}





function attendancechartyear($student_chart, $class){

    $sql = "SELECT * FROM `student_attendance` where year(dates)=(SELECT YEAR(CURDATE())) AND `classname` = '$class' GROUP BY dates";

    $studentTypeQuery = $this->conn->query($sql);
    $rows = $studentTypeQuery->num_rows;
    if ($rows == 0) {
    return 0;
    }else{
    while ($result = $studentTypeQuery->fetch_array()) {
    $data[] = $result;
    }
    return $data;
    }


}


function attendancechartyears($showdatewise, $class){

    $sql = "SELECT * FROM `student_attendance` where year(dates)=(SELECT YEAR(CURDATE())) AND `classname` = '$class' AND `dates` = '$showdatewise'";

    $studentTypeQuery = $this->conn->query($sql);
    $rows = $studentTypeQuery->num_rows;
    if ($rows == 0) {
    return 0;
    }else{
    while ($result = $studentTypeQuery->fetch_array()) {
    $data[] = $result;
    }
    return $data;
    }


}


  

function attendancetotalreport($class){

    $empData = array();

    $sql = "SELECT * FROM `student_attendance` where `classname` = '$class' order by dates";

    $insertEmpQuery = $this->conn->query($sql);

    while($row      = $insertEmpQuery->fetch_array()){    

    $empData[]	    = $row;

    }

    return $empData;

}
// end display



function attendancetotalsreport($showdatewise, $class){

    $empData = array();

    $sql = "SELECT * FROM `student_attendance` where `classname` = '$class' AND `dates` = '$showdatewise' order by id desc";

    $insertEmpQuery = $this->conn->query($sql);

    while($row      = $insertEmpQuery->fetch_array()){    

    $empData[]	    = $row;

    }

    return $empData;

}





function attendancestudent($studentid){

    $empData = array();

    $sql = "SELECT * FROM `student_attendance` where `student_id` = '$studentid' order by dates";

    $insertEmpQuery = $this->conn->query($sql);

    while($row      = $insertEmpQuery->fetch_array()){    

    $empData[]	    = $row;

    }

    return $empData;

}
// end display





function attendancestudents($showdatewise, $studentid){

    $empData = array();

    $sql = "SELECT * FROM `student_attendance` where `student_id` = '$studentid' AND `dates` = '$showdatewise'";

    $insertEmpQuery = $this->conn->query($sql);

    while($row      = $insertEmpQuery->fetch_array()){    

    $empData[]	    = $row;

    }

    return $empData;

}
// end display



// function studentDetails($searchstudent, $searchstudents){

//     $sql = "SELECT * FROM `student_attendance` WHERE concat(`dates`)  between '$searchstudent' and '$searchstudents'";

//     $studentTypeQuery = $this->conn->query($sql);

//     $rows = $studentTypeQuery->num_rows;

//     if ($rows == 0) {
//     return 0;
//     }else{
//     while ($result = $studentTypeQuery->fetch_array()) {
//     $data[] = $result;
//     }
//     return $data;
//     }

// }



function studentDetails($date, $class){

    $empData = array();

    $sql = "SELECT * FROM `student_attendance` where `dates` = '$date' and `classname` = '$class'";

    $insertEmpQuery = $this->conn->query($sql);

    while($row      = $insertEmpQuery->fetch_array()){    

    $empData[]	    = $row;

    }

    return $empData;

}


function attendancedate($searchstudent, $searchstudents){

    $empData = array();

    $sql = "SELECT * FROM `student_attendance` WHERE concat(`dates`) between '$searchstudent' and '$searchstudents' GROUP BY dates";

    $insertEmpQuery = $this->conn->query($sql);

    while($row      = $insertEmpQuery->fetch_array()){    

    $empData[]	    = $row;

    }

    return $empData;

}


// ---------- attendance report end -------------



// ---------- Student summary start -------------

function studentsummaryadd($names, $student_ids,  $roll_nos, 
    $addresss, $contacts, $streams, $post_offices, $police_stations, $gurdians, $sdos, 
    $total_amounts, $total_dues, $pin_codes, $academic_years, $states, $districts, $date_of_births, $dded_bys, $added_ons, $dates, $class, $Status){



    $sql = "INSERT INTO `student_summary` (`name`,`student_id`, `roll_no`, `address`, `contact_no`, `stream`, `post_office`, 
    `police_station`,`guardian_name`, `sdo_or_bdo`, `total_amount`, `total_due`, `pin_code`, `academic_year`, `state`, `district`, `date_of_birth`, 
    `added_by`, `added_on`,  `date`, `class`, `exam_status`)           
    VALUES ( '$names', '$student_ids',  '$roll_nos', '$addresss', '$contacts',  '$streams', '$post_offices', '$police_stations',  
    '$gurdians', '$sdos', '$total_amounts', '$total_dues', '$pin_codes', '$academic_years', '$states', '$districts', '$date_of_births','$dded_bys',
    '$added_ons', '$dates', '$class', '$Status') ";

    $insertEmpQuery = $this->conn->query($sql);

   return $insertEmpQuery;


}

//studentamount start 
function studentamount($class_id, $total_amount, $class, $session){

    $sql = "UPDATE  `student` SET `total_amount` = '$total_amount', `class` = '$class_id', `academic_year` = '$session' WHERE `student`.`class` = '$class'";
    $result = $this->conn->query($sql);
    return $result;

}
//enf


//  changedata start 
function changedata($newclass, $class, $session, $student_ids){

    $sql = "UPDATE  `student` SET `class` = '$newclass', `academic_year` = '$session' WHERE `student`.`class` = '$class' and `student`.`student_id` = '$student_ids'";
    $result = $this->conn->query($sql);
    return $result;

}//enf



function feeschangedata($name, $student_id,  $roll_no, $gurdian_name, $class_id, $total_amount, $session){
    
    
    $sql = "INSERT INTO `student_fees_dtls` (`name`,`student_id`, `roll_no`, `gurdian_name`, `class`, `payable_fee`, `total_due`, `session`, `added_on`)           
    VALUES ( '$name', '$student_id',  '$roll_no', '$gurdian_name', '$class_id', '$total_amount', '$total_amount', '$session', current_timestamp()) ";
    
    $insertEmpQuery = $this->conn->query($sql);
    
    return $insertEmpQuery;
    
    
}



//studentdelect start 
function studentdelect($class){

    $sqldal = "DELETE FROM `student` WHERE  `student`.`class` = '$class'";

            $result = $this->conn->query($sqldal);
    
            return $result;

}
//enf


// ---------- Student summary end -------------



   // display Totalmarks start
   function Totalmarks($showstuid, $showclass1, $showacademic_year){

    $data = array();

    $sql = "SELECT *, SUM(marks) as sum FROM `subject_marks` WHERE `student_id` = '$showstuid' and `class_id` = '$showclass1' and `session` = '$showacademic_year'";

    $empQuery = $this->conn->query($sql);
    if ($empQuery->num_rows > 0) {
        while($row = $empQuery->fetch_array()){
            $data[]	= $row;
        }
    }
    return $data;

}
// end display subject_marks

    // display maxmarks start
    function maxmarks($showclass1, $showacademic_year){

        $data = array();
    
        $sql = "SELECT *, SUM(max_marks) as sum_marks FROM `exam` WHERE `class_name` = '$showclass1' and `year` = '$showacademic_year'";
    
        $empQuery = $this->conn->query($sql);
        if ($empQuery->num_rows > 0) {
            while($row = $empQuery->fetch_array()){
                $data[]	= $row;
            }
        }
        return $data;
    
    }
    // end display subject_marks


  


   // display Totalmarks start
   function subjectmarks($showstuid, $showclass1, $showacademic_year, $subjectshow){

    $data = array();

    $sql = "SELECT *, SUM(marks) as summark FROM `subject_marks` WHERE `student_id` = '$showstuid' and `class_id` = '$showclass1' and `subject_id` = '$subjectshow' and `session` = '$showacademic_year'";
    $empQuery = $this->conn->query($sql);
    if ($empQuery->num_rows > 0) {
        while($row = $empQuery->fetch_array()){
            $data[]	= $row;
        }
    }
    return $data;
}
// end display subject_marks


}
?>