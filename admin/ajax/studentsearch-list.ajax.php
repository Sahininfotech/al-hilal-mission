<?php
$search_value = $_POST["search"];

require_once '../../_config/dbconnect.php';
require_once '../../classes/studdetails.class.php';

$StudentDetails = new StudentDetails();
$student = $StudentDetails->searchStudent($search_value);


// $conn = mysqli_connect("localhost","root","","niceadmin") or die("connection faild");

// $sql ="SELECT * FROM `student` WHERE `student`.`name` LIKE '%$search_value%' or `student`.`student_id` LIKE '%$search_value%'";

// $result = mysqli_query($conn, $sql) or die("sql query falied .");

 $output = "";

//  foreach ($student[0] as $key => $value) {
//   echo $key .'=>'. $value;
//   echo '<br>';
//  }
if (count($student) >0 ) {
  echo '<style>
  .tablestyles:hover {
    transition: all 0.8s ease;
    color: #012970;

  }
  .tablestyle{
    white-space: nowrap;
  }
.arrow-up {
  width: 0%;
  height: 0;
  border-left: 15px solid transparent;
  border-right: 15px solid transparent;
  border-bottom: 15px solid #242129;
  margin-left: 2rem;
  margin-top: -0.7rem;
}
.setdata{
  width: 35rem;
  padding-left: 1.2rem;
}

</style> ';

  echo '<div class="arrow-up"></div>
   <table class="table table-responsive table-hover">
  <thead class="table-dark text-white">
      <tr class="">
   
          <th scope="col" class="tablestyle">Student Name</th>
          <th scope="col" class="tablestyle">Class</th>
          <th scope="col" class="tablestyle">Roll No</th>
          <th scope="col" class="tablestyle" style="padding-left: 2rem;">Gurdian</th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>
      </tr>
  </thead>';
foreach ($student as $row) {
  

echo "
  <tbody>
  <tr class='tablestyles' id='".$row['id']."' onclick='selectdata(this)'; style='border-bottom: 2px solid #f6f9ff !important;
  '>

          <td>".$row['name']."</td>
          <td>".$row['class']."</td>
          <td>".$row['roll_no']."</td>
          <td>".$row['gurdian_name']."</td>
          <td style='visibility: hidden;'>".$row['student_id']."</td>
          <td style='visibility: hidden;'>".$row['total_amount']."</td>
          <td style='visibility: hidden;'>".$row['total_due']."</td>
      </tr>
  </tbody>
 ";
}
     
  echo '</table>';
 
 }else {
  echo "Search Correctly.";
 }
?>