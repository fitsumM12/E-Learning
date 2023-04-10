<?php
      class Connection{
        private $server_name = "localhost";
        private  $user_name = "root";
        private $password = "";
        private $db_name = "elearning";
       
        // methods for establishing a  connection
        public function makeConnnection(){
        $conn = new mysqli($this->server_name, $this->user_name, $this->password, $this->db_name);
        if($conn->connect_errno)
        {
            echo "Connection failed";
            return;
        }
        else
        {
            return $conn;
        } 
      }
    }
// creating an object to establish the connection
$createConnection = new Connection();
$conn = $createConnection->makeConnnection();    
?>