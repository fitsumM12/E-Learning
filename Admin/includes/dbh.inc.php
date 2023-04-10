<?php
class elearnDb {
private $host = "localhost";
private $user = "root";
private $pass = "";
private $dbName = "elearning";
public function makeConnect(){
    $connDb=mysqli_connect($this->host,$this->user,$this->pass,$this->dbName);
    return $connDb;

}
public function getdbConnect(){
    return $this->makeConnect();
}
}
?>