<?php 
require_once '../../_config/dbconnect.php';
   require_once '../../classes/studdetails.class.php';
   $examtDetails = new StudentDetails();

   $Studentexam = $examtDetails->Exampage($_GET['exam']);
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
               foreach ($Studentexam as $showexam) {
                $showstudent_roll = $showexam['student_roll'];
                $showstudent_id = $showexam['student_id'];
                $showmarks = $showexam['marks'];
                $showexamId = $showexam['exam_id'];
                $showid = $showexam['id'];
                
                echo'  <form method="GET" action="marksupdate.action.php">
                <input type="hidden" class="form-control" value="'.$showid.'" name="id">
                <div class="card ps-3 pe-3 mb-0" style="box-shadow: none">
          
                <h5 class="card-title p-0 d-flex justify-content-center" >
                   Edit Unit Test-1
                </h5>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label"> Student Id :</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="'.$showstudent_id.'" name="student_id">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label">Exam Id :</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="'.$showexamId.'" name="exam_id" >
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="inputaddress" class="col-sm-3 col-form-label">Roll Number :</label>
                    <div class="col-sm-9">
                        <input type="address" class="form-control" value="'.$showstudent_roll.'" name="student_roll" >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-3 col-form-label">Marks :</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="'.$showmarks.'" name="marks" >
                    </div>
                </div>
             

               
                <div class="row mb-3">
                    <div class="col-sm-12 d-flex justify-content-center align-items-center" >
                        <button type="submit" class="btn btn-primary" style="width: 105px">
                            Update
                        </button>
                    </div>
                </div>
            
        </div>
        </form>';
    }?>
    
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