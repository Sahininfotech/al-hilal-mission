<!DOCTYPE html>
<html>
   <head>


   </head>
   <body>
      <?php
            require_once '../class/staffdata.class.php';

            $staffdetails = new  Cnstitute();

            if($_SERVER['REQUEST_METHOD'] == 'GET'){
            
               $name          = $_GET["name"];
               $email         = $_GET["email"];
               $address       = $_GET["address"];
               $contactno     = $_GET["contactno"];
               $gender        = $_GET["gender"];
               $qualification = $_GET["qualification"];
               $id            = $_GET["id"];
               $status        = $_GET["status"];


               $update        = $staffdetails->update($id, $name, $address, $contactno, $email, $gender, $qualification, $status);
            }
            

           if(!$update){
            echo  header("Location: http://localhost/institute/admin/staffdetails.php");
            }
            else{
            echo "<h1>update data is sucessfull <br><h1>";
         
            }

      ?>

   </body>
</html>
