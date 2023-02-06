<!DOCTYPE html>
<html>
<body>
  <?php
   require_once '../../_config/dbconnect.php';
   require_once '../../classes/revenue.class.php';
   $revenues   = new Revenue();

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

      $id    = $_GET["id"];
      
      $update = $revenues->studentfeesactive($id);
      
    }
    
    if($update){
      echo "<script>alert('Data Active Sucessfull');document.location='https://alhilalmission.in/admin/revenue.php'</script>";
    }
    else{
      echo "<script>alert('Data Active Not Sucessfull');document.location='https://alhilalmission.in/admin/revenue.php'</script>";
    }

  ?>

</body>
</html>