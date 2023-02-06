<?php 
session_start();
$page ="Add New Student";

require_once '../_config/dbconnect.php';
require_once '../classes/admin.class.php';
require_once '../classes/classes.class.php';
require_once '../classes/department.class.php';
require_once '../classes/institutedetails.class.php';
require_once '../classes/student.class.php';


$Admin      = new Admin();
$Classes    = new Classes();
$Departments    = new Departments();
$InstituteDetails   = new InstituteDetails();
$Student   = new Student();
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Add new Student - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php require_once 'require/headerLinks.php';?>
    <style>
    .genderingrow {
        margin: auto;
        display: inline-flex;
        justify-content: space-evenly;
    }

    @media (min-width:100px) and (max-width:359px) {

        .genderingrow {
            display: inline;
        }
    }
    </style>

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
            <h1>Add New Student</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Student management</li>
                    <li class="breadcrumb-item active">Add New Student</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="container p-0">


                <div class="card">
                    <div class="card-body pt-0 p-3">
                        <h5 class="card-title p-2"></h5>

                        <!-- staffform -->
                        <!-- ajax/addnewstudent.ajax.php -->
                        <form method="POST" action="admission-fees-clearetion.php" ; class="needs-validation m-0"
                            enctype="multipart/form-data" runat="server" novalidate>


                            <div class="row m-0 p-0 mb-3">
                                <label for="inputText" class="col-xl-2 col-lg-2 col-form-label">Profile Image :</label>
                                <div class="col-sm-10">
                                    <img src="#" width=110 height=105 alt="" onerror="this.src='assets/img/user.jpg';"
                                        width=100 height=100 class="rounded-circle" id="output">
                                </div>
                            </div>

                            <div class="row m-0 p-0 mb-3">
                                <label for="inputText" class="col-xl-2 col-lg-2 col-form-label">Upload Image :</label>
                                <div class="col-xl-10 col-lg-10 p-0">
                                    <input class="form-control" id="formFile" type="file" name="image" accept="image/*"
                                        onchange="loadFile(event)">
                                </div>
                            </div>

                            <div class="row m-0 p-0 mb-3">
                                <label for="inputText" class="col-xl-2 col-lg-2 col-form-label">Name :</label>
                                <div class="col-xl-10 col-lg-10 p-0">
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                            <div class="row m-0 p-0 mb-3">
                                <label for="inputPassword" class="col-xl-2 col-lg-2 col-form-label">Parent's Name
                                    :</label>
                                <div class="col-xl-10 col-lg-10 p-0">
                                    <input type="text" class="form-control" name="gurdian_name" required>
                                </div>
                            </div>
                            <div class="row  m-0 p-0 ">
                                <label for="inputEmail" class="col-xl-2 col-lg-2  col-form-label">Email Id :</label>
                                <div class="col-xl-4 col-lg-4 p-0 mb-3">
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <label for="inputNumber" class="col-xl-2 col-lg-2 col-form-label">Contact No :</label>
                                <div class="col-xl-4 col-lg-4 mb-3 p-0">
                                    <input type="number" class="form-control" name="contact_no"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        maxlength="10" required>
                                </div>
                            </div>



                            <fieldset class="row  m-0 p-0">
                                <label for="inputDate" class="col-xl-2 col-lg-2 col-form-label">Date of Birth :</label>
                                <div class="col-xl-4 col-lg-4 p-0 mb-3">
                                    <input type="date" class="form-control" name="date_of_birth" required>
                                </div>
                                <legend class="col-form-label col-xl-2 col-lg-2 pt-2">Gender :</legend>
                                <div class="col-xl-4 col-lg-4 mb-3 p-0 genderingrow">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gridRadios1"
                                            value="Male" required>
                                        <label class="form-check-label" for="gridRadios1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gridRadios2"
                                            value="Female" required>
                                        <label class="form-check-label" for="gridRadios2">
                                            Female
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gridRadios2"
                                            value="transgender" required>
                                        <label class="form-check-label" for="gridRadios2">
                                            Transgender
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row  m-0 p-0">
                                <label class="col-xl-2 col-lg-2 col-form-label">Session :</label>
                                <div class="col-xl-4 col-lg-4 mb-3 p-0">
                                    <select class="form-select" aria-label="Default select example" name="session"
                                        id="session" required>
                                        <option disabled selected value>Academic Session</option>
                                        <?php
                                            $result = $InstituteDetails->instituteShow(); 
                                            foreach($result as $row){
                                        ?>
                                        <option value="<?php echo $row['session']; ?>"><?php echo $row['session']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <label for="inputPassword" class="col-xl-2 col-lg-2 col-form-label">Roll Number
                                    :</label>
                                <div class="col-xl-4 col-lg-4 mb-3 p-0">
                                    <input type="number" class="form-control" name="roll_no" required>
                                </div>
                            </div>
                            <div class="row mb-3 m-0 p-0">
                                <label class="col-xl-2 col-lg-2 col-form-label"> Class :</label>
                                <div class="col-xl-4 col-lg-4 p-0">
                                    <select class="form-select" id="form-select" onclick="Func_a()"
                                        aria-label="Default select example" name="class" required>
                                        <option disabled selected value>Select Your Class</option>
                                        <?php
                                         $classList = $Classes->classesList();
                                         foreach ($classList as $class) {
                                            echo '<option value="'.$class['id'].'">'.$class['classname'].'</option>';

                                         }
                                        ?>
                                    </select>
                                </div>
                                <label class="col-xl-2 col-lg-2 col-form-label" id="demo2" style="display: none;">Stream
                                    :</label>
                                <div class="col-xl-4 col-lg-4 p-0">
                                    <select class="form-select" aria-label="Default select example" name="stream"
                                        id="demo3" style="display: none;">
                                        <option disabled selected value>Select Departments</option>
                                        <?php
                                            $depts = $Departments->showDepartments();
                                            foreach ($depts as $dept) {
                                                echo '<option value="'.$dept['department_name'].'">'.$dept['department_name'].'</option>';
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row m-0 p-0 mb-3">
                                <label for="inputText" class="col-xl-2 col-lg-2 col-form-label">Address :</label>
                                <div class="col-xl-10 col-lg-10 p-0">
                                    <textarea class="form-control" name="address" maxlength="355" style="height: 60px"
                                        required></textarea>
                                </div>
                            </div>


                            <div class="row m-0 p-0">
                                <label for="inputText" class="col-xl-2 col-lg-2 col-form-label">Post Office :</label>
                                <div class="col-xl-4 col-lg-4 mb-3 p-0">
                                    <input type="text" class="form-control" name="post_office" required>
                                </div>
                                <label for="inputText" class="col-xl-2 col-lg-2 col-form-label">SDO/BDO :</label>
                                <div class="col-xl-4 col-lg-4 mb-3 p-0">
                                    <input type="text" class="form-control" name="sdo_or_bdo" required>
                                </div>
                            </div>
                            <div class="row  m-0 p-0">
                                <label for="inputText" class="col-xl-2 col-lg-2 col-form-label">Police Station :</label>
                                <div class="col-xl-4 col-lg-4 mb-3 p-0">
                                    <input type="text" class="form-control" name="police_station" required>
                                </div>
                                <label for="inputText" class="col-xl-2 col-lg-2 col-form-label">District :</label>
                                <div class="col-xl-4 col-lg-4 mb-3 p-0">
                                    <input type="text" class="form-control" name="district" required>
                                </div>
                            </div>
                            <div class="row  m-0 p-0">
                                <label for="inputText" class="col-xl-2 col-lg-2 col-form-label">Pin Code :</label>
                                <div class="col-xl-4 col-lg-4 mb-3 p-0">
                                    <input type="number"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        type="number" maxlength="6" maxlength="6" class="form-control" name="pin_code"
                                        required>
                                </div>
                                <label for="inputText" class="col-xl-2 col-lg-2 col-form-label">State :</label>
                                <div class="col-xl-4 col-lg-4 mb-3 p-0">
                                    <input type="text" maxlength="80" maxlength="80" class="form-control" name="state"
                                        required>
                                </div>
                            </div>



                            <div class="row mb-3 m-0 p-0" style="margin-top: 2.5rem;">

                                <div class="col-xl-12 col-lg-12  d-flex justify-content-center align-items-center">
                                    <button type="submit" class="btn btn-primary" name="submit">Submit Form</button>
                                </div>
                            </div>

                        </form>

                        <!-- End staffform -->

                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->


    <!-- ======= Footer ======= -->
    <?php require_once 'require/addfooter.php'; ?>
    <script>
    function Func_a() {
        var demo_two = document.getElementById('demo2');
        var demo = document.getElementById('form-select');
        if (demo.value == 11 || demo.value == 12) {
            demo_two.style.display = "block";
        } else {
            demo_two.style.display = "none";
        }
        var demo_two = document.getElementById('demo3');
        var demo = document.getElementById('form-select');
        if (demo.value == 11 || demo.value == 12) {
            demo_two.style.display = "block";
        } else {
            demo_two.style.display = "none";
        }
    }
    </script>

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

    <!-- preview-image- runat="server"-onchange="loadFile(event)-->
    <script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
    </script>
    <!-- preview-image-end -->

</body>

</html>
<!-- padding-bottom: -0.5rem; -->