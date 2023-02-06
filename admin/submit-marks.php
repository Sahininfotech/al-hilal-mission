<?php
session_start();
$page = "Student Details";

require_once '../_config/dbconnect.php';
require_once '../classes/admin.class.php';
require_once '../classes/studdetails.class.php';
require_once '../classes/institutedetails.class.php';
require_once '../classes/studdetails.class.php';





$Admin                  = new Admin();
$Institute              = new InstituteDetails();                                
$StudentDetails         = new StudentDetails();


$result                 = $Institute->instituteShow();

$showStudentDetails     = $StudentDetails->showStudentsubjectDetails1($_GET['studentsubjecttype']);
$showStudentfinalexam   = $StudentDetails->finalExampage($_GET['studentsubjecttype2'], $_GET['session']);
$showStudentDetails = $StudentDetails->showStudentmarkDetails($_GET['studentsubjecttype2'], $_GET['strem']);

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
                    <li class="breadcrumb-item"><a href="http://localhost/institute1/admin/addnewstudent.php">Student
                            Management</a></li>
                    <li class="breadcrumb-item "><a href="http://localhost/institute1/admin/studentdetails.php">Student
                            Details </a></li>
                    <li class="breadcrumb-item active">Submit Marks <?php   echo $_GET['studentsubjecttype']  ?></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">

            <div class="row">
                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto p-4">
                        <form method="POST" action="ajax/subject_marks.action1.php">
                            <table class="table">

                                <thead>
                                    <tr>
                                        <th scope="col">Roll no</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Guardian Name</th>
                                        <th scope="col"><?php   echo $_GET['studentsubjecttype']  ?></th>
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
                                        <!-- <div class="col-sm-4"> -->
                                        <label class="col-sm-2 col-form-label">Exam Name :</label>
                                        <div class="col-sm-4">
                                            <select class="form-select" aria-label="Default select example"
                                                name="exam_id" id="exam_id">
                                                <option selected>Exam Session</option>
                                                <?php

                                                        if ($showStudentfinalexam == 0) {
                                                        echo "Not Avilable.";
                                                        }else{
                                                        foreach ($showStudentfinalexam as $showStudentDetailsshow) {
                                                        $showclass = $showStudentDetailsshow['id'];
                                                        $showexam_name = $showStudentDetailsshow['exam_name'];
                                                        $studenttypeclass=$_GET['studentsubjecttype2'];
                                                        echo ' <option value="'.$showexam_name.'">'.$showexam_name.'</option>';}}?>
                                            </select>
                                        </div>

                                        <!-- =========== -->


                                        <?php
                                                        $myuid = uniqid('inp');
                                                        $idbtn = uniqid('btn');
                                                        if ($showStudentDetails == 0) {
                                                                echo  "Student Not Avilable.";
                                                                }else{
                                                        foreach($showStudentDetails as $row){
                                                        $showid = $row['id'];

                                                   

                                                        // if ($showtotals = ''){
                                                        //     $showtotal = "0";
                                                        // }else{
                                                        //     $showtotal = $rowsdata['sum'];
                                                        // }

                                                ?>

                                        <tr>
                                            <?php        $shownameid    = $row['id'].$myuid.$_GET['studentsubjecttype']  ?>
                                            <?php        $showbtnid     = $row['id'].$idbtn.$_GET['studentsubjecttype']  ?>
                                            <?php        $showstudentid = $row['id'].$idbtn.$row['student_id']           ?>
                                            <?php        $showclassid   = $row['id'].$idbtn.$row['name']                 ?>
                                            <?php        $showsubmitid  = $idbtn.$row['name']                            ?>


                                            <td><?php  echo $row['roll_no']  ?></td>
                                            <td>
                                                <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo  $row['id']  ?>" name="id[]" id="id">

                                                  <?php 
                                                   $showStudent = $StudentDetails->Totalmarks($row['student_id'], $row['class'], $row['academic_year']);
                                                   foreach($showStudent as $rowsdata){
                                                       $showtotal = $rowsdata['sum'];
                                                  if ($showtotal == ''){?>
                                                            <input type="hidden" class="form-control form_data"
                                                             value="0" name="totalmark[]" id="totalmark">
                                                       <?php  }else{?>
                                                          <input type="hidden" class="form-control form_data"
                                                            value="<?php  echo $showtotal  ?>" name="totalmark[]" id="totalmark">
        
                                                      <?php  }
                                                        ?>



                                                <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo $row['student_id']  ?>" name="student_id[]"
                                                    id="<?php  echo $showstudentid  ?>">
                                                <?php echo $row['name']  ?>
                                            </td>

                                            <td>
                                                <input type="hidden" class="form-control form_data"
                                                    value="<?php    echo $_GET['studentsubjecttype']  ?>"
                                                    name="subject_id" id="subject_id">
                                                <input type="hidden" class="form-control form_data"
                                                    value="<?php  echo $row['class'] ?>" name="class_id" id="class_id">
                                                <?php    echo $row['gurdian_name']  ?>
                                            </td>

                                            <td>
                                                <input type="text" maxlength="3" id="<?php  echo $shownameid  ?>"
                                                    style="width: 4rem;" name="marks[]" required>
                                                <i class="bi bi-x-lg ps-3" id="<?php  echo $showbtnid ?>"
                                                    onclick='setAbsent("<?php    echo $shownameid  ?>", this.id)'></i>

                                                    <i class="fa-solid fa-a ps-3" id="<?php  echo $showbtnid ?>"
                                                    onclick='setAbsents("<?php    echo $shownameid  ?>", this.id)'></i>
                                            </td>

                                            <td>
                                                <input type="button" id="save-button" class="btn btn-primary"
                                                    onclick='saveItem("<?php  echo $shownameid  ?>","<?php  echo $showstudentid  ?>", this.id, this.studentid)'
                                                    value="save">
                                            </td>
                                        </tr>

                                        <?php
                                            }  }}
                                                 ?>

                                </tbody>
                            </table>
                            <div class=" d-flex justify-content-center align-items-center">
                                <button class="btn btn-primary shadow mx-2" onclick="history.back()">Go Back</button>
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
                input.value = "X";
               
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
                inputs.value = "p";
               
            }
        }
        </script>

        <script>
        function saveItem(id, studentid) {
            let marks2 = document.getElementById(id);
            let student_id = document.getElementById(studentid);
            //       $("#save-button").on("click",function(e)){
            //         e.preventDefault();
            var marks1 = $(marks2).val();
            var exam_id1 = $("#exam_id").val();
            var session1 = $("#session").val();
            var class_id1 = $("#class_id").val();
            var student_id1 = $(student_id).val();
            var subject_id1 = $("#subject_id").val();
            var totalmark1 = $("#totalmark").val();
            // var id1 = $("#id").val();
            alert(marks1);
            $.ajax({
                url: "ajax/subject_marks.action.php",
                type: "POST",
                data: {
                    subject_id11: subject_id1,
                    exam_id11: exam_id1,
                    session11: session1,
                    class_id11: class_id1,
                    student_id11: student_id1,
                    marks11: marks1,
                    totalmark11: totalmark1
                },
                success: function(data) {
                    alert(data);
                }
            });
        };
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- <script scr="ajax.js"></script> -->
    <!-- End #main -->


    <?php require_once 'require/addfooter.php'; ?>
</body>

</html>