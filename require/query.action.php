<?php
    require_once '../_config/dbconnect.php';
    require_once '../classes/query-form.class.php';

    $Query       = new  admissionQuery();

    $insertquery = false;

    if(isset ($_POST["submit"])){

        $name                  = $_POST["name"];
        $gurdian_name          = $_POST["gurdian_name"];
        $email_id              = $_POST["email_id"];
        $contact_no            = $_POST["contact_no"];
        $gender                = $_POST["gender"];
        $previous_school       = $_POST["previous_school"];
        $previous_class        = $_POST["previous_class"];
        $admission_class       = $_POST["admission_class"];
        $address               = $_POST["address"];
        $district              = $_POST["district"];
        $police_station        = $_POST["police_station"];
        $pin_code              = $_POST["pin_code"];
        $state                 = $_POST["state"];
        $description           = $_POST["description"];
        $date                  = $_POST["date"];
        $added_by              = $_SESSION['user_name'];


        $querydata = $Query->addFormQuery( $name, $gurdian_name, $email_id, $contact_no, $gender, $previous_school, $previous_class, $admission_class, $address, $district, $police_station, $pin_code, $state, $description, $date, $added_by);



        if(!$insertquery){
        echo "<script> alert('Data Insert Sucessfull');document.location='query.ajax.php'</script>";
        }
        else{
        echo "<script> alert('Data Insert Not Sucessfull');document.location='query.ajax.php'</script>";

        }

    }

?>