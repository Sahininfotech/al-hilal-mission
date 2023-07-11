<?php

session_start();

$page ="fees-accounts";

require_once '../_config/dbconnect.php';

require_once '../classes/admin.class.php';

require_once '../classes/institutedetails.class.php';

require_once '../classes/fees-accounts.class.php';

require_once '../classes/utility.class.php';

require_once '../classes/classes.class.php';

require_once '../includes/constant.php';

$Admin              = new Admin();

$InstituteDetails   = new InstituteDetails();

$FeesAccount        = new FeesAccount();

$Utility            = new Utility();

$Classes            = new Classes();



$showStudentDetails = $Classes->classesList();



$feesAccounts           = $FeesAccount->showAccounts();



$feesStructure           = $FeesAccount->showfees_structure();



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







    <title>Institute Management / Examinations - <?php echo SITE_NAME; ?></title>



    <meta content="" name="description">



    <meta content="" name="keywords">



    <?php require_once 'require/headerLinks.php';?>


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

            <h1>Fees Accounts</h1>

            <nav>

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                    <li class="breadcrumb-item">Institute Management</li>

                    <li class="breadcrumb-item active">Fees Accounts</li>

                </ol>

            </nav>

        </div><!-- End Page Title -->

        <section class="section dashboard">

            <div class="row">

                <div class="col-lg-6">

                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">

                            <h5 class="card-title mb-0 mt-0">Fees Accounts </h5>

                            <button type="button" class="btn btn-primary mb-4 addnewbtncss" data-bs-toggle="modal"
                                data-bs-target="#addAccountModal" onclick="addAccount();">

                                Add Accounts

                            </button>

                            <table class="table datatable">

                                <thead>

                                    <tr>

                                        <th scope="col">SL. NO.</th>

                                        <th scope="col">Account Name</th>

                                        <th scope="col">Added On</th>

                                        <th scope="col">Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php

                                        $sl = 1;

                                        $accs = $FeesAccount->showAccounts();

                                        foreach($accs as $acc){

                                    ?>

                                    <tr>

                                        <th><?php echo $sl; ?></th>

                                        <td><?php echo $acc['account_name']; ?></td>

                                        <td><?php echo date("d-m-Y", strtotime($acc['added_on'])); ?></td>

                                        <td>

                                            <i class="bi bi-eye-fill pe-2" data-bs-toggle="modal"
                                                data-bs-target="#accountModal" id="<?php echo $acc['id']  ?>"
                                                onclick="accountShow(this.id);"></i>

                                            <a href='ajax/fees-acc.delete.ajax.php?data=<?php echo $acc['id']  ?>'>

                                                <i class="bi bi-trash" onclick="return deleteFeeAcc();"></i></a>

                                        </td>

                                    </tr>

                                    <?php

                                    $sl++;

                                        }

                                    ?>

                                </tbody>

                            </table>

                            <!-- End Table with stripped rows -->

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">

                            <h5 class="card-title mb-0 mt-0">Fees Structure </h5>

                            <button type="button" class="btn btn-primary mb-4 addnewbtncss" data-bs-toggle="modal"
                                data-bs-target="#addfeesModal" onclick="addFees();">

                                Add Fees Structure

                            </button>

                            <table class="table datatable">

                                <thead>

                                    <tr>

                                        <th scope="col">SL. NO.</th>

                                        <th scope="col">Class</th>

                                        <th scope="col">Account Name</th>

                                        <th scope="col">Amount</th>

                                        <th scope="col">Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php
                                    $sl = 1;
                                    foreach($feesStructure as $acc){
                                    $amount = $acc['amount'];
                                    $amount   = number_format($amount, 2);
                                    $feesDetails = $FeesAccount->schowAccountById($acc['purpose']);   
                                                
                                    foreach($feesDetails as $feesacc){

                                        $acc_name = $feesacc['account_name'];
                                    
                                    ?>

                                    <tr>

                                        <th><?php echo $sl;             ?></th>

                                        <td><?php echo $acc['class_id'] ?></td>

                                        <td><?php echo $acc_name  ?></td>

                                        <td><?php echo $amount   ?></td>

                                        <td>

                                            <i class="bi bi-eye-fill pe-2" data-bs-toggle="modal"
                                                data-bs-target="#accountFeesModal" id="<?php echo $acc['id']  ?>"
                                                onclick="accountFees(this.id);"></i>

                                            <a href='ajax/fees-stur.delete.ajax.php?Feesdata=<?php echo $acc['id']  ?>'>

                                                <i class="bi bi-trash" onclick="return deleteFeestur();"></i></a>

                                        </td>

                                    </tr>

                                    <?php
                                    $sl++;
                                    }}
                                    ?>

                                </tbody>

                            </table>

                            <!-- End Table with stripped rows -->

                        </div>

                    </div>

                </div>

            </div>

        </section>





        <section class="section dashboard">

            <div class="row">

                <div class="col-lg-6">

                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">

                            <h5 class="card-title mb-0 mt-0">Monthly Fees Structure </h5>

                            <button type="button" class="btn btn-primary mb-4 addnewbtncss" data-bs-toggle="modal"
                                data-bs-target="#addmonthfeesModal" onclick="addmonthlyFees();">

                                Add Monthly Fees

                            </button>

                            <table class="table datatable">

                                <thead>

                                    <tr>

                                        <th scope="col">SL. NO.</th>

                                        <th scope="col">Class</th>

                                        <th scope="col">Monthly Amount</th>

                                        <th scope="col">Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php

                                    $sl = 1;     
                                    $monthlyFees    = $FeesAccount->monthlyfees_structure();
                                    foreach($monthlyFees as $monthacc){
                                    $amount = $monthacc['amount'];
                                    $amount   = number_format($amount, 2);

                                    ?>

                                    <tr>

                                        <th><?php echo $sl;             ?></th>

                                        <td><?php echo $monthacc['class_id'] ?></td>

                                        <td><?php echo $amount  ?></td>

                                        <td>

                                            <i class="bi bi-eye-fill pe-2" data-bs-toggle="modal"
                                                data-bs-target="#addmontheditfeesModal" id="<?php echo $monthacc['id']  ?>"
                                                onclick="accountmonthlyFees(this.id);"></i>

                                            <a
                                                href='ajax/monthly-fees.delete.ajax.php?Feesdata=<?php echo $monthacc['id']  ?>'>

                                                <i class="bi bi-trash" onclick="return deletemonFeestur();"></i></a>

                                        </td>

                                    </tr>

                                    <?php

                                    $sl++;

                                        }

                                    ?>

                                </tbody>

                            </table>

                            <!-- End Table with stripped rows -->

                        </div>

                    </div>

                </div>





            </div>

        </section>







    </main><!-- End #main -->





    <!-- ======= Footer ======= -->

    <?php require_once 'require/addfooter.php'; ?>



    <!-- accountModal Stat -->

    <!-- model 1 -->

    <div class="modal fade" id="accountModal" tabindex="-1" aria-labelledby="accountModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="accountModalLabel">



                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body examForm-modal-body">

                </div>

            </div>

        </div>

    </div>



    <!-- model 2 -->



    <div class="modal fade" id="accountFeesModal" tabindex="-1" aria-labelledby="accountFeesModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="accountFeesModalLabel">



                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body Fees-modal-body">

                </div>

            </div>

        </div>

    </div>

    <!-- accountModal end -->


    <!-- Modal -->

    <div class="modal fade" id="addAccountModal" tabindex="-1" aria-labelledby="addAccountModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body addAccount-modal-body">



                </div>



            </div>

        </div>

    </div>

    <!-- modal end -->



    <!-- Modal -->

    <div class="modal fade" id="addfeesModal" tabindex="-1" aria-labelledby="addfeesModal" aria-hidden="true">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body addfees-modal-body">



                </div>



            </div>

        </div>

    </div>

    <!-- modal end -->



    <!-- Modal -->

    <div class="modal fade" id="addmonthfeesModal" tabindex="-1" aria-labelledby="addmonthfeesModal" aria-hidden="true">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body addmonthfees-modal-body">



                </div>



            </div>

        </div>

    </div>

    <!-- modal end -->



    <!-- Modal -->

    <div class="modal fade" id="addmontheditfeesModal" tabindex="-1" aria-labelledby="addmontheditfeesModal"
        aria-hidden="true">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body addmontheditfees-modal-body">



                </div>



            </div>

        </div>

    </div>

    <!-- modal end -->



    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>



    <script>
    const accountShow = (id) => {



        let url = 'ajax/fees-acc.edit.ajax.php?data=' + id;



        $(".examForm-modal-body").html(

            '<iframe width="100%" height="264px" frameborder="0" allowtransparency="true" src="' + url +

            '"></iframe>')

    }





    const accountFees = (id) => {



        let url = 'ajax/fees-amo.edit.ajax.php?feesdata=' + id;



        $(".Fees-modal-body").html(

            '<iframe width="100%" height="264px" frameborder="0" allowtransparency="true" src="' + url +

            '"></iframe>')

    }





    const deleteFeeAcc = () => {

        return confirm("DO YOU REALLY WANT TO DELETE THIS FEES ACCOUNT CONTENTS ?")

    };



    



    const deleteFeestur = () => {

        return confirm("DO YOU REALLY WANT TO DELETE THIS FEES STRUCTURE CONTENTS ?")

    };


    const deletemonFeestur = () => {

        return confirm("DO YOU REALLY WANT TO DELETE THIS MONTHLY FEES STRUCTURE CONTENTS ?")

    };



    const addAccount = () => {

        let url = 'ajax/account.add.ajax.php';

        $(".addAccount-modal-body").html(

            '<iframe width="100%%" height="200px" frameborder="0" allowtransparency="true" src="' + url +

            '"></iframe>')



    }


    const addFees = () => {

        let url = 'ajax/feesstructure.add.ajax.php';

        $(".addfees-modal-body").html(

            '<iframe width="100%%" height="500px" frameborder="0" allowtransparency="true" src="' + url +

            '"></iframe>')



    }

    const addmonthlyFees = () => {

        let url = 'ajax/monthlyfees.add.ajax.php';

        $(".addmonthfees-modal-body").html(

            '<iframe width="100%%" height="200px" frameborder="0" allowtransparency="true" src="' + url +

            '"></iframe>')



    }

    const accountmonthlyFees = (id) => {

        let url = 'ajax/monthlyfees.edit.ajax.php?feesdata=' + id;

        $(".addmontheditfees-modal-body").html(

            '<iframe width="100%" height="265px" frameborder="0" allowtransparency="true" src="' + url +

            '"></iframe>')

    }

    // Example starter JavaScript for disabling form submissions if there are invalid fields

    (function() {

        'use strict'



        // Fetch all the forms we want to apply custom Bootstrap validation styles to

        var forms = document.querySelectorAll('.needs-validation')



        // Loop over them and prevent submission

        Array.prototype.slice.call(forms)

            .forEach(function(form) {

                form.addEventListener('submit', function(event) {

                    if (!form.checkValidity()) {

                        event.preventDefault()

                        event.stopPropagation()

                    }



                    form.classList.add('was-validated')

                }, false)

            })

    })()
    </script>



</body>



</html>