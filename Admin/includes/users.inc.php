<?php
require_once "dbh.inc.php";
$choose=isset($_GET['p'])?$_GET['p']:'';

class admin
{
    private $db;
    private $admn_id;
    private $ad_fname;
    private $ad_lname;
    private $mail;
    private $contact;
    private $dob;
    public $prmntAdrs;
    public $crntAdrs;
    public $emrgncyMbl;
    public $emrgncyAdrs;
    public $ad_expr;
   function __construct(){
       $this->db = new elearnDb();
   }
    public function setAdId($id)
    {
            $this->admn_id=$id;
    }

    public function getAdId()
    {
            return $this->admn_id;
    }

    public function setAdfname($fname)
    {
                $this->ad_fname=$fname;
    }

    public function getAdfname()
    {
            return $this->ad_fname;
    }


    public function setmail($email)
    {
        $this->mail=$email;
    }
    public function getmail()
    {
    return $this->mail;
    }
    public function setContact($contact)
    {
        $this->contact=$contact;
    }
    public function getContact()
    {
        return $this->contact;
    }

    public function setExpr($ad_expr)
    {
        $this->ad_expr=$ad_expr;
    }
    public function getExpr()
    {
        return $this->ad_expr;
    }

    public function addAdmin()
    {
        if(isset($_POST['addAdmin_btn']))
        {
            $emp_id = $_POST['hgr_officials'];
            $admn_pass = $_POST['tempopass'];
            $admin_name='';
            $admin_email = '';
            $admin_contact = '';

            $gtEmp = "SELECT * FROM `employee_detail` WHERE  `emp_id` = $emp_id";
            $getda = mysqli_query($this->db->makeConnect(),$gtEmp);
            // $row = mysqli_fetch_assoc($getda)

            // store employee data
             while($row = mysqli_fetch_assoc($getda)){
            $admin_name=$row['emp_name'];
            $admin_email = $row['emp_email'];
            $admin_contact = $row['emp_contact'];
            }

            $insert_data = "INSERT INTO `admin_detail`(`admin_id`, `admin_fname`, `email`, `contact`, `password`,`emp_id`) VALUES (null,'Haile','haile@gmail.com','98391703','$admn_pass',$emp_id)";

            if(mysqli_query($this->db->makeConnect(),$insert_data))
            {
                echo"<script>alert(\"Added succesfully\")";
               echo "window.location.replace(\"admin/index.php\"</script>";

            }
        }

    }
    public function updateAdmInfo()
    {
        $this->setAdId($_POST['ad_id']);
        $this->setAdfname($_POST['ad_name']);
        $this->setAdlname($_POST['ad_lname']);
        $this->setmail($_POST['email']);
        $this->setContact($_POST['contact']);
        $this->setExpr($_POST['expr']);

        $this->admn_id=$this->getAdId();
        $this->ad_fname=$this->getAdfname();
        $this->ad_lname=$this->getAdlname();
        $this->email=$this->getmail();
        $this->contact=$this->getContact();
        $this->ad_expr=$this->getExpr();
        $update = "UPDATE `admin_detail` SET `admin_name`='$this->ad_fname',`email`='$this->email',`contact`='$this->contact',`experience`='$this->ad_expr' WHERE `admin_id`= $this->admn_id";
        $prcs=mysqli_query($this->db->makeConnect(),$update);
        if($prcs)
        {
            echo "<script>alert(\"You updated your info!\")</script>";
        }
        else{
            echo "<script>alert(\"Try it again!\")</script>";
        }

    }
    public function changeProPic($ad_id)
    {

        $this->setAdId($ad_id);
        $this->admn_id=$this->getAdId();
        $filename=$_FILES['prof_pic']['name'];
        $filename = $ad_id.'_'.$filename;
        $fileTempName=$_FILES['prof_pic']['tmp_name'];
        $fileDestination = "upload/".$filename;


        move_uploaded_file($fileTempName,"../../upload/$fileDestination");
        $chng="UPDATE `admin_detail` SET `profile_picture`= '$fileDestination' WHERE  `admin_id`='$this->admn_id'";
        if(mysqli_query($this->db->makeConnect(),$chng))
        {
            echo "<script>alert(\"your profile pic is changed\")</script>";
            header("Location:../index.php");
        }
        else{
            echo "<script>alert(\"sorry try it again\")</script>";
            header("Location:../index.php");
        }

        }

}



/**^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
 * end of admin area
 <>>>>>>>>>>>>>>>>>>>>>>>>>>>><<<<<<<<<<<<<<<<<<<<<<<>>>>>>><<<<<<<<<<<<<<<<<<<<<<<<>>*/

