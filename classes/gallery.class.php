<?php

class Photos extends DatabaseConnection{


   // inshat dada start w


    function photoInsert($image, $upload_pageName){

        $sql = "INSERT INTO `gallery` (`photos`, `upload_pageName`, `added_on`) VALUES ('$image', '$upload_pageName', now())";

        $insertEmpQuery = $this->conn->query($sql);

        return "save";

    }

    

function displaydata(){

    $empData = array();

    $sql = "SELECT * FROM `gallery` order by id asc";

    $insertVenQuery = $this->conn->query($sql);

    while($row      = $insertVenQuery->fetch_array()){    

    $empData[]	    = $row;

    }

    return $empData;

}

// end display



function getPhoto($pagename){

    $empData = array();

    $sql = "SELECT * FROM `gallery` WHERE `gallery`.`upload_pageName` = '$pagename'";

    $insertVenQuery = $this->conn->query($sql);

    while($row      = $insertVenQuery->fetch_array()){    

    $empData[]	    = $row;

    }

    return $empData;

}


   // photo delete 

   function deletePhoto($Id){



    $sqldal = "DELETE FROM `gallery` WHERE  `gallery`.`id` = '$Id'";



    $result1 = $this->conn->query($sqldal);



    return $result1;



}

// end deleteDocCat



}
?>