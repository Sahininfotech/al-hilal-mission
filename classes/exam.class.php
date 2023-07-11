<?php



class Examination extends DatabaseConnection{



    

    



    //addExam start

    function addExam($class_name, $exam_name, $description, $year, $max_marks){



        $sql = "INSERT INTO `exam` (`class_name`, `exam_name`, `description`, `year`, `max_marks`)

                            VALUES 

                            ('$class_name', '$exam_name', '$description', '$year', '$max_marks')";

        $insertEmpQuery = $this->conn->query($sql);

        return $insertEmpQuery;

        

    }//eof





    //showExams start

    function showExams(){



        $empData = array();

        $sql = "SELECT * FROM `exam`";

        $empQuery   = $this->conn->query($sql);

        while($row  = $empQuery->fetch_array()){

            $empData[]	= $row;

        }

        return $empData;



    }//eof





    

    //updateExam start

    function examById($Id){



        $sql = "SELECT * FROM exam WHERE `exam`.`id` = '$Id'";

        $res = $this->conn->query($sql);

        return $res;



    }//eof









    //examupdate update start



    function examupdate($exam_name, $description, $class_name, $max_marks, $id){



        $sqledit = "UPDATE  `exam` SET `exam_name` = '$exam_name', `description`= '$description', `class_name` = '$class_name', `max_marks` = '$max_marks' WHERE `exam`.`id` = '$id'";



        $result1 = $this->conn->query($sqledit);



        return $result1;



    }//end examupdate

    





    function examByClassName($className, $year){



        $data = array();

        $sql = "SELECT * FROM `exam` WHERE `class_name` = '$className' and `year` = '$year' ORDER BY class_name";

        $res   = $this->conn->query($sql);

        if ($res->num_rows != 0 ) {   

            while($row  = $res->fetch_array()){    

                

                $data[]	= $row;

            }

        }

        return $data;

        

    }

    // SELECT * FROM `exam` WHERE `class_name` = '4' and `year` = '2022-2023' ORDER BY class_name





    function deleteExam($examId){



        $sql = "DELETE FROM `exam` WHERE  `id` = '$examId'";

        $res = $this->conn->query($sql);

        return $res;





    }

        

        
    //addExam start
    function percentageType($rank_type, $min_marks, $max_marks, $result_type, $session){

        $sql = "INSERT INTO `percentage_marks` (`rank_type`, `min_percentage`, `max_percentage`, `char`, `session`)
                            VALUES 
                            ('$rank_type', '$min_marks', '$max_marks', '$result_type', '$session')";
        $insertEmpQuery = $this->conn->query($sql);
        return $insertEmpQuery;
        
    }//eof



    //showExams start
    function showPercen($rank_type){

        $empData = array();
        $sql = "SELECT * FROM `percentage_marks` WHERE `percentage_marks`.`rank_type` = '$rank_type'";
        $empQuery   = $this->conn->query($sql);
        while($row  = $empQuery->fetch_array()){
            $empData[]	= $row;
        }
        return $empData;

    }//eof  



          // updatesession Academic Session
          function updatepassMarks($type, $marks, $session, $id){

            $sql = "UPDATE `pass_marks` SET `type` = '$type', `marks` = '$marks', `session` = '$session' where `id` = '$id'";
            $result = $this->conn->query($sql);
            return $result;
    
        }//enf
    
    
          // display start
          function passMarkshow($type){
    
            $data = array();
            $sql = "SELECT * FROM `pass_marks` WHERE `type` = '$type'";
            $res   = $this->conn->query($sql);
            if ($res->num_rows != 0) {
                while($row  = $res->fetch_array()){    
                    $data[]	= $row;
                }
            }
            return $data;
    
        }




    //showExams start
    function passmarks($type){

        $empData = array();
        $sql = "SELECT * FROM `pass_marks` WHERE `pass_marks`.`type` = '$type'";
        $empQuery   = $this->conn->query($sql);
        while($row  = $empQuery->fetch_array()){
            $empData[]	= $row;
        }
        return $empData;

    }




    function addgrade($nim_marks, $max_marks, $grade_name, $full_name){

        $sql = "INSERT INTO `grade` (`Min_marks`,`Max_marks`, `grade_mane`, `particular_name`, `added_on`)           
        VALUES ('$nim_marks', '$max_marks', '$grade_name', '$full_name', current_timestamp())";
        
        $insertEmpQuery = $this->conn->query($sql);
        
        return $insertEmpQuery;
        
        
    }



    //showExams start
    function showgrade(){

        $empData = array();
        $sql = "SELECT * FROM `grade`";
        $empQuery   = $this->conn->query($sql);
        while($row  = $empQuery->fetch_array()){
            $empData[]	= $row;
        }
        return $empData;

    }





    //gradeById start

    function gradeById($Id){



        $sql = "SELECT * FROM grade WHERE `grade`.`id` = '$Id'";

        $res = $this->conn->query($sql);

        return $res;



    }//eof



      //gradeupdate update start



      function gradeupdate($min_marks, $max_marks, $grade, $full_name, $id){



        $sqledit = "UPDATE  `grade` SET `Min_marks` = '$min_marks', `Max_marks`= '$max_marks', `grade_mane` = '$grade', `modified_on` = now(), `particular_name` = '$full_name' WHERE `grade`.`id` = '$id'";



        $result1 = $this->conn->query($sqledit);



        return $result1;



    }//end gradeupdate




    function gradeExam($gradeId){



        $sql = "DELETE FROM `grade` WHERE `id` = '$gradeId'";

        $res = $this->conn->query($sql);

        return $res;





    }



    function overalMarks($marks, $class_name, $classId){

        $sqledit = "UPDATE `class` SET `overall_pass_marks` = '$marks' WHERE `class`.`ids` = '$classId' and `class`.`classname` = '$class_name'";

        $result = $this->conn->query($sqledit);

        return "OVERALL MARKS UPDATED";

    }


    

    
    function subjectpassMarks($marks, $class_name, $classId, $class_ids){

        $sqledit = "UPDATE `class_subject` SET `subject_pass_marks` = '$marks' WHERE `class_subject`.`id` = '$classId' and `class_subject`.`class_id` = '$class_ids' and `class_subject`.`subject` = '$class_name'";

        $result = $this->conn->query($sqledit);

        return "SUBJECT MARKS UPDATED";

    }




       //showExams start
       function subjectMark($class, $subjectshow){

        $exmData = array();
        $sql = "SELECT * FROM `class_subject` WHERE `class_subject`.`class_id` = '$class' and `class_subject`.`subject` = '$subjectshow'";
        $exmQuery   = $this->conn->query($sql);
        while($row  = $exmQuery->fetch_array()){
            $exmData[]	= $row;
        }
        return $exmData;

    }






}

?>