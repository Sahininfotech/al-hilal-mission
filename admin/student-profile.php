<?php
$page = "Profile";
 session_start();
require_once '../_config/dbconnect.php';

require_once '../classes/admin.class.php';
require_once '../classes/student.class.php';
$Admin        = new  Admin();
$Student      = new Student();

if(isset ( $_POST["submit"])){

    $student_id           = $_POST["student_id"];
    $query          = $_POST["query"];
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Users / Profile - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php require_once 'require/headerLinks.php';?>
    <style>
    .data {
        font-weight: 600;
        color: rgba(1, 41, 112, 0.6);
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
            <h1>Student Profile</h1>

        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">

                        <?php
                            $showStudentDetails   = $Student->studentfeesId($student_id);
                                            
                            if ($showStudentDetails == 0) {
                            echo "No data Type Avilable.";
                            }else{
                            foreach ($showStudentDetails as $showStudentDetailsshow) {
                            $showclass1            = $showStudentDetailsshow['class'];
                            $showname              = $showStudentDetailsshow['name'];
                            $showstuid             = $showStudentDetailsshow['student_id'];
                            $showid                = $showStudentDetailsshow['id'];
                            $showroll_no           = $showStudentDetailsshow['roll_no'];
                            $showdate_of_birth     = $showStudentDetailsshow['date_of_birth'];
                            $showstream            = $showStudentDetailsshow['stream'];
                            $showacademic_year     = $showStudentDetailsshow['academic_year'];
                            $showgender            = $showStudentDetailsshow['gender'];
                            $showaddress           = $showStudentDetailsshow['address'];
                            $showcontact_no        = $showStudentDetailsshow['contact_no'];
                            $showemail             = $showStudentDetailsshow['email'];
                            $showgurdian_name      = $showStudentDetailsshow['gurdian_name'];
                            $showpin_code          = $showStudentDetailsshow['pin_code'];
                            $showstate             = $showStudentDetailsshow['state'];
                            $showstatus            = $showStudentDetailsshow['status'];
                            $showpost_office       = $showStudentDetailsshow['post_office'];
                            $showpolice_station    = $showStudentDetailsshow['police_station'];
                            $showdistrict          = $showStudentDetailsshow['district'];
                            $showuimage            = $showStudentDetailsshow['image'];

                            $img =  "image/".$showuimage;
                            }}
                          ?>

                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <!-- <source media="(min-width: 650px)" srcset="assets/img/profile-img.jpg"> -->
                            <img src="<?php echo $img; ?>" width=120 height=110 alt=""
                                onerror="this.src='assets/img/user.jpg';" width=120 height=120 class="rounded-circle">
                            <h2><?php echo $showname; ?></h2>
                        </div>
                        <div class="card-body profile-card d-flex flex-column">
                            <hr>
                            </hr>
                            <h4 style="                  
                        font-size: 1.3rem;">student ID - <?php echo $showstuid; ?></h4>
                            <h4 style="
                        font-size: 1.3rem;">class - <?php echo $showclass1; ?></h4>
                            <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                data-bs-target="#editstudentclassModal" id="<?php    echo $showid  ?>"
                                onclick="editstudentclass(this.id);"> <i class="bi bi-pencil-square pe-4"
                                    data-bs-toggle="modal" data-bs-target="#editstudentclassModal"
                                    id="<?php    echo $showid  ?>" onclick="editstudentclass(this.id);"></i>
                                Edit
                                Profile</button>
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
                                        data-bs-target="#profile-overview" style="text-transform: capitalize;">General
                                        information</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit"
                                        style="text-transform: capitalize;">more
                                        Details</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">


                                <!-- ========================= Overview Section ========================= -->
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">



                                    <h5 class="card-title">Student Details</h5>


                                    <form method="POST" action="#">

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $showname; ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Roll No</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $showroll_no; ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Academic Year</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $showacademic_year; ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">gender</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $showgender; ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Date Of Birth</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $showdate_of_birth; ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Address</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $showaddress; ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Phone</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $showcontact_no; ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Email</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $showemail; ?></div>
                                        </div>

                                        </from>

                                </div>


                                <!-- ========================= Edit Profile Section =========================  -->

                                <!-- ========================= Edit Profile Section =========================  -->
                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form method="POST" action="#">


                                        <div class="row mb-3">
                                            <div class="col-md-8 col-lg-9">
                                                <input type="hidden" class="form-control" id="fullName"
                                                    value="<?php echo $showid; ?>" name="id">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-3 col-md-4 label data">Guardian's Name</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $showgurdian_name; ?></div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-3 col-md-4 label data">Pin code</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $showpin_code; ?></div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-3 col-md-4 label data">Status</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $showstatus; ?></div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-3 col-md-4 label data">State</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $showstate; ?></div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-3 col-md-4 label data">District</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $showdistrict; ?></div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-3 col-md-4 label data">Post Office</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $showpost_office; ?></div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-3 col-md-4 label data">Police Station</div>
                                            <div class="col-lg-9 col-md-8"><?php echo $showpolice_station; ?></div>
                                        </div>

                                    </form>
                                </div>

                                <!-- End Profile Edit Form -->



                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
            </div>
        </section>

    </main><!-- End #main -->
    <!-- Modal -->
    <div class="modal fade" id="editstudentclassModal" tabindex="-1" aria-labelledby="editstudentclassModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body editstudentclass-modal-body">

                </div>
        
            </div>
        </div>
    </div>
    <!-- modal end -->
    <!-- ======= Footer ======= -->
    <?php require_once 'require/addfooter.php'; ?>
    <script>
    const editstudentclass = (id) => {
        let url = 'ajax/editstudentclass.ajax.php?studentdata=' + id;
        $(".editstudentclass-modal-body").html(
            '<iframe width="99%" height="529px" frameborder="0" allowtransparency="true" src="' + url +
            '"></iframe>')

    }
    </script>

</body>

</html>