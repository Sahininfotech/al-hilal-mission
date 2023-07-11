<?php

require_once '../../_config/dbconnect.php';

require_once '../../classes/institutedetails.class.php';



$expensesstatus = new  InstituteDetails();



  if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $Id = $_GET["id"];
    $img = $_GET["img"];

    $path = '../image/'.$img;
    unlink($path);

    $update=$expensesstatus->deleteClassdata($Id);

    

  }

  if($update){

    echo "<script>alert('Class has been deleted!');

    document.location = '../classes.php'</script>";

  } else{

    echo "<script>alert('Class deletaion failed!');

    document.location = '../classes.php'<script>";

  }



?>