<?php
 session_start();
 $page ="add-new-staff";

 require_once '../../_config/dbconnect.php';
 require_once '../../classes/vendor.class.php';
 $vendors = new  Vendor();
 $vendorresult=$vendors->vendordisplaydata();
      
$expensesQuery=false;

  if(isset ($_POST["submit"])){
 
        $name = $_POST["name"]; 
        $address = $_POST["address"];
        $date = $_POST["date"];
        $status = $_POST["status"];
        $added_by = $_POST["added_by"];
        $mob_no = $_POST["mob_no"];

        $code           = rand(1, 99999);
        $vendor_id     = "VEN".$code;

        $result=$vendors->vendorInsert($name, $address, $date, $status, $added_by ,$mob_no, $vendor_id);
      
       
      
        if(!$expensesQuery){
         echo "<script> alert('Vendor Data is Successfully Inserted!');document.location = 'vendor-add.ajax.php' </script>";
         }
        else{
          echo "<script> alert('Vendor Data is failed to Insert!');document.location ='vendor-add.ajax.php' </script>";
       
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
                   if(!$expensesQuery){
                     ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="  needs-validation m-0"
                            novalidate>

        <div class="card p-0 m-0 mb-0" style="box-shadow: none">
            <div class="card-body p-3 m-0">
                <h5 class="card-title d-flex justify-content-center p-0 mt-0 mb-3">
                    Add Expenses
                </h5>
                <input type="hidden" value="<?php echo $_SESSION['user_name'] ?>" name="added_by" required>
                <input type="hidden" class="form-control" value="active" name="status" required />

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Name :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" required />
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="inputaddress" class="col-sm-2 col-form-label">Address :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="address" required />
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Mob No. :</label>
                    <div class="col-sm-10">
                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" class="form-control" name="mob_no" required />
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label ">Date :</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="date" required>
                    </div>
                </div>

                <div class="row">
                    <!-- <label class="col-sm-3 col-form-label">Confirm Payment</label> -->
                    <div class="col-sm-12 d-flex m-auto justify-content-center">
                        <button type="submit" class="btn btn-primary" style="width: 105px" name="submit">
                            Upload
                        </button>
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