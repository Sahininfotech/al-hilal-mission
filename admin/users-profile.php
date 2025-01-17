<?php
$page = "Profile";
 session_start();
require_once '../_config/dbconnect.php';

require_once '../classes/admin.class.php';
$Admin = new  Admin();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Users / Profile - NiceAdmin Bootstrap Template</title>
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
    <link href="../admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../admin/assets/css/style.css" rel="stylesheet">

    <style>
    .image-upload>input {
        display: none;
    }
    </style>

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
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">

                        <?php
                          $adminDtl = $Admin->getAdmin($_SESSION['user_name']);
                          foreach ($adminDtl as $showStaffdentDetailsshow) {
                            
                              $showname       = $showStaffdentDetailsshow['name'];
                              $showaddress    = $showStaffdentDetailsshow['address'];
                              $showusername   = $showStaffdentDetailsshow['username'];
                              $showph         = $showStaffdentDetailsshow['ph_no'];
                              $showemail      = $showStaffdentDetailsshow['email'];
                              $showid         = $showStaffdentDetailsshow['id'];
                              $showinstitute  = $showStaffdentDetailsshow['institute'];
                              $showprofession = $showStaffdentDetailsshow['profession'];
                              $showcountry    = $showStaffdentDetailsshow['country'];
                              $showpassword   = $showStaffdentDetailsshow['password'];
                              $Profile_image  = $showStaffdentDetailsshow['Profile_image'];
                              $img            = "../admin/image/".$Profile_image;

                          }
                          ?>

                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img id="theImage" src="<?php echo $img; ?>" width=120 height=115 alt=""
                                onerror="this.src='assets/img/user.jpg';" width=120 height=120 class="rounded-circle"
                                onClick="makeFullScreen()">

                            <h2><?php echo $showname; ?></h2>
                            <h3><?php echo $showprofession; ?></h3>

                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Change Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">


                                <!-- ========================= Overview Section ========================= -->
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                    <h5 class="card-title">About</h5>
                                    <p class="small fst-italic"></p>

                                    <h5 class="card-title">Profile Details</h5>


                                    <form method="POST" action="ajax/profile.ascension.php"
                                        enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $showname; ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Company</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $showinstitute; ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Job</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $showprofession; ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Country</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $showcountry; ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Address</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $showaddress; ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Phone</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $showph; ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Email</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $showemail; ?></div>
                                        </div>
                                        </from>

                                </div>


                                <!-- ========================= Edit Profile Section =========================  -->
                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form method="POST" action="ajax/profile.ascension.php"
                                        enctype="multipart/form-data" runat="server">

                                        <div class="row mb-3">
                                            <label for="image" class="col-md-4 col-lg-3 col-form-label">Profile
                                                Image</label>
                                            <div class="col-md-8 col-lg-9">

                                                <img src="<?php echo $img; ?>" width=110 height=105 alt=""
                                                    onerror="this.src='assets/img/user.jpg';" width=100 height=100
                                                    class="rounded-circle" style="margin-left: -2rem;" id="output">

                                                <div class="image-upload pt-2">
                                                    <label for="file-input">
                                                        <i class="bi bi-upload btn btn-primary btn-sm"></i>
                                                    </label>
                                                    <input type="file" id="file-input" name="Profile_image"
                                                        accept="image/*" onchange="loadFile(event)" />
                                                    <input type="hidden" value="<?php echo $Profile_image; ?>"
                                                        name="updateimg">
                                                    <a href="#" class="btn btn-danger btn-sm"
                                                        title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-8 col-lg-9">
                                                <!-- <input class="form-control w-100" type="file" id="formFile" name="Profile_image" accept="image/*" /> -->
                                                <input type="hidden" class="form-control" id="fullName"
                                                    value="<?php echo $showid; ?>" name="id">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full
                                                Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" class="form-control" id="fullName"
                                                    value="<?php echo $showname; ?>" name="name">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="about" class="form-control" id="about"
                                                    style="height: 100px"></textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="company"
                                                class="col-md-4 col-lg-3 col-form-label">Company</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" class="form-control" id="company"
                                                    value="<?php echo $showinstitute; ?>" name="institute">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" class="form-control" id="Job"
                                                    value="<?php echo $showprofession; ?>" name="profession">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Country"
                                                class="col-md-4 col-lg-3 col-form-label">Country</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" class="form-control" id="Country"
                                                    value="<?php echo $showcountry; ?>" name="country">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Address"
                                                class="col-md-4 col-lg-3 col-form-label">Address</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="address" type="text" class="form-control" id="Address"
                                                    value="<?php echo $showaddress; ?>" name="address">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" class="form-control" id="Phone"
                                                    value="<?php echo $showph; ?>" name="ph_no">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="email" class="form-control" id="Email"
                                                    value="<?php echo $showemail; ?>" name="email">
                                            </div>
                                        </div>


                                        <div class="text-center">
                                            <button type="submit" name="data" class="btn btn-primary">Save
                                                Changes</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- End Profile Edit Form -->





                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form method="POST" action="ajax/password.acction.php">

                                        <div class="row mb-3">
                                            <div class="col-md-8 col-lg-9">
                                                <input type="hidden" class="form-control" id="fullName"
                                                    value="<?php echo $showid; ?>" name="id">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control"
                                                    id="password" onkeyup='check();' onChange="onChange()" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                                New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="password" class="form-control" name="confirm_password"
                                                    id="confirm_password" onkeyup='check();' onChange="onChange()"
                                                    required>
                                            </div>
                                            <span id='message'></span>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form>
                                    <!-- End Change Password Form -->
                                </div>


                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php require_once 'require/addfooter.php'; ?>

    <!-- preview-image -->
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

    <script>
    // <!-- image fullscreen -->

    function makeFullScreen() {

        var divObj = document.getElementById("theImage");

        //Use the specification method before using prefixed versions

        if (divObj.requestFullscreen) {

            divObj.requestFullscreen();

        } else if (divObj.msRequestFullscreen) {

            divObj.msRequestFullscreen();

        } else if (divObj.mozRequestFullScreen) {

            divObj.mozRequestFullScreen();

        } else if (divObj.webkitRequestFullscreen) {

            divObj.webkitRequestFullscreen();

        } else {

            console.log("Fullscreen API is not supported");

        }

    }

    // <!-- image fullscreen end -->
    </script>

<script>
var check = function() {
        var password = document.getElementById('password').value;
        var confirm_password = document.getElementById('confirm_password').value;
        if (password == confirm_password) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'Passwords matching';
        }else{
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'Passwords do not match';
        }
    }



    function onChange() {
        const password = document.querySelector('input[name=password]');
        const confirm = document.querySelector('input[name=confirm_password]');
        if (confirm.value === password.value) {
            confirm.setCustomValidity('');
        } else {
            confirm.setCustomValidity('Passwords do not match');
        }
    }
    </script>


</body>

</html>