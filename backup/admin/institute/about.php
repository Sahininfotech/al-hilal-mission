<?php
$page = "about";

require_once './_config/dbconnect.php';
require_once './classes/institutedetails.class.php';
$Institute = new  InstituteDetails();

$instData = $Institute->instituteShow();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>About - Mentor Bootstrap Template</title>
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


  <style>
    .top-side-content-banner {
        background-image: url('assets/img/school/bg.jpg');
        background-size: 1392px 260px;
        background-repeat: repeat;
        padding: 25px 0;

    }
    </style>
</head>

<body>


    <!--======== Header start ========-->
    <?php require_once 'require/header.php'; ?>
    <!--======== Header End ========-->

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>About Us</h2>
                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas
                    sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="row pb-0">
                    <div class="col-lg-6 order-1 order-lg-2 pb-0" data-aos="fade-left" data-aos-delay="100">
                        <img src="assets/img/about.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content pb-0">
                        <h3>আবেদন</h3>
                        <p class="fst-italic ">
                            আস-সালামুআলাইকুম, <br>বিসমিল্লাহির রহমানির রহিম <br> সমস্ত প্রশংসা সেই অশেষ করুনাময় মহান
                            স্রটা আল্লাহ রব্বুল আলামিনের, যিনি সকল বিদ্যোৎসায়ী আর বিচক্ষণ মানুষের ভিড়ে জাতি-ধর্ম-বর্ণ
                            নির্বিশেষে বিজ্ঞানের পরীক্ষালব্ধ জ্ঞান চর্চা ও নীতি চর্চার এক আদর্শ পীঠস্থান আল-হিলাল মিশন
                            এর মত শিক্ষার তীর্থস্থান রচনা করার তৈফিক দান করেছেন। আল্লাহর নবী (সঃ) বলেন জ্ঞান মুসলমানদের
                            হারানো নিধি, যেখানে পাও সেখানেই কুড়িয়ে নাও। তাই ১৯৯৯ সালে উত্তর ২৪ পরগনা বারাসাত এর
                            কদমগাছিতে খোলা আকাশের নিচে এলাকার কিছু বুদ্ধিজীবি, বিদ্যোৎসাহী ও দানশীল মানুষের প্রচেষ্ঠায়
                            পলিথিন ছাওয়া ঘরে শুরু হয় কর্মযজ্ঞ। আজ তার ব্যপ্তি সাগর থেকে পাহাড় পর্যন্ত। শুধু সেখানেই
                            থেমে থাকেনি বাকুড়া, পুরুলিয়া, কোচবিহার, বীরভূম, উত্তর দিনাজপুর ও দক্ষিণ দিনাজপুরের
                            প্রত্যন্ত গ্রামের কোণ থেকে তুলে আনা হয়েছে অনেক রত্নকে যারা আজ ডাক্তারী, ইঞ্জিনিয়ারিং,
                            প্রফেসর আধিকারিক এবং আরো বিভিন্ন স্তরে উন্নীত হয়ে সমাজকে দিশা দেখাচ্ছে। আর্থিক স্বচ্ছলতার
                            অভাবে যারা দু'বেলা অন্ন জোগাড় করতেই ব্যতিব্যস্ত তাদের মেধা সম্পন্ন সন্তানেরা পরিবেশ ও
                            পরিচর্যার অভাবে যাতে হারিয়ে না যায় তাদের জন্য আল-হিলাল মিশন একটি সুন্দর ভবিষ্যৎ গঠনে
                            অঙ্গীকার বদ্ধ।

                        </p>
                    </div>
                    <div class="col-lg-12  pt-lg-0 order-3 order-lg-3 content">
                        <p> আমরা অত্যন্ত গর্বিত এবং আনন্দিত যে বর্তমান রাজ্য সরকার এই এই প্রচেষ্টার স্বীকৃতি স্বরূপ
                            Non-financial Aided শিক্ষা প্রতিষ্ঠান মর্যাদা দান করেছেন যার মেমো নং ২৮৩/১০এম ৯৩/২০১৩ তাং
                            ১৯/০৩/২০১৩।
                            আমাদের এই পর্বত প্রমাণ কর্মযজ্ঞে আলহাজ্ব মোস্তাক হোসেন, আলহাজ্ব শাহাজান বিশ্বাস, আলহাজ্ব এম.
                            খলিল, আলহাজ্ব এম.এ. রসিদ, মরহুম আলহাজ্ব আশরাফ আলী, আলহাজ্ব আলমগীর ফকির, আলহাজ্ব আবুল খায়ের
                            চৌধুরী, আলহাজ্ব একরামূল, আব্দুর রহমান, জনাব আরসাদুজ্জামান, ওসমান সাহেব ও আরো অনেক দানশীল
                            মানুষ (যারা নাম প্রকাশে অনিচ্ছুক) তাদের কাছে আমরা বর্ণী ও চিরকৃতজ্ঞ। শিক্ষার ব্যাপারে
                            পরামর্শ দানে প্রয়াত পার্থ সেনগুপ্ত, প্রয়াত শ্রী প্রবীর ভট্টাচার্য, আব্দুর রউফ, ডাক্তার
                            শামসুল ইসলাম, শ্রী অশোক গুহ, জিয়াউল হক, শহিদুল ইসলাম, সামসুল আলম, আলহাজ্ব লোকমান হাকিম,
                            জনাব শাহাবুদ্দিন, জনাব আমজাদ হোসেন এনাদের কাছে আমরা ঋণী।
                            এছাড়াও কোভিড পরবর্তী পরিস্থিতিতে নবকলরবে মিশনকে সাজাতে প্রাক্তনীদের প্রয়াস অনস্বীকার্য।
                            <br> আপনারা যেভাবে আমাদের মুক্তহস্ত প্রসারিত করে অকৃপন দান, বুদ্ধি, পরামর্শ দিয়ে সবশেষে
                            আল্লাহ্ পাকের কাছে দোয়া চেয়ে আমাদের মিশন এর উত্তরোত্তর সাফল্য করে সহযোগিতা করেছেন তার জন্য
                            আমরা আল্লাহ পাকের কাছে শুকরিয়া আদায় করি ও আপনাদের প্রতি কৃতজ্ঞতা জানাই। <br> অবশেষে,
                            রহমতপূর্ন রমজান মাসে এসে গেছে, এ মাস বরকতপূর্ণ ও জাহান্নাম হতে মুক্তির মাস। এই মাসে আপনি
                            আপনার ধর্মীয় দান দুঃস্থ ও এতিম, মেধাবী, অসহায় মানুষের কল্যাণে ব্যয় করে থাকেন। আল-হিলাল
                            মিশন এক প্রতিষ্ঠান যেখানে বহু ছাত্র-ছাত্রী এই পর্যায়ের। এবছর আমাদের মোট ছাত্র-ছাত্রীর ৪০% ই
                            অর্দ্ধব্যায়ে বা তার চেয়ে কম বেতনে পড়াশোনা করে। তাই আপনাদের মুক্তহস্ত প্রসারিত করে
                            অন্যান্য বছরের ন্যায় এবছরও আমাদের Poor Fund এ ধর্মীয় দান করতে অনুরোধ করছি। আপনাদের দেওয়া
                            দান সঠিক পথেই ব্যয়িত হবে ইনশাআল্লাহ। যাদের উদ্দেশ্যে এই দান তাদের সামগ্রীক মানোন্নয়নের
                            সাথে সাথে তারা যেন দেশ, জাতি, সমাজ ও ইসলামের খেদমত করে মানুষকে প্রকৃত পথের দিশা দেখাতে পারে।
                            আল্লাহ আমাদের এই দোয়া কবুল করুন (আমিন) <br> আল্লাহ হাফেজ <br>বিনীত শাহাবুদ্দিন গাইন
                            <br>সাধারন সম্পাদক, আল- হিলাল মিশন</p>
                    </div>
                </div>

            </div>
        </section>
        <!-- End About Section -->

        <div class="container mb-5">
            <div class="top-side-content-banner ">
                <div class="container ">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-sm-6 col-md-8">
                            <h2 class=" comingupevents text-uppercase fs-1">#Up Coming Events</h2>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-md-4 comingupevents ">
                            <a href="events.php">
                                <button type="button" class="divider_button  fs-5" name="button">Join Now <i
                                        class="mua bi bi-arrow-right ps-2"></i></button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- End 222 Section -->
        <!-- ======= Testimonials Section ======= -->
        <!-- <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>What are they saying</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Saul Goodman</h3>
                  <h4>Ceo &amp; Founder</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Designer</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Jena Karlis</h3>
                  <h4>Store Owner</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                  <h3>Matt Brandon</h3>
                  <h4>Freelancer</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                  <h3>John Larson</h3>
                  <h4>Entrepreneur</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section> -->
        <!-- End Testimonials Section -->

    </main><!-- End #main -->

    <!--======== Footer Start ========-->
    <?php require_once 'require/footer.php'; ?>
    <!--======== Footer End ========-->

    <div id="preloader"></div>
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

</body>

</html>