<?php
    $page = "query";
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
    <!-- <link href="https://fonts.gstatic.com" rel="preconnect" /> -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body style="margin: 0rem; display: flex; justify-content: center;">



    <form method="post" action="query.action.php" class="row needs-validation w-100" novalidate>
        <div class="card  mb-0" style="border: none">
            <h5 class="card-title pt-0 pb-2 d-flex justify-content-center">
                Admission Query
            </h5>
            <div class="form-floating mb-3">
                <input type="text" maxlength="80" class="form-control" id="floatingInput" placeholder=" " name="name"
                    value="" required>
                <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" maxlength="80" class="form-control" id="floatingInput" placeholder=" "
                    name="gurdian_name" value="" required>
                <label for="floatingInput"> Gurdian Name</label>
            </div>
            <div class="row ">
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="email" maxlength="25" class="form-control" id="floatingInput" placeholder=" "
                            name="email_id" value="" required>
                        <label for="floatingInput"> Email Id </label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="number"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            maxlength="10" class="form-control" id="floatingInput" placeholder=" " name="contact_no"
                            value="" required>
                        <label for="floatingInput"> Contact Number </label>
                    </div>
                </div>
            </div>
            <fieldset class="row mb-3">
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="date" maxlength="10" class="form-control" id="floatingInput" placeholder=" "
                            name="date" value="" required>
                        <label for="floatingInput"> Date </label>
                    </div>
                </div>
                <div class="col-sm-6 ">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name="gender"
                            required>
                            <option selected disabled value>Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Transgender">Transgender</option>
                        </select>
                        <label for="floatingSelectGrid">Gender </label>
                    </div>
                </div>
            </fieldset>
            <div class="form-floating mb-3">
                <input type="text" maxlength="80" class="form-control" id="floatingInput" placeholder=" "
                    name="previous_school" value="" required>
                <label for="floatingInput"> Previous School </label>
            </div>
            <div class="row ">
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="number"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            maxlength="2" class="form-control" id="floatingInput" placeholder=" " name="previous_class"
                            value="" required>
                        <label for="floatingInput"> Previous Class </label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="number"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            maxlength="2" class="form-control" id="floatingInput" placeholder=" " name="admission_class"
                            value="" required>
                        <label for="floatingInput"> Admission Class </label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" maxlength="80" class="form-control" id="floatingInput" placeholder=" " name="address"
                    value="" required>
                <label for="floatingInput"> Address </label>
            </div>
            <div class="row ">
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" maxlength="50" class="form-control" id="floatingInput" placeholder=" "
                            name="district" value="" required>
                        <label for="floatingInput">District </label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" maxlength="50" class="form-control" id="floatingInput" placeholder=" "
                            name="police_station" value="" required>
                        <label for="floatingInput"> Police Station </label>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="number"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            maxlength="6" class="form-control" id="floatingInput" placeholder=" " name="pin_code"
                            value="" required>
                        <label for="floatingInput">Pin Code</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" maxlength="50" class="form-control" id="floatingInput" placeholder=" "
                            name="state" value="" required>
                        <label for="floatingInput">State </label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder=" " name="description" value=""
                    required>
                <label for="floatingInput">Description</label>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12  d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-primary" name="submit">Submit Form</button>
                </div>
            </div>
        </div>
    </form>


    <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
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