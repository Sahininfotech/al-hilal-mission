<?php
 session_start();

 require_once '../../_config/dbconnect.php';
 require_once '../../classes/revenue.class.php';
 require_once '../../classes/employee.class.php';

$Revenue    = new Revenue();
$Employee = new Employee();


$emps = $Employee->showEmployees();


    if(isset ($_POST["submit"])){

        $name               = $_POST["name"];
        $address            = $_POST["address"];
        $amount             = $_POST["amount"];
        $description        = $_POST["description"];
        $date               = $_POST["date"];
        $status             = $_POST["status"];
        $pin_code           = $_POST["pin_code"];
        $country            = $_POST["country"];
        $police_station     = $_POST["police_station"];
        $district           = $_POST["district"];
        $payment_type       = $_POST["payment_type"];
        $paying             = $_POST["paying"];
        $others_paying      = $_POST["others_paying"];
        $payment_id         = $_POST["payment_id"];
        $added_by           = $_POST["added_by"];
        
        $result = $Revenue->addDonationRevenue( $name, $address, $amount, $description, $date, $status, $added_by, $pin_code, $country, $police_station, $district, $payment_type, $paying, $others_paying, $payment_id);
        
            
        if($result){
            echo "<script> alert('Revenue Data Insert Sucessfull');
                    window.location.href; 
                </script>";
        }else{
            echo "<script> alert('Revenue Data Insertion Faild!');
                    window.location.href;
                </script>";      
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

<body>
    <!-- <section class="section dashboard">
            <div class="row">

             
                <div class="col-lg-12">
                    <div class="row">

                        <div class=" col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body"> -->

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="row needs-validation w-100 m-0"  novalidate>
        <div class="card ps-3 pe-3 mb-0" style="box-shadow: none">
            <input type="hidden" class="form-control" name="status" value="1" id="status" required>
            <input type="hidden" value="<?php echo $_SESSION['user_name'] ?>" name="added_by" required>
            <h5 class="card-title d-flex justify-content-center mt-0 p-0 mb-3"> Donation
                Details Form</h5>

            <div class="row mb-3 m-0 p-0">
                <label for="inputText" class="col-sm-3 col-form-label">Name :</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" required>
                </div>
            </div>
            <div class="row mb-3 m-0 p-0">
                <label for="inputaddress" class="col-sm-3 col-form-label">Address :</label>
                <div class="col-sm-9">
                    <input type="address" class="form-control" name="address" required>
                </div>
            </div>


            <div class="row mb-3 m-0 p-0">
                <label for="inputText" class="col-sm-3 col-form-label">Pin Code :</label>
                <div class="col-sm-4">
                    <input type="number"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        type="number" maxlength="6" maxlength="6" class="form-control" name="pin_code" required>
                </div>
                <label for="inputText" class="col-sm-2 col-form-label">Country :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="country" required>
                </div>
            </div>


            <div class="row mb-3 m-0 p-0">
                <label for="inputText" class="col-sm-3 col-form-label">Police Station :</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="police_station" required>
                </div>
                <label for="inputText" class="col-sm-2 col-form-label">District :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="district" required>
                </div>
            </div>


            <div class="row mb-3 m-0 p-0">
                <label for="inputNumber" class="col-sm-3 col-form-label">Amount :</label>
                <div class="col-sm-9">
                    <input type="amount" class="form-control" name="amount" required>
                </div>
            </div>



            <div class="row mb-3 m-0 p-0">
                <label for="inputText" class="col-sm-3 col-form-label">Payment :</label>
                <div class="col-sm-4">
                    <select class="form-control" id="form-selectdata" name="payment_type" onclick="selectpament()" required>
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
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="payment_id" id="onliens" style="display: none;">
                </div>
            </div>

            <!-- =============== -->
            <div class="row mb-3 m-0 p-0">
                <label class="col-sm-3 col-form-label">paid To :</label>
                <div class="col-sm-4">
                    <select class="form-select" id="form-select" aria-label="Default select example"
                        onclick="selectothers()" name="paying" >
                        <option selected>Select Name</option>
                        <option value="0" style="color: blue;">Others</option>

                        <?php
                                        foreach ($emps as $emp) {
                                        $empId = $emp['id'];
                                        $empName = $emp['name'];
                                        echo ' <option value="'.$empId.'">'.$empName.'</option>';
                                    }?>

                    </select>
                </div>
                <label for="inputText" class="col-sm-2 col-form-label" id="other" style="display: none;">Others
                    :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="others_paying" id="others" style="display: none;">
                </div>
            </div>


            <div class="row mb-3 m-0 p-0">
                <label for="inputDate" class="col-sm-3 col-form-label">Date :</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="date" required>
                </div>
            </div>


            <!-- <div class="row mb-3 m-0 p-0">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div> -->

            <div class="row mb-3 m-0 p-0">
                <label for="inputPassword" class="col-sm-3 col-form-label">Description :</label>
                <div class="col-sm-9">
                    <textarea class="form-control" style="height: 68px" name="description" required></textarea>
                </div>
            </div>

            <div class="row mb-1 ">
                <!-- <label class="col-sm-3 col-form-label">Confirm Payment</label> -->
                <div class="col-sm-12 d-flex justify-content-center m-auto">
                    <button type="submit" class="btn btn-primary w-25" name="submit">Submit</button>
                </div>
            </div>
        </div>

    </form>

    <!-- </div>
                            </div>
                      </div>
                </section> -->
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
    // console.log("hi");
    function selectothers() {
        var demo_two = document.getElementById('other');
        var demo = document.getElementById('form-select');
        if (demo.value == 0) {
            demo_two.style.display = "block";
            console.log("hello");
        } else {
            demo_two.style.display = "none";
        }
        var demo_two = document.getElementById('others');
        var demo = document.getElementById('form-select');
        if (demo.value == 0) {
            demo_two.style.display = "block";
            console.log("hello");
        } else {
            demo_two.style.display = "none";
        }
    }
    </script>
    <script>
    console.log("hi");

    function selectpament() {
        var demo_two = document.getElementById('onlien');
        var demo = document.getElementById('form-selectdata');
        if (demo.value == 'Credit' || demo.value == 'UPI' || demo.value == 'Credit-Card' || demo.value ==
            'Debit-Card' || demo.value == 'Internet-Banking') {
            demo_two.style.display = "block";
            console.log("hello");
        } else {
            demo_two.style.display = "none";
        }
        var demo_two = document.getElementById('onliens');
        var demo = document.getElementById('form-selectdata');
        if (demo.value == 'Credit' || demo.value == 'UPI' || demo.value == 'Credit-Card' || demo.value ==
            'Debit-Card' || demo.value == 'Internet-Banking') {
            demo_two.style.display = "block";
            console.log("hello");
        } else {
            demo_two.style.display = "none";
        }
    }
    </script>


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