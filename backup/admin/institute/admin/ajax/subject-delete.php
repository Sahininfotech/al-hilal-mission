  <?php
  require_once '../../_config/dbconnect.php';
  require_once '../../classes/subjects.class.php';

      $Subjects = new  Subjects();

        if($_SERVER['REQUEST_METHOD'] == 'GET'){

          $Id     = $_GET["id"];
    
          $update = $Subjects->deleteSubject($Id);
    
  
        }
          if($update){
             echo "<script>alert('Subject Deleted!');
                      document.location = '../subjects.php';
                  </script>";
          }else{
            echo "<script>
                        alert('Subject Deletion Failed!');
                        document.location = '../subjects.php';
                  </script>";
        }

      ?>