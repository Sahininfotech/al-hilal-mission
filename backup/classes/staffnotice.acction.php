<!DOCTYPE html>
<html>
<head>


</head>
<body>
  <?php
  require_once '../class/staffdata.class.php';

  $employees = new  Cnstitute();

      if($_SERVER['REQUEST_METHOD'] == 'GET'){

          $id     = $_GET["id"];
        
          $name   = $_GET["name"];
      
          $notice = $_GET["notice"];
      
      $update=$employees->noticeupdate1($id, $name, $notice);
      
        }
      if($update){
        echo "<h1>message data send <br><h1>";
        }
        else{
        echo header("Location: http://localhost/institute/admin/staffnotice.php");

  }

      ?>

</body>
</html>