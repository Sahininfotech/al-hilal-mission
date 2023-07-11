<?php

$page = "Expenses Report";



require_once '../_config/dbconnect.php';

require_once '../includes/constant.php';

require_once '../classes/revenue.class.php';

require_once '../classes/head_of_accounts.class.php';

require_once '../classes/institutedetails.class.php';

require_once '../classes/vendor.class.php';


$vendors       = new Vendor();

$expensesclass = new  InstituteDetails();

$revenues      = new  Revenue();

$HOA           = new HeadOfAccounts();



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



if(isset ($_POST['duration']) && isset ($_POST['head_of_account']) && isset ($_POST['select_typpe'])){

    if($_POST['select_typpe'] == "HFA"){
        
    if($_POST['duration'] == date("l")){

        $revenuesbox = $revenues->revenueHOAday($_POST['head_of_account']);

        $totalresult=$revenues->totalamountDayHOA($_POST['head_of_account']);
    
    }
    if($_POST['duration'] == date('M')){

        $revenuesbox = $revenues->revenueHOAmonth($_POST['head_of_account']);

        $totalresult=$revenues->totalamountMonthHOA($_POST['head_of_account']);

    }

    if($_POST['duration'] == date('Y')){

        $revenuesbox = $revenues->revenueHOAyear($_POST['head_of_account']);

        $totalresult=$revenues->totalamountYearHOA($_POST['head_of_account']);

    }

    if($_POST['duration'] == "Total"){

        $revenuesbox = $revenues->displayHOA($_POST['head_of_account']);

        $totalresult=$revenues->totalamountHOA($_POST['head_of_account']);

    }
    $hfadata =$HOA->categoryById($_POST['head_of_account']); 
    }




    if($_POST['select_typpe'] == "Vendors"){
        
        if($_POST['duration'] == date("l")){
    
            $revenuesbox = $revenues->vendorchartday($_POST['head_of_account']);
    
            $totalresult=$revenues->totalamountDay($_POST['head_of_account']);
    
        }
        if($_POST['duration'] == date('M')){
    
            $revenuesbox = $revenues->vendorchartmonth($_POST['head_of_account']);
    
            $totalresult=$revenues->vendortotalMonth($_POST['head_of_account']);
    
        }
    
        if($_POST['duration'] == date('Y')){
    
            $revenuesbox = $revenues->vendorchartyear($_POST['head_of_account']);
    
            $totalresult=$revenues->ventotalamountYear($_POST['head_of_account']);
    
        }
    
        if($_POST['duration'] == "Total"){
    
            $revenuesbox = $revenues->vendisplay($_POST['head_of_account']);
    
            $totalresult=$revenues->totalamount($_POST['head_of_account']);
    
        }
        $vendata =$vendors->vendorByid($_POST['head_of_account']); 
        
        }



        if($_POST['select_typpe'] == "Employee"){
        
            if($_POST['duration'] == date("l")){
        
                $revenuesbox = $revenues->revenueEMPday($_POST['head_of_account']);
        
                $totalresult=$revenues->totalamountDayEMP($_POST['head_of_account']);
        
            }
            if($_POST['duration'] == date('M')){
        
                $revenuesbox = $revenues->revenueEMPmonth($_POST['head_of_account']);
        
                $totalresult=$revenues->totalamountMonthEMP($_POST['head_of_account']);
        
            }
        
            if($_POST['duration'] == date('Y')){
        
                $revenuesbox = $revenues->revenueEMPyear($_POST['head_of_account']);
        
                $totalresult=$revenues->totalamountYearEMP($_POST['head_of_account']);
        
            }
        
            if($_POST['duration'] == "Total"){
        
                $revenuesbox = $revenues->displayEMP($_POST['head_of_account']);
        
                $totalresult=$revenues->totalamountEMP($_POST['head_of_account']);
        
            }
            
            }




            if($_POST['select_typpe'] == "cancel"){
        
                if($_POST['duration'] == date("l")){
            
                    $revenuesbox = $revenues->revenueCANday();
            
                    $totalresult=$revenues->totalamountDayCAN();
            
                }
                if($_POST['duration'] == date('M')){
            
                    $revenuesbox = $revenues->revenueCANmonth();
            
                    $totalresult=$revenues->totalamountMonthCAN();
            
                }
            
                if($_POST['duration'] == date('Y')){
            
                    $revenuesbox = $revenues->revenueCANyear();
            
                    $totalresult=$revenues->totalamountYearCAN();
            
                }
            
                if($_POST['duration'] == "Total"){
            
                    $revenuesbox = $revenues->displayCAN();
            
                    $totalresult=$revenues->totalamountCAN();
            
                }
                
                }

        

    
    }



$result=$expensesclass->instituteShow();





?>



