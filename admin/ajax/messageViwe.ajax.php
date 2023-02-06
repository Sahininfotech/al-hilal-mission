<?php 
session_start();
require_once '../../_config/dbconnect.php';
require_once '../../classes/contact.class.php';
require_once '../../classes/admin.class.php';
require_once '../../classes/utility.class.php';

/* INSTANTIATING CLASSES */
$Utility   = new Utility(); 
$Admin     = new Admin();
$Contact   = new Contact();

########################################################################################################
//declare variables

    $blog_id		= $_POST['id'];
	$approved		= $_POST['approved'];
    // $updated_by     =   $_SESSION[ADM_SESS];
	$add         = $Contact->updateStatus($blog_id, $approved);
?>