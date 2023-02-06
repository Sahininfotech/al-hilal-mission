<?php
require_once './_config/dbconnect.php';
require_once './classes/institutedetails.class.php';
$Institute = new  InstituteDetails();

?>
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 footer-contact">
            <!-- <h3>Al-Hilal Mission</h3> -->
            <a href="index.php" class="logo me-auto"><img src="assets/img/school/1mg12.jpg" style="width: 210px;"
                alt="" class="img-fluid"></a>
          </div>
          <?php
          $instData = $Institute->instituteShow();
            foreach($instData as $row){
                               
        ?>
          <div class="col-lg-3 col-md-6 footer-contact">
            <h4 class="fs-6">Address</h4>
            <p><?php echo $row['address']  ?><br><br>
              <strong>Phone:</strong> <?php echo $row['contact_number']  ?><br>
              <strong>Email:</strong> <?php echo $row['email']  ?><br>
            </p>
          </div>
          <?php
                 }
                 ?>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="https://www.india.gov.in/topics">India.gov.in</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Main Menu</h4>
            <ul>

              <li><i class="bx bx-chevron-right"></i> <a href="trainers.php">Teachers</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="careers.php">Career</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="gallery.php">Gallery</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="about.php">About</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contact.php">Contact</a></li>

            </ul>
          </div>

          <!-- <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div> -->

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Al-Hilal Mission</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
          <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
  <script>
    const queryModal = () => {
      document.getElementById('header').classList.remove("fixed-top");

      let url = 'require/query.ajax.php';
      $(".query-modal-body").html('<iframe width="99%" height="410px" frameborder="0" allowtransparency="true" src="' + url + '"></iframe>')
    }

    const closeModal = () => {

      document.getElementById('header').classList.add("fixed-top");

    }
    </script>