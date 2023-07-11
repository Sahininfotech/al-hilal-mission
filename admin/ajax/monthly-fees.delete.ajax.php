<?php
require_once '../../_config/dbconnect.php';
require_once '../../classes/fees-accounts.class.php';

$FeesAccount = new  FeesAccount();
$deleted = $FeesAccount->deleteMonFeesStur($_GET['Feesdata']);

if ($deleted) {
    ?>
    <script>
        alert("Structure Deleted!");
        document.location = "../fees-accounts.php";
    </script>
    <?Php
}else {
    ?>
    <script>
        alert("Failed to delete!");
        document.location = "../fees-accounts.php";
    </script>
    <?php
}

?>