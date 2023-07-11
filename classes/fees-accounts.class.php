<?php







class FeesAccount extends DatabaseConnection{







    function addFeesAccount($accountName,  $addedBy){



        $sql = "INSERT INTO `fees_accounts` ( `account_name`, `added_by`, `added_on`)

                                            VALUES

                                            ( '$accountName', '$addedBy', now())";



        $res = $this->conn->query($sql);

        return $res;



    }

    // eof adminInsert









    function showAccounts(){



        $data = array();

        $sql = "SELECT * FROM `fees_accounts`";

        $res = $this->conn->query($sql);

        if ($res->num_rows > 0) {

            while ($result = $res->fetch_array()) {

                $data[] = $result;

            }

        }

        return $data;



    }





    

    function showAccount($structure){



        $data = array();

        $sql = "SELECT * FROM `fees_structure` WHERE `class_id` = '$structure'";

        $res = $this->conn->query($sql);

        if ($res->num_rows > 0) {

            while ($result = $res->fetch_array()) {

                $data[] = $result;

            }

        }

        return $data;



    }





        

    function showTotalamount($structure){



        $data = array();

        $sql = "SELECT *, sum(amount) as totalamount FROM `fees_structure` WHERE `class_id` = '$structure'";

        $res = $this->conn->query($sql);

        if ($res->num_rows > 0) {

            while ($result = $res->fetch_array()) {

                $data[] = $result;

            }

        }

        return $data;



    }









    function schowAccountById($accId){



        $data = array();

        $sql = "SELECT * FROM `fees_accounts` WHERE `fees_accounts`.`id` = '$accId'";

        $res = $this->conn->query($sql);

        if ($res->num_rows > 0) {

            while ($result = $res->fetch_array()) {

                $data[] = $result;

            }

        }

        return $data;



    }







    // delete start



    function deleteFeesAcc($accId){



        $sql = "DELETE FROM `fees_accounts` WHERE  `id` = $accId";

        $res = $this->conn->query($sql);

        return $res;



    }

    

    // end deleteDocCat function













    // updateAccname start

    function updateAccname($accId, $accNewName){



        $sql = "UPDATE  `fees_accounts` SET  `account_name`= '$accNewName' WHERE `id` = '$accId'";

        $result = $this->conn->query($sql);

        return $result;



    }







    

    function classFees($class_id, $purpose, $amount){



        $sql = "INSERT INTO `fees_structure` (`class_id`, `purpose`, `amount`)

                                            VALUES

                                            ('$class_id','$purpose', '$amount')";



        $res = $this->conn->query($sql);

        return $res;



    }







    function showfees_structure(){



        $data = array();

        $sql = "SELECT * FROM `fees_structure`";

        $res = $this->conn->query($sql);

        if ($res->num_rows > 0) {

            while ($result = $res->fetch_array()) {

                $data[] = $result;

            }

        }

        return $data;



    }







    function classById($accId){



        $data = array();

        $sql = "SELECT * FROM `fees_structure` WHERE `fees_structure`.`id` = '$accId'";

        $res = $this->conn->query($sql);

        if ($res->num_rows > 0) {

            while ($result = $res->fetch_array()) {

                $data[] = $result;

            }

        }

        return $data;



    }









    

    // updateAccname start

    function updatefees($amount,$Id){



        $sql = "UPDATE  `fees_structure` SET  `amount`= '$amount' WHERE `id` = '$Id'";

        $result = $this->conn->query($sql);

        return $result;



    }















    // delete start



    function deleteFeesStur($accId){



        $sql = "DELETE FROM `fees_structure` WHERE  `id` = $accId";

        $res = $this->conn->query($sql);

        return $res;



    }

    

    // end deleteDocCat function









    

    
    // function addFeesAccounts($student_id, $discount, $name, $conc_remark, $payable_fee, $gurdian_name, $academic_year, $roll_no, $class){

    //     $sql = "INSERT INTO `student_fees_dtls` (`student_id`, `concession`, `name`, `conc_remark`, `payable_fee`, `gurdian_name`, `session`, `roll_no`, `class`, `total_due`)
    //                                         VALUES
    //                                         ('$student_id', '$discount', '$name', '$conc_remark', '$payable_fee', '$gurdian_name', '$academic_year', '$roll_no', '$class', '$payable_fee')";

