<?php


class Revenue extends DatabaseConnection{



    #############################################################################################################
    #                                                                                                           #
    #                                          DONATION REVENUE FUNCTIONS                                       #
    #                                                                                                           #
    #############################################################################################################


    // addDonationRevenue start

    function addDonationRevenue( $name, $address, $amount, $description, $date, $status, $added_by, $pin_code, $country, $police_station, $district, $payment_type, $payment_id, $paidBy){

        $sql = "INSERT INTO `revenue_donation` ( `name`, `address`, `amount`, `description`,`date`, `status`, `added_by`, `pin_code`, `country`, `police_station`, `district`, `payment_type`, `payment_id`, `paid_by`) VALUES ('$name', '$address', '$amount', '$description', '$date', '$status', '$added_by', '$pin_code', '$country', '$police_station', '$district', '$payment_type', '$payment_id', '$paidBy')";

        $res = $this->conn->query($sql);
        return $res;

    }
    // eof





function revenueothersinsert($source, $amount, $date, $status, $added_by, $payment_type, $payment_id, $vendor_id, $paidBy){

    $sql = "INSERT INTO `revenue_others` ( `source`, `amount`, `date`, `status`, `added_by`, `payment_type`, `payment_id`, `vendor_id`,  `paid_by`) VALUES ('$source', '$amount', '$date', '$status', '$added_by', '$payment_type', '$payment_id', '$vendor_id',  '$paidBy')";

    $insertrevenuefees = $this->conn->query($sql);

}

// inshat data end




  //  editdonation start
    
