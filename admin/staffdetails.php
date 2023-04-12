<?php
session_start();
$page ="Staff Details";

require_once '../_config/dbconnect.php';

require_once '../classes/admin.class.php';
require_once '../classes/employee.class.php';
require_once '../classes/stadetails.class.php';
require_once '../includes/constant.php';


$Admin      = new Admin();
$employees  = new Employee();
$empRole    = new institute();

$result    = $employees->showEmployees();

// foreach ($_SESSION as $key => $value) {
//     echo $key .'=>'. $value;
//     echo '<br>';
// }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Employee Details || <?php echo SITE_NAME ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php require_once 'require/headerLinks.php';?>

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
            <h1>Staff Details</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Staff Management</li>
                    <li class="breadcrumb-item active">Staff Details</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section dashboard">
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Staff Details <span>| Today</span></h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Employee Id</th>
                                    <th>Employee Name</th>
                                    <th>Mobile No</th>
                                    <th>Designation</th>
                                    <th>Add Features Page</th>
                                    <th class="ps-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sl = 1;
                                $result=$employees->showEmployees();
                                foreach($result as $row){
                                $designationid = $row['designation'];
                                $roleid=$empRole->RoledataById($designationid);
                                foreach($roleid as $emproles){ 
                                    $myuid = uniqid('role');
                                ?>

                                <?php if ($row['status']== 1) echo '<tr style="color: black">' ;?>
                                <?php if ($row['status']== 0) echo '<tr style="color: red">' ;?>
                                <td><?php    echo $sl;  ?></td>
                                <td><?php    echo $row['user_id']  ?></td>
                                <td><?php    echo $row['name']  ?></td>
                                <td><?php    echo $row['contactno']  ?></td>
                                <td><?php    echo $emproles['designation_name']  ?></td>
                                <td>

                                    <label class="form-switch">
                                        <?php if($row['feature_page'] == 'yes'): ?>
                                        <input id="cheak" class="form-check-input"
                                            data-id="<?php echo $row['user_id']; ?>" value="yes"
                                            onclick="return disapproved();" type="checkbox" checked>
                                        <?php else: ?>
                                        <input id="cheak" class="form-check-input"
                                            data-id="<?php echo $row['user_id']; ?>" value="no"
                                            onclick="return approved();" type="checkbox">
                                        <?php endif ?>

                                    </label>

                                </td>
                                <td><i class="bi bi-chat-fill pe-3" data-bs-toggle="modal"
                                        data-bs-target="#messageModal" id="<?php echo $row['user_id']; ?>"
                                        onclick="message(this.id);"></i>


                                    <i class="bi bi-pencil-square pe-3" data-bs-toggle="modal"
                                        data-bs-target="#editModal" id="<?php echo $row['user_id']; ?>"
                                        onclick="edit(this.id);"></i>


                                    <!-- <i class="bi bi-pencil-square pe-3"></i> -->
                                    <a href='ajax/staffp.action.php?id=<?php echo $row['id']; ?>'>
                                        <i class="bi bi-x-lg" data-bs-toggle="modal" data-bs-target="#deleteformModal"
                                            onclick="return cencelformdata();"
                                            <?php if ($row['status']== 0) echo ' style="display: none;"' ;?>></i></a>

                                    <a style="color: #35dc59"
                                        href='ajax/staactive.action.php?id=<?php    echo $row['id']; ?>'>
                                        <i class="bi bi-check-lg " data-bs-toggle="modal"
                                            data-bs-target="#deleteformModal" onclick="return activestaff();"
                                            <?php if ($row['status']== 1) echo ' style="display: none;"' ;?>>
                                        </i>
                                    </a>
                                </td>

                                </tr>

                                <?php
                                    $sl++;
                                        }}
                                        ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </section>

    </main>
    <!-- End #main -->



    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body edit-modal-body">

                </div>
            </div>
        </div>
    </div>

    <!-- modal end -->


    <!-- Modal -->
    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body message-modal-body">

                </div>
            </div>
        </div>
    </div>
    <!-- modal end -->


    <!-- ======= Footer ======= -->
    <?php // require_once 'require/addfooter.php'; ?>


    <script>
    function cencelformdata() {
        return confirm("ARE YOU SURE THAT YOU WANT TO CANCEL THIS STAFF DETAILS ?")
    };

    function activestaff() {
        return confirm("ARE YOU SURE THAT YOU WANT TO ACTIVE THIS STAFF DETAILS ?")
    };
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
    const edit = (user) => {

        let url = 'ajax/employee-edit.ajax.php?stafftype=' + user;
        $(".edit-modal-body").html(
            '<iframe width="100%" height="532px" frameborder="0" allowtransparency="true" src="' + url +
            '"></iframe>')

    }

    const message = (user) => {

        let url = 'ajax/emp-message.ajax.php?stafftype=' + user;
        $(".message-modal-body").html(
            '<iframe width="100%" height="270px" frameborder="0" allowtransparency="true" src="' + url +
            '"></iframe>')

    }
    </script>


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <!-- <script src="../admin/assets/vendor/apexcharts/apexcharts.min.js"></script> -->
    <script src="../admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="../admin/assets/vendor/chart.js/chart.min.js"></script> -->
    <!-- <script src="../admin/assets/vendor/echarts/echarts.min.js"></script> -->
    <!-- <script src="../admin/assets/vendor/quill/quill.min.js"></script> -->
    <script src="../admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../admin/assets/vendor/tinymce/tinymce.min.js"></script>
    <!-- <script src="../admin/assets/vendor/php-email-form/validate.js"></script> -->

    <!-- Template Main JS File -->
    <script src="../admin/assets/js/main.js"></script>
    <script>

function disapproved() {

return confirm("ARE YOU SURE TO HIDE THE DETAILS ?")

};

function approved() {

return confirm("ARE YOU SURE TO SHOW THE DETAILS ?")

};
 

    $(document).on("change", "#cheak", function(e) {
        var approved = $(this).val();
        var id = $(this).data('id');
        if (approved == 'yes') {
            approved = 'no';
        } else {
            approved = 'yes';
        }

        console.log(approved);
        $.ajax({
            url: "ajax/featureapage.ajax.php",
            type: "POST",
            data: {
                approved: approved,
                id: id
            },
            success: function(data) {

            // alert(data);
            }

        });
    });
    // });
    </script>
</body>

</html>