    //     $res = $this->conn->query($sql);
    //     return $res;

    // }


    function addFeesAccounts($student_id, $discount, $name, $conc_remark, $payable_fee, $gurdian_name, $academic_year, $roll_no, $class){

        $sql = "SELECT * FROM `student_fees_dtls` WHERE `student_fees_dtls`.`student_id` = '$student_id'";

         $selectdata   = $this->conn->query($sql);
 
         $rows = $selectdata->num_rows;

         if ($rows == 0) {

                $sql = "INSERT INTO `student_fees_dtls` (`student_id`, `concession`, `name`, `conc_remark`, `payable_fee`, `gurdian_name`, `session`, `roll_no`, `class`, `total_due`)
                VALUES
                ('$student_id', '$discount', '$name', '$conc_remark', '$payable_fee', '$gurdian_name', '$academic_year', '$roll_no', '$class', '$payable_fee')";

                $res = $this->conn->query($sql);
                return $res;

           }

             else

             {   
                 $sqledit = "UPDATE  `student_fees_dtls` SET `class` = '$class', `concession` = '$discount', `conc_remark` = '$conc_remark', `payable_fee` = '$payable_fee', `total_due` = '$payable_fee', `session` = '$academic_year', `roll_no` = '$roll_no', `gurdian_name` = '$gurdian_name' WHERE  `student_fees_dtls`.`student_id` = '$student_id'";

                 $result1 = $this->conn->query($sqledit);
                 return $result1;

             }

     }








    // function feesSummary($student_id, $name, $total_due, $advanced, $amount){



    //     $sql = "INSERT INTO `student_payment_summary` ( `student_id`, `name`, `total_due`, `advanced`, `last_paid`, `added_on`)

    //                                         VALUES

    //                                         ( '$student_id', '$name', '$total_due', '$advanced', '$amount', now())";



    //     $res = $this->conn->query($sql);

    //     return $res;



    // }













    // function feesSummary($student_id, $name, $total_due, $advanced, $amount, $date, $added_by){







    //     $sql = "SELECT * FROM `student_payment_summary` WHERE `student_payment_summary`.`student_id` = '$student_id'";

        

    //      $selectdata   = $this->conn->query($sql);

 

    //      $rows = $selectdata->num_rows;

 

    //      if ($rows == 0) {



    //             $sql = "INSERT INTO `student_payment_summary` ( `student_id`, `name`, `total_due`, `advanced`, `last_paid`, `date`, `added_by`,`added_on`)

    //                                                 VALUES

    //                                                 ( '$student_id', '$name', '$total_due', '$advanced', '$amount', '$date', ' $added_by', now())";



    //             $res = $this->conn->query($sql);

    //             return $res;

         

    //        }

    //          else

    //          {

                 

    //              $sqledit = "UPDATE  `student_payment_summary` SET `total_due` = '$total_due', `advanced` = '$advanced', `last_paid` = '$amount', `date` = '$date', `added_by` = '$added_by' WHERE  `student_payment_summary`.`student_id` = '$student_id'";

 

    //              $result1 = $this->conn->query($sqledit);

         

    //              return $result1;

 

    //          }

             

 

    //  }









    

    function feesSummary($student_id, $name, $class, $total_due, $advanced, $amount, $date, $added_by, $total_duess, $advanceds){







        $sql = "SELECT * FROM `student_payment_summary` WHERE `student_payment_summary`.`student_id` = '$student_id'";

        

         $selectdata   = $this->conn->query($sql);

 

         $rows = $selectdata->num_rows;

 

         if ($rows == 0) {



                $sql = "INSERT INTO `student_payment_summary` ( `student_id`, `name`, `class`, `total_due`, `advanced`, `last_paid`, `date`, `added_by`,`added_on`)

                                                    VALUES

                                                    ( '$student_id', '$name', '$class', '$total_due', '$advanced', '$amount', '$date', ' $added_by', now())";





       



                $res = $this->conn->query($sql);

                return $res;



         

           }

             else

             {   

                

       

                 

                 $sqledit = "UPDATE  `student_payment_summary` SET `total_due` = '$total_duess', `advanced` = '$advanceds', `last_paid` = '$amount', `date` = '$date', `added_by` = '$added_by',  `class` = '$class' WHERE  `student_payment_summary`.`student_id` = '$student_id'";



 

                 $result1 = $this->conn->query($sqledit);

         

                 return $result1;





 

             }





      

             

 

     }

 

