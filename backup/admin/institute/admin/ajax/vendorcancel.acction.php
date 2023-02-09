<!DOCTYPE html>
<html>
<body>
  <?php
require_once '../class/vendor.class.php';
$vendors = new  expensesvendor();

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

      $id    = $_GET["id"];
      
      $update = $vendors->updatecancel($id);
      
    }
    
    if($update){
      echo "<script>alert('Vendor Data Cancel Sucessfull');document.location='http://localhost/institute/admin/vendor.php'</script>";
    }
    else{
      echo "<script>alert('Vendor Data Cancel Not Sucessfull');document.location='http://localhost/institute/admin/vendor.php'</script>";
    }

  ?>

</body>
</html>