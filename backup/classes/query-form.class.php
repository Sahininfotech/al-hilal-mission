<?php


class admissionQuery extends DatabaseConnection{

    function addFormQuery( $name, $gurdian_name, $email_id, $contact_no, $gender, $previous_school, $previous_class, $admission_class, $address, $district, $police_station, $pin_code, $state, $description, $date){

        $sql = "INSERT INTO `admission_query` ( `name`, `gurdian_name`, `email_id`, `contact_no`,`gender`, `previous_school`, `previous_class`, `admission_class`, `address`, `district`,`police_station`, `pin_code`, `state`, `description`, `date`) VALUES ('$name', '$gurdian_name', '$email_id', '$contact_no', '$gender', '$previous_school', '$previous_class', '$admission_class', '$address', '$district', '$police_station', '$pin_code', '$state', '$description', '$date')";

        $insertrevenueDonation = $this->conn->query($sql);

    }
    
}
?>