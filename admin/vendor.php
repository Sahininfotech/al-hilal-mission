<?php

session_start();

$page = "vendor";

require_once '../_config/dbconnect.php';

require_once '../classes/vendor.class.php';

require_once '../classes/admin.class.php';

require_once '../classes/utility.class.php';





$Utility   = new Utility(); 

$Admin     = new Admin();

$Vendor = new  Vendor();

$vendoresult=$Vendor->displaydata();





$_SESSION['current-url'] = $Utility->currentUrl();

  

if (!isset($_SESSION['user_name']) && !isset($_SESSION['loggedin']) ) {

  header("Location: login.php");

  exit;

}



?>

<!DOCTYPE html>

<html lang="en">



<head>



    <meta charset="utf-8" />

    <meta content="width=device-width, initial-scale=1.0" name="viewport" />



    <title>Accountant/ Expenses - NiceAdmin Bootstrap Template</title>

    <meta content="" name="description" />

    <meta content="" name="keywords" />

    <?php require_once 'require/headerLinks.php';?>

    <style>

    .addnewbtncss {

        margin: auto;

        display: flex;

        align-items: center;

        margin-right: 1rem;

        margin-top: -3rem;



    }

    @media (min-width:150px) and (max-width:359px) {

        .addnewbtncss {

            margin: 0rem;

            display: flex;

            align-items: center;

            margin-right: 0rem;

            margin-top: -1rem;

        }

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

            <h1>Accountant</h1>

            <nav>

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                    <li class="breadcrumb-item">Accountant</li>

                    <li class="breadcrumb-item active">Expenses</li>

                </ol>

            </nav>

        </div>

        <!-- End Page Title -->

        <!-- table start -->

        <!-- Sales Card -->

        <!-- date-selector end -->

        <section class="section dashboard">

                <div class="col-lg-12">

                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">

                            <h5 style="padding: 20px 0 5px 0;

                        font-size: 30px;

                       font-weight: 500;

                       color: #012970;

                       font-family: 'Poppins', sans-serif">Vendor </h5>

                            <!-- Button trigger modal -->



                            <button type="button"  class="btn btn-primary mb-4 addnewbtncss" data-bs-toggle="modal" data-bs-target="#addVendorModal"

                                onclick="addVendor();">

                                Add New

                            </button>



                            <!-- Modal -->

                            <div class="modal fade" id="addVendorModal" tabindex="-1"

                                aria-labelledby="addVendorModalLabel" aria-hidden="true">

                                <div class="modal-dialog modal-lg">

                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <h5 class="modal-title" id="addVendorModalLabel">

                                                Vendors Add Forms

                                            </h5>

                                            <button type="button" class="btn-close" data-bs-dismiss="modal"

                                                aria-label="Close"></button>

                                        </div>

                                        <div class="modal-body donation-modal-body">

                                        </div>

                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">

                                                Close

                                            </button>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!-- modal end -->

                            <table class="table datatable ">

                                <thead>

                                    <tr>

                                        <th scope="col">S.No</th>

                                        <th scope="col">name</th>

                                        <th scope="col">Date</th>

                                        <th scope="col">address</th>

                                        <th scope="col">Vendor Id</th>

                                        <th scope="col">mob_no</th>

                                        <th scope="col">Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php

                                    $i=1;

                                    foreach($vendoresult as $row){
                                        $showvendor = $row['date'] ;
                                        $vendordatetring = date("d-m-Y", strtotime($showvendor));
                                    ?>

                                    <tr>

                                        <?php if ($row['status']== 'active') echo '<tr style="color: black">' ;   if ($row['status']== 'inactive') echo '<tr    style="color: red">' ;?>

                                        <td><?php echo $i  ?></td>

                                        <td><?php    echo $row['name']  ?></td>

                                        <td><?php    echo $vendordatetring; ?></td>

                                        <td><?php    echo $row['address']  ?></td>

                                        <td><?php    echo $row['vendor_id']  ?></td>

                                        <td><?php    echo $row['mob_no']  ?></td>

                                        <td>

                                            <a

                                                href='../admin/vendor-details.php?vendoredit=<?php    echo $row['id']  ?>'>

                                                <i class="bi bi-eye-fill pe-4">

                                                </i>

                                            </a>

                                            <a style="color: #35dc59"
                                            href='ajax/vendorctive.action.php?id=<?php    echo $row['id']  ?>'>
                                            <i class="bi bi-check-lg " data-bs-toggle="modal"
                                                data-bs-target="#deleteformModal" onclick="return activevendor();"
                                                <?php if ($row['status']== 'active') echo ' style="display: none;"' ;?>>
                                            </i>
                                        </a>
                                            <a
                                                href='ajax/vendorcancel.acction.php?id=<?php    echo $row['id']  ?>'>
                                                <i class="bi bi-x-lg" data-bs-toggle="modal"
                                                    data-bs-target="#deleteformModal" onclick="return cancel();"
                                                    <?php  if ($row['status']== 'inactive') echo 'style="display: none;"' ;?>>
                                                </i>
                                            </a>



                                        </td>

                                    </tr>



                                    <?php

                                        $i++;

                                        }         

                                    ?>

                                </tbody>

                            </table>

                            <!-- End Table with stripped rows -->

                        </div>

                    </div>

                </div>

        </section>





        <!-- table End -->

    </main>

    <!-- End #main -->



    <!-- ======= Footer ======= -->

    <?php require_once 'require/addfooter.php'; ?>

    <script>

    function cancel() {

        return confirm("Are you sure! want to cancel this record ?")

    };
    function activevendor() {
        return confirm("Are you sure! want to Active this record ?")
    };
    </script>



    <script src="https://code.jquery.com/jquery-3.6.0.js"

        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>

    const addVendor = () => {

        let url = 'ajax/vendor-add.ajax.php';

        $(".donation-modal-body").html(

            '<iframe width="100%" height="340px" frameborder="0" allowtransparency="true" src="' + url +

            '"></iframe>')



    }

    // const edit = (id) => {

    //     let url = 'ajax/vendoredit.ajax.php?vendoredit1=' + id;

    //     $(".vendoredit-modal-body").html(

    //         '<iframe width="100%" height="417px" frameborder="0" allowtransparency="true" src="' + url +

    //         '"></iframe>')



    // }

    const deleteform = (id) => {

        let url = 'ajax/deleteform.ajax.php?stafftype=' + id;

        $(".deleteform-modal-body").html(

            '<iframe width="99%" height="305px" frameborder="0" allowtransparency="true" src="' + url +

            '"></iframe>')



    }

    </script>

</body>



</html>

<!-- active pending cencel update -->