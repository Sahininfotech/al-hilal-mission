<?php
session_start();
$page = "dashboard"; 

require_once '../_config/dbconnect.php';

require_once '../classes/admin.class.php';



require_once '../classes/expenses.class.php';

require_once '../classes/revenue.class.php';

require_once '../classes/studdetails.class.php';

require_once '../classes/institutedetails.class.php';

require_once '../classes/utility.class.php';

require_once '../includes/constant.php';









$Admin                  = new Admin();

$employees              = new Expenses();

$revenues               = new Revenue();

$StudentDetails         = new StudentDetails();

$institute              = new InstituteDetails();

$Utility                = new Utility();







$_SESSION['current-url'] = $Utility->currentUrl();



if (!isset($_SESSION['user_name']) && !isset($_SESSION['loggedin']) ) {

  header("Location: login.php");

  exit;

}











$result               = $employees->totalamount();



$revenuetotal         = $revenues->studentfeesTotal();



$amounttotal          = $StudentDetails->Studenttotalamount();


$previousfees         = $StudentDetails->previoustotalamount();



$revenueamounts       = $revenues->totalDue();



$revenuesyear         = $revenues->revenuesbarchat();



$total                = $institute->instituteShow();



$Expensesyear         = $employees->expensesYearBarChat();



$showStudentDetails   = $StudentDetails->showStudent();









?>







<!DOCTYPE html>



<html lang="en">







