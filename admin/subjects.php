<?php
session_start();

$page = "Subjects";



require_once '../_config/dbconnect.php';

require_once '../classes/admin.class.php';

require_once '../classes/institutedetails.class.php';

require_once '../classes/utility.class.php';

require_once '../includes/constant.php';





$Utility            = new Utility();

$Admin              = new Admin();

$InstituteDetails   = new  InstituteDetails();





$_SESSION['current-url'] = $Utility->currentUrl();



if (!isset($_SESSION['user_name']) && !isset($_SESSION['loggedin']) ) {

  header("Location: login.php");

  exit;

}





?>



<!DOCTYPE html>



<html lang="en">







<head>



    <meta charset="utf-8" />



    <meta content="width=device-width, initial-scale=1.0" name="viewport" />







    <title>Institute Management / Subjects - <?php echo SITE_NAME; ?></title>



    <meta content="" name="description" />



    <meta content="" name="keywords" />







    <?php require_once 'require/headerLinks.php';?>





<style>

    .subaddnewbtn{

      margin: auto;

      display: flex;

     align-items: center;

     margin-right: 1rem;

     margin-top: -3rem;

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

            <h1>Subjects</h1>

            <nav>

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                    <li class="breadcrumb-item">Institute Management</li>

                    <li class="breadcrumb-item active">Subjects</li>

                </ol>

            </nav>

        </div>

        <!-- page title end -->



        <section class="section dashboard">

            <div class="row m-0">

                <div class="col-lg-12 p-0">

                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">

                            <h5 class="card-title ">Subjects </h5>

                            <!-- Button trigger modal -->

                            <button type="button" class="btn btn-primary mb-4 subaddnewbtn" data-bs-toggle="modal" data-bs-target="#subjectFormModal" onclick="addSubject();">  Add New   </button>

                            <!-- Modal -->

                            <div class="modal fade" id="subjectFormModal" tabindex="-1"

                                aria-labelledby="subjectFormModalLabel" aria-hidden="true">

                                <div class="modal-dialog modal-lg">

                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <button type="button" class="btn-close" data-bs-dismiss="modal"

                                                aria-label="Close"></button>

                                        </div>

                                        <div class="modal-body subjectForm-modal-body">

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!-- modal end -->

                            <?php

                       $subject = $InstituteDetails->subjectdisplaydata();

                ?>

                            <table class="table datatable">

                                <thead>

                                    <tr>

                                        <th scope="col">S.No</th>

                                        <th scope="col">Subject</th>

                                        <th scope="col">Class</th>

                                        <th scope="col">Description</th>

                                        <th scope="col">Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                <?php
                                 $i=1;
                              $subject=$InstituteDetails->subjectdisplaydata();



                              foreach($subject as $row){



                                



                            ?>







                                    <tr>



                                        <th scope="row"><?php    echo $i  ?></th>



                                        <td><?php    echo $row['subject']  ?></td>



                                        <td><?php    echo $row['class_id']  ?></td>



                                        <td><?php    echo $row['description']  ?></td>



                                        <td>



                                            <i class="bi bi-eye-fill pe-2" data-bs-toggle="modal"



                                                data-bs-target="#editFormModal" id="<?php    echo $row['id']  ?>"



                                                onclick="edit(this.id);"></i>







                                            <a href='ajax/subject-delete.php?id=<?php echo $row['id']  ?>'>

                                                <i class="bi bi-trash" onclick="return deleteSubject();"></i>

                                            </a>



                                        </td>



                                    </tr>



                                    <?php

                                       $i++;

                                            } ?>



                                </tbody>



                            </table>



                            <!-- End Table with stripped rows -->



                        </div>



                    </div>



                </div>



            </div>



        </section>







        <!-- table End -->



    </main>



    <!-- End #main -->







    <!-- ======= Footer ======= -->



    <?php require_once 'require/addfooter.php'; ?>







    <!-- Modal -->



    <div class="modal fade" id="editFormModal" tabindex="-1" aria-labelledby="editFormModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>



                <div class="modal-body edit-modal-body">



                </div>

            </div>

        </div>

    </div>



    <!-- modal end -->




    <script>



    function deleteSubject() {



        return confirm("DO YOU REALLY WANT TO DELETE THIS SUBJECT CONTENTS ?")



    };



    </script>











    <script src="https://code.jquery.com/jquery-3.6.0.js"



        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>



    <script>



    const addSubject = () => {



        let url = 'ajax/subject-add.ajax.php';



        $(".subjectForm-modal-body").html(



            '<iframe width="99%" height="370px" frameborder="0" allowtransparency="true" src="' + url +



            '"></iframe>')







    }



    const edit = (id) => {



        let queryString = encodeURI(id);

        let url = `ajax/subject-update.ajax.php?data=${queryString}`;



        $(".edit-modal-body").html(



            '<iframe width="99%" height="333px" frameborder="0" allowtransparency="true" src="' + url +



            '"></iframe>')







    }



 



    </script>



</body>







</html>