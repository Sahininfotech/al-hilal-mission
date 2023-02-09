<?php


class Departments extends DatabaseConnection{
    



        //addDepartment start
        function addDepartment( $department_name, $description){

            $sql = "INSERT INTO `departments` (`department_name`, `description`) VALUES ( '$department_name', '$description')";
            $insertEmpQuery = $this->conn->query($sql);
            return $insertEmpQuery;
    
        }// eof
    
    
    
        // display start w
    
        function showDepartments(){
            $empData = array();
    
            $sql = "SELECT * FROM `departments`";
    
            $empQuery   = $this->conn->query($sql);
    
            while($row  = $empQuery->fetch_array()){    
    
            $empData[]	= $row;
    
            }
    
            return $empData;
    
        }
    
        // end display



        

    //departmentById start 
    function departmentById($deptId){

        $sql = "SELECT * FROM departments WHERE `departments`.`id` = '$deptId'";
        $result1 = $this->conn->query($sql);
        return $result1;

    }//eof



    //updateDepartment start
    function updateDepartment($department_name, $description, $id){

        $sql = "UPDATE  `departments` SET `department_name` = '$department_name', `description`= '$description' WHERE `departments`.`id` = '$id'";
        $res = $this->conn->query($sql);
        return $res;
    
    }//eof
    


    //deleteDepartment start
    function deleteDepartment($deptId){

        $sql = "DELETE FROM `departments` WHERE  `departments`.`id` = '$deptId'";
        $res = $this->conn->query($sql);
        return $res;

    }//eof



        
}









?>