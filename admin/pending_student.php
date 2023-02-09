<?php

session_start();



$page = "Pending Student Details";



require_once '../_config/dbconnect.php';



require_once '../classes/studdetails.class.php';



require_once '../classes/pending.class.php';



require_once '../classes/student.class.php';



require_once '../classes/admin.class.php';



require_once '../classes/exam.class.php';



require_once '../classes/utility.class.php';


require_once '../includes/constant.php';




$Utility              = new Utility(); 



$Admin                = new Admin();



$Student              = new Pending();



$Examination          = new Examination();



$Students             = new Student();



$showStudentDetails   = $Student->pen_studentByClass($_GET['studenttype']);





// $showStudentfinalexam = $Examination->examByClassName($_GET['studenttype']);



$_SESSION['current-url'] = $Utility->currentUrl();

  

if (!isset($_SESSION['user_name']) && !isset($_SESSION['loggedin']) ) {



  header("Location: login.php");



  exit;



}



?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">



    <title>Pending Fees -<?php echo SITE_NAME; ?></title>

    <meta content="" name="description">

    <meta content="" name="keywords">

    <?php require_once 'require/headerLinks.php'; ?>

</head>



<body>

    <!-- ======= Header ======= -->

    <?php require_once 'require/navigationbar.php'; ?>

    <!-- ===== End Header ===== -->



    <!--======== sidebar ========-->

    <?php require_once 'require/sidebar.php'; ?>

    <!--======== End sidebar ========-->



    <main id="main" class="main">



        <div class="pagetitle">

            <h1>Pending Student Details</h1>

            <nav>

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>

                    <li class="breadcrumb-item "><a href="pending_studentdetails.php">Pending Student

                            Details</a></li>

                    <li class="breadcrumb-item active">Class <?php  echo $_GET['studenttype']  ?></li>

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

                                        <tr>

                                            <th scope="col">S.No</th>

                                            <th scope="col">Roll Number</th>

                                            <th scope="col">Student Name</th>

                                            <th scope="col">Guardian's Name</th>

                                            <th scope="col">Student Id</th>

                                            <th scope="col">Total Fees</th>

                                            <th scope="col">Pending Fees</th>

                                            <th scope="col">Fees Status</th>







                                        </tr>

                                    </thead>

                                    <tbody>



                                        <?php



                                    $i=1;



                                    if ($showStudentDetails == 0) {



                                    echo "No data Type Avilable.";



                                    }else{



                                    foreach ($showStudentDetails as $showStudentDetailsshow) {



                                    $showclass          = $showStudentDetailsshow['class'];



                                    $showname           = $showStudentDetailsshow['name'];

 

                                    $showstuid          = $showStudentDetailsshow['student_id'];



                                    $showid             = $showStudentDetailsshow['id'];

 

                                    $showadvanced       = $showStudentDetailsshow['advanced'];

                                    

                                    



                                    



                                    $showdate           = $showStudentDetailsshow['date'];



                                    $total_due          = $showStudentDetailsshow['total_due'];



                                    // $amount             = $showStudentDetailsshow['amount'];

                                    $showStudents  = $Student-> pen_students($showstuid);
                                    foreach ($showStudents as $showrowstus) {

                                    $showStudent  = $Student-> pen_student($showstuid);



                                    foreach ($showStudent as $showrowstu) {

                         

                                        $showgurdian_name   = $showrowstu['gurdian_name'];



                                        $showroll_no        = $showrowstu['roll_no'];



                                        $showtotal_amount   = $showrowstu['payable_fee'];



                                    // $showstu = "pendingfees.ajax.php?feespendings=". $showstuid ."&fee_account". $Fees_account;



                                    // $result  = $Students-> studentsByFees($showstuid);



                                    // $showFees_accounts   = $Students->studentFeesaccount($showstuid, $Fees_account);



                                    // $sameFees_accounts   = $Students->sameFeesaccount($showstuid, $Fees_account);



                                    // foreach ($result as $showrows) {



                                    //     $showamount         = $showrows['Total'];

                                    //     } 



                                    // foreach ($showFees_accounts as $showrow) {



                                    //     $purpose           = $showrow['purpose'];

                            

                                    //     $amountshow        = $showrow['amount'];

                                                               

                            

                                    //    foreach ($sameFees_accounts as $samefee){

                            

                                    //     $sumdata           = $samefee['sum'];

                                                                                                               



                                    

                                    // $pendingamount      = $showtotal_amount - $showamount;



                                    // $monthly            = $showtotal_amount / 12;

                        

                        

                                    // $month              = date("m");

                        

                                    // $monthPending       = $month*$monthly - $showamount;

                                    

                                    // if($showamount >= $month*$monthly && $sumdata >= $amountshow){



                                    // echo ' '; 

                    

                                    // } else {




                                    //    monthly fees pading then it is show 

                                    // process start
                                        

                                    $showstu = "pendingfees.ajax.php?feespendings=". $showstuid;



                                    $result  = $Students-> studentsByFees($showstuid);



                                    foreach ($result as $showrows) {



                                    $showamount         = $showrows['Total'];

                                    }                                                       

                                    





                                    

                                    $pendingamount      = $showtotal_amount - $showamount;



                                    $monthly            = $showtotal_amount / 12;

                        

                        

                                    $month              = date("m");

                        

                                    $monthPending       = $month*$monthly - $showamount;

                                    

                                    if($showamount >= $month*$monthly){



                                    echo ' '; 

                    

                                    } else {

                        

                                    // process end       

                                ?>



                                        <tr
                                            <?php if ($showrowstus['status']== 'active') echo 'style="color: black"' ; if ($showrowstus['status']== 'inactive') echo 'style="color: red"' ;?>>



                                            <td><?php  echo $i                   ?></td>

                                            <td><?php  echo $showroll_no         ?></td>



                                            <td><?php  echo $showname            ?></td>

                                            <td><?php  echo $showgurdian_name    ?></td>

                                            <td><?php  echo $showstuid           ?></td>

                                            <td><?php $showtotal_amount   = number_format($showtotal_amount, 2); echo $showtotal_amount        ?>
                                            </td>

                                            <td><?php $total_due   = number_format($total_due, 2); echo $total_due              ?>
                                            </td>



                                            <td><?php 

                                         

                                     

                                         echo '<span class="badge bg-warning">Pending</span>';

                                         

                                               ?>





                                                <i class="bi bi-hourglass-split ps-4" data-bs-toggle="modal"
                                                    data-bs-target="#pendingfeesModal" id="<?php    echo $showstuid  ?>"
                                                    onclick='pendingfees("<?php    echo $showstuid  ?>", this.id);'></i>

                                                <!-- Modal -->

                                                <div class="modal fade" id="pendingfeesModal" tabindex="-1"
                                                    aria-labelledby="pendingfeesModalLabel" aria-hidden="true">

                                                    <div class="modal-dialog modal-lg">

                                                        <div class="modal-content">

                                                            <div class="modal-header">

                                                                <h5 class="modal-title" id="pendingfeesModalLabel">



                                                                </h5>

                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>

                                                            </div>

                                                            <div class="modal-body pendingfees-modal-body">

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                                <!-- modal end -->



                                            </td>



                                        </tr>



                                        <?php  

                                        $i++;                                                                          

                                    

                                        }

                                    }}}

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
    const pendingfees = (id) => {

        let url = 'ajax/pendingfees.ajax.php?feespending=' + id;

        $(".pendingfees-modal-body").html(

            '<iframe width="100%" height="500px" frameborder="0" allowtransparency="true" src="' + url +

            '"></iframe>')



    }
    </script>



</body>



</html>