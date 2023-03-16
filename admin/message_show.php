<?php
session_start();
$page = "Contact form";
require_once '../_config/dbconnect.php';
require_once '../classes/contact.class.php';
require_once '../classes/admin.class.php';
require_once '../classes/utility.class.php';
require_once '../includes/constant.php';


$Utility   = new Utility(); 
$Admin     = new Admin();
$Contact    = new Contact();

$_SESSION['current-url'] = $Utility->currentUrl();


if (!isset($_SESSION['user_name']) && !isset($_SESSION['loggedin']) ) {

    header("Location: login.php");
  
    exit;
  
  }

  $message   = $Contact->messageshow();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Contacts / Contact form Details || <?php echo SITE_NAME; ?></title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <?php require_once 'require/headerLinks.php';?>


    <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <style>
    .test {
        width: 10px;
        height: 10px;
        background-color: #057811;
        margin-left: .8rem;
        margin-top: -1.5rem;
        overflow: hidden;
        position: relative;
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
            <h1>Contact form Details</h1>
            <nav>
                <ol class="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Contacts</li>
                    <li class="breadcrumb-item active">Contact form Details</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <!-- partial -->

            <div class="content-wrapper">
                <div class="row">

                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Message Maintenance</h4>
                                <div class="table-responsive">
                                    <table id="dtBasicExample" class="table table-striped datatable" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>
                                                    SL. NO.
                                                </th>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    email
                                                </th>
                                                <th>
                                                    subject
                                                </th>
                                                <th>
                                                    Added On
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i=1;
                                                if ($message == 0) {
                                                echo "No data Type Avilable.";
                                                }else{
                                                foreach ($message as $messageshow) {
                                                $showname          = $messageshow['name'];
                                                $showemail         = $messageshow['email'];
                                                $showsubject       = $messageshow['subject'];
                                                $showmessage       = $messageshow['message'];
                                                $showstatus        = $messageshow['status'];
                                                $showdate          = $messageshow['date'];
                                                $showid            = $messageshow['id'];
                                                $datetring = date("Y-m-d", strtotime($showdate));
                                                ?>

                                            <tr>
                                                <td>
                                                    <?php  echo $i                ?>
                                                </td>
                                                <td>
                                                    <?php  echo $showname;        ?>
                                                </td>
                                                <td>
                                                    <?php  echo $showemail;       ?>
                                                </td>
                                                <td>
                                                    <?php  echo $showsubject;      ?>
                                                </td>
                                                <td>
                                                   
                                                <?php  echo $datetring;            ?>
                                            
                                                </td>
                                                <td>
                                                  
                                                    <a href='viewmessage.php?message=<?php    echo $showid;  ?>&approved=1'>
                                                        <i class="bi bi-chat-left-text" onclick="return viwemessage();">




                                                        </i>
                                                        <?php if ($showstatus == '0') echo '<div class="test rounded-circle"  
                                                        ;"></div>' ;?>

                                                    </a>



                                                </td>
                                            </tr>
                                            <?php  
                                        $i++;
                                      }   }
                                      ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            </div>
            <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->

            <!-- container-scroller -->

            <div class="justify-content-center print-sec d-flex my-5" style="margin-top: -1rem!important;">
            <button class="btn btn-primary shadow mx-2" onclick="history.back()">Go Back</button>
        </div>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php require_once 'require/addfooter.php'; ?>

    <script>
    const viwemessage = (id) => {
        let url = 'viwemessage.php?message=' + id;
        $(".viwemessage-modal-body").html(
            '<iframe width="99%" height="354px" frameborder="0" allowtransparency="true" src="' + url +
            '"></iframe>')

    }
    </script>


</body>

</html>