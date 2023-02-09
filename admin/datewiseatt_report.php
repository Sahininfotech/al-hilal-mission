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
                            if ($_GET['studentatten'] == 1 || $_GET['studentatten'] == 2 || $_GET['studentatten'] == 3 || $_GET['studentatten'] == 4 || $_GET['studentatten'] == 5 || $_GET['studentatten'] == 6 || $_GET['studentatten'] == 7 || $_GET['studentatten'] == 8|| $_GET['studentatten'] == 9 || $_GET['studentatten'] == 10) {                      
                          
                      echo '               
                <table class="table table-sm table-bordered mt-3">
                    <thead>
                    <h6>Date ['.$showdatewise.'], Class ['.$_GET['studentatten'].']</h6>
                        <tr>
                            <th>Name</th>
                            <th>Roll No</th>
                            <th>Student id</th>
                            <th>Status</th>
                           

                        </tr>

                    </thead>';}

                    if ($_GET['studentatten'] == 11 || $_GET['studentatten'] == 12) {
                    echo '               
                    <table class="table table-sm table-bordered mt-3">
                        <thead>
                        <h6>Date ['.$showdatewise.'], Class ['.$_GET['studentatten'].']</h6>
                            <tr>
                                <th>Name</th>
                                <th>Roll No</th>
                                <th>Student id</th>
                                <th>Subject</th>
                                <th>Status</th>
                               
    
                            </tr>
    
                        </thead>';}

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
                                    $showdate           = $showStudentDetailsshow['dates'];
                                    if ($_GET['studentatten'] == 11 || $_GET['studentatten'] == 12) {
                                        $showsubject        = $showStudentDetailsshow['subject'];
                                    }
                                    if ($_GET['studentatten'] == 1 || $_GET['studentatten'] == 2 || $_GET['studentatten'] == 3 || $_GET['studentatten'] == 4 || $_GET['studentatten'] == 5 || $_GET['studentatten'] == 6 || $_GET['studentatten'] == 7 || $_GET['studentatten'] == 8|| $_GET['studentatten'] == 9 || $_GET['studentatten'] == 10) { 
                    echo' 

                    <tbody>

                   <tr>

                      <td>'.$showname.'        </td>
                      <td>'.$showroll_no.'     </td>
                      <td>'.$showstudent_id.'  </td>
                      <td>'.$showstatus.'  </td>               

                      </tr>

                    </tbody>';}
                    if ($_GET['studentatten'] == 11 || $_GET['studentatten'] == 12) {
                
                    echo' 

                    <tbody>

                   <tr>

                      <td>'.$showname.'        </td>
                      <td>'.$showroll_no.'     </td>
                      <td>'.$showstudent_id.'  </td>
                      <td>'.$showsubject.'</td>
                      <td>'.$showstatus.'  </td>               

                      </tr>

                    </tbody>';}
                
                }}
                    
                    
                    
                    ?>

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