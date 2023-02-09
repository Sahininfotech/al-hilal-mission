<?php

    require_once '../../_config/dbconnect.php';

    require_once '../../classes/expenses.class.php';



    $expenses   = new Expenses();

    



    if($_SERVER['REQUEST_METHOD'] == 'GET'){



        $id    = $_GET["id"];

        

        $update = $expenses->expensesActive($id);

        

      }

      

      if($update){

        echo "<script>alert('Bill Active Sucessfull');document.location='https://alhilalmission.in/admin/expenses.php'</script>";

      }

      else{

        echo "<script>alert('Bill Active Not Sucessfull');document.location='https://alhilalmission.in/admin/expenses.php'</script>";

      }

?>