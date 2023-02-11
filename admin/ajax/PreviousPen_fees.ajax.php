<?php

  session_start();



  require_once '../../_config/dbconnect.php';

  require_once '../../classes/pending.class.php';

  require_once '../../classes/admin.class.php';



  

$Admin          = new Admin();

$Pending        = new Pending();



$showStudentDetails   = $Pending->previousFeesId($_GET['preFeespending'], $_GET['Feespendingclass']);







  ?>





<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicons -->

    <link href="assets/img/favicon.png" rel="icon" />

    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />



    <!-- Google Fonts -->

    <link href="https://fonts.gstatic.com" rel="preconnect" />

    <link

        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"

        rel="stylesheet" />



    <!-- Vendor CSS Files -->

    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />

    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet" />

    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet" />

    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet" />

    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet" />



    <!-- Template Main CSS File -->

    <link href="../assets/css/style.css" rel="stylesheet" />

    <title>Document</title>



    <style>

    .minecardcss {

        padding: 1rem;

        border-radius: 22px;

        background: #ededed;

        height: 333px;

        margin: auto;

        height: 100%;

    }



    .hrcolor {

        color: #c3dadb;

    }



    .h6css {

        font-family: system-ui;

        line-height: 1.3;

    }





    /* defaultly started with 262px to 291px */

    @media (min-width: 210px) and (max-width:281px) {

        .h6css {

            font-size: 14px;

        }

    }



    @media (min-width: 282px) and (max-width:310px) {

        .h6css {

            font-size: 15px;

        }

    }



    @media (min-width: 311px) and (max-width:330px) {

        .h6css {

            font-size: 16px;

        }

    }



    @media (min-width: 331px) and (max-width:370px) {

        .h6css {

            font-size: 17px;

        }

    }

    @media print {

  .print-sec {

            visibility: hidden;

        }

    }

    </style>

</head>



<body style="background: white !important;">

    <section>



        <?php



            foreach ($showStudentDetails as $showStudentDetailsshow) {



            $showclass         = $showStudentDetailsshow['class'];



            $showname          = $showStudentDetailsshow['name'];



            $showstuid         = $showStudentDetailsshow['student_id'];



            $showid            = $showStudentDetailsshow['id'];



            $showroll_no       = $showStudentDetailsshow['roll_no'];



            $showgurdian_name  = $showStudentDetailsshow['guardian_name'];



                    



            $pendingamount         = $showStudentDetailsshow['total_due'];



            $showtotal_amount   = $showStudentDetailsshow['total_amount'];



            $showdate           = $showStudentDetailsshow['date'];



            $showamount      = ($showtotal_amount - $pendingamount);



            $monthly            = $showtotal_amount / 12;

            $monthlys  = number_format($monthly, 2);


            $month              = date("m");



           $monthPending        = $month*$monthly - $showamount;





           // $month = date('m', strtotime($showdate));

              

        ?>



        <div class="container" style="font-family: 'Nunito';">

            <h7> <?php echo  date("Y.m.d");?> </h7>

            <p>

                <?php if($showamount >= $month*$monthly){

                echo '<span class="badge bg-success">Paid</span>'; 

                } else {

                echo '<span class="badge bg-warning">Pending</span>';

                } 

                ?>

            </p>

            <!-- <p><span class="badge bg-danger">Reject</span></p> -->

            <div class="card minecardcss">

                <div class="row">

                    <div class="col-6 ">

                        <h6 class="h6css">Name : </h6>

                    </div>

                    <div class="col-6 ">

                        <h6 class="h6css"><?php  echo $showname      ?></h6>

                    </div>

                    <hr class="hrcolor">

                    <div class="col-6">

                        <h6 class="h6css">Guardian's Name : </h6>

                    </div>

                    <div class="col-6">

                        <h6 class="h6css"><?php  echo $showgurdian_name      ?></h6>

                    </div>

                    <hr class="hrcolor">

                    <div class="col-6">

                        <h6 class="h6css"> Present Class : </h6>

                    </div>

                    <div class="col-6">

                        <h6 class="h6css"><?php  echo $showclass      ?></h6>

                    </div>

                    <hr class="hrcolor">

                    <div class="col-6">

                        <h6 class="h6css">Roll No : </h6>

                    </div>

                    <div class="col-6">

                        <h6 class="h6css"><?php  echo $showroll_no      ?></h6>

                    </div>

                    <hr class="hrcolor">

                    <div class="col-6">

                        <h6 class="h6css">Total Fees : </h6>

                    </div>

                    <div class="col-6">

                        <h6 class="h6css"><?php   $showtotal_amount  = number_format($showtotal_amount, 2);
                        echo $showtotal_amount      ?></h6>

                    </div>

                    <hr class="hrcolor">

                    <div class="col-6">

                        <h6 class="h6css"> Monthly Fess : </h6>

                    </div>

                    <div class="col-6">

                        <h6 class="h6css"><?php  echo $monthlys      ?></h6>

                    </div>

                    <hr class="hrcolor">

                    <div class="col-6">

                        <h6 class="h6css"> Paid Fess : </h6>

                    </div>

                    <div class="col-6">

                    <h6 class="h6css"><?php  $showamount  = number_format($showamount, 2);
                         echo $showamount      ?></h6>

                    </div>

                    <hr class="hrcolor">

                    <div class="col-6">

                        <h6 class="h6css">Total Pending Fees : </h6>

                    </div>

                    <div class="col-6">

                        <h6 class="h6css">

                        <?php echo $pendingamount ?>

                        </h6>

                    </div>

                    <hr class="hrcolor">

                    <div class="col-6">

                        <h6 class="h6css">Month Pending Fess : </h6>

                    </div>

                    <div class="col-6">

                        <h6 class="h6css">
                      


                            <?php if($showamount >= $month*$monthly) {echo  '<span class="badge bg-success">Paid</span>';}

                            if($month*$monthly > $showamount) {
                            $monthPending  = number_format($monthPending, 2);
                            echo $monthPending;  } 

                            ?>



                        </h6>

                    </div>

                    <hr class="hrcolor">

                    <div class="col-6">

                        <h6 class="h6css">Monthly Status :</h6>

                    </div>

                    <div class="col-6">

                        <h6 class="h6css">

                            <?php 

                            if($showamount == $month*$monthly){



                            echo '<span class="badge bg-success">Paid</span>'; 



                            } 

                             if($showamount < $month*$monthly ) {

                            echo '<span class="badge bg-warning">Pending</span>';



                            }

                            if($showamount > $month*$monthly ) {

                                

                                echo '<span class="badge bg-primary">Advanced</span>';

                

                                }

                            ?>

                        </h6>

                    </div>

                    <hr class="hrcolor">

                </div>











            </div>



        </div>





        <?php  

             

            // endwhile;

         }

         ?>

    </section>

    <div class="justify-content-center print-sec d-flex my-5">

    <!-- <button class="btn btn-primary shadow mx-2" onclick="history.back()">Go Back</button> -->

    <button class="btn btn-primary shadow mx-2" style="width: 9rem;" onclick="window.print()">Print </button>

</div>



    <!-- Vendor JS Files -->

    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/chart.js/chart.min.js"></script>

    <script src="../assets/vendor/echarts/echarts.min.js"></script>

    <script src="../assets/vendor/quill/quill.min.js"></script>

    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>

    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>

    <script src="../assets/vendor/php-email-form/validate.js"></script>



    <!-- Template Main JS File -->

</body>









</html>