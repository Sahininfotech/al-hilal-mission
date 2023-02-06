<?php
session_start();
$page = "Notice";

require_once '../_config/dbconnect.php';
require_once '../classes/admin.class.php';
require_once '../classes/employee.class.php';
require_once '../classes/notice.class.php';
require_once '../classes/utility.class.php';
require_once '../includes/constant.php';
$Utility    = new Utility();
$Admin      = new Admin();
$Notice     = new Notice();
$emp = new  Employee();

$_SESSION['current-url'] = $Utility->currentUrl();
if (!isset($_SESSION['user_name']) && !isset($_SESSION['loggedin']) ) {
  header("Location: login.php");
  exit;
}

if(isset ($_GET['search']) && isset ($_GET['search1'])){
$result = $Notice->noticByDate($_GET['search'], $_GET['search1']);

}

  if(isset ($_POST["submit"])){
 
  $notices      = $_POST["notice"];
  $subject      = $_POST["subject"];
  $oldsignature = $_POST["oldsignature"];

 $image            = $_FILES[ 'signature' ][ 'name' ];
 $image_size       = $_FILES[ 'signature' ][ 'size' ];
 $image_tmp_name   = $_FILES[ 'signature' ][ 'tmp_name' ];
 $file_type        = $_FILES['signature']['type']; //returns the mimetype

 $allowed = array("image/png");
 if(!in_array($file_type, $allowed)) {
 
   echo "<script> alert('Only gif, and png files are allowed.');document.location='notice.php' </script>";
 
   exit();
 
 }
 $image_folter     = 'image/'.$image;

 if($image != ''){
    $c_image = $image;
 }else{
    $c_image = $oldsignature;
 }


   move_uploaded_file( $image_tmp_name, $image_folter );


  

    $resultdata=$emp->noticeInsert($notices, $c_image, $subject);

if($resultdata){

    echo "<script> alert('Sucessfull');document.location='notice.php' </script>";

 }else{

    echo "<script> alert('Data Insertion');document.location='notice.php' </script>";

}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Forum/ notice || <?php echo SITE_NAME; ?></title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <?php require_once 'require/headerLinks.php';?>

    <style>
    .minecsssearch {
        margin-left: .6rem;
        width: 14rem;
    }

    @media (min-width:150px) and (max-width:320px) {
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

                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"
                                enctype="multipart/form-data">

                                <div class="row mb-3">
                                    <input class=" form-control  minecsssearch" list="datalistOptions" id='subject'
                                        placeholder="Subject..." name="subject">
                                </div>

                                <div class="form-floating mb-3">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 200px " name="notice"></textarea>
                                    <label for="floatingTextarea2">Comments</label>
                                </div>

                                <div class="mb-3">
                                    <label for="upload-signature" class="form-label"> Upload previous signature of
                                        In-Charge:
                                    </label>

                                    <select class="form-select" id="form-select" aria-label="Default select example"
                                        name="oldsignature">
                                        <option selected disabled>Select Image</option>
                                        <?php
                                            $updatePage=$emp->shownoticeimage();
                                            foreach ($updatePage as $showstaffnoticeshow) {
                                                $showsignature  = $showstaffnoticeshow['signature'];
                                                $img            = "../image/".$showsignature;
                                            echo '<option value="'.$img.'">'.$img.'</option>';

                                            }
                                            ?>
                                    </select>

                                </div>


                                <div class="mb-3">
                                    <label for="upload-signature" class="form-label">Upload the signature of In-Charge:
                                    </label>
                                    <!-- <label for="exampleFormControlInput1" class="form-label">Email address</label> -->
                                    <input class="form-control" id="formFile" type="file" name="signature"
                                        accept="image/*">
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
                        $showid = $row['id'];
                        $showdate = $row['date'];
                        $datetring = date("d-m-Y", strtotime($showdate));
                        $shownotice = $row['notice'];
                        echo' <div class="col-xxl-4 col-md-4">
                                <div class="card info-card sales-card">
                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li class="dropdown-header text-start"><h6>Filter</h6></li>
                                                <li><a class="dropdown-item" href=ajax/notice-dalete.ajax.php?id='.$showid.' onclick="return deleteNOTICE();" >Delete</a></li>
                                                <li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#noticeModalLabel" id="'.$showid.'" onclick="notice(this.id)" href="#">Modify</a></li>
                                            </ul>
                                    </div>
                                    <a href="./notice-pdf-report.php?id='.$showid.'">
                                    <div class="card-body">
                                        <h5 class="card-title" >'.$datetring.'</h5>
                                        <p>'.$shownotice.'
                                    </div>
                                    </a>
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
    <div class="modal fade" id="noticeModalLabel" tabindex="-1" aria-labelledby="noticeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body notice-modal-body">

                </div>

            </div>
        </div>
    </div>

    <!-- modal end -->



    <!-- ======= Footer ======= -->
    <?php require_once 'require/addfooter.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
    const notice = (id) => {
        let url = 'ajax/noticeedit.ajax.php?noticedata=' + id;
        $(".notice-modal-body").html(
            '<iframe width="99%" height="396px" frameborder="0" allowtransparency="true" src="' + url +
            '"></iframe>')

    }

    function deleteNOTICE() {

        return confirm("Aru you sure want to delete this record ?")

    };
    </script>
</body>

</html>