<!DOCTYPE html>
<html>
<head>


</head>
<body>
   <?php
      require_once '../class/studdetails.class.php';

      $expensesstatus = new  StudentDetails();

          if($_SERVER['REQUEST_METHOD'] == 'GET'){

              $id = $_GET["id"];
        
              $update=$expensesstatus->studetnA($id);
                
          }

          if($update){
              echo "<script>alert('Student Data Cancel Sucessfull');document.location='http://localhost/institute/admin/studentdetails.php'</script>";
          }
          else{
              echo "<script>alert('Student Data Cancel Not Sucessfull');document.location='http://localhost/institute/admin/studentdetails.php'</script>";
          }

  ?>

</body>
</html>


