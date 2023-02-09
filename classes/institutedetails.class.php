<?php





class InstituteDetails extends DatabaseConnection{





    // update start

    function update($email,  $institute_name, $contact_number, $contact_number2, $description){



        $sqledit1 = "UPDATE  `institute_details` SET `institute_name` = '{$institute_name}', `contact_number2` = '{$contact_number2}', `description` = '{$description}', `email`= '{$email}', `contact_number` = '{$contact_number}'";



        $result1 = $this->conn->query($sqledit1);



        return $result1;



    }

    //end updateEmp function











     // updatesession Academic Session

     function updateSession($session){



        $sql = "UPDATE  `institute_details` SET `session` = '$session'";

        $result = $this->conn->query($sql);

        return $result;



    }//enf



 //   exam inshat data start w



 function examInsert( $class_name, $exam_name, $description){



    $sql = "INSERT INTO `exam` (`class_name`, `exam_name`, `description`) VALUES ( '$class_name', '$exam_name', '$description')";



    $insertEmpQuery = $this->conn->query($sql);



    // return $insertEmpQuery;



}



// inshat data end





    // update start w



    function instituteupdate($address,  $post_office, $police_station, $district,  $pin_code, $state){



        $sqledit1 = "UPDATE  `institute_details` SET `address` = '{$address}', `post_office`= '{$post_office}', `police_station` = '{$police_station}', `district` = '{$district}', `pin_code`= '{$pin_code}', `state` = '{$state}'";



        $result1 = $this->conn->query($sqledit1);



        return $result1;



    }

    

    //end updateEmp function









    // update start w



    function princpleupdate($address,  $name, $qualification, $email,  $contact_no){



        $sqledit1 = "UPDATE  `princple_details` SET `address` = '{$address}', `name`= '{$name}', `qualification` = '{$qualification}', `email` = '{$email}', `contact_no`= '{$contact_no}'";



        $result1 = $this->conn->query($sqledit1);



        return $result1;



    }



    //end updateEmp function











    // display start w



    function princpledisplaydata(){



        $empData = array();



        $sql = "SELECT * FROM `princple_details`";



        $empQuery   = $this->conn->query($sql);



        while($row  = $empQuery->fetch_array()){    



        $empData[]	= $row;



        }

        return $empData;



    }



    // end display









    //   class inshat data start w



    function classInsert($classname, $description, $image){

        $descriptions = str_replace("<", "&lt", str_replace(">", "&gt;", str_replace("'", "\\", $description)));

        $sql = "INSERT INTO `class` (`classname`, `description`, `image`) VALUES ( '$classname', '$descriptions', '$image')";



        $insertEmpQuery = $this->conn->query($sql);



    }



    // inshat data end











    //updatePage start w



    function updateclass($Id){



        $sql = "SELECT * FROM class WHERE `class`.`id` = '$Id'";



        $result1 = $this->conn->query($sql);



        return $result1;



    }



    // end updatePage







    //class action update start w



    function classupdate($classname, $description, $id, $c_image){

        $descriptions = str_replace("<", "&lt", str_replace(">", "&gt;", str_replace("'", "\\", $description)));

        $sqledit = "UPDATE  `class` SET `classname` = '$classname', `description`= '$descriptions', `image`= '$c_image' WHERE `class`.`id` = '$id'";



        $result1 = $this->conn->query($sqledit);



        return $result1;



    }



    //end updateEmp function













    //exam delete start w



    function deleteExamdata($Id){



        $sqldal = "DELETE FROM `exam` WHERE  `exam`.`id` = '$Id'";



        $result1 = $this->conn->query($sqldal);



        return $result1;

        

    }

    

    // end deleteDocCat function













    // class delete start w



    function deleteClassdata($Id){



        $sqldal = "DELETE FROM `class` WHERE  `class`.`id` = '$Id'";



        $result1 = $this->conn->query($sqldal);



        return $result1;



    }

    

    // end deleteDocCat function

















    // subject display start w



    function subjectdisplaydata(){



        $empData = array();



        $sql = "SELECT * FROM `class_subject`";



        $empQuery   = $this->conn->query($sql);



        while($row  = $empQuery->fetch_array()){    



        $empData[]	= $row;



        }



        return $empData;



    }



    // end display













    function seletmark($seletstudent_id, $seletsubject_id, $seletclass_id){



        $sql = "SELECT * FROM `subject_marks` WHERE `subject_marks`.`student_id` = '$seletstudent_id' and `subject_marks`.`subject_id` = '$seletsubject_id' and `subject_marks`.`class_id` = '$seletclass_id'";



        $result = $this->conn->query($sql);



        return $result;



    }









    function marksInsert($marks, $session, $student_id, $class_id, $exam_id, $subject_id){







       $sql = "SELECT * FROM `subject_marks` WHERE `subject_marks`.`student_id` = '$student_id' and `subject_marks`.`subject_id` = '$subject_id' and `subject_marks`.`class_id` = '$class_id' and `subject_marks`.`exam_id` = '$exam_id'";

       

        $selectdata   = $this->conn->query($sql);



        $rows = $selectdata->num_rows;



        if ($rows == 0) {

             

            $sql = "INSERT INTO `subject_marks` (`marks`, `session`, `student_id`, `class_id`, `exam_id`, `subject_id`) VALUES ( '$marks', '$session', '$student_id', '$class_id', '$exam_id', '$subject_id')";

    

            $result1 = $this->conn->query($sql);

    

            return "save";

        

          }

            else

            {

                

                $sqledit = "UPDATE  `subject_marks` SET `marks` = '$marks' WHERE  `subject_marks`.`student_id` = '$student_id' and `subject_marks`.`subject_id` = '$subject_id' and `subject_marks`.`class_id` = '$class_id' and `subject_marks`.`exam_id` = '$exam_id'";



                $result1 = $this->conn->query($sqledit);

        

                return "save data update";



            }

            



    }









    // =====================================================







    

    // display start

    function instituteShow(){



        $data = array();

        $sql = "SELECT * FROM `institute_details`";

        $res   = $this->conn->query($sql);

        if ($res->num_rows != 0) {

            while($row  = $res->fetch_array()){    

                $data[]	= $row;

            }

        }

        return $data;



    }





}

?>