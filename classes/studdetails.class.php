<?php



class StudentDetails extends DatabaseConnection{

    function addStudentDetails($class,  $id){
        $sql = "INSERT INTO `student_class` ( `class`,`id`, `date`)VALUES ( '$class', '$id', current_timestamp())";

        $insertQuery =$this->conn->query($sql);
        // echo $insert.$this->conn->error;
        return $insertQuery;
    }
    
    // end addLabTypes function



        // INDEX display start w

        function showStudent(){

            $data = array();    
            $sql = "SELECT * FROM `student` ORDER BY id DESC LIMIT 5";
            $insertEmpQuery = $this->conn->query($sql);
            while($row      = $insertEmpQuery->fetch_array()){
                $data[]	= $row;
            }
            return $data;
    
        }
        // end display




  // INDEX display start w
        
        // function Studenttotalamount(){

        //     $data = array();    
        //     $sql = "SELECT SUM(total_amount) AS 'Total' FROM `student`";
        //     $insertEmpQuery = $this->conn->query($sql);
        //     while($row      = $insertEmpQuery->fetch_array()){
        //         $data[]	= $row;
        //     }
        //     return $data;
    
        // }
        // end display


         // INDEX display start w
        
         function Studenttotalamount(){

            $data = array();    
            $sql = "SELECT SUM(payable_fee) AS 'Total' FROM `student_fees_dtls`";
            $insertEmpQuery = $this->conn->query($sql);
            while($row      = $insertEmpQuery->fetch_array()){
                $data[]	= $row;
            }
            return $data;
    
        }
        // end display



        function previoustotalamount(){

            $data = array();    
            $sql = "SELECT SUM(total_due) AS 'pre_Total' FROM `student_summary`";
            $insertEmpQuery = $this->conn->query($sql);
            while($row      = $insertEmpQuery->fetch_array()){
                $data[]	= $row;
            }
            return $data;
    
        }
        // end display





    // studentclass-1 w

    function showStudentDetails($showstu){
        $sql = "SELECT * FROM `student` WHERE `class` = '$showstu'";

        $studentTypeQuery = $this->conn->query($sql);

        $rows = $studentTypeQuery->num_rows;

        if ($rows == 0) {
        return 0;
        }else{
        while ($result = $studentTypeQuery->fetch_array()) {
        $data[] = $result;
        }
        return $data;
        }
    }
    // end studentDetails function



    // studentclass-1 w

    function showStudentmarkDetails($showstu, $showstream){
        $sql = "SELECT * FROM `student` WHERE `class` = '$showstu' and `stream` = '$showstream'";

        $studentTypeQuery = $this->conn->query($sql);

        $rows = $studentTypeQuery->num_rows;

        if ($rows == 0) {
        return 0;
        }else{
        while ($result = $studentTypeQuery->fetch_array()) {
        $data[] = $result;
        }
        return $data;
        }
    }
    // end studentDetails function







    // studentclass-1 w

    function showExamdata($showstu, $showexam){
    // $sql = "SELECT * FROM `subject_marks` WHERE `class_id` = '$showstu' LIKE 'Final_Exams'";
        $sql = "SELECT * FROM `subject_marks` WHERE `class_id` LIKE '$showstu' AND `exam_id` LIKE '$showexam' ORDER BY id DESC ";

        $studentTypeQuery = $this->conn->query($sql);

        $rows = $studentTypeQuery->num_rows;
        if ($rows == 0) {
        return 0;
        }else{
        while ($result = $studentTypeQuery->fetch_array()) {
        $data[] = $result;
        }
        return $data;
        }
    }
    // end studentDetails function





    function countStudentrow($academic){

        $data = array();
        $sql = "SELECT * FROM `student` WHERE `academic_year`= '$academic'";
        $studentTypeQuery = $this->conn->query($sql);
        $rows = $studentTypeQuery->num_rows;
        if ($rows > 0) {
            while ($result = $studentTypeQuery->fetch_array()) {
                $data[] = $result;
        }
        return $data;
        }

    }
   





    // studentclass-1 w

    function showStudentsubjectDetails($showsubject){

        $sql = "SELECT * FROM `class_subject` WHERE `subject` = '$showsubject'";

        $studentTypeQuery = $this->conn->query($sql);
        $rows = $studentTypeQuery->num_rows;
        if ($rows == 0) {
        return 0;
        }else{
        while ($result = $studentTypeQuery->fetch_array()) {
        $data[] = $result;
        }
        return $data;
        }
    }
    // end studentDetails function





    // studentclass w

