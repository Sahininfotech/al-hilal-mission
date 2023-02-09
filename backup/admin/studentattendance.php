<?php
session_start();
$page = "Student Attendance";


require_once '../_config/dbconnect.php';
require_once '../classes/admin.class.php';
$Admin     = new Admin();
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Student Management / Add new Staff - NiceAdmin Bootstrap Template</title>
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
  * License: https://bootstrapmade.com/license/
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
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Attendance Table</h5>
                            <form>
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Class</th>
                                            <th scope="col">Roll No'</th>
                                            <th scope="col">Batch</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Brandon Jacob</td>
                                            <td>iii</td>
                                            <td>28</td>
                                            <td>2022</td>
                                            <td>
                                                <form>
                                                    <fieldset class="row ">
                                                        <div class="col-sm-4 d-flex">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="gridRadios" id="gridRadios1" value="option1"
                                                                    checked>
                                                                <label class="form-check-label" for="gridRadios1">
                                                                    P
                                                                </label>
                                                            </div>
                                                            <div class="form-check" style="padding-left: 2rem;">
                                                                <input class="form-check-input" type="radio"
                                                                    name="gridRadios" id="gridRadios2" value="option2">
                                                                <label class="form-check-label" for="gridRadios2">
                                                                    A
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                <button type="submit" style="margin-top: -3rem;"
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
   


</body>


</html>