<?php



class Admin extends DatabaseConnection{



    function adminInsert( $name,  $email, $username, $password,$ph_no, $profession){

        $sql = "INSERT INTO `admins` ( `profession`, `name`, `email`, `username`, `password`, `ph_no`) VALUES ( '$profession', '$name',  '$email', '$username', '$password', '$ph_no')";

        $insertEmpQuery = $this->conn->query($sql);

        return $insertEmpQuery;

    }// eof adminInsert





    // display start
    // function displaydata(){

    //     $empData = array();
    //     $sql = "SELECT * FROM `admin`";
    //     $empQuery   = $this->conn->query($sql);
    //     while($row  = $empQuery->fetch_array()){ 
    //         $empData[]	= $row;
    //     }

    //     return $empData;

    // }

    // end display






    // delete start

    function deleteEmp($adminId){

        $sql = "DELETE FROM `admins` WHERE  `id` = $adminId";
        $res = $this->conn->query($sql);
        return $res;

    }
    
    // end deleteDocCat function






    // update start w
    function update($id, $name, $country, $email, $ph_no, $address, $institute, $profession){

        $sqledit1 = "UPDATE  `admins` SET `id`= '{$id}', `country`= '{$country}', `profession`= '{$profession}', `institute`= '{$institute}', `name`= '{$name}', `address` = '{$address}', `ph_no` = '{$ph_no}', `email` = '{$email}' WHERE `admins`.`id` = '{$id}'";

        $result1 = $this->conn->query($sqledit1);

        return $result1;

    }
    
    //end updateEmp function






    // update start

    function updatepassword($id, $password){

        $sql = "UPDATE  `admins` SET `id`= '{$id}', `password`= '{$password}' WHERE `admins`.`id` = '{$id}'";
        $result = $this->conn->query($sql);
        return $result;

    }
    
    //end updateEmp function






    // login start w

    function logIn($username, $password){

        $data = array();
        $sql  = "SELECT * FROM `admins` WHERE `username` = '$username' AND `password` = '$password'";
        // echo $sql.$this->conn->error;
        $res  = $this->conn->query($sql);
        $rows =  $res->num_rows;
        if ($rows > 0) {
            while ($result = $res->fetch_array()) {
                $data[] = $result;
            }
        }
        return $data;
    }

    // login end








    function getAdmin($userId){

        $sql = "SELECT * FROM `admins` WHERE `admins`.`username` = '$userId'";
        $result1 = $this->conn->query($sql);
        return $result1;

    }



}
?>