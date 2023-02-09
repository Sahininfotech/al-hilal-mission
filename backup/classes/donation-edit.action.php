<?php
  session_start();
require_once '../../_config/dbconnect.php';
require_once '../../classes/revenue.class.php';

$Revenue = new  Revenue();

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $name              = $_POST["name"];
    $address           = $_POST["address"];
    $amount            = $_POST["amount"];
    $status            = $_POST["status"];
    $id                = $_POST["id"];
    $paying            = $_POST["paying"];
    $others_paying     = $_POST["others_paying"];
    $pin_code          = $_POST["pin_code"];
    $payment_type      = $_POST["payment_type"];
    $payment_id        = $_POST["payment_id"];
   

    $update = $Revenue->editdonation($name, $address, $amount, $status, $id, $paying, $others_paying, $pin_code, $payment_type, $payment_id);
    
    if($update){
      ?>
      <script>
        alert('Donation Details Updated!');
      </script>
      <?
      echo "Location: donation-edit.ajax.php?data=.$id</script>";
    }
    else{
      ?>
      <script>
        alert('Failed!');
      </script>
      <?php
    
      echo "Location: donation-edit.ajax.php?data=.$id</script>";
      // echo "<h1>update data is sucessfull <br><h1>";
    
    }
    
  }
   
?>