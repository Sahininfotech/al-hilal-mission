<?php
$page = "events";

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

    <title>Events - Mentor Bootstrap Template</title>
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

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Events</h2>
                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas
                    sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Events Section ======= -->
        <section id="events" class="events">
            <div class="container-fluid" data-aos="fade-up">

                <div class="row">

                    <div class="col-md-4 d-flex align-items-stretch mx-auto">
                        <div class="card">
                            <div class="card-img">
                                <img src="assets/img/school/ind.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Independence's Day</h5>
                                <p class="fst-italic text-center">Sunday, September 26th at 7:00 pm</p>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-stretch mx-auto">
                        <div class="card">
                            <div class="card-img">
                                <img src="assets/img/school/eid1.jpg" style="width: 693px;" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Eid-Al-Adha</h5>
                                <p class="fst-italic text-center">Sunday, September 26th at 7:00 pm</p>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-stretch mx-auto">
                        <div class="card">
                            <div class="card-img">
                                <img src="assets/img/school/gandhi.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Gandhi Jayanti</h5>
                                <p class="fst-italic text-center">Sunday, November 15th at 7:00 pm</p>
                                <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                    veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- End Events Section -->




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

</body>

</html>