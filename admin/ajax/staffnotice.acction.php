  <?php
  require_once '../../_config/dbconnect.php';
require_once '../../classes/employee.class.php';

  $employees = new  Employee();

      if($_SERVER['REQUEST_METHOD'] == 'POST'){

          $id        = $_POST["id"];
        
          $name      = $_POST["name"];
          $subject   = $_POST["subject"];
          $notice    = $_POST["notice"];
          $staff_id  = $_POST["staff_id"];
          $old_img   = $_POST['updateimg'];

          $new_image     = $_FILES['signature']['name'];
          $img_tmp_name  =$_FILES['signature']['tmp_name'];
          $image_folter  = '../image/'.$_FILES['signature']['name'];
       
       
       
          if($new_image != ''){
             $c_image = '../image/'.$_FILES['signature']['name'];
          }else{
             $c_image = $old_img;
          }
      
      $update=$employees->staffnoticeupdate($id, $name, $notice, $subject, $c_image, $staff_id);
      
        }
      if($update){
        echo "<h1>message data send<br><h1>";
        }
        else{
        echo header("Location: staffnotice.php");

  }

      ?>