<?php 
require_once('../config/config.php');

class MySQLDatabase{
    private $conn;

    function __construct(){
        $this->open_connection();
    }

    public function open_connection(){
        $this->conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
        if(mysqli_connect_errno()){
            die("Database connection failed: " . 
            mysqli_connect_error() . 
            "(" . mysqli_connect_errno() . ")"
            );
        }  
    }
    public function close_connection(){
        if(isset($this->conn)){
            mysqli_close($this->conn);
            unset($this->conn);
        }
    }

    public function query($sql){
        $result = mysqli_query($this->conn, $sql);
        $this->confirm_query($result);
        return $result;
    }

    private function confirm_query($result){
        if(!$result){
            printf("error:%s\n", mysqli_error($this->conn));
            //die("Database query failed.");
        }
    }

    public function escape_value($string){
        $escaped_string = mysqli_real_escape_string($this->conn, $string);
        return $escaped_string;
    }

    public function fetch_assoc($result_set){
        return mysqli_fetch_assoc($result_set);
    }

    public function prepare($sql){
        return mysqli_prepare($this->conn, $sql);
    }

    public function num_rows($result_set){
        return mysqli_num_rows($result_set);
    }
}

$db = new MySQLDatabase();
$database =& $db;


?>