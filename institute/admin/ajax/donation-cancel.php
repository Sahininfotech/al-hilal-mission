
  <?php
  require_once '../../_config/dbconnect.php';
  require_once '../../classes/revenue.class.php';

    $Revenue = new  Revenue();

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

      $id    = $_GET["id"];
      
      $update = $Revenue->donationCancel($id);
      
    }
    
    if($update){
      ?>
        <script>alert('Donation Has Cancelled!');
        document.location='../revenue.php';
        </script>";
      <?php
    }
    else{
      ?>
        <script>alert('Donation Cancelation Failed!');
        document.location='../revenue.php';
        </script>";
      <?php
    }

  ?>