<?php
$page = "careers";

require_once './_config/dbconnect.php';
require_once './classes/institutedetails.class.php';
$Institute = new  InstituteDetails();

$instData = $Institute->instituteShow();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Careers - Mentor Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/applyjob.css" rel="stylesheet">
    <!-- =======================================================
  * Template Name: Mentor - v4.7.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!--======== Header start ========-->
    <?php require_once 'require/header.php'; ?>
    <!--======== Header End ========-->

    <main id="main" data-aos="fade-in">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Jobs And Opportunities</h2>
                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas
                    sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
            </div>
        </div>
        <!-- End Breadcrumbs -->

        <!-- ======= Section start======= -->

        <section class=" jobspage   mt-3 pt-0 pb-0 mb-0">
            <div class="row">
                <h5 class="jobheadline pt-2 pb-3 d-flex justify-content-center">
                    Apply for this Jobs
                </h5>
                <div class="col-lg-6 ">
                    <img src="assets/img/applying_jobs.jpg" class="w-100" width="800px" alt="">
                    <h3 class="paB">PERKS AND BENEFITS</h3>
                    <p>We may be a non-profit, but we reward our talented team extremely well!</p>
                    <ul>
                        <li>Competitive salaries</li>
                        <li>Ample paid time off as needed – we are about getting things done, not face time</li>
                        <li>Generous parental leave</li>
                        <li>A fun, high-caliber team that trusts you and gives you the freedom to be brilliant</li>
                        <li>The ability to put your talents towards a deeply meaningful mission and the opportunity to
                            work on high-impact products that are already defining the future of education</li>
                        <!-- <li>And we offer all those other typical benefits as well: 401(k) + 4% matching & comprehensive
                            insurance including medical, dental, vision, and life.</li> -->
                    </ul>
                </div>
                <div class="col-lg-6 applyformjob">
                    <form class="row needs-validation w-100" novalidate>
                        <div class="">

                            <div class="form-floating mb-3">
                                <input type="text" maxlength="80" class="form-control ajstye" id="floatingInput"
                                    placeholder=" " name="name" value="" required>
                                <label for="floatingInput">Full Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" maxlength="80" class="form-control ajstye" id="floatingInput"
                                    placeholder=" " name=" gurdian_name" value="" required>
                                <label for="floatingInput"> Gurdian Name</label>
                            </div>
                            <div class="row ">
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" maxlength="25" class="form-control ajstye"
                                            id="floatingInput" placeholder=" " name=" gurdian_name" value="" required>
                                        <label for="floatingInput"> Email Id </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="number"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            maxlength="10" class="form-control ajstye" id="floatingInput"
                                            placeholder=" " name=" gurdian_name" value="" required>
                                        <label for="floatingInput"> Contact Number </label>
                                    </div>
                                </div>
                            </div>
                            <!-- <fieldset class="row ">
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" maxlength="10" class="form-control ajstye" id="floatingInput"
                                            placeholder=" " name="date" value="" required>
                                        <label for="floatingInput"> Date of Birth </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating ">
                                        <select class="form-select ajstye" id="floatingSelectGrid"
                                            aria-label="Floating label select example" required>
                                            <option selected disabled value>Select gender</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Transgender</option>
                                        </select>
                                        <label for="floatingSelectGrid">Gender </label>
                                    </div>
                                </div>
                            </fieldset> -->
                            <div class="form-floating mb-3">
                                <input type="text" maxlength="80" class="form-control ajstye" id="floatingInput"
                                    placeholder=" " name=" gurdian_name" value="" required>
                                <label for="floatingInput">Highest Qualification </label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" maxlength="80" class="form-control ajstye" id="floatingInput"
                                    placeholder=" " name="address" value="" required>
                                <label for="floatingInput"> Address </label>
                            </div>
                            <div class="row ">
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" maxlength="50" class="form-control ajstye" id="floatingInput"
                                            placeholder=" " name="district" value="" required>
                                        <label for="floatingInput">District </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" maxlength="50" class="form-control ajstye" id="floatingInput"
                                            placeholder=" " name="police_station" value="" required>
                                        <label for="floatingInput"> Police Station </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="number"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            maxlength="6" class="form-control ajstye" id="floatingInput" placeholder=" "
                                            name="pin_code" value="" required>
                                        <label for="floatingInput">Pin Code</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" maxlength="50" class="form-control ajstye" id="floatingInput"
                                            placeholder=" " name="state" value="" required>
                                        <label for="floatingInput">State </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating  mb-3">
                                <input type="file" class="form-control ajstye" id="formFile" name="Upload" accept = "application/pdf,.csv,.jpg,.jpeg, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" placeholder=" "
                                    name="resume_upload"
                                    style="padding-top: 1.925rem;padding-bottom: .625rem;padding-left: 1rem;" required>
                                <label class="" for="floatingInput">Resume Upload</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control ajstye" id="floatingInput" placeholder=" "
                                    name="description" value="" required>
                                <label for="floatingInput">About</label>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12  ">
                                    <a href="" class="more-btn d-flex justify-content-center"> <button type="submit"
                                            name="submit" class="btn btn-outline-success"
                                            style="border-radius: 50px; width: 10rem;">
                                            Submit Form </button></a>
                                    <!-- <button type="submit" class="btn btn-success" name="submit">Submit Form</button> -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </section>
        <!-- ======= Section start======= -->
    </main><!-- End #main -->

    <!--======== Footer Start ========-->
    <?php require_once 'require/footer.php'; ?>
    <!--======== Footer End ========-->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

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