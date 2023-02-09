<?php
session_start();
  $page = "Class Attendance";

  
  require_once '../_config/dbconnect.php';
  require_once '../classes/studdetails.class.php';
  require_once '../classes/admin.class.php';
  require_once '../includes/constant.php';

  $Admin          = new admin();
  $StudentDetails = new StudentDetails();
  $showStudentDetails = $StudentDetails->showStudentsubjectDetails1($_GET['studentatten']);
  
  

  // if($_GET['studentgettypesub'] == 11 && $_GET['studentgettypesub'] == 12){
    // $showStudentDetails = $StudentDetails->showStudentsubjectstream($_GET['stream'], $_GET['studentgettypesub']);
    
  // }else{

  // }
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Student Details / Subject - <?php echo SITE_NAME; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php require_once "require/headerLinks.php"; ?>
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
        <h1>Student Attendance Details</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Student Management</li>
            <li class="breadcrumb-item ">Student Attendance</li>
            <li class="breadcrumb-item active">Class <?php    echo $_GET['studentatten']  ?></li>
          </ol>
        </nav>
      </div><!-- End Page Title -->


      <div class="row">
        <!-- sales no-2 -->
        <?php               
          if ($showStudentDetails == 0) {
          echo "No data Type Avilable.";
          }
          else
          {

            foreach ($showStudentDetails as $showStudentDetailsshow) {

              $showclassstudent   = $showStudentDetailsshow['class_id'];
              $showstudentsubject = $showStudentDetailsshow['subject'];
              $showid             = $showStudentDetailsshow['id'];
              $showstream         = $showStudentDetailsshow['stream'];
              $showstudentgettype = $_GET['studentatten'];
              $showsession = $_GET['session'];
              $showsubject        = "studentattendance.php?studentatten=".$showclassstudent."&session=".$showsession;
               
               echo '
           
              <div class="col-xxl-3 col-md-3">
                <div class="card">
                  <a href="'.$showsubject.'&studentsubjecttype='.$showstudentsubject.'&studentsubjecttype2='.$showstudentgettype.'&strem='.$showstream.'">
                    <div class="card-body" style="padding: 20px 20px 20px 20px;">
                    <h3 class="card-title" style="text-align: center;">'.$showstream.'</h3>
                      <h5 class="card-title" style="text-align: center;">'.$showstudentsubject.'
                      <img src="assets/img/doc.png  " style="height: 28px; padding-left:1rem;" alt="">
                      </h5>
                    </div>
                  </a>
                </div>
              </div>';

            }
          }
        ?>
      
      </div>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php require_once 'require/addfooter.php'; ?>


  </body>

</html>