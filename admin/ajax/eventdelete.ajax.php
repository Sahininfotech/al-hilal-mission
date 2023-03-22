<?php
require_once '../../_config/dbconnect.php';

require_once '../../classes/events.class.php';

$Events = new  Event();

    $Id     = $_GET["id"];

    $update = $Events->deleteEvent($Id);
  
  if($update){
    echo "<script>alert('Event Has Been Deleted!');
    document.location = '../events.php'</script>";
  } else{
    echo "<script>alert('Event Deletaion Failed!');
    document.location = '../events.php'</script>";
  }

?>