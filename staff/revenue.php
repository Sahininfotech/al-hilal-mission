<?php
$page = "Revenue";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Accountant/ Revenue - NiceAdmin Bootstrap Template</title>
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
      <h1>Revenue</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Accountant</li>
          <li class="breadcrumb-item active">Revenue</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

  
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
       
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
        
            <div class="card-body">
              <h5 class="card-title " style="display: flex;justify-content: center;"> Donation Details Form</h5>


              <form>
               
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputaddress" class="col-sm-3 col-form-label">Address</label>
                  <div class="col-sm-9">
                    <input type="address" class="form-control">
                  </div>
                </div>
            
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-3 col-form-label">Pay In Rupees</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control">
                  </div>
                </div>
                <!-- <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div> -->
               
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-3 col-form-label">Notes</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" style="height: 90px"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <!-- <label class="col-sm-3 col-form-label">Confirm Payment</label> -->
                  <div class="col-sm-9 " style="    display: flex; justify-content: center; align-items: center; margin: auto;">
                    <button type="submit" class="btn btn-primary " style="width: 105px;">Pay</button>
                  </div>
                </div>
        
              </form>

            </div>
          </div>

        

        
      </div>
      <div class="col-md-6">

     
      <div class="card ms-2 ">
        <div class="card-body">
          <h5 class="card-title d-flex justify-content-center">Extra Buy Details</h5>

          <!-- List group With Icons -->
          <ul class="list-group">
            <li class="list-group-item"><i class="bi bi-star me-1 text-success pe-3"></i> Benches</li>
            <li class="list-group-item"><i class="bi bi-collection me-1 text-primary pe-3"></i> Chairs </li>
            <li class="list-group-item"><i class="bi bi-check-circle me-1 text-danger pe-3"></i> Fans</li>
            <li class="list-group-item"><i class="bi bi-exclamation-octagon me-1 text-warning pe-3"></i> Lights</li>
            <li class="list-group-item"><i class="bi bi-star me-1 text-success pe-3"></i> Tables</li>
            <li class="list-group-item"><i class="bi bi-collection me-1 text-primary pe-3"></i> Duster </li>
            <li class="list-group-item"><i class="bi bi-check-circle me-1 text-danger pe-3"></i> Blackboard</li>
            <li class="list-group-item"><i class="bi bi-exclamation-octagon me-1 text-warning pe-3"></i> Chalks</li>
            <li class="list-group-item"><i class="bi bi-exclamation-octagon me-1 text-warning pe-3"></i> Racks</li>
          </ul><!-- End List group With Icons -->

        </div>
      </div>
    </div>
    </section>
    <!-- Student Details  -->
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

<!-- Recent Sales -->
<div class="col-12">
  <div class="card recent-sales overflow-auto">

    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>

        <li><a class="dropdown-item" href="#">Today</a></li>
        <li><a class="dropdown-item" href="#">This Month</a></li>
        <li><a class="dropdown-item" href="#">This Year</a></li>
      </ul>
    </div>

    <div class="card-body">
      <h5 class="card-title">Student Details <span>| Today</span></h5>

      <table class="table table-borderless datatable">
        <thead>
          <tr>
            <th scope="col">Sl no'</th>
            <th scope="col">Name</th>
            <th scope="col">class</th>
            <th scope="col">Fees</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row"><a href="#">#2457</a></th>
            <td>Brandon Jacob</td>
            <td><a href="#" class="text-primary">At praesentium minu</a></td>
            <td>$64</td>
            <td><span class="badge bg-success">Approved</span></td>
          </tr>
          <tr>
            <th scope="row"><a href="#">#2147</a></th>
            <td>Bridie Kessler</td>
            <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
            <td>$47</td>
            <td><span class="badge bg-warning">Pending</span></td>
          </tr>
          <tr>
            <th scope="row"><a href="#">#2049</a></th>
            <td>Ashleigh Langosh</td>
            <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
            <td>$147</td>
            <td><span class="badge bg-success">Approved</span></td>
          </tr>
          <tr>
            <th scope="row"><a href="#">#2644</a></th>
            <td>Angus Grady</td>
            <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
            <td>$67</td>
            <td><span class="badge bg-danger">Rejected</span></td>
          </tr>
          <tr>
            <th scope="row"><a href="#">#2644</a></th>
            <td>Raheem Lehner</td>
            <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
            <td>$165</td>
            <td><span class="badge bg-success">Approved</span></td>
          </tr>
        </tbody>
      </table>

    </div>

  </div>
