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

                          }
                          ?>

                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
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


                                    <form method="GET" action="../admin/class/profile.ascension.php">
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
                                    <form method="GET" action="../admin/class/profile.ascension.php">

                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                                Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img src="assets/img/profile-img.jpg" alt="Profile">
                                                <div class="pt-2">
                                                    <a href="#" class="btn btn-primary btn-sm"
                                                        title="Upload new profile image"><i
                                                            class="bi bi-upload"></i></a>
                                                    <a href="#" class="btn btn-danger btn-sm"
                                                        title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-8 col-lg-9">
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
                                                    value="Lueilwitz, Wisoky and Leuschke"
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
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- End Profile Edit Form -->





                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form method="GET" action="../admin/class/password.acction.php">

                                        <div class="row mb-3">
                                            <div class="col-md-8 col-lg-9">
                                                <input type="hidden" class="form-control" id="fullName"
                                                    value="'. $showid.'" name="id">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="currentPassword"
                                                class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="password" class="form-control" id="currentPassword"
                                                    value="<?php echo $showpassword; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control"
                                                    id="newPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                                New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control"
                                                    id="renewPassword">
                                            </div>
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

</body>

</html>