<?php
 session_start();
 $page ="add-new-staff";

 require_once '../../_config/dbconnect.php';
 require_once '../../classes/admin.class.php';
 require_once '../../classes/utility.class.php';
 require_once '../../classes/expenses.class.php';
 require_once '../../classes/employee.class.php';
 require_once '../../classes/vendor.class.php';
 require_once '../../classes/head_of_accounts.class.php';

 $grocery    = new HeadOfAccounts();
 $vendors    = new Vendor();
 $Employee   = new Employee();
 $Expenses   = new Expenses();
 $Utility    = new Utility();
 $Admin      = new Admin();

 $_SESSION['current-url'] = $Utility->currentUrl();

//  $expensesQuery=false;

  if(isset ($_POST["submit"])){
 // if($_SERVER['REQUEST METHOD'] == 'POST'){
    $bill_no        = $_POST["voucher_no"];
    $amount         = $_POST["amount"];
    $payment_type   = $_POST["payment_type"];
    $description    = $_POST["description"];
    $date           = $_POST["date"];
    $added_by       = $_POST["added_by"];
    
    $payment_id     = $_POST["payment_id"];
    $paidBySelect   = $_POST["paid-by-select"];
    $others_paid    = $_POST["others_paid"];
    $paidToSelect   = $_POST["paid-to-select"];
    $otherspaid_to  = $_POST["Otherspaid_to"];

    $accountsSelect = $_POST["accounts-select"];
    // $subcategory    = '';
    if (isset($_POST["sub-accounts-select"])) {

        $subcategory    = $_POST["sub-accounts-select"];

    }else{
        $subcategory    = $accountsSelect;
    }

    $status         = 1;

    if ($paidBySelect == 'Others') {
        $paidBy = $others_paid; 
    }
    
    if ($others_paid == '') {
        $paidBy = $paidBySelect; 
    }

    if ($paidToSelect == 'Otherspaid') {
        $paidTo = $otherspaid_to; 
    }
    
    if ($otherspaid_to == '') {
        $paidTo = $paidToSelect; 
    }
    
    //image uplod 
      $image            = $_FILES[ 'upload_bill' ][ 'name' ];
      $image_size       = $_FILES[ 'upload_bill' ][ 'size' ];
      $image_tmp_name   = $_FILES[ 'upload_bill' ][ 'tmp_name' ];
      $image_folter     = '../image/'.$image;
    //   echo $image_tmp_name; exit;

        move_uploaded_file( $image_tmp_name, $image_folter );

        $added = $Expenses->expensesInsert($bill_no, $amount, $payment_type, $description, $date ,$image, $status,$added_by,$payment_id, $paidBy, $paidTo, $subcategory);
      
        if($added){

            echo "<script> alert('Sucessfull');document.location='https://alhilalmission.in/admin/ajax/expenses.add.ajax.php' </script>";

         }else{

            echo "<script> alert('Expenses Data Insertion Failed');document.location='https://alhilalmission.in/admin/ajax/expenses.add.ajax.php' </script>";
       
        }
     }
      
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body style="background:white">
    <form method="POST" action="fees-acc.add.ajax.php" class="row needs-validation  m-0" novalidate>

        <div class="card m-0 px-0 mb-0" style="box-shadow: none">
            <div class="card-body p-3 pt-0">
                <h5 class="card-title d-flex justify-content-center p-0 mt-0 mb-3">
                    Add Accounts
                </h5>

                <div class="row m-0 p-0 mb-3">

                    <label for="inputText" class="col-sm-4 col-form-label">Account :</label>

                    <div class="col-sm-8">

                        <input type="text" maxlength="55" class="form-control" name="account_name" required>

                    </div>

                </div>

                <div class="row mb-3 p-0 m-0">

                    <div class="col-sm-12  d-flex justify-content-center align-items-center">

                        <button type="submit" name="add" class="btn btn-primary">Add

                        </button>

                    </div>

                </div>



            </div>

        </div>

    </form>


    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
    </script>



</body>

</html>