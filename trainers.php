<?php

$page = "teachers";

require_once './_config/dbconnect.php';

require_once './classes/institutedetails.class.php';

require_once 'includes/constant.php';

require_once './classes/employee.class.php';

require_once './classes/stadetails.class.php';

$Institute = new  InstituteDetails();

$employees = new  Employee();

$empRole   = new institute();

$instData = $Institute->instituteShow();



?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">



    <title>Teachers - <?php echo SITE_NAME; ?></title>

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



    <main id="main" data-aos="fade-in">



        <!-- ======= Breadcrumbs ======= -->

        <div class="breadcrumbs">

            <div class="container">

                <h2>Teachers</h2>

                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas
                    sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>

            </div>

        </div><!-- End Breadcrumbs -->



        <!-- ======= Trainers Section ======= -->

        <section id="trainers" class="trainers">

            <div class="container" data-aos="fade-up">




                <div class="row" data-aos="zoom-in" data-aos-delay="100">


                    <?php  
                  $employeedata 	= $employees->EmpRoledById("ROLEOFTHETEACHER"); 

                  foreach ($employeedata as $showdata) {

                  $showphotos  = $showdata['profile_image'];

                  $showname    = $showdata['name'];

                  $designation = $showdata['designation'];

                  $showid      = $showdata['id'];

                  $img         = "./admin/image/".$showphotos;

                  $displaydata = $empRole->RoledataById($designation);

                  foreach ($displaydata as $showRoledata) {

                  $showRolename    = $showRoledata['designation_name'];

                  $showdescription = $showRoledata['description'];

                 
                  $showteacher_profile = "teacher-profile.php?id=".$showid;

                  ?>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">

                        <div class="member">

                            <img src="<?php   echo $img ?>" class="img-fluid" alt="">

                            <div class="member-content">

                                <a href="<?php   echo $showteacher_profile ?>">

                                    <h4 class="text-dark"><?php   echo $showname ?></h4>
                                </a>

                                <span><?php   echo $showRolename ?></span>

                                <p>

                                    <?php   echo $showdescription ?>

                                </p>

                            </div>

                        </div>

                    </div>

                    <?php     }}
                    ?>

                    <!-- <div class="col-lg-3 col-md-6 d-flex align-items-stretch">

            <div class="member">

              <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">

              <div class="member-content">

                <a href="teacher-profile.php">

                <h4 class="text-dark">Walter White</h4></a>

                <span>Web Development</span>

                <p>

                  Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut

                </p>

              </div>

            </div>

          </div>



          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">

            <div class="member">

              <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">

              <div class="member-content">

                <a href="teacher-profile.php">

                <h4 class="text-dark">Walter White</h4></a>

                <span>Web Development</span>

                <p>

                  Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut

                </p>

              </div>

            </div>

          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">

            <div class="member">

              <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">

              <div class="member-content">

                <a href="teacher-profile.php">

                <h4 class="text-dark">Walter White</h4></a>

                <span>Web Development</span>

                <p>

                  Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut

                </p>

              </div>

            </div>

          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">

            <div class="member">

              <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">

              <div class="member-content">

                <a href="teacher-profile.php">

                <h4 class="text-dark">Walter White</h4></a>

                <span>Web Development</span>

                <p>

                  Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut

                </p>

              </div>

            </div>

          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">

            <div class="member">

              <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">

              <div class="member-content">

                <a href="teacher-profile.php">

                <h4 class="text-dark">Walter White</h4></a>

                <span>Web Development</span>

                <p>

                  Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut

                </p>

              </div>

            </div>

          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">

            <div class="member">

              <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">

              <div class="member-content">

                <a href="teacher-profile.php">

                <h4 class="text-dark">Walter White</h4></a>

                <span>Web Development</span>

                <p>

                  Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut

                </p>

              </div>

            </div>

          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">

            <div class="member">

              <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">

              <div class="member-content">

                <a href="teacher-profile.php">

                <h4 class="text-dark">Walter White</h4></a>

                <span>Web Development</span>

                <p>

                  Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut

                </p>

              </div>

            </div>

          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">

            <div class="member">

              <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">

              <div class="member-content">

                <a href="teacher-profile.php">

                <h4 class="text-dark">Walter White</h4></a>

                <span>Web Development</span>

                <p>

                  Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut

                </p>

              </div>

            </div>

          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">

            <div class="member">

              <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">

              <div class="member-content">

                <a href="teacher-profile.php">

                <h4 class="text-dark">Walter White</h4></a>

                <span>Web Development</span>

                <p>

                  Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut

                </p>

              </div>

            </div>

          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">

            <div class="member">

              <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">

              <div class="member-content">

                <a href="teacher-profile.php">

                <h4 class="text-dark">Walter White</h4></a>

                <span>Web Development</span>

                <p>

                  Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut

                </p>

              </div>

            </div>

          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">

            <div class="member">

              <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">

              

              <div class="member-content">

                <a href="teacher-profile.php">

                <h4 class="text-dark">Walter White</h4></a>

                <span>Web Development</span>

                <p>

                  Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut

                </p> 

              </div>

            </div>

          </div> -->

                </div>



            </div>

        </section><!-- End Trainers Section -->



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