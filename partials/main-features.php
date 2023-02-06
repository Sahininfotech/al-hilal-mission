<?php  
 require_once './_config/dbconnect.php';
 require_once './classes/classes.class.php';
 $Classes            = new Classes();
 ?>
<section id="features" class="features">
   <div class="container" data-aos="fade-up">
               <div class="row" data-aos="zoom-in" data-aos-delay="100">
                      
    <?php 
        $allClass = $Classes->classesList();
        foreach ($allClass as $class) { 
        $showclass = $class['id'];

        $showclassdtl = "standards.php?class=". $showclass."&session=".$showsession;
            
     echo' <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                            <h3><a href="'.$showclassdtl.'">'.$class['id'].' Standard </a></h3>
                        </div>
                    </div>';
                } 
               ?>

                </div>
            </div>
    <!-- <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                        <div class="icon-box">
                            <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                            <h3><a href="standards.php">2 Standard </a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                        <div class="icon-box">
                            <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                            <h3><a href="standards.php">3 Standard </a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
                        <div class="icon-box">
                            <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                            <h3><a href="standards.php">4 Standard </a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                            <h3><a href="standards.php">5 Standard </a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                            <h3><a href="standards.php">6 Standard </a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                            <h3><a href="standards.php">7 Standard </a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                            <h3><a href="standards.php">8 Standard </a></h3>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                            <h3><a href="standards.php">9 Standard </a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                            <h3><a href="standards.php">10 Standard </a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                            <h3><a href="standards.php">11 Standard </a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                            <h3><a href="standards.php">12 Standard </a></h3>
                        </div>
                    </div> -->

</section>