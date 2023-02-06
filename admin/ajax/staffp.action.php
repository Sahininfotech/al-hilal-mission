<?php
  require_once '../../_config/dbconnect.php';
  require_once '../../classes/employee.class.php';

  $staffstatus = new  Employee();

  if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $id     = $_GET["id"];

    $update = $staffstatus->staffA($id);

  }

  if($update){
  echo "<script>alert('Staff Data Cancel Sucessfull');document.location='../staffdetails.php'</script>";
  }
  else{
  echo "<script>alert('Staff Data Cancel Not Sucessfull');document.location='../staffdetails.php'</script>";
  }

?>

