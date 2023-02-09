<?php

  require_once '../../_config/dbconnect.php';

  require_once '../../classes/revenue.class.php';

  $revenues   = new Revenue();



  if($_SERVER['REQUEST_METHOD'] == 'GET'){



        $id    = $_GET["id"];

        

        $update = $revenues->donationactive($id);

        

  }

      

  if($update){

        echo "<script>alert('Donation Data Active Sucessfull');document.location='https://alhilalmission.in/admin/revenue.php'</script>";

  }

  else{

        echo "<script>alert('Donation Data Active Not Sucessfull');document.location='https://alhilalmission.in/admin/revenue.php'</script>";

  }

?>