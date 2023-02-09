<?php

require_once '../../_config/dbconnect.php';

require_once '../../classes/department.class.php';

$Departments = new  Departments();

$dept = $Departments->departmentById($_GET['departmenttype']);

?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicons -->

    <link href="assets/img/favicon.png" rel="icon" />

    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->

    <link href="https://fonts.gstatic.com" rel="preconnect" />

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->

    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />

    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet" />

    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet" />

    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet" />

    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet" />

    <!-- Template Main CSS File -->

    <link href="../assets/css/style.css" rel="stylesheet" />

    <title>Document</title>

</head>



<body>



    <?php

               foreach ($dept as $showExpensesDetailsshow) {

                $showdepartment_name = $showExpensesDetailsshow['department_name'];

                $showdescription = $showExpensesDetailsshow['description'];

                $showid = $showExpensesDetailsshow['id'];



                echo'

   <form method="POST" action="departmentupdate.action.php">

    <div class="card  mb-0" style="box-shadow: none">

    <input type="hidden" name="id" value="'.$showid.'">

        <div class="card-body p-3 pt-0">

              <h5 class="card-title d-flex justify-content-center p-0 mt-0 mb-3"> Add Department </h5>

            <div class="row mb-3">

                  <label for="inputText" class="col-sm-3 col-form-label">Dept. Name :</label>

                <div class="col-sm-9">

                    <input type="text" maxlength="55" class="form-control" value="'.$showdepartment_name.'" name="department_name" required>

                </div>

            </div>

            <div class="row mb-3">

                <label for="inputAddress" class="col-sm-3 col-form-label">Description :</label>

                <div class="col-sm-9">

                    <textarea type="text" class="form-control" maxlength="355" style="height: 100px" name="description" required>'.$showdescription.'</textarea>

                </div>

            </div>

            <div class="row mb-3">

                <div class="col-sm-12  d-flex justify-content-center align-items-center">

                    <button type="submit" class="btn btn-primary">Update</button>

                </div>

            </div>

         </div>

       </div>

    </form>';

               }

               ?>



    <!-- Vendor JS Files -->

    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/chart.js/chart.min.js"></script>

    <script src="../assets/vendor/echarts/echarts.min.js"></script>

    <script src="../assets/vendor/quill/quill.min.js"></script>

    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>

    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>

    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->



</body>







</html>