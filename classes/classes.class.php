<?php





class Classes extends DatabaseConnection{



    

    // display start w

    function classesList(){

        

        $clsData = array();

        $sql = "SELECT * FROM `class`";

        $empQuery   = $this->conn->query($sql);

        while($row  = $empQuery->fetch_array()){    

            $clsData[]	= $row;

        }

        return $clsData;



    }// end display



    function classesdata($class){
        
        $clsData = array();
        $sql = "SELECT * FROM `class` WHERE `id` = '$class'";
        $empQuery   = $this->conn->query($sql);
        while($row  = $empQuery->fetch_array()){    
            $clsData[]	= $row;
        }
        return $clsData;

    }



}



?>