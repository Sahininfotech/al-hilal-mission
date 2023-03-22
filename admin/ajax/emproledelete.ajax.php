<?php
require_once '../../_config/dbconnect.php';

require_once '../../classes/stadetails.class.php';

$empRole = new institute();

    $Id     = $_GET["id"];

    $update = $empRole->deleteEmpRole($Id);
  
  if($update){
    echo "<script>alert('Employee Designation Has Been Deleted!');
    document.location = '../empdesignation.php'</script>";
  } else{
    echo "<script>alert('Employee Designation Deletaion Failed!');
    document.location = '../empdesignation.php'<script>";
  }

?>