    function showStudentsubjectDetails1($showstu){

        $sql = "SELECT * FROM `class_subject` WHERE `class_id` = '$showstu'";

        $studentTypeQuery = $this->conn->query($sql);
        $rows = $studentTypeQuery->num_rows;
        if ($rows == 0) {
        return 0;
        }else{
        while ($result = $studentTypeQuery->fetch_array()) {
        $data[] = $result;
        }
        return $data;
        }
    }

    // end studentDetails function


        // studentclass w

        function showStudentsubjectstream($stream, $showstu){

            $sql = "SELECT * FROM `class_subject` WHERE `stream` = '$stream' and `class_id` = '$showstu'";
    
            $studentTypeQuery = $this->conn->query($sql);
            $rows = $studentTypeQuery->num_rows;
            if ($rows == 0) {
            return 0;
            }else{
            while ($result = $studentTypeQuery->fetch_array()) {
            $data[] = $result;
            }
            return $data;
            }
        }
    
        // end studentDetails function




    // studentclass-1 w

    function finalexammarks($showstu){

        $sql = "SELECT * FROM `student` WHERE `class` = '$showstu'";

        $studentTypeQuery = $this->conn->query($sql);
        $rows = $studentTypeQuery->num_rows;
        if ($rows == 0) {
        return 0;
        }else{
        while ($result = $studentTypeQuery->fetch_array()) {
        $data[] = $result;
        }
        return $data;
        }

    }

    // end studentDetails function







    function showStudenttotal(){

        $empData = array();

        $sql = "SELECT * FROM `student_class` ";

        $empQuery = $this->conn->query($sql);

        while($rowtotal = $empQuery->fetch_array()){    

        $empData[]	= $rowtotal;
        }

        return $empData;

    }









    //order by ta 1234 por por korta studentmanagement-studentdetails
    function showStudentDetails1(){
        $empData = array();

        $sql = "SELECT * FROM `class` ORDER BY id ";
      
        $empQuery  = $this->conn->query($sql);
        // $rows = $empQuery->num_rows;

        while($row = $empQuery->fetch_array()){    

        $empData[] = $row;
        }

        return $empData;

    }





    //order by ta 1234 por por korta studentmanagement-studentdetails
    function finalExampage($showstu, $year){
       
        $empData = array();

        $sql = "SELECT * FROM `exam` WHERE `class_name` = '$showstu' and `year` = '$year' ORDER BY class_name";
        //  * FROM `student` WHERE `class` LIKE '6' ORDER BY class;
        // stu.* FROM student stu , student_class stuc where stu.class=stuc.class;
        // stu.*,stuc.class FROM student stu , student_class stuc where stu.class=stuc.class;
        $empQuery   = $this->conn->query($sql);

        while($row  = $empQuery->fetch_array()){    

        $empData[]	= $row;
        }

        return $empData;

    }





    
    
    
    //order by ta 1234 por por korta studentmanagement-studentdetails
    function Exampage($showstu){
        $empData = array();
        $sql = "SELECT * FROM `subject_marks` WHERE `subject_marks`.`id` = '$showstu'";
        $result1 = $this->conn->query($sql);
        $empQuery   = $this->conn->query($sql);

        while($row  = $empQuery->fetch_array()){    

        $empData[]	= $row;
        }

        return $empData;
    }




    function deletemark($Id){

        $sqldal = "DELETE FROM `subject_marks` WHERE  `subject_marks`.`id` = '$Id'";

        $result1 = $this->conn->query($sqldal);

        return $result1;

    }
    






    // update start w

    function studetnA($id){

        $sql2 = "UPDATE `student` SET `status` = 'inactive' WHERE `student`.`id` = '{$id}'";

        $result2 = $this->conn->query($sql2);

        return $result2;
    }
    
    //end updateEmp function






    //updatePage start w

    function updatestudent($Id){

        $sql = "SELECT * FROM student WHERE `student`.`id` = '$Id'";

        $result1 = $this->conn->query($sql);

        return $result1;
    }

    // end updatePage





    // SELECT COUNT(class) FROM student WHERE `student`.`class` = 1;
    // SELECT COUNT(class) FROM student ORDER BY 'class';

    // function totalclass(){

    //     $sql="SELECT class AS 'class', SUM(class) AS 'Total' FROM `student` ORDER BY 'class'";

    //     $result = $this->conn->query($sql);

    //     return $result;


    // }

    



    function totalclass($class){


        $sql = "SELECT COUNT(class) FROM student WHERE `student`.`class` ='$class' ";
        
        $result = $this->conn->query($sql);

        return $result;

        }






        //class action update start w

