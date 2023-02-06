<!DOCTYPE html>
<html>
<head>

</head>
  <body>
      <?php
        require_once '../class/register.class.php';

         $profileclass = new  institute();

            if($_SERVER['REQUEST_METHOD'] == 'GET'){
          
              $name       = $_GET["name"];
              $email      = $_GET["email"];
              $address    = $_GET["address"];
              $ph_no      = $_GET["ph_no"];
              $institute  = $_GET["institute"];
              $profession = $_GET["profession"];
              $twitter    = $_GET["twitter"];
              $facebook   = $_GET["facebook"];
              $instagram  = $_GET["instagram"];
              $linkedin   = $_GET["linkedin"];
              $country    = $_GET["country"];
              $id         = $_GET["id"];
          
              $update     = $profileclass->update($id, $name, $country, $email, $ph_no, $address, $institute, $profession, $twitter , $facebook , $instagram , $linkedin);
          
            }

        if(!$update){
          echo "<h1>update data is sucessfull <br><h1>";
          }
          else{
          echo header("Location: http://localhost/institute/admin/users-profile.php");

        }

    ?>

  </body>
</html>