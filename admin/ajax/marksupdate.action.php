<body>

    <?php

      require_once '../../_config/dbconnect.php';

        require_once '../../classes/studdetails.class.php';

        $exammark = new StudentDetails();



        if($_SERVER['REQUEST_METHOD'] == 'POST'){



            $student_roll  = $_POST["student_roll"];

            $marks         = $_POST["marks"];

            $exam_id       = $_POST["exam_id"];

            $id            = $_POST["id"];





            $update        = $exammark->marksupdate($student_roll, $marks, $exam_id, $id);



            if(!$update){

              echo "<h1>Failed to update Marks.<br><h1>";
              
            }

            else{

            echo "<h1>Marks Has Been Updated!<br><h1>";

            }



        }



    ?>

