<?php
$page = "Register";
require_once '../_config/dbconnect.php';
require_once '../classes/admin.class.php';

  if(isset($_POST["submit"])){
    // if($_SERVER['REQUEST METHOD'] == 'POST'){
    $name         = $_POST["name"];
    $email        = $_POST["email"];
    $contNo       = $_POST["contact-number"];
    $profession   = $_POST["profession"];
    
    $username     = $_POST["username"];
    $pass         = $_POST["password"];
    $v_pass       = $_POST["v-password"];

    $ph_no        = $_POST["ph_no"];
    $profession   = $_POST["profession"];
    $profession   = $_POST["address"];
    $profession   = $_POST["country"];

    if ($pass === $v_pass) {

            $Admin = new  Admin();
            $result = $Admin->adminInsert( $name,  $email, $username, $pass, $ph_no, $profession);
            
            if($result){
                header("Location: index.php");
                exit;
            }else{
                echo "<script>alert('woops something wrong went')</script>";
            }
        }else {
            echo "<script>alert('Verify Password Does Not Matched!')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pages / Register - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <!-- <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <style>
    .createacccss {
        width: 14rem;
    }

    @media (min-width:150px) and (max-width:320px) {
        .createacccss {
            width: 13rem;
        }
    }
    </style>
</head>

<body>
    <main>
        <div class="container">
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-lg-8 col-md-8 d-flex flex-column align-items-center justify-content-center">


                            <!-- <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">NiceAdmin</span>
                                </a>
                            </div> -->
                            <!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                    </div>

                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" class="row g-3 needs-validation" novalidate >
                                        <div class="col-lg-6">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" maxlength="80" name="name" class="form-control"
                                                id="yourName" required>
                                            <div class="invalid-feedback">Please, enter your name!</div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="yourEmail" class="form-label">Email</label>
                                            <input type="email" maxlength="90" name="email" class="form-control"
                                                id="yourEmail" required>
                                            <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="yourContactNumber" class="form-label">Mob. No</label>
                                            <input type="number" name="contact-number" class="form-control"
                                                id="yourContactNumber"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                maxlength="10" required>
                                            <div class="invalid-feedback">Please enter a valid Contact Number!</div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="yourProfession" class="form-label">Your Profession</label>
                                            <input type="text" maxlength="50" name="profession" class="form-control"
                                                id="yourProfession" required>
                                            <div class="invalid-feedback">Please enter a valid Profession!</div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="yourAddress" class="form-label">Your Address</label>
                                            <textarea class="form-control" maxlength="200" type="text" name="address"
                                                style="height: 70px" id="yourAddress" required></textarea>
                                            <div class="invalid-feedback">Please enter a valid Address!</div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="yourCountry" class="form-label">Your Country</label>
                                            <div class="">
                                                <select class="form-select" name="country"
                                                    aria-label="Default select example" id="yourCountry" required>
                                                    <option selected disabled value>Select Your Country</option>
                                                    <option value="India">India</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                            <div class="invalid-feedback">Please enter a valid Country!</div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" maxlength="90" name="username" class="form-control"
                                                    id="yourUsername" required>
                                                <div class="invalid-feedback">Please choose a username.</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="yourPassword" class="form-label">Create Password</label>
                                            <input type="password" maxlength="20" name="password" class="form-control"
                                                id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="yourPassword" class="form-label"> Verify Password</label>
                                            <input type="password" maxlength="20" name="v-password" class="form-control"
                                                id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox" value=""
                                                    id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">I agree and accept the
                                                    <a href="#">terms and conditions</a></label>
                                                <div class="invalid-feedback">You must agree before submitting.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button
                                                class="btn btn-primary text-center createacccss d-flex m-auto justify-content-center" type="submit" name="submit">Create Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a
                                                    href="pages-login.html">Log in</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="credits">
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                                Designed by <a href="https://Leelija.com/">Leelija.com</a>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->


    <!-- Vendor JS Files -->
    <!-- <script src="assets/vendor/apexcharts/apexcharts.min.js"></script> -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script> -->

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
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