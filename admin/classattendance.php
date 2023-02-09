<?php
session_start();
$page = "Student Attendance";
require_once '../_config/dbconnect.php';
require_once '../classes/classes.class.php';
require_once '../classes/student.class.php';
require_once '../classes/admin.class.php';
require_once '../classes/institutedetails.class.php';
require_once '../includes/constant.php';

$Admin    = new Admin();
$Classes  = new Classes();
$Student  = new Student();
$InstituteDetails   = new InstituteDetails();

$showStudentDetails = $Classes->classesList();
//  $result=$StudentDetails->totalclass($class);

 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Student Management / Class Attendance - <?php echo SITE_NAME; ?></title>
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
      <h1>Student Attendance Details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Student Management</li>
          <li class="breadcrumb-item active">Student Attendance</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section>
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
    <!-- Sales Card -->

     <?php
       $result=$InstituteDetails->instituteShow();
       foreach($result as $row){   
        $session = $row["session"];
     
                 if ($showStudentDetails == 0) {
                  echo "Not Avilable.";
                 }else{
               foreach ($showStudentDetails as $showStudentDetailsshow) {
     
                $showclass = $showStudentDetailsshow['id'];
                $showstu = "studentattendance.php?studentatten=".$showclass."&session=".$session;

                if($showclass == 11 || $showclass == 12){
                  $showstu = "subject_attendance.php?studentatten=".$showclass."&session=".$session;
                }

                $result=$Student-> studentByClass($showclass, $session);

                if($result == 0){

                  echo '<div class="col-xxl-3 col-md-3">
                  <a href="'.$showstu.'">
                  <div class="card info-card sales-card">
                
                
                    <div class="card-body">
                      <h5 class="card-title">Class <span>| '.$showclass.'</span></h5>
                
                      <div class="d-flex align-items-center">
                        <div style="width: 6rem;
                        font-size: 2rem; color: #4154f1; background: rgb(245, 245, 237); height: 4rem;"  class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-book"></i>
                        </div>
   
                        <div class="ps-3">
                          <span class="text-success small pt-1 fw-bold">Total</span> <span class="text-muted small pt-2 ps-1">Student</span>
                          <h4>0</h4>
   
                        </div>
                      </div>
                    </div>
                
                  </div>
                  </a>
                </div>';
                }else{ 
                  $classcount = count($result);
      
               echo '<div class="col-xxl-3 col-md-3">
               <a href="'.$showstu.'">
               <div class="card info-card sales-card">
             
             
                 <div class="card-body">
                   <h5 class="card-title">Class <span>| '.$showclass.'</span></h5>
             
                   <div class="d-flex align-items-center">
                     <div style="width: 6rem;
                     font-size: 2rem; color: #4154f1; background: rgb(245, 245, 237); height: 4rem;"  class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                       <i class="bi bi-book"></i>
                     </div>

                     <div class="ps-3">
                       <span class="text-success small pt-1 fw-bold">Total</span> <span class="text-muted small pt-2 ps-1">Student</span>
                       <h4>'.$classcount.'</h4>

                     </div>
                   </div>
                 </div>
             
               </div>
               </a>
             </div>';
               
               }}}
              }
     ?>
 
     
    </section> 

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php require_once 'require/addfooter.php'; ?>

</body>

</html>