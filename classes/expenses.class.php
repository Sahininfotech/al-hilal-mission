<?php



class Expenses extends DatabaseConnection{


   // inshat dada start w


    function expensesInsert($bill_no, $amount, $payment_type, $description, $date, $image, $status, $added_by, $payment_id, $paidBy, $paidTo, $accountsSelect, $subcategory){

        $descriptions = addslashes($description);

        $sql = "INSERT INTO `expenses` (`date`, `bill_no`,`amount`, `payment_type`, `payment_id`, `description`, `upload_bill`, `status`,`added_by`, `paid_by`, `paid_to`, `head_of_accounts_id`, `hfa_sub_category_id`) VALUES ('$date','$bill_no', '$amount',  '$payment_type', '$payment_id', '$descriptions', '$image','$status','$added_by', '$paidBy', '$paidTo', '$accountsSelect', '$subcategory')";

        $insertEmpQuery = $this->conn->query($sql);

        return $insertEmpQuery;

    }




    // find from date to date w
    
    function expensestoDate($search_expenses1, $search_expenses){

        $sql = "SELECT * FROM `expenses` WHERE concat(`date`)  between '$search_expenses1' and '$search_expenses'";

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


    function finddataExpenses($search_expenses1, $search_expenses){

        $sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `expenses` WHERE concat(`date`)  between '$search_expenses1' and '$search_expenses';";

        $result = $this->conn->query($sql);

        return $result;

    }
    // end






    //search start w
    
    function searchdata($fromDate, $toDate){

        $sql = "SELECT * FROM `expenses` WHERE concat(`date`) between '$fromDate' to '$toDate'";
        $res = $this->conn->query($sql);
        return $res;

    }
    
    // end search function




    //curd total amount start w..............

    function totalamountDay(){

        $sql="SELECT DAYNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `expenses` where day(DATE)=(SELECT day(CURDATE())) and month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(amount);";

        $result = $this->conn->query($sql);

        return $result;


    }




    function totalamountYear(){

        $sql="SELECT YEAR(amount) AS 'amount', SUM(amount) AS 'Total' FROM `expenses` where year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY YEAR(amount);";

        $result = $this->conn->query($sql);

        return $result;

    }




    function totalamountMonth(){

        $sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `expenses` where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY MONTH(amount)";

        $result = $this->conn->query($sql);

        return $result;

    }






    function totalamount(){

        $sql="SELECT  amount AS 'amount', SUM(amount) AS 'Total' FROM `expenses`;";

        $result = $this->conn->query($sql);

        return $result;

    }

    //curd total amount end..............





    function expenseschart(){

        $sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `expenses` where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY MONTH(amount);";

        $result = $this->conn->query($sql);

        return $result;

    }





    //updatePage start w

    function expenseschartMonth($expenses_chart){

        $sql = "SELECT * FROM `expenses`  where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY MONTH(amount)";

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

    function expenseschartday($expenses_chart){

        $sql = "SELECT * FROM `expenses` where day(DATE)=(SELECT day(CURDATE())) and month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY DAY(amount)";

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

    function expenseschartyear($expenses_chart){

        $sql = "SELECT * FROM `expenses` where year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY YEAR(amount)";

       
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











    function charttotal(){

        $sql="SELECT YEAR(amount) AS 'amount', (4/(SUM(amount))) AS 'Total' FROM `expenses` where year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY YEAR(amount)";

        $result = $this->conn->query($sql);

        return $result;

    }



    function charttotal1(){

        $sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `expenses` where date > DATE_SUB(DATE(NOW()), INTERVAL 1 WEEK) ORDER BY MONTH(amount);";

        $result = $this->conn->query($sql);

        return $result;

    }


    function charttotal2(){

        $sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total1' FROM `expenses` where  WEEKOFYEAR(date)=WEEKOFYEAR(NOW())-2";

        $result = $this->conn->query($sql);

        return $result;

    }





    // display start w

    function displaydata(){

        $empData = array();

        $sql = "SELECT * FROM `expenses` order by id desc ";

        $insertEmpQuery = $this->conn->query($sql);

        while($row      = $insertEmpQuery->fetch_array()){    

        $empData[]	    = $row;

        }

        return $empData;

    }
    // end display










    //updatePage start w

    function updatePage($Id){

        $sql = "SELECT * FROM expenses WHERE `expenses`.`id` = '$Id'";

        $result1 = $this->conn->query($sql);

        return $result1;

    }

    // end updatePage





    //updatePage start w

    function cancelupdatePage($Id){

        $sql = "SELECT * FROM expenses WHERE `expenses`.`id` = '$Id'";

        $result1 = $this->conn->query($sql);

        return $result1;
    }

    // end updatePage



    // update start w
    // function updatecancel($id, $status){

    //     $sql2 = "UPDATE  `expenses` SET `id`= '{$id}', `status`= '{$status}' WHERE `expenses`.`id` = '{$id}'";

    //         $result2 = $this->conn->query($sql2);

    //          return $result2;
    //     }//end updateEmp function











    // delete start
    
    function deleteEmp($deleteEmpId){

        $stu_id = $_GET['id'];

        $sqldal = "DELETE FROM `staff_atten` WHERE  `id` = {$stu_id}";

        $result1 = $this->conn->query($sqldal);

        return $result1;

    }
    
    // end deleteDocCat function






    // update start w

    // function expensesupdate($id, $purpore, $bill_no, $amount, $payment_type, $date, $update_filename ){

    //     $sqledit1 = "UPDATE  `expenses` SET `id` = '$id', `purpore`= '$purpore', `bill_no` = '$bill_no', `amount` = '$amount', `payment_type` = '$payment_type', `date` = '$date',`upload_bill` = '$update_filename'  WHERE `expenses`.`id` = '$id'";

    //     $result1 = $this->conn->query($sqledit1);

    //     return $result1;

    // }

    //end updateEmp function


        function expensesupdate($id, $bill_no, $amount, $payment_type, $date, $c_image, $payment_id, $paid_by, $paid_to, $description, $accountsSelect, $subcategory){

            $descriptions = addslashes($description);
       
       $sql = "UPDATE  `expenses` 
                SET `id`                = '$id',
                `bill_no`               = '$bill_no',
                `amount`                = '$amount',
                `payment_type`          = '$payment_type',
                `date`                  = '$date',
                `upload_bill`           = '$c_image',
                `payment_id`            = '$payment_id',
                `paid_by`               = '$paid_by',
                `paid_to`               = '$paid_to',
                `description`           = '$descriptions',
                `head_of_accounts_id`   = '$accountsSelect',
                `hfa_sub_category_id`   = '$subcategory'
                WHERE
                `expenses`.`id` = '$id'";

        $result = $this->conn->query($sql);

        return $result;

    }





    // update start w

    function staffMessageexpensesupdate($id, $name, $notice){

        $sqledit1 = "UPDATE  `staff_message` SET `id` = '{$id}', `name`= '{$name}', `notice` = '{$notice}' WHERE `staff_message`.`id` = '{$id}'";

        $result1 = $this->conn->query($sqledit1);

        return $result1;

    }

    //end updateEmp function






    function dateformet($new){

        $sql = "INSERT INTO `expenses` (`date`) VALUES ('$new')";

        $result1 = $this->conn->query($sql);

        return $result1;

    }







    // status start w

    function expensesActive($id){

        $sql2 = "UPDATE  `expenses` SET `status` = '1' WHERE `expenses`.`id` = '{$id}'";
        $result2 = $this->conn->query($sql2);
        return $result2;
    }
    
    //end status function


    

        // update start w

        function expenseCancel($id){

            $sql2 = "UPDATE  `expenses` SET `status` = '0' WHERE `expenses`.`id` = '{$id}'";
    
            $result2 = $this->conn->query($sql2);
    
            return $result2;
        }
        
        //end updateEmp function
    
    

   
// expenses year chat w

function expensesyearbarchat(){

    $sql="SELECT MONTHNAME(date) as chatname, SUM(amount) as amount FROM `expenses` where year(DATE)=(SELECT YEAR(CURDATE())) GROUP BY chatname";

    $result = $this->conn->query($sql);

    return $result;

}

// expenses total chat w

function expensestotalbarchat(){

    $sql="SELECT YEAR(date) as chatname, SUM(amount) as amount FROM `expenses` GROUP BY chatname";

    $result = $this->conn->query($sql);

    return $result;

}



// expenses hour chat w

function expensehourbarchat(){

    $sql="SELECT HOUR(added_on) as chatname, SUM(amount) as amount FROM `expenses` where hour(DATE)=(SELECT hour(CURDATE())) and day(DATE)=(SELECT day(CURDATE())) and month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) GROUP BY chatname;";

    $result = $this->conn->query($sql);

    return $result;

}




// expenses week chat w

function expenseweekbarchat(){

    $sql=" SELECT DAYNAME(date) as chatname, SUM(amount) as amount FROM `expenses` WHERE week(DATE)=(SELECT week(CURDATE())) GROUP BY chatname";

    $result = $this->conn->query($sql);

    return $result;

}










    function showExpenssById($id){

        $sql = "SELECT * FROM expenses WHERE `expenses`.`id` = '$id'";

        $result1 = $this->conn->query($sql);

        return $result1;

    }



//     function expensesLastMonth($expenses_chart){

//         $sql = "SELECT * FROM `expenses`  where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY MONTH(amount)";

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



}
?>