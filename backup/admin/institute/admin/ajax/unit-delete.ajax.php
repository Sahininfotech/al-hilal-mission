<?php
require_once '../../_config/dbconnect.php';
require_once '../../classes/studdetails.class.php';

$StudentDetails = new StudentDetails();

  if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $Id = $_GET["id"];
    $update=$StudentDetails->deletemark($Id);
    
  }
  if($update){
    echo "<script>alert('Student mark has been deleted!')";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  } else{
    echo "<script>alert('Student mark deletaion failed!')";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }

?>