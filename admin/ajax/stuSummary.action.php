<?php
require_once '../../_config/dbconnect.php';
require_once '../../classes/admin.class.php';
require_once '../../classes/studdetails.class.php';
require_once '../../classes/institutedetails.class.php';
require_once '../../classes/studdetails.class.php';
require_once '../../classes/fees-accounts.class.php';
require_once '../../classes/student.class.php';

$Admin                  = new Admin();
$Institute              = new InstituteDetails();                                
$StudentDetails         = new StudentDetails();
$FeesAccount            = new FeesAccount();
$Student                = new  Student();   

$insertEmpQuery=false;

  if(isset ( $_POST["Submitdata"])){

    $name           = $_POST["name"];
    $student_id          = $_POST["student_id"];
   
    $roll_no     = $_POST["roll_no"];
    $address         = $_POST["address"];
    $contact          = $_POST["contact"];
    // $stream         = '';
    // if (isset($_POST["stream"])) {
        $stream         = $_POST["stream"];
    // }
    $post_office        = $_POST["post_office"];
    $police_station = $_POST["police_station"];
    $gurdian       = $_POST["gurdian"];
    $sdo            = $_POST["sdo_or_bdo"];
    $total_amount       = $_POST["total_amount"];
    $total_due          = $_POST["total_due"];
  
    $pin_code  = $_POST["pin_code"];
    $academic_year  = $_POST["academic_year"];
    $state        = $_POST["state"];

    $district      = $_POST["district"];

    $date_of_birth  = $_POST["date_of_birth"];
    $dded_by  = $_POST["dded_by"];
    $added_on        = $_POST["added_on"];

    $date      = $_POST["date"];

    $exam_status      = $_POST["exam_status"];

    $new_class      = $_POST["newclass"];

// natsort($student_id);
//   rsort($student_id);
print_r($student_id);


    function arr($student_id, $total_marks){
        return "$student_id = $total_marks";
    }
   
    $total_mark      = $_POST["totalmark"];
    $total_marks      = $_POST["totalmark"];
     rsort($total_mark);
    //  rsort($name);
    // rsort($name);
    
   $data = array_map(null, $total_marks, $student_id);
//    $datas = array_map('arr', $name, $total_marks);
    rsort($data);
//    print_r($data);
   


$i         = 1;
$prevScore = 0;

foreach ( $data as &$grade ) {
  // Increment rank only if scores different
  if( $total_marks != $prevScore ){
    
  }

  $prevScore = $total_marks;
 $grade[ 'rank' ] = $i;
  $i++;
}



$dataone = array_map(null, $total_marks, $student_id);
//    $datas = array_map('arr', $name, $total_marks);
rsort($dataone);
//    print_r($data);






    // $rank=1;

        // print_r($total_mark);
        // rsort($total_mark);
        //   $arrlength = count($total_mark);
        //     $rank = 1;
        //     $rt=0;
    // print_r($total_mark[0]);

//     for($x = 0; $x < $total_mark; $x++){
//         for($y = 0; $y < $total_mark - $x - 1 ; $y++){
//  if ($total_mark)
//         }
//     }

     
    // $numbers = array($total_mark);
    

    



//     $arrlength = count($total_mark);
//     $rank = 1;
//     $rt=0;
//     for($x = 0; $x < $arrlength; $x++) {
//     if ($x==0) {
        
//    echo $a = $rank;
//     }

//     elseif ($total_mark[$x] != $total_mark[($x-1)]) {

//         echo  $a = $rank;
//     $rt=$rank;
//     }
//     else{
//         echo  $a = $rt;
//     }
//     $rank++;
//     echo "<br>";
//     }


    // rsort($numbers);

    // exit;
    

    for ($i = 0; $i < count($name); $i++)  {

        for ($i = 0; $i < count($student_id); $i++)  {

            for ($i = 0; $i < count($roll_no); $i++)  {

                for ($i = 0; $i < count($address); $i++)  {

                    for ($i = 0; $i < count($contact); $i++)  {

                        for ($i = 0; $i < count($stream); $i++)  {

                            for ($i = 0; $i < count($post_office); $i++)  {

                                for ($i = 0; $i < count($police_station); $i++)  {
                        
                                    for ($i = 0; $i < count($gurdian); $i++)  {
                        
                                        for ($i = 0; $i < count($sdo); $i++)  {
                        
                                            for ($i = 0; $i < count($total_amount); $i++)  {
                        
                                                for ($i = 0; $i < count($total_due); $i++)  {

                                                    for ($i = 0; $i < count($pin_code); $i++)  {

                                                        for ($i = 0; $i < count($academic_year); $i++)  {
                                                
                                                            for ($i = 0; $i < count($state); $i++)  {
                                                
                                                                for ($i = 0; $i < count($district); $i++)  {
                                                
                                                                    for ($i = 0; $i < count($date_of_birth); $i++)  {
                                                
                                                                        for ($i = 0; $i < count($dded_by); $i++)  {

                                                                            for ($i = 0; $i < count($added_on); $i++)  {
                                                
                                                                                for ($i = 0; $i < count($date); $i++)  {
                                                                                    for ($i = 0; $i < count($exam_status); $i++)  {

                                                                                        for ($i = 0; $i < count($new_class); $i++)  {
                                                                                            for ($i = 0; $i < count($data); $i++)  {
                                                                                                // for ($i = 0; $i < count($total_mark); $i++)  {
                                                                                                    for ($i = 0; $i < count($dataone); $i++)  {
                                                                                
        
         $names            = $name[$i];
         $student_ids      = $student_id[$i];
         $roll_nos            = $roll_no[$i];
         $addresss      = $address[$i];
         $contacts            = $contact[$i];
         $streams      = $stream[$i];

         $post_offices            = $post_office[$i];
         $police_stations      = $police_station[$i];
         $gurdians            = $gurdian[$i];
         $sdos      = $sdo[$i];
         $total_amounts            = $total_amount[$i];
         $total_dues      = $total_due[$i];

         $pin_codes            = $pin_code[$i];
         $academic_years      = $academic_year[$i];
         $states            = $state[$i];
         $districts      = $district[$i];
         $date_of_births            = $date_of_birth[$i];
         $dded_bys      = $dded_by[$i];

         $added_ons            = $added_on[$i];
         $dates      = $date[$i];
         
         $Status      = $exam_status[$i];
         $newclass      = $new_class[$i];
         $ranks      = $data[$i];


         $ranksdata      = $dataone[$i];
        //  $marktotal      = $total_mark[$i];
      
         $class   = $_POST["class"];
         $session  = $_POST["session"];

         $result=$Student->studentsummaryadd($names, $student_ids, $roll_nos, $addresss, $contacts, $streams, $post_offices, 
         $police_stations, $gurdians, $sdos, $total_amounts, $total_dues,    
         $pin_codes, $academic_years, $states, $districts, $date_of_births,    
         $dded_bys, $added_ons, $dates, $class, $Status); 

         if($class == "12"){
      $results=$Student->studentdelect($class);
    }
    else
    {








// echo $newclass;



// print_r($student_id);


        // echo $rank;
        // for ($i = 0; $i < count($ranks); $i++)  {
        //     $rankss      = $ranks[$i];
        // $prev=$rankss[0];
        // foreach($ranks as $number){
        //   if($prev!=$number){
        //     $prev=$number;
        //     $ranks1++;
        //     // break;
        //   }
        //   echo  $ranks1."\n";
          $results=$Student->changedata($newclass, $class, $session, $student_ids);

          foreach ($ranksdata as $values) {
            // echo $values, "\n";
        }
        // echo $values;
        // print_r($values);
        // for ($i = 0; $i < count($values); $i++)  {
        //     $valuesff      = $values[$i];
        //     // echo $valuesff;
        // }   
        
                // print_r($data);
                foreach ($ranks as $rank) {
                    // echo $value, "\n";
                }

          $results=$Student->changedataroll($values, $rank);
        // }}
        // echo  $ranks1."\n";
        // for($x = 0; $x < $arrlength; $x++) {
        // if ($x==0) {
        // echo $total_mark[$x]."- Rank".($rank);
        // }
    
        // // elseif ($total_mark[$x] != $total_mark[($x-1)]) {
    
        // // echo $total_mark[$x]."- Rank".($rank);
        // // $rt=$rank;
        // // }
        // // else{
        // // echo $total_mark[$x]."- Rank".($rt);
        // // }
        // $rank++;
        // echo "<br>";
  
       
        // for($x = 0; $x < $arrlength; $x++) {
        //     if ($x==0) {
        //          echo $numbers[$x]."- Rank".($rank);
                // $results=$Student->changedata($newclass, $class, $session, $student_ids, $rank);
        //     }
        
        //    elseif ($numbers[$x] != $numbers[($x-1)]) {
        
        //             echo $numbers[$x]."- Rank".($rank);
        //             // $results=$Student->changedata($newclass, $class, $session, $student_ids, $rank);
        //             $rt=$rank;
        //            }
        //    else{
        //         echo $numbers[$x]."- Rank".($rt);
        //         // $results=$Student->changedata($newclass, $class, $session, $student_ids, $rt); 
        //             }
        //       $rank++;
       
         
        // }

        // exit;

        //  $results=$Student->changedata($newclass, $class, $session, $student_ids); 
    }
        }}}}}}

    }}}}}}

}}}}}}}}}}}
  }         }
//   exit;  

  if($result & $results){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else{
    header('Location: ' . $_SERVER['HTTP_REFERER']);                            
    }
?>