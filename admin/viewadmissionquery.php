<?php 
session_start();
$page = "Admission Query";

require_once '../_config/dbconnect.php';
require_once '../classes/admin.class.php';
require_once '../classes/studdetails.class.php';
require_once '../classes/contact.class.php';
require_once '../classes/utility.class.php';
require_once '../includes/constant.php';

$dataupdate = new  StudentDetails();
$Contact    = new Contact();
$Admin      = new Admin();
$Utility    = new Utility();

$_SESSION['current-url'] = $Utility->currentUrl();


if (!isset($_SESSION['user_name']) && !isset($_SESSION['loggedin']) ) {

    header("Location: login.php");
  
    exit;
  
  }

$blog_id		= $_GET['message'];
$approved		= $_GET['approved'];
// $updated_by     =   $_SESSION[ADM_SESS];
$add         = $Contact->updatequeryStatus($blog_id, $approved);

if($add ){
$viwe=$Contact->viweadmission($_GET['message']);
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Contacts/ Admission Query Message || <?php echo SITE_NAME; ?></title>
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
            <h1>Viwe Message</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Contacts</li>
                    <li class="breadcrumb-item">Admission Query Details</li>
                    <li class="breadcrumb-item active">Message</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="container p-0">


                <div class="card">
                    <div class="card-body pt-0 p-3">
                        <h5 class="card-title p-2"></h5>

                        <!-- staffform -->
                        <!-- ajax/addnewstudent.ajax.php -->
                        <?php
                foreach ($viwe as $messageshow) {
                    $showname                 = $messageshow['name'];
                    $showgurdian_name         = $messageshow['gurdian_name'];
                    $showemail                = $messageshow['email_id'];
                    $showcontact_no           = $messageshow['contact_no'];
                    $showstatus               = $messageshow['status'];
                    $showdate                 = $messageshow['added_on'];
                    $showid                   = $messageshow['id'];
                    
                    $showstate                = $messageshow['state'];
                    $showgender               = $messageshow['gender'];
                    $showprevious_school      = $messageshow['previous_school'];
                    $showprevious_class       = $messageshow['previous_class'];
                    $showadmission_class      = $messageshow['admission_class'];
                    $showaddress              = $messageshow['address'];
                    $showdistrict             = $messageshow['district'];

                    $showpolice_station       = $messageshow['police_station'];
                    $showpin_code             = $messageshow['pin_code'];
                    $showdescription          = $messageshow['description'];
                   
              
              ?>
                <form method="POST" action="#">
             <div class="card ps-4 pe-4 mb-0" style="box-shadow: none">

             <h5 class="card-title p-0 d-flex justify-content-center">
               Message
            </h5>

            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Name :</label>
                <div class="col-sm-10">
                    <input type="text" maxlength="80" class="form-control" name="name" value="<?php    echo $showname ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">gurdian name :</label>
                <div class="col-sm-10">
                    <input type="text" maxlength="80" class="form-control" name="name" value="<?php    echo $showgurdian_name ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email Id :</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" name="email" value="<?php    echo $showemail ?>" required>
                </div>
                <label for="inputNumber" class="col-sm-2 col-form-label">Contact No :</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?php    echo $showcontact_no ?>" name="subject" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Date :</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" name="email" value="<?php    echo $showdate ?>" required>
                </div>
                <label for="inputNumber" class="col-sm-2 col-form-label">Gender :</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?php    echo $showgender ?>" name="subject" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Previous School :</label>
                <div class="col-sm-10">
                    <input type="text" maxlength="80" class="form-control" name="name" value="<?php    echo $showprevious_school ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Previous Class :</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" name="email" value="<?php    echo $showprevious_class ?>" required>
                </div>
                <label for="inputNumber" class="col-sm-2 col-form-label">Admission Class :</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?php    echo $showadmission_class ?>" name="subject" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Address :</label>
                <div class="col-sm-10">
                    <input type="text" maxlength="80" class="form-control" name="name" value="<?php    echo $showaddress ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">District :</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" name="email" value="<?php    echo $showdistrict ?>" required>
                </div>
                <label for="inputNumber" class="col-sm-2 col-form-label">Police Station :</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?php    echo $showpolice_station ?>" name="subject" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Pin Code :</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" name="email" value="<?php    echo $showpin_code ?>" required>
                </div>
                <label for="inputNumber" class="col-sm-2 col-form-label">State :</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?php    echo $showstate ?>" name="subject" required>
                </div>
            </div>

            <div class="row mb-3">
            <label for="inputMessage" class="col-sm-2 col-form-label">Description :</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" name="message"><?php    echo $showdescription ?></textarea>
            </div>
            </div>
          
        </div>
    </form>
    <?php }} ?>

                        <!-- End staffform -->

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

</body>

</html>
<!-- padding-bottom: -0.5rem; -->