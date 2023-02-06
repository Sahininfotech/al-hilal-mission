<?php

require_once '../../_config/dbconnect.php';
require_once '../../classes/revenue.class.php';
require_once '../../classes/employee.class.php';

$Employee = new Employee();

$Revenue = new  Revenue();


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $name               = $_POST["name"];
    $class              = $_POST["class"];
    $amount             = $_POST["amount"];
    $id                 = $_POST["id"];
    $status             = $_POST["status"];
    $payment_type       = $_POST["payment_type"];
    $date               = $_POST["date"];

    $payment_id = '';

    if ($payment_type != 'Cash') {
       $payment_id    = $_POST["payment_id"];
       
    }
 
    $paid_by       = $_POST["paid-by-select"];
    if ($paid_by == 'Others') {
       $paid_by   = $_POST['others_paid'];
    }

    $update = $Revenue->updateStudentFees($name, $class, $amount, $id, $status, $payment_type, $date, $payment_id, $paid_by);

    if($update){
      ?>
<script>
alert('Fees Details Updated!');
</script>
<?php
    }else{
      ?>
<script>
alert('Failed!');
</script>
<?php
    }
    
  }

$updatePage = $Revenue->feesDetailsById($_GET['editdata']);

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
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet" />
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet" />
    <title>Institute Management / Examination - NiceAdmin Bootstrap Template</title>
</head>

<body style="background:white;">
    <?php
               foreach ($updatePage as $showrevenue) {
                $showname = $showrevenue['name'];
                $showroll_no = $showrevenue['roll_no'];
                $showclass = $showrevenue['class'];
                $showamount = $showrevenue['amount'];
                $showstatus = $showrevenue['status'];
                $showid = $showrevenue['id'];
                $paidBy             = $showrevenue['paid_by'];
                $showpayment_type = $showrevenue['payment_type'];
                $showpayment_id = $showrevenue['payment_id'];
                $showdate = $showrevenue['date'];
               }?>

    <form method="POST" action="<?php echo $_SERVER['REQUEST_URI'];?>">
        <div class="card p-0 mb-0" style="box-shadow: none">
            <div class="card-body pt-0 p-3">
                <input type="hidden" class="form-control" value="<?php echo $showid; ?>" name="id">
                <h5 class="card-title d-flex justify-content-center p-0 mt-0 mb-3">
                    Student Edit
                </h5>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Name :</label>
                    <div class="col-sm-10">
                        <input type="text" maxlength="55" class="form-control" value="<?php echo $showname; ?>"
                            name="name" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Roll :</label>
                    <div class="col-sm-10">
                        <input type="text" maxlength="55" class="form-control" value="<?php echo $showroll_no; ?>"
                            required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Class :</label>
                    <div class="col-sm-10">
                        <input type="text" maxlength="55" class="form-control" value="<?php echo $showclass; ?>"
                            name="class" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Amount :</label>
                    <div class="col-sm-10">
                        <input type="text" maxlength="55" class="form-control" value="<?php echo $showamount; ?>"
                            name="amount" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Payment :</label>
                    <div class="col-sm-4">
                        <select class="form-select" name="payment_type" onchange="selectpayment(this.value)">
                            <option selected value="<?php echo $showpayment_type; ?>"><?php echo $showpayment_type; ?>
                            </option>
                            <option value="Cash">Cash</option>
                            <option value="Credit">Credit</option>
                            <option value="UPI">UPI</option>
                            <option value="Credit-Card">Credit-Card</option>
                            <option value="Debit-Card">Debit-Card</option>
                            <option value="Internet-Banking">Internet-Banking</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <div class=" row <?php echo ($showpayment_type == 'Cash') ? ( 'd-none'):('d') ?> "
                            id="payment_id_bx">
                            <label for="inputAddress" class="col-sm-4 col-form-label">Payment Id:</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" value="<?php echo $showpayment_id; ?>"
                                    name="payment_id">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Paid By :</label>
                    <?php
                // echo gettype($paidBy) != 'integer' ? 'selected' : 'none';
                ?>
                    <div class="col-sm-4">
                        <?php
                    // echo $paidBy;
                    ?>
                        <select class="form-select" id="form-select" onChange="selectOthers(this.value)"
                            name="paid-by-select" required>
                            <?php
                                echo '<option  style="color: blue;">'.$paidBy.'</option>';
                        ?>
                            <option value="Others" style="color: blue;">Others</option>
                            <?php
                                $emps = $Employee->showEmployees();
                                foreach ($emps as $emp) {
                                    $empId   = $emp['id'];
                                    $empName = $emp['name'];
                                    echo ' <option value="'.$empId.'">'.$empName.'</option>';
                                }
                        ?>
                        </select>
                    </div>
                    <div class="col-sm-6 <?php echo gettype($paidBy) != 'integer' ? 'd-none' : 'd-block'; ?>"
                        id="others-staff">
                        <div class="row">
                            <label for="inputText" class="col-sm-4 col-form-label">Name :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="others_paid"
                                    value="<?php echo $paidBy; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Status :</label>
                    <div class="col-sm-10">
                        <input type="text" maxlength="55" class="form-control" value="<?php echo $showstatus; ?>"
                            name="status" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputaddress" class="col-sm-2 col-form-label">Date :</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="edit2" value="<?php echo $showdate; ?>" name="date">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-12  d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Vendor JS Files -->
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.min.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->

    <script>
    function selectpayment(mode) {
        // alert(mode);
        var pymntBx = document.getElementById('payment_id_bx');
        if (mode != "Cash") {
            pymntBx.classList.remove('d-none');
        } else {
            pymntBx.classList.add('d-none');
        }
    }


    const selectOthers = (staff) => {

        var staffBx = document.getElementById('others-staff');
        if (staff == "Others") {
            staffBx.classList.remove('d-none');
        } else {
            staffBx.classList.add('d-none');
        }

    }
    </script>
</body>

</html>