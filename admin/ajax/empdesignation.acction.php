<?php
require_once '../../_config/dbconnect.php';

require_once '../../classes/stadetails.class.php';

$employee         = new  institute();

if(isset ($_POST["submitdata"])){

    $roleName     = $_POST["rolename"];

    $description  = $_POST["description"];  
    
    $code         = rand(10,9999);
    
    $roleId       = "ROLE".$code;

    $result       = $employee->empRoleInsert($roleId, $roleName, $description);


    if($result){

        header("Location: ../empdesignation.php");

    }else{

        header("Location: ../empdesignation.php");      

    }

}
?>