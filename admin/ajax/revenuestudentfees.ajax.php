<?php

  session_start();



  require_once '../../_config/dbconnect.php';



  require_once '../../classes/revenue.class.php';



  require_once '../../classes/employee.class.php';



  require_once '../../classes/fees-accounts.class.php';



  require_once '../../classes/studdetails.class.php';



  $StudentDetails = new StudentDetails();

  

  $revenue      = new Revenue();



  $Employee     = new Employee();



  $Account     = new FeesAccount();



  $insertrevenuefees=false;



  



    if(isset ($_POST["feessubmit"])){



       $name            = $_POST["name"];

       $roll_no         = $_POST["roll_no"];

       $amount          = $_POST["amount"];

       $Fees_account    = $_POST["Fees_account"];   

    //    $guardian_name   = $_POST["guardian_name"];   

       $class           = $_POST["class"];

       $date            = $_POST["date"];

       $status          = $_POST["status"];     

       $payment_type    = $_POST["payment_type"];

       $payment_id      = $_POST["payment_id"];

       $total_amount    = $_POST["total_amount"];

       $student_id      = $_POST["student_id"];

       $paidBySelect    = $_POST["paid-by-select"];

       $others_paid     = $_POST["others_paid"];

       $added_by        = $_SESSION['user_name'];

       $amount_due       = $_POST["total_due"];;



       if ($total_amount >= $amount){

        $total_due       = $total_amount - $amount;



        $advanced        = 0;

    }



       if ($amount >= $total_amount){

        $advanced       = $total_amount - $amount;



        $total_due        = 0;



       }



    

       if ($paidBySelect == 'Others') {



        $paidBy         = $others_paid; 



    }

    

    if ($others_paid == '') {



        $paidBy = $paidBySelect; 



    }

    if ($amount_due >= $amount){

        $total_duess = $amount_due - $amount;

         $advanceds        = 0;



        }

    

        

        if ($amount >= $amount_due){

            $advanceds       = $amount_due - $amount;

    

            $total_duess        = 0;

    

           }

   



   

        $result = $revenue->addStudentFees($name, $roll_no, $amount, $Fees_account, $class, $date, $status, $added_by, $payment_type, $payment_id, $total_amount, $student_id, $paidBy);

        

        

        $results = $Account->feesSummary($student_id, $name, $class, $total_due, $advanced, $amount, $date, $added_by, $total_duess, $advanceds);



        $res = $Account->feesSummarydata($student_id, $total_due, $total_duess);



        if(!$insertrevenuefees){

        echo "<script> alert('Student Fees Submited!');</script>";

        }

        else{

            echo "<script> alert('Fees Submission Failed');</script>";

        

        }

        

    }



   

   

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

<style>
    .searchdata{
        width: 60%;

max-height: 150px;

text-align: center;    
overflow: auto;
margin-left: 12rem;

box-shadow: 0 0.4rem 1rem rgb(0 1 1 / 31%);      

cursor: pointer; margin-top: 3rem; 

position: absolute;

background-color: white;
    }
    .searchdata::-webkit-scrollbar {
  display: none; /* for Chrome, Safari, and Opera */
}
 @media(max-width:546px) {
        .searchdata {
            width: 77%;
            margin-left: 1rem;
            margin-top: 5rem;           
        }
    }
    .arrow-up {
        width: 0; 
        height: 0; 
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        display: none;
        border-bottom: 5px solid #7d8389;
      }
</style>

</head>



