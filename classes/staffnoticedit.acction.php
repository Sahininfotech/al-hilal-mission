<!DOCTYPE html>
<html>
<head>


</head>
<body>
   <?php

      require_once '../class/staattenfuntion.php';

      $employees = new  Institute1();

         if($_SERVER['REQUEST_METHOD'] == 'GET'){

            $notice = $_GET["notice"];
            $name   = $_GET["name"];
            $id     = $_GET["id"];

            $update = $employees->staffMessageexpensesupdate($id, $name, $notice);
      }
         

      if(!$update){
         echo  header("Location: http://localhost/institute/admin/staffnotice.php");
         }
         else{
         echo "<h1>update data is sucessfull <br><h1>";
      
      }

   ?>

</body>
</html>