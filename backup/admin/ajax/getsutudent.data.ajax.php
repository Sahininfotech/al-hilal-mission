<!DOCTYPE html>
<html>
<head>


</head>
<body>
<script>
<?php
//  require_once '../class/revenue.class.php';

//  $staffdetails = new  Revenueclass();

//     if($_SERVER['REQUEST_METHOD'] == 'GET'){
   
//     $name = $_GET["name"];
 

//   $update=$staffdetails->update($name);
//  getElementById("search-Item").value = xmlhttp.responseText;
//  echo
//   }
   
require_once 'connectdb.php';
$data = $_GET['name'];
$query = $mysqli->query("SELECT * FROM `revenue_studentfees` WHERE name like '%".$data."%'");
while ($row = $query -> fatch_assoc()){
    $data[] = $row['nane'];
    echo json_encode($data);
}
    ?>
</script>
</body>
</html>