<body style="background:white;">

 



    <?php



          if(!$insertrevenuefees){

            



              ?>



    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="row needs-validation w-100 m-0" novalidate>



        <input type="hidden" class="form-control" name="status" value="active" id="status" required>

        <div class="card p-0 mb-0" style="box-shadow: none">

            <div class="card-body p-2 pt-0">

                <h5 class="card-title d-flex justify-content-center p-0 mt-0 mb-3">Fees Payment Form</h5>



                <div class="row mb-3 m-0 p-0">

                    <label for="inputText" class="col-sm-2 col-form-label">Name :</label>

                    <div class="col-sm-10">

                        <input type="text" id="search" class="form-control" name="name" onkeyup="searchItem(this.value)"

                            autocomplete="off" required>

                    </div>
                    <div class="arrow-ups position-absolute top-100 start-25" id="tablesdatas"></div>
                    <div class="searchdata" id="table-data">

                    </div>

                </div>

                <div class="row mb-3 m-0 p-0">

                <label for="inputaddress" class="col-sm-2 col-form-label">Student Id : </label>

                <div class="col-sm-10">

                <input type="text" class="form-control" id="student_id" name="student_id" required>

                </div>

                </div>
                <div class="row mb-3 m-0 p-0">

                    <label for="inputaddress" class="col-sm-2 col-form-label">Guardian : </label>

                    <div class="col-sm-10">

                        <input type="address" class="form-control" id="guardian" name="guardian_name" required>

                    </div>

                </div>              

                <div class="row mb-3 m-0 p-0">

                    <label for="inputNumber" class="col-sm-2 col-form-label">Roll No' :</label>

                    <div class="col-sm-4">

                        <input type="address" class="form-control" name="roll_no" id="roll-no" required>

                    </div>

                    <label for="inputNumber" class="col-sm-2 col-form-label">Class :</label>

                    <div class="col-sm-4">

                        <input type="Class" class="form-control" name="class" id="class" required>

                    </div>

                </div>



                <div class="row mb-3 m-0 p-0">

                    <label for="inputaddress" class="col-sm-2 col-form-label">Due : </label>

                    <div class="col-sm-10">

                        <input type="address" class="form-control" id="total_dues" name="total_due" required>

                    </div>

                </div>



                <div class="row mb-3 m-0 p-0">

                    <label for="inputNumber" class="col-sm-2 col-form-label">Amount :</label>

                    <div class="col-sm-4">

                        <input type="number" class="form-control" name="amount" required>

                    </div>

                    <label for="inputNumber" class="col-sm-2 col-form-label">Total ₹ :</label>

                    <div class="col-sm-4">

                        <input type="amount" class="form-control" name="total_amount" id="total_amount" required>

                    </div>

                </div>

                <div class="row mb-3 m-0 p-0">

                    <label for="inputText" class="col-sm-2 col-form-label">Payment :</label>

                    <div class="col-sm-4">

                        <select class="form-control" id="form-selectdata" name="payment_type" onclick="selectpament()"

                            required>

                            <option selected disabled value>Select Payment Type</option>

                            <option value="Cash">Cash</option>

                            <option value="Credit">Credit</option>

                            <option value="UPI">UPI</option>

                            <option value="Credit-Card">Credit-Card</option>

                            <option value="Debit-Card">Debit-Card</option>

                            <option value="Internet-Banking">Internet-Banking</option>

                            <option value="Others">Others</option>

                        </select>

                    </div>

                    <label for="inputText" class="col-sm-2 col-form-label" id="onlien" style="display: none;">Payment Id

                        :</label>

                    <div class="col-sm-4">

                        <input type="text" class="form-control" name="payment_id" id="onliens" style="display: none;">

                    </div>

                </div>

                <div class="row mb-3 m-0 p-0">

                    <label class="col-sm-2 col-form-label">paid To :</label>

                    <div class="col-sm-4">

                        <select class="form-select" id="form-select" aria-label="Default select example"

                            onclick="selectothers()" name="paid-by-select" required>

                            <option selected disabled value>Select Name</option>

                            <option value="Others" style="color: blue;">Others</option>

                            <?php

                        $emps = $Employee->showEmployees();

                        foreach ($emps as $emp) {

                            $empId   = $emp['id'];

                            $empName = $emp['name'];

                            echo '<option value="'.$empId.'">'.$empName.'</option>';

                        }

                        ?>

                        </select>

                    </div>

                    <label for="inputText" class="col-sm-2 col-form-label" id="other" style="display: none;">Others

                        :</label>

                    <div class="col-sm-4">

                        <input type="text" class="form-control" name="others_paid" id="others" style="display: none;">

                    </div>

                </div>





                <div class="row mb-3 m-0 p-0">

                    <label class="col-sm-2 col-form-label">Fees Type:</label>

                    <div class="col-sm-10">

                        <select class="form-select" id="form-select" aria-label="Default select example"

                            onclick="selectothers()" name="Fees_account" required>

                            <option selected disabled value>Select Name</option>

                            <?php

                        $Accounts = $Account->showAccounts();

                        foreach ($Accounts as $fees) {

                            $account_name   = $fees['account_name'];

                            // $empName = $fees['name'];

                            echo '<option value="'.$account_name.'">'.$account_name.'</option>';

                        }

                        ?>

                        </select>

                    </div></div>





                <div class="row mb-3 m-0 p-0">

                    <label for="inputDate" class="col-sm-2 col-form-label"> Date :</label>

                    <div class="col-sm-10">

                        <input type="date" class="form-control" name="date" required>

                    </div>

                </div>

                <div id="searched-items">

                </div>

                <div class="row mb-3 m-0 p-0  ">

                    <div class="col-sm-12 d-flex justify-content-center m-auto">

                        <button type="submit" class="btn btn-primary" style="width: 10rem;"

                            name="feessubmit">Submit</button>

                    </div>



                </div>



            </div>



    </form>



    <?php



          }



            ?>





    <!-- Vendor JS Files -->



    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>





    <script type="text/javascript">

    function searchItem(searchFor) {



        var searchword = $('#search').val();



        $.ajax({



            url: "student-list.ajax.php",



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

document.getElementById("tablesdatas").style.display = "none";

} else {

document.getElementById("tablesdatas").style.display = "block";

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




        let total_amount = document.getElementById(t.id).childNodes[11];



        // console.log(total_amount);



        if (window.getComputedStyle(total_amount).visibility === "hidden") {



            total_amount.style.visibility = "visible";



        }



        let total_due = document.getElementById(t.id).childNodes[13];



        if (window.getComputedStyle(total_due).visibility === "hidden") {



            total_due.style.visibility = "visible";



        }

        // let total_due = document.getElementById(t.id).childNodes[13];



        // if (window.getComputedStyle(total_due).visibility === "hidden") {



        //     total_due.style.visibility = "visible";



        // }

         var xx = document.getElementById("total_due");



        //console.log(student_id);



        document.getElementById("search").value = name.innerText;



        document.getElementById("class").value = className.innerText;



        document.getElementById("roll-no").value = roll.innerText;



        document.getElementById("guardian").value = gurdian.innerText;



        document.getElementById("student_id").value = student_id.innerText;



        document.getElementById("total_amount").value = total_amount.innerText;



         document.getElementById("total_dues").value = total_due.innerText;



        document.getElementById("table-data").style.display = "none";



        document.getElementById("table-data").style.display = "none";

        document.getElementById("tablesdatas").style.display = "none";

        // var xmlhttp = new XMLHttpRequest();

    }









//     const selectdata = (t) => {



//  var xx = document.getElementById("total_due");









//  document.getElementById("total_dues").value = Number(xx.value);

// }

//     </script>





    <script>

    // console.log("hi");



    function selectothers() {



        var demo_two = document.getElementById('other');



        var demo = document.getElementById('form-select');



        if (demo.value == 'Others') {



            demo_two.style.display = "block";



        } else {



            demo_two.style.display = "none";



        }



        var demo_two = document.getElementById('others');



        var demo = document.getElementById('form-select');



        if (demo.value == 'Others') {



            demo_two.style.display = "block";



        } else {



            demo_two.style.display = "none";



        }



    }

    </script>





    <script>

    function selectpament() {



        var demo_two = document.getElementById('onlien');



        var demo = document.getElementById('form-selectdata');



        if (demo.value == 'Credit' || demo.value == 'UPI' || demo.value == 'Credit-Card' || demo.value ==

            'Debit-Card' || demo.value == 'Internet-Banking') {



            demo_two.style.display = "block";



        } else {



            demo_two.style.display = "none";



        }



        var demo_two = document.getElementById('onliens');



        var demo = document.getElementById('form-selectdata');



        if (demo.value == 'Credit' || demo.value == 'UPI' || demo.value == 'Credit-Card' || demo.value ==

            'Debit-Card' || demo.value == 'Internet-Banking') {



            demo_two.style.display = "block";



        } else {



            demo_two.style.display = "none";



        }



    }

    </script>







    <script>

    (function() {

        'use strict'



        var forms = document.querySelectorAll('.needs-validation')



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





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



    <!-- Template Main JS File -->

</body>



</html>



