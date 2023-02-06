<?php 
session_start();
$page ="Add New Student";

require_once '../_config/dbconnect.php';
require_once '../classes/admin.class.php';
require_once '../classes/studdetails.class.php';
require_once '../classes/contact.class.php';

$dataupdate = new  StudentDetails();
$Contact    = new Contact();
$Admin      = new Admin();


$blog_id		= $_GET['message'];
$approved		= $_GET['approved'];
// $updated_by     =   $_SESSION[ADM_SESS];
$add         = $Contact->updateStatus($blog_id, $approved);

if($add ){
$viwe=$Contact->viwemessage($_GET['message']);
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Add new Student - NiceAdmin Bootstrap Template</title>
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
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item">Contacts</li>
                    <li class="breadcrumb-item">Contacts Details</li>
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
                    $showname          = $messageshow['name'];
                    $showemail         = $messageshow['email'];
                    $showsubject       = $messageshow['subject'];
                    $showmessage       = $messageshow['message'];
                    $showdate          = $messageshow['date'];
                    $showid            = $messageshow['id'];
              
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
                <label for="inputEmail" class="col-sm-2 col-form-label">Email Id :</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" name="email" value="<?php    echo $showemail ?>" required>
                </div>
                <label for="inputNumber" class="col-sm-2 col-form-label">Subject :</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?php    echo $showsubject ?>" name="subject" required>
                </div>
            </div>
            <div class="row mb-3">
            <label for="inputMessage" class="col-sm-2 col-form-label">Message :</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" name="message"><?php    echo $showmessage ?></textarea>
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



</body>

</html>
<!-- padding-bottom: -0.5rem; -->