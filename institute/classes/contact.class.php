<?php



class Contact extends DatabaseConnection{



    //insert data    
    function contactInsert( $name,  $email, $subject, $message){

        $sql = "INSERT INTO `contact_send` 
                (`name`, `email`, `subject`, `message`)
                VALUES
                ('$name', '$email', '$subject', '$message')";

        $res = $this->conn->query($sql);
        return $res;

    }
    
    // inshat data end
    
    
    
    
    
    
}


?>