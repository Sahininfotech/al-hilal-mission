<?php

require_once '../class/expenses.class.php';

     $employees = new  Institute1();
     $updatePage=$employees->cancelupdatePage($_GET['stafftype']);
     
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
               foreach ($updatePage as $showExpensesDetailsshow) {
                $showstatus = $showExpensesDetailsshow['status'];
                $showid = $showExpensesDetailsshow['id'];

                echo'       <form  method="GET" action="../class/expensescancel.acction.php">
    <div class="card ps-5 pe-5 mb-0" style="box-shadow: none">
          
                <h5 class="card-title" style="display: flex; justify-content: center">
                    Delete Form
                </h5>

                <div class="row mb-3">
                <div class="col-md-8 col-lg-9">
                  <input type="hidden" class="form-control" id="fullName" value="'. $showid.'"  name="id">
                </div>
              </div>
  
                   
  

                <div class="row mb-3">
                  
                    <div class="col-sm-10" style="
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                    margin: auto;
                                  ">
                                
                        <button  name="status" type="submit"  class="btn btn-primary" style="width: 105px" id="'.$showstatus.'"onclick="return canceldate()";>
                        <input type="hidden" class="form-control" id="fullName" value="1"  name="status">
                           Cancel
                        </button>
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
   
    <script>function canceldate() {
                  return confirm("Aru you sure want to cancel this record ?")};                               

</script>

</body>

</html>