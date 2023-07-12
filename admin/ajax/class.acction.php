<?php
require_once '../../_config/dbconnect.php';
require_once ROOT_DIR . '/classes/institutedetails.class.php';
$classes = new  InstituteDetails();

if(isset ($_POST["submitdata"])){

    $classid      = $_POST["id"];
    $classname    = $_POST["classname"];
    $description  = $_POST["description"];        


        //image uplod 

        $image            = $_FILES[ 'upload_image' ][ 'name' ];
        $image_size       = $_FILES[ 'upload_image' ][ 'size' ];
        $image_tmp_name   = $_FILES[ 'upload_image' ][ 'tmp_name' ];
        $image_folter     = '../image/'.$image;
  
        // echo $image_tmp_name; exit;
        move_uploaded_file( $image_tmp_name, $image_folter );

    $resultclass = $classes->classInsert($classid, $classname, $description, $image);
    header("Location: ".ADM_URL."/classes.php");

}


?>     