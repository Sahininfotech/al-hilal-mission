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

document.location = "account.add.ajax.php";
</script>

<?php

        }else{

            ?>

<script>
alert("Failed to add new account!");

document.location = "account.add.ajax.php";
</script>

<?php

        }



    }









    if(isset ($_POST["submitdata"])){



        $class_id      = $_POST["class_id"];

        $purposes       = $_POST['purpose'];

        $amounts        = $_POST['amount'];



        

      for ($i = 0; $i < count($purposes); $i++)  {

        for ($i = 0; $i < count($amounts); $i++)  {


           $amount = $amounts[$i];
           $purpose = $purposes[$i];

    
        $addfee = $FeesAccount->classFees($class_id, $purpose, $amount); 

    }}

        if(!$addfee){

            ?>

<script>
alert("Fee Added!");

document.location = "feesstructure.add.ajax.php";
</script>

<?php

        }else{

            ?>

<script>
alert("Failed to add new Fee!");

document.location = "feesstructure.add.ajax.php";
</script>

<?php

        }



        }








        if(isset ($_POST["submitmonthfees"])){

            $className   = $_POST["class_id"];
    
            $amount      = $_POST['amount'];

            $added_by    = $_POST['added_by'];
       
            $added = $FeesAccount->addMonthlyFees($className, $amount, $added_by); 
    
            if($added){

            ?>

            <script>
            alert("Account Added!");

            document.location = "monthlyfees.add.ajax.php";
            </script>

            <?php

            }else{

            ?>

            <script>
            alert("Failed to add new account!");

            document.location = "monthlyfees.add.ajax.php";
            </script>

            <?php
    
            }
    
    
    
        }
    





    

?>