<!-- database connection page -->


<?php



class DatabaseConnection1st{



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

        $this->dbname = 'alhilal_mission';



        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        return $this->conn;

    }





}

// DatabaseConnection end



?>