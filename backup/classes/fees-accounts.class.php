<?php



class FeesAccount extends DatabaseConnection{



    function addFeesAccount($accountName,  $addedBy){

        $sql = "INSERT INTO `fees_accounts` ( `account_name`, `added_by`, `added_on`)
                                            VALUES
                                            ( '$accountName', '$addedBy', now())";

        $res = $this->conn->query($sql);
        return $res;

    }// eof adminInsert



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



    
    function addFeesAccounts($student_id, $purposes, $amount){

        $sql = "INSERT INTO `studentfees` (`student_id`, `purpose`, `amount`)
                                            VALUES
                                            ('$student_id','$purposes', '$amount')";

        $res = $this->conn->query($sql);
        return $res;

    }


}
?>