     function feesSummarydata($student_id, $total_due, $total_duess, $class){







        $sql = "SELECT * FROM `student_fees_dtls` WHERE `student_fees_dtls`.`student_id` = '$student_id' ";

        

        $selectdata   = $this->conn->query($sql);



        $row = $selectdata->num_rows;



        if ($row == 0) {



           $sqlup = "UPDATE `student_fees_dtls` SET `total_due` = '$total_due' WHERE  `student_fees_dtls`.`student_id` = '$student_id' and `student_fees_dtls`.`class` = '$class'";



           $reselt = $this->conn->query($sqlup);

           return $reselt;

    

      }

        else

        {   

           





            $sqleditup = "UPDATE `student_fees_dtls` SET `total_due` = '$total_duess' WHERE  `student_fees_dtls`.`student_id` = '$student_id' and `student_fees_dtls`.`class` = '$class'";



            $results = $this->conn->query($sqleditup);

    

            return $results;



        }



    }

    

    function schowAmount($showstuid){

        $data = array();
        $sql = "SELECT * FROM `student_fees_dtls` WHERE `student_fees_dtls`.`student_id` = '$showstuid'";
        $res = $this->conn->query($sql);
        if ($res->num_rows > 0) {
            while ($result = $res->fetch_array()) {
                $data[] = $result;
            }
        }
        return $data;

    }

    
    function showFeesdata($showstuid){

        $data = array();
        $sql = "SELECT * FROM `student_fees_dtls` WHERE `student_fees_dtls`.`student_id` = '$showstuid'";
        $res = $this->conn->query($sql);
        if ($res->num_rows > 0) {
            while ($result = $res->fetch_array()) {
                $data[] = $result;
            }
        }
        return $data;

    }




    function admissiondata($student_id, $purpose, $amount){



        $sql = "INSERT INTO `admission_fees_dtls` (`student_id`, `account_id`, `amount`)

                                            VALUES

                                            ('$student_id','$purpose', '$amount')";



        $res = $this->conn->query($sql);

        return $res;



    }



    function addMonthlyFees($className, $amount, $added_by){

        $sql = "SELECT * FROM `monthly_fees_dtls` WHERE `monthly_fees_dtls`.`class_id` = '$className'";

         $selectdata   = $this->conn->query($sql);
 
         $rows = $selectdata->num_rows;

         if ($rows == 0) {

                $sql = "INSERT INTO `monthly_fees_dtls` (`class_id`, `amount`, `added_by`)
                VALUES
                ('$className', '$amount', '$added_by')";

                $res = $this->conn->query($sql);
                return $res;

           }

             else

             {   
                 $sqledit = "UPDATE  `monthly_fees_dtls` SET `class_id` = '$className', `amount` = '$amount', `modified_on` = now(), `added_by` = '$added_by' WHERE `monthly_fees_dtls`.`class_id` = '$className'";

                 $result = $this->conn->query($sqledit);
                 return $result;

             }

     }




     function monthlyfees_structure(){



        $data = array();

        $sql = "SELECT * FROM `monthly_fees_dtls`";

        $res = $this->conn->query($sql);

        if ($res->num_rows > 0) {

            while ($result = $res->fetch_array()) {

                $data[] = $result;

            }

        }

        return $data;



    }



    function monthlyfeesById($accId){



        $data = array();

        $sql = "SELECT * FROM `monthly_fees_dtls` WHERE `monthly_fees_dtls`.`id` = '$accId'";

        $res = $this->conn->query($sql);

        if ($res->num_rows > 0) {

            while ($result = $res->fetch_array()) {

                $data[] = $result;

            }

        }

        return $data;



    }



    
    function editMonthlyfees($amount,$Id){



        $sql = "UPDATE  `monthly_fees_dtls` SET  `amount`= '$amount' WHERE `id` = '$Id'";

        $result = $this->conn->query($sql);

        return $result;
        


    }




    
    function deleteMonFeesStur($accId){

        $sql = "DELETE FROM `monthly_fees_dtls` WHERE `id` = $accId";

        $res = $this->conn->query($sql);

        return $res;



    }




}

?>