/**
 * Start the teacher management area
 */
class teachers{
    private $db;
    private $tfname;
    private $tmname;
    private $tlname;
    private $tgend;
    private $tmail;
    private $tcontact;
    private $tdob;
    public $tprofilepic;
    public $tmartlStats;
    public $prmntAdrs;
    public $crntAdrs;
    public $emrgncyMbl;
    public $emrgncyAdrs;
    public $rsdentialCert;
    public $btechCert;
    public $mtechCert;
    public $phdCert;

    function __construct()
    {
        $this->db = new elearnDb();
    }
    public function setfname($fname)
    {
                $this->tfname=$fname;
    }

    public function getfname()
    {
            return $this->tfname;
    }
    public function setMdlname($mname)
    {
                $this->tmname=$mname;
    }
    public function getMdlname()
    {
                $this->tmname;
    }
    public function setlname($lname)
    {
        $this->tlname=$lname;
    }
    public function getlname()
    {
        return $this->tlname;
    }

    public function setTmail($email)
    {
        $this->tmail=$email;
    }
    public function getTmail()
    {
    $this->tmail;
    }
    public function setContact($contact)
    {
        $this->tcontact=$contact;
    }
    public function getContact()
    {
        $this->tcontact;
    }
    // Teachers can have the following actions
    protected function registerTeacher()
    {

    }
    public function loginTeacher()
    {

    }
    public function editProfile()
    {

    }
    public function editProfilePic()
    {

    }
    public function forgotPassword()
    {

    }
    public function viewAllotedCourses()
    {

    }
    public function viewSectionAlloction()
    {

    }

        public $sectionId;

        public function viewStudents()
        {

        }
        public function reportAttendance()
        {

        }
        public function reportSemstrMark()
        {

        }

}
class manageTeachers extends teachers
{
    private $course_id;
    public $section_id;
    public $tId;
    public $db;

    function __construct()
    {
        $this->db=new elearnDb();
    }
    public function approveTeachReqst()
    {
        $this->tId = $_POST['teach_id'];
            $approv = "UPDATE faculty_detail SET `emplmntStatus` = 'accepted' WHERE fac_id = '$this->tId'";
            $appTeach = mysqli_query($this->db->makeConnect(),$approv);
            if($appTeach)
            {
                echo "<script>alert(\"You have approved it!\")</script>";
            }
        }

 public function rejectTeachReqst()
    {
        $this->tId = $_POST['teach_id'];
            $approv = "DELETE FROM `faculty_detail` WHERE fac_id = '$this->tId'";
            $appTeach = mysqli_query($this->db->makeConnect(),$approv);
            if($appTeach)
            {
                echo "<script>alert(\"You have Rejected this request!\")</script>";
            }
        }

