<?php



class HeadOfAccounts extends DatabaseConnection{


   // inshat dada start w


function headofAccountsadd($head_of_accounts_name, $parent_name, $description){

    $descriptions = addslashes($description);

    $sql = "INSERT INTO `head_of_accounts` (`category`, `parent_category`, `description`, `added_on`) VALUES ('$head_of_accounts_name', '$parent_name','$descriptions', now())";

    $insertGroQuery = $this->conn->query($sql);

    return $insertGroQuery;

}


// display start 

function showCategory(){
    $empData = array();

    $sql = "SELECT * FROM `head_of_accounts`";

    $empQuery   = $this->conn->query($sql);

    while($row  = $empQuery->fetch_array()){    

    $empData[]	= $row;

    }

    return $empData;

}

// end display

// display start 

function parentCategory(){

    $empData = array();

    $sql = "SELECT * FROM `head_of_accounts` WHERE `parent_category` LIKE 0";

    $empQuery   = $this->conn->query($sql);

    while($row  = $empQuery->fetch_array()){    

    $empData[]	= $row;

    }

    return $empData;

}

// end display


//accountById start 

function accountById($Id){

    $sql = "SELECT * FROM head_of_accounts WHERE `head_of_accounts`.`id` = '$Id'";

    $result = $this->conn->query($sql);

    return $result;


}//eof

//accountById start 

function subCategory($parent_category){

    $sql = "SELECT * FROM head_of_accounts WHERE `head_of_accounts`.`parent_category` = '$parent_category'";

    $result = $this->conn->query($sql);

    return $result;


}//eof



function headofAccountsEdit($id, $head_of_accounts_name, $parent_name, $description){

    $descriptions = addslashes($description);

    $sql = "UPDATE  `head_of_accounts` 
            SET `id`             = '$id',
            `category`           = '$head_of_accounts_name',
            `parent_category`    = '$parent_name',
            `description`        = '$descriptions',
            `added_on`           = now()
            WHERE
            `head_of_accounts`.`id` = '$id'";

    $result = $this->conn->query($sql);

    return $result;

}





   // photo delete 

   function delete($Id){



    $sqldal = "DELETE FROM `head_of_accounts` WHERE  `head_of_accounts`.`id` = '$Id'";



    $result1 = $this->conn->query($sqldal);



    return $result1;



}

// end deleteDocCat



//categoryById start 

function categoryById($head_of_accounts){

    $sql = "SELECT * FROM head_of_accounts WHERE `head_of_accounts`.`category_id` = '$head_of_accounts'";

    $result = $this->conn->query($sql);

    return $result;


}//eof



}
?>