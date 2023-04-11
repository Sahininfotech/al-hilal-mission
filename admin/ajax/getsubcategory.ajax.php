<?php
require_once '../../_config/dbconnect.php';
require_once '../../classes/head_of_accounts.class.php';

$grocery    = new HeadOfAccounts();

if (isset($_GET["subcategory"])) {
   $subcategory = $_GET["subcategory"];
    $data =$grocery->subCategory($subcategory);                          
    foreach($data as $rows){   
      
        echo '<option data-invoice="'.$subcategory.'" data-batch="'.$rows['category'].'" value="'.$rows['category_id'].'">'.$rows['category'].'</option>';
    }
    // return $data;

}
?>