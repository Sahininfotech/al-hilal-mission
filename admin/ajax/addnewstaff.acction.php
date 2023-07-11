<?php
require_once '../../_config/dbconnect.php';
require_once '../../classes/employee.class.php';
  
  $employees = new  Employee();

  if(isset ($_POST["submit"])){

    $name           = $_POST["name"];
    $email          = $_POST["email"];
    $address        = $_POST["address"];
    $contactno      = $_POST["contactno"];
    $gender         = $_POST["gender"];
    $qualification  = $_POST["qualification"];
    $experience     = $_POST["experience"];
    $joinin_date    = $_POST["joinin_date"];
    $post_office    = $_POST["post_office"];
    $sdo_or_bdo     = $_POST["sdo_or_bdo"];
    $police_station = $_POST["police_station"];
    $district       = $_POST["district"];
    $pin_code       = $_POST["pin_code"];
    $state          = $_POST["state"];
    $status         = $_POST["status"];
    $RoleName       = $_POST["rolename"];
    $Password       = $_POST["confirm_password"];

        //image uplod 
        $image            = $_FILES[ 'image' ][ 'name' ];
        $image_size       = $_FILES[ 'image' ][ 'size' ];
        $image_tmp_name   = $_FILES[ 'image' ][ 'tmp_name' ];
        $image_folter     = '../image/'.$image;
      //   echo $image_tmp_name; exit;
    
        move_uploaded_file( $image_tmp_name, $image_folter );

    $hashpass           = password_hash($Password, PASSWORD_DEFAULT);

      $result = $employees->staffInsert($name, $email, $address, $contactno, $gender, $qualification, $experience, $joinin_date, $post_office, $sdo_or_bdo, $police_station, $district, $pin_code, $state, $status, $hashpass, $image, $RoleName);
      
      if($result){
        ?>
<script>
alert("New Employee Added!");
window.location.href = "../addnewstaff.php";
</script>
<?php
      // header("Location: http://localhost/institute/admin/addnewstaff.php");
      // exit;
      }else{
        ?>
<script>
alert("New employee insertion failed!");
window.location.href = "../addnewstaff.php";
</script>
<?php
        // header("Location: http://localhost/institute/admin/addnewstaff.php");
        // exit;
      }
    } 
?>