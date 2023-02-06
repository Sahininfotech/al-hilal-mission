<body>
    <?php
      require_once '../../_config/dbconnect.php';
        require_once '../../classes/studdetails.class.php';
        $exammark = new StudentDetails();

        if($_SERVER['REQUEST_METHOD'] == 'GET'){

            $student_roll  = $_GET["student_roll"];
            $marks         = $_GET["marks"];
            $exam_id       = $_GET["exam_id"];
            $id            = $_GET["id"];


            $update        = $exammark->marksupdate($student_roll, $marks, $exam_id, $id);

            if(!$update){
              echo "<h1>update data is not sucessfull <br><h1>";
            }
            else{
            echo "<h1>update data is sucessfull <br><h1>";
            }

        }

    ?>
