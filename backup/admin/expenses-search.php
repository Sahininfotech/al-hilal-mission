<?php
session_start();
$page = "Expenses";

require_once '../_config/dbconnect.php';
require_once '../admin/class/expenses.class.php';
$Expenses = new Expenses();


$showexpensesDetails1 = $Expenses->showexpensesDetails1($_GET['search1'] , $_GET['search'] );

$totalresult=$Expenses->finddataExpenses($_GET['search1'] , $_GET['search'] );

require_once '../admin/class/institutedetails.class.php';
$expenses = new  institudeDetails();
$result=$expenses->institutedisplaydata();

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
    <!-- <link href="../admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" /> -->
    <!-- <link href="../admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" /> -->
    <!-- <link href="../admin/assets/vendor/quill/quill.snow.css" rel="stylesheet" /> -->
    <!-- <link href="../admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet" /> -->
    <!-- <link href="../admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet" /> -->
    <!-- <link href="../admin/assets/vendor/simple-datatables/style.css" rel="stylesheet" /> -->

    <!-- Template Main CSS File -->
    <link href="../admin/assets/css/expenses.report.css" rel="stylesheet" />
</head>

<body>

    <section>

                    <?php
                              $result=$expenses->institutedisplaydata();
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
                            <h6 class="ps-4">Expenses - Datewise</h6>
                            <p class="ps-4"> <?php    echo $_GET['search1']  ?> <br><br> to <br><br> <?php    echo $_GET['search']  ?></p>

                        </div>
                    </div>
                </div>
                <!-- <h3 class=" d-flex align-item-center justify-content-center mb-2 fs-4 mt-0">Expenses Report
                </h3> -->

                   <!-- 
                <div class="row  mt-5"> -->

<!--              
                    <div class="col-lg-8 m-auto mt-2">
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
                while ($row = $totalresult ->fetch_object()):
                 ?>




                <table class="table table-sm table-bordered mt-3">
               
          <thead>
            <tr>
                  <th scope="col">Bill_No</th>
                  <th scope="col">Date</th>
                  <th scope="col">Purpose</th>
                  <th scope="col">Type</th>
                  <th scope="col">Added_by</th>
                  <th scope="col">Amount</th>
                     
                                       
            </tr>
          </thead>
          <tbody>
                 <?php
                 if ($showexpensesDetails1 == 0) {
                  echo "No data Type Avilable.";
                 }else{
               foreach ($showexpensesDetails1 as $showStudentDetailsshow) {

                $showbill_no   = $showStudentDetailsshow['bill_no'];
                $showadded_by  = $showStudentDetailsshow['added_by'];
                $showamount    = $showStudentDetailsshow['amount'];
                $showpurpore   = $showStudentDetailsshow['purpore'];
                $showstupayment_type = $showStudentDetailsshow['payment_type'];
                $showid          = $showStudentDetailsshow['id'];
                $showdate       = $showStudentDetailsshow['date'];

                       echo '<tr>
                        <td>'.$showbill_no.'</td>
                        <td>'.$showdate.'</td>
                        <td>'.$showpurpore.'</td>
                        <td>'.$showstupayment_type.'</td>
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
                                    <th></th>
                                    <th></th>
                                    <th> Total </th>  
                                    <th><?php echo ($row->Total) ?></th>
                                
                    </tr>
                
                      
                  </table>
                




            </div>
        </div>
        <?php
                              endwhile;
                            }
                        ?>

    </section>


    <div class="justify-content-center print-sec d-flex my-5">
        <button class="btn btn-primary shadow mx-2" onclick="history.back()">Go Back</button>
        <button class="btn btn-primary shadow mx-2" onclick="window.print()">Print </button>
    </div>

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



    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


</body>

</html>