<?php







class Contact extends DatabaseConnection{







    //insert data    

    function contactInsert( $name,  $email, $subject, $message, $status){



        $sql = "INSERT INTO `contact_send` 

                (`name`, `email`, `subject`, `message`, `status`)

                VALUES

                ('$name', '$email', '$subject', '$message', '$status')";



        $res = $this->conn->query($sql);

        return $res;



    }

    

    // inshat data end

    

    
 //showmessage start
 function messageShow(){

    $Data = array();
    $sql = "SELECT * FROM `contact_send` order by id desc";
    $Query   = $this->conn->query($sql);
    while($row  = $Query->fetch_array()){
        $Data[]	= $row;
    }
    return $Data;

}//eof



    
 //showmessage start
 function admissionshow(){

    $Data = array();
    $sql = "SELECT * FROM `admission_query` order by id desc";
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


       //updatePage start 

       function viweadmission($Id){
        
        $Data = array();
        $sql = "SELECT * FROM admission_query WHERE `admission_query`.`id` = '$Id'";
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



        //Status updated
	function updatequeryStatus($blog_id, $approved){
		
		//statement
		$sql	= "UPDATE admission_query 
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

    

// message count start

    function searchdata(){

        $data = array();
        $sql ="SELECT * FROM `contact_send` WHERE `status` LIKE '0'";
        
        $result = $this->conn->query($sql);
        $rows = $result->num_rows;
        if ($rows > 0) {
            while ($row = $result->fetch_array()) {
                $data[] = $row;
            }
        }
        return $data;
        
         
    }

    function searchquerydata(){

        $data = array();
        $sql ="SELECT * FROM `admission_query` WHERE `status` LIKE '0'";
        
        $result = $this->conn->query($sql);
        $rows = $result->num_rows;
        if ($rows > 0) {
            while ($row = $result->fetch_array()) {
                $data[] = $row;
            }
        }
        return $data;
        
         
    }
   
 // message count end

}


?>