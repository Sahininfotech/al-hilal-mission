<!DOCTYPE html>
<html lang="en">

<?php  
require_once '../includes/constant.php';
require_once '../classes/contact.class.php';
$Contact              = new Contact();
$contactmessage       = $Contact->searchdata();
$qurymessage          = $Contact->searchquerydata();
?>

<header id="header" class="header fixed-top d-flex align-items-center">
    <style>
    .searchbars {
        width: 23%;
        max-height: 22rem;
        overflow: auto;
        /* overflow-y: scroll; 
        overflow-x: scroll; */
        text-align: center;
        box-shadow: 0 0.4rem 1rem rgb(0 1 1 / 31%);
        cursor: pointer;
        position: absolute;
        background-color: #f3f3f3 !important;
        /* border-radius: 2%; */
        /* margin-top: 27rem; */
        /* box-shadow: 0 0.4rem 1rem rgb(29 53 53 / 31%); */
        /* box-shadow: 0px 0rem 1rem rgb(8 27 35 / 31%); */

    }

    .searchbars::-webkit-scrollbar {
        display: none;
        /* for Chrome, Safari, and Opera */
    }

    @media (max-width: 1175px) {
        .header .search-form button {

            margin-left: 16px;
            width: 54%;
        }
    }

    .arrow-up {
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        display: none;
        border-bottom: 5px solid white;
    }

    /* @media (max-width: 1175){
.header .ss {
    margin-right: 57rem;
}} */
    </style>


    <div class="d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
            <img src=<?php echo FAVICON_LINK_LOGO; ?> alt="">
            <span class="d-none d-lg-block"><?php echo SITE_NAME; ?></span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="student-profile.php">
            <input type="hidden" class="form-control" name="student_id" id="student_id" required>
            <input type="text" class="search-main-finding" name="query" id="search" onkeyup="searchItem(this.value)"
                autocomplete="off" placeholder="Search" title="Enter searchs keyword">
            <button type="submit" name="submit" id="search" title="Searchs"><i class="bi bi-search ss"></i></button>
            <div class="arrow-up position-absolute top-100 start-25" id="tabledatas"></div>
            <button id="table-data"
                class="searchbars position-absolute top-100 start-25 rounded my-custom-scrollbar my-custom-scrollbar-primary"
                type="submit" name="submit">
            </button>
            <!-- <div class="s-popover--arrow" style="position: absolute; left: 0px; transform: translate(352px, 0px);" ></div> -->
        </form>
    </div>
    <!-- End searchbar  form ta upora jaba r button ta div hoba -->


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

                    <span class="badge bg-primary badge-number"><?php if (count($qurymessage) == 0 ) { echo "0";}
                    
                    if (count($qurymessage)>=1 ) { echo count($qurymessage);} ?></span>

                </a><!-- End Notification Icon -->



                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">

                    <li class="dropdown-header">

                        You have <?php if (count($qurymessage) == 0 ) { echo "0";}
                    
                    if (count($qurymessage)>=1 ) { echo count($qurymessage);} ?> new notifications

                        <a href="admissionMess.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View
                                all</span></a>

                    </li>


                    <li>

                        <hr class="dropdown-divider">

                    </li>

                    <?php         
                    if ($qurymessage == 0) {
                    echo "No data Type Avilable.";
                    }else{
                    foreach ($qurymessage as $datahow) {
                    $showname                 = $datahow['name'];
                    $showdescription          = $datahow['description'];
                    $showgurdian_name         = $datahow['gurdian_name'];
                    $showemail                = $datahow['email_id'];
                    $showdate                 = $datahow['added_on'];
                    $showid                   = $datahow['id'];
                    $datetring = date("d M, Y h:i A", strtotime($showdate));
                
                    ?>
                    <a href="viewadmissionquery.php?message=<?php    echo $showid;  ?>&approved=1" style="color: #444444;">
                        <li class="notification-item">



                            <i class="bi bi-chat-dots text-warning"></i>

                            <div>

                                <h4><?php  echo $showname;              ?></h4>

                                <p><?php  echo $datetring;        ?></p>

                            </div>



                        </li>
                    </a>


                    <li>

                        <hr class="dropdown-divider">

                    </li>

                    <?php } }?>
                    <li class="dropdown-footer">

                        <a href="admissionMess.php">Show all notifications</a>

                    </li>



                </ul><!-- End Notification Dropdown Items -->



            </li><!-- End Notification Nav -->



            <li class="nav-item dropdown">



                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">

                    <i class="bi bi-chat-left-text"></i>

                    <span class="badge bg-success badge-number"><?php if (count($contactmessage) == 0 ) { echo "0";}
                    
                    if (count($contactmessage)>=1 ) { echo count($contactmessage);}?></span>

                </a><!-- End Messages Icon -->



                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">

                    <li class="dropdown-header">

                        You have <?php if (count($contactmessage) == 0 ) { echo "0";}
                    
                    if (count($contactmessage)>=1 ) { echo count($contactmessage);} ?> new messages

                        <a href="message_show.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View
                                all</span></a>

                    </li>

                    <li>

                        <hr class="dropdown-divider">

                    </li>

                    <?php         
                    if ($contactmessage == 0) {
                    echo "No data Type Avilable.";
                    }else{
                    foreach ($contactmessage as $datashow) {
                        $showname          = $datashow['name'];
                        $showemail         = $datashow['email'];
                        $showsubject       = $datashow['subject'];
                        $showmessage       = $datashow['message'];
                        $showstatus        = $datashow['status'];
                        $showadded_on      = $datashow['date'];
                        $showid            = $datashow['id'];
                        $datetring = date("d M, Y h:i A", strtotime($showadded_on));
                    ?>

                    <li class="message-item">

                        <a href="viewmessage.php?message=<?php    echo $showid;  ?>&approved=1">

                            <img src="#" alt="" onerror="this.src='assets/img/user.jpg';" class="rounded-circle">

                            <div>

                                <h4><?php  echo $showname;        ?></h4>

                                <p><?php  echo $showsubject;      ?></p>

                                <p><?php  echo $datetring;        ?></p>

                            </div>

                        </a>

                    </li>

                    <li>

                        <hr class="dropdown-divider">

                    </li>

                    <?php }} ?>

                    <li class="dropdown-footer">

                        <a href="message_show.php">Show all messages</a>

                    </li>



                </ul><!-- End Messages Dropdown Items -->



            </li><!-- End Messages Nav -->



            <li class="nav-item dropdown pe-3">



                <?php

                $adminDtl = $Admin->getAdmin($_SESSION['user_name']);

                foreach ($adminDtl as $admin) {

                $adminName  = $admin['name'];
                $Profile_image  = $admin['Profile_image'];
                $img            = "image/".$Profile_image;
                $imgs            = "'assets/img/user.jpg'";
                // $adminRole = $admin['profession'];

             

                echo' <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

                <img src="'.$img.'"  alt="" onerror="this.src='.$imgs.';"  class="rounded-circle">

                    <span class="d-none d-md-block dropdown-toggle ps-2">'. $adminName.'</span>

                </a>



                

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

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

                        <a class="dropdown-item d-flex align-items-center" href="../admin/require/logout.php">

                            <i class="bi bi-box-arrow-right"></i>

                            <span>Sign Out</span>

                        </a>

                    </li>



                </ul>';

            }

            ?>

                <!-- End Profile Dropdown Items -->

            </li><!-- End Profile Nav -->



        </ul>

    </nav><!-- End Icons Navigation -->



    <script type="text/javascript">
    function searchItem(searchFor) {



        var searchword = $('#search').val();

        $.ajax({



            url: "ajax/studentsearch-list.ajax.php",



            type: "POST",



            data: {



                search: searchFor



            },



            success: function(data) {



                $("#table-data").html(data);



            }



        });



        if (searchword.length == 0) {



            document.getElementById("table-data").style.display = "none";



        } else {



            document.getElementById("table-data").style.display = "block";



        }

        if (searchword.length == 0) {

            document.getElementById("tabledatas").style.display = "none";

        } else {

            document.getElementById("tabledatas").style.display = "block";

        }

    };
    </script>

    <script>
    const selectdata = (t) => {



        let className = document.getElementById(t.id).childNodes[1];



        let roll = document.getElementById(t.id).childNodes[3];



        let name = document.getElementById(t.id).childNodes[5];



        let gurdian = document.getElementById(t.id).childNodes[7];



        let student_id = document.getElementById(t.id).childNodes[9];



        if (window.getComputedStyle(student_id).visibility === "hidden") {



            student_id.style.visibility = "visible";



        }



        // let total_amount = document.getElementById(t.id).childNodes[11];



        // // console.log(total_amount);



        // if (window.getComputedStyle(total_amount).visibility === "hidden") {



        //     total_amount.style.visibility = "visible";



        // }



        // let total_due = document.getElementById(t.id).childNodes[13];



        // if (window.getComputedStyle(total_due).visibility === "hidden") {



        //     total_due.style.visibility = "visible";



        // }

        // let total_due = document.getElementById(t.id).childNodes[13];



        // if (window.getComputedStyle(total_due).visibility === "hidden") {



        //     total_due.style.visibility = "visible";



        // }

        // var xx = document.getElementById("total_due");



        // console.log(student_id);



        document.getElementById("search").value = name.innerText;

        // document.getElementById("table-data").style.display = "none";

        document.getElementById("student_id").value = student_id.innerText;

        document.getElementById("table-data").style.display = "none";
        document.getElementById("tabledatas").style.display = "none";


        // var xmlhttp = new XMLHttpRequest();

    }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



</header>





</html>