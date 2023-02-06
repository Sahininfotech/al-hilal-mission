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
   <table class="table table-responsive table-hover ">
  <thead class="table-info text-white">
      <tr class="">
   
          <th scope="col" class="tablestyle" >Student Name</th>
          <th scope="col" class="tablestyle">Class</th>
          <th scope="col" class="tablestyle">Roll No</th>
          <th scope="col" class="tablestyle ps-8">Gurdian</th>
          <th scope="col"></th>
      </tr>
  </thead>';
foreach ($student as $row) {


echo "
  <tbody>
  <tr id='".$row['id']."' onclick='selectdata(this)'; style='border-bottom: 2px solid #f6f9ff !important;
  '>

          <td class='setdata'>".$row['name']."</td>
          <td class='setdata'>".$row['class']."</td>
          <td class='setdata'>".$row['roll_no']."</td>
          <td class='setdata'>".$row['gurdian_name']."</td>
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


<!-- <section>
        <table class="table table-responsive table-hover ">
            <thead class="table-dark">
                <tr class="">
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>';
  foreach ($student as $row) {
  
    
    echo "
            <tbody>
            <tr class='tablestyle' id='".$row['id']."' onclick='selectdata(this)';>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
            </tbody>
        </table>
    </section> -->

    <!-- if (count($student) >0 ) {
  echo ' 
        ';

  echo ' <table class="table table-responsive table-hover ">
  <thead class="table-dark">
      <tr class="">
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
          <th scope="col">Handle</th>
          <th scope="col"></th>
      </tr>
  </thead>';
foreach ($student as $row) {


echo "
  <tbody>
  <tr class='tablestyle' id='".$row['id']."' onclick='selectdata(this)';>
          <th scope='row'>1</th>
          <td>".$row['name']."</td>
          <td>".$row['class']."</td>
          <td>".$row['roll_no']."</td>
          <td >".$row['gurdian_name']."</td>
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
 } -->


 <!-- if (count($student) >0 ) {
  echo '<style>
        .tablestyle:hover {
          transition: all 0.8s ease;
          color: #012970;
 
        }
        .setdata:hover {
          transition: all 0.8s ease;
          color: #080808;
          background-color: #f8f9fa;
        }
        .tablestyle{
          white-space: nowrap;
        }
      .a{
        padding-left: 3rem;
        padding-right: 3rem;
        white-space: nowrap;
        font-weight: 600;
        color: rgba(1, 41, 112, 0.6);
      }
      .ab{
        padding-left: 2rem;
        padding-right: 1rem;
        white-space: nowrap;
        font-weight: 600;
        color: #f3f3f3;
      }
      .arrow-up {
        width: 0%;
        height: 0;
        border-left: 15px solid transparent;
        border-right: 15px solid transparent;
        border-bottom: 15px solid #f3f3f3;
        margin-left: 2rem;
        margin-top: -0.7rem;
      }
      .setdata{
        width: 35rem;
        padding-left: 1.2rem;
      }
    </style> ';

  echo '<div class="arrow-up"></div>
  <table id="search1" >
          <tr>
          <th class="ab">class</th>
          
            </tr>';
  foreach ($student as $row) {
  
    
    echo "<tr class='tablestyle' id='".$row['id']."' onclick='selectdata(this)';>
            
            <td class='row setdata'><hr>Name - ".$row['name']."</td>

            <td class='row setdata'>Class - ".$row['class']."</td>

            <td class='row setdata'>Roll No - ".$row['roll_no']."</td>
          
            <td class='row setdata'>Gurdian - ".$row['gurdian_name']."</td>

            <td style='visibility: hidden;'>".$row['student_id']."</td>

            <td style='visibility: hidden;'>".$row['total_amount']."</td>
 
            <td style='visibility: hidden;'>".$row['total_due']."</td>
            </tr>
 ";
}
     
  echo '</table>';
 
 }else {
  echo "Search Correctly.";
 } -->