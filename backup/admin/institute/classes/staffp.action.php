<!DOCTYPE html>
<html>
<head>


</head>
<body>
<?php
  require_once '../class/staffdata.class.php';

  $staffstatus = new  Cnstitute();

      if($_SERVER['REQUEST_METHOD'] == 'GET'){

            $id     = $_GET["id"];
      
            $update = $staffstatus->staffA($id);

      }
      
    if($update){
           echo "<script>alert('Student Data Cancel Sucessfull');document.location='http://localhost/institute/admin/staffdetails.php'</script>";
      }
      else{
          echo "<script>alert('Student Data Cancel Not Sucessfull');document.location='http://localhost/institute/admin/staffdetails.php'</script>";
    }
    
?>

</body>
</html>

