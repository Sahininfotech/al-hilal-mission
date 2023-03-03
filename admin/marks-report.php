<?php
$page = "Marks Report";

require_once '../_config/dbconnect.php';
require_once '../classes/studdetails.class.php';
require_once '../classes/institutedetails.class.php';
require_once '../classes/exam.class.php';
$StudentDetails = new StudentDetails();
$institute      = new  InstituteDetails();
$classes        = new  Examination();


$showStudentclass = $StudentDetails->studentclass($_GET['studentid'], $_GET['session']);
    foreach ($showStudentclass as $Studentsclass) {
        $class_stu      = $Studentsclass['class_id'];
    }

$showStudentfinalexam = $StudentDetails->finalExampage($class_stu, $_GET['session']);
$marktotal = $StudentDetails->Studentmarktotal($_GET['studentid'], $_GET['session'], $class_stu);
$classnumber = $StudentDetails->numberOfClass($class_stu, $_GET['stream']);

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
            $Studentdata = $StudentDetails->Studentmark($_GET['studentid']);
            if ($Studentdata == 0) {
            echo "";
            }else{
            foreach($Studentdata as $rowdata){
            $studentname = $rowdata['name'];
            $gurdian     = $rowdata['gurdian_name'];
            $roll        = $rowdata['roll_no'];
            }}
            $Studentpassout = $StudentDetails->Studentdata($_GET['studentid'], $class_stu, $_GET['session']);
            if ($Studentpassout == 0) {
            echo "";
            }else{
            foreach($Studentpassout as $rowdatapassout){
            $studentnamepassout = $rowdatapassout['name'];
            $gurdianpassout     = $rowdatapassout['guardian_name'];
            $rollpassout        = $rowdatapassout['roll_no'];
            }}
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
                                                    <h6>Name : <?php   if ($studentname != null){
                                                      echo $studentname;
                                                    }else{
                                                        echo $studentnamepassout;
                                                    }  ?></h6>
                                                    <h6>Guardian's Name : <?php     if ($gurdian != null){
                                                      echo $gurdian;
                                                    }else{
                                                        echo $gurdianpassout;
                                                    }?></h6>

                                                </div>
                                                <div class="col-4">
                                                    <h6>Roll Number : <?php    if ($roll != null){
                                                      echo $roll;
                                                    }else{
                                                        echo $rollpassout;
                                                    }?></h6>
                                                    <h6>Class : <?php    echo $class_stu;?></h6>

                                                </div>

                                            </div> <!-- <h2>Marksheet</h2> -->


                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">Subject Name</th>
                                                        <?php

                                                            if ($showStudentfinalexam == 0) {
                                                            echo "Not Avilable.";
                                                            
                                                            }else{
                                                                $totalmark = 0;
                                                            foreach ($showStudentfinalexam as $showStudentDetailsshow) {
                                                            $showclass     = $showStudentDetailsshow['id'];
                                                            $showexam_name = $showStudentDetailsshow['exam_name'];
                                                            $showmax_marks = $showStudentDetailsshow['max_marks'];
                                                            $totalmark += $showStudentDetailsshow['max_marks'];

                                                            echo '<th>'.$showexam_name.'(FM-'.$showmax_marks.')</th>'; 

                                                            if ($classnumber == 0) {
                                                                echo "";
                                                              
                                                                }else{
                                                            foreach ($classnumber as $class) {
                                                                
                                                                $showclasscount = $class['classnumber'];
                                                                $totalnumber    = $showclasscount * $totalmark;
                                                               
                                                        }}}}
                                                            
                                                            ?>
                                                        <th>Marks Obtain</th>
                                                        <th>Final Grade </th>
                                                    <tr>
                                                </thead>
                                                <tbody>

                                                    <?php   
                                                    $i=1;  
                                                    
                                                    // if($_GET['studentclass'] == 11 && $_GET['studentclass'] == 12){
                                                    $showStudentDetails = $StudentDetails->showStudentsubjectstream($_GET['stream'], $class_stu); 
                                                    // } else{
                                                    // $showStudentDetails = $StudentDetails->showStudentsubjectDetails1($_GET['studentclass']);
                                                    // }    
                                                    if ($showStudentDetails == 0) {
                                                    echo "No data Type Avilable.";
                                                    }
                                                    else
                                                    {

                                                    foreach ($showStudentDetails as $showStudentsDetails) {
                                                        $showstudentsubject = $showStudentsDetails['subject'];
                                                        $showid             = $showStudentsDetails['id'];
                                                   
                                                       $showStudent= $StudentDetails->showStudentmark($showStudentsDetails['subject'], $_GET['studentid'], $_GET['session'], $class_stu);
                                                       foreach ($marktotal as $StudentMT) {
                                                        $showTotal       = $StudentMT['Total'];
                                                        // division by zero error
                                                        if ( $totalnumber == 0) {

                                                        $totalnumber = 1;

                                                        }
                                                        //   end
                                                        $Percentage      = $showTotal/$totalnumber*100;
                                                       }
                                                    ?>
                                                    <tr>
                                                        <td><?php    echo $i                   ?></td>
                                                        <th><?php    echo $showstudentsubject  ?></th>
                                                        <?php  
                                                        $sum = 0;
                                                        if ($showStudent == 0) {
                                                            echo "";
                                                            }
                                                            else
                                                            {
                                                        foreach ($showStudent as $showStudentresult) {
                                                        $sum += $showStudentresult['marks'];
                                                        
                                                        $showmarks          = $showStudentresult['marks'];
                                                        echo '<td>'.$showmarks.'</td>';  

                                                        $subPercentage  =  $sum/$totalmark*100;                                                      
                                                       
                                                        }  }

                                                        ?>
                                                        <td><?php    echo $sum  ?>
                                                        </td>

                                                        <td><?php
                                                            $Showsubrank = $classes->showgrade();
                                                            if ($Showsubrank == 0) {
                                                                echo "Not Avilable.";
                                                                }else{
                                                            foreach ($Showsubrank as $subrank) {

                                                            $min_mraks       = $subrank['Min_marks'];
                                                            $max_mraks       = $subrank['Max_marks'];
                                                            $showchar             = $subrank['grade_mane'];


                                                            if ($sum >=$min_mraks  && $sum <=$max_mraks){ echo $showchar;}
                                                            }
                                                           }
                                                        

                                                        //     if ($subPercentage >=0 & $subPercentage <= 10){ echo "Faill";

                                                        //     }elseif ($subPercentage >=11 & $subPercentage <= 20)
                                                        //    { echo "C";}

                                                        //    elseif ($subPercentage >=21 & $subPercentage <= 40)
                                                        //     {echo "B";}

                                                        //     elseif ($subPercentage >=41 & $subPercentage <= 70)
                                                        //     {echo "B+";}

                                                        //     elseif ($subPercentage >=71 & $subPercentage <= 80)
                                                        //    { echo "A";}

                                                        //    elseif ($subPercentage >=81 & $subPercentage <= 90)
                                                        //    { echo "A+";}

                                                        //    elseif ($subPercentage >=91 & $subPercentage <= 100)
                                                        //    { echo "o";}
                                                        //     else {
                                                        //     echo "Over Of 100";}


                                                        
                                                          ?></td>
                                                    </tr>
                                                    <?php   $i++; }}}?>

                                                </tbody>

                                            </table>




                                            <table class="table">

                                                <tbody>

                                                    <tr>

                                                        <th colspan="2" class="text-center">Max Marks :</th>
                                                        <th colspan="2" class="text-center">
                                                            <?php   echo "$totalnumber" ?></th>
                                                    </tr>
                                                    <tr>

                                                        <th colspan="2" class="text-center">Total Obtain :</th>
                                                        <th colspan="2" class="text-center">
                                                            <?php   echo "$showTotal" ?></th>
                                                    </tr>
                                                    <tr>
                                                        <!-- <th colspan="4" class="text-center"></th> -->
                                                        <th colspan="2" class="text-center">Percentage :</th>
                                                        <th colspan="2" class="text-center">
                                                            <?php  
                                                            $somenumber = $Percentage;

                                                            $somenumber = round($somenumber,2);
                                                            
                                                            if($somenumber == intval($somenumber))
                                                            {
                                                                $somenumber = intval($somenumber);
                                                            }
                                                            
                                                            echo "$somenumber%";
                                                            ?></th>
                                                    </tr>

                                                    <tr>
                                                        <!-- <th colspan="4" class="text-center"></th> -->
                                                        <th colspan="2" class="text-center">Rasult :</th>
                                                        <th colspan="2" class="text-center">
                                                            <?php 
                                                                $Showsubrank = $classes->passmarks("Subject Wise");
                                                                $Showoverall = $classes->passmarks("Overall Wise");
                                                                foreach ($Showsubrank as $subrank) {
    
                                                                $subpass       = $subrank['marks'];
                                                                }
                                                                foreach ($Showoverall as $overallrank) {
    
                                                                $overalpass = $overallrank['marks'];
                                                                }

                                                                if($showTotal>= $overalpass && $totalnumber >= $subpass){
                                                                echo "pass";
                                                                }else{
                                                                echo "Faill";
                                                                } 
                                                            ?>
                                                        </th>
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


                <section class="p-4">
                    <div class="row mt-5">
                        <div class="col-8 datecol">
                            <h6> Date : <?php echo date("Y.m.d") ?></h6>

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