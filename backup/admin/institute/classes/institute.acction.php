<!DOCTYPE html>
<html>
<head>


</head>
<body>
<?php
  require_once '../class/institutedetails.calss.php';

  $institutedtailsclass = new  institudeDetails();

  $result=$institutedtailsclass->update($email,  $id, $contact_number);

  if($result){
    echo  header("Location: http://localhost/institute/admin/institute.details.php ");
  }
  else{
    echo "update data not sucessfull <br>";
  
  }


 //  header("Location: http://localhost/Mmy1stproject/display.php");
?>

</body>
</html>