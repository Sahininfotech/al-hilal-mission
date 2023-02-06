<?php
session_start();
$page = "Notice";



require_once '../_config/dbconnect.php';
require_once '../classes/admin.class.php';
require_once '../classes/employee.class.php';
require_once '../classes/notice.class.php';

$Admin      = new Admin();
$Notice     = new Notice();
$emp = new  Employee();


// $noticesdata = new  Cnstitute();
if(isset ($_GET['search']) && isset ($_GET['search1'])){
$result = $Notice->noticByDate($_GET['search'], $_GET['search1']);

}

  if(isset ($_POST["submit"])){
 
  $notice = $_POST["notice"];

  

    $result=$emp->noticeInsert($notice);
  
        if($result){
            ?>
<script>
alert('Notice Updated!');
</script>
<?php
         }else{
            ?>
<script>
alert('Notice Updated!');
</script>
<?php
        }
     }
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Forum/ notice - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
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
            <h1>Forum</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Forum</li>
                    <li class="breadcrumb-item active">Notice</li>
                </ol>
            </nav>
        </div>


        <!-- textbox section start -->

        <section class="section dashboard">
            <div class="col-lg-12">
                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-xxl-12 col-md-12">
                        <div class="card info-card sales-card p-4">

                            <form method="post" action="notice.php">

                                <div class="form-floating mb-3">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 200px " name="notice"></textarea>
                                    <label for="floatingTextarea2">Comments</label>
                                </div>

                                <div class="mb-3">
                                    <label for="upload-signature" class="form-label">Upload the signature of In-Charge:
                                    </label>
                                    <!-- <label for="exampleFormControlInput1" class="form-label">Email address</label> -->
                                    <input type="file" class="form-control" id="upload-signature">
                                </div>

                                <div class="d-flex justify-content-end">
                                    <!-- <div class="col-sm-10"> -->
                                    <button type="submit" class="btn btn-primary " style="width: 14rem;"
                                        name="submit">Update</button>

                                    <!-- </div> -->
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- textbox section End-->


        <section class="section dashboard">
            <div class="card p-3 justify-content-center">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <form action="notice.search.php" method="GET">
                                <div class="row mb-3 ">
                                    <label for="inputDate">From Date</label>
                                    <div>
                                        <input type="date" class="form-control" name="search1"
                                            value="<?php if(isset($_GET['search1'])){echo $_GET['search1']; }?>">
                                    </div>
                                </div>
                        </div>
                        <div class="col">
                            <div class="row mb-3 ">
                                <label for="inputDate">To Date</label>
                                <div>
                                    <input type="date" class="form-control" name="search"
                                        value="<?php if(isset($_GET['search'])){echo $_GET['search']; }?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row mb-3 pt-4">


                                <button type="text" class="btn btn-primary"
                                    style="margin: auto; display: inline-flex; width: 68%;justify-content: center; ">Find</button>

                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>


        <!-- card section start -->



        <section class="section dashboard">
            <div class="row">

                <?php
                $result = $emp->noticedisplaydata();
                 if (count($result) > 0) {
                    foreach($result as $row){
                        $showid = $row['date'];
                        $shownotice = $row['notice'];
                        echo' <div class="col-xxl-4 col-md-4">
                                <div class="card info-card sales-card">
                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li class="dropdown-header text-start"><h6>Filter</h6></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                                <li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#staffnoticeModalLabel" id="'.$showid.';" onclick="staffnotice(this.id);" href="#">Modify</a></li>
                                            </ul>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title" >'.$showid.'</h5>
                                        <p>'.$shownotice.'
                                    </div>
                                </div>
                            </div>';
                    }
                }else {
                echo '<div class="w-50 m-auto border bg-light py-3">
                        <p class="m-auto text-center text-danger">No Notice Avilable</p>
                    </div>';
                }

           
  ?>
                <!-- card section end -->
            </div>
        </section>


        <!-- card section end -->



        <!-- table End -->
    </main>
    <!-- End #main -->


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


    <!-- ======= Footer ======= -->
    <?php require_once 'require/addfooter.php'; ?>
</body>

</html>