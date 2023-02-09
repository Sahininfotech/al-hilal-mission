<?php

    $page = "Expenses";



require_once '../_config/dbconnect.php';

require_once '../includes/constant.php';

require_once '../classes/expenses.class.php';

$expensesclass = new Expenses();



require_once '../classes/institutedetails.class.php';

$expenses = new  InstituteDetails();







    if(isset ($_GET['dayreport']) ){

    $expenseschartbox=$expensesclass->expenseschartday($_GET['dayreport']);

    $totalresult=$expensesclass->totalamountDay();

    }



    if(isset ($_GET['monthreport']) ){

    $expenseschartbox=$expensesclass->expenseschartMonth($_GET['monthreport']);

    $totalresult=$expensesclass->totalamountMonth();

    }



    if(isset ($_GET['yearreport']) ){

    $expenseschartbox=$expensesclass->expenseschartyear($_GET['yearreport']);

    $totalresult=$expensesclass->totalamountYear();

    }



    if(isset ($_GET['totalreport']) ){

    $expenseschartbox=$expensesclass->displaydata($_GET['totalreport']);

    $totalresult=$expensesclass->totalamount();

    }



    if(isset ($_GET['fromDate']) && isset ($_GET['toDate'])){

    $expenseschartbox = $expensesclass->expensestoDate($_GET['fromDate'] , $_GET['toDate'] );

    $totalresult=$expensesclass->finddataExpenses($_GET['fromDate'] , $_GET['toDate'] );

    }



        

    $result = $expenses->instituteShow();



?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8" />

    <meta content="width=device-width, initial-scale=1.0" name="viewport" />



    <title>Expenses / Report | <?php echo SITE_NAME; ?></title>

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

  * Template Name: NiceAdmin - v2.2.2

  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/

  * Author: BootstrapMade.com

  * License: https://bootstrapmade.com/license/

  ======================================================== -->
  <style>
    th,
    p,
    h4,
    h6 {
        text-transform: capitalize;
    }
    </style>

</head>



<body>

    <section>



        <?php

        foreach($result as $row){

        ?>



        <div class="custom-container">

            <div class="custom-body ">

                <div class="card-body ">

                    <div class="row">

                        <div class="col-sm-9">

                            <h2><?php    echo $row['institute_name']  ?></h2>

                            <p style="font-size: 14px;"><?php    echo $row['about']  ?><br>

                                <?php    echo $row['address']  ?><br>

                            </p>

                        </div>

                        <div class="col-sm-3 border-start border-dark " style="line-height: 0.5rem;">

                            <h4 class="ps-4">Expenses Report</h4>

                            <h6 class="ps-4">Expenses - <?php if(isset($_GET['dayreport'])){echo $_GET['dayreport'];};   

                                                     if(isset($_GET['monthreport'])){echo $_GET['monthreport'];};

                                                     if(isset($_GET['yearreport'])){echo $_GET['yearreport'];}; 

                                                     if(isset($_GET['totalreport'])){echo $_GET['totalreport'];}; ?>

                                                     <?php if(isset($_GET['fromDate'])){echo $_GET['fromDate'];}; ?><br><?php if(isset($_GET['toDate'])){echo $_GET['toDate'];};

                                                     ?>

                            </h6>

                        </div>

                    </div>

                </div>

                <!-- <h3 class=" d-flex align-item-center justify-content-center mb-2 fs-4 mt-0">Expenses Report

                </h3> -->



                <!-- <div class="row  mt-5"> -->

                <!-- <div class="col-lg-8 m-auto mt-2">

                        <div class="card">

                            <div class="card-body" style="padding-bottom: 0rem;">

                                <h5 class="card-title">Expenses Chart</h5>



                                Bar Chart

                                <div id="barChart" style="min-height: 400px;" class="echart"></div>

                    

                                <script>

                                document.addEventListener("DOMContentLoaded", () => {

                                    echarts.init(document.querySelector("#barChart")).setOption({

                                        xAxis: {

                                            type: 'category',

                                            data: ['1stweek', '2ndweek', '3rdweek', '4thweek']

                                        },

                                        yAxis: {

                                            type: 'value'

                                        },

                                        series: [{

                                            data: [ echo ($row->Total) ?>,  echo ($row->Total) ?>,  echo ($row->Total) ?>,  echo ($row->Total) ?> ],

                                            type: 'bar'

                                        }]

                                    });

                                });

                                </script>

                                End Bar Chart



                            </div>

                        </div>

                    </div> -->



                <!-- </div> -->



                <?php 

                 if ($expenseschartbox == 0) {

                    echo "<h2>No Data Avilable.</h2>";

                   }else

                       {

                           while ($row = $totalresult ->fetch_object()):

                            $totalamount = ($row->Total);
                            $totalamount   = number_format($totalamount, 2);

                            ?>



                <table class="table table-sm table-bordered mt-4 " style="width: 94%; margin: auto;">

                    <thead>



                        <tr>

                            <th>Bill_No</th>

                            <th>Purpose</th>

                            <th>Type</th>

                            <th>added_by</th>

                            <th>Amount</th>

                            <th>Date</th>



                        </tr>

                    </thead>

                    <tbody>

                        <?php 

                   foreach ($expenseschartbox as $showStudentDetailsshow) {

                    $showbill_no = $showStudentDetailsshow['bill_no'];

                    $showamount = $showStudentDetailsshow['amount'];

                    $showamounts   = number_format($showamount, 2);

                    $showadded_by = $showStudentDetailsshow['added_by'];

                    $showpurpore = $showStudentDetailsshow['purpore'];

                    $showstupayment_type = $showStudentDetailsshow['payment_type'];

                  

                    $showdate = $showStudentDetailsshow['date'];

                           echo '<tr>

                  <td>'.$showbill_no.'</td>

                  <td>'.$showpurpore.'</td>

                  <td>'.$showstupayment_type.'</td>

                  <td>'.$showadded_by.'</td>

                  <td>'.$showamounts.'</td>

                  <td>'.$showdate.'</td>

                  </tr>';

                   

                                                            }

                                                            ?>

                    </tbody>





                    <tr>

                        <th></th>

                        <th></th>

                        <th></th>

                        <th> Total </th>

                        <th>₹ <?php echo $totalamount; ?></th>

                        <th></th>

                    </tr>



                    



                </table>
                <p class="ps-4 pt-4">date: <?php echo date("d.m.y");?></p>
            </div>
           
        </div>

        <?php

                              endwhile;

                            }}

                        ?>

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