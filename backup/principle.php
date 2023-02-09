<?php

$page = "principle";
require_once '_config/dbconnect.php';
require_once './classes/institutedetails.class.php';

$Institute = new  InstituteDetails();


$result = $Institute->princpledisplaydata();
$instData = $Institute->institutedisplaydata();



?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">



    <title>Principle - Mentor Bootstrap Template</title>

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

                <h2>Our Principle</h2>

                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas

                    sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>

            </div>

        </div><!-- End Breadcrumbs -->



        <!-- ======= profile  Section ======= -->



        <div class="container">




        <section class="section profile">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 pb-2 pt-2">
                        <div class="card">
                                <div class="member ">
                                    <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid w-100" alt="">
                                    <div class="member-content" style="margin: 1.5rem;text-align: center; ">
                                    <?php
                                    foreach($result as $row){

                                    ?>
                                        <h4 class="text-dark" style=" font-weight: 700;
                                       margin-bottom: 10px;
                                        font-size: 32px;"><?php echo $row['name'];  ?></h4>
                                        <span style="font-size: 1.2rem;">Web Development</span>
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
                                            <div class="col-lg-9 col-md-8"><?php echo $row['name']; ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Qualification</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $row['qualification']; ?></div>
                                        </div>
<!-- 
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Job</div>
                                            <div class="col-lg-9 col-md-8">Web Designer</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Country</div>
                                            <div class="col-lg-9 col-md-8">USA</div>
                                        </div> -->

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Address</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $row['address']; ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Phone</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $row['contact_no']; ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Email</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $row['email'];  ?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                            </div>
                        </div>

                    </div>
                </div>
            </section>





          

        </div>

        <!-- ======= profile end ection ======= -->



        <section id="about" class="about">

            <div class="container" data-aos="fade-up">



                <div class="row">



                    <div class="col-lg-12  pt-lg-0   content">

                        <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>

                        <p class="fst-italic">

                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut

                            labore et dolore

                            magna aliqua.

                        </p>

                        <ul>

                            <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo

                                consequat.</li>

                            <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate

                                velit.</li>

                            <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo

                                consequat.</li>

                            <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate

                                velit.</li>

                            <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo

                                consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda

                                mastiro dolore eu fugiat nulla pariatur.</li>

                            <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo

                                consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda

                                mastiro dolore eu fugiat nulla pariatur.</li>

                        </ul>

                        <p>

                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in

                            reprehenderit in voluptate

                        </p>

                    </div>





                </div>

        </section>





        <!-- ======= Testimonials Section ======= -->

        <!-- <section id="testimonials" class="testimonials">

      <div class="container" data-aos="fade-up">



        <div class="section-title">

          <h2>Testimonials</h2>

          <p>What are they saying</p>

        </div>



        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">

          <div class="swiper-wrapper">



            <div class="swiper-slide">

              <div class="testimonial-wrap">

                <div class="testimonial-item">

                  <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">

                  <h3>Saul Goodman</h3>

                  <h4>Ceo &amp; Founder</h4>

                  <p>

                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>

                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.

                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>

                  </p>

                </div>

              </div>

            </div>

            <div class="swiper-slide">

              <div class="testimonial-wrap">

                <div class="testimonial-item">

                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">

                  <h3>Sara Wilsson</h3>

                  <h4>Designer</h4>

                  <p>

                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>

                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.

                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>

                  </p>

                </div>

              </div>

            </div>



            <div class="swiper-slide">

              <div class="testimonial-wrap">

                <div class="testimonial-item">

                  <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">

                  <h3>Jena Karlis</h3>

                  <h4>Store Owner</h4>

                  <p>

                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>

                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.

                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>

                  </p>

                </div>

              </div>

            </div>



            <div class="swiper-slide">

              <div class="testimonial-wrap">

                <div class="testimonial-item">

                  <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">

                  <h3>Matt Brandon</h3>

                  <h4>Freelancer</h4>

                  <p>

                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>

                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.

                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>

                  </p>

                </div>

              </div>

            </div>

            <div class="swiper-slide">

              <div class="testimonial-wrap">

                <div class="testimonial-item">

                  <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">

                  <h3>John Larson</h3>

                  <h4>Entrepreneur</h4>

                  <p>

                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>

                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.

                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>

                  </p>

                </div>

              </div>

            </div>



          </div>

          <div class="swiper-pagination"></div>

        </div>



      </div>

    </section> -->



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