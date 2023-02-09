<?php

require_once '../../_config/dbconnect.php';

require_once '../../classes/expenses.class.php';



$Expenses = new Expenses();



  if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $id    = $_GET["id"];  

    $update = $Expenses->expenseCancel($id);

      

  }

    

  if($update){

    echo "<script>alert('Bill Cancelled Sucessfully');

    document.location = '../expenses.php'</script>";

  }else{

    echo "<script>alert('Sorry, Failed to cancel!');

    document.location = '../expenses.php'</script>";

  }

?>