    public function approveMultpl()
    {
        foreach($_POST['id'] as $faId)
        {
            $approv = "UPDATE `faculty_detail` SET `emplmntStatus`= 'accepted' WHERE `fac_id`= '$faId'";
            $comfirmAp = mysqli_query($this->db->makeConnect(),$approv);
        }
        if($comfirmAp)
        {
            echo "<script>alert(\"succesfully approved!\")</script>";
        }
        else
        {
            echo "<script>alert(\"Something Wrong!\")</script>";
        }
    }
    public function loadTeachers()
    {
        // To load the data from faculty details tbl
        $approvedTeachers = "SELECT * FROM faculty_detail WHERE `emplmntStatus` = 'accepted'";
        $outputOfQuery=mysqli_query($this->db->makeConnect(),$approvedTeachers);
        if($outputOfQuery){
        ?>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Faculty Id</th>
                <th>Faculty Name</th>
                <th>Email</th>
                <th colspan="2" style="text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                        while(($row=mysqli_fetch_assoc($outputOfQuery))>0){
                        ?>
            <tr>
                <td><?php echo $row['fac_id'];?></td>
                <td><?php echo $row['fac_fname']; ?></td>
                <td><?php echo $row['email'];?></td>
                <td><a href="manageTeachers.php?tid=<?php echo $row['fac_id'];?>" onclick="approv();">Edit</a></td>
                <td><a href="manageTeachers.php?tid=<?php echo $row['fac_id'];?>">Block</a> </td>
                <td></td>
            </tr>
            <?php
                        }
                    echo"</tbody>";
                echo "</table>";
            echo "</div>";
        }
    }
    public function blockTeachers()
    {
        foreach($_POST['id'] as $facdId)
        {
            $block = "UPDATE `faculty_detail` SET `emplmntStatus`= 'blocked' WHERE `fac_id`= '$facdId'";
            $comfirmAp = mysqli_query($this->db->makeConnect(),$block);
        }
        if($comfirmAp)
        {
            echo "<script>alert(\"succesfully Blocked!\")</script>";
        }
        else
        {
            echo "<script>alert(\"Something Wrong!\")</script>";
        }
    }
    public function exportExel()
    {
        $fac_details = '';
        $fetchTdata = "SELECT * FROM faculty_detail WHERE `emplmntStatus` = 'pending'";
        $rslt = mysqli_query($this->db->makeConnect(),$fetchTdata);
    if(mysqli_num_rows($rslt)>0)
        {
            $fac_details .='
                <table class="table" bordered="1">
                                <tr style="border:2px solid black;">
                                    <th>Faculty Name</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>DoB</th>
                                    <th>Marital status</th>
                                    <th>PermanentAddress</th>
                                    <th>Current Address</th>
                                    <th>Emergency Mobile</th>
                                    <th>Emergency Email</th>
                                    <th>Emergency Address</th>
                                </tr>';
            while($row = mysqli_fetch_array($rslt))
            {
            $fac_details .= '
                            <tr style="border:1px solid black;">
                                <td>'.$row["fac_fname"].'</td>
                                <td>'.$row["gender"].'</td>
                                <td>'.$row["email"].'</td>
                                <td>'.$row["contact"].'</td>
                                <td>'.$row["dob"].'</td>
                                <td>'.$row["marital_status"].'</td>
                                <td>'.$row["permanent_address"].'</td>
                                <td>'.$row["current_address"].'</td>
                                <td>'.$row["emergency_mobile"].'</td>
                                <td>'.$row["emergency_email"].'</td>
                                <td>'.$row["emergency_address"].'</td>
                            </tr>';
            }
            $fac_details .= '</table>';
            header('Content-Type: application/xls');
            header('Content-Disposition: attachment; filename=download.xls');
            echo $fac_details;
        }
    }
}

// end of teacher management

/**
 * start of student management
 */

class student{
    private $db;
    private $stdname;
    private $gend;
    private $mail;
    private $contact;
    private $dob;
    public $profilepic;
    public $martlStats;
    public $prmntAdrs;
    public $crntAdrs;
    public $emrgncyMbl;
    public $emrgncyAdrs;
    public $rsdentialCert;

    function __construct(){
        $this->db = new elearnDb();
    }

    public function setstdname($name)
    {
                $this->stdname=$name;
    }

    public function getstdname()
    {
            return $this->stdname;
    }


    public function setmail($email)
    {
        $this->mail=$email;
    }
    public function getmail()
    {
    return $this->mail;
    }
    public function setContact($contact)
    {
        $this->contact=$contact;
    }
    public function getContact()
    {
        return $this->contact;
    }
    // Teachers can have the following actions
    protected function registerstudent()
    {

    }
    public function loginStudent()
    {

    }
    public function editProfile()
    {

    }
    public function editProfilePic()
    {

    }
    public function forgotPassword()
    {

    }

}
class managestudents extends student
{
    private $course_id;
    public $section_id;
    public $stdId;
    public $db;
    function __construct(){
        $this->db = new elearnDb();
    }
    public function approveStdReqst()
    {
        $this->stdId = $_POST['std_id'];
            $approv = "UPDATE `student_detail` SET status = 'accepted' WHERE std_id = '$this->stdId'";
            $appStd = mysqli_query($this->db->makeConnect(),$approv);
            if($appStd)
            {
                echo "<script>alert(\"You have approved it!\")</script>";
            }
        }

 public function rejectStdReqst()
    {
        $this->stdId = $_POST['std_id'];
            $approv = "DELETE FROM `student_detail` WHERE std_id = '$this->stdId'";
            $appstd = mysqli_query($this->db->makeConnect(),$approv);
            if($appstd)
            {
                echo "<script>alert(\"You have Rejected this request!\")</script>";
            }
        }

