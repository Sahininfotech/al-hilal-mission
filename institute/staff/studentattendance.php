<?php
$page = "Student Attendance";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Student Management / Add new Staff - NiceAdmin Bootstrap Template</title>
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
      <h1>Student Attendance</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Student management</li>
          <li class="breadcrumb-item active">Student Attendance</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable" >
                <thead>
                  <tr>
                    <th scope="col">SL No'</th>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Attendance</th>
                    <!-- <th scope="col">Date</th> -->
                    <th scope="col">submit</th>
                  </tr>
                </thead>
                <tbody >
                  <tr  >
                    <th scope="row">1</th>
                    <td>d1234</td>
                    <td>Brandon Jacob</td>
                    <td>
                      <div class="row mb-three">
                        <div class="col-sm-10">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" />
                            <label class="form-check-label" for="gridCheck1">
                              Present
                            </label>
                          </div>
                        </div>
                      </div>
                    </td>
                    <!-- <td>
                      <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control">
                        </div>
                      </div>
                    </td> -->
                    <td>
                      <div class="row mb-three">
                        <div class="col-sm-10">
                          <button type="submit" class="btn fs-12 btn-sm  btn-primary" style="padding-top: 1px;padding-bottom: 1px;">
                            Submit
                          </button>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td >d1236</td>
                    <td>Bridie Kessler</td>
                    <td>
                      <div class="row mb-three">
                        <div class="col-sm-10">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" />
                            <label class="form-check-label" for="gridCheck1">
                              Present
                            </label>
                          </div>
                        </div>
                      </div>
                    </td>
                   
                    <!-- <td>
                      <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control">
                        </div>
                      </div>
                    </td> -->
                    <td>
                      <div class="row mb-three">
                        <div class="col-sm-8">
                          <button type="submit" class="btn fs-12 btn-sm  btn-primary "  style="padding-top: 1px;padding-bottom: 1px;">
                            Submit
                          </button>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>d1238</td>
                    <td>Ashleigh Langosh</td>
                    <td>
                      <div class="row mb-three">
                        <div class="col-sm-10">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" />
                            <label class="form-check-label" for="gridCheck1">
                              Present
                            </label>
                          </div>
                        </div>
                      </div>
                    </td>
  
                    <!-- <td>
                      <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control">
                        </div>
                      </div>
                    </td> -->
                    <td>
                      <div class="row mb-three">
                        <div class="col-sm-10">
                          <button type="submit" class="btn fs-12 btn-sm  btn-primary" style="padding-top: 1px;padding-bottom: 1px;">
                            Submit
                          </button>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>d1239</td>
                    <td>Angus Grady</td>
                    <td>
                      <div class="row mb-three">
                        <div class="col-sm-10">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" />
                            <label class="form-check-label" for="gridCheck1">
                              Present
                            </label>
                          </div>
                        </div>
                      </div>
                    </td>
                    
                    <!-- <td>
                      <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control">
                        </div>
                      </div>
                    </td> -->
                    <td>
                      <div class="row mb-three">
                        <div class="col-sm-10">
                          <button type="submit" class="btn fs-12 btn-sm  btn-primary" style="padding-top: 1px;padding-bottom: 1px;">
                            Submit
                          </button>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>d1243</td>
                    <td>Raheem Lehner</td>
                    <td>
                      <div class="row mb-three">
                        <div class="col-sm-10">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" />
                            <label class="form-check-label" for="gridCheck1">
                              Present
                            </label>
                          </div>
                        </div>
                      </div>
                    </td>
                  
                    <!-- <td>
                      <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control">
                        </div>
                      </div>
                    </td> -->
                    <td>
                      <div class="row mb-three">
                        <div class="col-sm-10">
                          <button type="submit" class="btn fs-12 btn-sm  btn-primary" style="padding-top: 1px;padding-bottom: 1px;">
                            Submit
                          </button>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">6</th>
                    <td>d1243</td>
                    <td>Raheem Lehner</td>
                    <td>
                      <div class="row mb-three">
                        <div class="col-sm-10">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" />
                            <label class="form-check-label" for="gridCheck1">
                              Present
                            </label>
                          </div>
                        </div>
                      </div>
                    </td>
                  
                    <!-- <td>
                      <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control">
                        </div>
                      </div>
                    </td> -->
                    <td>
                      <div class="row mb-three">
                        <div class="col-sm-10">
                          <button type="submit" class="btn  fs-12 btn-sm  btn-primary"  style="padding-top: 1px;padding-bottom: 1px;">
                            Submit
                          </button>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td>d1243</td>
                    <td>Raheem Lehner</td>
                    <td>
                      <div class="row mb-three">
                        <div class="col-sm-10">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" />
                            <label class="form-check-label" for="gridCheck1">
                              Present
                            </label>
                          </div>
                        </div>
                      </div>
                    </td>
                  
                    <!-- <td>
                      <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control">
                        </div>
                      </div>
                    </td> -->
                    <td>
                      <div class="row mb-three">
                        <div class="col-sm-10">
                          <button type="submit" class="btn  fs-12 btn-sm  btn-primary" style="padding-top: 1px;padding-bottom: 1px;">
                            Submit
                          </button>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">8</th>
                    <td>d1243</td>
                    <td>Raheem Lehner</td>
                    <td>
                      <div class="row mb-three">
                        <div class="col-sm-10">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" />
                            <label class="form-check-label" for="gridCheck1">
                              Present
                            </label>
                          </div>
                        </div>
                      </div>
                    </td>
                  
                    <!-- <td>
                      <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control">
                        </div>
                      </div>
                    </td> -->
                    <td>
                      <div class="row mb-three">
                        <div class="col-sm-10">
                          <button type="submit" class="btn fs-12 btn-sm  btn-primary"  style="padding-top: 1px;padding-bottom: 1px;">
                            Submit
                          </button>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">9</th>
                    <td>d1243</td>
                    <td>Raheem Lehner</td>
                    <td>
                      <div class="row mb-three">
                        <div class="col-sm-10">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" />
                            <label class="form-check-label" for="gridCheck1">
                              Present
                            </label>
                          </div>
                        </div>
                      </div>
                    </td>
                  
                    <!-- <td>
                      <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control">
                        </div>
                      </div>
                    </td> -->
                    <td>
                      <div class="row mb-three">
                        <div class="col-sm-10">
                          <button type="submit" class="btn  fs-12 btn-sm  btn-primary" style="padding-top: 1px;padding-bottom: 1px;">
                            Submit
                          </button>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">10</th>
                    <td>d1243</td>
                    <td>Raheem Lehner</td>
                    <td>
                      <div class="row mb-three">
                        <div class="col-sm-10">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" />
                            <label class="form-check-label" for="gridCheck1">
                              Present
                            </label>
                          </div>
                        </div>
                      </div>
                    </td>
                  
                    <!-- <td>
                      <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control">
                        </div>
                      </div>
                    </td> -->
                    <td>
                      <div class="row mb-three">
                        <div class="col-sm">
                          <button type="submit" class="btn  fs-12 btn-sm  btn-primary "   style="padding-top: 1px;padding-bottom: 1px;">
                            Submit
                          </button>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

   <!-- ======= Footer ======= -->
   <?php require_once 'require/stafffooter.php'; ?>
  <script>
       $(document).ready(function () {
                $(".tbtn").click(function () {
                    $(this).parents(".custom-table").find(".toggler1").removeClass("toggler1");
                    $(this).parents("tbody").find(".toggler").addClass("toggler1");
                    $(this).parents(".custom-table").find(".fa-minus-circle").removeClass("fa-minus-circle");
                    $(this).parents("tbody").find(".fa-plus-circle").addClass("fa-minus-circle");
                });
            });
  </script>


</body>


</html>