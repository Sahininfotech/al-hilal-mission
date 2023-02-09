<?php
$page = "contact";

require_once './_config/dbconnect.php';
require_once './classes/institutedetails.class.php';
require_once './classes/contact.class.php';

$Contact    = new Contact();
$Institute  = new  InstituteDetails();

$instData = $Institute->instituteShow();


if ($_SERVER['REQUEST_METHOD'] == "POST") {

  if(isset ($_POST["submit"])){

    $name     = $_POST["name"];
    $email    = $_POST["email"];
    $subject  = $_POST["subject"];
    $message  = $_POST["message"];

    // $headers = $name;
    // $to = $email;
    // $subject = $subject;
    // $body = $message;
    // $subject2 = "Confirmation: Message was submitted successfully | ";  For customer confirmation
    
    // Email body I will receive
    // $message = "Cleint Name: " . $name . "\n"
    // . "Phone Number: " . $phone . "\n\n"
    // . "Client Message: " . "\n" . $_POST['message'];
    
    // Message for client confirmation
    // $message2 = "Dear" . $name . "\n"
    // . "Thank you for contacting us. We will get back to you shortly!" . "\n\n"
    // . "You submitted the following message: " . "\n" . $_POST['message'] . "\n\n"
    // . "Regards,";
    
    // Email headers
    // $headers = "From: " . $fromEmail;  Client email, I will receive
    // $headers2 = "From: " . $mailto;  This will receive client
    
    // PHP mailer function
    
    //  $result1 = mail($to, $subject, $message, $headers);  This email sent to My address
    //  $result2 = mail($fromEmail, $subject2, $message2, $headers2); This confirmation email to client
    
    //  Checking if Mails sent successfully
    
    //  if ($result1 && $result2) {
    //   echo "Your Message was sent Successfully!";
    //  } else {
    //   echo "Sorry! Message was not sent, Try again Later.";
    //  }
    
        
        

            $added = $Contact->contactInsert( $name,  $email, $subject, $message);
            if($added){
                ?>
                <script>
                alert('Your Message has been sent successfully!');
                </script>
                <?php
            }else{
                ?>
                <script>
                alert('Message Sending failed! ');
                </script>
                <?php
            }
     }
}
  
  
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Contact - Mentor Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Mentor - v4.7.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!--======== Header start ========-->
    <?php require_once 'require/header.php'; ?>
    <!--======== Header End ========-->
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Contact Us</h2>
                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas
                    sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact" style="min-height: 62vh;">


            <div class="container" data-aos="fade-up">

                <div class="row mt-5">
                    <?php
          
            foreach($instData as $row){

          ?>


                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p><?php    echo $row['address']  ?></p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p><?php    echo $row['email']  ?></p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p><?php    echo $row['contact_number']  ?></p>
                                <p><?php    echo $row['contact_number2']  ?></p>
                            </div>

                        </div>
                        <?php
                 }
                 ?>
                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">
                        <!-- <form role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" placeholder="Message"
                                    style="min-height: calc(7.6em + .75rem + 2px)" required></textarea>
                            </div>

                            <div class=" col-md-8 d-grid gap-2 d-md-flex justify-content-md-center mt-2 me-md-2">
                                <button class="text-center" name="submit" type="submit">Send Message</button>
                            </div>

                        </form> -->


                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"
                            class="mineform-contact needs-validation m-0" novalidate>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" maxlength="90" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" maxlength="100" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" maxlength="180" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" maxlength="250" rows="5"
                                    style="height: 95px;" placeholder="Message" required></textarea>
                            </div>
                            <!-- <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div> -->
                            <div class="text-center mb-5">
                                <button type="submit" name="submit" class="sendingmssg-contact mt-3">Send Message</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div data-aos="fade-up">
                <iframe style="border:0; width: 100%; height: 350px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3680.5737427243707!2d88.54400479042569!3d22.706906664934234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f8a158b9a32aa1%3A0x4e627baeae1d0c1a!2sAL-HILAL%20MISSION!5e0!3m2!1sen!2sin!4v1662030361640!5m2!1sen!2sin"
                    frameborder="0" allowfullscreen></iframe>
            </div>
        </section>
        <!-- End Contact Section -->

    </main>
    <!-- End #main -->

    <!--======== Footer Start ========-->
    <?php require_once 'require/footer.php'; ?>
    <!--======== Footer End ========-->

    <!-- <div id="preloader"></div> -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>


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