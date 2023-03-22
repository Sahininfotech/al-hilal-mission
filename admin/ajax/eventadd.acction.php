<?php
require_once '../../_config/dbconnect.php';

require_once '../../classes/events.class.php';

$Events = new  Event();

if(isset ($_POST["submitdata"])){

    $eventDate    = $_POST["date"];

    $eventName    = $_POST["eventname"];

    $eventTime    = $_POST["time"];

    $description  = $_POST["description"];   

    //image uplod 

    $image            = $_FILES[ 'event_image' ][ 'name' ];

    $image_size       = $_FILES[ 'event_image' ][ 'size' ];

    $image_tmp_name   = $_FILES[ 'event_image' ][ 'tmp_name' ];

    $image_folter     = '../image/'.$image;

    //   echo $image_tmp_name; exit;

    move_uploaded_file( $image_tmp_name, $image_folter );

    $resultEvents = $Events->eventInsert($eventName, $eventDate, $eventTime, $description, $image);


    if($resultEvents){

        header("Location: ../events.php");

    }else{

        header("Location: ../events.php");      

    }




}


?>     