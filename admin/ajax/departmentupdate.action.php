<?php







require_once '../../_config/dbconnect.php';



require_once '../../classes/department.class.php';







  $Departments = new  Departments();







  if($_SERVER['REQUEST_METHOD'] == 'POST'){



   



    $department_name = $_POST["department_name"];



    $description     = $_POST["description"];



    $id     = $_POST["id"];







    $update          = $Departments->updateDepartment($department_name, $description, $id);



    



    if(!$update){



      header("Location: departments.php");



    }



    else{



      echo "<h1>Department Has Been Updated!<br><h1>";



    }







  }



   



?>