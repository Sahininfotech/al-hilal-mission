<?php

session_start();

$page = "Student Details";



require_once '../_config/dbconnect.php';

require_once '../classes/admin.class.php';

require_once '../classes/studdetails.class.php';

require_once '../classes/institutedetails.class.php';

require_once '../classes/studdetails.class.php';

require_once '../classes/fees-accounts.class.php';

require_once '../classes/student.class.php';







$Admin                  = new Admin();

$Institute              = new InstituteDetails();                                

$StudentDetails         = new StudentDetails();

$FeesAccount            = new FeesAccount();

$Student     = new  Student();







$insertEmpQuery=false;



  if(isset ( $_POST["submit"])){



    $name           = $_POST["name"];

    $email          = $_POST["email"];

    $gurdian_name   = $_POST["gurdian_name"];

    $contact_no     = $_POST["contact_no"];

    $gender         = $_POST["gender"];

    $class          = $_POST["class"];

    $stream         = '';

    if (isset($_POST["stream"])) {

        $stream         = $_POST["stream"];

    }

    $address        = $_POST["address"];

    $post_office    = $_POST["post_office"];

    $police_station = $_POST["police_station"];

    $pin_code       = $_POST["pin_code"];

    $sdo            = $_POST["sdo_or_bdo"];

    $district       = $_POST["district"];

    $state          = $_POST["state"];

    $status         = 1;

    $date_of_birth  = $_POST["date_of_birth"];

    $academic_year  = $_POST["session"];

    $roll_no        = $_POST["roll_no"];


    //image uplod 
    $signature        = $_FILES[ 'image' ][ 'name' ];
    $image_size       = $_FILES[ 'image' ][ 'size' ];
    $image_tmp_name   = $_FILES[ 'image' ][ 'tmp_name' ];
    $image_folter     = 'image/'.$image;
  //   echo $image_tmp_name; exit;

    //   move_uploaded_file( $image_tmp_name, $image_folter );
    


    $code           = rand(1, 99999);

    $student_id     = "STUD".$code;









  }



//   if(isset ( $_POST["submit"])){



//     $class_id = $_POST["class"];



//   }



//   if(isset ( $_POST["submit"])){

//     if($class == 11||$class == 12){

//       $class_id =  $_POST["class"];

//       $dept_id  =  $_POST["stream"];



//     }

//   }



 

//   if(isset ( $_POST["submitdata"])){

    

//     foreach($_POST as $purposes => $amounts) {

//       echo  $purposes . "=>" . $amounts;



//       $purposesw = $purposes;

//       $amountsw = $amounts;



//       $result   = $FeesAccount->addFeesAccounts($student_id, $purposesw, $amountsw);





//     }

   





    // }      



$result                 = $Institute->instituteShow();

$feesAccounts           = $FeesAccount->showAccount($class);

$Tolatfees              = $FeesAccount->showTotalamount($class);





// if(isset ( $_POST["submitdata"])){

// $amounts   = $_POST["amount"];



// $sum = 0;





// for ($i = 0; $i < count($amounts); $i++)  {

//    $sum += $amounts[$i];

//    echo "<br>";

//   echo  $sum;}exit;

// }





?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Student Management / Student Details / NiceAdmin Bootstrap Template</title>

    <meta content="" name="description">

    <meta content="" name="keywords">

    <?php require_once 'require/headerLinks.php';?>

    <style>

    .genderingrows {

        margin: auto;

        display: inline-flex;

        justify-content: start;

    }



    @media (max-width: 980px) {

        .w-50 {

            width: 100%;

        }



    }

    </style>

</head>



