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

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

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

                            <form method="POST" action="ajax/attendance.action.php" class="needs-validation" novalidate>
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Class</th>
                                            <th scope="col">Roll No</th>
                                            <th scope="col">Batch</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Submit</th>
                                        </tr>
                                    </thead>

                                    <tbody>


                                        <div class="row mb-3 m-0 p-0">
                                            <div class="row mb-3 m-0 p-0">
                                                <label for="inputDate" class="col-sm-2 col-form-label ">Date :</label>
                                                <div class="col-sm-4">
                                                    <input type="date" class="form-control" name="date" id="date"
                                                        required>
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

                                    $myuid = uniqid('inp');
                                    $idbtn = uniqid('btn');

                                    $shownameid    = $showid.$myuid.$_GET['studentatten'];
                                    $showbtnid     = $showid.$idbtn.$_GET['studentatten'];
                                    $showstudentid = $showid.$idbtn.$showstuid 
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
                                                        id="<?php  echo $showstudentid  ?>">
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

                                                    <input type="text" maxlength="3" id="<?php  echo $shownameid  ?>"
                                                        style="width: 4rem;" name="status[]" required>
                                                    <label class="form-check-label ps-3" id="<?php  echo $showbtnid ?>"
                                                        onclick='setAbsent("<?php    echo $shownameid  ?>", this.id)'>
                                                        P
                                                    </label>

                                                    <label class="form-check-label ps-3" id="<?php  echo $showbtnid ?>"
                                                        onclick='setAbsents("<?php    echo $shownameid  ?>", this.id)'>
                                                        A
                                                    </label>

                                                </td>

                                                <td>
                                                    <input type="button" id="save-button" class="btn btn-primary"
                                                        onclick='saveItem("<?php  echo $shownameid  ?>","<?php  echo $showstudentid  ?>", this.id, this.studentid)'
                                                        value="save">
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
                                            } }}
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

                                    $myuid = uniqid('inp');
                                    $idbtn = uniqid('btn');

                                    $shownameid    = $showid.$myuid.$_GET['studentatten'];
                                    $showbtnid     = $showid.$idbtn.$_GET['studentatten'];
                                    $showstudentid = $showid.$idbtn.$showstuid 
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
                                                        id="<?php  echo $showstudentid  ?>">
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

                                                    <input type="text" maxlength="3" id="<?php  echo $shownameid  ?>"
                                                        style="width: 4rem;" name="status[]" required>
                                                    <label class="form-check-label ps-3" id="<?php  echo $showbtnid ?>"
                                                        onclick='setAbsent("<?php    echo $shownameid  ?>", this.id)'>
                                                        P
                                                    </label>

                                                    <label class="form-check-label ps-3" id="<?php  echo $showbtnid ?>"
                                                        onclick='setAbsents("<?php    echo $shownameid  ?>", this.id)'>
                                                        A
                                                    </label>

                                                </td>

                                                <td>
                                                    <input type="button" id="save-button" class="btn btn-primary"
                                                        onclick='saveItem("<?php  echo $shownameid  ?>","<?php  echo $showstudentid  ?>", this.id, this.studentid)'
                                                        value="save">
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
                                    All Submit
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

    <script>
    const setAbsent = (i, btnId) => {
        console.log(i);

        let input = document.getElementById(i);
        let btn = document.getElementById(btnId);
        if (input.readOnly) {
            input.readOnly = false;
            input.value = "";

        } else {
            input.readOnly = true;
            input.value = "Present";

        }
    }

    const setAbsents = (i, btnId) => {
        console.log(i);

        let inputs = document.getElementById(i);
        let btns = document.getElementById(btnId);
        if (inputs.readOnly) {
            inputs.readOnly = false;
            inputs.value = "";

        } else {
            inputs.readOnly = true;
            inputs.value = "Absent";

        }
    }
    </script>

    <script>
    function saveItem(id, studentid) {

        let atten = document.getElementById(id);

        let student_ids = document.getElementById(studentid);

        //       $("#save-button").on("click",function(e)){

        //         e.preventDefault();

        var attendance = $(atten).val();

        var names = $("#name").val();

        var class_id = $("#class").val();

        var roll_nos = $("#roll_no").val();

        var studentId = $(student_ids).val();

        var sessions = $("#session").val();

        var dates = $("#date").val();

        var subjects = $("#subject").val();

        // var id1 = $("#id").val();

        // alert(marks1);

        $.ajax({

            url: "ajax/attendances.action.php",

            type: "POST",

            data: {
                status: attendance,
                name: names,
                session: sessions,
                class: class_id,
                student_id: studentId,
                roll_no: roll_nos,
                date: dates,
                subject: subjects
            },

            success: function(data) {
                alert(data);

            }

        });

    };
    </script>



</body>


</html>