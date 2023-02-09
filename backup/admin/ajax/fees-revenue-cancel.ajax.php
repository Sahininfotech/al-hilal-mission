<?php
require_once '../../_config/dbconnect.php';
require_once '../../classes/revenue.class.php';

$Revenue = new Revenue();

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

      $id    = $_GET["id"];
      
      $update = $Revenue->studentfeescancel($id);
      
    }
    
    if($update){
      ?>
      <script>
              alert('Fees cancelled!');
              document.location = '../revenue.php';
      </script>
      <?php
    }else{
      ?>
      <script>
              alert('Fees cancelation failed!');
              document.location = '../revenue.php';
      </script>
      <?php
    }

?>