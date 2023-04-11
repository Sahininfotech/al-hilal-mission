<?php

require_once '../../_config/dbconnect.php';

require_once '../../classes/head_of_accounts.class.php';

$Grocery = new  HeadOfAccounts();

$hfa = $Grocery->accountById($_GET['accounttype']);

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

    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />

    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet" />

    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet" />

    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet" />

    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet" />

    <!-- Template Main CSS File -->

    <link href="../assets/css/style.css" rel="stylesheet" />

    <title>Document</title>

</head>



<body>



    <?php

            foreach ($hfa as $showaccount) {

                $showcategory             = $showaccount['category'];

                $showparent_category      = $showaccount['parent_category'];

                $showdescription          = $showaccount['description'];

                $showid                   = $showaccount['id'];
           
?>

    <form method="POST" action="head_of_accounts.acction.php">

        <div class="card  mb-0" style="box-shadow: none">

            <input type="hidden" name="id" value="'.$showid.'">

            <div class="card-body p-3 pt-0">

                <h5 class="card-title d-flex justify-content-center p-0 mt-0 mb-3">Edit Head Of Accounts</h5>
                <input type="hidden" maxlength="55" class="form-control" value="<?php echo $showid; ?>" name="id"
                    required>

                <div class="row mb-3">

                    <label for="inputText" class="col-sm-3 col-form-label">Head Of Accounts Name :</label>

                    <div class="col-sm-9">

                        <input type="text" maxlength="55" class="form-control" value="<?php echo $showcategory; ?>"
                            name="head_of_accounts" required>

                    </div>

                </div>
                <div class="row p-0 mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label">Parent Category Name :</label>
                    <div class="col-sm-9">
                        <select class="form-select" id="form-select" aria-label="Default select example"
                            name="parent_name">

                            <?php     
                             if ($showparent_category == 0) {echo'<option>None</option>'; 
                             }else{
                                echo '<option>'.$showparent_category.'</option>';
                             }
                            ?>
                            <option value="0">None</option>
                            <?php
                                    $grocerydata =$Grocery->showCategory();  
                                    foreach($grocerydata as $row){  
                                       
                                echo ' 
                                <option value="'.$row['category'].'">'.$row['category'].'</option>';

                                }
                            ?>
                        </select>
                    </div>
                </div>


                <div class="row mb-3">

                    <label for="inputAddress" class="col-sm-3 col-form-label">Description :</label>

                    <div class="col-sm-9">

                        <textarea type="text" class="form-control" maxlength="355" style="height: 100px"
                            name="description" required><?php echo $showdescription; ?></textarea>

                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col-sm-12  d-flex justify-content-center align-items-center">

                        <button type="submit" class="btn btn-primary" name="updatedata">Update</button>

                    </div>

                </div>

            </div>

        </div>

    </form>
    <?php

    }

    ?>



    <!-- Vendor JS Files -->

    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/chart.js/chart.min.js"></script>

    <script src="../assets/vendor/echarts/echarts.min.js"></script>

    <script src="../assets/vendor/quill/quill.min.js"></script>

    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>

    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>

    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->



</body>







</html>