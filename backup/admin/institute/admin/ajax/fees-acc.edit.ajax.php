<?php

require_once '../../_config/dbconnect.php';
require_once '../../classes/fees-accounts.class.php';

$FeesAccount = new  FeesAccount();
// if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    
// }

if (isset($_GET['data'])) {

    $accId  = $_GET['data'];

    if (isset($_POST['acc_name'])) {

        $accNewName = $_POST['acc_name'];
        $updated = $FeesAccount->updateAccname($accId, $accNewName);
        if ($updated) {
            echo '<script>alert("Account Name Updated!")</script>';
        }else {
            echo '<script>alert("Failed to Update!")</script>';
        }
    }

    $feeAcc = $FeesAccount->schowAccountById($accId);
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
    <title>Institute Management / Examination - NiceAdmin Bootstrap Template</title>
</head>

<body>

    <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <div class="card mb-0" style="box-shadow: none">
            <div class="card-body p-3">
                <h5 class="card-title d-flex justify-content-center p-0 mt-0 my-5"> Update Fees Account Name: </h5>
                <div class="row p-0 mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label"> Fees Account Name:</label>
                    <div class="col-sm-9">
                        <input type="text" maxlength="55" class="form-control" value="<?php echo $feeAcc[0]['account_name']; ?>"
                            readonly required>
                    </div>
                </div>
                <div class="row p-0 mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label"> New Name:</label>
                    <div class="col-sm-9">
                        <input type="text" maxlength="55" class="form-control" value=""
                            name="acc_name" required>
                    </div>
                </div>
                <div class="row  p-0 mb-3">
                    <div class="col-sm-12  d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>