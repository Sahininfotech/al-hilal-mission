<?php
require_once '../../_config/dbconnect.php';
require_once '../../classes/exam.class.php';

$Examination = new  Examination();

$eaxm = $Examination->gradeById($_GET['data']);
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

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet" />
    <title>Institute Management / Examination - NiceAdmin Bootstrap Template</title>
</head>

<body>
    <?php
                foreach ($eaxm as $showMarkshow) {
                $showgrade_mane       = $showMarkshow['grade_mane'];
                $Min_marks            = $showMarkshow['Min_marks'];
                $showmax_marks        = $showMarkshow['Max_marks'];
                $showparticular_name  = $showMarkshow['particular_name'];
                $showid               = $showMarkshow['id'];
                }

             
    ?>

    <form method="POST" action="grade-update.action.php">
        <div class="card mb-0" style="box-shadow: none">
            <div class="card-body p-3">
                <h5 class="card-title d-flex justify-content-center p-0 mt-0 mb-3"> Edit Grade </h5>
                <input type="hidden" name="id" value="<?php echo $showid;?>">
                <div class="row p-0 mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label">Min Marks :</label>
                    <div class="col-sm-9">
                        <input type="text" maxlength="55" class="form-control" value="<?php echo $Min_marks; ?>"
                            name="min_marks" required>
                    </div>
                </div>

                <div class="row p-0 mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label">Max Marks :</label>
                    <div class="col-sm-9">
                        <input type="text" maxlength="55" class="form-control" value="<?php echo $showmax_marks; ?>"
                            name="max_marks" required>
                    </div>
                </div>

                
                <div class="row p-0 mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label">grade :</label>
                    <div class="col-sm-9">
                        <input type="text" maxlength="55" class="form-control" value="<?php echo $showgrade_mane; ?>"
                            name="grade" required>
                    </div>
                </div>

                <div class="row  p-0 mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label">particular name :</label>
                    <div class="col-sm-9">
                        <input type="text" maxlength="55" class="form-control"
                            value="<?php echo $showparticular_name; ?>" name="full_name" required>
                    </div>
                </div>
                <div class="row  p-0 mb-3">
                    <div class="col-sm-12  d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary">Update</button>
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