
<?php
  require_once '../../_config/dbconnect.php';
  require_once '../../classes/admin.class.php';

  $employees = new  Admin();

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $password = $_POST["password"];

    $id       = $_POST["id"];

    $update   = $employees->updatepassword($id, $password);

  }

  if(!$update){
  echo "<h1>Password Updated!<br><h1>";
  }
  else{
  echo header("Location: users-profile.php");

  }

?>