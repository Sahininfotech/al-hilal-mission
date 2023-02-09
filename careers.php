<?php

$page = "careers-page";

require_once './_config/dbconnect.php';

require_once './classes/institutedetails.class.php';

require_once './includes/constant.php';

$Institute = new  InstituteDetails();



$instData = $Institute->instituteShow();



?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">



    <title>Careers - <?php echo SITE_NAME; ?></title>

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

            <h2>Careers</h2>

                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas

                    sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>

            </div>

        </div><!-- End Breadcrumbs -->



        <!-- ======= Trainers Section start======= -->

        <!-- <div class="container"> -->

        <section class="section profile p-0 m-0 ">

            <section class="careers_section">

                <div class="careers-banner">

                    <h1>

                        We’ve got an ambitious mission,

                        but together we can achieve it.

                    </h1>

                    <p> Every child deserves the chance to learn regardless of where they are or their

                        circumstances.</p>

                </div>

            </section>



            <section class="career-two-sec">

                <div class="waiting-div">

                    <h1 class="waiting-line"> WHY ARE YOU WAITING?</h1>

                </div>

                <div>

                    <div class="row">

                        <div class="col-lg-6">

                            <div>

                                <img src="assets/img/career-div.jpg" class="w-100" alt="">

                            </div>

                        </div>

                        <div class="col-lg-6  careers-para">

                            <h1 class="font-weight-bolder">We’re driven by our community.</h1>

                            <p>Our students, teachers, and parents come from all walks of life and so do we. We hire

                                great

                                people from a wide variety of backgrounds, not just because it’s the right thing to

                                do, but

                                because it makes our company stronger. Valuing diversity, equity and inclusion not

                                only

                                matters, but is necessary for us to actualize our mission and truly impact the

                                communities

                                we serve.</p>

                        </div>

                    </div>

                </div>

            </section>





            <section class="career-quote">

                <div>

                    <h3>Founded on a bedrock of joyous learning, Al-Hilal Mission's philosophy runs deep and strong

                        in our

                        teachers. We have a 50+ teaching staff, every one of them experienced, competent and

                        invested in our

                        goal of nurturing lifelong learners.</h3>

                    <p>When we look for new teachers to join us on our journey, besides the obvious requirements of

                        academic

                        excellence and the ability to effectively inspire learning, we look for an attitude that

                        connects

                        with ours. We look for a real love for children, team skills and a passion for knowledge.

                    </p>

                </div>

            </section>





            <section class="career-quote pt-0 mb-0 pb-0">

                <div class="pb-3">

                    <h1>Meet our team</h1>

                </div>

                <div class="row mb-3">

                    <div class="col-lg-6 mb-3"><img src="assets/img/group1.jpg" class="w-100" alt=""></div>

                    <div class="col-lg-6 mb-3 "><img src="assets/img/group2.jpg" class="w-100" alt=""></div>

                    <div class="col-lg-6 mb-3"><img src="assets/img/group3.jpg" class="w-100" alt=""></div>

                    <div class="col-lg-6 mb-3"><img src="assets/img/group4.jpg" class="w-100" alt=""></div>



                </div>



            </section>







            <section class=" jobsec   mb-0 pb-0 mt-0 pt-0">

                <div class="jobs-table wow fadeInLeft animated" data-wow-delay=".5s"

                    style="visibility: visible;-webkit-animation-delay: .5s; -moz-animation-delay: .5s; animation-delay: .5s;">



                    <h3>JOBS AND OPPORTUNITIES</h3>



                    <!-- <form name="joblist" id="joblist" method="GET" action="" class="jobsform" data-hs-cf-bound="true">

                    <div class="form-group">

                        <label class="departmnt-lvl">Department</label>

                        <select id="sortting-options" name="department" class="form-select form-controling  mb-1">

                            <option value="">All</option>

                            <option value="">Arbic</option>

                            <option value="">Urdu</option>

                            <option value="">English</option>

                            <option value="">Maths</option>

                            <option value="">Geography</option>

                            <option value="">Computer Science</option>

                            <option value="34">Science</option>

                            <option value="335">History</option>

                            <option value="">Sports</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <input type="button" name="search" id="search" class="applynow-job-btn"

                            value="Search">

                    </div>

                </form> -->



                    <div class="table-responsive">

                        <table class=" ttblle table table-bordered table-striped table-custom">

                            <thead>

                                <tr>

                                    <th>Job ID</th>

                                    <th>department</th>

                                    <th>subject</th>

                                    <th>grade</th>

                                    <th>date</th>



                                    <th colspan="2">Action</th>

                                </tr>

                            </thead>



                            <tbody>

                                <tr>

                                    <td>1</td>

                                    <td>Middle &amp; Senior Departments</td>

                                    <td>Urdu</td>

                                    <td>VI-X</td>

                                    <td>18 Aug 2022</td>



                                    <td colspan="2"> <a href="applyjobs.php" class="applynow-job-btn">Apply </a></td>

                                </tr>

                                <tr>

                                    <td>2</td>

                                    <td>Middle Departments</td>

                                    <td>English</td>

                                    <td>VI-X</td>

                                    <td>18 Aug 2022</td>



                                    <td colspan="2"> <a href="applyjobs.php" class="applynow-job-btn">Apply</a>

                                    </td>

                                </tr>

                                <tr>

                                    <td>3</td>

                                    <td>Primary Departments</td>

                                    <td>Arbic</td>

                                    <td>I-V</td>

                                    <td>18 Aug 2022</td>



                                    <td colspan="2"> <a href="applyjobs.php" class="applynow-job-btn">Apply</a></td>

                                </tr>

                                <tr>

                                    <td>4</td>

                                    <td>Early Departments</td>

                                    <td>All</td>

                                    <td>I</td>

                                    <td>18 Aug 2022</td>



                                    <td colspan="2"> <a href="applyjobs.php" class="applynow-job-btn">Apply</a></td>

                                </tr>

                                <tr>

                                    <td>5</td>

                                    <td>Early Departments </td>

                                    <td>All</td>

                                    <td>I-v</td>

                                    <td>18 Aug 2022</td>



                                    <td colspan="2"> <a href="applyjobs.php" class="applynow-job-btn">Apply</a>

                                    </td>

                                </tr>

                            </tbody>



                        </table>





                    </div>

                    <!-- <div class="pagination-main">

                <ul class="pager">

                    <li class=" pager-current  first ">1</li>

                    <li class=" pager-item "><a href="#"

                            title="Go to page 2">2</a></li>

                    <li class=" pager-item "><a href="#"

                            title="Go to page 3">3</a></li>

                    <li class=" pager-item  last "><a href="#"

                            title="Go to page 4">4</a></li>

                </ul>

            </div> -->

                </div>

            </section>

        </section>

        <!-- </div> -->











        <!-- ======= Trainers Section start======= -->

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