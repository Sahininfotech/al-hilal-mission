<?php

session_start();

$page = "Pending Student Details";

require_once '../_config/dbconnect.php';

require_once '../classes/classes.class.php';

require_once '../classes/pending.class.php';

require_once '../classes/admin.class.php';

require_once '../includes/constant.php';

$Admin    = new Admin();

$Classes  = new Classes();

$Student        = new Pending();



$showStudentDetails = $Classes->classesList();

//  $result=$StudentDetails->totalclass($class);



 

?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pending Studentdetails | <?php echo SITE_NAME; ?></title>

    <meta content="" name="description">

    <meta content="" name="keywords">



    <?php require_once 'require/headerLinks.php';?>

</head>



<body>

    <!-- ======= Header ======= -->

    <?php require_once 'require/navigationbar.php'; ?>

    <!-- End Header -->



    <!--======== sidebar ========-->

    <?php require_once 'require/sidebar.php'; ?>

    <!--======== End sidebar ========-->



    <main id="main" class="main">



        <div class="pagetitle">

            <h1>Pending Student Details</h1>

            <nav>

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                    <li class="breadcrumb-item">Dashboard </li>

                    <li class="breadcrumb-item active"> Pending Student Details</li>

                </ol>

            </nav>

        </div><!-- End Page Title -->

        <section>



        <div class="col-lg-12">

                <div class="row">



                    <?php

     

                 if ($showStudentDetails == 0) {

                  echo "Not Avilable.";

                 }else{

               foreach ($showStudentDetails as $showStudentDetailsshow) {

     

                $showclass = $showStudentDetailsshow['id'];

                $showstu = "pending_student.php?studenttype=". $showclass;





                $result=$Student->pen_studentByClass($showclass);



                  



                  echo '

                   

                    <div class="col-xxl-3 col-md-3 col-sm-3">

                        <div class="card cardingcss">

                        <a href="'.$showstu.'">

                                <div class="card-body" style="padding: 20px 20px 20px 20px;">

                                    <h5 class="card-title text-center d-grid" >CLASS - '.$showclass.'

                                    <i class="fa-solid fa-users-rectangle"></i> <i

                                    class="bi bi-person-workspace"

                                            style="color: #dbdb1af2;font-size: 3.5rem;"></i> </h5>

                                </div>

                            </a>

                        </div>

                    </div>';

               

                  }}
                 

        ?>

              </div>

          </div>







        </section>



    </main><!-- End #main -->



    <!-- ======= Footer ======= -->

    <?php require_once 'require/addfooter.php'; ?>



</body>



</html>