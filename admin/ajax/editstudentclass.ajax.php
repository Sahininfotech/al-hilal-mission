<?php
require_once '../../_config/dbconnect.php';
require_once '../../classes/studdetails.class.php';

$dataupdate = new  StudentDetails();
$updatePage=$dataupdate->updatestudent($_GET['studentdata']);

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
               foreach ($updatePage as $showstudent) {
                $showname = $showstudent['name'];
                $showemail = $showstudent['email'];
                $showstatus = $showstudent['status'];
               $showid = $showstudent['id'];
               $showcontact_no = $showstudent['contact_no'];
                $showdate = $showstudent['date'];
                $showclass = $showstudent['class'];
                $showaddress = $showstudent['address'];
                $showroll_no = $showstudent['roll_no'];
                $showimage = $showstudent['image'];

                $image    = '../image/'.$showimage;
              
              ?>
                <form method="POST" action="student-update.ajax.php"  enctype="multipart/form-data" runat="server">
             <div class="card ps-4 pe-4 mb-0" style="box-shadow: none">
             <input type="hidden" maxlength="80" class="form-control" name="id" value="<?php    echo $showid ?>" required>
             <h5 class="card-title p-0 d-flex justify-content-center">
                Edit students class Details
            </h5>

            <div class="row mb-3">
                                <label for="inputImage" class="col-sm-2 col-form-label">Profile Image :</label>
                                <div class="col-sm-10">
                                    <img src="<?php    echo $image ?>" width=110 height=105 alt=""
                                        onerror="this.src='assets/img/user.jpg';" width=100 height=100
                                        class="rounded-circle" id="output">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputImage" class="col-sm-2 col-form-label">Upload Image :</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="formFile" type="file" name="image" accept="image/*" onchange="loadFile(event)">
                                    <input type="hidden" value="<?php echo $image; ?>" name="updateimg">
                                </div>
                            </div>

            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Student Name's :</label>
                <div class="col-sm-10">
                    <input type="text" maxlength="80" class="form-control" name="name" value="<?php    echo $showname ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">status :</label>
                <div class="col-sm-10">
                    <input type="text" maxlength="80" class="form-control" name="status" value="<?php    echo $showstatus ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email Id :</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" name="email" value="<?php    echo $showemail ?>" required>
                </div>
                <label for="inputNumber" class="col-sm-2 col-form-label">Contact Number :</label>
                <div class="col-sm-4">
                    <input type="number" maxlength="10" class="form-control" value="<?php    echo $showcontact_no ?>" name="contact_no" required>
                </div>
            </div>

            </fieldset>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label"> Class Name :</label>
                <div class="col-sm-4">
                <input type="number" class="form-control" value="<?php    echo $showclass ?>" name="class"/>
                </div>

                <label for="inputaddress" class="col-sm-2 col-form-label">Roll Number :</label>
                <div class="col-sm-4">
                <input type="number" class="form-control" value="<?php    echo $showroll_no ?>" name="roll_no"/>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Address :</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php    echo $showaddress ?>" name="address"/>
                </div>
            </div>
          
          
           
            <div class="row mb-3">
                <div class="col-sm-12  d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                </div>
            </div>
        </div>
    </form>
    <?php } ?>
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


    
          <!-- preview-image- runat="server"-onchange="loadFile(event)-->
          <script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
 <!-- preview-image-end -->
</body>

</html>