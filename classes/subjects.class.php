<?php

class Subjects extends DatabaseConnection{



    



    //  subject inshat data start w

    function addSubject( $class_name, $subject, $description, $stream){

        $sql = "INSERT INTO `class_subject` (`class_id`, `subject`, `description`, `stream`) VALUES ( '$class_name', '$subject', '$description', '$stream')";

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
    function subjectupdate($id, $class_name, $subject, $description){

        $sql = "UPDATE  `class_subject` SET `id` = '$id', `class_id` = '$class_name', `subject`= '$subject', `description`= '$description' WHERE `class_subject`.`id` = '$id'";
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