  function editdonation($name, $address, $amount, $status, $id,  $pin_code, $payment_type, $payment_id, $paid_by){

    $sqledit = "UPDATE  `revenue_donation`
                SET `name`  = '$name',
                `address`   = '$address',
                `amount`= '$amount',
                `status` = '$status',
                `id` = '$id',
                `pin_code` = '$pin_code',
                `payment_type` = '$payment_type',
                `payment_id` = '$payment_id',
                `paid_by`       = '$paid_by' 
                WHERE
                `revenue_donation`.`id` = '$id'";

    $result1 = $this->conn->query($sqledit);

    return $result1;

}
// eof











// display start w
function donationdataDisplay(){

    $empData = array();

    $sql = "SELECT * FROM `revenue_donation` order by id desc";

    $empQuery   = $this->conn->query($sql);

    while($row  = $empQuery->fetch_array()){    

    $empData[]	= $row;
    }

    return $empData;

}
// end display






// display start w

function revenueothersdisplay(){

    $empData = array();

    $sql = "SELECT * FROM `revenue_others` order by id desc";

    $empQuery   = $this->conn->query($sql);

    while($row  = $empQuery->fetch_array()){    

    $empData[]	= $row;
    }

    return $empData;

}

// end display





//curd total amount start others revenue w..............

//W

function othersfeesDay(){

    $sql="SELECT DAYNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_others` where day(DATE)=(SELECT day(CURDATE())) and month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(amount);";

    $result = $this->conn->query($sql);

    return $result;


}




//w

function othersfeesMonth(){

    $sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_others` where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY MONTH(amount);";

    $result = $this->conn->query($sql);

    return $result;

}

//w

function othersfeesYear(){

    $sql="SELECT YEAR(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_others` where year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY YEAR(amount);";

    $result = $this->conn->query($sql);

    return $result;

}




//curd total amount end..............









//curd total amount start student w..............
//w
function studentfeesDay(){

    $sql="SELECT DAYNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `student_payment_dtls` where day(DATE)=(SELECT day(CURDATE())) and month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(amount);";

    $result = $this->conn->query($sql);

    return $result;


}




//w

function studentfeesMonth(){

    $sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `student_payment_dtls` where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY MONTH(amount);";

    $result = $this->conn->query($sql);

    return $result;

}

//w

function studentfeesYear(){

    $sql="SELECT YEAR(amount) AS 'amount', SUM(amount) AS 'Total' FROM `student_payment_dtls` where year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY YEAR(amount);";

    $result = $this->conn->query($sql);

    return $result;

}



//W

function studentfeesTotal(){

    $sql="SELECT  SUM(total_due) AS 'Total' FROM `student_payment_summary`";

    $result = $this->conn->query($sql);

    return $result;

}


//curd total amount end..............








//curd total amount start donation w..............
//w

function donationsDay(){

    $sql="SELECT DAYNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_donation` where day(DATE)=(SELECT day(CURDATE())) and month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(amount);";

    $result = $this->conn->query($sql);

    return $result;

}



function revenuedonationtotalamountWeek(){

    $sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_donation` where date > DATE_SUB(DATE(NOW()), INTERVAL 1 WEEK) ORDER BY MONTH(amount);";

    $result = $this->conn->query($sql);

    return $result;

}   



//w



function donationsMonth(){

    $sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_donation` where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY MONTH(amount);";

    $result = $this->conn->query($sql);

    return $result;

}

//w

function donationsYear(){

    $sql="SELECT YEAR(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_donation` where year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY YEAR(amount);";

    $result = $this->conn->query($sql);

    return $result;

}


//curd total amount end..............







function displaydata1(){

    $sql = "SELECT * FROM `student`";

    $result = $this->conn->query($sql);

    return $result;

}





// delete start

function deleteEmp($deleteEmpId){

    $stu_id = $_GET['id'];

    $sqldal = "DELETE FROM `staff_atten` WHERE  `id` = {$stu_id}";

    $result1 = $this->conn->query($sqldal);

    return $result1;
}

// end deleteDocCat function







// update start

function update( $id, $name, $address, $contactno, $email, $gender, $qualification){

    $sqledit1 = "UPDATE  `staff` SET `id` = '{$id}', `name`= '{$name}', `address` = '{$address}', `contactno` = '{$contactno}', `email` = '{$email}', `gender` = '{$gender}', `qualification` = '{$qualification}' WHERE `staff`.`id` = '{$id}'";

    $result1 = $this->conn->query($sqledit1);

    return $result1;
}

//end updateEmp function









// notice inshat data start 

function noticeInsert( $notice){

    $sql = "INSERT INTO `forum` ( `notice`) VALUES ( '$notice')";

    $insertEmpQuery = $this->conn->query($sql);

}

// notice inshat data end






function updatePage($userId){

    $sql = "SELECT * FROM staff WHERE `staff`.`user_id` = '$userId'";

    $result1 = $this->conn->query($sql);

    return $result1;
}



// student report start....w.......



//updatePage start w

function revenuechartday($expenses_chart){

    $sql = "SELECT * FROM `student_payment_dtls` where day(DATE)=(SELECT day(CURDATE())) and month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(amount)";

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





function studentreportmonth($expenses_chart){

    $sql = "SELECT * FROM `student_payment_dtls` where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY MONTH(amount)";

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




function studentreportyear($expenses_chart){

    $sql = "SELECT * FROM `student_payment_dtls` where year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY YEAR(amount);";

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







// student report end .........._ _ _





function ajax($userId){

    $sql = "SELECT * FROM student WHERE `student`.`student_id` = '$userId'";

    $result1 = $this->conn->query($sql);

    return $result1;
    
}




    #############################################################################################################
    #                                                                                                           #
    #                                              FEES REVENUE FUNCTIONS                                       #
    #                                                                                                           #
    #############################################################################################################



    


//   inshat dada start w

function addStudentFees($name, $roll_no, $amount, $Fees_account, $class, $date, $status, $added_by, $payment_type, $payment_id, $total_amount, $student_id, $paidBy){

    $sql = "INSERT INTO `student_payment_dtls` 
            ( `name`, `roll_no`, `amount`, `Fees_account`, `class`, `date`, `payment_type`, `payment_id`, `total_amount`, `student_id`, `paid_by`, `status`,  `added_by` ) 
            VALUES 
            ('$name', '$roll_no', '$amount', '$Fees_account', '$class', '$date', '$payment_type','$payment_id', '$total_amount', '$student_id', '$paidBy', '$status', '$added_by')";

    $insertrevenuefees = $this->conn->query($sql);

}

// inshat data end



//updatePage start w

function feesDetailsById($Id){

    $sql = "SELECT * FROM student_payment_dtls WHERE `student_payment_dtls`.`id` = '$Id'";

    $result1 = $this->conn->query($sql);

    return $result1;

}

// end updatePage







//departnemt action update start w

function updateStudentFees($name, $class, $amount, $id, $status, $payment_type, $date, $payment_id, $paid_by){

    $sqledit = "UPDATE  `student_payment_dtls` 
                SET `name` = '$name',
                `class`= '$class',
                `amount`= '$amount',
                `id`= '$id',
                `status` = '$status',
                `payment_type` = '$payment_type',             
                `date` = '$date',
                `payment_id` = '$payment_id', 
                `paid_by` = '$paid_by'
                WHERE
                `student_payment_dtls`.`id` = '$id'";

    $result1 = $this->conn->query($sqledit);

    return $result1;

}

//end updateEmp function




// update start w

function studentfeescancel($id){

    $sql2 = "UPDATE  `student_payment_dtls` SET `status` = 'inactive' WHERE `student_payment_dtls`.`id` = '{$id}'";

    $result2 = $this->conn->query($sql2);

    return $result2;
}
    
//end updateEmp function




// status active start w

function studentfeesactive($id){

    $sql2 = "UPDATE  `student_payment_dtls` SET `status` = 'active' WHERE `student_payment_dtls`.`id` = '{$id}'";

    $result2 = $this->conn->query($sql2);

    return $result2;
}
    
//end status active function


// display start w

function studenttotalreport(){

    $empData = array();

    $sql = "SELECT * FROM `student_payment_dtls` order by id desc ";

    $insertEmpQuery = $this->conn->query($sql);

    while($row      = $insertEmpQuery->fetch_array()){    

    $empData[]	    = $row;

    }

    return $empData;

}
// end display







// display start w
function revenueStudentdisplay(){

    $empData = array();

    $sql = "SELECT * FROM `student_payment_dtls` order by id desc";

    $empQuery   = $this->conn->query($sql);

    while($row  = $empQuery->fetch_array()){    

    $empData[]	= $row;
    }

    return $empData;

}
// end display



   // showDonationById start 
    function showDonationById($id){

        $data = array();
        $sql = "SELECT * FROM `revenue_donation` WHERE `revenue_donation`.`id` = '$id'";
        $res = $this->conn->query($sql);
        $rows = $res->num_rows;
        if ($rows > 0 ) {
            while ($result = $res->fetch_array()) {
                $data[] = $result;
            }
        } 
        return $data;

    }


    

// update start w

function donationcancel($id){

    $sql2 = "UPDATE  `revenue_donation` SET `status` = 'inactive' WHERE `revenue_donation`.`id` = '{$id}'";

    $result2 = $this->conn->query($sql2);

    return $result2;
}

//end updateEmp function





     
//departnemt action update start w

function editrevenuedonation($name, $address, $amount, $status, $id, $paying, $others_paying, $pin_code, $payment_type, $payment_id){

    $sqledit = "UPDATE  `revenue_donation` SET `name` = '$name', `address`= '$address', `amount`= '$amount', `status` = '$status', `id` = '$id', `paying` = '$paying', `others_paying` = '$others_paying', `pin_code` = '$pin_code', `payment_type` = '$payment_type', `payment_id` = '$payment_id'   WHERE `revenue_donation`.`id` = '{$id}'";

    $result1 = $this->conn->query($sqledit);

    return $result1;

}

//end updateEmp function



//     w
    function othersRevenueById($id){

        $sql = "SELECT * FROM `revenue_others` WHERE `revenue_others`.`id` = '$id'";
        $res = $this->conn->query($sql);
        $rows = $res->num_rows;
        if ($rows > 0 ) {
            while ($result = $res->fetch_array()) {
                $data[] = $result;
            }
        } 
        return $data;

    }


//   inshat dada start w



   // departnemt action update start w
    
    function editOtherRevenue($source, $amount, $status, $id, $vendor_id, $payment_type, $payment_id,  $paid_by ){

                            $sqledit = "UPDATE  
                            `revenue_others` 
                            SET `source` = '$source',
                            `amount`= '$amount',
                            `status` = '$status', 
                            `id` = '$id',
                            `vendor_id` = '$vendor_id',
                            `payment_type` = '$payment_type',
                            `payment_id` = '$payment_id',
                            `paid_by` = '$paid_by'
                            WHERE
                            `revenue_others`.`id` = '$id'";

        $result1 = $this->conn->query($sqledit);
        return $result1;

    }
//     eof





// update start w

function otherscancel($id){

    $sql2 = "UPDATE  `revenue_others` SET `status` = 'inactive' WHERE `revenue_others`.`id` = '{$id}'";

    $result2 = $this->conn->query($sql2);

    return $result2;
}

//end updateEmp function



   // status start w

   function othersactive($id){

    $sql2 = "UPDATE  `revenue_others` SET `status` = 'active' WHERE `revenue_others`.`id` = '{$id}'";

    $result2 = $this->conn->query($sql2);

    return $result2;
}

//end status function



   // status start w

   function donationactive($id){

    $sql2 = "UPDATE  `revenue_donation` SET `status` = 'active' WHERE `revenue_donation`.`id` = '{$id}'";

    $result2 = $this->conn->query($sql2);

    return $result2;
}

//end status function



//   ================================== DonationReport Start====================================

    
//updatePage start w

function revenuereport($donation_chart){

    $sql = "SELECT * FROM `revenue_donation`  where day(DATE)=(SELECT day(CURDATE())) and month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(amount)";

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








function donationreport($month_chart){

    $sql = "SELECT * FROM `revenue_donation`  where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY MONTH(amount)";

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






//updatePage start w

function donationyearreport($year_chart){

    $sql = "SELECT * FROM `revenue_donation` where year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY YEAR(amount)";

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


function donationtotalamount(){

    $sql="SELECT  amount AS 'amount', SUM(amount) AS 'Total' FROM `revenue_donation`";

    $result = $this->conn->query($sql);

    return $result;

}



 // display start w

 function donationtotalreport(){

    $empData = array();

    $sql = "SELECT * FROM `revenue_donation` order by id desc ";

    $insertEmpQuery = $this->conn->query($sql);

    while($row      = $insertEmpQuery->fetch_array()){    

    $empData[]	    = $row;

    }

    return $empData;

}
// end display



    //search start w

    function donationsearchdata($searchdonation, $searchdonation1){

        $sqldal = "SELECT * FROM `revenue_donation` WHERE concat(`date`) between '$searchdonation' to '$searchdonation1'";

        $result1 = $this->conn->query($sqldal);

        return $result1;

    }
    
    // end search function


           // find from date to date w

function showedonationDetails($searchdonation1, $searchdonation){

    $sql = "SELECT * FROM `revenue_donation` WHERE concat(`date`)  between '$searchdonation1' and '$searchdonation'";

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

// end find function



// expenses serch total data start

function finddonation($searchdonation1, $searchdonation){

$sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_donation` WHERE concat(`date`)  between '$searchdonation1' and '$searchdonation'";

$result = $this->conn->query($sql);

return $result;

}

// end





//   ================================== DonationReport End====================================



//   ================================== OthersReport Start====================================



//updatePage start w

function otherdayreport($day_chart){
    // $empData = array();

    $sql = "SELECT * FROM `revenue_others` where day(DATE)=(SELECT day(CURDATE())) and month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(amount)";

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

function revenueotherreport($month_chart){

    $sql = "SELECT * FROM `revenue_others`  where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY MONTH(amount)";

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

function otheryearreport($year_chart){

    $sql = "SELECT * FROM `revenue_others` where year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY YEAR(amount)";

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



  // display start w

  function othertotalreport(){

    $empData = array();

    $sql = "SELECT * FROM `revenue_others` order by id desc ";

    $insertEmpQuery = $this->conn->query($sql);

    while($row      = $insertEmpQuery->fetch_array()){    

    $empData[]	    = $row;

    }

    return $empData;

}
// end display

//w

function otherstotalamount(){

    $sql="SELECT  amount AS 'amount', SUM(amount) AS 'Total' FROM `revenue_others`";

    $result = $this->conn->query($sql);

    return $result;

}





//search start w

function otherssearchdata($search_others, $search_others1){

        $sqldal = "SELECT * FROM `revenue_others` WHERE concat(`date`) between '$search_others' to '$search_others1'";

        $result1 = $this->conn->query($sqldal);

        return $result1;

}
    
// end search function




// find from date to date w

function showerevenuesDetails($search_others1, $search_others){

    $sql = "SELECT * FROM `revenue_others` WHERE concat(`date`)  between '$search_others1' and '$search_others'";

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

// end find function





// expenses serch total data start

function finddataothers($search_others1, $search_others){

    $sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_others` WHERE concat(`date`)  between '$search_others1' and '$search_others'";

    $result = $this->conn->query($sql);

    return $result;

}

// end

//   ================================== OthersReport End====================================




//search start w

function studentsearchdata($searchstudents, $searchstudents1){

    $sqldal = "SELECT * FROM `student_payment_dtls` WHERE concat(`date`) between '$searchstudents' to '$searchstudents1'";

    $result1 = $this->conn->query($sqldal);

    return $result1;

}

// end search function

// find from date to date w

function studentDetails($searchstudents1, $searchstudents){

    $sql = "SELECT * FROM `student_payment_dtls` WHERE concat(`date`)  between '$searchstudents1' and '$searchstudents'";

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

// end find function



    
// expenses serch total data start

function findstudentfees($searchstudents1, $searchstudents){

$sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `student_payment_dtls` WHERE concat(`date`)  between '$searchstudents1' and '$searchstudents'";

$result = $this->conn->query($sql);

return $result;

}

// end



// display start w

function staffdisplaydata(){

$empData = array();

$sql = "SELECT * FROM `staff`";

$empQuery   = $this->conn->query($sql);

while($row  = $empQuery->fetch_array()){    

$empData[]	= $row;

}

return $empData;

}

// end display








// revenue year chat w

function revenuesbarchat(){

$sql=" SELECT MONTHNAME(date) as chatname, SUM(amount) as amount FROM `student_payment_dtls` where year(DATE)=(SELECT YEAR(CURDATE())) GROUP BY chatname";

$result = $this->conn->query($sql);

return $result;

}






// display start w

function showStatus(){

    $empData = array();
    
    $sql = "SELECT * FROM `status`";
    
    $empQuery   = $this->conn->query($sql);
    
    while($row  = $empQuery->fetch_array()){    
    
    $empData[]	= $row;
    
    }
    
    return $empData;
    
    }
    
    // end display


    function studentfeesamount(){

        $sql="SELECT  total_amount AS 'total_amount', SUM(total_amount) AS 'Total' FROM `student_payment_dtls`";
    
        $result = $this->conn->query($sql);
    
        return $result;
    
    }



          




    
    
//     function donationsDay(){

//         $sql="SELECT DAYNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_donation` where day(DATE)=(SELECT day(CURDATE())) and month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(amount);";

//         $result = $this->conn->query($sql);

//         return $result;

//     }




//     function donationsMonth(){

//         $sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_donation` where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY MONTH(amount);";

//         $result = $this->conn->query($sql);

//         return $result;

//     }

// w

//     function donationsYear(){

//         $sql="SELECT YEAR(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_donation` where year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY YEAR(amount);";

//         $result = $this->conn->query($sql);

//         return $result;

//     }




//     #############################################################################################################
//     #                                                                                                           #
//     #                                            OTHER REVENUE FUNCTIONS                                        #
//     #                                                                                                           #
//     #############################################################################################################


    
//     addOtherRevenue start
//     function addOtherRevenue($source, $amount, $date, $status, $added_by, $payment_type, $payment_id, $paid, $others_paid){

//         $sql = "INSERT INTO `revenue_others` ( `source`, `amount`, `date`, `status`, `added_by`, `payment_type`, `payment_id`, `paid`, `others_paid`) VALUES ('$source', '$amount', '$date', '$status', '$added_by', '$payment_type', '$payment_id', '$paid', '$others_paid')";

//         $res = $this->conn->query($sql);
//         return $res;

//     }
//     eof




    




    

//     otherRevenueCancel start
//     function otherRevenueCancel($id){

//         $sql2 = "UPDATE  `revenue_others` SET `status` = '0' WHERE `revenue_others`.`id` = '{$id}'";
//         $result2 = $this->conn->query($sql2);
//         return $result2;

//     } eof




//     function othersfeesDay(){

//         $sql="SELECT DAYNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_others` where day(DATE)=(SELECT day(CURDATE())) and month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(amount);";

//         $result = $this->conn->query($sql);

//         return $result;


//     }




//   w

//     function othersfeesMonth(){

//         $sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_others` where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY MONTH(amount);";

//         $result = $this->conn->query($sql);

//         return $result;

//     }

//   w

//     function othersfeesYear(){

//         $sql="SELECT YEAR(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_others` where year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY YEAR(amount);";

//         $result = $this->conn->query($sql);

//         return $result;

//     }





//     function otherstotalamount(){

//         $sql="SELECT  amount AS 'amount', SUM(amount) AS 'Total' FROM `revenue_others`";

//         $result = $this->conn->query($sql);

//         return $result;

//     }





//       inshat dada start w

//     function revenuefeesinsert($name, $roll_no, $amount, $class, $date, $address, $status, $added_by, $payment_type, $payment_id, $paid, $others_paid){

//         $sql = "INSERT INTO `student_payment_dtls` ( `name`, `roll_no`, `amount`, `class`,`date`, `address`, `status`, `added_by`, `payment_type`, `payment_id`, `paid`, `others_paid`) VALUES ('$name', '$roll_no', '$amount', '$class', '$date', '$address', '$status', '$added_by', '$payment_type','$payment_id', '$paid','$others_paid')";

//         $insertrevenuefees = $this->conn->query($sql);

//     }

//     inshat data end




//       revenue year chat w

// function revenuesbarchat(){

//     $sql=" SELECT MONTHNAME(date) as chatname, SUM(amount) as amount FROM `student_payment_dtls` where year(DATE)=(SELECT YEAR(CURDATE())) GROUP BY chatname";

//     $result = $this->conn->query($sql);

//     return $result;

// }




//     display start w
//     function revenueStudentdisplay(){

//         $empData = array();

//         $sql = "SELECT * FROM `student_payment_dtls` order by id desc";

//         $empQuery   = $this->conn->query($sql);

//         while($row  = $empQuery->fetch_array()){    

//         $empData[]	= $row;
//         }

//         return $empData;

//     }
//     end display


//     function studentfeesDay(){

//         $sql="SELECT DAYNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `student_payment_dtls` where day(DATE)=(SELECT day(CURDATE())) and month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(amount);";

//         $result = $this->conn->query($sql);

//         return $result;


//     }



    

//   w

//   function studentfeesMonth(){

//     $sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `student_payment_dtls` where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY MONTH(amount);";

//     $result = $this->conn->query($sql);

//     return $result;

// }

// w

// function studentfeesYear(){

//     $sql="SELECT YEAR(amount) AS 'amount', SUM(amount) AS 'Total' FROM `student_payment_dtls` where year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY YEAR(amount);";

//     $result = $this->conn->query($sql);

//     return $result;

// }




// curd total amount end..............



//     display start w
//     function revenueDonationdisplay(){

//         $empData = array();

//         $sql = "SELECT * FROM `revenue_donation` order by id desc";

//         $empQuery   = $this->conn->query($sql);

//         while($row  = $empQuery->fetch_array()){    

//         $empData[]	= $row;
//         }

//         return $empData;

//     }
//     end display






//     display start w

//     function revenueothersdisplay(){

//         $empData = array();

//         $sql = "SELECT * FROM `revenue_others` order by id desc";

//         $empQuery   = $this->conn->query($sql);

//         while($row  = $empQuery->fetch_array()){    

//         $empData[]	= $row;
//         }

//         return $empData;

//     }

//     end display





//     curd total amount start others revenue w..............

//     function revenuetotalamountDay(){

//         $sql="SELECT DAYNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_others` where day(DATE)=(SELECT day(CURDATE())) and month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(amount);";

//         $result = $this->conn->query($sql);

//         return $result;


//     }



//     function revenuetotalamountWeek(){

//         $sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_others` where date > DATE_SUB(DATE(NOW()), INTERVAL 1 WEEK) ORDER BY MONTH(amount);";

//         $result = $this->conn->query($sql);

//         return $result;


//     }   







//     function revenuetotalamountMonth(){

//         $sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_others` where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY MONTH(amount);";

//         $result = $this->conn->query($sql);

//         return $result;

//     }



//     function revenuetotalamountYear(){

//         $sql="SELECT YEAR(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_others` where year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY YEAR(amount);";

//         $result = $this->conn->query($sql);

//         return $result;

//     }




//     curd total amount end..............









//     curd total amount start student w..............

//     function revenuestudenttotalamountDay(){

//         $sql="SELECT DAYNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `student_payment_dtls` where day(DATE)=(SELECT day(CURDATE())) and month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(amount);";

//         $result = $this->conn->query($sql);

//         return $result;


//     }






//     function revenuestudenttotalamountMonth(){

//         $sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `student_payment_dtls` where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY MONTH(amount);";

//         $result = $this->conn->query($sql);

//         return $result;

//     }



//     function revenuestudenttotalamountYear(){

//         $sql="SELECT YEAR(amount) AS 'amount', SUM(amount) AS 'Total' FROM `student_payment_dtls` where year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY YEAR(amount);";

//         $result = $this->conn->query($sql);

//         return $result;

//     }




    
//     function revenuetotalamount(){

//         $sql="SELECT  amount AS 'amount', SUM(amount) AS 'Total' FROM `student_payment_dtls`;";

//         $result = $this->conn->query($sql);

//         return $result;

//     }


//     curd total amount end..............








//     curd total amount start donation w..............

//     function revenuedonationtotalamountDay(){

//         $sql="SELECT DAYNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_donation` where day(DATE)=(SELECT day(CURDATE())) and month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(amount);";

//         $result = $this->conn->query($sql);

//         return $result;

//     }



//     function revenuedonationtotalamountWeek(){

//         $sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_donation` where date > DATE_SUB(DATE(NOW()), INTERVAL 1 WEEK) ORDER BY MONTH(amount);";

//         $result = $this->conn->query($sql);

//         return $result;

//     }   







//     function revenuedonationtotalamountMonth(){

//         $sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_donation` where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY MONTH(amount);";

//         $result = $this->conn->query($sql);

//         return $result;

//     }



//     function revenuedonationtotalamountYear(){

//         $sql="SELECT YEAR(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_donation` where year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY YEAR(amount);";

//         $result = $this->conn->query($sql);

//         return $result;

//     }


//     curd total amount end..............







//     function displaydata1(){

//         $sql = "SELECT * FROM `student`";

//         $result = $this->conn->query($sql);

//         return $result;

//     }





//     delete start

//     function deleteEmp($deleteEmpId){

//         $stu_id = $_GET['id'];

//         $sqldal = "DELETE FROM `staff_atten` WHERE  `id` = {$stu_id}";

//         $result1 = $this->conn->query($sqldal);

//         return $result1;
//     }
    
//     end deleteDocCat function







//     update start

//     function update( $id, $name, $address, $contactno, $email, $gender, $qualification){

//         $sqledit1 = "UPDATE  `staff` SET `id` = '{$id}', `name`= '{$name}', `address` = '{$address}', `contactno` = '{$contactno}', `email` = '{$email}', `gender` = '{$gender}', `qualification` = '{$qualification}' WHERE `staff`.`id` = '{$id}'";

//         $result1 = $this->conn->query($sqledit1);

//         return $result1;
//     }
    
//     end updateEmp function









//     notice inshat data start 

//     function noticeInsert( $notice){

//         $sql = "INSERT INTO `forum` ( `notice`) VALUES ( '$notice')";

//         $insertEmpQuery = $this->conn->query($sql);

//     }

//     notice inshat data end






//     function updatePage($userId){

//         $sql = "SELECT * FROM staff WHERE `staff`.`user_id` = '$userId'";

//         $result1 = $this->conn->query($sql);

//         return $result1;
//     }



//     student report start....w.......



//     updatePage start w

//     function revenuechartday($expenses_chart){

//         $sql = "SELECT * FROM `student_payment_dtls` where day(DATE)=(SELECT day(CURDATE())) and month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(amount);";

//         $studentTypeQuery = $this->conn->query($sql);
//         $rows = $studentTypeQuery->num_rows;
//         if ($rows == 0) {
//         return 0;
//         }else{
//         while ($result = $studentTypeQuery->fetch_array()) {
//         $data[] = $result;
//         }
//         return $data;
//         }


//     }

//     end updatePage





//     function studentreportmonth($expenses_chart){

//         $sql = "SELECT * FROM `student_payment_dtls` where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY MONTH(amount);";

//         $studentTypeQuery = $this->conn->query($sql);
//         $rows = $studentTypeQuery->num_rows;
//         if ($rows == 0) {
//         return 0;
//         }else{
//         while ($result = $studentTypeQuery->fetch_array()) {
//         $data[] = $result;
//         }
//         return $data;
//         }

//     }  




//     function studentreportyear($expenses_chart){

//         $sql = "SELECT * FROM `student_payment_dtls` where year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY YEAR(amount);";

//         $studentTypeQuery = $this->conn->query($sql);
//         $rows = $studentTypeQuery->num_rows;
//         if ($rows == 0) {
//         return 0;
//         }else{
//         while ($result = $studentTypeQuery->fetch_array()) {
//         $data[] = $result;
//         }
//         return $data;
//         }

//     } 


// display start w

// function studenttotalreport(){

//     $empData = array();

//     $sql = "SELECT * FROM `student_payment_dtls` order by id desc ";

//     $insertEmpQuery = $this->conn->query($sql);

//     while($row      = $insertEmpQuery->fetch_array()){    

//     $empData[]	    = $row;

//     }

//     return $empData;

// }
// end display





//     student report end .........._ _ _





//     function ajax($userId){

//         $sql = "SELECT * FROM student WHERE `student`.`student_id` = '$userId'";

//         $result1 = $this->conn->query($sql);

//         return $result1;
        
//     }




    
//     updatePage start w

//     function updatestudentrevenue($Id){

//         $sql = "SELECT * FROM student_payment_dtls WHERE `student_payment_dtls`.`id` = '$Id'";

//         $result1 = $this->conn->query($sql);

//         return $result1;

//     }

//     end updatePage






    
//     departnemt action update start w

//     function studentrevenueE($name, $roll_no, $address, $class, $amount, $id, $status){

//         $sqledit = "UPDATE  `student_payment_dtls` SET `name` = '{$name}', `roll_no` = '{$roll_no}', `address`= '{$address}', `class`= '{$class}', `amount`= '{$amount}', `id`= '{$id}', `status` = '{$status}'  WHERE `student_payment_dtls`.`id` = '{$id}'";

//         $result1 = $this->conn->query($sqledit);

//         return $result1;

//     }

//     end updateEmp function




//     update start w

//     function studentfeescancel($id){

//         $sql2 = "UPDATE  `student_payment_dtls` SET `status` = '0' WHERE `student_payment_dtls`.`id` = '{$id}'";

//         $result2 = $this->conn->query($sql2);

//         return $result2;
//     }
        
//     end updateEmp function






//       ================================== DonationReport Start====================================

        
//     updatePage start w

//     function revenuereport($donation_chart){

//         $sql = "SELECT * FROM `revenue_donation`  where day(DATE)=(SELECT day(CURDATE())) and month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(amount)";

//         $studentTypeQuery = $this->conn->query($sql);
//         $rows = $studentTypeQuery->num_rows;
//         if ($rows == 0) {
//         return 0;
//         }else{
//         while ($result = $studentTypeQuery->fetch_array()) {
//         $data[] = $result;
//         }
//         return $data;
//         }
        

//     }



    

    
    

//     function donationreport($month_chart){

//         $sql = "SELECT * FROM `revenue_donation`  where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY MONTH(amount)";

//         $studentTypeQuery = $this->conn->query($sql);
//         $rows = $studentTypeQuery->num_rows;
//         if ($rows == 0) {
//         return 0;
//         }else{
//         while ($result = $studentTypeQuery->fetch_array()) {
//         $data[] = $result;
//         }
//         return $data;
//         }

//     }

    




//     updatePage start w

//     function donationyearreport($year_chart){

//         $sql = "SELECT * FROM `revenue_donation` where year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY YEAR(amount)";

//         $studentTypeQuery = $this->conn->query($sql);
//         $rows = $studentTypeQuery->num_rows;
//         if ($rows == 0) {
//         return 0;
//         }else{
//         while ($result = $studentTypeQuery->fetch_array()) {
//         $data[] = $result;
//         }
//         return $data;
//         }

//     }

//     end updatePage


//     function donationtotalamount(){

//         $sql="SELECT  amount AS 'amount', SUM(amount) AS 'Total' FROM `revenue_donation`";

//         $result = $this->conn->query($sql);

//         return $result;

//     }



//      display start w

//      function donationtotalreport(){

//         $empData = array();

//         $sql = "SELECT * FROM `revenue_donation` order by id desc ";

//         $insertEmpQuery = $this->conn->query($sql);

//         while($row      = $insertEmpQuery->fetch_array()){    

//         $empData[]	    = $row;

//         }

//         return $empData;

//     }
//     end display



//         search start w

//         function donationsearchdata($searchdonation, $searchdonation1){

//             $sqldal = "SELECT * FROM `revenue_donation` WHERE concat(`date`) between '$searchdonation' to '$searchdonation1'";
    
//             $result1 = $this->conn->query($sqldal);
    
//             return $result1;
    
//         }
        
//         end search function


//                find from date to date w

//     function showedonationDetails($searchdonation1, $searchdonation){

//         $sql = "SELECT * FROM `revenue_donation` WHERE concat(`date`)  between '$searchdonation1' and '$searchdonation'";

//         $studentTypeQuery = $this->conn->query($sql);

//         $rows = $studentTypeQuery->num_rows;

//         if ($rows == 0) {
//         return 0;
//         }else{
//         while ($result = $studentTypeQuery->fetch_array()) {
//         $data[] = $result;
//         }
//         return $data;
//         }

//     }

//     end find function



//    expenses serch total data start

//    function finddonation($searchdonation1, $searchdonation){

//     $sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_donation` WHERE concat(`date`)  between '$searchdonation1' and '$searchdonation'";

//     $result = $this->conn->query($sql);

//     return $result;

// }

// end





//       ================================== DonationReport End====================================



//       ================================== OthersReport Start====================================



//     updatePage star/t w

//     function otherdayreport($day_chart){
       

//         $sql = "SELECT * FROM `revenue_others` where day(DATE)=(SELECT day(CURDATE())) and month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(amount)";

//         $studentTypeQuery = $this->conn->query($sql);
//             $rows = $studentTypeQuery->num_rows;
//             if ($rows == 0) {
//             return 0;
//             }else{
//             while ($result = $studentTypeQuery->fetch_array()) {
//             $data[] = $result;
//             }
//             return $data;
//             }
//     }

//     end updatePage



   

//     updatePage start w

//     function revenueotherreport($month_chart){

//         $sql = "SELECT * FROM `revenue_others`  where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY MONTH(amount)";

//         $studentTypeQuery = $this->conn->query($sql);
//         $rows = $studentTypeQuery->num_rows;
//         if ($rows == 0) {
//         return 0;
//         }else{
//         while ($result = $studentTypeQuery->fetch_array()) {
//         $data[] = $result;
//         }
//         return $data;
//         }

//     }

//       end updatePage



//        updatePage start w

//     function otheryearreport($year_chart){

//         $sql = "SELECT * FROM `revenue_others` where year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY YEAR(amount)";

//         $studentTypeQuery = $this->conn->query($sql);
//         $rows = $studentTypeQuery->num_rows;
//         if ($rows == 0) {
//         return 0;
//         }else{
//         while ($result = $studentTypeQuery->fetch_array()) {
//         $data[] = $result;
//         }
//         return $data;
//         }

//     }

//     end updatePage



//       display start w

//       function othertotalreport(){

//         $empData = array();

//         $sql = "SELECT * FROM `revenue_others` order by id desc ";

//         $insertEmpQuery = $this->conn->query($sql);

//         while($row      = $insertEmpQuery->fetch_array()){    

//         $empData[]	    = $row;

//         }

//         return $empData;

//     }
//     end display



//     function totalamount(){

//         $sql="SELECT  amount AS 'amount', SUM(amount) AS 'Total' FROM `revenue_others`";

//         $result = $this->conn->query($sql);

//         return $result;

//     }





//     search start w

//     function otherssearchdata($search_others, $search_others1){

//             $sqldal = "SELECT * FROM `revenue_others` WHERE concat(`date`) between '$search_others' to '$search_others1'";
    
//             $result1 = $this->conn->query($sqldal);
    
//             return $result1;
    
//     }
        
//     end search function




//     find from date to date w

//     function showerevenuesDetails($search_others1, $search_others){

//         $sql = "SELECT * FROM `revenue_others` WHERE concat(`date`)  between '$search_others1' and '$search_others'";

//         $studentTypeQuery = $this->conn->query($sql);

//         $rows = $studentTypeQuery->num_rows;

//         if ($rows == 0) {
//         return 0;
//         }else{
//         while ($result = $studentTypeQuery->fetch_array()) {
//         $data[] = $result;
//         }
//         return $data;
//         }

//     }

//     end find function





//     expenses serch total data start

//     function finddataothers($search_others1, $search_others){

//         $sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `revenue_others` WHERE concat(`date`)  between '$search_others1' and '$search_others'";

//         $result = $this->conn->query($sql);

//         return $result;

//     }

//     end

//     ================================== OthersReport End====================================








//     search start w

//     function studentsearchdata($searchstudents, $searchstudents1){

//         $sqldal = "SELECT * FROM `student_payment_dtls` WHERE concat(`date`) between '$searchstudents' to '$searchstudents1'";

//         $result1 = $this->conn->query($sqldal);

//         return $result1;

//     }
    
//     end search function

//     find from date to date w

//     function studentDetails($searchstudents1, $searchstudents){

//         $sql = "SELECT * FROM `student_payment_dtls` WHERE concat(`date`)  between '$searchstudents1' and '$searchstudents'";

//         $studentTypeQuery = $this->conn->query($sql);

//         $rows = $studentTypeQuery->num_rows;

//         if ($rows == 0) {
//         return 0;
//         }else{
//         while ($result = $studentTypeQuery->fetch_array()) {
//         $data[] = $result;
//         }
//         return $data;
//         }
    
//     }
    
// end find function



        
// expenses serch total data start

// function findstudentfees($searchstudents1, $searchstudents){

//     $sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `student_payment_dtls` WHERE concat(`date`)  between '$searchstudents1' and '$searchstudents'";

//     $result = $this->conn->query($sql);

//     return $result;

// }

// end



}
?>