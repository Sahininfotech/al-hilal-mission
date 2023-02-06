
<?php

require_once '../../_config/dbconnect.php';
require_once '../../classes/expenses.class.php';

$Expenses = new Expenses();


 if(isset($_POST['update'])){

   $id            = $_POST["id"];
   $bill_no       = $_POST["bill_no"];
   $amount        = $_POST["amount"];
   $payment_type  = $_POST["payment_type"];

   $payment_id = '';

   if ($payment_type != 'Cash') {
      $payment_id    = $_POST["payment_id"];
      
   }

   $paid_by       = $_POST["paid-by-select"];
   if ($paid_by == 'Others') {
      $paid_by   = $_POST['others_paid'];
   }

   $purpore       = $_POST["purpore"];
   $date          = $_POST["date"];
   
   $old_img       = $_POST['updateimg'];

   $new_image     = $_FILES['upload_bill']['name'];
   $img_tmp_name  =$_FILES['upload_bill']['tmp_name'];
   $image_folter  = '../image/'.$_FILES['upload_bill']['name'];



   if($new_image != ''){
      $c_image = '../image/'.$_FILES['upload_bill']['name'];
   }else{
      $c_image = $old_img;
   }


   move_uploaded_file( $img_tmp_name, $image_folter );

   $update = $Expenses->expensesupdate($id, $purpore, $bill_no, $amount, $payment_type, $date, $c_image, $payment_id, $paid_by );

   if($update){

      echo "<h1>Expenses Details Updated!<br><h1>";
  
   }else{
      echo "<h1>Expenses Details Updated!<br><h1>";
   }
 }




    ?>