<?php
session_start();
require_once '../../_config/dbconnect.php';
require_once '../../classes/fees-accounts.class.php';

    $FeesAccount = new  FeesAccount();


    if(isset ($_POST["add"])){

        $accountName   = $_POST["account_name"];
        $addedBy       = $_SESSION['user_name'];
        
        $added = $FeesAccount->addFeesAccount( $accountName, $addedBy); 
        
        if($added){
            ?>
            <script>
                alert("Account Added!");
                document.location = "../fees-accounts.php";
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("Failed to add new account!");
                document.location = "../fees-accounts.php";
            </script>
            <?php
        }

    }
    
?>