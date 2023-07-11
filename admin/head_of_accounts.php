<?php

session_start();

$page ="Head Of Accounts";

$subjectQuery=false;



 

require_once '../_config/dbconnect.php';

require_once '../classes/admin.class.php';

require_once '../classes/head_of_accounts.class.php';

require_once '../classes/utility.class.php';

require_once '../includes/constant.php';



$Admin          = new Admin();

$grocery        = new HeadOfAccounts();

$Utility        = new Utility();









$_SESSION['current-url'] = $Utility->currentUrl();



if (!isset($_SESSION['user_name']) && !isset($_SESSION['loggedin']) ) {

  header("Location: login.php");

  exit;

}

?>



<!DOCTYPE html>



<html lang="en">







<head>



    <meta charset="utf-8">



    <meta content="width=device-width, initial-scale=1.0" name="viewport">







    <title>Head Of Accounts - <?php echo SITE_NAME; ?></title>



    <meta content="" name="description">



    <meta content="" name="keywords">







    <!-- Favicons -->



    <link href="assets/img/favicon.png" rel="icon">



    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">







    <!-- Google Fonts -->



    <link href="https://fonts.gstatic.com" rel="preconnect">



    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">







    <!-- Vendor CSS Files -->



    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">



    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">



    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">



    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">



    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">



    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">



    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">







    <!-- Template Main CSS File -->



    <link href="assets/css/style.css" rel="stylesheet">











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



            <h1>Head Of Accounts</h1>



            <nav>



                <ol class="breadcrumb">



                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>



                    <li class="breadcrumb-item">Head Of Accounts</li>



                </ol>



            </nav>



        </div><!-- End Page Title -->







        <section class="section dashboard" style="min-height: 62vh;">

            <div class="row">

                <div class="col-lg-6 ">

                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">

                            <h5 class="card-title mb-0 mt-0">Head Of Accounts</h5>

                            <table class="table datatable">

                                <thead>

                                    <tr>

                                        <th scope="col ">SL. NO.</th>

                                        <th scope="col ">Head Of Accounts</th>

                                        <th scope="col ">parent HOA</th>

                                        <th scope="col ">Description</th>

                                        <th scope="col ">Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php

                                    $sl = 1;
                                    $grocerydata = $grocery->showCategory();                              
                                    foreach($grocerydata as $row){                                
                                        $description = $row['description'];
                                        $parentdata  = $row['parent_category'];
                                       
                                    ?>

                                    <tr>

                                        <!-- <th scope="row"><?php    echo $row['id'];  ?></th> -->

                                        <th><?php echo $sl; ?></th>

                                        <td><?php echo $row['category']; ?></td>

                                        <td>
                                            <?php
                                            if($parentdata == 0){
                                            echo '0';
                                            } else{
                                            $grocerys    = $grocery->categoryById($parentdata);                              
                                            foreach($grocerys as $rows){                                
                                            $parentCate  = $rows['category'];

                                            echo $parentCate; 
                                            }  
                                            }
                                            ?>
                                        </td>

                                        <td><?php echo substr("$description",0,10)." ...";?></td>

                                        <td>

                                            <i class="bi bi-eye-fill pe-4" data-bs-toggle="modal"
                                                data-bs-target="#AccountsModal" id="<?php    echo $row['id']  ?>"
                                                onclick="HeadOfAccountsShow(this.id);"></i>

                                            <a
                                                href='ajax/head_of_accountsdelete.action.php?id=<?php echo $row['id'];?>'>

                                                <i class="bi bi-trash" onclick="return Dalete();"></i>

                                            </a>

                                        </td>

                                    </tr>

                                    <?php

                                        $sl++;

                                        }

                                        ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

                <div class="col lg-6">

                    <div class="card">

                        <div class="card-body p-3">
                            <h5 class="card-title">Add Head Of Accounts</h5>

                            <form method="POST" action="ajax/head_of_accounts.acction.php"
                                class="row needs-validation m-0" novalidate>

                                <div class="row m-0 p-0 mb-3">

                                    <label for="inputText" class="col-sm-4 col-form-label">Head Of Accounts Name
                                        :</label>

                                    <div class="col-sm-8 p-0">

                                        <input type="text" maxlength="55" class="form-control" name="head_of_accounts"
                                            required>

                                    </div>

                                </div>

                                <div class="row m-0 p-0 mb-3">

                                    <label class="col-sm-4 col-form-label">Parent HOA Name :</label>

                                    <div class="col-sm-8 p-0">

                                        <select class="form-select" aria-label="Default select example"
                                            name="parent_name" required>

                                            <option selected value="0">None</option>

                                            <?php                                         

                                            foreach($grocerydata as $row){  

                                            echo ' <option value="'.$row['category_id'].'">'.$row['category'].'</option>';

                                            }

                                            ?>

                                        </select>

                                    </div>

                                </div>


                                <div class="row m-0 p-0 mb-3">

                                    <label for="inputAddress" class="col-sm-4 col-form-label">Description :</label>

                                    <div class="col-sm-8 p-0">

                                        <textarea class="form-control" maxlength="355" style="height: 100px"
                                            name="description" required></textarea>

                                    </div>

                                </div>

                                <div class="row m-0 p-0 mb-3">

                                    <div class="col-sm-12  d-flex justify-content-center align-items-center">

                                        <button type="submit" name="submit" class="btn btn-primary">Add

                                            Head Of Accounts</button>

                                    </div>

                                </div>

                            </form>

                            <!-- End staffform -->

                        </div>

                    </div>

                </div>

            </div>

        </section>


    </main><!-- End #main -->







    <!-- ======= Footer ======= -->



    <?php require_once 'require/addfooter.php'; ?>







    <!-- Modal -->



    <div class="modal fade" id="AccountsModal" tabindex="-1" aria-labelledby="AccountsModalLabel" aria-hidden="true">



        <div class="modal-dialog modal-lg">



            <div class="modal-content">



                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>



                </div>



                <div class="modal-body AccountsForm-modal-body">


                </div>

            </div>



        </div>



    </div>



    <!-- modal end -->



    <script>
    function Dalete() {



        return confirm("DO YOU REALLY WANT TO DELETE THIS HEAD OF ACCOUNTS CONTENTS ?")



    };
    </script>



    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>



    <script>
    const HeadOfAccountsShow = (id) => {



        let url = 'ajax/head_of_accounts.ajax.php?accounttype=' + id;



        $(".AccountsForm-modal-body").html(



            '<iframe width="99%" height="380px" frameborder="0" allowtransparency="true" src="' + url +



            '"></iframe>')







    }
    </script>

    <script>
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
    </script>





</body>







</html>