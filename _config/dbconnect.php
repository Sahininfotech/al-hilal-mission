<?php



date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)






class DatabaseConnection{












    private $servername;



    private $username;



    private $password;



    private $dbname;



    public $conn;















    public function __construct() {







        $this->db_connect();





      }







    function db_connect(){




        $this->servername = 'localhost';      

        $this->username = 'root';

        $this->password = '';

        $this->dbname = 'al_hilal_mission';



        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);







        return $this->conn;







    }



















}







// DatabaseConnection end















?>