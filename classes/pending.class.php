<?php


class Pending extends DatabaseConnection{





//updatePage start w

function pendingchartday($pending_chart){

    $data = array();

    $sql = "SELECT * FROM `student_payment_summary` WHERE total_due != 0 AND day(DATE)=(SELECT day(CURDATE())) AND month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(total_due)";

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

// end updatePage



//updatePage start w

function pendingchartmonth($pending_chart){

    $data = array();

    $sql = "SELECT * FROM `student_payment_summary` WHERE total_due != 0 AND month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(total_due)";

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

// end updatePage








//updatePage start w

function pendingchartyear($pending_chart){

    $data = array();

    $sql = "SELECT * FROM `student_payment_summary` WHERE total_due != 0 AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(total_due)";

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

// end updatePage








//curd total amount start student w..............

function pendingDayamount(){

    $sql="SELECT SUM(total_due) AS 'Total' FROM `student_payment_summary` where total_due != 0 AND day(DATE)=(SELECT day(CURDATE())) AND month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(total_due)";

    $result = $this->conn->query($sql);

    return $result;


}



// function pendingDaytotal(){

//     $sql="SELECT SUM(total_amount) AS 'Total' FROM `student_payment_summary` where total_due != 0 AND day(DATE)=(SELECT day(CURDATE())) AND  month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(total_due)";

//     $result = $this->conn->query($sql);

//     return $result;


// }


// select SUM(total_amount) AS 'Total', student_id from `student_payment_dtls` group by student_id
// select student_id , total_amount, SUM(total_amount) AS 'Total' from `student_payment_dtls` where total_amount != amount AND month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(amount)

// SELECT *, student_id FROM `student_payment_dtls` where total_amount != amount AND  day(DATE)=(SELECT day(CURDATE())) AND month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) group by student_id

// SELECT total_amount FROM `student_payment_dtls` where total_amount != amount AND  day(DATE)=(SELECT day(CURDATE())) AND month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) group by student_id


function pendingMonthamount(){

    $sql="SELECT SUM(total_due) AS 'Total' FROM `student_payment_summary` where total_due != 0 AND month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(total_due)";

    $result = $this->conn->query($sql);

    return $result;


}



// function pendingMonthtotal(){

//     $sql="SELECT total_amount, student_id FROM `student_payment_dtls` where total_amount != amount AND month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) group by student_id";

//     $result = $this->conn->query($sql);

//     return $result;


// }









function pendingYearamount(){

    $sql="SELECT SUM(total_due) AS 'Total' FROM `student_payment_summary` where total_due != 0 AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(total_due)";

    $result = $this->conn->query($sql);

    return $result;


}



// function pendingYeartotal(){

//     $sql="SELECT SUM(total_amount) AS 'Total' FROM `student_payment_summary` where total_due != 0 AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(total_due)";

//     $result = $this->conn->query($sql);

//     return $result;


// }



function pen_studentfees($student_Id){

    $data = array();
    $sql = "SELECT * FROM `student` WHERE `student_id` = '$student_Id'";
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





function pen_studentByClass($class_Id){

    $data = array();
    $sql = "SELECT * FROM `student_payment_summary` WHERE total_due != 0 and `class` = '$class_Id'";
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


function pen_student($student_Id){

    $data = array();
    $sql = "SELECT * FROM `student_fees_dtls` WHERE `student_id` = '$student_Id'";
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



function pen_students($student_Id){

    $data = array();
    $sql = "SELECT * FROM `student` WHERE `student_id` = '$student_Id'";
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
function studentByFees($student_Id){

    $data = array();
    $sql = "SELECT * FROM `student_payment_dtls` WHERE `student_id` = '$student_Id'";
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