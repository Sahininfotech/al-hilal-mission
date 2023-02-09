<?php
  
class Student extends DatabaseConnection{ 

//   inshat dada start
// auto id
function addtStudent($student_id, $name,  $email, $gurdian_name, $contact_no, $gender, $post_office, $police_station, $pin_code, $sdo, $district, $state, $date_of_birth, $class, $stream, $address, $academic_year, $status, $roll_no, $total_amount){



$sql = "INSERT INTO `student` ( `student_id`,`name`, `email`, `gurdian_name`, `contact_no`, `gender`, `post_office`, `police_station`,`pin_code`, `sdo_or_bdo`, `district`, `state`, `date_of_birth`, `class`, `stream`,`address`, `academic_year`, `status`, `roll_no`,  `total_amount`, `date`)           
VALUES ( '$student_id', '$name',  '$email', '$gurdian_name', '$contact_no',  '$gender', '$post_office', '$police_station', '$pin_code',  '$sdo', '$district', '$state', '$date_of_birth', '$class', '$stream','$address','$academic_year', '$status', '$roll_no', '$total_amount', current_timestamp())";

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
    // $sql = "SELECT * FROM `revenue_studentfees` WHERE `student_id` = '$student_Id'";

    $sql = "SELECT * , SUM(amount) AS 'Total' FROM `revenue_studentfees` WHERE `student_id` = '$student_Id'";

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

    // $sql = "SELECT *, SUM(amount) as sum FROM `revenue_studentfees` WHERE `student_id` = '$student_Id' and `Fees_account` = '$feesaccounts'";

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

    $sql = "SELECT *, SUM(amount) as sum FROM `revenue_studentfees` WHERE `student_id` = '$student_Id' and `Fees_account` = '$feesaccounts'";

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




}
?>