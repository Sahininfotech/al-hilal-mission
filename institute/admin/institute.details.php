<?php
session_start();
$page = "Institute Details";

require_once '../_config/dbconnect.php';
require_once '../classes/institutedetails.class.php';
require_once '../classes/admin.class.php';

$Admin = new Admin();
$institute = new  InstituteDetails();

$insertEmpQuery=false;

if(isset ($_POST["submit"])){
    // if($_SERVER['REQUEST METHOD'] == 'POST'){
     $email = $_POST["email"];
     $institute_name = $_POST["institute_name"];
     $contact_number = $_POST["contact_number"];
     $contact_number2 = $_POST["contact_number2"];
     $description = $_POST["description"];
   
      
 

        $result=$institute->update($email,  $institute_name, $contact_number, $contact_number2, $description);
      
       
      
        if(!$insertEmpQuery){
         echo "the update data wsa creat sucessfull <br>";
         }
        else{
          echo "update data not sucessfull <br>";
       
        }
     }
   


     $updateEmpQuery=false;


     if(isset ($_POST["update"])){
        // if($_SERVER['REQUEST METHOD'] == 'POST'){
         $address = $_POST["address"];
         $post_office = $_POST["post_office"];
         $police_station = $_POST["police_station"];
         $district = $_POST["district"];
         $pin_code = $_POST["pin_codes"];
         $state = $_POST["state"];
        
     
    
            $result=$institute->instituteupdate($address, $post_office, $police_station, $district,  $pin_code, $state);
          
           
          
            if(!$updateEmpQuery){
             echo "the update data wsa creat sucessfull <br>";
             }
            else{
              echo "update data not sucessfull <br>";
           
            }
         }
       



         $princpleupdateEmpQuery=false;
    
    
         if(isset ($_POST["update1"])){
            // if($_SERVER['REQUEST METHOD'] == 'POST'){
             $name = $_POST["name"];
             $address = $_POST["address"];
             $qualification = $_POST["qualification"];
             $email = $_POST["email"];
             $contact_no = $_POST["contact_no"];
             

        
                $result=$institute->princpleupdate($address,  $name, $qualification, $email,  $contact_no);
              
               
              
                if(!$princpleupdateEmpQuery){
                 echo "the update data wsa creat sucessfull <br>";
                 }
                else{
                  echo "update data not sucessfull <br>";
               
                }
             }
           


             $instDetails = $institute->instituteShow();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Institute Details - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


</head>

