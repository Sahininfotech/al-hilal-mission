<?php
date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)

class Event extends DatabaseConnection{


    function eventInsert($eventName, $eventDate, $eventTime, $description, $image){
        $descriptions = addslashes($description);
        $sql = "INSERT INTO `event` 
                            (`event_name`, `event_date`, `event_time`, `description`, `image`, `added_on`)
                            VALUES
                            ('$eventName', '$eventDate', '$eventTime', '$descriptions', '$image', now())";
        
        $insertEventQuery = $this->conn->query($sql);
        return $insertEventQuery;
    }



    
    
// display DESIGNATION

function EventList(){
        
    $EVentData = array();
    $sql = "SELECT * FROM `event`";
    $eveQuery   = $this->conn->query($sql);
    while($row  = $eveQuery->fetch_array()){    
        $EVentData[]	= $row;
    }
    return $EVentData;

}

// end display


 // delete start

 function deleteEvent($id){

    $sqldal = "DELETE FROM `event` WHERE  `id` = $id";

    $result = $this->conn->query($sqldal);

    return $result;
}

// end deleteEvent function




function getEvent(){

    $eveData = array();

    $sql = "SELECT * FROM `event` ORDER BY id DESC";

    $insertEVenQuery = $this->conn->query($sql);

    while($row      = $insertEVenQuery->fetch_array()){    

    $eveData[]	    = $row;

    }

    return $eveData;

}




// display DESIGNATION

function EventdataById($id){
        
    $EMPData = array();
    $sql = "SELECT * FROM `event` WHERE `id` = '$id'";
    $empQuery   = $this->conn->query($sql);
    while($row  = $empQuery->fetch_array()){    
        $EMPData[]	= $row;
    }
    return $EMPData;

}

// end display




function eventUpdate($eventname, $description, $eventdate, $eventtime, $id, $c_image){

    $sqledit = "UPDATE `event` SET `event_name` = '$eventname', `event_date`= '$eventdate', `event_time`= '$eventtime', `image`= '$c_image', `description`= '$description' WHERE `event`.`id` = '$id'";

    $result = $this->conn->query($sqledit);

    return $result;

}




}
?>