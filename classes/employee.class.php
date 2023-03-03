<?php
date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)

class Employee extends DatabaseConnection{

    //   inshat dada start
    //rand auto id
    function staffInsert( $name,  $email, $address, $contactno, $gender, $qualification, $experience, $joinin_date, $post_office, $sdo_or_bdo, $police_station, $district, $pin_code, $state, $status, $hash, $hash1){
       
        $code    = rand(1, 99999);
        $user_id = "STA".$code;

        $sql = "INSERT INTO `staff` ( `user_id`,`name`, `email`, `address`, `contactno`, `gender`, `qualification`, `experience`, `joinin_date`, `post_office`,`sdo_or_bdo`, `police_station`, `district`, `pin_code`, `state`, `status`, `Password`, `password1`)
        VALUES ('$user_id', '$name', '$email', '$address', '$contactno', '$gender', '$qualification', '$experience', '$joinin_date', '$post_office', '$sdo_or_bdo', '$police_station', '$district', '$pin_code', '$state', '$status', '$hash', '$hash1')";
       
       $insertEmpQuery = $this->conn->query($sql);

    return $insertEmpQuery;

    // inshat data end
    }








    function staffInsert1( $name,  $email, $address, $contactno, $gender, $qualification, $experience, $date){
        $sql = "INSERT INTO `staff` 
                            (`name`, `email`, `address`, `contactno`, `gender`, `qualification`, `experience`,`date`)
                            VALUES
                            ('$name', '$email', '$address', '$contactno', '$gender', '$qualification', '$experience',  current_timestamp())";
        
        $insertEmpQuery = $this->conn->query($sql);
        return $insertEmpQuery;
    }




    
    // display start
    function showimage(){

        $empData = array();
        $sql = "SELECT * FROM `forum_staff`";
        $res = $this->conn->query($sql);
        while($row  = $res->fetch_array()){
            $empData[]	= $row;
        }
        return $empData;
        
    }
    // end display



   
    // display start
    function shownoticeimage(){

        $empData = array();
        $sql = "SELECT * FROM `forum`";
        $res = $this->conn->query($sql);
        while($row  = $res->fetch_array()){
            $empData[]	= $row;
        }
        return $empData;
        
    }
    // end display



 

    // display start
    function showEmployees(){

        $empData = array();
        $sql = "SELECT * FROM `staff`";
        $res = $this->conn->query($sql);
        while($row  = $res->fetch_array()){
            $empData[]	= $row;
        }
        return $empData;
        
    }
    // end display







    // delete start

    function deleteEmp($deleteEmpId){

        $stu_id = $_GET['id'];

        $sqldal = "DELETE FROM `staff_atten` WHERE  `id` = {$stu_id}";

        $result1 = $this->conn->query($sqldal);

        return $result1;
    }

    // end deleteDocCat function







    // update start

    function empUpdate( $id, $name, $address, $contactno, $email, $gender, $qualification, $status){

    $sql = "UPDATE  `staff`
            SET
            `id`            = '$id',
            `name`          = '$name',
            `address`       = '$address',
            `contactno`     = '$contactno',
            `email`         = '$email',
            `gender`        = '$gender',
            `qualification` = '$qualification',
            `status`        = '$status'
            WHERE
            `staff`.`id`    = '{$id}'";

    $res = $this->conn->query($sql);
    return $res;
    }

    //end updateEmp function









    // notice inshat data start w

    function noticeInsert( $notices, $image, $subject, $added_by){

        $notice = addslashes($notices);

        $sql = "INSERT INTO `forum` ( `notice`, `signature`, `subject`, `added_by`) VALUES ( '$notice', '$image', '$subject', '$added_by')" ;
        
        $insertEmpQuery = $this->conn->query($sql);

    }


    // notice inshat data end





    // notice inshat data start w

    function staff_noticeInsert($name, $notices, $subject, $image, $staff_id, $added_by){

        $notice = addslashes($notices);

        $sql = "INSERT INTO `forum_staff` ( `name`,`notice`, `subject`, `signature`, `staff_id`, `added_by`) VALUES ( '$name','$notice','$subject','$image','$staff_id', '$added_by')";
        
        $insertEmpQuery = $this->conn->query($sql);

    }

