<?php

session_start();

require_once '../../_config/dbconnect.php';

require_once '../../classes/revenue.class.php';



$Revenue = new  Revenue();



  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    

    $name              = $_POST["name"];

    $address           = $_POST["address"];

    $amount            = $_POST["amount"];

    $status            = $_POST["status"];

    $id                = $_POST["id"];

    $pin_code          = $_POST["pin_code"];

    $payment_type      = $_POST["payment_type"];

    $date             = $_POST["date"];







    $payment_id = '';



   if ($payment_type != 'Cash') {

      $payment_id    = $_POST["payment_id"];

      

   }



   $paid_by       = $_POST["paid-by-select"];

   if ($paid_by == 'Others') {

      $paid_by   = $_POST['others_paid'];

   }

   


   
    $update = $Revenue->editdonation($name, $address, $amount, $status, $id,  $pin_code, $payment_type, $payment_id, $paid_by, $date);

    

    ?>

<input type="hidden" id="donationId" value="<?php echo $id; ?>">

    <?php

    if($update){

      ?>

      <script>

        alert('Donation Details Updated!');

        let id = document.getElementById('donationId').value;

        location.href = `donation-edit.ajax.php?data=${id}`; 

      </script>

      <?php

    }

    else{

      ?>

      <script>

        alert('Failed to update Donation Details.');

        let id = document.getElementById('donationId').value;

        location.href = `donation-edit.ajax.php?data=${id}`; 

      </script>

      <?php

    }

    

  }

   

?>



