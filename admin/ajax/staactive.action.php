<?php

    require_once '../../_config/dbconnect.php';

    require_once '../../classes/employee.class.php';

    $expensesstatus = new  Employee();

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

        $id = $_GET["id"];

        $update=$expensesstatus->staffactive($id);

    }

    if($update){
    echo "<script>alert('Staff Data Active Sucessfull');document.location='../staffdetails.php'</script>";
    }
    else{
    echo "<script>alert('Staff Data Active Not Sucessfull');document.location='../staffdetails.php'</script>";
    }

?>


