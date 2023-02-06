<?php
require_once '../../_config/dbconnect.php';
require_once '../../classes/studdetails.class.php';

$StudentDetails = new StudentDetails();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $name         = $_POST["name"];
    $status       = $_POST["status"];
    $email        = $_POST["email"];
    $class        = $_POST["class"];
    $roll_no      = $_POST["roll_no"];
    $id           = $_POST["id"];
    $address      = $_POST["address"];

    $old_img       = $_POST['updateimg'];

    $new_image     = $_FILES['image']['name'];
    $img_tmp_name  =$_FILES['image']['tmp_name'];
    $image_folter  = '../image/'.$_FILES['image']['name'];
 
 
 
    if($new_image != ''){
       $c_image = '../image/'.$_FILES['image']['name'];
    }else{
       $c_image = $old_img;
    }
 
 
    move_uploaded_file( $img_tmp_name, $image_folter );

    $update     = $StudentDetails->studentaction($name, $status, $email, $class, $roll_no, $address, $id, $c_image);
    
    if(!$update){
      echo header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else{
      echo "<h1>Student Details Has Been Updated!<br><h1>";
    
    }
    
  }
   
?>


<?php
$page = "Student Attendance";
require_once '../_config/dbconnect.php';
require_once '../classes/student.class.php';
require_once '../includes/constant.php';
$Students = new  Student();
        if(isset ($_GET['searchstudents']) && isset ($_GET['searchstudent'])){

           

            $datewise = $Students->attendancedate($_GET['searchstudent'],$_GET['searchstudents']);

        }
  
    require_once '../classes/institutedetails.class.php';
    $revenue = new  InstituteDetails();
    $result=$revenue->instituteShow();
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Attendance Report - <?php echo SITE_NAME; ?></title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <!-- Favicons -->
    <link href="../admin/assets/img/favicon.png" rel="icon" />
    <link href="../admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
    <link href="path/to/file/interface.css" rel="stylesheet" type="text/css">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />
    <!-- Vendor CSS Files -->
    <link href="../admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="../admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="../admin/assets/vendor/quill/quill.snow.css" rel="stylesheet" />
    <link href="../admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
    <link href="../admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="../admin/assets/vendor/simple-datatables/style.css" rel="stylesheet" />
    <!-- Template Main CSS File -->
    <link href="../admin/assets/css/expenses.report.css" rel="stylesheet" />
    <!-- =======================================================

      * Template Name: NiceAdmin - v2.2.2

      * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/

      * Author: BootstrapMade.com

      * License: https://bootstrapmade.com/license/

      ======================================================== -->
    <style>
    th,
    p,
    h4,
    h6 {
        text-transform: capitalize;
    }
    </style>


</head>