<head>



    <meta charset="utf-8">



    <meta content="width=device-width, initial-scale=1.0" name="viewport">







    <title>Dashboard - <?php echo SITE_NAME; ?></title>



    <meta content="" name="description">



    <meta content="" name="keywords">

    <?php require_once 'require/headerLinks.php';?>

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



            <h1>Dashboard</h1>



            <nav>



                <ol class="breadcrumb">



                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>



                    <li class="breadcrumb-item active">Dashboard</li>



                </ol>



            </nav>



        </div><!-- End Page Title -->







        <section class="section dashboard ">

            <div class="col-lg-12">

                <div class="row">



                    <!-- Card -->

                    <div class="col-xxl-3 col-md-6 col-sm-6 col-lg-3">

                        <div class="card indexedcrd info-card sales-card">

                            <div class="filter">

                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>

                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                    <li class="dropdown-header text-start">

                                        <h6>Filter</h6>

                                    </li>

                                    <li><a class="dropdown-item"
                                            href="student-report.php?dayreport=Today <?php echo date("l") ?>">Today</a>

                                    </li>

                                    <li><a class="dropdown-item"
                                            href="student-report.php?monthreport=Month <?php echo date('M') ?>">This

                                            Month</a></li>

                                    <li><a class="dropdown-item"
                                            href="student-report.php?yearreport=Year <?php echo date('Y') ?>">This

                                            Year</a></li>

                                </ul>

                            </div>

                            <a href="./studentdetails.php">

                                <?php



                            



                              foreach($total as $rowsession){



                               $session      = $rowsession['session'];



                               $studentcount = $StudentDetails->countStudentrow($session);

                               $totalstudent = 00;

                               if ($studentcount != null || $studentcount != '') {

                                   $totalstudent = count($studentcount);

                               }



                            ?>

                                <div class="card-body">

                                    <h5 class="card-title">Total Students </h5>

                                    <div class="d-flex align-items-center">

                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">

                                            <i class="bi bi-people"></i>

                                        </div>

                                        <div class="ps-3">

                                            <span class="text-success small pt-1 fw-bold">Total</span> <span
                                                class="text-muted small pt-2 ps-1">Students</span>

                                            <h6>

                                                <?php  echo $totalstudent;  }?>

                                            </h6>

                                        </div>

                                    </div>

                                </div>

                            </a>

                        </div>

                    </div>

                    <!-- End Card -->

                    <!-- Card -->



                    <div class="col-xxl-3 col-md-6 col-sm-6 col-lg-3">

                        <div class="card indexedcrd info-card sales-card">

                            <div class="filter">

                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>

                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item"
                                            href="pending-report.php?dayreport=Today <?php echo date("l") ?>">Today</a>
                                    </li>

                                    <li><a class="dropdown-item"
                                            href="pending-report.php?monthreport=Month <?php echo date('M') ?>">This
                                            Month</a></li>

                                    <li><a class="dropdown-item"
                                            href="pending-report.php?yearreport=Year <?php echo date('Y') ?>">This
                                            Year</a></li>

                                </ul>

                            </div>



                            <?php


                                    foreach($previousfees as $amountfees){

                                    $pre_tolatamounts      = $amountfees['pre_Total'];

                                    foreach($amounttotal as $amountrow){



                                    $tolatamounts      = $amountrow['Total'];

                                   

                                    while ($row = $revenuetotal ->fetch_object()):



                                    while ($rows = $revenueamounts ->fetch_object()):



                                    $now_tolatamount = $rows->Total;                                 
                             

                                    $tolatamount   =  $pre_tolatamounts + $now_tolatamount;

                                ?>





                            <a href="./pending_studentdetails.php">

                                <div class="card-body">

                                    <h5 class="card-title">Pending Fees</h5>

                                    <div class="d-flex align-items-center">

                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">

                                            <i class="bi bi-bank2" style="color: red;"></i>

                                        </div>

                                        <div class="ps-3">

                                            <span class="text-success small pt-1 fw-bold">Total</span> <span
                                                class="text-muted small pt-2 ps-1">Pending Fees</span>

                                            <h6 style="color: red;">₹
                                                <?php 
                                                $tolatamount  = number_format($tolatamount, 2);
                                                echo $tolatamount ; if ($tolatamount== 0) echo 0;
                                                ?>
                                            </h6>

                                        </div>

                                    </div>

                                </div>

                            </a>

                        </div>

                    </div>

                    <!-- End Card -->



                    <!-- Card -->



                    <div class="col-xxl-3 col-md-6 col-sm-6 col-lg-3">

                        <div class="card indexedcrd info-card sales-card">

                            <div class="filter">

                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>

                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                    <li class="dropdown-header text-start">

                                        <h6>Filter</h6>

                                    </li>

                                    <li><a class="dropdown-item"
                                            href="revenuestudent-report.php?dayreport=Today <?php echo date("l") ?>">Today</a>
                                    </li>

                                    <li><a class="dropdown-item"
                                            href="revenuestudent-report.php?monthreport=Month <?php echo date('M') ?>">This
                                            Month</a></li>

                                    <li><a class="dropdown-item"
                                            href="revenuestudent-report.php?yearreport=Year <?php echo date('Y') ?>">This
                                            Year</a></li>

                                </ul>

                            </div>



                            <a href="./revenue.php">

                                <div class="card-body">

                                    <h5 class="card-title">Revenue </h5>

                                    <div class="d-flex align-items-center">

                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">

                                            <i class="bi bi-currency-dollar"></i>

                                        </div>

                                        <div class="ps-3">

                                            <span class="text-success small pt-1 fw-bold">Total</span> <span
                                                class="text-muted small pt-2 ps-1">Revenue</span>



                                            <h6>₹

                                                <?php  $row->Total  = number_format($row->Total, 2);
                                                     echo $row->Total ; if ($row->Total== 0) echo 0;?></h6>

                                        </div>

                                    </div>

                                </div>

                            </a>

                        </div>

                    </div>

                    <!-- End Card -->

                    <?php

                             endwhile;

                              endwhile;

                            }}

                        ?>

                    <!--card -->

                    <div class="col-xxl-3 col-md-6 col-sm-6 col-lg-3">

                        <div class="card indexedcrd info-card sales-card">

                            <div class="filter">

                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>

                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                    <li class="dropdown-header text-start">

                                        <h6>Filter</h6>

                                    </li>

                                    <li><a class="dropdown-item"
                                            href="expenses-report.php?dayreport=Today <?php echo date("l") ?>">Today</a>
                                    </li>

                                    <li><a class="dropdown-item"
                                            href="expenses-report.php?monthreport=Month <?php echo date('M') ?>">This

                                            Month</a></li>

                                    <li><a class="dropdown-item"
                                            href="expenses-report.php?yearreport=Year <?php echo date('Y') ?>">This

                                            Year</a></li>

                                </ul>

                            </div>

                            <?php



                           while ($row = $result ->fetch_object()):



                            ?>



                            <a href="./expenses.php">

                                <div class="card-body">

                                    <h5 class="card-title">Expenses</h5>

                                    <div class="d-flex align-items-center">

                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">

                                            <i class="bi bi-cart4" style="color: green;"></i>

                                        </div>

                                        <div class="ps-3">

                                            <span class="text-success small pt-1 fw-bold">Total</span> <span
                                                class="text-muted small pt-2 ps-1">Expenses</span>

                                            <h6>₹ <?php  $row->Total  = number_format($row->Total, 2);
                                                echo $row->Total ;?><?php  if ($row->Total== 0) echo 0;?>

                                            </h6>

                                        </div>

                                    </div>

                                </div>

                            </a>

                        </div>

                    </div>

                    <!-- End Card -->

                    <?php

                              endwhile;

                        ?>

                </div>

            </div>





        </section>



        <section class="section">



            <div class="row">







                <div class="col-lg-6">



                    <div class="card">



                        <div class="card-body">



                            <h5 class="card-title">Students Fees Year Chart</h5>







                            <!-- Line Chart -->



                            <?php 







                                foreach($revenuesyear as $data)



                                {



                                $revenuemonth[] = $data['chatname'];



                                $revenueamount[] = $data['amount'];



                                }







                                ?>



                            <canvas id="lineChart" style="max-height: 400px;"></canvas>



                            <script>
                            const revenuelabels = <?php echo json_encode($revenuemonth) ?>;



                            const revenuedata = {



                                labels: revenuelabels,



                                datasets: [{



                                    label: 'year Dataset',



                                    data: <?php echo json_encode($revenueamount) ?>,



                                    backgroundColor: [



                                        'rgba(255, 99, 132, 0.4)',



                                        'rgba(255, 159, 64, 0.4)',



                                        'rgba(255, 205, 86, 0.4)',



                                        'rgba(75, 192, 192, 0.4)',



                                        'rgba(54, 162, 235, 0.4)',



                                        'rgba(153, 102, 255, 0.4)',



                                        'rgba(201, 203, 207, 0.4)'



                                    ],



                                    borderColor: [



                                        'rgb(255, 99, 132)',



                                        'rgb(255, 159, 64)',



                                        'rgb(255, 205, 86)',



                                        'rgb(75, 192, 192)',



                                        'rgb(54, 162, 235)',



                                        'rgb(153, 102, 255)',



                                        'rgb(201, 203, 207)'



                                    ],



                                    borderWidth: 1



                                }]



                            };







                            const revenueconfig = {



                                type: 'pie',



                                data: revenuedata,



                                options: {



                                    scales: {



                                        y: {



                                            beginAtZero: true



                                        }



                                    }



                                },



                            };
                            </script>



                            <!-- End Line CHart -->







                        </div>



                    </div>



                </div>







                <div class="col-lg-6">



                    <div class="card indexbarchart">



                        <div class="card-body">



                            <h5 class="card-title">Expenses Year Chart</h5>







                            <!-- Bar Chart -->



                            <?php 







                                foreach($Expensesyear as $data)



                                {



                                $month[] = $data['chatname'];



                                $amount[] = $data['amount'];



                                }







                            ?>











                            <div>



                                <canvas id="myChart" style="max-height: 400px;"></canvas>



                            </div>







                            <script>
                            const labels = <?php echo json_encode($month) ?>;



                            const data = {



                                labels: labels,



                                datasets: [{



                                    label: 'Month Dataset',



                                    data: <?php echo json_encode($amount) ?>,



                                    backgroundColor: [



                                        'rgba(255, 99, 132, 0.2)',



                                        'rgba(255, 159, 64, 0.2)',



                                        'rgba(255, 205, 86, 0.2)',



                                        'rgba(75, 192, 192, 0.2)',



                                        'rgba(54, 162, 235, 0.2)',



                                        'rgba(153, 102, 255, 0.2)',



                                        'rgba(201, 203, 207, 0.2)'



                                    ],



                                    borderColor: [



                                        'rgb(255, 99, 132)',



                                        'rgb(255, 159, 64)',



                                        'rgb(255, 205, 86)',



                                        'rgb(75, 192, 192)',



                                        'rgb(54, 162, 235)',



                                        'rgb(153, 102, 255)',



                                        'rgb(201, 203, 207)'



                                    ],



                                    borderWidth: 1



                                }]



                            };







                            const config = {



                                type: 'pie',



                                data: data,



                                options: {



                                    scales: {



                                        y: {



                                            beginAtZero: true



                                        }



                                    }



                                },



                            };
                            </script>



                            <!-- End Bar CHart -->

                        </div>

                    </div>

                </div>

            </div>

        </section>





        <section class="section dashboard">

            <div class="col-lg-12">

                <div class="card recent-sales overflow-auto">

                    <div class="card-body">

                        <h5 class="card-title">Recent Student Datatables</h5>

                        <table class="table table-borderless datatable">



                            <thead>



                                <tr>



                                    <th scope="col">S.No</th>



                                    <th scope="col">Roll Number</th>



                                    <th scope="col">Student Name</th>



                                    <th scope="col">Guardian's Name</th>



                                    <th scope="col">Student Id</th>











                                </tr>



                            </thead>



                            <tbody>







                                <?php



                                    $i=1;



                                    if ($showStudentDetails == 0) {



                                    echo "No data Type Avilable.";



                                    }else{



                                    foreach ($showStudentDetails as $showStudentDetailsshow) {



                                    $showclass1        = $showStudentDetailsshow['class'];



                                    $showname          = $showStudentDetailsshow['name'];



                                    $showstuid         = $showStudentDetailsshow['student_id'];



                                    $showroll_no       = $showStudentDetailsshow['roll_no'];



                                    $showid            = $showStudentDetailsshow['id'];



                                    $showgurdian_name  = $showStudentDetailsshow['gurdian_name'];



                                    ?>

                                <tr>

                                    <td><?php  echo $i                ?></td>



                                    <td><?php  echo $showroll_no      ?></td>



                                    <td><?php  echo $showname         ?></td>



                                    <td><?php  echo $showgurdian_name ?></td>



                                    <td><?php  echo $showstuid        ?></td>



                                </tr>

                                <?php  



                                     $i++;



                                      }   }



                                      ?>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </section>

    </main><!-- End #main -->







    <!-- ======= Footer ======= -->



    <?php require_once 'require/addfooter.php'; ?>







    <script>
    var myChart = new Chart(



        document.getElementById('myChart'),



        config



    );







    var lineChart = new Chart(



        document.getElementById('lineChart'),



        revenueconfig



    );
    </script>







</body>







</html>