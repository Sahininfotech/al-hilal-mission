<?php


class admissionQuery extends DatabaseConnection{

    function addFormQuery( $name, $gurdian_name, $email_id, $contact_no, $gender, $previous_school, $previous_class, $admission_class, $address, $district, $police_station, $pin_code, $state, $description, $date, $status){

        $sql = "INSERT INTO `admission_query` ( `name`, `gurdian_name`, `email_id`, `contact_no`,`gender`, `previous_school`, `previous_class`, `admission_class`, `address`, `district`,`police_station`, `pin_code`, `state`, `description`, `date`, `status`) VALUES ('$name', '$gurdian_name', '$email_id', '$contact_no', '$gender', '$previous_school', '$previous_class', '$admission_class', '$address', '$district', '$police_station', '$pin_code', '$state', '$description', '$date', '$status')";

        $insertrevenueDonation = $this->conn->query($sql);

    }
    
}
?>