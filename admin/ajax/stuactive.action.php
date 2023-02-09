<?php

    require_once '../../_config/dbconnect.php';
    
     require_once '../../classes/studdetails.class.php';
     
      $expensesstatus = new  StudentDetails();

          if($_SERVER['REQUEST_METHOD'] == 'GET'){

              $id = $_GET["id"];
        
              $update=$expensesstatus->studentactive($id);
              
          }

          if($update){
              echo "<script>alert('Student Data Active Sucessfull');document.location='https://alhilalmission.in/admin/studentdetails.php'</script>";
          }
          else{
              echo "<script>alert('Student Data Active Not Sucessfull');document.location='https://alhilalmission.in/admin/studentdetails.php'</script>";
          }

?>