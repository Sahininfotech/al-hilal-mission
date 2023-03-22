<?php
$page = "index";

require_once './_config/dbconnect.php';
require_once './classes/institutedetails.class.php';
require_once 'includes/constant.php';
require_once './classes/notice.class.php';
require_once './classes/events.class.php';

$Institute = new  InstituteDetails();

$Notice     = new Notice();

$Events    = new Event();

$instData = $Institute->instituteShow();

?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">



    <title>Best School In Barasat West Bengal | <?php echo SITE_NAME; ?></title>

    <meta content="" name="description">

    <meta content="" name="keywords">



    <!-- Favicons -->

    <link href=<?php echo FAVICON_LINK; ?> rel="icon">

    <link href=<?php echo FAVICON_LINK_A; ?> rel="apple-touch-icon">



    <!-- Google Fonts -->

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">



    <!-- Vendor CSS Files -->

    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">

    <!-- <link href="assets/vendor/aos/aos.css" rel="stylesheet"> -->

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

    <!-- <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->



    <!-- Template Main CSS File -->

    <link href="assets/css/style.css" rel="stylesheet">

    <link href="assets/css/index.notice.css" rel="stylesheet">



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

    <?php require_once 'partials/mian-banner.php'; ?>

    <!-- ======= Hero Section ======= -->



    <!-- End Hero -->



    <main id="main">



        <!-- ======= About Section ======= -->

        <section id="about" class="about">

            <div class="container" data-aos="fade-up">



                <div class="row">

                    <div class="col-lg-4 col-12 about-right clearfix order-1 order-lg-2" data-aos="fade-left"
                        data-aos-delay="100">

                        <div class="about-right-innner clearfix">

                            <div class="notice-bar-heading clearfix">Notice Board </div>

                            <div class="noticebar-content clearfix">

                                <marquee behavior="scroll" direction="up" onmouseover="this.stop();"
                                    onmouseout="this.start();" scrolldelay="150">

                                    <?php
                                    $limit = "5";
                                    $result = $Notice->noticedisplay($limit);
                                    $i=1;
                                    if (count($result) > 0) {
                                    foreach($result as $row){
                                    $showid = $row['id'];
                                    $showdate = $row['date'];
                                    $datetring = date("d M, Y", strtotime($showdate));
                                    $shownotice = $row['notice'];
                                    $showsubject = $row['subject'];
                                    ?>

                                    <div class="hmenoticesec">

                                        <a class="colorforatag"
                                            href="./admin/notice-pdf-report.php?id=<?php echo $showid; ?>"
                                           ><?php echo $i; ?>.
                                            <?php echo $showsubject; ?>
                                        </a>

                                        <p class="fontsizefordate">Posted on: <?php echo $datetring; ?></p>

                                    </div>

                                    <?php $i++; }} ?>

                                </marquee>

                            </div>

                        </div>



                        <!-- <img src="assets/img/about.jpg" class="img-fluid" alt=""> -->

                    </div>

                    <div class="col-lg-8 pt-4 pt-lg-0 order-2 order-lg-1 content">

                        <h3>আবেদন</h3>

                        <p class="fst-italic">

                            আস-সালামুআলাইকুম, <br>বিসমিল্লাহির রহমানির রহিম <br> সমস্ত প্রশংসা সেই অশেষ করুনাময় মহান

                            স্রটা আল্লাহ

                            রব্বুল আলামিনের, যিনি সকল বিদ্যোৎসায়ী আর বিচক্ষণ মানুষের ভিড়ে জাতি-ধর্ম-বর্ণ নির্বিশেষে

                            বিজ্ঞানের

                            পরীক্ষালব্ধ জ্ঞান চর্চা ও নীতি চর্চার এক আদর্শ পীঠস্থান আল-হিলাল মিশন এর মত শিক্ষার

                            তীর্থস্থান রচনা করার

                            তৈফিক দান করেছেন। আল্লাহর নবী (সঃ) বলেন জ্ঞান মুসলমানদের হারানো নিধি, যেখানে পাও সেখানেই

                            কুড়িয়ে নাও। তাই

                            ১৯৯৯ সালে উত্তর ২৪ পরগনা বারাসাত এর কদমগাছিতে খোলা আকাশের নিচে এলাকার কিছু বুদ্ধিজীবি,

                            বিদ্যোৎসাহী ও

                            দানশীল মানুষের প্রচেষ্ঠায় পলিথিন ছাওয়া ঘরে শুরু হয় কর্মযজ্ঞ। আজ তার ব্যপ্তি সাগর থেকে

                            পাহাড় পর্যন্ত।

                            শুধু সেখানেই থেমে থাকেনি বাকুড়া, পুরুলিয়া, কোচবিহার, বীরভূম, উত্তর দিনাজপুর ও দক্ষিণ

                            দিনাজপুরের

                            প্রত্যন্ত গ্রামের কোণ থেকে তুলে আনা হয়েছে অনেক রত্নকে যারা আজ ডাক্তারী, ইঞ্জিনিয়ারিং,

                            প্রফেসর আধিকারিক

                            এবং আরো বিভিন্ন স্তরে উন্নীত হয়ে সমাজকে দিশা দেখাচ্ছে।

                            <a href="about.php" class="more-btn d-flex justify-content-center "> <button type="button"
                                    class="btn btn-outline-secondary" style="border-radius: 50px; width: 10rem;"> More

                                </button></a>

                        </p>

                    </div>

                </div>



            </div>

        </section>

        <!-- ======= About Section ======= -->

        <!-- ======= Principle Section ======= -->

        <section id="about" class="about">

            <div class="container" data-aos="fade-up">



                <div class="row">

                    <div class="col-lg-6 order-1 order-lg-1" data-aos="fade-left" data-aos-delay="100">

                        <img src="assets/img/about.jpg" class="img-fluid" alt="">

                    </div>

                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-2 content">

                        <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>

                        <p class="fst-italic">

                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut

                            labore et

                            dolore

                            magna aliqua.

                        </p>

                        <ul>

                            <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo

                                consequat.</li>

                            <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate

                                velit.</li>

                            <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo

                                consequat. Duis aute

                                irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu

                                fugiat nulla

                                pariatur.</li>

                        </ul>

                        <p>

                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in

                            reprehenderit in

                            voluptate

                        </p>



                        <a href="principle.php" class="more-btn d-flex justify-content-center"> <button type="button"
                                class="btn btn-outline-secondary" style="border-radius: 50px; width: 10rem;"> Know More

                            </button></a>





                    </div>

                </div>



            </div>

        </section>











        <!-- =======Principle Section ======= -->











        <!-- ======= Why Us Section ======= -->

        <?php require_once 'partials/main-why-us.php'; ?>

        <!-- End Why Us Section -->



        <!-- ======= Trainers Section ======= -->

        <?php require_once 'partials/main-teachers.php'; ?>

        <!-- End Trainers Section -->



        <!-- ======= Features Section ======= -->

        <?php require_once 'partials/main-features.php'; ?>

        <!-- End Features Section -->



        <!-- ======= up coming event Section ======= -->

        <?php require_once 'partials/main-upcomingevents.php'; ?>

        <!-- End up cominf event Section -->







    </main><!-- End #main -->

    <!--======== Footer Start ========-->

    <?php require_once 'require/footer.php'; ?>

    <!--======== Footer End ========-->



    <!-- <div id="preloader"></div> -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>



    <!-- Vendor JS Files -->

    <!-- <script src="assets/vendor/purecounter/purecounter.js"></script> -->

    <!-- <script src="assets/vendor/aos/aos.js"></script> -->

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- <script src="assets/vendor/swiper/swiper-bundle.min.js"></script> -->

    <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->



    <!-- Template Main JS File -->

    <script src="assets/js/main.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
         <script>
             function generatePDF() {
                 var pdf = new jsPDF({
                     orientation: 'p',
                     unit: 'mm',
                     format: 'a5',
                     putOnlyUsedFonts:true
                     });
                 pdf.text("Generate a PDF with JavaScript", 20, 20);
                 pdf.text("published on APITemplate.io", 20, 30);
                 pdf.addPage();
                 pdf.text(20, 20, 'The second page');
                 pdf.save('jsPDF_2Pages.pdf');
             }
         </script>


</body>



</html>