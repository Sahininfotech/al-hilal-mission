<!DOCTYPE html>
<html>
<head>


</head>
<body>
  <?php
    require_once '../class/register.class.php';

    $employees = new  institute();

        if($_SERVER['REQUEST_METHOD'] == 'GET'){
      
        $password = $_GET["password"];
    
        $id       = $_GET["id"];

        $update   = $employees->updatepassword($id, $password);

        }

      if(!$update){
        echo "<h1>update data is not sucessfull <br><h1>";
        }
        else{
        echo header("Location: http://localhost/institute/admin/users-profile.php");

    }

  ?>

</body>
</html>