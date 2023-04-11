<?php
require_once '../../_config/dbconnect.php';

require_once '../../classes/head_of_accounts.class.php';

$account = new  HeadOfAccounts();

  if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $Id     = $_GET["id"];

    $update = $account->delete($Id);

  }

  if($update){

    echo "<script>alert('Head Of Accounts Deleted!');document.location='../head_of_accounts.php'</script>";

  }else{

    echo "<script>alert('Head Of Accounts Deletion failed!');document.location='../head_of_accounts.php'</script>";

  }



?>