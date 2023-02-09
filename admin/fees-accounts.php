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

                    <div class="card m-0 ">

                        <div class="card-body p-3">

                            <h5 class="card-title">Add Accounts</h5>

                            <form method="POST" action="./ajax/fees-acc.add.ajax.php" class="row needs-validation  m-0"

                                novalidate>

                                <div class="row m-0 p-0 mb-3">

                                    <label for="inputText" class="col-sm-4 col-form-label">Account :</label>

                                    <div class="col-sm-8">

                                        <input type="text" maxlength="55" class="form-control" name="account_name"

                                            required>

                                    </div>

                                </div>

                                <div class="row mb-3 p-0 m-0">

                                    <div class="col-sm-12  d-flex justify-content-center align-items-center">

                                        <button type="submit" name="add" class="btn btn-primary">Add

                                        </button>

                                    </div>

                                </div>

                            </form>

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

                            <h5 class="card-title mb-0 mt-0">Fees Structure </h5>

                            <table class="table datatable">

                                <thead>

                                    <tr>

                                        <th scope="col">SL. NO.</th>

                                        <th scope="col">Class Id</th>

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

                                    ?>

                                    <tr>

                                        <th><?php echo $sl;             ?></th>

                                        <td><?php echo $acc['class_id'] ?></td>

                                        <td><?php echo $acc['purpose']  ?></td>

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

                                        }

                                    ?>

                                </tbody>

                            </table>

                            <!-- End Table with stripped rows -->

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="card m-0 ">

                        <div class="card-body p-3">

                            <h5 class="card-title">Add Fees Structure</h5>

                            <form method="POST" action="./ajax/fees-acc.add.ajax.php" class="row needs-validation  m-0"

                                novalidate>





                                <div class="row m-0 p-0 mb-3">

                                    <label class="col-sm-4 col-form-label">Class Name :</label>

                                    <div class="col-sm-8 p-0">

                                        <select class="form-select" aria-label="Default select example" name="class_id"

                                            required>

                                            <option selected disabled value>Select Class Name</option>

                                            <?php

                                                    $allClass = $Classes->classesList();

                                                    foreach ($allClass as $class) {

                                                        echo ' <option value="'.$class['id'].'">'.$class['classname'].'</option>';

                                                    }

                                                ?>

                                        </select>

                                    </div>

                                </div>



                                <?php



                                    foreach($feesAccounts as $feeAcc){

                                    $myuid = uniqid('inp');



                                    $autoid    = $feeAcc['account_name'].$myuid;

                                    $feeAccs   = $feeAcc['account_name'];



                                ?>



                                <div class="row m-0 p-0 mb-3">

                                    <label for="inputText" class="col-4 form-label"><?php echo $feeAccs; ?> :</label>

                                    <div class="col-8 p-0">





                                        <input type="hidden" id="<?php  echo $autoid  ?>"

                                            value="<?php echo $feeAccs; ?>" class="form-control" name="purpose[]"

                                            required>



                                        <input type="text" id="<?php  echo $autoid  ?>" class="form-control"

                                            name="amount[]" onkeyup='totalItem(this.value)' required>

                                    </div>

                                </div>

                                <?php  } ?>



                                <div class="row mb-3 m-0 p-0" style="margin-top: 2.5rem;">



                                    <div class="col-xl-12 col-lg-12  d-flex justify-content-center align-items-center">

                                        <button type="submit" class="btn btn-primary" name="submitdata">Submit

                                        </button>

                                    </div>

                                </div>



                            </form>

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



    <div class="modal fade" id="accountFeesModal" tabindex="-1" aria-labelledby="accountFeesModalLabel" aria-hidden="true">

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

        return confirm("Are you sure that you want to delete the Fees Account Contents ?")

    };





    

    const deleteFeestur = () => {

        return confirm("Are you sure that you want to delete the Fees Structure Contents ?")

    };



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