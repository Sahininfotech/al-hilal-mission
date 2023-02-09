<?php
session_start();

$page ="add-new-staff";


require_once '../../_config/dbconnect.php';
require_once '../../classes/classes.class.php';
require_once '../../classes/subjects.class.php';



$Classes        = new Classes();
$Subjects       = new Subjects();



$showClasses = $Classes->classesList();


  if(isset ($_POST["submit"])){
    
    $class_name = ($_POST["class_name"]);
    $subject = ($_POST["subject"]);
    $description = ($_POST["description"]);


    $added = $Subjects->addSubject( $class_name, $subject, $description);

    if($added){

        echo "<script> if(alert('Subject successfully added!')){
                            document.location = './subject-add.ajax.php';
                        }
            </script>";

    }else{

        echo "<script> if(alert('Subject insertion failed!')){
                            document.location = './subject-add.ajax.php';
                        }
                </script>";

           }
     }
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



<body style="background:white;">

    <form method="post" class="m-0 w-100" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="card mb-0" style="box-shadow: none">
            <div class="card-body px-3 py-0">
                <h5 class="card-title d-flex justify-content-center p-0 mt-0 mb-3"> Add Subject </h5>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Class Name :</label>
                    <div class="col-sm-9">
                        <select class="form-select" aria-label="Default select example" name="class_name">
                            <option selected>Select Class Name</option>
                            <?php
                            foreach ($showClasses as $class) {
                                echo '<option value="'.$class['id'].'">'.$class["classname"].'</option>';

                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label">Subject Name :</label>
                    <div class="col-sm-9">
                        <input type="text" maxlength="55" class="form-control" name="subject" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputAddress" class="col-sm-3 col-form-label">Description :</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" maxlength="355" style="height: 100px" name="description"
                            required></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-12  d-flex justify-content-center align-items-center">
                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


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