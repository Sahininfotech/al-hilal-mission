<?php
session_start();
$page = "Student Details";

require_once '../_config/dbconnect.php';
require_once '../classes/admin.class.php';
require_once '../classes/studdetails.class.php';
require_once '../classes/institutedetails.class.php';
require_once '../classes/studdetails.class.php';
require_once '../classes/student.class.php';
require_once '../classes/fees-accounts.class.php';





$Admin                  = new Admin();
$Institute              = new InstituteDetails();                                
$StudentDetails         = new StudentDetails();
$Student                = new Student();
$FeesAccount            = new FeesAccount();


$result                 = $Institute->instituteShow();

$showStudentDetails   = $Student->studentByClass($_GET['class'], $_GET['session']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Student Management / Student Details / NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/css/fontawesome-all.min.css" rel="stylesheet">
    <?php require_once "require/headerLinks.php"; ?>
</head>

<body>
    <!-- ======= Header ======= -->
    <?php require_once 'require/navigationbar.php'; ?>
    <!-- End Header -->


    <main id="main" class="main w-100 ms-0">

        <div class="pagetitle">
            <h1>Submit Marks</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="addnewstudent.php">Student
                            Management</a></li>
                    <li class="breadcrumb-item "><a href="studentdetails.php">Student
                            Details </a></li>
                    <li class="breadcrumb-item active">Submit Marks <?php   echo $_GET['class']  ?></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">

            <div class="row">
                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto p-4">
                        <form method="POST" action="classupdate.php?class=<?php   echo $_GET['class']  ?>">
                            <table class="table">

                                <thead>
                                    <tr>
                                        <th scope="col">Roll no</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Guardian Name</th>
                                        <th scope="col">Student Id</th>
                                        <th scope="col">Submit</th>
                                    </tr>
                                </thead>

                                <tbody>


                                    <div class="row mb-3">

                                        <!-- =============== -->

                                        <label class="col-sm-2 col-form-label">Academic Year :</label>
                                        <div class="col-sm-4">

                                            <input type="text" class="form-control"
                                                value="<?php  echo  $_GET['session']  ?>" name="session" id="session"
                                                readonly>

                                        </div>

                                        <!-- =============== -->


                                        <?php
                                        $i=1;
                 if ($showStudentDetails == 0) {
                  echo "No data Type Avilable.";
                 }else{
               foreach ($showStudentDetails as $showStudentDetailsshow) {
                $showclass            = $showStudentDetailsshow['class'];
                $showname             = $showStudentDetailsshow['name'];
                $showstuid            = $showStudentDetailsshow['student_id'];
                $showid               = $showStudentDetailsshow['id'];
                $showroll_no          = $showStudentDetailsshow['roll_no'];
                $showgurdian_name     = $showStudentDetailsshow['gurdian_name'];
                $showstream           = $showStudentDetailsshow['stream'];

                $showaddress          = $showStudentDetailsshow['address'];
                $showcontact_no       = $showStudentDetailsshow['contact_no'];
                $showpost_office      = $showStudentDetailsshow['post_office'];
                $showpolice_station   = $showStudentDetailsshow['police_station'];
                $showpin_code         = $showStudentDetailsshow['pin_code'];

                $showsdo_or_bdo       = $showStudentDetailsshow['sdo_or_bdo'];
                $showdistrict         = $showStudentDetailsshow['district'];
                $showstate	          = $showStudentDetailsshow['state'];
                $showdate_of_birth    = $showStudentDetailsshow['date_of_birth'];
                $showadded_by         = $showStudentDetailsshow['added_by'];
                $showadded_on         = $showStudentDetailsshow['added_on'];
              

                $showacademic_year    = $showStudentDetailsshow['academic_year'];
                $showdate             = $showStudentDetailsshow['date'];

                $StudentDetails   = $FeesAccount->schowAmount($showstuid, $showacademic_year);
                foreach ($StudentDetails as $showStudentDetails) {

                    $showtotal_amount     = $showStudentDetails['payable_fee'];
                    $showtotal_due        = $showStudentDetails['total_due'];

                         ?>


                                        <tr>
                                            <td>
                                                <?php  echo  $i;        ?>
                                                <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo  $showstuid;  ?>" name="student_id[]" id="id">

                                                <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo  $showclass;  ?>" name="class" id="class">

                                                <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo  $showroll_no;  ?>" name="roll_no[]"
                                                    id="roll_no">


                                                <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo  $showaddress;  ?>" name="address[]"
                                                    id="address">

                                                <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo  $showcontact_no;  ?>" name="contact[]"
                                                    id="roll_no">

                                            </td>
                                            <td>
                                                <?php  echo  $showname;  ?>
                                                <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo  $showname;  ?>" name="name[]" id="name">

                                                <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo  $showpost_office;  ?>" name="post_office[]"
                                                    id="post_office">
                                            </td>
                                            <td>
                                                <?php  echo  $showgurdian_name;  ?>
                                                <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo  $showgurdian_name;  ?>" name="gurdian[]"
                                                    id="gurdian">

                                                <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo  $showtotal_amount;  ?>" name="total_amount[]"
                                                    id="roll">

                                                <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo  $showstream;  ?>" name="stream[]" id="stream">

                                                <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo  $showtotal_due;  ?>" name="total_due[]"
                                                    id="total_due">

                                                <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo  $showpolice_station;  ?>"
                                                    name="police_station[]" id="police_station">
                                            </td>

                                            <td>
                                                <?php  echo  $showstuid;  ?>

                                                <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo  $showpin_code;  ?>" name="pin_code[]"
                                                    id="total_due">

                                                <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo  $showsdo_or_bdo;  ?>" name="sdo_or_bdo[]"
                                                    id="sdo_or_bdo">

                                                <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo  $showstate;  ?>" name="state[]"
                                                    id="district">

                                                <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo  $showdistrict;  ?>" name="district[]"
                                                    id="district">
                                            </td>

                                            <td>
                                                <?php  echo  $showgurdian_name;  ?>

                                                <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo  $showdate_of_birth;  ?>" name="date_of_birth[]"
                                                    id="date_of_birth">

                                                    <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo  $showadded_by;  ?>" name="dded_by[]"
                                                    id="dded_by">


                                                    <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo  $showadded_on;  ?>" name="added_on[]"
                                                    id="added_on">

                                                    <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo  $showdate;  ?>" name="date[]"
                                                    id="date">

                                                    <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo  $showacademic_year;  ?>" name="academic_year[]"
                                                    id="academic_year">
                                            </td>


                                        </tr>

                                        <?php
                                                $i++;  }}}
                                                ?>

                                </tbody>
                            </table>
                            <div class=" d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn btn-primary" name="Submitdata">All Submit</button>
                            </div>

                            <!-- <div class=" d-flex justify-content-center align-items-center">     
                                <button type = "button" class="btn btn-primary"><a href = "http://localhost/institute1/admin/studentdetails.php">Back</a></button>
                                </div> -->

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script scr="ajax.js"></script> -->
    <!-- End #main -->


    <?php require_once 'require/addfooter.php'; ?>
</body>

</html>