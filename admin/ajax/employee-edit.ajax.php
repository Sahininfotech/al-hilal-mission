<?php

require_once '../../_config/dbconnect.php';
require_once '../../classes/employee.class.php';

$Employee = new  Employee();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['update'])) {
        
        $name          = $_POST["name"];
        $email         = $_POST["email"];
        $address       = $_POST["address"];
        $contactno     = $_POST["contactno"];
        $gender        = $_POST["gender"];
        $qualification = $_POST["qualification"];
        $id            = $_POST["id"];
        $status        = $_POST["status"];
        
        
        $update        = $Employee->empUpdate($id, $name, $address, $contactno, $email, $gender, $qualification, $status);

        if($update){
            ?>
        <script>
            alert('Updated!');
            // location.href = 'employee-edit.ajax.php?stafftype='.$id;
            </script>
        <?php
        }else{
            ?>
        <script>
            alert('Failed!');
            // location.href = 'employee-edit.ajax.php?stafftype='.$id;
            </script>
        <?php
        }
    }

}

$showEmp = $Employee->empById($_GET['stafftype']);

    
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

<body style="background :white;">

    <?php
               foreach ($showEmp as $emp) {
                $showclass1 = $emp['address'];
                $showname = $emp['name'];
                $showstuid = $emp['contactno'];
                $showid = $emp['id'];
                $showemail = $emp['email'];
                $showgender = $emp['gender'];
                $showqualification = $emp['qualification'];
                $showdate = $emp['date'];
                $showdate = $emp['date'];
                $showstatus = $emp['status'];

                echo '<form method="POST" action="'.$_SERVER['REQUEST_URI'].'">
                <div class="card p-0 m-0 mb-0" style="box-shadow: none">
                <div class="card-body p-3 pt-0">
               <div class="row mb-3">
               <div class="col-sm-10">
                   <input type="hidden" class="form-control" value="'.$showid.'" name="id">
               </div>
           </div>
           <h5 class="card-title d-flex justify-content-center text-center mt-0 p-0 mb-3"> Staff
           Edit Form</h5>
               <div class="row mb-3">
                   <label for="inputText" class="col-sm-2 col-form-label">Name :</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" id="<?php echo '. $showname.' ?>" value="'. $showname.'"
    name="name">
    </div>
    </div>
    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Email :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="'. $showemail.'" name="email">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Gender :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="'. $showgender.'" name="gender">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Degree :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="'. $showqualification.'" name="qualification">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputaddress" class="col-sm-2 col-form-label">Address :</label>
        <div class="col-sm-10">
            <input type="address" class="form-control" id="edit2" value="'. $showclass1.'" name="address">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Status :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="'. $showstatus.'" name="status">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputNumber" class="col-sm-2 col-form-label">Contact Number :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="edit3" value="'. $showstuid.'" name="contactno">
        </div>
    </div>



    <div class="row mb-3">
        <!-- <label class="col-sm-3 col-form-label">Confirm Payment</label> -->
        <div class="col-sm-10" style="
                                   display: flex;
                                   justify-content: center;
                                   align-items: center;
                                   margin: auto;
                                 ">
            <button type="submit" name="update" class="btn btn-primary" id="upedit" style="width: 105px">
                Update
            </button>
        </div>
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