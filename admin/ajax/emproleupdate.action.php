<?php
require_once '../../_config/dbconnect.php';

require_once '../../classes/stadetails.class.php';

$empRole = new institute();

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $RoleName   = $_POST["rolename"];

    $description = $_POST["description"];

    $id          = $_POST["id"];

    $update      = $empRole->Roleupdate($RoleName, $description, $id);

    if(!$update){

      header("Location: ../empdesignation.php");

    }

    else{

      echo "<h1>Employee Designation Has Been Updated! <br><h1>";

    }

  }


?>