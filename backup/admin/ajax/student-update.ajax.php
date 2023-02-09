<?php
require_once '../../_config/dbconnect.php';
require_once '../../classes/studdetails.class.php';

$StudentDetails = new StudentDetails();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    
    $name       = $_GET["name"];
    $status    = $_GET["status"];
    $email    = $_GET["email"];
    $class      = $_GET["class"];

    $id         = $_GET["id"];
    $address         = $_GET["address"];

    $update     = $StudentDetails->studentaction($name, $status, $email, $class, $address, $id);
    
    if(!$update){
      echo header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else{
      echo "<h1>update data is sucessfull <br><h1>";
    
    }
    
  }
   
?>
