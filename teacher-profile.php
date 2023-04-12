<?php
$page = "teacher-profile";
require_once './_config/dbconnect.php';
require_once './classes/institutedetails.class.php';
require_once './classes/employee.class.php';
require_once './classes/stadetails.class.php';

$Institute = new  InstituteDetails();
$employees = new  Employee();
$empRole   = new institute();

$instData = $Institute->instituteShow();

$displaydata = $employees->staffById($_GET['id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Teachers-Profile - Mentor Bootstrap Template</title>
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

    <main id="main" data-aos="fade-in">

        <?php  
     foreach ($displaydata as $showdata) {
        $showname        = $showdata['name'];
        $showemail    = $showdata['email'];
        $showaddress    = $showdata['address'];
        $showcontactno    = $showdata['contactno'];
        $showdesignation    = $showdata['designation'];
        $showphotos  = $showdata['profile_image'];
        $showgender    = $showdata['gender'];
        $showstate    = $showdata['state'];
        $img         = "./admin/image/".$showphotos;

        $displaydata = $empRole->RoledataById($showdesignation);

        foreach ($displaydata as $showRoledata) {

        $showRolename    = $showRoledata['designation_name'];

        $showdescription = $showRoledata['description'];
        }
      
     }
    ?>

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Teachers</h2>
                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas
                    sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Trainers Section start======= -->
        <div class="container">
            <section class="section profile">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 pb-2 pt-2">
                        <div class="card">
                            <div class="member ">
                                <img src="<?php   echo $img; ?>" class="img-fluid w-100" alt="" style="height: 366px;">
                                <div class="member-content" style="margin: 1.5rem;text-align: center; ">

                                    <h4 class="text-dark" style=" font-weight: 700;
                                       margin-bottom: 10px;
                                        font-size: 32px;"><?php   echo $showname ?></h4>
                                    <span style="font-size: 1.2rem;"><?php   echo $showRolename ?></span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-8 col-lg-8 pb-2 pt-2">

                        <div class="card">
                            <div class="card-body pt-3">
                                <!-- Bordered Tabs -->

                                <div class="tab-content pt-2">

                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                        <h5 class="card-title">About</h5>
                                        <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam
                                            maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor.
                                            Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi
                                            sed ea saepe at unde.</p>

                                        <h5 class="card-title">Profile Details</h5>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                            <div class="col-lg-9 col-md-8"><?php   echo $showname; ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">State</div>
                                            <div class="col-lg-9 col-md-8"><?php   echo $showstate ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Job</div>
                                            <div class="col-lg-9 col-md-8"><?php   echo $showRolename ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Gender</div>
                                            <div class="col-lg-9 col-md-8"><?php   echo $showgender ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Address</div>
                                            <div class="col-lg-9 col-md-8"><?php   echo $showaddress ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Phone</div>
                                            <div class="col-lg-9 col-md-8"><?php   echo $showcontactno; ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Email</div>
                                            <div class="col-lg-9 col-md-8"><?php   echo $showemail; ?></div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </section>
        </div>





        <!-- ======= Trainers Section start======= -->
    </main><!-- End #main -->

    <!--======== Footer Start ========-->
    <?php require_once 'require/footer.php'; ?>
    <!--======== Footer End ========-->

    <!-- <div id="preloader"></div> -->
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