<?php
session_start();
$page ="Exams";

require_once '../_config/dbconnect.php';

require_once '../classes/admin.class.php';

require_once '../classes/classes.class.php';

require_once '../classes/institutedetails.class.php';

require_once '../classes/exam.class.php';

require_once '../classes/utility.class.php';

require_once '../includes/constant.php';



$Admin              = new Admin();

$Classes            = new Classes();

$InstituteDetails   = new InstituteDetails();

$Examination        = new Examination();

$Utility                = new Utility();





$_SESSION['current-url'] = $Utility->currentUrl();



if (!isset($_SESSION['user_name']) && !isset($_SESSION['loggedin']) ) {

  header("Location: login.php");

  exit;

}





$results=$InstituteDetails->instituteShow();





?>



<!DOCTYPE html>



<html lang="en">







<head>



    <meta charset="utf-8">



    <meta content="width=device-width, initial-scale=1.0" name="viewport">







    <title>Institute Management / Examinations - <?php echo SITE_NAME; ?></title>



    <meta content="" name="description">



    <meta content="" name="keywords">







    <?php require_once 'require/headerLinks.php';?>











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

            <h1>Examinations</h1>

            <nav>

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                    <li class="breadcrumb-item">Institute Management</li>

                    <li class="breadcrumb-item active">Examinations</li>

                </ol>

            </nav>

        </div><!-- End Page Title -->

        <section class="section dashboard" style="min-height: 62vh;">

            <div class="row">

                <div class="col-lg-6">

                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">

                            <h5 class="card-title mb-0 mt-0">Examinations </h5>

                            <table class="table datatable">

                                <thead>

                                    <tr>

                                        <th scope="col">SL. NO.</th>

                                        <th scope="col">Examinations</th>

                                        <th scope="col"> Class Name</th>

                                        <th scope="col">Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php

                                    $sl = 1;

                                        $exams = $Examination->showExams();

                                        foreach($exams as $row){

                                    ?>

                                    <tr>

                                        <!-- <th scope="row"><?php    echo $row['id']  ?></th> -->

                                        <th><?php echo $sl; ?></th>

                                        <td><?php echo $row['exam_name']  ?></td>

                                        <td><?php echo $row['class_name']  ?></td>

                                        <td>

                                            <i class="bi bi-eye-fill pe-2" data-bs-toggle="modal"

                                                data-bs-target="#examFormModal" id="<?php echo $row['id']  ?>"

                                                onclick="examShow(this.id);"></i>

                                            <a

                                                href='ajax/exam-delete.ajax.php?id=<?php echo $row['id']  ?>'>

                                                <i class="bi bi-trash" data-bs-toggle="modal"

                                                    data-bs-target="#deleteexamFormModal"

                                                    onclick="return deleteexamForm();"></i></a>

                                        </td>

                                    </tr>

                                    <?php

                                    $sl++;

                                        }

                                    ?>

                                </tbody>

                            </table>

                            <!-- End Table with stripped rows -->

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="card m-0 ">

                        <div class="card-body p-3">

                            <h5 class="card-title">Add Examinations</h5>

                            <form method="POST" action="./ajax/exam.action.php" class="row needs-validation  m-0"

                                novalidate>

                                <div class="row m-0 p-0 mb-3">

                                    <label class="col-sm-4 col-form-label">Class Name :</label>

                                    <div class="col-sm-8">

                                        <select class="form-select" aria-label="Default select example"

                                            name="class_name" required>

                                            <option selected disabled value>Select Class Name</option>

                                            <?php

                                                    $allClass = $Classes->classesList();

                                                    foreach ($allClass as $class) {

                                                        echo ' <option value="'.$class['id'].'">'.$class['classname'].'</option>';

                                                    }

                                                ?>

                                        </select>

                                    </div>

                                </div>

                                <div class="row m-0 p-0 mb-3">

                                    <label for="inputText" class="col-sm-4 col-form-label">Examination :</label>

                                    <div class="col-sm-8">

                                        <input type="text" maxlength="55" class="form-control" name="exam_name"

                                            required>

                                    </div>

                                </div>



                                <div class="row m-0 p-0 mb-3">

                                    <label for="inputText" class="col-sm-4 col-form-label">Max Marks :</label>

                                    <div class="col-sm-8">

                                        <input type="text" maxlength="55" class="form-control" name="max_marks"

                                            required>

                                    </div>

                                </div>



                                <?php

                               

                                foreach($results as $row){   

                                ?>

                                <div class="row p-0 m-0 mb-3">

                                    <label for="inputText" class="col-sm-4 col-form-label">Session :</label>

                                    <div class="col-sm-8">

                                        <input type="text" maxlength="55" class="form-control" value="<?php echo $row['session']  ?>" name="year" readonly required>

                                    </div>

                                </div><?php  } ?>

                                <div class="row mb-3 p-0 m-0">

                                    <label for="inputAddress" class="col-sm-4 col-form-label">Description :</label>

                                    <div class="col-sm-8">

                                        <textarea class="form-control" maxlength="355" style="height: 100px"

                                            name="description" required></textarea>

                                    </div>

                                </div>

                                <div class="row mb-3 p-0 m-0">

                                    <div class="col-sm-12  d-flex justify-content-center align-items-center">

                                        <button type="submit" name="submit" class="btn btn-primary">Submit

                                        </button>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <section class="section dashboard">
            <div class="row">
            <div class="col-lg-6">
                    <div class="card m-0 ">
                        <div class="card-body p-3">
                        <h5 class="card-title">add Subject Pass marks</h5>
                        <?php
                           $type = "Subject Wise";
                                $result=$Examination->passMarkshow($type);
                                foreach($result as $row){   
                                ?>
                                    <form method="POST" action="./ajax/percentage.action.php">
                                        <div class="row mb-3">
                                            <label for="inputText" class="col-sm-4 col-form-label">Subject Pass Marks</label>
                                            <div class="col-sm-8">
                                                <input type="text" maxlength="55" class="form-control"
                                                    value="<?php echo $row['marks']  ?>" name="marks" required>
                                                    <input type="hidden" maxlength="55" class="form-control"
                                                    value="<?php echo $row['id']  ?>" name="id" required>
                                            </div>
                                        </div>
                                                <input type="hidden" maxlength="55" class="form-control"
                                                    value="<?php echo $row['type']  ?>" name="type" required>
                                            
                                        
                                        <?php
                               
                               foreach($results as $row){   
                               ?>                             
                                       <input type="hidden" maxlength="55" class="form-control"
                                           value="<?php echo $row['session']  ?>" name="session" readonly required>
                                  <?php  } ?>

                                        <div class="row mb-3">
                                            <div class="col-sm-12  d-flex justify-content-center align-items-center">
                                                <button class="btn btn-primary me-md-2" name="submitdata"
                                                    type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- End Session -->
                                    <?php  } ?>
                        </div>
                    </div>
                    </div>
                <div class="col-lg-6">
                    <div class="card m-0 ">
                        <div class="card-body p-3">
                        <h5 class="card-title">add Overall Pass Marks</h5>
                        <?php
                         $types = "Overall Wise";
                                $result=$Examination->passMarkshow($types);
                                foreach($result as $row){   
                                ?>
                                    <form method="POST" action="./ajax/percentage.action.php">
                                    <div class="row mb-3">
                                            <label for="inputText" class="col-sm-4 col-form-label">Overall Pass Marks</label>
                                            <div class="col-sm-8">
                                                <input type="text" maxlength="55" class="form-control"
                                                    value="<?php echo $row['marks']  ?>" name="marks" required>
                                                    <input type="hidden" maxlength="55" class="form-control"
                                                    value="<?php echo $row['id']  ?>" name="id" required>
                                            </div>
                                        </div>                                    
                                                <input type="hidden" maxlength="55" class="form-control"
                                                    value="<?php echo $row['type']  ?>" name="type" required>
                                                                   
                                        <?php
                               
                               foreach($results as $row){   
                               ?>
                                       <input type="hidden" maxlength="55" class="form-control"
                                           value="<?php echo $row['session']  ?>" name="session" required>
                                   <?php  } ?>

                                        <div class="row mb-3">
                                            <div class="col-sm-12  d-flex justify-content-center align-items-center">
                                                <button class="btn btn-primary me-md-2" name="Updatedata"
                                                    type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- End Session -->
                                    <?php
                                    }            
                                    ?>
                        </div>
                    </div>
                    </div>
                    </div>
        
        </section>






        
  <section class="section dashboard" style="margin-top: 3rem;">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title mb-0 mt-0">subject grade </h5>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">SL. NO.</th>
                                        <th scope="col">Min Marks</th>
                                        <th scope="col">Max Marks</th>
                                        <th scope="col">grade</th>
                                        <th scope="col">particular name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sl = 1;
                                        $Showsubrank = $Examination->showgrade();                                    
                                        foreach ($Showsubrank as $subrank) {

                                            $min_mraks         = $subrank['Min_marks'];
                                            $max_mraks         = $subrank['Max_marks'];
                                            $showchar          = $subrank['grade_mane'];
                                            $particular_name   = $subrank['particular_name'];
                                    ?>
                                    <tr>
                                        <!-- <th scope="row"><?php    echo $row['id']  ?></th> -->
                                        <th><?php echo $sl; ?></th>
                                        <td><?php echo $min_mraks  ?></td>
                                        <td><?php echo $max_mraks  ?></td>
                                        <td><?php echo $showchar  ?></td>
                                        <td><?php echo $particular_name  ?></td>
                                        <td>
                                            <i class="bi bi-eye-fill pe-2" data-bs-toggle="modal"
                                                data-bs-target="#gradeShowModal" id="<?php echo $subrank['id']  ?>"
                                                onclick="gradeShow(this.id);"></i>
                                            <a href='ajax/grade-delete.ajax.php?id=<?php echo $subrank['id']  ?>'>
                                                <i class="bi bi-trash" data-bs-toggle="modal"
                                                    data-bs-target="#deleteexamFormModal"
                                                    onclick="return deleteForm();"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $sl++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card m-0 ">
                        <div class="card-body p-3">
                            <h5 class="card-title">add subject grade</h5>
                            <form method="POST" action="./ajax/subject_grade.action.php" class="row needs-validation  m-0"
                                novalidate>
                           
                                <div class="row m-0 p-0 mb-3">
                                    <label for="inputText" class="col-sm-4 col-form-label">Min Marks :</label>
                                    <div class="col-sm-8">
                                        <input type="text" maxlength="55" class="form-control" name="nim_marks"
                                            required>
                                    </div>
                                </div>

                                <div class="row m-0 p-0 mb-3">
                                    <label for="inputText" class="col-sm-4 col-form-label">Max Marks :</label>
                                    <div class="col-sm-8">
                                        <input type="text" maxlength="55" class="form-control" name="max_marks"
                                            required>
                                    </div>
                                </div>

                                <div class="row m-0 p-0 mb-3">
                                    <label for="inputText" class="col-sm-4 col-form-label">grade :</label>
                                    <div class="col-sm-8">
                                        <input type="text" maxlength="55" class="form-control" name="grade_name"
                                            required>
                                    </div>
                                </div>

                                <div class="row m-0 p-0 mb-3">
                                    <label for="inputText" class="col-sm-4 col-form-label">particular name :</label>
                                    <div class="col-sm-8">
                                        <input type="text" maxlength="55" class="form-control" name="full_name"
                                            required>
                                    </div>
                                </div>
                               
                                <div class="row mb-3 p-0 m-0">
                                    <div class="col-sm-12  d-flex justify-content-center align-items-center">
                                        <button type="submit" name="submitype" class="btn btn-primary">Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>





    </main><!-- End #main -->





    <!-- ======= Footer ======= -->

    <?php require_once 'require/addfooter.php'; ?>



    <!-- Modal -->

    <div class="modal fade" id="examFormModal" tabindex="-1" aria-labelledby="examFormModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="examFormModalLabel">



                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body examForm-modal-body">

                </div>

            </div>

        </div>

    </div>



    <!-- modal end -->







    
    <!-- Modal -->

    <div class="modal fade" id="gradeShowModal" tabindex="-1" aria-labelledby="gradeShowModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="gradeShowModalLabel">



                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body gradeShow-modal-body">

                </div>

            </div>

        </div>

    </div>



    <!-- modal end -->












    <script src="https://code.jquery.com/jquery-3.6.0.js"

        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>



    <script>

    const examShow = (id) => {



        let url = 'ajax/exam-show.ajax.php?data=' + id; 



        $(".examForm-modal-body").html(

            '<iframe width="100%" height="340px" frameborder="0" allowtransparency="true" src="' + url +

            '"></iframe>')

        }





    const deleteexamForm = () => {

        return confirm("Are you sure that you want to delete the Examinations Contents ?")

    };





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




    const gradeShow = (id) => {



let url = 'ajax/grade-show.ajax.php?data=' + id; 



$(".gradeShow-modal-body").html(

    '<iframe width="100%" height="340px" frameborder="0" allowtransparency="true" src="' + url +

    '"></iframe>')

}






const deleteForm = () => {

return confirm("Are you sure that you want to delete the Subject Grade Contents ?")

};

    </script>



</body>







</html>