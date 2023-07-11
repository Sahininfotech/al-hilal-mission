<?php


class Vendor extends DatabaseConnection{
    

    //   inshat dada start w



    function vendorInsert($name, $address, $date, $status, $added_by ,$mob_no, $vendor_id){



        $sql = "INSERT INTO `vendor` ( `name`, `address`, `date`,`status`, `added_by`, `mob_no`, `vendor_id`) VALUES ('$name', '$address', '$date', '$status', '$added_by', '$mob_no', '$vendor_id')";



        $insertVenQuery = $this->conn->query($sql);



        return $insertVenQuery;



    }



    // inshat data end





//search start w



function searchdata($vendor_id, $search_vendor, $search_vendor1){



    // $sqldal = "SELECT * FROM `vendor` WHERE concat(`date`) between '$search_expenses' to '$search_expenses1'";

    $sqldal = "SELECT * FROM `revenue_others` WHERE `vendor_id` = '$vendor_id' concat(`date`) between '$search_vendor' to '$search_vendor1'";



    $result1 = $this->conn->query($sqldal);



    return $result1;



}



//   end search function





//curd total amount start ..............



//w



function totalamountDay($vendor_total){



    $sql="SELECT vendor_id, SUM(amount) AS 'Total' FROM `revenue_others` where day(DATE)=(SELECT day(CURDATE())) and month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) and `vendor_id` = '$vendor_total' ORDER BY YEAR(amount)";



    $result = $this->conn->query($sql);



    return $result;





}







function totalamountMonthven(){



    $sql="SELECT MONTHNAME(amount) AS 'amount', SUM(amount) AS 'Total' FROM `vendor` where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY MONTH(amount)";



    $result = $this->conn->query($sql);



    return $result;



}





// w

function ventotalamountYear($vendor_total){



    // total $sql="SELECT YEAR(amount) AS 'amount', SUM(amount) AS 'Total' FROM `vendor` where year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY YEAR(amount);";

    $sql = "SELECT vendor_id,`amount`, SUM(amount) AS 'Total' FROM `revenue_others` where year(DATE)=(SELECT YEAR(CURDATE())) and `vendor_id` = '$vendor_total' ORDER BY YEAR(amount)";



    $result = $this->conn->query($sql);



    return $result;



}





// w





function totalamount($vendor_chart){



    $sql="SELECT vendor_id, SUM(amount) AS 'Total' FROM `revenue_others` where `vendor_id` = '$vendor_chart'";



    $result = $this->conn->query($sql);



    return $result;



}





//curd total amount end..............



// w



function vendisplay($vendortotal){



    $empData = array();



    $sql = "SELECT * FROM `revenue_others` WHERE `vendor_id` = '$vendortotal'";



    $insertVenQuery = $this->conn->query($sql);



    while($row      = $insertVenQuery->fetch_array()){    



    $empData[]	    = $row;



    }



    return $empData;



}

// end display





// vendor.php display start w



function displaydata(){



    $empData = array();



    $sql = "SELECT * FROM `vendor` order by id desc";



    $insertVenQuery = $this->conn->query($sql);



    while($row      = $insertVenQuery->fetch_array()){    



    $empData[]	    = $row;



    }



    return $empData;



}

// end display







// display start w



function vendordisplaydata(){



    $venData = array();



    $sql = "SELECT * FROM `vendor`";



    $venDataQuery   = $this->conn->query($sql);



    while($row  = $venDataQuery->fetch_array()){    



    $venData[]	= $row;



    }



    return $venData;



}



// end display





    //updatePage start w



    function vendorchartday($expenses_chart){



        $sql = "SELECT * FROM `revenue_others` where day(DATE)=(SELECT day(CURDATE())) and month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) and `vendor_id` = '$expenses_chart' ORDER BY DAY(amount)";



        $vendorTypeQuery = $this->conn->query($sql);

        $rows = $vendorTypeQuery->num_rows;

        if ($rows == 0) {

        return 0;

        }else{

        while ($result = $vendorTypeQuery->fetch_array()) {

        $data[] = $result;

        }

        return $data;

        }

    }



    // end updatePage

   // 



    

    //month_chart start w



    function vendorchartmonth($month_chart){



        $sql = "SELECT * FROM `revenue_others` where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) and `vendor_id` = '$month_chart' ORDER BY MONTH(amount)";



        $vendorTypeQuery = $this->conn->query($sql);

        $rows = $vendorTypeQuery->num_rows;

        if ($rows == 0) {

        return 0;

        }else{

        while ($result = $vendorTypeQuery->fetch_array()) {

        $data[] = $result;

        }

        return $data;

        }



    }



    // end month_chart

    



    // print VEN52037  SELECT * FROM `revenue_others` WHERE `vendor_id` = 'VEN52037';



