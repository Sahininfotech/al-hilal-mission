<?php
require_once '../../_config/dbconnect.php';
require_once '../../classes/employee.class.php';

$StafftDetails = new Employee();

    $delete=$StafftDetails->deletenotice($_GET["id"]);
  
  
    if($delete){
      echo "<script>alert('Notice Deleted!');
               document.location = '../notice.php';
           </script>";
   }else{
     echo "<script>
                 alert('Notice Deletion Failed!');
                 document.location = '../notice.php';
           </script>";
 }

?>