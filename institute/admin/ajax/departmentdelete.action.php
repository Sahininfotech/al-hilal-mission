<?php



require_once '../../_config/dbconnect.php';

require_once '../../classes/department.class.php';



  $Departments = new  Departments();



  if($_SERVER['REQUEST_METHOD'] == 'GET'){



    $Id     = $_GET["id"];

    

    $update = $Departments->deleteDepartment($Id);

    

  }

  if($update){

    echo "<script>alert('Deparment Deleted!');document.location='../departments.php'</script>";

  }else{

    echo "<script>alert('Deparment Deletion failed!');document.location='../departments.php'</script>";

  }



?>