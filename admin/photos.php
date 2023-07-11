<?php

session_start();

$page = "photos";

if (!isset($_SESSION['user_name']) && !isset($_SESSION['loggedin']) ) {

    header("Location: login.php");
  
    exit;
  
  }

require_once '../_config/dbconnect.php';

require_once '../classes/vendor.class.php';

require_once '../classes/admin.class.php';

require_once '../classes/utility.class.php';

require_once '../classes/gallery.class.php';

require_once '../includes/constant.php';



$Utility   = new Utility(); 

$Admin     = new Admin();

$Photos = new  Photos();

$Photoresult=$Photos->displaydata();

$_SESSION['current-url'] = $Utility->currentUrl();

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8" />

    <meta content="width=device-width, initial-scale=1.0" name="viewport" />



    <title>Gallery - <?php echo SITE_NAME; ?></title>

    <meta content="" name="description" />

    <meta content="" name="keywords" />

    <?php require_once 'require/headerLinks.php';?>

    <style>
    .addnewbtncss {

        margin: auto;

        display: flex;

        align-items: center;

        margin-right: 1rem;

        margin-top: -3rem;



    }

    @media (min-width:150px) and (max-width:359px) {

        .addnewbtncss {

            margin: 0rem;

            display: flex;

            align-items: center;

            margin-right: 0rem;

            margin-top: -1rem;

        }

    }


    /* ============== photos ============== */


    .gallery .gallery-items .item.hide {
        display: none;
    }

    .gallery .gallery-items .item.show {
        display: block;
        animation: show .5s ease;
    }

    @keyframes show {
        0% {
            opacity: 0;
            transform: scale(0.9);
        }

        100% {
            opacity: 1;
            transform: scale(1);
        }
    }


    .gallery .gallery-items .item img {
        width: 100%;
        display: block;
    }

    .gallery .gallery-items .item .caption {
        position: absolute;
        /* left: 0px; */
        bottom: -6px;
        background-color: rgba(0, 0, 0, .5);
        padding: 10px;
        width: 96%;
        color: #ffffff;
        text-align: center;
    }

    .gallery .pagination {
        width: 100%;
        float: left;
        padding: 15px;
        text-align: center;
    }

    .gallery .pagination div {
        display: inline-block;
        margin: 0 10px;
    }

    .gallery .pagination .page {
        color: gray;
    }

    .gallery .pagination .prev,
    .gallery .pagination .next {
        color: #000;
        border: 1px solid #000;
        font-size: 15px;
        padding: 7px 15px;
        cursor: pointer;
    }

    .gallery .pagination .prev.disabled,
    .gallery .pagination .next.disabled {
        border-color: gray;
        color: gray;
        pointer-events: none;
    }

    .gallery-items {
        columns: 4 200px;
        column-gap: 0.5rem;
        width: 95%;
        margin: 0 auto;
    }

    .item {

        margin: 0 1.5rem 1.5rem 0;
        display: inline-block;
        /* border: solid 2px black; */
        padding: 5px;
        /* box-shadow: 5px 5px 5px rgba(0,0,0,0.5); */
        /* transition: all .25s ease-in-out; */

        float: left;
        width: 100%;
        position: relative;
    }

    .grid-item {
        width: 100%;
        /* filter: grayscale(100%); */
        /* border-radius: 5px; */
        margin-bottom: -0.7rem;
        /* transition: all .25s ease-in-out; */
    }
    </style>

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

            <h1>Gallery</h1>

            <nav>

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                    <li class="breadcrumb-item active">Gallery</li>

                </ol>

            </nav>

        </div>

        <!-- End Page Title -->

        <!-- table start -->

        <!-- Sales Card -->

        <!-- date-selector end -->

        <section class="section dashboard">

            <div class="col-lg-12">

                <div class="card recent-sales overflow-auto">

                    <div class="card-body">

                        <h5 style="padding: 20px 0 5px 0;

                        font-size: 30px;

                       font-weight: 500;

                       color: #012970;

                       font-family: 'Poppins', sans-serif">Gallery </h5>

                        <!-- Button trigger modal -->



                        <button type="button" class="btn btn-primary mb-4 addnewbtncss" data-bs-toggle="modal"
                            data-bs-target="#addphotosModal" onclick="addphoto();">

                            Add New Photos

                        </button>



                        <!-- Modal -->

                        <div class="modal fade" id="addphotosModal" tabindex="-1" aria-labelledby="addphotosModalLabel"
                            aria-hidden="true">

                            <div class="modal-dialog modal-lg">

                                <div class="modal-content">

                                    <div class="modal-header">

                                        <h5 class="modal-title" id="addphotosModalLabel">

                                            Photo Add Forms

                                        </h5>

                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>

                                    </div>

                                    <div class="modal-body photos-modal-body">

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- modal end -->
                        <!-- <section> -->
                        <section class="gallery">
                            <div class="container">
                                <!-- <div class="title">
                            <h1>Gallery</h1>
                            </div> -->
                                <div class="gallery-items">
                                    <?php 
                                     $i=1;
                                    foreach ($Photoresult as $showphoto) {
                                    $showphotos = $showphoto['photos'];
                                    $showid     = $showphoto['id'];
                                    $img            = "../admin/image/".$showphotos;
                                    ?>
                                    <div class="item" style="margin: 1%;">
                                        <img class='grid-item' id="<?php echo $showid;?>" src="<?php echo $img;?>" alt="gallery"
                                            onClick="makeFullScreen(this.id)"/>
                                        <div class="caption">
                                            <a
                                                href='ajax/photodelete.ajax.php?id=<?php    echo $showid  ?>&img=<?php    echo $showphotos  ?>'>
                                                <i class="bi bi-trash" data-bs-toggle="modal"
                                                    data-bs-target="#deleteclassFormModal"
                                                    onclick="return deleteClass();"></i>
                                            </a>

                                        </div>
                                    </div>

                                    <?php  
                                     $i++; }
                                    ?>



                                </div>
                                <div class="pagination">
                                    <div class="prev">Prev</div>
                                    <div class="page">Page <span class="page-num"></span></div>
                                    <div class="next">Next</div>
                                </div>
                            </div>
                        </section>

        </section>

    </main>

    <!-- End #main -->

    <!-- ======= Footer ======= -->

    <?php require_once 'require/addfooter.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
    const addphoto = () => {

        let url = 'ajax/photoAdd.ajax.php';

        $(".photos-modal-body").html(

            '<iframe width="100%" height="340px" frameborder="0" allowtransparency="true" src="' + url +

            '"></iframe>')



    }


    const deleteform = (id) => {

        let url = 'ajax/deleteform.ajax.php?stafftype=' + id;

        $(".deleteform-modal-body").html(

            '<iframe width="99%" height="305px" frameborder="0" allowtransparency="true" src="' + url +

            '"></iframe>')



    }

    function deleteClass() {



        return confirm("Are you sure that you want to delete the Gallery Contents ?")



    };


    // <!-- image fullscreen -->

    function makeFullScreen(id) {

        var divObj = document.getElementById(id);

        //Use the specification method before using prefixed versions

        if (divObj.requestFullscreen) {

            divObj.requestFullscreen();

        } else if (divObj.msRequestFullscreen) {

            divObj.msRequestFullscreen();

        } else if (divObj.mozRequestFullScreen) {

            divObj.mozRequestFullScreen();

        } else if (divObj.webkitRequestFullscreen) {

            divObj.webkitRequestFullscreen();

        } else {

            console.log("Fullscreen API is not supported");

        }

    }

    // <!-- image fullscreen end -->
    </script>


    <script>
    const galleryItems = document.querySelector(".gallery-items").children;
    const prev = document.querySelector(".prev");
    const next = document.querySelector(".next");
    const page = document.querySelector(".page-num");
    const maxItem = 8;
    let index = 1;

    const pagination = Math.ceil(galleryItems.length / maxItem);
    console.log(pagination)

    prev.addEventListener("click", function() {
        index--;
        check();
        showItems();
    })
    next.addEventListener("click", function() {
        index++;
        check();
        showItems();
    })

    function check() {
        if (index == pagination) {
            next.classList.add("disabled");
        } else {
            next.classList.remove("disabled");
        }

        if (index == 1) {
            prev.classList.add("disabled");
        } else {
            prev.classList.remove("disabled");
        }
    }

    function showItems() {
        for (let i = 0; i < galleryItems.length; i++) {
            galleryItems[i].classList.remove("show");
            galleryItems[i].classList.add("hide");


            if (i >= (index * maxItem) - maxItem && i < index * maxItem) {
                // if i greater than and equal to (index*maxItem)-maxItem;
                // means  (1*8)-8=0 if index=2 then (2*8)-8=8
                galleryItems[i].classList.remove("hide");
                galleryItems[i].classList.add("show");
            }
            page.innerHTML = index;
        }


    }

    window.onload = function() {
        showItems();
        check();
    }
    </script>


</body>



</html>