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
          transition: all 0.5s ease;
          color: #012970;
          background-color: #d5d9e1;
        }
      .a{
        padding-left: 3rem;
        padding-right: 3rem;
      }
      .ab{
        padding-left: 1rem;
        padding-right: 1rem;
      }
 
    </style> ';

  echo '<table id="search1">
          <tr>
            <th class="ab">Class</th>
            <th class="ab">Roll No</th>
            <th class="a">Name</th>
            <th class="a">Gurdian</th>
  
          </tr>';
  foreach ($student as $row) {
    echo "<tr class='tablestyle' id='".$row['id']."' onclick='selectdata(this)';>
            <td>".$row['class']."</td>

            <td>".$row['roll_no']."</td>

            <td>".$row['name']."</td>
            
            <td>".$row['gurdian_name']."</td>

            <td style='visibility: hidden;'>".$row['student_id']."</td>

            <td style='visibility: hidden;'>".$row['total_amount']."</td>

          </tr>";
  }
  echo '</table>';
 }else {
  echo "Search Correctly.";
 }
//  <td style='visibility: hidden;'>".$row['address']."</td>



// if(mysqli_num_rows($student) > 0 ){
//     $output = '
//      <style>
//      .tablestyle:hover {
//       transition: all 0.5s ease;
//       color: #012970;
//       background-color: #d5d9e1;
//     }
//     .a{
//       padding-left: 3rem;
//     padding-right: 3rem;
//     }
//     .ab{
//       padding-left: 1rem;
//     padding-right: 1rem;
//     }
    
//     </style> 


// <table id="search1">
//   <tr>
//   <th class="ab">Class</th>
//     <th class="ab">Roll_no</th>
//     <th class="a">Name</th>
//     <th class="a">Gurdian</th>
    
//   </tr>';
//     while($row = mysqli_fetch_assoc($student)){
//             $select = $row["class"];
//             $select1 = $row["roll_no"];
//             $output .="<tr class='tablestyle' id='$select' onclick='selectdata(this)';><td>{$row["class"]}</td><td>{$row["roll_no"]}</td><td>{$row["name"]}</td><td>{$row["gurdian_name"]}</td><td style='visibility: hidden;'>{$row["address"]}</td></tr>";
//           }
//     $output.="</table>";

//     // mysqli_close($conn);

//     echo $output;
// }else{
//     echo "<h2>racode not find</h2>";
// }

?>