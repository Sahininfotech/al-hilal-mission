<?php
$page = "Revenue";
require_once '../admin/class/revenue.class.php';
$revenues = new  Revenueclass();
$showerevenuesDetails = $revenues->showedonationDetails($_GET['searchdonation1'] , $_GET['searchdonation'] );
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



    <!-- ======= Header ======= -->

    <!-- End Header -->

    <!--======== sidebar ========-->

    <!--======== End sidebar ========-->

    <!-- <main id="main" class="main"> -->

    <!-- End Page Title -->
    <!-- table start -->
    <!-- Sales Card -->
    <section>
    <?php
                  require_once '../admin/class/institutedetails.class.php';
                       $revenues = new  institudeDetails();
    
                $result=$revenues->institutedisplaydata();

                ?>
                    <?php
                              $result=$revenues->institutedisplaydata();
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
                            <h4 class="ps-4">Revenue Others Report</h4>
                            <h6 class="ps-4">Revenue Others - Datewise</h6>
                            <p class="ps-4"> <?php    echo $_GET['searchdonation1']  ?> <br><br> to <br><br> <?php    echo $_GET['searchdonation']  ?></p>

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
                    </div>
                     -->
                         <!-- </div> -->
             
                                <?php
                  require_once '../admin/class/revenue.class.php';
                  $revenues = new  Revenueclass();
    
                       $result=$revenues->finddonation($_GET['searchdonation1'] , $_GET['searchdonation'] );

                ?> <?php
                while ($row = $result ->fetch_object()):
                 ?>

               
                <table class="table table-sm table-bordered mt-3">
                <thead>
                  
                  <tr>
                      <th>Name</th>
                  <th>Date</th>                 
                  <th>added_by</th>
                  <th>Amount</th>
                              
                  </tr>
              </thead>
              <tbody>
              <?php 
                 if ($showerevenuesDetails == 0) {
                    echo "No data Type Avilable.";
                   }else{
                   foreach ($showerevenuesDetails as $showStudentDetailsshow) {
                    $showname = $showStudentDetailsshow['name'];
                    $showamount = $showStudentDetailsshow['amount'];
                    $showadded_by = $showStudentDetailsshow['added_by'];
                    $showdate = $showStudentDetailsshow['date'];
                           echo '<tr>
                  <td>'.$showname.'</td>
                  <td>'.$showdate.'</td>
                  <td>'.$showadded_by.'</td>
                  <td>'.$showamount.'</td>
                  </tr>';
                   }
                                                            }
                                                            ?>  
              </tbody>
              
            
            <tr>
            <th ></th>
            <th></th>
                           
                            <th> Total </th>  
                            <th><?php echo ($row->Total) ?></th>
                        
            </tr>
        
              </thead>
                    
                </table>
                




            </div>
        </div>
        <?php
                              endwhile;
                        ?>
                        <?php
                 }
                 ?>
    </section>


    <div class="justify-content-center print-sec d-flex my-5">
        <button class="btn btn-primary shadow mx-2" onclick="history.back()">Go Back</button>
        <button class="btn btn-primary shadow mx-2" onclick="window.print()">Print </button>
    </div>
 
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