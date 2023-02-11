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
        .tablestyle:hover {
          transition: all 0.8s ease;
          color: #012970;
          background-color: #d5d9e1;
        }
      .a{
        padding-left: 3rem;
        padding-right: 3rem;
        white-space: nowrap;
        font-weight: 600;
        color: rgba(1, 41, 112, 0.6);
      }
      .ab{
        padding-left: 1rem;
        padding-right: 1rem;
        white-space: nowrap;
        font-weight: 600;
        color: rgba(1, 41, 112, 0.6);
      }
    </style> ';

  echo '<table id="search1" >
          <tr>
            <th class="ab">Class</th>
            <th class="ab">Roll No</th>
            <th class="a">Name</th>
            <th class="a">Gurdian</th>
            <th class="a">Student Id</th>
  
            </tr>';
  foreach ($student as $row) {
  
    
    echo "<tr class='tablestyle' id='".$row['id']."' onclick='selectdata(this)';>
            <td class='p-3'>".$row['class']."</td>

            <td class='p-3'>".$row['roll_no']."</td>

            <td class='p-3'>".$row['name']."</td>
            
            <td class='p-3'>".$row['gurdian_name']."</td>

            <td class='p-3'>".$row['student_id']."</td>

            <td style='visibility: hidden;'>".$row['payable_fee']."</td>
 
            <td style='visibility: hidden;'>".$row['total_due']."</td>
            </tr>
 ";
}
     
  echo '</table>';
 
 }else {
  echo "Search Correctly.";
 }
?>