<body>
    <section>
        <?php
            foreach($result as $row){
            ?>
        <div class="custom-container">
            <div class="custom-body ">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-sm-9">
                            <h2><?php    echo $row['institute_name']  ?></h2>
                            <p style="font-size: 14px;"><?php    echo $row['about']  ?><br>
                                <?php    echo $row['address']  ?> <br>
                            </p>
                        </div>
                        <div class="col-sm-3 border-start border-dark " style="line-height: 0.5rem;">
                            <h4 class="ps-4">Attendance Report Of Student</h4>
                            <h6 class="ps-4">Attendance /

                                <?php if(isset($_GET['searchstudent'])){echo $_GET['searchstudent'];}; ?><br><?php if(isset($_GET['searchstudents'])){echo $_GET['searchstudents'];}; ?>

                            </h6>


                        </div>

                    </div>
                </div>
                <?php 

                       
                       

                        foreach ($datewise as $date) {
                            $showdatewise   = $date['dates'];                        
                          
                      echo '               
                <table class="table table-sm table-bordered mt-3">
                    <thead>
                    <h6>Date ('.$showdatewise.'), Class ('.$_GET['studentatten'].')</h6>
                        <tr>
                            <th>Name</th>
                            <th>Roll No</th>
                            <th>Student id</th>
                            <th>Subject</th>
                            <th>Status</th>
                           

                        </tr>

                    </thead>';

                    $studentbox = $Students->studentDetails($showdatewise, $_GET['studentatten']);
                    $totalstudent = 00;
                    if ($studentbox != null || $studentbox != '') {
            
                    $totalstudent = count($studentbox);
            
                    }
                                   foreach ($studentbox as $showStudentDetailsshow) {
                                   $showname            = $showStudentDetailsshow['name'];
                                    $showstudent_id     = $showStudentDetailsshow['student_id'];
                                    $showsession        = $showStudentDetailsshow['session'];
                                    $showroll_no        = $showStudentDetailsshow['roll'];
                                    $showclass          = $showStudentDetailsshow['classname'];
                                    $showstatus         = $showStudentDetailsshow['status'];
                                    $showsubject        = 'All subject';
                                    $showdate           = $showStudentDetailsshow['dates'];
                                    if ($_GET['studentatten'] == 11 || $_GET['studentatten'] == 12) {
                                        $showsubject        = $showStudentDetailsshow['subject'];
                                    }
                    echo' 

                    <tbody>

                   <tr>

                      <td>'.$showname.'        </td>
                      <td>'.$showroll_no.'     </td>
                      <td>'.$showstudent_id.'  </td>
                      <td>'.$showsubject.'</td>
                      <td>'.$showstatus.'  </td>               

                      </tr>

                    </tbody>';}}?>

                </thead>
                </table>
                <p class="ps-4">date: <?php echo date("d.m.y");?></p>
            </div>
        </div>

        <?php
                                }
                            ?>





    </section>





    <div class="justify-content-center print-sec d-flex my-5">



        <button class="btn btn-primary shadow mx-2" onclick="history.back()">Go Back</button>



        <button class="btn btn-primary shadow mx-2" onclick="window.print()">Print </button>



    </div>



    <!-- Vendor JS Files -->



    <script src="../admin/assets/vendor/apexcharts/apexcharts.min.js"></script>



    <script src="../admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



    <script src="../admin/assets/vendor/chart.js/chart.min.js"></script>



    <script src="../admin/assets/vendor/echarts/echarts.min.js"></script>



    <script src="../admin/assets/vendor/quill/quill.min.js"></script>



    <script src="../admin/assets/vendor/simple-datatables/simple-datatables.js"></script>



    <script src="../admin/assets/vendor/tinymce/tinymce.min.js"></script>



    <script src="../admin/assets/vendor/php-email-form/validate.js"></script>



    <script src="../admin/assets/js/main.js"></script>







</body>



</html>



<?php
$page = "Student Attendance";
require_once '../_config/dbconnect.php';
require_once '../classes/student.class.php';
require_once '../includes/constant.php';
$Students = new  Student();
if(isset ($_GET['dayreport']) ){
    $studentbox=$Students->attendancechartday($_GET['dayreport'], $_GET['class']);
    }
    if(isset ($_GET['monthreport']) ){
    $studentbox=$Students->attendancechartmonth($_GET['monthreport'], $_GET['class']);
    }
    if(isset ($_GET['yearreport']) ){
    $studentbox=$Students->attendancechartyear($_GET['yearreport'], $_GET['class']);
    }

    if(isset ($_GET['totalreport']) ){
        $studentbox=$Students->attendancetotalreport($_GET['class']);
        }
        
    if(isset ($_GET['studentid']) ){
        $studentbox=$Students->attendancestudent($_GET['studentid']);
        }
  
    require_once '../classes/institutedetails.class.php';
    $revenue = new  InstituteDetails();
    $result=$revenue->instituteShow();
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Attendance Report - <?php echo SITE_NAME; ?></title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <!-- Favicons -->
    <link href="../admin/assets/img/favicon.png" rel="icon" />
    <link href="../admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
    <link href="path/to/file/interface.css" rel="stylesheet" type="text/css">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />
    <!-- Vendor CSS Files -->
    <link href="../admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="../admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="../admin/assets/vendor/quill/quill.snow.css" rel="stylesheet" />
    <link href="../admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
    <link href="../admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="../admin/assets/vendor/simple-datatables/style.css" rel="stylesheet" />
    <!-- Template Main CSS File -->
    <link href="../admin/assets/css/expenses.report.css" rel="stylesheet" />
    <!-- =======================================================

      * Template Name: NiceAdmin - v2.2.2

      * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/

      * Author: BootstrapMade.com

      * License: https://bootstrapmade.com/license/

      ======================================================== -->
    <style>
    th,
    p,
    h4,
    h6 {
        text-transform: capitalize;
    }
    </style>


</head>

<body>
    <section>
        <?php
            foreach($result as $row){
            ?>
        <div class="custom-container">
            <div class="custom-body ">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-sm-9">
                            <h2><?php    echo $row['institute_name']  ?></h2>
                            <p style="font-size: 14px;"><?php    echo $row['about']  ?><br>
                                <?php    echo $row['address']  ?> <br>
                            </p>
                        </div>
                        <div class="col-sm-3 border-start border-dark " style="line-height: 0.5rem;">
                            <h4 class="ps-4">Attendance Report Of Student</h4>
                            <h6 class="ps-4">Student Attendance /
                                <?php if(isset($_GET['dayreport'])){echo $_GET['dayreport'];}; 

                                                         if(isset($_GET['monthreport'])){echo $_GET['monthreport'];};



                                                         if(isset($_GET['yearreport'])){echo $_GET['yearreport'];}; 



                                                         if(isset($_GET['totalreport'])){echo $_GET['totalreport'];}; ?>

                            </h6>


                        </div>

                    </div>
                </div>

                <?php 
                    if ($studentbox == 0) {
                    echo "<h2>No Data Avilable.</h2>";

                    }
                    else
                    {

                        $totalstudent = 00;
                        if ($studentbox != null || $studentbox != '') {

                        $totalstudent = count($studentbox);

                        }

                    ?>
                <table class="table table-sm table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Roll No</th>
                            <th>Student id</th>
                            <th>Class</th>
                            <th>Batch</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Date</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php 
                       foreach ($studentbox as $showStudentDetailsshow) {
                       $showname            = $showStudentDetailsshow['name'];
                        $showstudent_id     = $showStudentDetailsshow['student_id'];
                        $showsession        = $showStudentDetailsshow['session'];
                        $showroll_no        = $showStudentDetailsshow['roll'];
                        $showclass          = $showStudentDetailsshow['classname'];
                        $showstatus         = $showStudentDetailsshow['status'];
                        $showsubject        = 'All';
                        $showdate           = $showStudentDetailsshow['dates'];
                        if ($_GET['class'] == 11 || $_GET['class'] == 12) {
                            $showsubject        = $showStudentDetailsshow['subject'];
                        }
                       
                      echo '<tr>

                      <td>'.$showname.'        </td>
                      <td>'.$showroll_no.'     </td>
                      <td>'.$showstudent_id.'  </td>
                      <td>'.$showclass.'       </td>
                      <td>'.$showsession.'</td>
                      <td>'.$showsubject.'  </td>
                      <td>'.$showstatus.'  </td>
                      <td>'.$showdate.'  </td>

                      </tr>';

    

                       } 

                       ?>

                    </tbody>
                    <?php   if(isset ($_GET['studentid']) ){
                    echo' <tr>

                    </tr>';
                    }?>
                    <?php   if(isset ($_GET['dayreport']) || isset ($_GET['monthreport']) || isset ($_GET['yearreport']) || isset ($_GET['totalreport'])){
                    echo' <tr>
                    <th></th>

                    <th></th>

                    <th></th>

                    <th></th>
                    <th></th>
                    <th></th>
                    <th> Total Student</th>

                    <th>'.$totalstudent.'</th>
                    </tr>';
                    }?>

                    </thead>
                </table>
                <p class="ps-4">date: <?php echo date("d.m.y");?></p>
            </div>
        </div>

        <?php
                                }}
                            ?>





    </section>





    <div class="justify-content-center print-sec d-flex my-5">



        <button class="btn btn-primary shadow mx-2" onclick="history.back()">Go Back</button>



        <button class="btn btn-primary shadow mx-2" onclick="window.print()">Print </button>



    </div>



    <!-- Vendor JS Files -->



    <script src="../admin/assets/vendor/apexcharts/apexcharts.min.js"></script>



    <script src="../admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



    <script src="../admin/assets/vendor/chart.js/chart.min.js"></script>



    <script src="../admin/assets/vendor/echarts/echarts.min.js"></script>



    <script src="../admin/assets/vendor/quill/quill.min.js"></script>



    <script src="../admin/assets/vendor/simple-datatables/simple-datatables.js"></script>



    <script src="../admin/assets/vendor/tinymce/tinymce.min.js"></script>



    <script src="../admin/assets/vendor/php-email-form/validate.js"></script>



    <script src="../admin/assets/js/main.js"></script>







</body>



</html>


<?php
session_start();
$page = "Student Attendance";


require_once '../_config/dbconnect.php';
require_once '../classes/admin.class.php';
require_once '../classes/student.class.php';
require_once '../classes/studdetails.class.php';
require_once '../includes/constant.php';

$Admin          = new Admin();
$Student        = new Student();
$StudentDetails  = new StudentDetails();


if(isset ($_POST["submit"])){

    $roll_nos       = $_POST["roll_no"];
    $names          = $_POST["name"];
   
    $statuses       = $_POST["status"];
    $studentIds     = $_POST["student_id"];
    $classes        = $_POST["class"];
    $sessions       = $_POST["session"];

    

    for ($i = 0; $i < count($studentIds); $i++)  {

        for ($i = 0; $i < count($roll_nos); $i++)  {

            for ($i = 0; $i < count($names); $i++)  {

                    for ($i = 0; $i < count($statuses); $i++)  {
                        for ($i = 0; $i < count($classes); $i++)  {

                            for ($i = 0; $i < count($sessions); $i++)  {

         $student_id   = $studentIds[$i];
         $roll_no      = $roll_nos[$i];
         $name         = $names[$i];
         
         $status        = $statuses[$i];

         $class         = $classes[$i];
         
         $session        = $sessions[$i];
         $date           = $_POST["date"];
         $subject        = $_POST["subject"];
        
        
        //  echo $subject;
        //  exit;

       $result = $Student->addattendance($roll_no, $name, $class, $status, $session, $student_id, $date, $subject);

        if($result){
        echo "<script>
        window.history.back();
        </script>";
        }
        else{
        echo "<script>
        window.history.back();

        </script>";                            
        }

    }}}}}}}

    $showStudentDetails   = $Student->studentClassatteb($_GET['studentatten'], $_GET['session']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Student Management / Student Attendance - <?php echo SITE_NAME; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->


    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/        classattendance.php studentattendeace.php studentclass.php siderbar.php
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <?php require_once 'require/navigationbar.php'; ?>
    <!-- End Header -->

    <!--======== sidebar ========-->
    <?php require_once 'require/sidebar.php'; ?>
    <!--======== End sidebar ========-->

    <main id="main" class="main">

        <!-- <div class="pagetitle">
            <h1>Student Attendance</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Student management</li>
                    <li class="breadcrumb-item active">Student Attendance</li>  
                </ol>
            </nav>
        </div> -->
        <!-- End Page Title -->



        <section class="section dashboard">

            <div class="col-sm-12">

                <div class="row">

                    <!-- Sales Card -->

                    <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-6">

                        <div class="card info-card sales-card">

                            <a
                                href="attendance-report.php?dayreport=Today<?php echo date("l") ?>&class=<?php echo $_GET['studentatten'] ?>">

                                <?php

                //    while ($row = $studentday ->fetch_object()):

                    ?>

                                <div class="card-body pt-2" style="padding: 0 0px 0px 20px;">

                                    <h7 class="card-title">Attendance <span>| Today</span></h7>

                                    <div class="d-flex align-items-center">

                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">

                                            <i class="bi bi-people"></i>

                                        </div>

                                        <div class="ps-3">

                                            <span class="text-success small pt-1 fw-bold">Students</span> <span
                                                class="text-muted small pt-2 ps-1">Attendance</span>
                                            <h6>
                                                <?php ?>
                                            </h6>
                                        </div>

                                    </div>

                                </div>

                            </a>

                        </div>

                    </div>

                    <?php

                    //   endwhile;

                ?>

                    <!-- sales no-2 -->

                    <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-6">

                        <div class="card info-card sales-card">

                            <a
                                href="attendance-report.php?monthreport=Month <?php echo date('M') ?>&class=<?php echo $_GET['studentatten'] ?>">

                                <?php

                //    while ($row = $studentmonth ->fetch_object()):

                    ?>

                                <div class="card-body pt-2" style="padding: 0 0px 0px 20px;">

                                    <h7 class="card-title">Attendance <span>| Last Month</span></h7>

                                    <div class="d-flex align-items-center">

                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">

                                            <i class="bi bi-people"></i>

                                        </div>

                                        <div class="ps-3">

                                            <span class="text-success small pt-1 fw-bold">Students</span> <span
                                                class="text-muted small pt-2 ps-1">Attendance</span>
                                            <h6>
                                                <?php ?>
                                            </h6>
                                        </div>

                                    </div>

                                </div>

                            </a>

                        </div>

                    </div>

                    <?php

            // endwhile;

                ?>

                    <!-- sales no-3 -->



                    <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-6">

                        <div class="card info-card sales-card">

                            <a
                                href="attendance-report.php?yearreport=Year <?php echo date('Y') ?>&class=<?php echo $_GET['studentatten'] ?>">

                                <?php

                //    while ($row = $studentyear ->fetch_object()):

                    ?>

                                <div class="card-body pt-2" style="padding: 0 0px 0px 20px;">

                                    <h7 class="card-title">Attendance <span>| Last Year</span></h7>

                                    <div class="d-flex align-items-center">

                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">

                                            <i class="bi bi-people"></i>

                                        </div>

                                        <div class="ps-3">
                                            <span class="text-success small pt-1 fw-bold">Students</span> <span
                                                class="text-muted small pt-2 ps-1">Attendance</span>
                                            <h6>
                                                <?php ?>
                                            </h6>

                                        </div>

                                    </div>

                                </div>

                            </a>

                        </div>

                    </div>

                    <?php

                    //   endwhile;

                ?>

                    <!-- sales no-4 -->

                    <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-6">

                        <div class="card info-card sales-card">

                            <a href="attendance-report.php?totalreport=Total&class=<?php echo $_GET['studentatten'] ?>">

                                <?php

                //    while ($row = $studenttotal ->fetch_object()):

                    ?>

                                <div class="card-body pt-2" style="padding: 0 0px 0px 20px;">

                                    <h7 class="card-title">Attendance <span>| Total</span></h7>

                                    <div class="d-flex align-items-center">

                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">

                                            <i class="bi bi-people"></i>

                                        </div>

                                        <div class="ps-3">

                                            <span class="text-success small pt-1 fw-bold">Students</span> <span
                                                class="text-muted small pt-2 ps-1">Attendance</span>
                                            <h6>
                                                <?php ?>
                                            </h6>

                                        </div>

                                    </div>

                                </div>

                            </a>

                        </div>

                    </div>

                    <?php

                    //   endwhile;

                ?>

                    <!-- date-selector start -->

                    <section>

                        <div class="card p-3 justify-content-center">

                            <div class="container">

                                <div class="row">

                                    <div class="col-lg-4 col-md-4">

                                        <form action="datewiseatt_report.php" method="GET">
                                            <input type="hidden" class="form-control" name="studentatten" value="<?php 
                                            if(isset($_GET['studentatten'])){echo $_GET['studentatten'];}
                                            ?>" />

                                            <div class="row mb-3 ">

                                                <label for="inputDate">From Date</label>

                                                <div>

                                                    <input type="date" class="form-control" name="searchstudent" value="<?php  
                                                 if(isset($_GET['searchstudent'])){echo $_GET['searchstudent']; }
                                                ?>">

                                                </div>

                                            </div>

                                    </div>

                                    <div class="col-lg-4 col-md-4">

                                        <div class="row mb-3 ">

                                            <label for="inputDate">To Date</label>

                                            <div>
                                                <input type="date" class="form-control" name="searchstudents" value="<?php 
                                            if(isset($_GET['searchstudents'])){echo $_GET['searchstudents'];}
                                            ?>" />

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-4 col-md-4 ">

                                        <div class="row mb-3 pt-4">

                                            <button type="text" class="btn btn-primary"
                                                style="margin: auto; display: inline-flex; width: 68%;justify-content: center; ">Find</button>

                                        </div>

                                    </div>

                                </div>

                                </form>

                            </div>

                        </div>

                    </section>

                    <!-- date-selector end -->

                </div>

            </div>

        </section>
        </section>




        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Attendance Table</h5>

                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="needs-validation" novalidate>
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Class</th>
                                            <th scope="col">Roll No</th>
                                            <th scope="col">Batch</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>


                                        <div class="row mb-3 m-0 p-0">
                                            <div class="row mb-3 m-0 p-0">
                                                <label for="inputDate" class="col-sm-2 col-form-label ">Date :</label>
                                                <div class="col-sm-4">
                                                    <input type="date" class="form-control" name="date" required>
                                                </div>
                                            </div>

                                            <?php
                                    if($_GET['studentatten'] == 1 || $_GET['studentatten'] == 2 || $_GET['studentatten'] == 3 || $_GET['studentatten'] == 4 || $_GET['studentatten'] == 5 || $_GET['studentatten'] == 6
                                    || $_GET['studentatten'] == 7 || $_GET['studentatten'] == 8 || $_GET['studentatten'] == 9 || $_GET['studentatten'] == 10){
                                    $i=1;
                                    if ($showStudentDetails == 0) {
                                    echo "No data Type Avilable.";
                                    }else{
                                    foreach ($showStudentDetails as $showStudentDetailsshow) {
                                    $showclass         = $showStudentDetailsshow['class'];
                                    $showname          = $showStudentDetailsshow['name'];
                                    $showstuid         = $showStudentDetailsshow['student_id'];
                                    $showid            = $showStudentDetailsshow['id'];
                                    $showroll_no       = $showStudentDetailsshow['roll_no'];
                                    $showacademic_year = $showStudentDetailsshow['academic_year'];
                                    ?>
                                            <tr>
                                                <th scope="row"><?php  echo $i         ?></th>
                                                <td><input type="hidden" class="form-control form_data" value=""
                                                        name="subject" id="subject">
                                                    <input type="hidden" class="form-control form_data"
                                                        value="<?php    echo $showname;  ?>" name="name[]" id="name">
                                                    <?php  echo $showname;             ?>
                                                </td>
                                                <td> <input type="hidden" class="form-control form_data"
                                                        value="<?php    echo $showstuid;  ?>" name="student_id[]"
                                                        id="student_id">
                                                    <input type="hidden" class="form-control form_data"
                                                        value="<?php    echo $showclass;  ?>" name="class[]" id="class">
                                                    <?php  echo $showclass;            ?>
                                                </td>
                                                <td><input type="hidden" class="form-control form_data"
                                                        value="<?php    echo $showroll_no;  ?>" name="roll_no[]"
                                                        id="roll_no">
                                                    <?php  echo $showroll_no;          ?></td>
                                                <td><input type="hidden" class="form-control form_data"
                                                        value="<?php    echo $showacademic_year;  ?>" name="session[]"
                                                        id="session">
                                                    <?php  echo $showacademic_year;    ?></td>
                                                <td>
                                                    <!-- <form> -->
                                                    <fieldset class="row ">
                                                        <div class="col-sm-4 d-flex">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="status[]" id="gridRadios1" value="Present"
                                                                    checked>
                                                                <label class="form-check-label" for="gridRadios1">
                                                                    P
                                                                </label>
                                                            </div>
                                                            <div class="form-check" style="padding-left: 2rem;">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="status[]" id="gridRadios2" value="Absent">
                                                                <label class="form-check-label" for="gridRadios2">
                                                                    A
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <!-- </form> -->
                                                </td>
                                            </tr>
                                            <?php  
                                        $i++;
                                      }   }}
                                      ?>



                                            <?php

                                    if($_GET['studentatten'] == 11 || $_GET['studentatten'] == 12){
                                    $showStudentDetails = $StudentDetails->showStudentmarkDetails($_GET['studentsubjecttype2'], $_GET['strem']);

                                    if ($showStudentDetails == 0) {
                                    echo  "Student Not Avilable.";
                                    }else{
                                    foreach($showStudentDetails as $row){

                                    $i=1;
                                    if ($showStudentDetails == 0) {
                                    echo "No data Type Avilable.";
                                    }else{
                                    foreach ($showStudentDetails as $showStudentDetailsshow) {
                                    $showclass         = $showStudentDetailsshow['class'];
                                    $showname          = $showStudentDetailsshow['name'];
                                    $showstuid         = $showStudentDetailsshow['student_id'];
                                    $showid            = $showStudentDetailsshow['id'];
                                    $showroll_no       = $showStudentDetailsshow['roll_no'];
                                    $showacademic_year = $showStudentDetailsshow['academic_year'];
                                    ?>
                                            <tr>
                                                <th scope="row"><?php  echo $i         ?></th>
                                                <td><input type="hidden" class="form-control form_data"
                                                        value="<?php    echo $_GET['studentsubjecttype'];  ?>"
                                                        name="subject" id="subject">
                                                    <input type="hidden" class="form-control form_data"
                                                        value="<?php    echo $showname;  ?>" name="name[]" id="name">
                                                    <?php  echo $showname;             ?>
                                                </td>
                                                <td> <input type="hidden" class="form-control form_data"
                                                        value="<?php    echo $showstuid;  ?>" name="student_id[]"
                                                        id="student_id">
                                                    <input type="hidden" class="form-control form_data"
                                                        value="<?php    echo $showclass;  ?>" name="class[]" id="class">
                                                    <?php  echo $showclass;            ?>
                                                </td>
                                                <td><input type="hidden" class="form-control form_data"
                                                        value="<?php    echo $showroll_no;  ?>" name="roll_no[]"
                                                        id="roll_no">
                                                    <?php  echo $showroll_no;          ?></td>
                                                <td><input type="hidden" class="form-control form_data"
                                                        value="<?php    echo $showacademic_year;  ?>" name="session[]"
                                                        id="session">
                                                    <?php  echo $showacademic_year;    ?></td>
                                                <td>
                                                    <!-- <form> -->
                                                    <fieldset class="row ">
                                                        <div class="col-sm-4 d-flex">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="status[]" id="gridRadios1" value="Present"
                                                                    checked>
                                                                <label class="form-check-label" for="gridRadios1">
                                                                    P
                                                                </label>
                                                            </div>
                                                            <div class="form-check" style="padding-left: 2rem;">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="status[]" id="gridRadios2" value="Absent">
                                                                <label class="form-check-label" for="gridRadios2">
                                                                    A
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <!-- </form> -->
                                                </td>
                                            </tr>
                                            <?php  
                                        $i++;
                                      }   }}}}
                                      ?>


                                    </tbody>

                                </table>
                                <button name="submit" type="submit" style="margin-top: -3rem;"
                                    class="btn btn-primary d-flex justify-content-end ms-auto">
                                    Submit
                                </button>
                            </form>

                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php require_once 'require/addfooter.php'; ?>

    <!-- Template Main JS File -->

    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
    </script>



</body>


</html>
