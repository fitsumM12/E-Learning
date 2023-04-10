<?php
require_once "dbh.inc.php";
class university{
    private $db;
    function __construct(){
        $this->db = new elearnDb();
    }

    function changeLogo()
{

    $file = $_FILES['logoFile'];
    $filename=$_FILES['logoFile']['name'];
    $fileTempName=$_FILES['logoFile']['tmp_name'];
    $fileSize=$_FILES['logoFile']['size'];
    $fileType=$_FILES['logoFile']['type'];
    $fileError=$_FILES['logoFile']['error'];

    $fileEx=explode('.',$filename);
    $actualFileExt=strtolower(end($fileEx));

    $allowedEx=array('ico','png');

        if(in_array($actualFileExt,$allowedEx))
        {
            if($fileError===0){
                if($fileSize< 10000000)
                {
                    // now create a uniqid for a file
                    $unicode =  uniqid('',true);
                    $uniqFileName =$unicode.".".$filename;
                    // now create the destination
                    $fileDestination = "../assets/uploaded_files/".$uniqFileName;
                    move_uploaded_file($fileTempName,$fileDestination);
                    $absPath = explode('../',$fileDestination);
                    $update = "UPDATE `university_details` SET `university_details`.`logo`='$absPath[1]' WHERE 1";

                    $res=mysqli_query($this->db->makeConnect(),$update);
                    if($res)
                    {

                        echo "<script>alert(\"Your logo is changed!\");</script>";
                        header("Location: ../university_details.php?FileUploaded");


                    }else{
                        header("Location: ../university_details.php");
                        echo "<script>alert(\"file is not saved!\");</script>";
                    }
                }
                else{
                    header("Location: ../university_details.php");
                    echo "<script>alert(\"The File Size is too big!\");</script>";

                }

            }else{
                header("Location: ../university_details.php");
                echo("<br><br><br><p>There is Some Error occured!</p>");
            }

    }
        else{
            echo "<script>alert(\"You are allowed to upload of ico or png!\");</script>";
            echo "<script>location.replace(\"../university_details.php\")</script>";
            }
        }

        public function getUniversityDetails(){

            $ud = "SELECT * FROM `university_details` WHERE 1";
            $gtD = mysqli_query($this->db->makeConnect(),$ud);
            return mysqli_fetch_assoc($gtD);
        }

        public function updateUniversity($unvID,$unvName)
        {
            if(!empty($unvID)&&!empty($unvName))
            {
                $updUnv = "UPDATE `university_details` SET `unv_name`='$unvName' WHERE `unv_id`='$unvID'";
                if(mysqli_query($this->db->makeConnect(),$updUnv)){
                    return true;
                }else{
                    return false;
                }
            }
        }
        public function getLogo(){
            $ftch = "SELECT `logo` FROM `university_details` WHERE 1";
            $procss = mysqli_query($this->db->makeConnect(),$ftch);
            return mysqli_fetch_assoc($procss);
        }
        public function changeFavicon(){
            echo "do you want to change favicon please?";
        }
}

$unv = new university();
if(isset($_REQUEST['changeLogo-btn'])){
    $unv->changeLogo();
}

?>