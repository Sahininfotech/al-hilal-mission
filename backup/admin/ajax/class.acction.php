<?php



require_once '../../_config/dbconnect.php';

require_once '../../classes/institutedetails.class.php';

$classes = new  InstituteDetails();





if(isset ($_GET["submitdata"])){



    $classname   = ($_GET["classname"]);

    $description = ($_GET["description"]);        

    $resultclass = $classes->classInsert( $classname, $description);

            

    if($resultclass){

        header("Location: https://alhilalmission.in/admin/classes.php");

    }else{

        header("Location: https://alhilalmission.in/admin/classes.php");      

    }

        

}

    

?>

      