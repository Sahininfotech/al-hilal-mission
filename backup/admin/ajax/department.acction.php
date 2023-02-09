<?php

require_once '../../_config/dbconnect.php';

require_once '../../classes/department.class.php';

  $Departments = new  Departments();





  if(isset ($_GET["submit"])){



   // if($_SERVER['REQUEST METHOD'] == 'POST'){



    $department_name = ($_GET["department_name"]);

    $description     = ($_GET["description"]);

      

    $result          = $Departments->addDepartment( $department_name, $description);



    if($result){

      echo  header("Location: https://alhilalmission.in/admin/departments.php");

    }

    else{

      echo   header("Location: https://alhilalmission.in/admin/departments.php");

              

    }

  }





     

 

?>

   