<!DOCTYPE html>



<html lang="en">



<head>



    <meta charset="utf-8" />



    <meta content="width=device-width, initial-scale=1.0" name="viewport" />





    <title>Revenue Others Report || <?php echo SITE_NAME; ?></title>



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



                                <?php    echo $row['address']  ?>



                            </p>



                        </div>



                        <div class="col-sm-3 border-start border-dark " style="line-height: 0.5rem;">



                            <h4 class="ps-4">Revenue Report Of Other Revenue</h4>



                            <h6 class="ps-4">Other Revenue /
                                <?php 
                                if(isset($_GET['todayreport'])){echo $_GET['todayreport'];}; 

                                if(isset($_GET['monthreport'])){echo $_GET['monthreport'];};

                                if(isset($_GET['yearreport'])){echo $_GET['yearreport'];};

                                if(isset($_GET['totalreport'])){echo $_GET['totalreport'];}; 

                                if(isset ($_POST['duration']) && isset ($_POST['head_of_account']) && isset ($_POST['select_typpe'])){

                                if(isset($_POST['duration']))
                                {
                                if($_POST['duration'] == date("l")){

                                echo "Today ". $_POST['duration']."<br>";
                                }
                                if($_POST['duration'] == date("M")){

                                echo "Month ". $_POST['duration']."<br>";
                                }
                                if($_POST['duration'] == date("Y")){

                                echo "Year ". $_POST['duration']."<br>";
                                }

                                if($_POST['duration'] == "Total"){

                                echo "Total"."<br>";
                                }
                                }; 


                                if($_POST['select_typpe'] == "HFA"){
                                foreach($hfadata as $row)
                                {
                                echo "Head Of Accounts / ".$row['category'];
                                }
                                };

                                if($_POST['select_typpe'] == "Vendors"){
                                    foreach($vendata as $rows)
                                echo "Vendor Name - ".$rows['name'];

                                };

                                if($_POST['select_typpe'] == "Employee"){
                                   
                                    echo "Other Revenue Through - ".$_POST['head_of_account'];
                                   
                                }
                                
                                if($_POST['select_typpe'] == "cancel"){
                                   
                                    echo "Other Revenue - ".$_POST['head_of_account'];
                                   
                                };
                               }

                                if(isset($_GET['searchothers'])){
                                echo $_GET['searchothers']."<br>";
                                }; 

                                if(isset($_GET['searchother'])){
                                echo $_GET['searchother'];
                                };


                                ?>


                            </h6>

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

                            <?php  

                            if(isset ($_POST['duration']) && isset ($_POST['head_of_account']) && isset ($_POST['select_typpe'])){

                            if($_POST['select_typpe'] == "HFA"){
                            echo "
                            <th>Date</th>



                            <th>Vendor</th>



                            <th>Amount</th>";

                            }
                            if($_POST['select_typpe'] == "Vendors"){
                            echo' <th>Source Name</th>



                            <th>Date</th>



                            <th>Amount</th>';

                            }
                            if($_POST['select_typpe'] == "Employee"){
                            echo'  
                            <th>Source Name</th>

                            <th>Date</th>

                            <th>Vendor</th>

                            <th>Amount</th>';

                            }

                            if($_POST['select_typpe'] == "cancel"){
                                echo'  
                                <th>Source Name</th>
    
                                <th>Date</th>
    
                                <th>Vendor</th>
    
                                <th>Amount</th>';
    
                                }
                         
                            }else{
                            echo'
                            <th>Source Name</th>

                            <th>Date</th>

                            <th>Vendor</th>

                            <th>Amount</th>';
                            }

                            ?>


                        </tr>



                    </thead>



                    <tbody>



                        <?php 
                        if(isset ($_POST['duration']) && isset ($_POST['head_of_account']) && isset ($_POST['select_typpe'])){

                        if($_POST['select_typpe'] == "HFA"){


                        foreach ($revenuesbox as $showStudentDetailsshow) {

                        $showname = $showStudentDetailsshow['source'];

                        $showamount = $showStudentDetailsshow['amount'];

                        $showamounts   = number_format($showamount, 2);

                        $showvendor_id = $showStudentDetailsshow['vendor_id'];

                        $showdate = $showStudentDetailsshow['date'];

                        $datetring = date("d-m-Y", strtotime($showdate));

                        $vendor =$vendors->vendorByid($showvendor_id); 
                        foreach($vendor as $rowven){

                        echo '<tr>

                        <td>'.$datetring.'</td>

                        <td>'.$rowven['name'].'</td>

                        <td>'.$showamounts.'</td>

                        </tr>';

                        }}}

                        if($_POST['select_typpe'] == "Vendors"){


                        foreach ($revenuesbox as $showStudentDetailsshow) {

                        $showname = $showStudentDetailsshow['source'];

                        $showamount = $showStudentDetailsshow['amount'];

                        $showamounts   = number_format($showamount, 2);

                        $showvendor_id = $showStudentDetailsshow['vendor_id'];

                        $showdate = $showStudentDetailsshow['date'];

                        $datetring = date("d-m-Y", strtotime($showdate));

                        $hoadata =$HOA->categoryById($showname); 
                        foreach($hoadata as $rowhoa){                                                                                                                                    

                        echo '<tr>
                                    
                        <td>'.$rowhoa['category'].'</td>

                        <td>'.$datetring.'</td>                   

                        <td>'.$showamounts.'</td>

                        </tr>';

                        }}}


                        if($_POST['select_typpe'] == "cancel"){


                            foreach ($revenuesbox as $showStudentDetailsshow) {
    
                                $showname = $showStudentDetailsshow['source'];

                                $showamount = $showStudentDetailsshow['amount'];
        
                                $showamounts   = number_format($showamount, 2);
        
                                $showvendor_id = $showStudentDetailsshow['vendor_id'];
        
                                $showdate = $showStudentDetailsshow['date'];
        
                                $datetring = date("d-m-Y", strtotime($showdate));
        
                                $hoadata =$HOA->categoryById($showname); 
                                foreach($hoadata as $rowhoa){
                                    
                                $vendor =$vendors->vendorByid($showvendor_id); 
                                foreach($vendor as $rowven){
        
        
                                echo '<tr>
        
                                <td>'.$rowhoa['category'].'</td>
        
                                <td>'.$datetring.'</td>
        
                                <td>'.$rowven['name'].'</td>
        
                                <td>'.$showamounts.'</td>
        
                                </tr>';
    
                            }}}}

                        if($_POST['select_typpe'] == "Employee"){

                        foreach ($revenuesbox as $showStudentDetailsshow) {

                        $showname = $showStudentDetailsshow['source'];

                        $showamount = $showStudentDetailsshow['amount'];

                        $showamounts   = number_format($showamount, 2);

                        $showvendor_id = $showStudentDetailsshow['vendor_id'];

                        $showdate = $showStudentDetailsshow['date'];

                        $datetring = date("d-m-Y", strtotime($showdate));

                        $hoadata =$HOA->categoryById($showname); 
                        foreach($hoadata as $rowhoa){
                            
                        $vendor =$vendors->vendorByid($showvendor_id); 
                        foreach($vendor as $rowven){


                        echo '<tr>

                        <td>'.$rowhoa['category'].'</td>

                        <td>'.$datetring.'</td>

                        <td>'.$rowven['name'].'</td>

                        <td>'.$showamounts.'</td>

                        </tr>';
                        }}}}}
                        else{
                        foreach ($revenuesbox as $showStudentDetailsshow) {

                        $showname = $showStudentDetailsshow['source'];

                        $showamount = $showStudentDetailsshow['amount'];

                        $showamounts   = number_format($showamount, 2);

                        $showvendor_id = $showStudentDetailsshow['vendor_id'];

                        $showdate = $showStudentDetailsshow['date'];

                        $datetring = date("d-m-Y", strtotime($showdate));

                        $hoadata =$HOA->categoryById($showname); 
                        foreach($hoadata as $rowhoa){
                            
                        $vendor =$vendors->vendorByid($showvendor_id); 
                        foreach($vendor as $rowven){


                        echo '<tr>

                        <td>'.$rowhoa['category'].'</td>

                        <td>'.$datetring.'</td>

                        <td>'.$rowven['name'].'</td>

                        <td>'.$showamounts.'</td>



                        </tr>';
                        }}}}     


                        ?>

                    </tbody>


                    <tr>

                        <?php   

                        if(isset ($_POST['duration']) && isset ($_POST['head_of_account']) && isset ($_POST['select_typpe'])){
                        if($_POST['select_typpe'] == "HFA" || $_POST['select_typpe'] == "Vendors"){
                        echo'
                        <th></th>

                        <th> Total </th>

                        <th>₹ '.$row->Total.'</th>
                        ';  }
                        if($_POST['select_typpe'] == "Employee"){
                        echo'
                        <th></th>

                        <th></th>

                        <th> Total </th>

                        <th>₹ '.$row->Total.'</th>
                        ';
                        }
                        if($_POST['select_typpe'] == "cancel"){
                            echo'
                            <th></th>
    
                            <th></th>
    
                            <th> Total </th>
    
                            <th>₹ '.$row->Total.'</th>
                            ';
                        }

                        }else{
                        echo'
                        <th></th>

                        <th></th>

                        <th> Total </th>

                        <th>₹ '.$row->Total.'</th>
                        ';
                        }
                        ?>

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