    public function approveMultpl()
    {
        foreach($_POST['id'] as $stdId)
        {
            $approv = "UPDATE `student_detail` SET `status`= 'accepted' WHERE `std_id`= '$stdId'";
            $comfirmAp = mysqli_query($this->db->makeConnect(),$approv);
        }
        if($comfirmAp)
        {
            echo "<script>alert(\"succesfully approved!\")</script>";
        }
        else
        {
            echo "<script>alert(\"Something Wrong!\")</script>";
        }
    }
    public function loadstudent()
    {
        // To load the data from faculty details tbl
        $approvedStdts = "SELECT std_id,std_name,email FROM student_detail WHERE status = 'accepted'";
        $outputOfQuery=mysqli_query($this->db->makeConnect(),$approvedStdts);
        if($outputOfQuery){
        ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Student Id</th>
                            <th>Student Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while(($row=mysqli_fetch_assoc($outputOfQuery))>0){
                        ?>
                        <tr>
                            <td><?php echo $row['std_id'];?></td>
                            <td><?php echo $row['std_name'];?></td>
                            <td><?php echo $row['email'];?></td>
                        </tr>
                        <?php
                        }
                    echo"</tbody>";
                echo "</table>";
            echo "</div>";
        }else{
            echo "<script>alert(\"No Records to load\")</script>";
        }
    }
    public function blockStudents()
    {
        foreach($_POST['id'] as $stdId)
        {
            $approv = "UPDATE `student_detail` SET `status`= 'blocked' WHERE `std_id`= '$stdId'";
            $comfirmAp = mysqli_query($this->db->makeConnect(),$approv);
        }
        if($comfirmAp)
        {
            echo "<script>alert(\"succesfully Blocked!\")</script>";
        }
        else
        {
            echo "<script>alert(\"Something Wrong!\")</script>";
        }
    }
    public function exportExel()
    {
        $std_details = '';
        $fetchTdata = "SELECT * FROM student_detail WHERE status = 'pending'";
        $rslt = mysqli_query($this->db->makeConnect(),$fetchTdata);
    if(mysqli_num_rows($rslt)>0)
        {
            $std_details .='
                <table class="table" bordered="1">
                                <tr style="border:2px solid black;">
                                    <th>Full Name</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>DoB</th>
                                    <th>Marital status</th>
                                    <th>PermanentAddress</th>
                                    <th>Current Address</th>
                                    <th>Emergency Mobile</th>
                                    <th>Emergency Email</th>
                                    <th>Emergency Address</th>
                                </tr>';
            while($row = mysqli_fetch_array($rslt))
            {
            $std_details .= '
                            <tr style="border:1px solid black;">
                                <td>'.$row["std_name"].'</td>
                                <td>'.$row["gender"].'</td>
                                <td>'.$row["email"].'</td>
                                <td>'.$row["contact"].'</td>
                                <td>'.$row["dob"].'</td>
                                <td>'.$row["marital_status"].'</td>
                                <td>'.$row["permanent_address"].'</td>
                                <td>'.$row["current_address"].'</td>
                                <td>'.$row["em_mobile"].'</td>
                                <td>'.$row["em_email"].'</td>
                                <td>'.$row["em_address"].'</td>
                            </tr>';
            }
            $std_details .= '</table>';
            header('Content-Type: application/xls');
            header('Content-Disposition: attachment; filename=download.xls');
            echo $std_details;
        }
    }
}


// end of student management

function processor($option)
{
    $admn = new admin();
    $mngTeach = new manageTeachers();
    $mngstd = new managestudents();
    if($option=='updateAdmnInfo')
    {
        $admn->updateAdmInfo();
    }
    else if(isset($_POST['upld_prfl'])){
        $admn->changeProPic($_SESSION['admin_id']);

    }
    else if($option == 'apprvFaculty')
    {
        //start teacher info
        $mngTeach->approveTeachReqst();
    }
    else if($option == 'mapprvFaculty')
    {
        $mngTeach->approveMultpl();
    }
    else if($option=='fetchFaculty')
    {
        $mngTeach->loadTeachers();
    }
    else if(isset($_POST['btn_exportTDataexl']))
    {
    $mngTeach->exportExel();

    }
    else if(isset($_POST['btn_exportTData']))
    {

    echo "Sorry Not able to convert into pdf";
    }
    else if($option=='rjctFaculty')
    {
        $mngTeach->rejectTeachReqst();
    }
    else if($option=='blckFaculty')
    {
        $mngTeach->blockTeachers();
    }

    else if($option == 'apprvStudent')
    {
        //start student info
        $mngstd->approveStdReqst();
    }

    else if($option=='fetchStudent')
    {
        $mngstd->loadstudent();
    }
    else if(isset($_POST['btn_exportTDataexl']))
    {
    $mngstd->exportExel();

    }
    else if(isset($_POST['btn_exportTData']))
    {

    echo "<script>alert(\"Sorry Not able to convert into pdf\")</script>";
    }
    else if($option=='rjctStudent')
    {
        $mngstd->rejectStdReqst();
    }
    else if($option=='mapprvStudent')
    {
        $mngstd->approveMultpl();
    }
    else if($option=='blckStudent')
    {
        $mngstd->blockStudents();
    }

}
processor($choose);
?>