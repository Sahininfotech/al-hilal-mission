<?php
session_start();
$page = "Staff Notice";

require_once '../_config/dbconnect.php';
require_once '../classes/admin.class.php';
require_once '../classes/employee.class.php';
require_once '../classes/notice.class.php';

$Admin      = new Admin();
$emp        = new Employee();
$Notice     = new Notice();

$insertEmpQuery=false;

if(isset ($_POST["submit"])){

$name   = $_POST["name"];
$notice = $_POST["notice"];





$result = $emp->staff_noticeInsert($name, $notice);

if(!$insertEmpQuery){
    echo "Notice Published Sucessfully! <br>";
}else{
    echo "Notice Publishing Failed!<br>";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Forum/ Staff Notice - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <?php require_once 'require/headerLinks.php';?>
    <style>
    .minecsssearch{
        margin-left: .6rem;
    width: 14rem;
    }

    @media (min-width:150px) and (max-width:320px){
        .minecsssearch {
    margin-left: 0.6rem;
    width: 10rem;
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
            <h1>Forum</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Forum</li>
                    <li class="breadcrumb-item active">Staff Notice</li>
                </ol>
            </nav>
        </div>


        <!-- textbox section start -->
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <!-- Sales Card -->
                        <div class="col-xxl-12 col-md-12">
                            <div class="card info-card sales-card p-4">
                                <?php
                        if(!$insertEmpQuery){
                        ?>

                                <form method="post" action="staffnotice.php">

                                    <div class="row mb-3">
                                        <input class=" form-control  minecsssearch" list="datalistOptions" id='user_id'
                                            placeholder="Type to search..." name="name" onkeyup="GetDetail(this.value)"
                                            value="">
                                    </div>

                                    <div class="form-floating mb-3">
                                        <textarea class="form-control " placeholder="Leave a comment here"
                                            id="floatingTextarea2" style="height: 200px " name="notice"></textarea>
                                        <label for="floatingTextarea2">Comments</label>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <!-- <div class="col-sm-10"> -->
                                        <button type="submit" class="btn btn-primary " style="width: 14rem;" name="submit">Update</button>

                                        <!-- </div> -->
                                    </div>
                            </div>
                        </div>
                        </form>
                        <?php
                    }
                    ?>

                    </div>
                </div>
            </div>
            </div>
            </div>
        </section>

        <!-- textbox section End-->
        <!-- card section start -->
        <section class="section dashboard">
            <div class="row">
            
            <?php
            $showNotice = $Notice->showEmpNotice();
            if (count($showNotice) > 0) {

                foreach($showNotice as $row){
                $showdate = $row['date'];
                $showid = $row['id'];
                $shownotice = $row['notice'];
                $showname = $row['name'];
                echo' <div class="col-xxl-4 col-md-4 col-sm-4">
                        <div class="card info-card sales-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                        <li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#staffnoticeModalLabel" id="'.$showid.';" onclick="staffnotice(this.id);" href="#">Modify</a></li>
                                    </ul>
                            </div>

                        <div class="card-body">

                        <h5 class="card-title">'.$showdate.'</h5>
                        <h5 class="card-title">'.$showname.'</h5>
                        <p>'.$shownotice.'</p> 

                    </div>

                </div>
                </div><!-- End Sales Card -->
                ';
            }
        }else{
            echo '<div class="w-50 m-auto border bg-light py-3">
                    <p class="m-auto text-center text-danger">No Notice Avilable</p>
                </div>';
        }

        
        ?>
                <!-- card section end -->
            </div>
        </section>


        <!-- table End -->
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php require_once 'require/addfooter.php'; ?>


    <!-- Modal -->
    <div class="modal fade" id="staffnoticeModalLabel" tabindex="-1" aria-labelledby="staffnoticeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staffnoticeModalLabel">
                        Forms
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body staffnotice-modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        Add
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal end -->

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
    const staffnotice = (id) => {
        let url = 'ajax/staffnoticeedit.ajax.php?staffnoticedata=' + id;
        $(".staffnotice-modal-body").html(
            '<iframe width="99%" height="465px" frameborder="0" allowtransparency="true" src="' + url +
            '"></iframe>')

    }
    </script>

    <script>
    // onkeyup event will occur when the user 
    // release the key and calls the function
    // assigned to this event
    function GetDetail(str) {
        if (str.length == 0) {
            document.getElementById("address").value = "";
            document.getElementById("email").value = "";
            return;
        } else {

            // Creates a new XMLHttpRequest object
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {

                // Defines a function to be called when
                // the readyState property changes
                if (this.readyState == 4 &&
                    this.status == 200) {

                    // Typical action to be performed
                    // when the document is ready
                    var myObj = JSON.parse(this.responseText);

                    // Returns the response data as a
                    // string and store this array in
                    // a variable assign the value 
                    // received to first name input field

                    document.getElementById("address").value = myObj[0];

                    // Assign the value received to
                    // last name input field
                    document.getElementById(
                        "email").value = myObj[1];
                }
            };

            // xhttp.open("GET", "filename", true);
            xmlhttp.open("GET", "gfg.php?user_id=" + str, true);

            // Sends the request to the server
            xmlhttp.send();
        }
    }
    </script>

</body>

</html>