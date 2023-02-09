<?php
session_start();
$page = "Student Details";

require_once '../_config/dbconnect.php';
require_once '../classes/studdetails.class.php';
require_once '../classes/admin.class.php';


$Admin          = new admin();
$StudentDetails = new StudentDetails();
$showStudentDetails1 = $StudentDetails->showExamdata($_GET['studentgettypedata'] , $_GET['studentunittest1type']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Student Management / Student Details / NiceAdmin Bootstrap Template</title>
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

        <div class="pagetitle">
            <h1><?php  echo $_GET['studentunittest1type']  ?></h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Student Management</li>
                    <li class="breadcrumb-item ">Student Details</li>
                    <li class="breadcrumb-item ">Class <?php  echo $_GET['studentgettypedata']  ?></li>
                    <li class="breadcrumb-item active"><?php  echo $_GET['studentunittest1type']  ?></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <section class="section">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Attendance Table</h5>
                                <!-- Button trigger modal -->

                        
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                        
                                        <th scope="col">Roll no</th>
                                        <th scope="col">Student_id</th>
                                        <th scope="col">exam_id</th>
                                        <th scope="col">Marks</th>
                                        <th scope="col">Session</th>
                                        <th scope="col">Action</th>
                                                                                
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if ($showStudentDetails1 == 0) {
                                        echo "No data Type Avilable.";
                                        }else{
                                        foreach ($showStudentDetails1 as $showrow) {
                                        $showid = $showrow['id'];
                                        $showclass_id = $showrow['class_id'];
                                        $showstuid = $showrow['student_id'];
                                        $showmarks = $showrow['marks'];
                                        $showexam_id = $showrow['exam_id'];
                                        $showsession = $showrow['session'];
                                
                                    ?>
                                        
                                    <td><?php    echo $showclass_id   ?></td>
                                    <td><?php    echo $showstuid      ?></td>
                                    <td><?php    echo $showexam_id    ?></td>
                                    <td><?php    echo $showmarks      ?></td>
                                    <td><?php    echo $showsession    ?></td>
        
                                            <td>
                                            <i class="bi bi-eye-fill pe-4" data-bs-toggle="modal" data-bs-target="#editunitModal" id="<?php    echo $showid  ?>" onclick="editunit(this.id);"></i>
                                            <!-- Modal -->
                                            <div class="modal fade" id="editunitModal" tabindex="-1"
                                                aria-labelledby="editunitModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editunitModalLabel">
                                                                Forms
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body editunit-modal-body">

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- modal end -->
                                            <i class="bi bi-trash-fill" data-bs-toggle="modal" data-bs-target="#editunitModal" id="<?php    echo $showid  ?>" onclick="deletunit(this.id);"></i>
                                            <!-- Modal -->
                                            <div class="modal fade" id="editunitModal" tabindex="-1"
                                                aria-labelledby="editunitModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editunitModalLabel">
                                                                Forms
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body editunit-modal-body">

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- modal end -->
                                        </td>
                                        </tr>

                                        <?php
                                            }
                                            }   
                                        ?> 

                                    </tbody>
                                    
                                </table>
                                <!-- End Table with stripped rows -->
                            </div>
                        </div>
                    </div>
                </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php require_once 'require/addfooter.php'; ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendor/quill/quill.min.js"></script>

    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
 
    <script src="assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
    const editunit = (id) => {
        let url = 'ajax/editunit.ajax.php?exam=' + id;
        $(".editunit-modal-body").html('<iframe width="99%" height="300px" frameborder="0" allowtransparency="true" src="' + url + '"></iframe>')

    }

    const deletunit = (unit) => {
        let url = 'ajax/editunit.ajax.php?exam=' + unit;
        $(".editunit-modal-body").html('<iframe width="99%" height="300px" frameborder="0" allowtransparency="true" src="' + url + '"></iframe>')

    }

    </script>
    <script type="text/javascript">

function searchItem(searchFor){
    // var search_term = $(this).val();
    $.ajax({
        url : "student-list.ajax.php",
        type : "POST",
        data : {search:searchFor},
        success : function(data){
       $("#table-data").html(data);

        }
});

};

</script>
</body>

</html>
