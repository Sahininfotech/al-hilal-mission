<?php  
 require_once './_config/dbconnect.php';
 require_once './classes/employee.class.php';
 require_once './classes/stadetails.class.php';
 $employees = new  Employee();
 $empRole   = new institute();
 ?>
<section id="trainers" class="trainers">
    <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            <?php  
                  $employeedata 	= $employees->empByFeaturespage("yes"); 

                  if($employeedata > 0) {

                      foreach ($employeedata as $showdata) {
                          
                        $showphotos  = $showdata['profile_image'];
                        $showname    = $showdata['name'];
                        $designation = $showdata['designation'];
                        $designation = $showdata['designation'];
                        $showid      = $showdata['id'];
                        $img         = "./admin/image/".$showphotos;

                        $displaydata = $empRole->RoledataById($designation);

                        foreach ($displaydata as $showRoledata) {
                            
                            $showRolename        = $showRoledata['designation_name'];
                            $showdescription     = $showRoledata['description'];
                            $showteacher_profile = "teacher-profile.php?id=".$showid;

                        ?>

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member">
                    <img src="<?php   echo $img ?>" class="img-fluid" alt="">
                    <div class="member-content">
                        <a href="<?php   echo $showteacher_profile ?>">
                            <h4 class="text-dark"><?php   echo $showname ?></h4>
                        </a>
                        <span><?php   echo $showRolename ?></span>
                        <p>
                            <?php   echo $showdescription ?>
                        </p>
                    </div>
                </div>

            </div>
            <?php  }
                }
            }
            ?>
            <?php
            if( count($employeedata) > 4){
                
            echo '<div class="text-center">
                    <a href="trainers.php" class="more-btn ">
                        <button type="button" class="btn btn-outline-secondary" style="border-radius: 50px;"> More Teachers </button>
                    </a>
                </div>';
            }
            
            ?>
        </div>
    </div>
</section>