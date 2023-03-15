<?php
require_once '../../_config/dbconnect.php';
require_once '../../classes/gallery.class.php';

$Photos = new  Photos();

  if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $Id = $_GET["id"];
    $img = $_GET["img"];

    $path = '../image/'.$img;
    unlink($path);

    $update=$Photos->deletePhoto($Id);
    
  }
  if($update){
    echo "<script>alert('Photo has been deleted!');
    document.location = '../photos.php'</script>";
  } else{
    echo "<script>alert('Photo deletaion failed!');
    document.location = '../photos.php'<script>";
  }

?>