<?php
session_start();

$page = "Contact";


require_once '../_config/dbconnect.php';
require_once '../classes/admin.class.php';
require_once '../classes/utility.class.php';


$Utility            = new Utility();
$Admin              = new Admin();


$_SESSION['current-url'] = $Utility->currentUrl();

if (!isset($_SESSION['user_name']) && !isset($_SESSION['loggedin']) ) {
  header("Location: login.php");
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Contact - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php require_once 'require/headerLinks.php'; ?>
  
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
      <h1>Contact</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Contact</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section contact">

      <div class="row gy-4">

        <div class="col-xl-6 col-lg-6 ">

          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="info-box card">
                <i class="bi bi-geo-alt"></i>
                <h3>Address</h3>
                <p>A108 Adam Street,<br>New York, NY 535022</p>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="info-box card">
                <i class="bi bi-telephone"></i>
                <h3>Call Us</h3>
                <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="info-box card">
                <i class="bi bi-envelope"></i>
                <h3>Email Us</h3>
                <p>info@example.com<br>contact@example.com</p>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="info-box card">
                <i class="bi bi-clock"></i>
                <h3>Open Hours</h3>
                <p>Monday - Friday<br>9:00AM - 05:00PM</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-6 col-lg-6 ">
          <div class="card p-4">
            <form  method="post" class="mineform-contact needs-validation m-0"  novalidate>
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>

                <div class="col-md-12 pb-3">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <!-- <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div> -->

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div>

        </div>

      </div>

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php require_once 'require/addfooter.php'; ?>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
    </script>

</body>

</html>