   // total print   SELECT vendor_id,`amount`, SUM(amount) AS 'Total' FROM `revenue_others` where year(DATE)=(SELECT YEAR(CURDATE())) and `vendor_id` = 'VEN52037' ORDER BY YEAR(amount)



  // SELECT vendor_id, SUM(amount) AS 'Total' FROM `revenue_others` where day(DATE)=(SELECT day(CURDATE())) and month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) and `vendor_id` = 'VEN52037' ORDER BY YEAR(amount)



  // SELECT vendor_id,`amount`, SUM(amount) AS 'Total' FROM `revenue_others` where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) and `vendor_id` = 'VEN52037' ORDER BY YEAR(amount)



  // SELECT * FROM `revenue_others` WHERE `vendor_id` = 'VEN10292' and concat(`date`) between '2022-08-10' and '2022-08-20';



  



  // month_total start w

    

    function vendortotalMonth($month_total){



        $sql="SELECT vendor_id, SUM(amount) AS 'Total' FROM `revenue_others` where month(DATE)=(SELECT MONTH(CURDATE())) AND year(DATE)=(SELECT YEAR(CURDATE())) and `vendor_id` = '$month_total' ORDER BY YEAR(amount)";



        $result = $this->conn->query($sql);



        return $result;



    }



     // month_total end









    

    //updatePage start w



    function vendorchartyear($expenses_chart){



        // $sql = "SELECT * FROM `revenue_others` where year(DATE)=(SELECT YEAR(CURDATE())) ORDER BY YEAR(amount)";

        $sql = " SELECT * FROM `revenue_others` WHERE year(DATE)=(SELECT YEAR(CURDATE())) and `vendor_id` = '$expenses_chart' ORDER BY YEAR(amount)";

        

       

        $vendorTypeQuery = $this->conn->query($sql);

        $rows = $vendorTypeQuery->num_rows;

        if ($rows == 0) {

        return 0;

        }else{

        while ($result = $vendorTypeQuery->fetch_array()) {

        $data[] = $result;

        }

        return $data;

        }

    }



    // end updatePage





    

    // find from date to date w



    function showvendorDetails($vendor_id, $search_vendor, $search_vendors){



        // $sql = "SELECT * FROM `vendor` WHERE concat(`date`)  between '$search_expenses1' and '$search_expenses'";

       $sql = "SELECT * FROM `revenue_others` WHERE `vendor_id` = '$vendor_id' and concat(`date`) between '$search_vendor' and '$search_vendors'";



        $vendorTypeQuery = $this->conn->query($sql);



        $rows = $vendorTypeQuery->num_rows;



        if ($rows == 0) {

        return 0;

        }else{

        while ($result = $vendorTypeQuery->fetch_array()) {

        $data[] = $result;

        }

        return $data;

        }



    }



    // end find function





        // expenses serch total data start w



        function finddataVendor($vendor_id, $search_vendor, $search_vendors){



            $sql="SELECT SUM(amount) AS 'Total' FROM `revenue_others` WHERE `vendor_id` = '$vendor_id' and concat(`date`) between '$search_vendor' and '$search_vendors'";

    

            $result = $this->conn->query($sql);

    

            return $result;

    

        }

    

        // end





        





    //updatePage start w



    function vendordetails($Id){



        $sql = "SELECT * FROM vendor WHERE `vendor`.`id` = '$Id'";



        $result = $this->conn->query($sql);



        return $result;



    }



    
    function vendorByid($Id){



        $sql = "SELECT * FROM vendor WHERE `vendor`.`vendor_id` = '$Id'";



        $result = $this->conn->query($sql);



        return $result;



    }




    // end updatePage







    
        // update start w

        function updatecancel($id){

            $sql2 = "UPDATE `vendor` SET `status` = 'inactive' WHERE `vendor`.`id` = '$id'";
    
            $result2 = $this->conn->query($sql2);
    
            return $result2;
        }
        
        //end updateEmp function


        
        // update start w

        function updateactive($id){

            $sql2 = "UPDATE `vendor` SET `status` = 'active' WHERE `vendor`.`id` = '$id'";
    
            $result2 = $this->conn->query($sql2);
    
            return $result2;
        }
        
        //end updateEmp function





         

    //departnemt action update start w



    function vendorEdit($name, $address, $mob_no, $date, $id, $status){



        $sqledit = "UPDATE  `vendor` SET `name` = '$name', `address` = '$address', `mob_no`= '$mob_no', `date`= '$date', `id`= '$id', `status` = '$status'  WHERE `vendor`.`id` = '$id'";



        $result1 = $this->conn->query($sqledit);



        return $result1;



    }



    //end updateEmp function



}

?>