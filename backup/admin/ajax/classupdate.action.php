

<?php

require_once '../../_config/dbconnect.php';

require_once '../../classes/institutedetails.class.php';



$institudeclass = new  InstituteDetails();



  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    

    $classname   = $_POST["classname"];

    $description = $_POST["description"];

    $id = $_POST["id"];



    $update      = $institudeclass->classupdate($classname, $description, $id);

  

    if(!$update){

      header("Location: ../classes.php");

    }

    else{

      echo "<h1> Data is Successfully Updated. <br><h1>";

    }



  }

    

?>