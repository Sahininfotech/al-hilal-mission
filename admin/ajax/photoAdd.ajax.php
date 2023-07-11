<?php

 session_start();

 $page ="photos";



 require_once '../../_config/dbconnect.php';

 require_once '../../classes/gallery.class.php';

 $Photos = new  Photos();

//  $expensesQuery=false;



//photoupload.php

// if(isset($_FILES['images']))
// {
// 	for($count = 0; $count < count($_FILES['images']['name']); $count++)
// 	{
// 		$extension = pathinfo($_FILES['images']['name'][$count], PATHINFO_EXTENSION);

// 		$new_name = uniqid() . '.' . $extension;

// 		move_uploaded_file($_FILES['images']['tmp_name'][$count], 'images/' . $new_name);
// 	}

// 	echo 'success';
// }


//   if(isset ($_POST["submit"])){

 
 
//     //image uplod 
//     $image            = $_FILES[ 'file' ][ 'name' ];
//     $image_size       = $_FILES[ 'file' ][ 'size' ];
//     $image_tmp_name   = $_FILES[ 'file' ][ 'tmp_name' ];
//     $image_folter     = '../image/'.$image;
//   //   echo $image_tmp_name; exit;

//       move_uploaded_file( $image_tmp_name, $image_folter );



//         $result=$Photos->photoInsert($image);

      
//         if(!$expensesQuery){

//          echo "<script> alert('Vendor Data is Successfully Inserted!');document.location = 'vendor-add.ajax.php' </script>";

//          }

//         else{

//           echo "<script> alert('Vendor Data is failed to Insert!');document.location ='vendor-add.ajax.php' </script>";

       

//         }

//      }

     

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>

    <title>Document</title>

    <style>
    .dropzone .dz-preview .dz-progress {
        top: 115% !important;
        background: rgba(0, 0, 255, 90%) !important;
    }
    </style>


</head>



<body style="background:white;">

    <body>
        <div class="container">
            <!-- <br />
   <h3 align="center">How to Upload a File using Dropzone.js with PHP</h3>
   <br /> -->

            <form action="photoupload.php" class="dropzone" id="dropzoneFrom" method="post"
                enctype="multipart/form-data">

            </form>


            </form>
            <br />
            <br />
            <div align="center">
                <button type="button" class="btn btn-info" id="submit-all">Upload</button>
            </div>
            <br />
            <br />
            <div id="preview"></div>
            <br />
            <br />
        </div>

        </div>


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

        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.css" integrity="sha512-7uSoC3grlnRktCWoO4LjHMjotq8gf9XDFQerPuaph+cqR7JC9XKGdvN+UwZMC14aAaBDItdRj3DcSDs4kMWUgg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.js" integrity="sha512-9e9rr82F9BPzG81+6UrwWLFj8ZLf59jnuIA/tIf8dEGoQVu7l5qvr02G/BiAabsFOYrIUTMslVN+iDYuszftVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

        <script>
        $(document).ready(function() {

            Dropzone.options.dropzoneFrom = {
                parallelUploads: 10, // file limit
                autoProcessQueue: false,
                acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
                init: function() {
                    var submitButton = document.querySelector('#submit-all');
                    myDropzone = this;
                    submitButton.addEventListener("click", function() {
                        myDropzone.processQueue();
                    });
                    this.on("complete", function() {
                        if (this.getQueuedFiles().length == 0 && this.getUploadingFiles()
                            .length == 0) {
                            var _this = this;
                            _this.removeAllFiles();
                            alert("Image Uploaded Successfully");
                        }
                        list_image();
                    });
                },
            };

            // list_image();

            // function list_image() {
            //     $.ajax({
            //         url: "photoupload.php",
            //         success: function(data) {
            //             $('#preview').html(data);
            //         }
            //     });
            // }

            // $(document).on('click', '.remove_image', function() {
            //     var name = $(this).attr('id');
            //     $.ajax({
            //         url: "photoupload.php",
            //         method: "POST",
            //         data: {
            //             name: name
            //         },
            //         success: function(data) {
            //             list_image();
            //         }
            //     })
            // });

        });
        </script>
    </body>



</html>