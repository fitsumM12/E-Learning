<?php
ini_set('mysqli.connect_timeout',300);
ini_set('default_socket_timeout',3000);
require_once $_SERVER["DOCUMENT_ROOT"]."/elearning/Admin/includes/dbh.inc.php";
class tracker extends elearnDb{
    private $page;
    private $user_ip;
    private $vtime;

    function __construct($page,$usrip,$vtime)
    {
        $this->page=$page;
        $this->user_ip=$usrip;
        $this->vtime=$vtime;
    }
    public function trackAllUsrs(){
    if($this->makeConnect()){
        $saveData = "INSERT INTO `tbl_tracker`(`tid`, `page`, `usr_ip`, `vistime`) VALUES(null, '$this->page','$this->user_ip','$this->vtime')";
        //prepare the statement
        $stmt = mysqli_query($this->makeConnect(),$saveData);

    }

    }
    public function getTotalVisits(){
        $visit = "SELECT * FROM tbl_tracker";
        $stmt1 = mysqli_query($this->makeConnect(),$visit);
        return mysqli_num_rows($stmt1);
    }

        public function getUnqVisits(){
        $unvisit = "SELECT distinct(`usr_ip`) FROM tbl_tracker";
        $stmt = mysqli_query($this->makeConnect(),$unvisit);
        return mysqli_num_rows($stmt);
    }

         public function averageCal($a,$d){
             $av=0;
             if($a!=0 && $d!=0){
                        
                $av = ($a/$d)*100;
             }
        return $av;
         }
         public function getVsByDate($mnth){
            $numbOfVs="SELECT * FROM `tbl_tracker` WHERE monthname(`vistime`)='$mnth'";
            $stmt1 = mysqli_query($this->makeConnect(),$numbOfVs);
            return mysqli_num_rows($stmt1);
         }
         // get target user by month
        public function getTrgVsByDate($mnth){
            $numbOfVs = "SELECT distinct(`usr_ip`) FROM tbl_tracker where page = '/elearning/Student/index.php' or page = '/elearning/Admin/index.php' or page = '/elearning/faculty/index.php' AND monthname(`vistime`)='$mnth'";
            $stmt1 = mysqli_query($this->makeConnect(),$numbOfVs);
            return mysqli_num_rows($stmt1);
         }
         public function trgUsr(){
                    $visit = "SELECT distinct(`usr_ip`) FROM tbl_tracker where page = '/elearning/Student/index.php' or page = '/elearning/Admin/index.php' or page = '/elearning/faculty/index.php'";
                    $stmt1 = mysqli_query($this->makeConnect(),$visit);
                    return mysqli_num_rows($stmt1);
         }
         // year
        public function getYr(){
            $numbOfVs="SELECT distinct(`vistime`) FROM `tbl_tracker` WHERE 1";

            $stmt1 = mysqli_query($this->makeConnect(),$numbOfVs);
            return $stmt1;
         }
         //get data by date
        public function datwiseUsr($mnth,$dt){
            $numbOfVs="SELECT * FROM `tbl_tracker` WHERE monthname(`vistime`)='$mnth' AND day(`vistime`)=$dt";
            $stmt1 = mysqli_query($this->makeConnect(),$numbOfVs);
            return mysqli_num_rows($stmt1);
         }
}

class webMetrics{
    private $db;
    function __construct(){
        $this->db = new elearnDb();
    }

        public function getTotalVisits(){
        $visit = "SELECT * FROM tbl_tracker limit 10";
        $stmt1 = mysqli_query($this->db->makeConnect(),$visit);
        return $stmt1;
    }

}

?>