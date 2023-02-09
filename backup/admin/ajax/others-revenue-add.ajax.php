<?php

session_start();

require_once '../../_config/dbconnect.php';

require_once '../../classes/revenue.class.php';

require_once '../../classes/employee.class.php';

$Revenue    = new Revenue();

$Employee   = new Employee();


require_once '../../classes/vendor.class.php';

 $vendors             = new  Vendor();

 $vendorresult        = $vendors->vendordisplaydata();

 $Revenueresult       = $Revenue->staffdisplaydata();

 $insertrevenueothers = false;



    if(isset ($_POST["submit"])){

        $source       = $_POST["source"];

        $amount       = $_POST["amount"];

        $date         = $_POST["date"];

        $status       = $_POST["status"];

        $added_by     = $_POST["added_by"];

        $payment_type = $_POST["payment_type"];

        $payment_id   = $_POST["payment_id"];

        $vendor_id    = $_POST["vendor_id"];


        $paidBySelect = $_POST["paid-by-select"];

        $others_paid  = $_POST["others_paid"];



        if ($paidBySelect == 'Others') {
            $paidBy       =  $others_paid; 
        }
        
        if ($others_paid == '') {
            $paidBy      =  $paidBySelect; 
        }
        


        $result=$Revenue->revenueothersinsert($source, $amount, $date, $status, $added_by, $payment_type, $payment_id, $vendor_id, $paidBy);


        if(!$insertrevenueothers){
        echo "<script> alert('Revenueothers Data Insert Sucessfull'); document.location='https://alhilalmission.in/admin/ajax/others-revenue-add.ajax.php'</script>";
        }
        else{
        echo "<script> alert('Revenueothers Data Insert Not Sucessfull'); document.location='https://alhilalmission.in/admin/ajax/others-revenue-add.ajax.php'</script>";

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

if(!$insertrevenueothers){

    ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="row needs-validation w-100 m-0" novalidate>

        <div class="card p-0 mb-0" style="box-shadow: none">
            <div class="card-body pt-0 p-3">
                <input type="hidden" class="form-control" name="status" value="active" id="status" required>

                <input type="hidden" value="<?php echo $_SESSION['user_name'] ?>" name="added_by" required>

                <h5 class="card-title d-flex justify-content-center p-0 mt-0 mb-3">Other Revenues Form</h5>

                <div class="row mb-3 m-0 p-0">

                    <label for="inputText" class="col-sm-2 col-form-label">Source  :</label>

                    <div class="col-sm-10 p-0">

                        <input type="name" class="form-control" name="source" required>

                    </div>

                </div>



                <div class="row mb-3 m-0 p-0">

                    <label class="col-sm-2 col-form-label">Vendor  :</label>

                    <div class="col-sm-10 p-0">

                        <select class="form-control" id="form-selectven" aria-label="Default select example"
                            name="vendor_id" required>

                            <option selected disabled value>Select Name</option>

                            <?php

                            foreach ($vendorresult as $showVendor) {

                            $showVen_id = $showVendor['id'];

                            $showVen_name = $showVendor['name'];

                            $showvendor_id = $showVendor['vendor_id'];

                            echo '
                             <option value="'.$showvendor_id.'">'.$showVen_name.'</option>';

                            }?>

                        </select>
                    </div>

                </div>



                <div class="row mb-3 m-0 p-0">

                    <label for="inputNumber" class="col-sm-2 col-form-label">Amount :</label>

                    <div class="col-sm-10 p-0">

                        <input type="number" class="form-control" name="amount" required>

                    </div>

                </div>



                <div class="row mb-3 m-0 p-0">

                    <label for="inputText" class="col-sm-2 col-form-label">Payment :</label>

                    <div class="col-sm-4 p-0">

                        <select class="form-control" id="form-selectdata" name="payment_type" onclick="selectpament()"
                            required>

                            <option selected disabled value>Select Payment Type</option>

                            <option value="Cash">Cash</option>

                            <option value="Credit">Credit</option>

                            <option value="UPI">UPI</option>

                            <option value="Credit-Card">Credit-Card</option>

                            <option value="Debit-Card">Debit-Card</option>

                            <option value="Internet-Banking">Internet-Banking</option>

                            <option value="Others">Others</option>

                        </select>

                    </div>

                    <label for="inputText" class="col-sm-2 col-form-label" id="onlien" style="display: none;">Payment Id
                        :</label>

                    <div class="col-sm-4 p-0">

                        <input type="text" class="form-control" name="payment_id" id="onliens" style="display: none;">

                    </div>

                </div>


                <div class="row mb-3 m-0 p-0">

                    <label class="col-sm-2 col-form-label">By :</label>

                    <div class="col-sm-4 p-0">

                        <select class="form-select" id="form-select" aria-label="Default select example"
                            onclick="selectothers()" name="paid-by-select" required>

                            <option selected disabled value>Select Name</option>

                            <option value="Others" style="color: blue;">Others</option>

                            <?php                     

                        foreach ($Revenueresult as $showStudentDetailsshow) {

                        $showclass = $showStudentDetailsshow['id'];

                        $showexam_name = $showStudentDetailsshow['name'];

                        echo ' <option value="'.$showexam_name.'">'.$showexam_name.'</option>';
                                        
                        }?>

                        </select>

                    </div>

                    <label for="inputText" class="col-sm-2 col-form-label" id="other" style="display: none;">Others
                        :</label>

                    <div class="col-sm-4 p-0">

                        <input type="text" class="form-control" name="others_paid" id="others" style="display: none;">

                    </div>

                </div>



                <div class="row mb-3 m-0 p-0">

                    <label for="inputDate" class="col-sm-2 col-form-label">Date</label>

                    <div class="col-sm-10 p-0">

                        <input type="date" class="form-control" name="date" required>

                    </div>

                </div>



                <div class="row mb-3 m-0 p-0 ">

                    <div class="col-sm-12 p-0 d-flex justify-content-center m-auto">

                        <button type="submit" class="btn btn-primary " style="width:105px" name="submit">Submit</button>

                    </div>

                </div>

            </div>
        </div>
    </form>

    <?php
    }
    ?>

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
    function selectothers() {

        var demo_two = document.getElementById('other');

        var demo = document.getElementById('form-select');

        if (demo.value == 'Others') {

            demo_two.style.display = "block";

            //console.log("hello");

        } else {

            demo_two.style.display = "none";

        }
        var demo_two = document.getElementById('others');

        var demo = document.getElementById('form-select');

        if (demo.value == 'Others') {

            demo_two.style.display = "block";

        } else {

            demo_two.style.display = "none";

        }

    }
    </script>


    <script>
    function selectpament() {

        var demo_two = document.getElementById('onlien');

        var demo = document.getElementById('form-selectdata');

        if (demo.value == 'Credit' || demo.value == 'UPI' || demo.value == 'Credit-Card' || demo.value ==
            'Debit-Card' || demo.value == 'Internet-Banking') {

            demo_two.style.display = "block";

        } else {

            demo_two.style.display = "none";
        }

        var demo_two = document.getElementById('onliens');

        var demo = document.getElementById('form-selectdata');

        if (demo.value == 'Credit' || demo.value == 'UPI' || demo.value == 'Credit-Card' || demo.value ==
            'Debit-Card' || demo.value == 'Internet-Banking') {

            demo_two.style.display = "block";

        } else {

            demo_two.style.display = "none";

        }

    }
    </script>




    <script>
    (function() {
        'use strict'

        var forms = document.querySelectorAll('.needs-validation')

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