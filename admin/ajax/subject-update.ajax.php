<?php



require_once '../../_config/dbconnect.php';



require_once '../../classes/subjects.class.php';
require_once '../../classes/classes.class.php';





$Classes     = new Classes();
$Subjects = new  Subjects();



if (!isset($_GET['data'])) {

    header("Location: ../subjects.php");

}





if (isset($_POST['update'])) {

    $id  = $_POST["id"];

    $class_name  = $_POST["class_name"];

    $subject     = $_POST["subject"];

    $description = $_POST["description"];



    $update      = $Subjects->subjectupdate($id, $class_name, $subject, $description);



    if($update){

        echo' <p class="border-start border-danger border-3 w-50 mx-auto mb-3 mt-1 text-center bg-primary fs-5 fw-bold text-light">Updated!</p> ';

    }else{

        // echo "<h1>Sujbejct Updation Failed!<h1>";

        echo' <p class="border-start border-primary border-3 w-50 mx-auto mb-3 mt-1 text-center bg-danger fs-5 fw-bold text-light">Updated!</p> ';

    }



}



$id = urldecode($_GET['data']);

// echo $id; exit;

$updatePage = $Subjects->subjectById($id);



      



 ?>







<!DOCTYPE html>



<html lang="en">



<head>



    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!-- Favicons -->

    <link href="assets/img/favicon.png" rel="icon" />

    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />



    <!-- Google Fonts -->



    <link href="https://fonts.gstatic.com" rel="preconnect" />



    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />





    <!-- Vendor CSS Files -->

    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />



    <!-- Template Main CSS File -->

    <link href="../assets/css/style.css" rel="stylesheet" />



    <title>Document</title>

</head>



<body style="background: #fff;">

    <?php

               foreach ($updatePage as $showsubjectdata) {

                $showid = $showsubjectdata['id'];

                $showsubject = $showsubjectdata['subject'];

                $showclass_name = $showsubjectdata['class_id'];

                $showdescription = $showsubjectdata['description'];

               }

    ?>

    <form method="POST" class="w-100 m-0" action="<?php echo $_SERVER['REQUEST_URI'] ?>">

        <input type="hidden" maxlength="55" class="form-control" value="<?php echo $showid; ?>" name="id" required>

        <div class="card p-0  mb-0" style="box-shadow: none">

            <div class="card-body p-3 pt-0">

                <h5 class="card-title d-flex justify-content-center p-0 mt-0 mb-3"> Subject Edit </h5>

                <div class="row p-0 mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label">Class Name :</label>
                    <div class="col-sm-9">
                        <select class="form-select" id="form-select" aria-label="Default select example"
                            name="class_name" required>

                            <?php
                                echo '<option>'.$showclass_name.'</option>';
                                ?>
                            <?php
                                         $classList = $Classes->classesList();
                                         foreach ($classList as $class) {
                                            echo '
                                            <option value="'.$class['id'].'">'.$class['classname'].'</option>';

                                         }
                                        ?>
                        </select>
                    </div>
                </div>



                <div class="row mb-3">

                    <label for="inputText" class="col-sm-3 col-form-label">Subject Name :</label>

                    <div class="col-sm-9">

                        <input type="text" maxlength="55" class="form-control" value="<?php echo $showsubject; ?>"
                            name="subject" required>

                    </div>

                </div>

                <div class="row mb-3">

                    <label for="inputAddress" class="col-sm-3 col-form-label">Description :</label>

                    <div class="col-sm-9">

                        <textarea class="form-control" maxlength="355" style="height: 100px" name="description"
                            required><?php echo $showdescription; ?></textarea>

                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col-sm-12  d-flex justify-content-center align-items-center">

                        <button type="submit" name="update" class="btn btn-primary">Update</button>

                    </div>

                </div>

            </div>

        </div>

    </form>



</body>

</html>