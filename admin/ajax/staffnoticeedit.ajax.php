<?php
require_once '../../_config/dbconnect.php';
require_once '../../classes/employee.class.php';

     $staffnotic = new  Employee();
     $updatePage=$staffnotic->staffMessageupdatePage($_GET['staffnoticedata']);
     

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
               foreach ($updatePage as $showstaffnoticeshow) {
                $showname       = $showstaffnoticeshow['name'];
                $shownotice     = $showstaffnoticeshow['notice'];
                $showsubject    = $showstaffnoticeshow['subject'];
                $showid         = $showstaffnoticeshow['id'];
                $showstaff_id   = $showstaffnoticeshow['staff_id'];
                $showsignature  = $showstaffnoticeshow['signature'];
                $img            = "../image/".$showsignature;
            
                echo'       <form method="POST" action="staffnotice.acction.php" enctype="multipart/form-data">
                <div class="card ps-5 pe-5 mb-0" style="box-shadow: none">
                <h5 class="card-title d-flex justify-content-center p-0 mt-0 mb-3">
                    Update Notice
                </h5>
    
                <div class="row mb-3">
                <div class="col-sm-10">
                    <input type="hidden" class="form-control" value="'.$showid.'" name="id">
                    <input type="hidden" class="form-control" value="'.$showstaff_id.'" name="staff_id">
                </div>
            </div>
                  
            <div class="row mb-3">
            <div class="col-sm-10">
                <input type="hidden" class="form-control" value="'.$showname.'" name="name">
            </div>
        </div>

        <div class="row mb-3">
        <label for="inputimg" class="col-sm-2 col-form-label">Signature Image :</label>
        <div class="col-sm-10">
            <img id="theImage" src="'.$img.'" alt="bill-invoice" width="100" height="50"
                style="border-radius: 7% " onClick="makeFullScreen()">
        </div>
    </div>
    <div class="row mb-3">

    <label for="inputNumber" class="col-sm-2 col-form-label">Update Signature :</label>
    <div class="col-sm-4">
        <input class="form-control w-100" type="file" id="formFile" name="signature" accept="image/png" />
        <input type="hidden" value="'.$img.'" name="updateimg">
    </div>
</div>

        <div class="row mb-3">
        <label for="inputAddress" class="col-sm-2 col-form-label">Subject :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="'.$showsubject.'" name="subject">
            </div>
        </div> 

        <div class="row mb-3">
        <label for="inputAddress" class="col-sm-2 col-form-label">Message :</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" name="notice">'.$shownotice.'</textarea>
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
                        <button type="submit" class="btn btn-primary" style="width: 105px" name="submit">
                            Send
                        </button>
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