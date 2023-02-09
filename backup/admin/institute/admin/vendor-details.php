<?php
session_start();
$page = "Vendor Details";
require_once '../_config/dbconnect.php';
require_once '../classes/vendor.class.php';
require_once '../classes/admin.class.php';
require_once '../classes/utility.class.php';


$Utility   = new Utility(); 
$Admin     = new Admin();
$Vendor = new  Vendor();

$vendordetails=$Vendor->vendordetails($_GET['vendoredit']);

$_SESSION['current-url'] = $Utility->currentUrl();
  
if (!isset($_SESSION['user_name']) && !isset($_SESSION['loggedin']) ) {
  header("Location: login.php");
  exit;
}


if(isset ($_GET['searchreport']) && isset ($_GET['search']) && isset ($_GET['search1'])){
    $result=$vendors->searchdata($_GET['searchreport'] && $_GET['search'] && $_GET['search1']);
    
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Accountant/ Expenses - NiceAdmin Bootstrap Template</title>
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
    .dropvendor {
        float: left;
        overflow: hidden;
    }

    .detailslist {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .detailslist .data {
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
        cursor: pointer;
    }

    .detailslist .data:hover {
        background-color: #ddd;
    }

    .dropvendor:hover .detailslist {
        display: block;
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
            <h1>Vendor Details</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Vendor</li>
                    <li class="breadcrumb-item active">Vendor Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">


                <div class="col-md-6 col-sm-6">

                    <div class="card">

                        <?php foreach ($vendordetails as $showvendor) {
                    $showname = $showvendor['name'];
                    $showaddress = $showvendor['address'];
                    $showmob_no = $showvendor['mob_no'];

                    $showid = $showvendor['id'];
                    $showdate = $showvendor['date'];
                    $showstatus = $showvendor['status'];
                    $showvendor_id = $showvendor['vendor_id'];
                    $showvenyear = "vendor-report.php?yearreport=".$showvendor_id;
                    $showvenmonth = "vendor-report.php?monthreport=".$showvendor_id;
                    $showvenday = "vendor-report.php?dayreport=".$showvendor_id;
                    $showventotal = "vendor-report.php?totalreport=".$showvendor_id;
                    $showvensearch = "vendor-report.php?searchreport=".$showvendor_id;
                    ?>

                        <form method="GET" action="../admin/class/profile.ascension.php">
                            <div
                                class="card-body profile-card pt-4 d-flex flex-column align-items-center rounded-circle">
                                <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
                                <h1><?php echo $showname ;?></h1>
                                <h3><?php echo $showaddress ;?></h3>

                            </div>
                    </div>

                </div>
                </form>


                <div class="col-md-6" id="chack" style="display: none;">
                    <div class="row shadow py-4" style="background-color: #fff;">
                        <div class="col">
                            <form action="vendor-report.php" method="GET">
                                <div class="row mb-3 ">
                                    <label for="inputDate">From Date</label>
                                    <div>
                                        <input type="date" class="form-control" name="fromDate" value="">
                                    </div>
                                    <input type="hidden" class="form-control" name="searchreport"
                                        value="<?php echo $showvendor_id ?>">
                                </div>
                        </div>
                        <div class="col">
                            <div class="row mb-3 ">
                                <label for="inputDate">To Date</label>
                                <div>
                                    <input type="date" class="form-control" name="toDate"
                                        value="<?php if(isset($_GET['search'])){echo $_GET['search']; }?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row mb-3 pt-4"> 


                                <button type="text" class="btn btn-primary"
                                    style="margin: auto; display: inline-flex; width: 68%;justify-content: center; ">Find</button>

                            </div>
                        </div>
                    </div>
                    </form>
                </div>








                <div class="col-xl-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>
                                <li class="nav-item dropvendor">
                                    <button class="nav-link btndetails" data-bs-toggle="tab"
                                        data-bs-target="#profile-All-Details">Transection
                                        Details</button>

                                    <div class="detailslist">
                                        <a class="data" href="<?php echo $showvenday ;?>">Today</a>
                                        <a class="data" href="<?php echo $showvenmonth ;?>">Last Month</a>
                                        <a class="data" href="<?php echo $showvenyear ;?>">Last Year</a>
                                        <a class="data" href="<?php echo $showventotal ;?>">Total</a>
                                        <a class="data" onclick="vendordetails()">Date Wise</a>
                                    </div>

                                </li>

                            </ul>


                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                    <h5 class="card-title">Profile Details</h5>

                                    <?php
                    

                                echo' <form method="GET" action="./ajax/vendorEdit.action.php">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                        <div class="col-lg-9 col-md-8">'. $showname.'</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Address</div>
                                        <div class="col-lg-9 col-md-8">'. $showaddress.'</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Phone</div>
                                        <div class="col-lg-9 col-md-8">'. $showmob_no.'</div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Status</div>
                                        <div class="col-lg-9 col-md-8">'. $showstatus.'</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Date</div>
                                        <div class="col-lg-9 col-md-8">'. $showdate.'</div>
                                    </div></from>';
                                ?>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <?php
              

                echo'       <form method="GET" action="../admin/class/vendorEdit.action.php">
        <div class="card p-0 mb-0" style="box-shadow: none">
        <div class="card-body p-0">
        <input type="hidden" class="form-control"  value="'. $showid.'" name="id">
        <h5 class="card-title d-flex justify-content-center p-0 mt-0 mb-3">
                Vendor Edit
            </h5>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Name :</label>
                <div class="col-sm-9">
                    <input type="text" maxlength="55" class="form-control" value="'.$showname.'" name="name" required>
                </div>
            </div>


            <div class="row mb-3">
            <label for="inputText" class="col-sm-3 col-form-label">Address :</label>
            <div class="col-sm-9">
                <input type="text" maxlength="55" class="form-control" value="'.$showaddress.'" name="address" required>
            </div>
        </div>


        <div class="row mb-3">
        <label for="inputText" class="col-sm-3 col-form-label">Status :</label>
        <div class="col-sm-9">
            <select class="form-control" name="status">
                <option selected value="'.$showstatus.'">'.$showstatus.'</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="pending">Pending</option>
                <option value="update">Update</option>

            </select>
        </div>
    </div>

        
        <div class="row mb-3">
        <label for="inputText" class="col-sm-3 col-form-label">Mob No. :</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="'.$showmob_no.'" name="mob_no" required />
        </div>
    </div>

        <div class="row mb-3">
        <label for="inputaddress" class="col-sm-3 col-form-label">Date :</label>
        <div class="col-sm-9">
            <input type="date" class="form-control" id="edit2" value="'.$showdate.'" name="date">
        </div>
    </div>
      
            <div class="row mb-3">
                <div class="col-sm-12  d-flex justify-content-center align-items-center">
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
</div>
        </div>
        </form>';
    }
    ?>

                                    <!-- <div class="tab-pane fade pt-3" id="profile-change-password"></div> -->
                                    <!-- End Profile Edit Form -->
                                </div>
                            </div>

                        </div>
                    </div>
        </section>


        <div class="justify-content-center print-sec d-flex my-5" style="margin-top: -1rem!important;">
            <button class="btn btn-primary shadow mx-2" onclick="history.back()">Go Back</button>
        </div>



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php require_once 'require/addfooter.php'; ?>


    <script type="text/javascript">
    function vendordetails() {
        document.getElementById("chack").style.display = "block";
    }
    </script>




</body>

</html>