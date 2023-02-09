<?php

$page = "gallery";

require_once './_config/dbconnect.php';

require_once './classes/institutedetails.class.php';

require_once 'includes/constant.php';

$Institute = new  InstituteDetails();



$instData = $Institute->instituteShow();



?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">



    <title>Gallery - <?php echo SITE_NAME; ?></title>

    <meta content="" name="description">

    <meta content="" name="keywords">



    <!-- Favicons -->

    <link href=<?php echo FAVICON_LINK; ?> rel="icon">

    <link href=<?php echo FAVICON_LINK_A; ?> rel="apple-touch-icon">



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

                <h2>Gallery</h2>

                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas

                    sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>

            </div>

        </div><!-- End Breadcrumbs -->



        <!-- ======= Gallery Section ======= -->

        <section class="container Gallery ">



            <h3 class="d-flex justify-content-center text-center mt-0 ">Memories</h3>

            <!-- Gallery -->

            <div class="row">

                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">

                    <img src="assets/img/school/img1.jpg" class="w-100 shadow-1-strong rounded mb-4" />



                    <img src="assets/img/school/img2.jpg" class="w-100 shadow-1-strong rounded mb-4" />

                    <img src="assets/img/school/img11.jpg" class="w-100 shadow-1-strong rounded mb-4" />

                </div>



                <div class="col-lg-4 mb-4 mb-lg-0">

                    <img src="assets/img/school/img3.jpg" class="w-100 shadow-1-strong rounded mb-4" />



                    <img src="assets/img/school/img6.jpg" class="w-100 shadow-1-strong rounded mb-4" />

                    <img src="assets/img/school/img9.jpg" class="w-100 shadow-1-strong rounded mb-4" />



                </div>



                <div class="col-lg-4 mb-4 mb-lg-0">

                    <img src="assets/img/school/img5.jpg" class="w-100 shadow-1-strong rounded mb-4" />



                    <img src="assets/img/school/img4.jpg" class="w-100 shadow-1-strong rounded mb-4" />

                    <img src="assets/img/school/img13.jpg" class="w-100 shadow-1-strong rounded mb-4" />

                </div>







            </div>

            <!-- Gallery -->



        </section>











        <!-- End Gallery Section -->



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