<body>
    <style>
    .institute_logo {
        width: 100%;
    }
    </style>
    <!-- ======= Header ======= -->
    <?php require_once 'require/navigationbar.php'; ?>
    <!-- End Header -->


    <!--======== sidebar ========-->
    <?php require_once 'require/sidebar.php'; ?>
    <!--======== End sidebar ========-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Institute Details</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                    <li class="breadcrumb-item active">Institute Details</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->




        <section class="section">
            <div class="container">

                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title d-flex align-item-center justify-content-center mb-0 fs-4">Institute
                            Details Update</h1>

                        <!-- staffform -->
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                    foreach($instDetails as $row){
                               
                        if(!$insertEmpQuery){
                            ?>

                                <form method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>">
                                    <div class="col-md-11">
                                        <label class="mb-0 mt-0" for="institute name">Institute Name</label>
                                        <input class="form-control" type="text" id="institute name"
                                            value="<?php    echo $row['institute_name']  ?>" name="institute_name">
                                    </div>
                                    <!-- <div class="col-md-12">
                                        <label class="mb-0 mt-1" for="Principle name">Principle Name</label>
                                        <input class="form-control" type="text" name="Principle name"
                                            id="Principle name" value="">
                                    </div> -->
                                    <div class="col-md-11">
                                        <label class="mb-0 mt-1" for="description">Description</label>
                                        <textarea class="form-control" type="text"
                                            style="min-height: calc(12.4em + .75rem + 2px)" id="description"
                                            value="<?php    echo $row['description']  ?>"
                                            name="description"><?php    echo $row['description']  ?></textarea>
                                    </div>

                                    <div class="col-md-11">
                                        <label class="mb-0 mt-2" for="email">Institute Email</label>
                                        <input class="form-control" type="text" id="email"
                                            value="<?php    echo $row['email']  ?>" name="email">
                                    </div>
                                    <div class="col-md-11">
                                        <label class="mb-0 mt-2" for="contact-no">Contact Number 1</Address></label>
                                        <input class="form-control" type="text" id="contact-no"
                                            value="<?php    echo $row['contact_number']  ?>" name="contact_number">
                                    </div>

                                    <div class="col-md-11">
                                        <label class="mb-0 mt-2" for="contact-no">Contact Number 2</Address></label>
                                        <input class="form-control" type="text" id="contact-no"
                                            value="<?php    echo $row['contact_number2']  ?>" name="contact_number2">
                                    </div>

                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-2 me-md-2">
                                        <button class="btn btn-primary me-md-2" name="submit"
                                            type="submit">Update</button>
                                    </div>
                                </form>


                                <?php
                 }
                 ?>

                            </div>
                            <div class="col-md-6">
                                <?php
                   if(!$updateEmpQuery){
                     ?>
                                <form method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>">
                                    <div class="col-md-11">
                                        <label class="mb-0 mt-1" for="address">Address</label>
                                        <textarea class="form-control" type="text" maxlength="500" id="address-1"
                                            value="<?php    echo $row['address']  ?>"
                                            name="address"><?php    echo $row['address']  ?></textarea>
                                    </div>

                                    <div class="col-md-11">
                                        <label class="mb-0 mt-1" for="address">About</label>
                                        <textarea class="form-control" type="text" maxlength="500" id="about"
                                            value="<?php    echo $row['about']  ?>"
                                            name="about"><?php    echo $row['about']  ?></textarea>
                                    </div>

                                    <div class="col-md-11">
                                        <label class="mb-0 mt-1" for="dist">District</label>
                                        <input class="form-control" type="text" maxlength="50" id="District"
                                            value="<?php    echo $row['district']  ?>" name="district">
                                    </div>
                                    <div class="col-md-11">
                                        <label class="mb-0 mt-1" for="dist">Post Office</label>
                                        <input class="form-control" type="text" maxlength="50" id="post_office"
                                            value="<?php    echo $row['post_office']  ?>" name="post_office">
                                    </div>
                                    <div class="col-md-11">
                                        <label class="mb-0 mt-1" for="dist">Police Station</label>
                                        <input class="form-control" type="text" maxlength="50" id="police_station"
                                            value="<?php    echo $row['police_station']  ?>" name="police_station">
                                    </div>

                                    <div class="col-md-11">
                                        <label class="mb-0 mt-1 ps-1" for="pin">PIN</label>
                                        <input
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type="number" maxlength="6" class="form-control" id="pin"
                                            value="<?php    echo $row['pin_code']  ?>" name="pin_codes">
                                    </div>
                                    <div class="col-md-11">
                                        <label class="mb-0 mt-1" for="state">State</label>
                                        <select class="form-control" id="state" value="<?php    echo $row['state']  ?>"
                                            name="state">
                                            <option><?php    echo $row['state']  ?></option>
                                            <option>West Bengal</option>
                                            <option>Others</option>
                                        </select>
                                    </div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-2 me-md-2">
                                        <button class="btn btn-primary me-md-2" name="update"
                                            type="submit">Update</button>
                                    </div>
                                </form>
                                <?php
                                }    
                 }
                 ?>
                            </div>
                        </div>




                    </div>
                </div>




            </div>
        </section>


        <section class="section ">
            <div class="container">
                <?php
    
                $result=$institute->princpledisplaydata();

                ?>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title d-flex align-item-center justify-content-center mb-0 fs-4">Princple
                                Details</h1>
                            <?php
                              $result=$institute->princpledisplaydata();
                              foreach($result as $row){
                               
                            ?>

                            <?php
                   if(!$princpleupdateEmpQuery){
                     ?>
                            <form class="col-md-9 ms-auto" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>">
                                <div class="col-md-8  ">
                                    <label class="mb-0 mt-1" for="Principle name">Principle Name</label>
                                    <input class="form-control" type="text" value="<?php    echo $row['name']  ?>"
                                        name="name" id="name">
                                </div>
                                <div class="col-md-8">
                                    <label class="mb-0 mt-1" for="institute name">Address</label>
                                    <input class="form-control" type="text" value="<?php    echo $row['address']  ?>"
                                        name="address" id="address">
                                </div>
                                <div class="col-md-8">
                                    <label class="mb-0 mt-1" for="contact-no">Qualification</Address></label>
                                    <input class="form-control" type="text"
                                        value="<?php    echo $row['qualification']  ?>" name="qualification"
                                        id="Qualification">
                                </div>
                                <div class="col-md-8">
                                    <label class="mb-0 mt-1" for="email">Institute Email</label>
                                    <input class="form-control" type="text" value="<?php    echo $row['email']  ?>"
                                        name="email" id="email">
                                </div>
                                <div class="col-md-8">
                                    <label class="mb-0 mt-1" for="contact-no">Contact Number</Address></label>
                                    <input class="form-control" type="text" value="<?php    echo $row['contact_no']  ?>"
                                        name="contact_no" id="contact-no">
                                </div>
                                <div class=" col-md-8 d-grid gap-2 d-md-flex justify-content-md-center mt-2 me-md-2">
                                    <button class="btn btn-primary me-md-2 " name="update1"
                                        type="submit">Update</button>
                                </div>
                            </form>
                            
                            <?php
                 }
                }
                 ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>




    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php require_once 'require/addfooter.php'; ?>

</body>

</html>