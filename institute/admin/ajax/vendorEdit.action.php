<!DOCTYPE html>
<html>
<body>
<?php

require_once '../../_config/dbconnect.php';
require_once '../../classes/vendor.class.php';
$Vendor = new  Vendor();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    
    $name       = $_GET["name"];
    $address    = $_GET["address"];
    $mob_no     = $_GET["mob_no"];
    $date       = $_GET["date"];
    $id         = $_GET["id"];
    $status     = $_GET["status"];


    $update     = $Vendor->vendorEdit($name, $address, $mob_no, $date, $id, $status);
    
    if(!$update){
      echo  header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else{
      echo header('Location: ' . $_SERVER['HTTP_REFERER']);
    
    }
    
  }
   
?>

</body>
</html>