<body>

    <!-- ======= Header ======= -->

    <?php require_once 'require/navigationbar.php'; ?>

    <!-- End Header -->





    <main id="main" class="main w-100 ms-0">



        <div class="pagetitle">

            <h1>Submit Marks</h1>

            <nav>

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                    <li class="breadcrumb-item"><a href="addnewstudent.php">Student

                            Management</a></li>

                    <li class="breadcrumb-item "><a href="studentdetails.php">Student

                            Details </a></li>

                    <li class="breadcrumb-item active">Submit Marks </li>

                </ol>

            </nav>

        </div>

        <!-- End Page Title -->



        <section class="section">

            <div class="container p-0">





                <div class="card">

                    <div class="card-body row justify-content-center pt-0 p-3">

                        <h5 class="card-title p-2"></h5>



                        <!-- staffform -->

                        <!-- ajax/addnewstudent.ajax.php -->

                        <div class="w-50">



                            <form method="POST" action="ajax/addnewstudent.ajax.php" class="needs-validation m-0" enctype="multipart/form-data"

                                novalidate>

                                <?php

                                

                                foreach($feesAccounts as $feeAcc){

                                    $myuid = uniqid('inp');

                                  

                                  $autoid    = $feeAcc['purpose'].$myuid;

                                  $feeAccs = $feeAcc['purpose'];

                                  $feeAmount = $feeAcc['amount'];



                                  foreach($Tolatfees as $feesAcc){

                                  $amount = $feesAcc['totalamount'];

                                  }

                                  

                                    ?>







                                <input type="hidden" class="form-control" name="student_id"

                                    value="<?php echo $student_id; ?>" required>



                                <input type="hidden" class="form-control" name="name" value="<?php echo $name ; ?>"

                                    required>



                                <input type="hidden" class="form-control" name="gurdian_name"

                                    value="<?php echo $gurdian_name ; ?>" required>



                                <input type="hidden" class="form-control" name="email" value="<?php echo $email ; ?>"

                                    required>



                                <input type="hidden" class="form-control" name="contact_no"

                                    value="<?php echo $contact_no ; ?>" required>



                                <input type="hidden" class="form-control" name="date_of_birth"

                                    value="<?php echo $date_of_birth ; ?>" required>



                                <input class="form-control" type="hidden" name="gender" value="<?php echo $gender ; ?>"

                                    required>



                                <input class="form-control" type="hidden" name="session"

                                    value="<?php echo $academic_year ; ?>" required>



                                <input type="hidden" class="form-control" name="roll_no"

                                    value="<?php echo $roll_no ; ?>" required>



                                <input type="hidden" class="form-control" name="class" value="<?php echo $class ; ?>"

                                    required>


                                    <input class="form-control" type="hidden" name="image"
                                    value="<?php echo $signature ; ?>" required>


                                <input type="hidden" class="form-control" name="stream" value="<?php echo $stream ; ?>"

                                    required>



                                <input type="hidden" class="form-control" name="address"

                                    value="<?php echo $address ; ?>" required>



                                <input type="hidden" class="form-control" name="post_office"

                                    value="<?php echo $post_office ; ?>" required>



                                <input type="hidden" class="form-control" name="sdo_or_bdo" value="<?php echo $sdo ; ?>"

                                    required>



                                <input type="hidden" class="form-control" name="police_station"

                                    value="<?php echo $police_station ; ?>" required>



                                <input type="hidden" class="form-control" name="district"

                                    value="<?php echo $district ; ?>" required>



                                <input type="hidden" class="form-control" name="pin_code"

                                    value="<?php echo $pin_code ; ?>" required>



                                <input type="hidden" class="form-control" name="state" value="<?php echo $state ; ?>"

                                    required>



                                <div class="row m-0 p-0 mb-3">

                                    <label for="inputText" class="col-6 form-label"><?php echo $feeAccs; ?> :</label>

                                    <div class="col-6 p-0">





                                        <input type="hidden" id="<?php  echo $autoid  ?>"

                                            value="<?php echo $feeAccs; ?>" class="form-control" name="purpose[]"

                                            readonly required>



                                        <input type="text" id="<?php  echo $autoid  ?>"

                                            value="<?php echo $feeAmount; ?>" class="form-control" name="amount[]"

                                            readonly required>

                                    </div>

                                </div>

                                <?php



                                }

                               

                                ?>



                                <div class="row m-0 p-0 mb-3">

                                    <legend class="col-form-label col-xl-6 col-lg-6 pt-2">Discount :</legend>

                                    <div class="col-xl-6 col-lg-6 mb-3 p-0 genderingrows">



                                        <div class="form-check">

                                            <input class="form-check-input" type="radio" name="dis" id="gridRadios2"

                                                onclick="Func_a()" value="Yes" >

                                            <label class="form-check-label" for="gridRadios2">

                                                Yes

                                            </label>

                                        </div>



                                    </div>

                                </div>



                                <div class="row m-0 p-0 mb-3">

                                    <label for="inputText" class="col-6 form-label" id="demo2"

                                        style="display: none;">Discount Amount :</label>

                                    <div class="col-6 p-0" id="demo3" style="display: none;">

                                        <input type="text" id="totalid" class="form-control" name="discount" value=""

                                            onkeyup='totalItem(this.value)' >

                                    </div>

                                </div>



                                <!-- <div class="row m-0 p-0 mb-3">

                                    <label for="inputText" class="col-6 form-label" id="purpose"

                                        style="display: none;">purpose :</label>

                                    <div class="col-6 p-0" id="purposes" style="display: none;">

                                        <select class="form-select" id="form-select" onclick="Func_a()"

                                            aria-label="Default select example" name="purpose" >

                                            <option >Select data</option>



                                            

                                            foreach($feesAccounts as $feeAcc){



                                            $feeAccs = $feeAcc['purpose'];



                                            echo '<option value="'.$feeAccs.'">'.$feeAccs.'</option>';



                                            }

                                            ?

                                        </select>

                                    </div>

                                </div> -->





                                <div class="row m-0 p-0 mb-3">

                                    <label for="inputText" class="col-6 form-label" id="issues"

                                        style="display: none;">Issue :</label>

                                    <div class="col-6 p-0" id="issue2" style="display: none;">

                                        <input type="text" id="totalids" class="form-control" name="conc_remark" value=""

                                            >

                                    </div>

                                </div>





                                <hr>

                                <div class="row m-0 p-0 mb-3">

                                    <label for="inputText" class="col-6 form-label">Total :</label>

                                    <div class="col-6 p-0">

                                        <input type="text" id="totalamo" class="form-control" name="total_amount"

                                            value="<?php echo $amount ?>" readonly required>

                                    </div>

                                </div>



                                <div class="row m-0 p-0 mb-3">

                                    <label for="inputText" class="col-6 form-label" id="after"

                                        style="display: none;">After Discount :</label>

                                    <div class="col-6 p-0" id="afterdis" style="display: none;">

                                        <input type="text" id="afterdiscount" class="form-control"  value=""

                                            >

                                    </div>

                                </div>





                                <div class="row mb-3 m-0 p-0" style="margin-top: 2.5rem;">



                                    <div class="col-xl-12 col-lg-12  d-flex justify-content-center align-items-center">

                                        <button type="submit" class="btn btn-primary" name="submitdata">Submit

                                            Form</button>

                                    </div>

                                </div>



                            </form>

                        </div>



                        <!-- End staffform -->



                    </div>

                </div>

            </div>

        </section>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- <script scr="ajax.js"></script> -->

    </main>

    <!-- End #main -->

    <script>



    function totalItem(data) {

    var xx = document.getElementById("totalamo");

    document.getElementById("afterdiscount").value = Number(xx.value) - Number(data);

}

    </script>



    <script>

    function Func_a() {

        var demo_two = document.getElementById('demo2');

        var demo = document.getElementById('gridRadios2');

        if (demo.value == "Yes" || demo.value == "Yes") {

            demo_two.style.display = "block";

        } else {

            demo_two.style.display = "none";

        }

        var demo_two = document.getElementById('demo3');

        var demo = document.getElementById('gridRadios2');

        if (demo.value == "Yes" || demo.value == "Yes") {

            demo_two.style.display = "block";

        } else {

            demo_two.style.display = "none";

        }





        var demo_two = document.getElementById('issues');

        var demo = document.getElementById('gridRadios2');

        if (demo.value == "Yes" || demo.value == "Yes") {

            demo_two.style.display = "block";

        } else {

            demo_two.style.display = "none";

        }

        var demo_two = document.getElementById('issue2');

        var demo = document.getElementById('gridRadios2');

        if (demo.value == "Yes" || demo.value == "Yes") {

            demo_two.style.display = "block";

        } else {

            demo_two.style.display = "none";

        }





        var demo_two = document.getElementById('after');

        var demo = document.getElementById('gridRadios2');

        if (demo.value == "Yes" || demo.value == "Yes") {

            demo_two.style.display = "block";

        } else {

            demo_two.style.display = "none";

        }

        var demo_two = document.getElementById('afterdis');

        var demo = document.getElementById('gridRadios2');

        if (demo.value == "Yes" || demo.value == "Yes") {

            demo_two.style.display = "block";

        } else {

            demo_two.style.display = "none";

        }

    }

    </script>







</body>



</html>