<!DOCTYPE html>
<html>
<head>


</head>
<body>
<?php
  require_once '../class/institutedetails.class.php';

  $expensesstatus = new  institudeDetails();

  if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $Id     = $_GET["id"];
    
    $update = $expensesstatus->deleteExamdata($Id);
    
  }

  if($update){
    echo "<script>alert('Exam Data Delete Sucessfull');document.location='http://localhost/institute/admin/exams.php'</script>";
  }
  else{
    echo "<script>alert('Exam Data Delete Not Sucessfull');document.location='http://localhost/institute/admin/exams.php'</script>";
  }

?>

</body>
</html>