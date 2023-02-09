<?php
require_once '../../_config/dbconnect.php';
require_once '../../classes/employee.class.php';
  
  $employees = new  Employee();

  if(isset ($_GET["submit"])){

    $name           = $_GET["name"];
    $email          = $_GET["email"];
    $address        = $_GET["address"];
    $contactno      = $_GET["contactno"];
    $gender         = $_GET["gender"];
    $qualification  = $_GET["qualification"];
    $experience     = $_GET["experience"];
    $joinin_date    = $_GET["joinin_date"];
    $post_office    = $_GET["post_office"];
    $sdo_or_bdo     = $_GET["sdo_or_bdo"];
    $police_station = $_GET["police_station"];
    $district       = $_GET["district"];
    $pin_code       = $_GET["pin_code"];
    $state          = $_GET["state"];
    $status         =  $_GET["status"];
    $Password       =  $_GET["Password"];
    $Password1      =  $_GET["Password1"];


    $hash           = password_hash($Password, PASSWORD_DEFAULT);
    $hash1          = password_hash($Password1, PASSWORD_DEFAULT);

    if ($Password == $Password1) {

      $result = $employees->staffInsert($name, $email, $address, $contactno, $gender, $qualification, $experience, $joinin_date, $post_office, $sdo_or_bdo, $police_station, $district, $pin_code, $state, $status, $hash, $hash1);
      
      if($result){
        ?>
        <script>
          alert("New Employee Added!");
          window.location.href = "../addnewstaff.php";
        </script>
        <?php
      // header("Location: http://localhost/institute/admin/addnewstaff.php");
      // exit;
      }else{
        ?>
        <script>
          
          alert("New employee insertion failed!");
          window.location.href = "../addnewstaff.php";
        </script>
        <?php
        // header("Location: http://localhost/institute/admin/addnewstaff.php");
        // exit;
      }
    } else {
      ?>
        <script>
          alert("You entered two different passwords");
          document.location = "../addnewstaff.php";
        </script>
      <?php

    }


  }


?>

