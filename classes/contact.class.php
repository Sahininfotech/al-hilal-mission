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
    
    
    

 //showmessage start
 function messageShow(){

    $Data = array();
    $sql = "SELECT * FROM `contact_send`";
    $Query   = $this->conn->query($sql);
    while($row  = $Query->fetch_array()){
        $Data[]	= $row;
    }
    return $Data;

}//eof



    //updatePage start 

    function viwemessage($Id){
        
        $Data = array();
        $sql = "SELECT * FROM contact_send WHERE `contact_send`.`id` = '$Id'";
        $Query   = $this->conn->query($sql);
        while($row  = $Query->fetch_array()){
            $Data[]	= $row;
        }
        return $Data;
    }

    // end updatePage




    //Status updated
	function updateStatus($blog_id, $approved){
		
		//statement
		$sql	= "UPDATE contact_send 
					SET 
					status   = '$approved',
					added_on = now()
					WHERE 
					id = '$blog_id'";
				  
		//execute query
		$query	= $this->conn->query($sql);
		//return the result
		return $query;
	}//eof

    
    
    
}


?>