        function marksupdate($student_roll, $marks, $exam_id, $id){

            $sqledit = "UPDATE  `subject_marks` SET `student_roll` = '{$student_roll}', `marks`= '{$marks}', `exam_id`= '{$exam_id}', `id`= '{$id}' WHERE `subject_marks`.`id` = '{$id}'";
    
            $result1 = $this->conn->query($sqledit);
    
            return $result1;
    
        }
    
        //end updateEmp function



         // revenue search w

         function searchStudent($search_value){

            $data = array();
            $sql ="SELECT * FROM `student_fees_dtls` WHERE `student_fees_dtls`.`name` LIKE '%$search_value%' or `student_fees_dtls`.`roll_no` LIKE '%$search_value%' or `student_fees_dtls`.`class` LIKE '%$search_value%'";
            
            $result = $this->conn->query($sql);
            $rows = $result->num_rows;
            if ($rows > 0) {
                while ($row = $result->fetch_array()) {
                    $data[] = $row;
                }
            }
            return $data;
            
             
        }

      // revenue search end w





      
        // revenue search w

        function searchfees($dues){

            $data = array();
            $sql ="SELECT * FROM `student_payment_summary` WHERE `student_id` = '$dues'";
            
            $result = $this->conn->query($sql);
            $rows = $result->num_rows;
            if ($rows > 0) {
                while ($row = $result->fetch_array()) {
                    $data[] = $row;
                }
            }
            return $data;
            
             
        }

      // revenue search end w




               
    //departnemt action update start w

    function studentaction($name, $status, $email, $class, $roll_no, $address, $id, $c_image){

        $sqledit = "UPDATE  `student` SET `name` = '$name', `status` = '$status', `email`= '$email', `class`= '$class', `roll_no`= '$roll_no', `address`= '$address', `id`= '$id', `image`= '$c_image'  WHERE `student`.`id` = '$id'";

        $result1 = $this->conn->query($sqledit);

        return $result1;

    }

    //end updateEmp function


    
    function showStudentmark($subject_id, $student_id, $session, $class){

        $sql = "SELECT marks FROM `subject_marks` WHERE `subject_id` = '$subject_id' and `student_id` = '$student_id' and `session` = '$session' and `class_id` = '$class' ";
    $studentTypeQuery = $this->conn->query($sql);
    $rows = $studentTypeQuery->num_rows;
    if ($rows == 0) {
    return 0;
    }else{
    while ($result = $studentTypeQuery->fetch_array()) {
    $data[] = $result;
    }
    return $data;
    }
}



    
function Studentmarktotal($student_id, $session, $class){

    $sql = "SELECT  SUM(marks) AS 'Total' FROM `subject_marks` WHERE `student_id` = '$student_id' and `session` = '$session' and `class_id` = '$class' ";
$studentTypeQuery = $this->conn->query($sql);
$rows = $studentTypeQuery->num_rows;
if ($rows == 0) {
return 0;
}else{
while ($result = $studentTypeQuery->fetch_array()) {
$data[] = $result;
}
return $data;
}
}




       // status start w

       function studentactive($id){

        $sql2 = "UPDATE `student` SET `status` = 'active' WHERE `student`.`id` = '$id'";

        $result2 = $this->conn->query($sql2);

        return $result2;
    }
    
    //end status function




     // studentclass-1 w

     function Studentmark($showstu){
        $sql = "SELECT * FROM `student` WHERE `student_id` = '$showstu'";

        $studentTypeQuery = $this->conn->query($sql);

        $rows = $studentTypeQuery->num_rows;

        if ($rows == 0) {
        return 0;
        }else{
        while ($result = $studentTypeQuery->fetch_array()) {
        $data[] = $result;
        }
        return $data;
        }
    }
    // end studentDetails function





    function numberOfClass($showstu, $stream){

        $sql = "SELECT COUNT(class_id) as classnumber FROM `class_subject` WHERE `class_id` = '$showstu' and `stream` = '$stream'";

        $studentTypeQuery = $this->conn->query($sql);
        $rows = $studentTypeQuery->num_rows;
        if ($rows == 0) {
        return 0;
        }else{
        while ($result = $studentTypeQuery->fetch_array()) {
        $data[] = $result;
        }
        return $data;
        }
    }






    // SELECT COUNT(class_name) FROM `class_subject` WHERE `class_name` = '1' 



    function totalsubject($showstream, $showclass1){

        $data = array();
        $sql = "SELECT * FROM `class_subject` WHERE `stream` = '$showstream' and `class_id` = '$showclass1'";
        $studentTypeQuery = $this->conn->query($sql);
        $rows = $studentTypeQuery->num_rows;
        if ($rows > 0) {
            while ($result = $studentTypeQuery->fetch_array()) {
                $data[] = $result;
        }
        return $data;
        }

    }





}


?>
