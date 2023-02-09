<?php

class Subjects extends DatabaseConnection{



    



    //  subject inshat data start w

    function addSubject( $class_name, $subject, $description){

        $sql = "INSERT INTO `class_subject` (`class_name`, `subject`, `description`) VALUES ( '$class_name', '$subject', '$description')";

        $insert = $this->conn->query($sql);
        return $insert;

    }

   // inshat data end




    
    //subjectById start
    function subjectById($subId){

        $sql = "SELECT * FROM class_subject WHERE `class_subject`.`id` = '$subId'";
        $result = $this->conn->query($sql);
        return $result;

    }// enf




    
    //subjectupdate start 
    function subjectupdate($class_name, $subject, $description){

        $sql = "UPDATE  `class_subject` SET `class_name` = '$class_name', `subject`= '$subject', `description`= '$description' WHERE `class_subject`.`class_name` = '$class_name'";
        $result = $this->conn->query($sql);
        return $result;

    }//enf


    
    // subject delete start w

    function deleteSubject($subId){

        $sql = "DELETE FROM `class_subject` WHERE  `class_subject`.`id` = '$subId'";
        $result = $this->conn->query($sql);
        return $result;

    }
    
    // end deleteDocCat function

    
    
}



?>