</div>
</div>
</div>
</div>
</section>

    <!-- Donation Detalis start -->

    
    <section class="section dashboard">
      <div class="row">

        
        <div class="col-lg-12">
          <div class="row">


<div class="col-12">
  <div class="card recent-sales overflow-auto">

    <div class="filter">
      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <li class="dropdown-header text-start">
          <h6>Filter</h6>
        </li>

        <li><a class="dropdown-item" href="#">Today</a></li>
        <li><a class="dropdown-item" href="#">This Month</a></li>
        <li><a class="dropdown-item" href="#">This Year</a></li>
      </ul>
    </div>

    <div class="card-body p-4">
      <h5 class="card-title p-0">Donation Details <span>| Today</span></h5>
 <!-- Button trigger modal -->
 <button  type="button" class="btn btn-primary mb-4" style="margin: auto; display: flex; align-items: center; margin-right: 0rem;" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add New</button>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Tables</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- General Form Elements -->
        <form>
         
          <div class="card ps-5 pe-5">
            <div class="card-body">
              <h5 class="card-title " style="display: flex;justify-content: center;"> Donation Details Form</h5>


               
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputaddress" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">
                    <input type="address" class="form-control">
                  </div>
                </div>
            
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Pay In Rupees</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control">
                  </div>
                </div>
                <!-- <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div> -->
               
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Notes</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 90px"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <!-- <label class="col-sm-3 col-form-label">Confirm Payment</label> -->
                  <div class="col-sm-10 " style="    display: flex; justify-content: center; align-items: center; margin: auto;">
                    <button type="submit" class="btn btn-primary " style="width: 105px;">Pay</button>
                  </div>
                </div>
        
                
              </div>
            </div>
          </form>
  
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal">Add </button>
      </div>
    </div>
  </div>
</div>
<!-- modal end -->
      <table class="table table-borderless datatable">
        <thead>
          <tr>
            <th scope="col">Sl no'</th>
            <th scope="col">Name</th>
            <th scope="col">class</th>
            <th scope="col">Fees</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row"><a href="#">#2457</a></th>
            <td>Brandon Jacob</td>
            <td><a href="#" class="text-primary">At praesentium minu</a></td>
            <td>$64</td>
            <td><span class="badge bg-success">Approved</span></td>
          </tr>
          <tr>
            <th scope="row"><a href="#">#2147</a></th>
            <td>Bridie Kessler</td>
            <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
            <td>$47</td>
            <td><span class="badge bg-warning">Pending</span></td>
          </tr>
          <tr>
            <th scope="row"><a href="#">#2049</a></th>
            <td>Ashleigh Langosh</td>
            <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
            <td>$147</td>
            <td><span class="badge bg-success">Approved</span></td>
          </tr>
          <tr>
            <th scope="row"><a href="#">#2644</a></th>
            <td>Angus Grady</td>
            <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
            <td>$67</td>
            <td><span class="badge bg-danger">Rejected</span></td>
          </tr>
          <tr>
            <th scope="row"><a href="#">#2644</a></th>
            <td>Raheem Lehner</td>
            <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
            <td>$165</td>
            <td><span class="badge bg-success">Approved</span></td>
          </tr>
        </tbody>
      </table>

    </div>

  </div>
</div>
</div>
</div>
</div>
</section>
<!-- Donation Details end -->
    
    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php require_once 'require/stafffooter.php'; ?>

</body>

</html>