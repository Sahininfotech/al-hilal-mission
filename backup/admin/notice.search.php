<?php
session_start();

$page = "Studentclass-1";
require_once '../_config/dbconnect.php';
require_once '../classes/employee.class.php';
require_once '../classes/admin.class.php';
require_once '../classes/employee.class.php';
$Admin    = new Admin();
$Employee = new Employee();
$shownoticeDetails1 = $Employee->shownoticeDetails1($_GET['search1'] , $_GET['search'] );

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Components / List Group - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php require_once 'require/headerLinks.php'; ?>
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
            <h1>Notice</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Forum</li>
                    <li class="breadcrumb-item ">Notice</li>
                    <li class="breadcrumb-item active">Find <?php    echo $_GET['search1']  ?> to
                        <?php    echo $_GET['search']  ?></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto p-4">



                                <table class="table table-borderless datatable">
                                    <thead>
                                        <h2>Notice Find <?php    echo $_GET['search1']  ?> To
                                            <?php    echo $_GET['search']  ?></h2>
                                        <tr>
                                            <th scope="col sm-6">Id</th>
                                            <th scope="col sm-3">Notice</th>
                                            <th scope="col sm-3">Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                 if ($shownoticeDetails1 == 0) {
                  echo "No data Type Avilable.";
                 }else{
               foreach ($shownoticeDetails1 as $showStudentDetailsshow) {
               
                   $showid = $showStudentDetailsshow['id'];
                $shownotice = $showStudentDetailsshow['notice'];
                $showdate = $showStudentDetailsshow['date'];
                       echo '<tr>
                        <td scope="row"><a href="#"> '.$showid.'</a></td>
                        <td>'.$shownotice.'</td>
                        <td>'.$showdate.'</td>
                        
                        
                    </tr>';
                        
                         }
                     }
                    
                                                                  
                ?>

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php require_once 'require/addfooter.php'; ?>


    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
    const edit = (id) => {
        let url = 'ajax/expensesedit.ajax.php?stafftype=' + id;
        $(".edit-modal-body").html(
            '<iframe width="100%" height="341px" frameborder="0" allowtransparency="true" src="' + url +
            '"></iframe>')

    }
    </script>

</body>

</html>