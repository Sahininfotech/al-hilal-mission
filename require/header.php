<?php  
 require_once './_config/dbconnect.php';
 require_once './classes/classes.class.php';
 $Classes            = new Classes();

 ?>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <?php
            foreach($instData as $row){
                $showsession = $row['session'];     
        ?>

        <!-- <h1 class="logo me-auto"><a href="index.php"></a></h1> -->
        <h1 class="logo me-auto"><a href="index.php"><?php echo $row['institute_name']  ?></a></h1>

        <?php
                 }
                 ?>
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.php" class="logoimg me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>



        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="<?php if($page == "index"){echo "active";} ?>" href="index.php">Home</a></li>
                <li class="dropdown"><a class="<?php if($page == "standards"){echo "active";} ?>"
                        href="#"><span>Standard</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>

                         <div class="row" style="width: 30rem;">
                         <?php
                                                        
                                                       
                                                        $allClass = $Classes->classesList();
                                                        foreach ($allClass as $class) { 
                                                            $showclass = $class['id'];
                                                          
                                                            $showclassdtl = "standards.php?class=". $showclass."&session=".$showsession;
                                                            
                                                            echo ' <div class="col-lg-4 col-md-6">
                                                         <li><a href="'.$showclassdtl.'"><span> Standards '.$class['id'].'</span> </a></li>
                                                        </div>';
                           
                                                    }
                                                ?>
                                                    </div>






                    </ul>
                </li>
                <li><a class="<?php if($page == "teachers"){echo "active";} ?>" href="trainers.php">Teachers</a></li>
                <li><a class="<?php if($page == "events"){echo "active";} ?>" href="events.php">Events</a></li>
                <li><a class="<?php if($page == "gallery"){echo "active";} ?>" href="gallery.php">Gallery</a></li>
                <li><a class="<?php if($page == "about"){echo "active";} ?>" href="about.php">About</a></li>
                <li><a class="<?php if($page == "contact"){echo "active";} ?>" href="contact.php">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <a class="get-started-btn  " data-bs-toggle="modal" data-bs-target="#queryModal"
            onclick="queryModal()">Admission Query
        </a>


    </div>
</header>
<!-- End Header -->

<div class="modal fade" id="queryModal" tabindex="-1" aria-labelledby="queryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    onclick="closeModal()"></button>
            </div>
            <div class="modal-body query-modal-body">

            </div>
        </div>
    </div>
</div>