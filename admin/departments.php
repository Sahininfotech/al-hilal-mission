<?php

session_start();

$page ="Departments";

$subjectQuery=false;



 

require_once '../_config/dbconnect.php';

require_once '../classes/admin.class.php';

require_once '../classes/department.class.php';

require_once '../classes/utility.class.php';

require_once '../includes/constant.php';



$Admin          = new Admin();

$Departments    = new Departments();

$Utility        = new Utility();



$depts = $Departments->showDepartments();





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







    <title>Institute Management / Departments - <?php echo SITE_NAME; ?></title>



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



            <h1>Departments</h1>



            <nav>



                <ol class="breadcrumb">



                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>



                    <li class="breadcrumb-item">Institute Management</li>



                    <li class="breadcrumb-item active">Departments</li>



                </ol>



            </nav>



        </div><!-- End Page Title -->







        <section class="section dashboard" style="min-height: 62vh;">

            <div class="row">

                <div class="col-lg-6 ">

                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">

                            <h5 class="card-title mb-0 mt-0">Departments </h5>

                            <table class="table datatable">

                                <thead>

                                    <tr>

                                        <th scope="col ">SL. NO.</th>

                                        <th scope="col ">Dept. Name</th>

                                        <th scope="col ">Description</th>

                                        <th scope="col ">Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php

                                    $sl = 1;

                                        foreach($depts as $row){                                

                                    ?>

                                    <tr>

                                        <!-- <th scope="row"><?php    echo $row['id']  ?></th> -->

                                        <th><?php echo $sl; ?></th>

                                        <td><?php echo $row['department_name']; ?></td>

                                        <td><?php echo $row['description']; ?></td>

                                        <td>

                                            <i class="bi bi-eye-fill pe-4" data-bs-toggle="modal"

                                                data-bs-target="#departmentModal" id="<?php    echo $row['id']  ?>"

                                                onclick="departmentShow(this.id);"></i>

                                            <a href='ajax/departmentdelete.action.php?id=<?php echo $row['id'];?>'>

                                                <i class="bi bi-trash" onclick="return departmentDalete();"></i>

                                            </a>

                                        </td>

                                    </tr>

                                    <?php

                                        $sl++;

                                        }

                                        ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

                <div class="col lg-6">

                    <div class="card">

                        <div class="card-body p-3">

                            <h5 class="card-title"></h5>

                            <form method="GET" action="ajax/department.acction.php"  class="row needs-validation m-0" novalidate>

                                <div class="row mb-3">

                                    <label for="inputText" class="col-sm-4 col-form-label">Dept. Name :</label>

                                    <div class="col-sm-8">

                                        <input type="text" maxlength="55" class="form-control" name="department_name"

                                            required>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <label for="inputAddress" class="col-sm-4 col-form-label">Description :</label>

                                    <div class="col-sm-8">

                                        <textarea class="form-control" maxlength="355" style="height: 100px"

                                            name="description" required></textarea>

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-sm-12  d-flex justify-content-center align-items-center">

                                        <button type="submit" name="submit" class="btn btn-primary">Add

                                            Department</button>

                                    </div>

                                </div>

                            </form>

                            <!-- End staffform -->

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main><!-- End #main -->







    <!-- ======= Footer ======= -->



    <?php require_once 'require/addfooter.php'; ?>







    <!-- Modal -->



    <div class="modal fade" id="departmentModal" tabindex="-1" aria-labelledby="departmentModalLabel"

        aria-hidden="true">



        <div class="modal-dialog modal-lg">



            <div class="modal-content">



                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>



                </div>



                <div class="modal-body departmentForm-modal-body">


                </div>

            </div>



        </div>



    </div>



    <!-- modal end -->



    



    <script>

    function departmentDalete() {



        return confirm("DO YOU REALLY WANT TO DELETE THIS DEPARTMENT CONTENTS ?")



    };

    </script>



    <script src="https://code.jquery.com/jquery-3.6.0.js"

        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>



    <script>

    const departmentShow = (id) => {



        let url = 'ajax/department.ajax.php?departmenttype=' + id;



        $(".departmentForm-modal-body").html(



            '<iframe width="99%" height="278px" frameborder="0" allowtransparency="true" src="' + url +



            '"></iframe>')







    }

    </script>

     <script>

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