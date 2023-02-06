<?php
 require_once '../../_config/dbconnect.php';
 require_once '../../classes/vendor.class.php';
  $vendors = new  Vendor();

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

      $id    = $_GET["id"];
      
      $update = $vendors->updatecancel($id);
      
    }
    
    if($update){
      echo "<script>alert('Vendor Data Cancel Sucessfull');document.location='../vendor.php'</script>";
    }
    else{
      echo "<script>alert('Vendor Data Cancel Not Sucessfull');document.location='../vendor.php'</script>";
    }
?>