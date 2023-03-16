<?php

    session_start();

    $page = "Expenses";



    require_once '../_config/dbconnect.php';

    require_once '../classes/admin.class.php';

    require_once '../classes/expenses.class.php';

    require_once '../classes/utility.class.php';

    require_once '../includes/constant.php';



    $Utility    = new Utility(); 

    $Admin      = new Admin();

    $Expenses   = new Expenses();



    $dayresult     = $Expenses->totalamountDay();

    $monthresult   = $Expenses->totalamountMonth();

    $yearresult    = $Expenses->totalamountYear();

    $totalresult   = $Expenses->totalamount();

    $revenueresult = $Expenses->displaydata();



    $_SESSION['current-url'] = $Utility->currentUrl();



    if (!isset($_SESSION['user_name']) && !isset($_SESSION['loggedin']) ) {

    header("Location: login.php");

    exit;

    }



    // $updatePage = $employees->userupdatePage($_SESSION['user_name']);



    // if(isset ($_GET['fromDate']) && isset ($_GET['toDate'])){

    // $result=$Expenses->searchdata($_GET['fromDate'] && $_GET['toDate']); 

    // }



?>

<!DOCTYPE html>

<html lang="en">



<head>

    <script>
    function cancel(result) {

        if (result.data) {

            result.ParentNode.ParentNode.style.backgroundcolor = "blue";

        } else {

            result.ParentNode.ParentNode.style.backgroundcolor = " ";

        }

    }
    </script>

    <meta charset="utf-8" />

    <meta content="width=device-width, initial-scale=1.0" name="viewport" />



    <title>Accountant/ Expenses || <?php echo SITE_NAME; ?></title>

    <meta content="" name="description" />

    <meta content="" name="keywords" />



    <?php require_once 'require/headerLinks.php';?>

    <!-- =======================================================

  * Template Name: NiceAdmin - v2.2.2

  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/

  * Author: BootstrapMade.com

  * License: https://bootstrapmade.com/license/

  ======================================================== -->

    <style>
    .addnewbtncss {

        margin: auto;

        display: flex;

        align-items: center;

        margin-right: 1rem;

        margin-top: -3rem;



    }



    @media (min-width:150px) and (max-width:359px) {

        .addnewbtncss {

            margin: 0rem;

            display: flex;

            align-items: center;

            margin-right: 0rem;

            margin-top: 0rem;

        }

    }
    </style>





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

            <h1>Accountant</h1>

            <nav>

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                    <li class="breadcrumb-item">Accountant</li>

                    <li class="breadcrumb-item active">Expenses</li>

                </ol>

            </nav>

        </div>

        <!-- End Page Title -->

        <!-- table start -->

        <!-- Sales Card -->





        <section class="section dashboard">

            <div class="col-lg-12">

                <div class="row">

                    <!-- Sales Card -->

                    <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-6">

                        <div class="card info-card sales-card">



                            <div class="filter">

                                <a href="expenses-report.php?dayreport=Today <?php echo date("l") ?>">

                            </div>



                            <?php

                                while ($row = $dayresult ->fetch_object()):

                                ?>



                            <div class="card-body">

                                <h5 class="card-title">Expenses <span>| Today</span></h5>



                                <div class="d-flex align-items-center">

                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">

                                        <i class="bi bi-currency-exchange"></i>



                                    </div>

                                    <div class="ps-3">

                                        <h6>₹ <?php
                                         $row->Total  = number_format($row->Total, 2);
                                        echo $row->Total ; if ($row->Total== 0) echo 0;?></h6>



                                    </div>

                                </div>

                            </div>

                            </a>

                        </div>

                    </div>

                    <?php

                              endwhile;

                        ?>

                    <!-- sales no-2 -->

                    <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-6">

                        <div class="card info-card sales-card">



                            <div class="filter">

                                <a href="expenses-report.php?monthreport=Month <?php echo date('M') ?>">

                            </div>

                            <?php

                                while ($row = $monthresult ->fetch_object()):

                                ?>

                            <div class="card-body">

                                <h5 class="card-title">Expenses <span>| Last Month</span></h5>



                                <div class="d-flex align-items-center">

                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">

                                        <i class="bi bi-graph-up-arrow"></i>

                                    </div>

                                    <div class="ps-3">

                                        <h6> ₹ <?php
                                         $row->Total  = number_format($row->Total, 2);
                                        echo $row->Total ; if ($row->Total== 0) echo 0;?></h6>



                                    </div>

                                </div>

                            </div>

                            </a>

                        </div>

                    </div>

                    <?php

                              endwhile;

                        ?>



                    <!-- sales no-3 -->

                    <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-6">

                        <div class="card info-card sales-card">

                            <?php

                                while ($row = $yearresult ->fetch_object()):

                                ?>



                            <div class="filter">

                                <a href="expenses-report.php?yearreport=Year <?php echo date('Y') ?>">

                            </div>



                            <div class="card-body">

                                <h5 class="card-title">Expenses <span>| Last Year</span></h5>



                                <div class="d-flex align-items-center">

                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">

                                        <i class="bi bi-graph-up-arrow"></i>

                                    </div>

                                    <div class="ps-3">

                                        <h6> ₹ <?php 
                                         $row->Total  = number_format($row->Total, 2);
                                        echo $row->Total ; if ($row->Total== 0) echo 0;?></h6>





                                    </div>

                                </div>

                            </div>

                            </a>

                        </div>

                    </div>

                    <?php

                              endwhile;

                        ?>



                    <!-- sales no-4 -->

                    <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-6">

                        <div class="card info-card sales-card">



                            <div class="filter">

                                <a href="expenses-report.php?totalreport=Total">

                            </div>

                            <?php

                                while ($row = $totalresult ->fetch_object()):

                                ?>

                            <div class="card-body">

                                <h5 class="card-title">Expenses <span>| Total</span></h5>



                                <div class="d-flex align-items-center">

                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">

                                        <i class="bi bi-reception-4"></i>

                                    </div>

                                    <div class="ps-3">

                                        <h6> ₹ <?php
                                         $row->Total  = number_format($row->Total, 2);
                                        echo $row->Total ;?><?php  if ($row->Total== 0) echo 0;?></h6>



                                    </div>

                                </div>

                            </div>

                            </a>

                        </div>

                    </div>

                    <?php

                              endwhile;

                        ?>



                </div>

            </div>

        </section>









        <!-- End Sales Card -->

        <!-- date-selector start -->





        <section>

            <div class="card p-3 justify-content-center">

                <div class="container">

                    <div class="row">

                        <div class="col-lg-4 col-md-4">

                            <form action="expenses-report.php" method="GET">

                                <div class="row mb-3 ">

                                    <label for="inputDate">From Date</label>

                                    <div>

                                        <input type="date" class="form-control" name="fromDate"
                                            value="<?php if(isset($_GET['fromDate'])){echo $_GET['fromDate']; }?>">

                                    </div>

                                </div>

                        </div>

                        <div class="col-lg-4 col-md-4">

                            <div class="row mb-3 ">

                                <label for="inputDate">To Date</label>

                                <div>

                                    <input type="date" class="form-control" name="toDate"
                                        value="<?php if(isset($_GET['toDate'])){echo $_GET['toDate']; }?>" />

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-4 col-md-4">

                            <div class="row mb-3 pt-4">





                                <button type="text" class="btn btn-primary"
                                    style="margin: auto; display: inline-flex; width: 68%;justify-content: center; ">Find</button>



                            </div>

                        </div>

                    </div>

                    </form>

                </div>

            </div>

        </section>







        <!-- date-selector end -->

        <section class="section dashboard">

            <div class="col-lg-12">

                <div class="card recent-sales overflow-auto">

                    <div class="card-body">

                        <h5 style="padding: 20px 0 5px 0;

                                font-size: 30px;

                            font-weight: 500;

                            color: #012970;

                            font-family: 'Poppins', sans-serif">Expenses </h5>

                        <!-- Button trigger modal -->

                        <button type="button" class="btn btn-primary mb-4 addnewbtncss" data-bs-toggle="modal"
                            data-bs-target="#addExpensesModal" onclick="addExpenses();">

                            Add New

                        </button>





                        <table class="table datatable">

                            <thead>

                                <tr>



                                    <th scope="col">S.No</th>

                                    <th scope="col">Bill_No</th>

                                    <th scope="col">Date</th>

                                    <th scope="col">Purpose</th>

                                    <th scope="col">Type</th>

                                    <th scope="col">Added_by</th>

                                    <th scope="col">Amount</th>

                                    <th scope="col">Action</th>



                                </tr>

                            </thead>

                            <tbody>

                                <?php

                                    $i=1;

                                    foreach($revenueresult as $row){                        

                                    ?>

                                <tr <?php

                                            if ($row['status'] == '1') echo 'style="color: black"' ;

                                            if ($row['status'] == '0') echo 'style="color: red"' ;

                                        ?>>



                                    <td><?php    echo $i  ?></td>

                                    <td><?php    echo $row['bill_no']  ?></td>

                                    <td><?php    echo date("d-m-Y", strtotime($row['date']));  ?></td>

                                    <td><?php    echo $row['purpore']  ?></td>

                                    <td><?php    echo $row['payment_type']  ?></td>

                                    <td><?php    echo $row['added_by']  ?></td>

                                    <td><?php   $row['amount']  = number_format($row['amount'], 2);
                                       echo $row['amount']  ?></td>
                                    <td>

                                        <i class="bi bi-eye-fill pe-4" data-bs-toggle="modal"
                                            data-bs-target="#viewandeditModal" id="<?php echo $row['id'];  ?>"
                                            onclick="edit(this.id);">

                                        </i>



                                        <?php 

                                            

                                            if ($row['status'] == '0'){

                                                

                                                echo '<a class="text-primary" href="./ajax/expensesActive.action.php?id='.$row['id'].'">

                                                <i class="bi bi-check-lg" onclick="return activeexpenses();"></i>

                                                </a>';



                                            }elseif ($row['status'] == '1') {



                                                echo '<a class="text-danger" href="./ajax/expensescancel.acction.php?id='.$row['id'].'">

                                                <i class="bi bi-x-lg" onclick="return cancel();">

                                                </i>

                                            </a>';

                                            }else {

                                                echo '<i class="bi bi-question" onclick="alert("Status invalid or blank!");></i>';

                                            }



                                            ?>



                                    </td>

                                </tr>



                                <?php

                                    $i++;

                                    }

                                    ?>



                            </tbody>



                        </table>

                        <!-- End Table with stripped rows -->

                    </div>

                </div>

            </div>

        </section>





        <!-- table End -->

    </main>

    <!-- End #main -->





    <!-- View ande dit Modal -->

    <div class="modal fade" id="viewandeditModal" tabindex="-1" aria-labelledby="viewandeditModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="editModalLabel">

                        Expenses Edit

                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body edit-modal-body">



                </div>

            </div>

        </div>

    </div>

    <!-- View ande dit Modal -->



    <!-- Modal -->

    <div class="modal fade" id="addExpensesModal" tabindex="-1" aria-labelledby="addExpensesModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body expenses-modal-body">



                </div>



            </div>

        </div>

    </div>

    <!-- modal end -->





    <!-- ======= Footer ======= -->

    <?php require_once 'require/addfooter.php'; ?>

    <script>
    function cancel() {

        return confirm("ARE YOU SURE THAT YOU WANT TO CANCEL THIS EXPENSES CONTENTS ?")

    };

    

    function activeexpenses() {

        return confirm("ARE YOU SURE THAT YOU WANT TO ACTIVE THIS EXPENSES CONTENTS ?")

    };
    </script>



    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
    const addExpenses = () => {

        let url = 'ajax/expenses.add.ajax.php';

        $(".expenses-modal-body").html(

            '<iframe width="100%%" height="543px" frameborder="0" allowtransparency="true" src="' + url +

            '"></iframe>')



    }

    const edit = (id) => {

        let url = 'ajax/expensesedit.ajax.php?stafftype1=' + id;

        $(".edit-modal-body").html(

            '<iframe width="100%" height="559px" frameborder="0" allowtransparency="true" src="' + url +

            '"></iframe>')



    }

    const deleteform = (id) => {

        let url = 'ajax/deleteform.ajax.php?stafftype=' + id;

        $(".deleteform-modal-body").html(

            '<iframe width="100%" height="305px" frameborder="0" allowtransparency="true" src="' + url +

            '"></iframe>')



    }
    </script>

</body>



</html>