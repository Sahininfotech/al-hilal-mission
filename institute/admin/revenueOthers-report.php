<?php
$page = "Expenses Report";

require_once '../_config/dbconnect.php';

require_once '../classes/revenue.class.php';

$revenues = new  Revenue();


if(isset ($_GET['todayreport']) ){

$revenuesbox=$revenues->otherdayreport($_GET['todayreport']);

$totalresult=$revenues->othersfeesDay();

}


if(isset ($_GET['monthreport']) ){

$revenuesbox=$revenues->revenueotherreport($_GET['monthreport']);

$totalresult=$revenues->othersfeesMonth();

}


if(isset ($_GET['yearreport']) ){

$revenuesbox=$revenues->otheryearreport($_GET['yearreport']);

$totalresult=$revenues->othersfeesYear();

}


if(isset ($_GET['totalreport']) ){

$revenuesbox=$revenues->othertotalreport($_GET['totalreport']);

$totalresult=$revenues->otherstotalamount();

}


if(isset ($_GET['searchothers']) && isset ($_GET['searchother'])){

$revenuesbox = $revenues->showerevenuesDetails($_GET['searchother'] , $_GET['searchothers'] );

$totalresult=$revenues->finddataothers($_GET['searchother'] , $_GET['searchothers'] );

}


require_once '../classes/institutedetails.class.php';

$expensesclass = new  InstituteDetails();

$result=$expensesclass->instituteShow();


?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8" />

    <meta content="width=device-width, initial-scale=1.0" name="viewport" />


    <title>Accountant/ Expenses - NiceAdmin Bootstrap Template</title>

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

                            <?php    echo $row['address']  ?> 

                              </p>

                        </div>

                        <div class="col-sm-3 border-start border-dark " style="line-height: 0.5rem;">

                            <h4 class="ps-4">Accountant</h4>

                            <h6 class="ps-4">Other Revenue / <?php if(isset($_GET['todayreport'])){echo $_GET['todayreport'];}; 

                                                         if(isset($_GET['monthreport'])){echo $_GET['monthreport'];};

                                                         if(isset($_GET['yearreport'])){echo $_GET['yearreport'];};

                                                         if(isset($_GET['totalreport'])){echo $_GET['totalreport'];}; ?>

                                    <?php if(isset($_GET['searchothers'])){echo $_GET['searchothers'];}; ?><br><?php if(isset($_GET['searchother'])){echo $_GET['searchother'];}; ?></h6>

                            <p class="ps-4">date: <?php echo date("d/m/y");?></p>


                        </div>

                    </div>

                </div>

                <!-- <h3 class=" d-flex align-item-center justify-content-center mb-2 fs-4 mt-0">Expenses Report
                </h3> -->

                   <!-- 
                <div class="row  mt-5"> -->
                    <!-- <div class="col-lg-8 m-auto mt-2">
                        <div class="card">
                            <div class="card-body" style="padding-bottom: 0rem;">
                            
                                <div id="barChart" style="min-height: 400px;" class="echart"></div>

                                <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    echarts.init(document.querySelector("#barChart")).setOption({
                                        xAxis: {
                                            type: 'category',
                                            data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
                                        },
                                        yAxis: {
                                            type: 'value'
                                        },
                                        series: [{
                                            data: [120, 200, 150, 80, 70, 110, 130],
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

                 if ($revenuesbox == 0) {

                    echo "<h2>No Data Avilable.</h2>";

                   }
                   else

                       {

                           while ($row = $totalresult ->fetch_object()):

                            ?>


                <table class="table table-sm table-bordered mt-4 " style="width: 94%; margin: auto;">

                    <thead>
                  
                        <tr>

                        <th>Source Name</th>

                        <th>Date</th>

                        <th>Added.By</th>

                        <th>Amount</th>
                                    
                        </tr>

                    </thead>

                    <tbody>

                    <?php 
                
                         foreach ($revenuesbox as $showStudentDetailsshow) {

                          $showname = $showStudentDetailsshow['source'];

                          $showamount = $showStudentDetailsshow['amount'];

                          $showadded_by = $showStudentDetailsshow['added_by'];

                          $showdate = $showStudentDetailsshow['date'];

                          $datetring = date("d-m-Y", strtotime($showdate));

                                 echo '<tr>

                        <td>'.$showname.'</td>

                        <td>'.$datetring.'</td>

                        <td>'.$showadded_by.'</td>

                        <td>'.$showamount.'</td>

                        </tr>';

                         }

                                 
                                                                  ?>  

                    </tbody>
                    
                  
                  <tr>

                  <th ></th>

                  <th></th>
                                 
                                  <th> Total </th>  

                                  <th><?php echo ($row->Total) ?></th>
                              
                  </tr>
              
                    
                </table>
                




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

    <!-- End #main -->

    <!-- ======= Footer ======= -->

    <!-- End Footer -->

    <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a> -->

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