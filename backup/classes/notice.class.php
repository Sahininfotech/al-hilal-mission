<?php


class Notice extends DatabaseConnection{


    
    // display start W
    function noticedisplaydata(){

        $data = array();
        $sql = "SELECT * FROM `forum` ORDER BY id DESC LIMIT 2";
        // staff_notice FROM `forum` ORDER BY staff_notice DESC LIMIT 1;
        $empQuery   = $this->conn->query($sql);

        while($row  = $empQuery->fetch_array()){    

        $data[]	= $row;
        }

        return $data;

    }
    // end display



        // display start W

        function showEmpNotice(){

            $data   = array();
            $sql = "SELECT * FROM `forum_staff` ORDER BY id DESC LIMIT 3";
            $empQuery   = $this->conn->query($sql);
            while($row  = $empQuery->fetch_array()){    
                $data[]	= $row;
            }
            return $data;
    
        }
    
        // end display
    
    


          //search start w

    function noticByDate($fromDate, $toDate){

        $data = array();
        $sql = "SELECT * FROM `forum` WHERE concat(`date`) between '$fromDate' to '$toDate'";
        $res = $this->conn->query($sql);
        if ($res->num_rows > 0 ) {
            while ($result = $res->fetch_array()) {
                $data[] = $result;
            }
        }
        return $data;

    }
    
    // end search function






}



?>