<?php
class Database{
  
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "test_api";
    private $username = "root";
    private $password = "";
    public $conn;
  
    // get the database connection
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
    
//     public function getConnection(){
//     
//     $link = mysqli_connect($host, $username, $password, $db_name);
// 
//     if (!$link) {
//         die('Connect Error (' . mysqli_connect_errno() . ') '
//                 . mysqli_connect_error());
//     }
// 
// //     echo 'Success... ' . mysqli_get_host_info($link) . "\n";
// 
//     mysqli_close($link);
//     
//     }
}
?> 
