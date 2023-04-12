<?php
require_once '../../_config/dbconnect.php';
require_once '../../classes/employee.class.php';

$Employee = new  Employee();
 
        $approved          = $_POST["approved"];
        $user_id           = $_POST["id"];
      
        $update        = $Employee->featureUpdate($user_id, $approved);

        // if($update){
        //     echo "save";
        // }

?>