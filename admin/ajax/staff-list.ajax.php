<?php
$search_value = $_POST["search"];

require_once '../../_config/dbconnect.php';
require_once '../../classes/stadetails.class.php';

$staffDetails = new institute();
$staff = $staffDetails->searchStaff($search_value);

 $output = "";


 if (count($staff) >0 ) {
  echo '<style>
       
        .tablestyle{
          white-space: nowrap;
        }
      .a{
        padding-left: 3rem;
        padding-right: 3rem;
        
      }
      .ab{
        padding-left: 1rem;
        padding-right: 1rem;
      }
      .arrow-up {
        width: 0%;
        height: 0;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        border-bottom: 10px solid  #c2dbf1;
        margin-left: 2rem;
        margin-top: -1rem;
      }
    </style> ';

  echo '<div class="arrow-up"></div>
  <table id="search1">
          <tr>  
          <th class="a"></th>                  
          </tr>';
  foreach ($staff as $row) {
  
    
    echo "<tr class='tablestyle' id='".$row['id']."' onclick='selectdatas(this)';>
            

            <td class='p-2'>".$row['name']."</td>

            <td style='visibility: hidden;'>".$row['user_id']."</td>
          
 ";
}
     
  echo '</table>';
 
 }else {
  echo "Search Correctly.";
 }

?>