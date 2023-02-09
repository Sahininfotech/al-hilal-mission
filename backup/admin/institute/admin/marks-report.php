<?php
$page = "Marks Report";

require_once '../_config/dbconnect.php';
require_once '../classes/studdetails.class.php';
$StudentDetails = new StudentDetails();

$showStudentfinalexam = $StudentDetails->finalExampage($_GET['studentclass'], $_GET['session']);
$showStudentDetails = $StudentDetails->showStudentsubjectDetails1($_GET['studentclass']);
$marktotal= $StudentDetails->Studentmarktotal($_GET['studentid'], $_GET['session']);
$classnumber = $StudentDetails->numberOfClass($_GET['studentclass']);

 $Studentdata= $StudentDetails->Studentmark($_GET['studentid']);
// SELECT marks FROM `subject_marks` WHERE `class_id` LIKE '1' AND `student_id` LIKE 'STUD18841' AND `exam_id` LIKE 'unit_2' AND `subject_id` LIKE 'Science'


// SELECT marks FROM `subject_marks` WHERE `class_id` LIKE '9' AND `student_id` LIKE 'STUD61768';

require_once '../classes/institutedetails.class.php';

$institute = new  InstituteDetails();

$result=$institute->instituteShow();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Student Management / Student Details / Studentclass-1- NiceAdmin Bootstrap Templatee</title>
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
  ======================================================== -->



    <style>
    body {
        /* background-color: #c5cae9; */
        /* padding: 25px; */
    }

    .markssdiv h2 {
        text-align: center;
    }

    table {
        margin: 0 auto;
    }

    td,
    th {
        font-size: 14.5px;
        padding: 12px;
        border: 2px solid;
    }

    tr {
        border-bottom: 2px solid black;
    }

    .info-student {
        outline: 2px solid black;
        padding: 1rem;
        margin: 20px 3px;
    }

    .datecol {
        display: flex;

    }

    .principlecol {
        display: flex;
        justify-content: center;
        border-top: 2px solid;
        /* width: 16rem; */
    }
    </style>
</head>

<body>
    <section class="section dashboard">
        <?php

