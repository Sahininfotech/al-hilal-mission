<?php
require_once '../../_config/dbconnect.php';
require_once '../../classes/revenue.class.php';

$Revenue = new Revenue();

  if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $id    = $_GET["id"];    
    $update = $Revenue->otherRevenueCancel($id);
      
  }
    
    if($update){
      echo "<script>
                alert('Revenue Cancelled!');
                document.location = '../revenue.php';
            </script>";
    }
    else{
      echo "<script>
              alert('Revenue Cancelation Failed!');
              document.location = '../revenue.php';
            </script>";
    }

  ?>