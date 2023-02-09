<?php
$page = "Studentclass-1";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Student Management / Student Details / Studentclass-1- NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../admin/assets/img/favicon.png" rel="icon">
  <link href="../admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.php">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

    <!--======== sidebar ========-->
    <?php require_once 'require/sidebar.php'; ?>
    <!--======== End sidebar ========-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Student Details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Student Management</li>
          <li class="breadcrumb-item ">Student Details</li>
          <li class="breadcrumb-item active">Class-1</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

<!-- Recent Sales -->
<div class="col-12">
  <div class="card recent-sales overflow-auto p-4">

        <table class="table table-borderless datatable">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Student Name</th>
              <th scope="col">Roll no</th>
              <th scope="col">Fees Payment</th>
              <th scope="col">Date</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row"><a href="#">DN2457</a></th>
              <td>Brandon Jacob</td>
              <td><a href="#" class="text-primary">DRRKCST1-10016</a></td>
              <td>1000rs</td>
              <td>2014-12-05</td>
              <td><span class="badge bg-success">Paid</span></td>
            </tr>
            <tr>
              <th scope="row"><a href="#">DN2147</a></th>
              <td>Bridie Kessler</td>
              <td><a href="#" class="text-primary">DRRKCST1-10017</a></td>
              <td>1000rs</td>
              <td>2014-12-05</td>
              <td><span class="badge bg-warning">Pending</span></td>
            </tr>
            <tr>
              <th scope="row"><a href="#">DN2049</a></th>
              <td>Ashleigh Langosh</td>
              <td><a href="#" class="text-primary">DRRKCST1-10018</a></td>
              <td>1000rs</td>
              <td>2014-12-05</td>
              <td><span class="badge bg-success">Paid</span></td>
            </tr>
            <tr>
              <th scope="row"><a href="#">DN2644</a></th>
              <td>Angus Grady</td>
              <td><a href="#" class="text-primar">DRRKCST1-10019</a></td>
              <td>1000rs</td>
              <td>2014-12-05</td>
              <td><span class="badge bg-danger">Rejected</span></td>
            </tr>
            <tr>
              <th scope="row"><a href="#">DN2644</a></th>
              <td>Raheem Lehner</td>
              <td><a href="#" class="text-primary">DRRKCST1-10020</a></td>
              <td>1000rs</td>
              <td>2014-12-05</td>
              <td><span class="badge bg-success">Paid</span></td>
            </tr>
            <tr>
              <th scope="row"><a href="#">DN2644</a></th>
              <td>Raheem Lehner</td>
              <td><a href="#" class="text-primary">DRRKCST1-10020</a></td>
              <td>1000rs</td>
              <td>2014-12-05</td>
              <td><span class="badge bg-success">Paid</span></td>
            </tr>
            <tr>
              <th scope="row"><a href="#">DN2644</a></th>
              <td>Raheem Lehner</td>
              <td><a href="#" class="text-primary">DRRKCST1-10020</a></td>
              <td>1000rs</td>
              <td>2014-12-05</td>
              <td><span class="badge bg-success">Paid</span></td>
            </tr>
            <tr>
              <th scope="row"><a href="#">DN2644</a></th>
              <td>Raheem Lehner</td>
              <td><a href="#" class="text-primary">DRRKCST1-10020</a></td>
              <td>1000rs</td>
              <td>2014-12-05</td>
              <td><span class="badge bg-success">Paid</span></td>
            </tr>
            <tr>
              <th scope="row"><a href="#">DN2644</a></th>
              <td>Raheem Lehner</td>
              <td><a href="#" class="text-primary">DRRKCST1-10020</a></td>
              <td>1000rs</td>
              <td>2014-12-05</td>
              <td><span class="badge bg-success">Paid</span></td>
            </tr>
            <tr>
              <th scope="row"><a href="#">DN2644</a></th>
              <td>Raheem Lehner</td>
              <td><a href="#" class="text-primary">DRRKCST1-10020</a></td>
              <td>1000rs</td>
              <td>2014-12-05</td>
              <td><span class="badge bg-success">Paid</span></td>
            </tr>
            <tr>
              <th scope="row"><a href="#">DN2644</a></th>
              <td>Raheem Lehner</td>
              <td><a href="#" class="text-primary">DRRKCST1-10020</a></td>
              <td>1000rs</td>
              <td>2014-12-05</td>
              <td><span class="badge bg-success">Paid</span></td>
            </tr>
            <tr>
              <th scope="row"><a href="#">DN2644</a></th>
              <td>Raheem Lehner</td>
              <td><a href="#" class="text-primary">DRRKCST1-10020</a></td>
              <td>1000rs</td>
              <td>2014-12-05</td>
              <td><span class="badge bg-success">Paid</span></td>
            </tr>
            <tr>
              <th scope="row"><a href="#">DN2644</a></th>
              <td>Raheem Lehner</td>
              <td><a href="#" class="text-primary">DRRKCST1-10020</a></td>
              <td>1000rs</td>
              <td>2014-12-05</td>
              <td><span class="badge bg-success">Paid</span></td>
            </tr>
            <tr>
              <th scope="row"><a href="#">DN2644</a></th>
              <td>Raheem Lehner</td>
              <td><a href="#" class="text-primary">DRRKCST1-10020</a></td>
              <td>1000rs</td>
              <td>2014-12-05</td>
              <td><span class="badge bg-success">Paid</span></td>
            </tr>
            <tr>
              <th scope="row"><a href="#">DN2644</a></th>
              <td>Raheem Lehner</td>
              <td><a href="#" class="text-primary">DRRKCST1-10020</a></td>
              <td>1000rs</td>
              <td>2014-12-05</td>
              <td><span class="badge bg-success">Paid</span></td>
            </tr>
            <tr>
              <th scope="row"><a href="#">DN2644</a></th>
              <td>Raheem Lehner</td>
              <td><a href="#" class="text-primary">DRRKCST1-10020</a></td>
              <td>1000rs</td>
              <td>2014-12-05</td>
              <td><span class="badge bg-success">Paid</span></td>
            </tr>
          </tbody>
        </table>

      </div>
    </div>
    </div>
    </div>
    </div>
    </section>

          

  
  

  </main><!-- End #main -->

   <!-- ======= Footer ======= -->
   <?php require_once 'require/stafffooter.php'; ?>

</body>

</html>