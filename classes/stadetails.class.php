<?php


class institute extends DatabaseConnection{

    //   inshat data start w

    function Staffinsert( $name,  $email, $address, $contactno, $gender, $qualification, $experience, $date){

        $sql = "INSERT INTO `staff` ( `name`, `email`, `address`, `contactno`, `gender`, `qualification`, `experience`,`date`) VALUES ( '$name',  '$email', '$address', '$contactno', '$gender', '$qualification', '$experience',  current_timestamp())";

        $insertEmpQuery = $this->conn->query($sql);

        return $insertEmpQuery;

    }

     // inshat data end



    // display start

    function displaydata(){

        $empData = array();

        $sql = "SELECT * FROM `staff`";

        $empQuery   = $this->conn->query($sql);

        while($row  = $empQuery->fetch_array()){    

        $empData[]	= $row;

        }

        return $empData;

    }

    // end display



    // delete start

    function deleteEmp($deleteEmpId){

        $stu_id = $_GET['id'];

        $sqldal = "DELETE FROM `staff` WHERE  `id` = {$stu_id}";

        $result1 = $this->conn->query($sqldal);

        return $result1;
    }
    
    // end deleteDocCat function




    // update start

    function update( $name,  $email, $address, $contactno, $gender, $qualification, $experience/*Last Variable for id which one you want to update */ ){

        $rn      = $_POST['id'];

        $fn      = $_POST ['name'];

        $ln      = $_POST['email'];

        $dn      = $_POST['added_by'];

        $en      = $_POST['added_on'];

        $sqledit = "UPDATE  `staff` SET `id` = '{$rn}', `name`= '{$fn}', `email` = '{$ln}', `added_by` = '{$dn}' WHERE `staff`.`id` = '{$rn}'";

        $editQuery = $this->conn->query($sqledit);

        // echo $editQuery.$this->conn->error;
        // exit;

        return $editQuery;   
    }
    
    //end updateEmp function






        // revenue search w

        function searchStaff($search_value){

            $data = array();
            $sql ="SELECT * FROM `staff` WHERE `staff`.`name` LIKE '%$search_value%'";
            
            $result = $this->conn->query($sql);
            $rows = $result->num_rows;
            if ($rows > 0) {
                while ($row = $result->fetch_array()) {
                    $data[] = $row;
                }
            }
            return $data;
            
             
        }

      // revenue search end w




//   inshat employee role

function empRoleInsert($roleId, $roleName, $description){

    $sql = "INSERT INTO `employee_designation` (`designation_id`, `designation_name`, `description`, `added_on`) VALUES ( '$roleId',  '$roleName', '$description', NOW())";

    $insertEmpQuery = $this->conn->query($sql);

    return $insertEmpQuery;

}

// inshat data end





  // display DESIGNATION
  function RoleList(){
        
    $EMPData = array();
    $sql = "SELECT * FROM `employee_designation`";
    $empQuery   = $this->conn->query($sql);
    while($row  = $empQuery->fetch_array()){    
        $EMPData[]	= $row;
    }
    return $EMPData;

}// end display






function Roleupdate($RoleName, $description, $id){



    $sqledit = "UPDATE `employee_designation` SET `designation_name` = '$RoleName', `modified_on` = now(), `description`= '$description' WHERE `employee_designation`.`id` = '$id'";



    $result = $this->conn->query($sqledit);



    return $result;



}



// display DESIGNATION

  function RoledataById($id){
        
    $EMPData = array();
    $sql = "SELECT * FROM `employee_designation` WHERE `designation_id` = '$id'";
    $empQuery   = $this->conn->query($sql);
    while($row  = $empQuery->fetch_array()){    
        $EMPData[]	= $row;
    }
    return $EMPData;

}// end display




    // delete start

    function deleteEmpRole($id){

        $sqldal = "DELETE FROM `employee_designation` WHERE  `id` = $id";

        $result = $this->conn->query($sqldal);

        return $result;
    }
    
    // end deleteEmpRole function




}
?>