    // notice inshat data e









    // from date to date w

    function shownoticeDetails1($search_expenses1, $search_expenses){

        $sql = "SELECT * FROM `forum` WHERE concat(`date`)  between '$search_expenses1' and '$search_expenses'";

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






    function dropdown(){

        $sql = "SELECT name FROM `staff`";

        $result1 = $this->conn->query($sql);

        return $result1;
    }







    function staffnoticeupdatePage($userId){

        $sql = "SELECT * FROM staff WHERE `staff`.`user_id` = '$userId'";

        $result1 = $this->conn->query($sql);

        return $result1;
    }



    // update start w

    function noticeupdate($id, $name, $message){

        $sqledit1 = "UPDATE  `staff` SET `id`= '$id', `message`= '$message', `name`= '$name' WHERE `staff`.`id` = '$id'";

        $result1 = $this->conn->query($sqledit1);

        return $result1;
    }

    //end updateEmp function








    // update start w

        function staffA($id){

        $sql2 = "UPDATE  `staff` SET `status` = '0' WHERE `staff`.`id` = '$id'";

        $result2 = $this->conn->query($sql2);

        return $result2;
    }

    //end updateEmp function



    
    // update start w

    function staffactive($id){

        $sql2 = "UPDATE  `staff` SET `status` = '1' WHERE `staff`.`id` = '$id'";

        $result2 = $this->conn->query($sql2);

        return $result2;
    }

    //end updateEmp function







    // update start w

    function staffnoticeupdate($id, $name, $notice, $subject, $c_image, $staff_id){

        $sqledit1 = "UPDATE  `forum_staff` SET `id`= '$id', `notice`= '$notice', `name`= '$name', `subject`= '$subject', `signature`= '$c_image', `staff_id`= '$staff_id' WHERE `forum_staff`.`id` = '$id'";

        $result1 = $this->conn->query($sqledit1);

        return $result1;
    }
    
    //end updateEmp function


    
    // update start w

    function noticeedit($id, $c_image, $notice, $subject){

        $notices = addslashes($notice);

        $sqledit1 = "UPDATE  `forum` SET `id`= '$id', `signature`= '$c_image', `notice`= '$notices', `subject`= '$subject' WHERE `forum`.`id` = '$id'";

        $result1 = $this->conn->query($sqledit1);

        return $result1;
    }

    //end updateEmp function

 


    function passwordchack($hash, $hash1){

        $sql = "SELECT * FROM `staff` WHERE `staff`.`Password` = '$hash' and `staff`.`Password1` = '$hash1'";

        $result = $this->conn->query($sql);

        return $result;
    }






    function staffMessageupdatePage($id){

        $sql = "SELECT * FROM `forum_staff` WHERE `forum_staff`.`id` = '$id'";

        $result1 = $this->conn->query($sql);

        return $result1;
    }


    
    function noticeupdatePage($id){

        $sql = "SELECT * FROM `forum` WHERE `forum`.`id` = '$id'";

        $result1 = $this->conn->query($sql);

        return $result1;
    }



    // ================================================
    
    function empById($empId){

        $data = array();
        $sql = "SELECT * FROM staff WHERE `staff`.`user_id` = '$empId'";
        $res = $this->conn->query($sql);
        if ($res->num_rows > 0 ) {

            while ($result = $res->fetch_array()) {
                $data[] = $result;
            }

        }
        return $data;
    }


        // inshat data start w

        function sendEmpMsg($name, $staff_id, $message){

            $sql = "INSERT INTO `staff_message` ( `name`, `staff_id`, `message`) VALUES ('$name', '$staff_id','$message')";
            $insert = $this->conn->query($sql);
            return $insert;
    
        }
      
        // inshat data end





              
    function deletestaffnotice($Id){

        $sqldal = "DELETE FROM `forum_staff` WHERE `forum_staff`.`id` = '$Id'";

        $result = $this->conn->query($sqldal);

        return $result;

    }

    function deletenotice($Id){

        $sqldal = "DELETE FROM `forum` WHERE `forum`.`id` = '$Id'";

        $result = $this->conn->query($sqldal);

        return $result;

    }

}
?>