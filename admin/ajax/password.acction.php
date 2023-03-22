
<?php
  require_once '../../_config/dbconnect.php';
  require_once '../../classes/admin.class.php';

  $employees = new  Admin();

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $password = $_POST["confirm_password"];

    $id       = $_POST["id"];
    $hashpass = password_hash($password, PASSWORD_DEFAULT);
    $update   = $employees->updatepassword($id, $hashpass);

  }

  if(!$update){
    echo "<script>alert('Password Not Updated!');
    document.location = '../users-profile.php'</script>";
  } else{
    echo "<script>alert('Password Updated!');
    document.location = '../users-profile.php'</script>";
  }

?>