foreach($result as $row){
    foreach($Studentdata as $rowdata){
?>
        <div class="custom-container">
            <div class="custom-body ">
                <div class="card-body ">
                    <div class="row" style="align-items: center;">
                        <div class="col-sm-2  ">
                            <img src="assets/img/1mg121.jpg" alt="Profile" class="rounded-circle w-100">
                            <!-- <h4 class="ps-4">Marksheet</h4>
                            <h6 class="ps-4">Class / 1</h6>
                            <p class="ps-4">date: 15/05/2022</p> -->
                        </div>
                        <div class="col-sm-10">
                            <h2><?php    echo $row['institute_name']  ?></h2>
                            <p style="font-size: 14px;"><?php    echo $row['about']  ?><br>
                                <?php    echo $row['address']  ?>
                            </p>
                        </div>
                        <!--  -->
                    </div>
                </div>
                <section class="section dashboard">
                    <!-- Left side columns -->
                    <div class="col-lg-12">
                        <div class="row">

                            <!-- Recent Sales -->
                            <div class="col-12">
                                <div class="card recent-sales overflow-auto" style="border: none;">
                                    <div class="card-body">
                                        <div class="markssdiv">
                                            <div class="row info-student">
                                                <div class="col-8">
                                                    <h6>Name : <?php    echo $rowdata['name']  ?></h6>
                                                    <h6>Father's Name : <?php    echo $rowdata['gurdian_name'] ?></h6>
                                                    <h6>Mother's Name : Afsari Begum</h6>
                                                </div>
                                                <div class="col-4">
                                                    <h6>Roll Number : <?php    echo $rowdata['roll_no']  ?></h6>
                                                    <h6>Class : <?php    echo $rowdata['class'] ;}?></h6>
                                                    <h6>section : A</h6>
                                                </div>

                                            </div> <!-- <h2>Marksheet</h2> -->


                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Sl No'</th>
                                                        <th>Subject Name</th>
                                                        <?php

                                                            if ($showStudentfinalexam == 0) {
                                                            echo "Not Avilable.";
                                                            }else{
                                                                $totalmark = 0;
                                                            foreach ($showStudentfinalexam as $showStudentDetailsshow) {
                                                            $showclass = $showStudentDetailsshow['id'];
                                                            $showexam_name = $showStudentDetailsshow['exam_name'];
                                                            $showmax_marks = $showStudentDetailsshow['max_marks'];
                                                            $totalmark += $showStudentDetailsshow['max_marks'];

                                                            echo ' <th>'.$showexam_name.'(FM-'.$showmax_marks.')</th> '; 

                                                            foreach ($classnumber as $class) {
                                                                
                                                                $showclasscount = $class['classnumber'];
                                                                $totalnumber = $showclasscount * $totalmark;
                                                               
                                                        }}}
                                                            
                                                            ?>

                                                        <th>Total Marks(FM-<?php   echo $totalmark  ?>)</th>
                                                        <th>Marks Obtain</th>
                                                        <th>Final Grade </th>
                                                    <tr>
                                                </thead>
                                                <tbody>

                                                    <?php   
                                                    $i=1;            
                                                    if ($showStudentDetails == 0) {
                                                    echo "No data Type Avilable.";
                                                    }
                                                    else
                                                    {

                                                    foreach ($showStudentDetails as $showStudentDetails) {
                                                        $showstudentsubject = $showStudentDetails['subject'];
                                                        $showclassstudent   = $showStudentDetails['class_name']; 
                                                        $showid             = $showStudentDetails['id'];
                                                   
                                                       $showStudent= $StudentDetails->showStudentmark($showStudentDetails['subject'], $_GET['studentid'], $_GET['session']);
                                                       foreach ($marktotal as $StudentMT) {
                                                        $showTotal       = $StudentMT['Total'];
                                                        $Percentage  = $showTotal/$totalnumber*100;
                                                       }
                                                    ?>
                                                    <tr>
                                                        <td><?php    echo $i                   ?></td>
                                                        <th><?php    echo $showstudentsubject  ?></th>
                                                        <?php  
                                                        $sum = 0;
                                                       
                                                        foreach ($showStudent as $showStudentresult) {
                                                        $sum += $showStudentresult['marks'];
                                                        
                                                        $showmarks          = $showStudentresult['marks'];
                                                        echo '<td>'.$showmarks.'</td>';  

                                                        $subPercentage  =  $sum/$totalmark*100;

                                                      

                                                        
                                                        }  

                                                        ?>
                                                        <td><?php    echo $totalmark  ?></td>
                                                        <td><?php    echo $sum  ?>=<?php    echo $subPercentage  ?></td>

                                                        <td><?php
                                                        // if($subPercentage >= 10) echo 'Faill';
                                                         
                                                        
                                                              if ($subPercentage >= 10 && $subPercentage <=0) echo "Faill";
                                                             
                                                            
                                                            //   if ($subPercentage >= 20 && $subPercentage <=11)
                                                            //     echo "C";
                                                              
                                                            // if ($subPercentage >= 40 && $subPercentage <=21)
                                                            //   echo "B";
                                                            
                                                            //   if ($subPercentage >= 60 && $subPercentage <=41)
                                                            //     echo "B+";
                                                              
                                                               if ($subPercentage >= 80 && $subPercentage <=71)
                                                                   echo "A";
                                                                
                                                                  if ($subPercentage >= 90 && $subPercentage <=81)
                                                                       echo "A+";
                                                                    
                                                            //             if ($subPercentage >= 100 && $subPercentage <=91)
                                                            //                 echo "O";
                                                                         
                                                                          
                                                        
                                                          ?></td>
                                                    </tr>
                                                    <?php   $i++; }}}?>
                                                    <tr>
                                                        <th colspan="4" class="text-center"></th>
                                                        <th colspan="2" class="text-center">Percentage :</th>
                                                        <th colspan="2" class="text-center">
                                                            <?php   echo "$Percentage%" ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="4" class="text-center"></th>
                                                        <th colspan="2" class="text-center">Class Rank :</th>
                                                        <th colspan="2" class="text-center">1st </th>
                                                    </tr>

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <section class="p-4 " style="margin-top:10rem;">
                    <div class="row mt-5">
                        <div class="col-8 datecol">
                            <h6> Date : 25/08/2022</h6>

                        </div>
                        <div class="col-4 principlecol">
                            <h6>
                                Principal
                            </h6>

                        </div>
                    </div>
                </section>
                <div class="justify-content-center print-sec d-flex my-5">
                    <button class="btn btn-primary shadow mx-2" onclick="history.back()">Go Back</button>
                    <button class="btn btn-primary shadow mx-2" onclick="window.print()">Print </button>
                </div>
                <script>
                `//get DIV content as clone
                var divContents = $("#DIVNAME").clone();
                //detatch DOM body
                var body = $("body").detach();
                //create new body to hold just the DIV contents
                document.body = document.createElement("body");
                //add DIV content to body
                divContents.appendTo($("body"));
                //print body
                window.print();
                //remove body with DIV content
                $("html body").remove();
                //attach original body
                body.appendTo($("html"));`
                </script>
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