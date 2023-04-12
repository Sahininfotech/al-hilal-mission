<?php

session_start();

require_once '../../_config/dbconnect.php';

require_once '../../classes/expenses.class.php';

// require_once '../class/employee.class.php';
require_once '../../classes/vendor.class.php';
require_once '../../classes/employee.class.php';
require_once '../../classes/head_of_accounts.class.php';

$grocery  = new HeadOfAccounts();
$Employee = new Employee();
$vendors  = new Vendor();
$Expenses = new Expenses();

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

    <!-- <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />

    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet" />

    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet" />

    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet" />

    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet" /> -->

    <!-- Template Main CSS File -->

    <link href="../assets/css/style.css" rel="stylesheet" />

    <title>Document</title>

</head>



<body style="background:white;">

    <?php

     $expenssBill = $Expenses->showExpenssById($_GET['stafftype1']);

               foreach ($expenssBill as $expenses) {



                $showid             = $expenses['id'];



                $billNo             = $expenses['bill_no'];

                $hfa_sub_category_id= $expenses['hfa_sub_category_id'];

                $billAmount         = $expenses['amount'];


                $showpayment_type   = $expenses['payment_type'];

                $head_of_accounts_id= $expenses['head_of_accounts_id'];

                $showpayment_id     = $expenses['payment_id'];

                $paidTo             = $expenses['paid_to'];

                $paidBy             = $expenses['paid_by'];

                $showdescription    = $expenses['description'];

                $showdate           = $expenses['date'];

                $showupload_bill    = $expenses['upload_bill'];



                $img =  "../image/".$showupload_bill;



            }



            ?>

    <form method="POST" action="expensesedit.action.php" enctype="multipart/form-data">

        <div class="card px-4 mb-0" style="box-shadow: none">

            <input type="hidden" class="form-control" value="<?php echo $showid; ?>" name="id">

            <div class="row mb-3">

                <label for="inputimg" class="col-sm-2 col-form-label">Bill Image :</label>

                <div class="col-sm-10">

                    <img id="theImage" src="<?php echo $img; ?>" alt="bill-invoice" width="100" height="50"
                        style="border-radius: 7% " onClick="makeFullScreen()">

                </div>

            </div>

            <div class="row mb-3">



                <label for="inputNumber" class="col-sm-2 col-form-label">Update Bill :</label>

                <div class="col-sm-4">

                    <input class="form-control w-100" type="file" id="formFile" name="upload_bill" accept="image/*" />

                    <input type="hidden" value="<?php echo $img; ?>" name="updateimg">

                </div>

                <!-- <label for="inputNumber" class="col-sm-2 col-form-label">Update Bill :</label>

                <div class="col-sm-4 col-lg-12 col-md-12 col-xl-12 col-4">

                    <input type="file" value=" " name="upload_bill" accept="image/*" />

                    <input type="hidden" value="<?php echo $img; ?>" name="updateimg">

                </div> -->

            </div>







            <div class="row mb-3">

                <div class="col-sm-6">

                    <div class="row">

                        <label for="<?php echo $billNo; ?>" class="col-sm-4 form-label">Voucher No :</label>

                        <div class="col-sm-8">

                            <input type="text" class="form-control" id="<?php echo $billNo; ?>"
                                value="<?php echo $billNo; ?>" name="bill_no">

                        </div>

                    </div>

                </div>



                <div class="col-sm-6">

                    <div class="row">

                        <label for="bill-date" class="col-sm-4 form-label">Date :</label>

                        <div class="col-sm-8">

                            <input type="date" class="form-control" id="bill-date" name="date"
                                value="<?php echo $showdate; ?>">

                        </div>

                    </div>

                </div>

            </div>





            <div class="row mb-3">



                <label for="inputText" class="col-sm-2 col-form-label">Amount :</label>



                <div class="col-sm-10">



                    <input type="text" class="form-control" value="<?php echo $billAmount; ?>" name="amount">



                </div>



            </div>











            <div class="row mb-3">



                <label for="inputText" class="col-sm-2 col-form-label">Payment Mode :</label>



                <div class="col-sm-4">



                    <select class="form-select" name="payment_type" onchange="selectpayment(this.value)">



                        <option selected value="<?php echo $showpayment_type; ?>"><?php echo $showpayment_type; ?>



                        </option>



                        <option value="Cash">Cash</option>



                        <option value="Credit">Credit</option>



                        <option value="UPI">UPI</option>



                        <option value="Credit-Card">Credit-Card</option>



                        <option value="Debit-Card">Debit-Card</option>



                        <option value="Internet-Banking">Internet-Banking</option>



                        <option value="Others">Others</option>



                    </select>



                </div>











                <div class="col-sm-6">



                    <div class=" row <?php echo ($showpayment_type == 'Cash') ? ( 'd-none'):('d') ?> "
                        id="payment_id_bx">



                        <label for="inputAddress" class="col-sm-4 col-form-label">Payment Id:</label>



                        <div class="col-sm-8">



                            <input type="number" class="form-control" value="<?php echo $showpayment_id; ?>"
                                name="payment_id">



                        </div>



                    </div>

                </div>

            </div>



            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Paid To :</label>
                <?php

                 // echo gettype($paidBy) != 'integer' ? 'selected' : 'none';
                  ?>
                <div class="col-sm-4">
                    <?php
                 // echo $paidBy;
                 ?>
                    <select class="form-select" id="form-select" onChange="selectpaidto(this.value)"
                        name="paid-to-select" required>

                        <?php

                        echo '<option  style="color: blue;">'.$paidTo.'</option>';
                    
                        ?>
                        <option value="Others" style="color: blue;">Others</option>
                        <?php

                        $vendorresult      = $vendors->vendordisplaydata();                            
                        foreach ($vendorresult as $showVendor) {
                        $showVen_id    = $showVendor['id'];
                        $showVen_name  = $showVendor['name'];
                        $showvendor_id = $showVendor['vendor_id'];

                        echo ' <option value="'.$showVen_name.'">'.$showVen_name.'</option>';
                        }
                        ?>
                    </select>
                </div>



                <div class="col-sm-6 <?php echo gettype($paidTo) != 'integer' ? 'd-none' : 'd-block'; ?>"
                    id="others-vendors">

                    <div class="row">

                        <label for="inputText" class="col-sm-4 col-form-label">Name :</label>



                        <div class="col-sm-8">



                            <input type="text" class="form-control" name="others_paid_to"
                                value="<?php echo $showVen_name; ?>">



                        </div>



                    </div>



                </div>



            </div>






            <div class="row mb-3">



                <label class="col-sm-2 col-form-label">Paid By :</label>



                <?php



                // echo gettype($paidBy) != 'integer' ? 'selected' : 'none';



                ?>



                <div class="col-sm-4">



                    <?php



                    // echo $paidBy;



                    ?>



                    <select class="form-select" id="form-select" onChange="selectOthers(this.value)"
                        name="paid-by-select" required>







                        <?php



                             



                                echo '<option  style="color: blue;">'.$paidBy.'</option>';







                        ?>



                        <option value="Others" style="color: blue;">Others</option>



                        <?php



                                $emps = $Employee->showEmployees();







                                foreach ($emps as $emp) {



                                    $empId   = $emp['id'];



                                    $empName = $emp['name'];



                                    echo ' <option value="'.$empName.'">'.$empName.'</option>';



                                }



                        ?>







                    </select>



                </div>







                <div class="col-sm-6 <?php echo gettype($paidBy) != 'integer' ? 'd-none' : 'd-block'; ?>"
                    id="others-staff">

                    <div class="row">



                        <label for="inputText" class="col-sm-4 col-form-label">Name :</label>



                        <div class="col-sm-8">



                            <input type="text" class="form-control" name="others_paid" value="<?php echo $paidBy; ?>">



                        </div>



                    </div>



                </div>



            </div>








            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Head Of Accounts :</label>
                <div class="col-sm-4">
                    <select class="form-select" id="form-selectaccount" aria-label="Default select example"
                        onclick="getsubcategory(this.value)" name="accounts-select" required>

                        <?php
                        $categorydata =$grocery->categoryById($head_of_accounts_id);                              
                        foreach($categorydata as $rows){ 
                        $category_name   = $rows['category'];
                        echo '<option  style="color: blue;">'.$category_name.'</option>';
                        }
                        $grocerydata =$grocery->parentCategory();                              
                        foreach($grocerydata as $row){ 
                        $category   = $row['category'];
                        $categoryId = $row['category_id'];                                                                                 
                        echo '<option value="'.$categoryId.'">'.$category.'</option>';
                        }
                        ?>

                    </select>
                </div>
                <label class="col-sm-2 col-form-label" id="subdata">sub category:</label>
                <div class="col-sm-4">
                    <select class="form-select" id="form-selectaccountsub" aria-label="Default select example"
                        name="sub-accounts-select">
                        <?php
                        $categorydata =$grocery->categoryById($hfa_sub_category_id);                              
                        foreach($categorydata as $rows){ 
                        $category_name   = $rows['category'];
                        echo '<option  style="color: blue;">'.$category_name.'</option>';
                        }
                        ?>

                    </select>
                </div>
            </div>




            <!-- <div class="row mb-3">



                <label for="inputAddress" class="col-sm-2 col-form-label">Paid By :</label>



                <div class="col-sm-10">



                    <input type="text" class="form-control" value="" name="paid_by">



                </div>



            </div> -->







            <div class="row mb-3">



                <label for="inputText" class="col-sm-2 col-form-label">Description :</label>
                <div class="col-sm-10">

                    <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->



                    <textarea class="form-control" id="" rows="3"
                        name="description"><?php echo $showdescription; ?></textarea>



                    <!-- <input type="text" class="form-control" value="" name="purpore"> -->



                </div>



            </div>















            <div class="row mb-3">



                <div class="col-sm-12 text-end pt-2">



                    <button type="submit" name="update" class="btn btn-primary m-auto d-flex justify-content-center "
                        id="upedit" style="width: 105px">Update</button>



                </div>



            </div>







        </div>



        </div>



    </form>







    <!-- Vendor JS Files -->



    <!-- <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script> -->



    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



    <!-- <script src="../assets/vendor/chart.js/chart.min.js"></script>



    <script src="../assets/vendor/echarts/echarts.min.js"></script>



    <script src="../assets/vendor/quill/quill.min.js"></script>



    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>



    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>



    <script src="../assets/vendor/php-email-form/validate.js"></script> -->







    <script>
    // <!-- image fullscreen -->



    function makeFullScreen() {



        var divObj = document.getElementById("theImage");



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











    function selectpayment(mode) {



        // alert(mode);



        var pymntBx = document.getElementById('payment_id_bx');



        if (mode != "Cash") {



            pymntBx.classList.remove('d-none');



        } else {



            pymntBx.classList.add('d-none');



        }



    }











    const selectpaidto = (vendors) => {







        var vendorsBx = document.getElementById('others-vendors');



        if (vendors == "Others") {



            vendorsBx.classList.remove('d-none');



        } else {



            vendorsBx.classList.add('d-none');



        }

    }





    const selectOthers = (staff) => {







        var staffBx = document.getElementById('others-staff');



        if (staff == "Others") {



            staffBx.classList.remove('d-none');



        } else {



            staffBx.classList.add('d-none');



        }

    }
    </script>


    <script>
    const getsubcategory = (value) => {
        subcategoryList = document.getElementById("form-selectaccountsub");
        console.log(value);
        // alert(value);
        var xmlhttp = new XMLHttpRequest();
        if (value != "") {
            // subcategoryList.style.display = 'block';
            //==================== SubCategory List ====================
            subcategory = 'getsubcategory.ajax.php?subcategory=' + value;
            // alert(url);
            xmlhttp.open("GET", subcategory, false);
            xmlhttp.send(null);
            subcategoryList.innerHTML = xmlhttp.responseText;
            console.log(xmlhttp.responseText);
            if (xmlhttp.responseText != "") {
                subcategoryList.style.display = 'block';
                document.getElementById("subdata").style.display = 'block';
            } else {
                subcategoryList.style.display = 'none';
                document.getElementById("subdata").style.display = 'none';
            }
        }

    }
    </script>




</body>







</html>