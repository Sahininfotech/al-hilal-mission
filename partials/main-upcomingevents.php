<section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Events</h2>
            <p>Up Coming Events</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            <?php  
            $count = 1;
            $event 	= $Events->getEvent();  
            foreach ($event as $showdata) {

            $showname        = $showdata['event_name'];

            $showdate        = $showdata['event_date'];

            $datetring       = date("l jS \of F Y", strtotime($showdate));

            $eventdate       = date("Ymd", strtotime($showdate));

            $showtime        = $showdata['event_time'];

            $showdescription = $showdata['description'];

            $showphotos      = $showdata['image'];

            $img             = "./admin/image/".$showphotos;

            $currentdate     = date("Ymd");

           if($currentdate <= $eventdate){
                $count--;
            echo '<div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="course-item">
                <img src='.$img.' class="img-fluid" alt="..." style="height: 18rem !important; width: 26rem;">
                <div class="course-content">
                    <h3><a href="events.php">'.$showname.'</a></h3>
                    <p>'.$datetring.'<br>
                        '.$showdescription.'</p>
                </div>
            </div>
        </div>';

           }
        else{
            echo"";
         }                     
         }
         if($count == 1){
            
       echo ' <div class="card col-md-4 d-flex">
            <div class="card-body">
                <h5 class="card-title" style="color: #5fcf80;">There Are No Upcoming Events At This Time</h5>                        
            </div>
        </div>';
          }
            ?>


            <!-- End Independent's Day-->
            <!-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                <div class="course-item">
                    <img src="assets/img/school/eid.jpg" class="img-fluid" alt="...">
                    <div class="course-content">
                        <h3><a href="events.php">Eid-Al_Adha</a></h3>
                        <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae
                            dolores dolorem
                            tempore.</p>
                    </div>
                </div>
            </div> -->
            <!-- End Eid-al-Adha-->
            <!-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                <div class="course-item">
                    <img src="assets/img/school/gandhi.jpg" class="img-fluid" alt="...">
                    <div class="course-content">
                        <h3><a href="events.php">Gandhi Jayanti</a></h3>
                        <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae
                            dolores dolorem
                            tempore.</p>
                    </div>
                </div>
            </div> -->
            <!-- End gandhi jayanytri-->
        </div>

    </div>
</section>