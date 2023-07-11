<?php
session_start();

$page ="Employee Designation";


require_once '../_config/dbconnect.php';

require_once '../classes/admin.class.php';

require_once '../classes/stadetails.class.php';

require_once '../classes/utility.class.php';

require_once '../includes/constant.php';

$Admin              = new Admin();

$empRole            = new institute();

$Utility            = new Utility();





$_SESSION['current-url'] = $Utility->currentUrl();



if (!isset($_SESSION['user_name']) && !isset($_SESSION['loggedin']) ) {

  header("Location: login.php");

  exit;

}



$insertEmpQuery=false;



$updateEmpQuery=false;







if(isset ($_POST["Updateyear"])){







     $session = $_POST["session"];







        $result = $InstituteDetails->updateSession($session);







        if($result){



         echo "Academic Session Has Been Updated!<br>";



         }



        else{



          echo "Failed to update Session.<br>";



       



        }



     }







?>



<!DOCTYPE html>



<html lang="en">







<head>



    <meta charset="utf-8">



    <meta content="width=device-width, initial-scale=1.0" name="viewport">







    <title>Employee Management || Employee Designation - <?php echo SITE_NAME; ?></title>



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



            <h1>Employee Designation</h1>



            <nav>



                <ol class="breadcrumb">



                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>



                    <li class="breadcrumb-item">Employee Management</li>



                    <li class="breadcrumb-item active">Employee Designation</li>



                </ol>



            </nav>



        </div><!-- End Page Title -->







        <section class="section dashboard" style="min-height: 62vh;">

            <div class="row">

                <div class="col-lg-6 ">

                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">

                            <h5 class="card-title mb-0 mt-0">Employee Designation</h5>

                            <table class="table datatable">

                                <thead>

                                    <tr>

                                        <th scope="col">S.NO</th>

                                        <th scope="col">Designation Name</th>

                                        <th scope="col">Description</th>

                                        <th scope="col">Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php
                                    $i=1;
                                    $empresult = $empRole->RoleList();
                                    foreach($empresult as $row){
                                    $description        = $row['description'];
                                    $designation_name   = $row['designation_name'];
                                    $role_id            = $row['id'];
                                    $designation_id     = $row['designation_id'];
                                    ?>

                                    <tr>

                                        <th scope="row"><?php    echo $i ?></th>

                                        <td><?php    echo $designation_name;  ?></td>

                                        <td><?php    echo substr("$description",0,18)." ...";  ?></td>

                                        <td>
                                            <?php if($designation_name == 'Teacher') {echo '--';} else{  ?>

                                            <i class="bi bi-eye-fill pe-4" data-bs-toggle="modal"
                                                data-bs-target="#RoleFormModal" id="<?php echo $designation_id ?>"
                                                onclick="RoleView(this.id);"></i>

                                            <a href='ajax/emproledelete.ajax.php?id=<?php    echo $role_id  ?>'>

                                                <i class="bi bi-trash" onclick="return deleteRole();"></i>

                                            </a>
                                            <?php   }?>

                                        </td>

                                    </tr>

                                    <?php
                                        $i++; 
                                            } ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6 ">

                    <div class="row">

                        <div class="col-lg-12 col-md-12">

                            <div class="card">

                                <div class="card-body">

                                    <h5 class="card-title">Add Employee Designation</h5>

                                    <!-- Class Addition Form -->

                                    <form method="POST" action="./ajax/empdesignation.acction.php"
                                        class="row needs-validation m-0" novalidate>

                                        <div class="row mb-3">

                                            <label for="inputText" class="col-sm-4 col-form-label">Designation Name
                                                :</label>

                                            <div class="col-sm-8">

                                                <input type="text" maxlength="55" class="form-control" name="rolename"
                                                    required>

                                            </div>

                                        </div>

                                        <div class="row mb-3">

                                            <label for="inputAddress" class="col-sm-4 col-form-label">Description

                                                :</label>

                                            <div class="col-sm-8">

                                                <textarea class="form-control" style="height: 100px" name="description"
                                                    required></textarea>

                                            </div>

                                        </div>

                                        <div class="row mb-3">

                                            <div class="col-sm-12  d-flex justify-content-center align-items-center">

                                                <button type="submit" name="submitdata" class="btn btn-primary">Submit

                                                </button>

                                            </div>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>



        </section>



    </main><!-- End #main -->







    <!-- ======= Footer ======= -->



    <?php require_once 'require/addfooter.php'; ?>







    <!-- Modal -->



    <div class="modal fade" id="RoleFormModal" tabindex="-1" aria-labelledby="RoleFormModalLabel" aria-hidden="true">



        <div class="modal-dialog modal-lg">



            <div class="modal-content">



                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>



                </div>



                <div class="modal-body RoleForm-modal-body">







                </div>

            </div>



        </div>



    </div>



    <!-- modal end -->




    <script>
    function deleteRole() {



        return confirm("ARE YOU SURE TO DELETE THIS DESIGNATION CONTENTS ?")



    };
    </script>


    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>



    <script>
    const RoleView = (id) => {



        let url = 'ajax/emprole-edit.ajax.php?Roletype=' + id;



        $(".RoleForm-modal-body").html(



            '<iframe width="99%" height="240px" frameborder="0" allowtransparency="true" src="' + url +



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

    })();
    </script>







</body>







</html>