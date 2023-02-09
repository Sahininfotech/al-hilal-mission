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

        $this->username = 'activaga__al_hilal_user';

        $this->password = 'bU55-=NXVax-';

        $this->dbname = 'activaga_al_hilal';



        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);







        return $this->conn;







    }



















}







// DatabaseConnection end















?>