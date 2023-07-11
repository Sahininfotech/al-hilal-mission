<?php



require_once '../../_config/dbconnect.php';

require_once '../../classes/revenue.class.php';

require_once '../../classes/employee.class.php';



$Employee = new Employee();

$Revenue = new  Revenue(); 



$showDonation = $Revenue->showDonationById($_GET['data']);

    

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

    <title>Document</title>

</head>

<body style="background:white;">



    <?php

               foreach ($showDonation as $donation) {



                $showname       = $donation['name'];

                $showaddress    = $donation['address'];

                $showamount     = $donation['amount'];

                $showstatus     = $donation['status'];

                $showid         = $donation['id'];

                $paidBy         = $donation['paid_by'];

                $showdescription= $donation['description'];

                $showpin_code   = $donation['pin_code'];

                $showpayment_type = $donation['payment_type'];

                $showpayment_id = $donation['payment_id'];
                $showdate = $donation['date'];
                $datetring = date("d-m-Y", strtotime($showdate));
               }

            ?>

    <form method="POST" action="donation-edit.action.php">

        <div class="card p-0 mb-0" style="box-shadow: none">

            <div class="card-body pt-0 p-3">

                <input type="hidden" class="form-control" value="<?php echo $showid; ?>" name="id">

                <h5 class="card-title d-flex justify-content-center text-center mt-0 p-0 mb-3"> Donation

                    Edit Form</h5>

                <div class="row mb-3">

                    <label for="inputAddress" class="col-sm-2 col-form-label">Name :</label>

                    <div class="col-sm-10">

                        <input type="text" class="form-control" value="<?php echo $showname; ?>" name="name">

                    </div>

                </div>



                <div class="row mb-3">

                    <label for="inputAddress" class="col-sm-2 col-form-label">Address :</label>

                    <div class="col-sm-10">

                        <input type="text" class="form-control" value="<?php echo $showaddress; ?>" name="address">

                    </div>

                </div>





                <div class="row mb-3">

                    <label for="inputAddress" class="col-sm-2 col-form-label">Pin Code :</label>

                    <div class="col-sm-10">

                        <input type="number" class="form-control" value="<?php echo $showpin_code; ?>" name="pin_code">

                    </div>

                </div>



                <div class="row mb-3">

                    <label for="inputAddress" class="col-sm-2 col-form-label">Amount :</label>

                    <div class="col-sm-10">

                        <input type="number" class="form-control" value="<?php echo $showamount; ?>" name="amount">

                    </div>

                </div>





                <div class="row mb-3">

                    <label for="inputText" class="col-sm-2 col-form-label">Payment :</label>

                    <div class="col-sm-4">

                        <select class="form-select" name="payment_type" onchange="selectpayment(this.value)">

                            </option>

                            <option <?php if ($showpayment_type == "Cash") {
                                echo 'selected style="color: blue;"';
                                }?> value="Cash">Cash</option>



                            <option <?php if ($showpayment_type == "Credit") {
                                echo 'selected style="color: blue;"';
                                }?> value="Credit">Credit</option>



                            <option <?php if ($showpayment_type == "UPI") {
                                echo 'selected style="color: blue;"';
                                }?> value="UPI">UPI</option>



                            <option <?php if ($showpayment_type == "Credit-Card") {
                                echo 'selected style="color: blue;"';
                                }?> value="Credit-Card">Credit-Card</option>



                            <option <?php if ($showpayment_type == "Debit-Card") {
                                echo 'selected style="color: blue;"';
                                }?> value="Debit-Card">Debit-Card</option>



                            <option <?php if ($showpayment_type == "Internet-Banking") {
                                echo 'selected style="color: blue;"';
                                }?> value="Internet-Banking">Internet-Banking</option>



                            <option <?php if ($showpayment_type == "Others") {
                                echo 'selected style="color: blue;"';
                                }?> value="Others">Others</option>

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

                            <!-- <option value="Others" style="color: blue;">Others</option> -->

                            <?php


                                $count = 1;
                                $emps = $Employee->showEmployees();

                                foreach ($emps as $emp) {

                                $empId   = $emp['id'];

                                $empNames = $emp['name'];

                                if($empNames == $paidBy){
                                $count--;
                                echo'<option value="Others" style="color: blue;">Others</option>';
                                }

                                }
                                if($count == 1){

                                echo'<option value="Others" style="color: blue;">'.$paidBy.' (Others)</option>';
                                }

                                foreach ($emps as $emp) {
                                    $empId   = $emp['id'];

                                    $empName = $emp['name'];

                                    echo '<option value="' . $empName . '"';
                                    if ($empName == $paidBy) {
                                    echo 'selected style="color: blue;"';
                                    }
                                    echo '>' . $empName. '</option>';

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

                <div class="row mb-3 p-0 m-0">
                    <label class="col-sm-2 col-form-label">Status :</label>
                    <div class="col-sm-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="active"
                                required <?php if($showstatus == 'active'){ echo 'checked';}?>>
                            <label class="form-check-label" for="gridRadios1">
                                Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="inactive"
                                required <?php if($showstatus == 'inactive'){ echo 'checked';}?>>
                            <label class="form-check-label" for="gridRadios2">
                                Inactive
                            </label>
                        </div>
                    </div>
                    <label class="col-sm-2 col-form-label" id="subdata">Date:</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="edit2" value="<?php echo $showdate; ?>" name="date">
                    </div>
                </div>



                <div class="row mb-3 p-0 m-0">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Description :</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" style="height: 68px" name="description"
                            required><?php echo $showdescription; ?></textarea>
                    </div>
                </div>

                <div class="row mb-3">

                    <!-- <label class="col-sm-3 col-form-label">Confirm Payment</label> -->

                    <div class="col-sm-10 d-flex justify-content-center m-auto">

                        <button type="submit" class="btn btn-primary" style="width: 105px" name="submit">

                            Update

                        </button>

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