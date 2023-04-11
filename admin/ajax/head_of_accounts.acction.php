<?php

require_once '../../_config/dbconnect.php';

require_once '../../classes/head_of_accounts.class.php';

$Grocery = new  HeadOfAccounts();

    if(isset ($_POST["submit"])){

    $head_of_accounts_name     = $_POST["head_of_accounts"];

    $parent_name               = $_POST["parent_name"];

    $description               = $_POST["description"];

    $result                    = $Grocery->headofAccountsadd($head_of_accounts_name, $parent_name, $description);

    if($result){

        echo  header("Location: ../head_of_accounts.php");

    }

    else{

        echo   header("Location: ../head_of_accounts.php");
                

    }

}

if(isset ($_POST["updatedata"])){

    $head_of_accounts_name     = $_POST["head_of_accounts"];

    $parent_name               = $_POST["parent_name"];

    $description               = $_POST["description"];

    $id                        = $_POST["id"];

    $result                    = $Grocery->headofAccountsEdit($id, $head_of_accounts_name, $parent_name, $description);

    if($result){

        echo "<h1>Head Of Accounts Details Has Been Updated!<br><h1>";

    }
    
    else{

        echo "<h1>Head Of Accounts Details Has Been Updated Failed!<br><h1>";
                

    }
}
?>