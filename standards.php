<?php
$page = "standards";

require_once './_config/dbconnect.php';

require_once './classes/institutedetails.class.php';
require_once './classes/studdetails.class.php';
require_once './classes/student.class.php';
require_once './classes/fees-accounts.class.php';
require_once 'includes/constant.php';


$Institute         = new  InstituteDetails();
$Student           = new Student();
$StudentDetails    = new StudentDetails();
$FeesAccount       = new FeesAccount();


$instData = $Institute->instituteShow();

$showStudentDetails = $StudentDetails->showStudentsubjectDetails1($_GET['class']);

$result=$Student-> studentByClass($_GET['class'], $_GET['session']); 

$Tolatfees          = $FeesAccount->showTotalamount($_GET['class']);

$classdata=$Institute->updateclass($_GET['class']);

?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">



    <title>Standards || <?php echo SITE_NAME; ?></title>

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

                <h2>Standards</h2>

                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas
                    sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>

            </div>

        </div><!-- End Breadcrumbs -->



        <!-- ======= Standard 1 Section ======= -->

        <section id="course-details" class="course-details">

            <div class="container" data-aos="fade-up">



                <div class="row">

                    <div class="col-lg-8">
                        <?php  
                        foreach($classdata as $class){
                        $description   = $class['description'];
                        $image         = $class['image'];
                        $img           =  "./admin/image/".$image;

                        ?>

                        <img src="<?php    echo $img;  ?>" class="img-fluid" alt="">

                        <h3>Description</h3>

                        <p>

                            <?php    echo $description;  ?>

                        </p>
                        <?php  }?>
                    </div>

                    <div class="col-lg-4">



                        <div class="course-info d-flex justify-content-between align-items-center">

                            <h5>standard</h5>

                            <p><a href="#"><?php    echo $_GET['class'];  ?></a></p>

                        </div>



                        <div class="course-info d-flex justify-content-between align-items-center">

                            <h5>Course Fee</h5>
                            <?php  
                            foreach($Tolatfees as $feesAcc){
                            $amount = $feesAcc['totalamount'];
                            }
                            echo '<p>'.$amount.'/-</p>';  
                            ?>
                        </div>



                        <div class="course-info d-flex justify-content-between align-items-center">

                            <h5>Total Students</h5>
                            <?php 
                            if($result == 0){
                            echo '<p>0</p>';
                            }else{ 
                            $classcount = count($result);
                            echo '<p>'.$classcount.'</p>';  
                            }
                            ?>

                        </div>


                        <div class="course-info d-flex justify-content-between align-items-center">

                            <h5>subject</h5>
                            <ul style="list-style: circle;">
                                <?php  
                                if ($showStudentDetails == 0) {
                                echo  '<li>No Subject Avilable.</li>';

                                }else
                                {
                                foreach ($showStudentDetails as $showStudentsDetails) {
                                $showstudentsubject = $showStudentsDetails['subject'];

                                echo ' <li>'.$showstudentsubject.'</li>';
                                }}
                                ?>
                            </ul>

                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">

                            <h5>Schedule</h5>

                            <p>10.00 am - 5.00 pm</p>

                        </div>



                    </div>

                </div>



            </div>

        </section><!-- End Cource Details Section -->





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