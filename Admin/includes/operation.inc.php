<?php
require_once "dbh.inc.php";
// error_reporting(1);
$choose = isset($_GET['p'])?$_GET['p']:'';
class program{
    private $db;
    private $prog_id;
    public $progName;
    //now to create new program
    function __construct(){
        $this->db = new elearnDb();
    }
    public function createNewProgram(){
        $this->prog_id=$_POST['prog_id'];
        $this->progName=$_POST['progname'];
     if($this->db->makeConnect()){
       $createP="INSERT INTO program (prg_id , prg_name) VALUES ('$this->prog_id', '$this->progName')";
        $res= mysqli_query($this->db->makeConnect(),$createP);
       if($res){
           echo("succesfully done");
       }else{
        die("please try again");
    }
    }else{
        die("check your connection ");
    }
}
//now the following method is for fetching / loadind data
public function displayProg_details(){
    $contents="SELECT * FROM program";
    // --  INNER JOIN school_tbl ON program_detail.school_id = school_tbl.school_code;
    $outputOfQuery=mysqli_query($this->db->makeConnect(),$contents);
    if($outputOfQuery){
        ?>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Program Code</th>
                <th>Program Name</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                    while(($row=mysqli_fetch_assoc($outputOfQuery))>0){
                        ?>
            <tr>
                <td><?php echo $row['prg_id'];?></td>
                <td><?php echo $row['prg_name'];?></td>
                <td id="editpro"><a
                        href="view_programs.php?id=<?php echo $row['prg_id'];?>&progname=<?php echo $row['prg_name'];?>">Edit</a>
                </td>
                <td><a href="view_programs.php?delet_prog_id=<?php echo $row['prg_id'];?>">Delete</a></td>
            </tr>
            <?php
                }
               echo"</tbody></table></div>";
            }
        }

        public function dltProg($pid){
            $dltp = "DELETE FROM `program` WHERE prg_id=$pid";
            $rslt = mysqli_query($this->db->makeConnect(),$dltp);
            if($rslt){
                echo "deleted data";
            }else{
                echo "not deleted try it again";
            }
        }
    }

// program action
class ProgAction
{
    private $db;
    private $progId;
    public $progname;

    function __construct(){
        $this->db = new elearnDb();
    }


    public function editProgram(){

        $this->progId=$_POST['editprogid'];
        $this->progname=$_POST['editprogname'];

        if(!empty($this->progId)){
        // sql query

        $editor = "UPDATE program SET prg_name= '$this->progname' WHERE prg_id='$this->progId'";

        $excut = mysqli_query($this->db->makeConnect(),$editor);

        return $excut;
    }

    }
  public function deleteProgram(){
      $this->progId = $_POST['delet_id'];
      if(!empty($this->progId)){
      $deleter = "DELETE FROM program WHERE prg_id='$this->progId'";
      $deletResult = mysqli_query($this->db->makeConnect(),$deleter);
      return $deletResult;
      }
  }
}

//$paction->editProgram();
function procesProgAction(){
$paction = new ProgAction();
if($paction->editProgram()){
    if($this->excut){
        echo ("<h3>The program is Succesfully updated!</h3>");
    }
    else{
        echo ("<h3>We are sorry,but the program is not updated!</h3>");
    }

}
else if($paction->deleteProgram()){
    if($this->deletResult){
    echo ("<h3>The program is delete</h3>");
    }else{
        echo("<h3>not deleted</h3>");
    }
}else{
    echo("please try again!");
}

}
// end of program action

//________________________________________________________________/
// manage department area
class manageDepartment
{
    private $db;
    private $depart_id;
    public $departName;
    public $prg_id;
    public $depHead;
    public $shool_Id;
    public $duration;

    function __construct(){
        $this->db = new elearnDb();
    }

    public function gnrtdptId($schname)
    {
        $words = explode(" ",$schname);
        $fltrs = "";
        foreach($words as $fw)
        {
            if($fw!='and' || $fw!='And'){
            $fltrs .= $fw[0];
            }
        }
        return strtoupper($fltrs);
    }
    public function createDepart()
    {
        $this->depart_id=$this->gnrtdptId($_POST['departname']);
        $this->departName=$_POST['departname'];
        $this->schlid=$_POST['schl_Id'];
        // write the query for inserting data

            $insertIntoDepart = "INSERT INTO `dpt_detail` (`dpt_id`, `sch_id`, `dpt_name`) VALUES ('$this->depart_id', '$this->schlid', '$this->departName')";
            $insertTo = mysqli_query($this->db->makeConnect(),$insertIntoDepart);
            if($insertTo){
                echo "You've created".$this->departName."department";
            }
            else
            {
                echo $this->depart_id;
            }

        }
    public function loadDepartment()
    {
        // To load the data from school table
        $departContents="SELECT * FROM `dpt_detail`";
        $outputOfQuery=mysqli_query($this->db->makeConnect(),$departContents);
        if($outputOfQuery){
        ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Department Code</th>
                            <th>Department Name</th>
                            <th>The Head Id</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while(($row=mysqli_fetch_assoc($outputOfQuery))>0){
                        ?>
                        <tr>
                            <td><?php echo $row['dpt_id'];?></td>
                            <td><?php echo $row['dpt_name'];?></td>
                            <td><a
                                    href="manage_department.php?id=<?php echo $row['dpt_id'];?>&dep_name=<?php echo $row['dpt_name'];?>">Edit</a>
                            </td>
                            <td><a href="manage_department.php?delet_id=<?php echo $row['dpt_id'];?>">Delete</a></td>

                        </tr>
                        <?php
                        }
                    echo"</tbody>";
                echo "</table>";
            echo "</div>";
        }
    }
    public function editDepartment()
    {
        $this->depart_id=$_POST['departEdit_id'];
        $this->departName = $_POST['depart_name'];
        $editor="";
        if(!empty($this->depart_id)&&!empty($this->departName))
        {
            $editor= "UPDATE `dpt_detail` SET dpt_name = '$this->departName' WHERE dpt_id = '$this->depart_id'";

        }
        $editorResult = mysqli_query($this->db->makeConnect(),$editor);
        if($editorResult){
            echo ("You've succesfully updated this department");
        }else{
            echo "please try again";
        }
    }
    public function dpCombination(){
        $dpt_prg_id=rand(1,1000);
        $this->depart_id=$_POST['depart_Id'];
        $this->prg_id=$_POST['prg_id'];
        $this->duration=$_POST['duration'];
        $conf="SELECT * FROM dpt_program WHERE dpt_id='$this->depart_id' AND schl_id='$this->school_Id' AND prg_id='$this->prg_id'";
        $confResult=mysqli_query($this->db->makeConnect(),$conf);
        if(!(mysqli_num_rows($confResult)>0))
        {
            $insrtTosdp =  "INSERT INTO dpt_program (dpt_prg_id, dpt_id, prg_id, duration) VALUES ('$dpt_prg_id','$this->depart_id', '$this->prg_id','$this->duration')";
            $conf_Insert = mysqli_query($this->db->makeConnect(),$insrtTosdp);
            if($conf_Insert){
                echo ("<script>alert(\"Your Study Program is created!\");</script>");
            }
        }
        else
        {
            echo ("<script>alert(\"This program already exist!\");</script>");
        }
    }
    // to add the semester to a cetrain program
    public function addSemesterToSdp()
    {
        $id=rand(0,10000);
        $semNo = $_POST['semId'];
        foreach($_POST['id'] as $dpt_prg_id)
        {
            $chk = "SELECT * FROM course_allocation WHERE dpt_prg_id=$dpt_prg_id AND semester_status=$semNo";
            $confrmChk = mysqli_query($this->db->makeConnect(),$chk);
            if(!(mysqli_num_rows($confrmChk)>0))
            {
            $addSemester = "INSERT INTO course_allocation(id, crs_id, dpt_prg_id, semester_status) VALUES ($id,'ja862',$dpt_prg_id',$semNo)";
            $confirm=mysqli_query($this->db->makeConnect(),$addSemester);
            }
        }
        if($confirm)
            {
                echo "<script>alert(\"You have succesfully added semester for each programs\")</script>";
            }
            else
            {
                echo "<script>alert(\"Something went wrong!\")</script>";
            }
    }

// end of adding semester to some program

    public function deleteDepartment()
    {
        return ;
    }
}

// end of manage department area

/*
The following area is Student section management area

 */

class section{
    private $db;
    private $sectId;
    public $sectName;
    public $sdpId;

    function __construct(){
        $this->db = new elearnDb();
    }
    public function createSection(){
        $this->sectId = rand(500,1000);
        $this->sectName=$_POST['sectname'];
        $this->sdpId = $_POST['dpt_prg_id'];
        if(!empty($_POST['dpt_prg_id'])){
        $insrt = "INSERT INTO `section_detail` (`sec_id`, `sec_name`, `dpt_prg_id`) VALUES ('$this->sectId', '$this->sectName', '$this->sdpId')";


        $confrInsrt=mysqli_query($this->db->makeConnect(),$insrt);

        if($confrInsrt){
            echo("Your data is saved succesfully");
        }
        }
    }



    // get section by id
        public function getSectById(){
             $slct="SELECT * FROM section_detail";
             $pro = mysqli_query($this->db->makeConnect(),$slct);
             $sections = array();
             if(mysqli_nums_rows($pro)>0){
                 while($row=mysqli_fetch_assoc($pro)){
                     $section[] = $row;
                 }
             }
             return $sections;
    }

    // end
    public function editSection(){
        $this->sectId=$_POST['sect_id'];
        $slct="SELECT * FROM section_detail WHERE sec_id = '$this->sectId'";
        $res=mysqli_query($this->db->makeConnect(),$slct);
        if(mysqli_num_rows($res)>0){
            $this->sectName=$_POST['sect_name'];
            $editor="UPDATE `section_detail` SET `sec_name` = '$this->sectName' WHERE `sec_id` = '$this->sectId'";
            $result=mysqli_query($this->db->makeConnect(),$editor);
            if($result){
                echo("data is Updated succesfully");
            }
        }

    }
    public function removeSection(){
     $sql = "DELETE  from section_detail where sec_id='$sec_id'";
     $delete = mysqli_query($this->db->makeConnect(),$sql);
     if($delete){
         echo 'Section deleted successfully';

     }
     else{
        echo 'deleteion has failed please try again';

     }

    }
    public function loadSection(){
        $contents="SELECT * FROM section_detail WHERE sec_id!=0";
        $outputOfQuery=mysqli_query($this->db->makeConnect(),$contents);
        if($outputOfQuery){
            ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Section Id</th>
                                        <th>Section Name</th>
                                        <th colspan="2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                        while(($row=mysqli_fetch_assoc($outputOfQuery))>0){
                            ?>
                                    <tr>
                                        <td><?php echo $row['sec_id'];?></td>
                                        <td><?php echo $row['sec_name'];?></td>
                                        <td><a
                                                href="manageSection.php?id=<?php echo $row['sec_id'];?>&sec_name=<?php echo $row['sec_name'];?>">Edit</a>
                                        </td>
                                        <td><a href="manageSection.php?delet_id=<?php echo $row['sec_id'];?>">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                    }
                echo"</tbody></table></div>";
                }
        }

    public function addStudToSection()
    {
        $this->sectId=$_POST['sectId'];
        echo $this->sectId;
        foreach($_POST['id'] as $stud_id)
        {
            $upDateStudSect = "UPDATE student_detail SET sec_id = '$this->sectId' WHERE std_id = $stud_id";
            $r=mysqli_query($this->db->makeConnect(),$upDateStudSect);
        }

    }
    public function addSectFacAlloc()
    {
        $this->sectId = $_POST['sect_Id'];
        foreach($_POST['fc_Id'] as $facid)
        {
            $chk = "SELECT * FROM faculty_section_allocation WHERE sec_id = '$this->sectId' AND fac_sec_id = $facid";
            if(!(mysqli_num_rows(mysqli_query($this->db->makeConnect(),$chk))>0))
            {

                $fac_sectId = rand(0,10000);
                $allocSect = "INSERT INTO `faculty_section_allocation`(`fac_sec_id`, `fac_crs_id`, `sec_id`) VALUES ('$fac_sectId','$facid','$this->sectId')";

                $confrmAlloc = mysqli_query($this->db->makeConnect(),$allocSect);
            }
            else
            {
                continue;
            }
        }
        if($confrmAlloc)
        {
            echo "<script>alert(\"Section is succesfully allocated!\");</script>";
        }
        else
        {
            echo "<script>alert(\"We are sorry but try it again!\");</script>";
        }
    }

    /*^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    This area is for fetching the allocatted teachers
    ##################################################################*/
    function deleteAllocatedTeacher($fac_sec_id){

            $fac_id = $fac_sec_id;
            $sql = "DELETE from faculty_section_allocation  where fac_sec_id='$fac_sec_id'";
            $result = mysqli_query($this->db->makeConnect(),$sql);
            if($result){
                echo "<script>aler('operation successfull')</script>";
            }
            else{
               echo "<script>aler('operation failed try again')</script>";

            }

    }
    public function loadAllocTeach()
    {
         // To load the data from faculty details tbl
         $allocTeach = "SELECT * FROM faculty_section_allocation INNER JOIN faculty_course_allocation ON faculty_section_allocation.fac_crs_id=faculty_course_allocation.fac_crs_id
         INNER JOIN faculty_detail ON faculty_course_allocation.fac_id=faculty_detail.fac_id
         INNER JOIN course_detail ON faculty_course_allocation.crs_id=course_detail.crs_id
         INNER JOIN section_detail on faculty_section_allocation.sec_id=section_detail.sec_id";

         $outputOfQuery=mysqli_query($this->db->makeConnect(),$allocTeach);
         if($outputOfQuery){
         ?>
                                    <h2 class="text-primary text-center"> alloacted Teacher</h2>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Faculty Name</th>
                                                    <th>Section Name</th>
                                                    <th>Course name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                         while(($row=mysqli_fetch_assoc($outputOfQuery))>0){
                         ?>
                                                <tr>
                                                    <td><?php echo $row['fac_name'];?></td>
                                                    <td><?php echo $row['sec_name']; ?></td>
                                                    <td><?php echo $row['crs_name'];?></td>
                                                    <td>

                                                        <li
                                                            style="list-style:none;display:inline;border:2px solid white; border-radius:3px">
                                                            <a name="edit" class="text-primary"
                                                                href="manageSection.php?fac_id=<?php echo $row['fac_sec_id'] ?>">edit</a>
                                                        </li>
                                                        <li
                                                            style="list-style:none;display:inline;border:2px solid white;border-radius:3px;">
                                                            <a name="delete" class="text-danger"
                                                                href="manageSection.php?delet_=<?php echo $row['fac_sec_id'] ?>">delete</a>
                                                        </li>
                                                    </td>

                                                </tr>
                                                <?php


                         }
                     echo"</tbody>";
                 echo "</table>";
             echo "</div>";
         }
    }
    }


//\end of section managment

/**********************************************************
The following code is used for school management
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^*/

class manageSchool
{
	private $db;
	private $sch_id;
	public $school_name;
	public $prog_cod;
    public $mngr_Id;

    function __construct()
    {
        $this->db = new elearnDb();
    }
    public function setSchoolId($id)
    {
        $this->sch_id = $id;
    }
    public function getSchoolId()
    {
        return $this->sch_id;
    }
	public function prcsSchlId($id)
	{
		$words = explode(" ", $id);
		$firstWord = "";
		foreach ($words as $w)
		{
			$firstWord .= $w[0];
		}
		return strtoupper($firstWord);
	}
	public function createSchool()
	{
		$this->sch_id=$this->prcsSchlId($_POST['schlname']);
		$this->school_name = $_POST['schlname'];
		$this->prog_cod = $_POST['prg_id'];
		if(!empty($this->sch_id)&&!empty($this->school_name))
		{
		// now write query script
		$creator = "INSERT INTO school_detail(sch_id , sch_name) VALUES ('$this->sch_id','$this->school_name')";
		$checkCreator = mysqli_query($this->db->makeConnect(),$creator);

		if($checkCreator){
			echo ("You have created the school succesfully");
		}
		}
		}
		public function loadSchool()
		{
			// To load the data from school table
			$schoolContents="SELECT * FROM school_detail";
			$outputOfQuery=mysqli_query($this->db->makeConnect(),$schoolContents);
			if($outputOfQuery){
				?>

                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>School Code</th>
                                                                <th>School Name</th>
                                                                <th colspan="2" class="text-center">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
							while(($row=mysqli_fetch_assoc($outputOfQuery))>0){
								?>
                                                            <tr id="<?php echo $row['sch_id']; ?>">
                                                                <td><?php echo $row['sch_id'];?></td>
                                                                <td><?php echo $row['sch_name'];?></td>


                                                                <td><a href="manage_school.php?id=<?php echo $row['sch_id'];?>&school_name=<?php echo $row['sch_name'];?>"
                                                                        class="btn btn-warning">Edit</a></td>

                                                                <td><a href="manage_school.php?delet_schl_id=<?php echo $row['sch_id'];?>"
                                                                        class="btn btn-danger">Delete</a></td>
                                                            </tr>
                                                            <?php
						}
						echo"</tbody></table></div>";
					}
		}
		public function editSchool()
        {
            $this->sch_id=$_POST['sch_id'];
            $this->school_name = $_POST['sch_name'];
            $editor="";
            // $this->mngr_Id = $_POST['mngr_id'];
            if(!empty($this->sch_id)&&!empty($this->school_name))
            {
                $editor= "UPDATE school_detail SET sch_name = '$this->school_name' WHERE sch_id = $this->sch_id";
            }
            $editorResult = mysqli_query($this->db->makeConnect(),$editor);
            if($editorResult){
                echo ("You have Succesfully Updated the data");
            }
        }
        public function deleteSchool($school_iddlt)
        {

            $dltquery = "DELETE FROM school_detail WHERE sch_id = $school_iddlt";
            $dltResult = mysqli_query($this->db->makeConnect(),$dltquery);
            if($dltResult)
            {
                echo ("You have deleted the data");
            }else{
				echo "Sorry,no change is done";
			}
        }
    }


/**
 * end of school managemnet
 */

/**
 * Course managment area start
 */
class manageCourse extends elearnDb
{
    private $db;
    private $course_id;
    public $courseName;
    public $credit_hr;

    function __construct(){
        $this->db = new elearnDb();
    }
    public function createCourse()
    {
        $this->course_id = substr($_POST['coursename'],0,2).(string)rand(0,1000);
        $this->courseName=$_POST['coursename'];
        $this->credit_hr=$_POST['credithr'];
        // write the query for inserting data
            $insertIntoCourse = "INSERT INTO `course_detail`(`crs_id`, `crs_name`, `crs_credit`) VALUES ('$this->course_id', '$this->courseName', '$this->credit_hr')";

            $insertTo = mysqli_query($this->db->makeConnect(),$insertIntoCourse);
            if($insertTo){
                echo "<script>alert(\"You've inserted it succesfully\")</script>";
            }

        }
    public function loadCourse()
    {
        // To load the data from school table
        $courseContents="SELECT * FROM course_detail";
        $outputOfQuery=mysqli_query($this->db->makeConnect(),$courseContents);
        if($outputOfQuery){
        ?>
                                                            <div class="table-responsive">
                                                                <table class="table table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Course Code</th>
                                                                            <th>Course Name</th>
                                                                            <th>Credit Hr</th>
                                                                            <th colspan="2">Actions</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                        while(($row=mysqli_fetch_assoc($outputOfQuery))>0){
                        ?>
                                                                        <tr>
                                                                            <td><?php echo $row['crs_id'];?></td>
                                                                            <td><?php echo $row['crs_name'];?></td>
                                                                            <td><?php echo $row['crs_credit'];?></td>

                                                                            <td><a href="manage_courses.php?crs_id=<?php echo $row['crs_id'];?>&course_name=<?php echo $row['crs_name'];?>&credit_hr=<?php echo $row['crs_credit'];?>"
                                                                                    id="editcrs">Edit</a></td>
                                                                            <td><a
                                                                                    href="manage_courses.php?delet_id=<?php echo $row['crs_id'];?>">Delete</a>
                                                                            </td>

                                                                        </tr>
                                                                        <?php
                        }
                    echo"</tbody>";
                echo "</table>";
            echo "</div>";
        }
    }
    public function editCourse()
    {
        $this->course_id=$_POST['course_id'];
        $this->courseName = $_POST['course_name'];
        $editor="";
        $this->credit_hr = $_POST['credit_hr'];
        if(!empty($this->course_id))
        {
            $editor= "UPDATE course_detail SET crs_name = '$this->courseName', credit='$this->credit_hr' WHERE crs_id = '$this->course_id'";

        }
        $editorResult = mysqli_query($this->db->makeConnect(),$editor);
        if($editorResult){
            echo ("You've succesfully updated this Course");
        }
    }
    /*
    This is to make a course allocation department and semester wise
    */
    public function crsAllocation()
    {
        $id=rand(0,10000);
        $semNo = $_POST['sem_Id'];
        $sdp_id = $_POST['sdp_Id'];
        foreach($_POST['id'] as $crs_id)
        {
            $chk = "SELECT * FROM `course_allocation` WHERE crs_id = '$crs_id' AND dpt_prg_id=$sdp_id AND current_sem=$semNo";
            $confrmChk = mysqli_query($this->db->makeConnect(),$chk);
            if(!(mysqli_num_rows($confrmChk)>0))
            {
            $allocCrs = "INSERT INTO course_allocation(crs_all_id, crs_id, dpt_prg_id, current_sem) VALUES ($id,'$crs_id',$sdp_id,$semNo)";
            $confirm=mysqli_query($this->db->makeConnect(),$allocCrs);
            }
            else
            {
                echo "<script>alert(\"course with \"+$crs_id+\" Id already exist!\")</script>";
            }
        }
        if($confirm)
            {
                echo "<script>alert(\"You have succesfully allocated the course!\")</script>";
            }
            else
            {
                echo "<script>alert(\"Something went wrong!\")</script>";
            }
    }
    public function facultyCrsAllocation()
    {
        $this->course_id = $_POST['crs_Id'];
        foreach($_POST['id'] as $fId)
        {
            $chk = "SELECT * FROM faculty_course_allocation WHERE fac_id = '$fId' AND crs_id = '$this->course_id'";
            if(!(mysqli_num_rows(mysqli_query($this->db->makeConnect(),$chk))>0))
            {
                $allocId = rand(0,10000);
                $allocFac = "INSERT INTO faculty_course_allocation (fac_all_id, fac_id, crs_id) VALUES ($allocId, '$fId', '$this->course_id')";
                $confrmAllocn = mysqli_query($this->db->makeConnect(),$allocFac);
            }
            else
            {
                continue;
            }

        }
        if($confrmAllocn)
        {
            echo "<script>alert(\"Your allocation is succesfully done!\");</script>";
        }
        else
        {
            echo "<script>alert(\"something went wrong!\");</script>";
        }
    }
    public function deleteDepartment()
    {
        return ;
    }
}



/**
 * end of course management area
 */
/**
 * live search or filter starting
 */

class fetch
{
    private $db;
    function __construct(){
        $this->db = new elearnDb();
    }
public function fetchEmplyee(){

$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($this->db->makeConnect(), $_POST["query"]);
 $query = "
  SELECT * FROM employee_details
  WHERE emp_name LIKE '%".$search."%'
  OR emp_email LIKE '%".$search."%'
  OR emp_contact LIKE '%".$search."%'
  OR emp_role LIKE '%".$search."%'";
}
else
{
 $query = "
  SELECT * FROM employee_details ORDER BY emp_id
 ";
}
$result = mysqli_query($this->db->makeConnect(), $query);
if($result){
    if(mysqli_num_rows($result)>0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Name</th>
     <th>Email</th>
     <th>Contact</th>
     <th>Role</th>

    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["emp_name"].'</td>
    <td>'.$row["emp_email"].'</td>
    <td>'.$row["emp_contact"].'</td>
    <td>'.$row["emp_role"].'</td>

   </tr>
  ';
 }
 echo $output;
}
}
else
{
//  echo 'Data Not Found';
}
}
}



/*
end of live fetch
 */

/*&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

calendar management area

MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM*/


class calender{

    private $db;
    private $caldrId;
    private $calType;
    private $calTitle;
    private $calStrtngDate;
    private $calEndngDate;
    private $postdate;
    private $calDescription;
    function __construct()
    {
        $this->db = new elearnDb();
    }

    public function setcaldrId($id)
    {
        $this->caldrId = $id;
    }
        public function getcaldrId()
    {
        return $this->caldrId;
    }
    // the setters and getters of the calender category
        public function setcalType($calType){ $this->calType = $calType; }
        public function getcalType(){ return $this->calType;  }
        // the setters and getters of the calender title
        public function setcalTitle($calTitle){$this->calTitle = $calTitle; }
        public function getcalTitle(){return $this->calTitle;  }

        public function setcalStrtngDate($calStrtngDate)
    {
        $this->calStrtngDate = $calStrtngDate;
    }
        public function getcalStrtngDate()
    {
        return $this->calStrtngDate;
    }
        public function setcalEndngDate($calEndngDate)
    {
        $this->calEndngDate = $calEndngDate;
    }
        public function getcalEndngDate()
    {
        return $this->calEndngDate;
    }
        public function setcalDescription($calDescription)
    {
        $this->calDescription = $calDescription;
    }
        public function getcalDescription()
    {
        return $this->calDescription;
    }

           // the setters and getters of the calender posting date
        public function setcalpostdate($postdate){$this->postdate = $postdate; }
        public function getcalpostdate(){return $this->postdate;  }
    /*************************************************************
     * Now let's starting creating the common functions or methods
     *************************************************************/

 public function createCalender()
    {
        $calId=rand(0,1000000);
        $this->setcaldrId($calId);
        $this->setcalType($_POST['calTypes']);
        $this->setcalTitle($_POST['caltitl']);
        $this->setcalDescription($_POST['mdescriptioncal']);
        $this->setcalpostdate(date('Y/M/D'));

        $this->caldrId = $this->getcaldrId();
        $this->calType = $this->getcalType();
        $this->calTitle = $this->getcalTitle();
        $this->calDescription = $this->getcalDescription();
        $this->postdate = $this->getcalpostdate();

        $mcal = "INSERT INTO `tbl_calender`(`cal_id`, `cal_type`, `cal_title`, `cal_description`, `post_date`) VALUES ($this->caldrId,'$this->calType', '$this->calTitle','$this->calDescription', '$this->postdate')";

        $result = mysqli_query($this->db->makeConnect(),$mcal);
        if($result)
        {
            echo "<script>alert(\"You have Sent calender to the users!\");</script>";
        }
        else
        {
            echo "<script>alert(\"We're sorry ,but the calender is not created!\");</script>";
        }
    }
        public function editMeetingSchedule()
    {

    }

    public function loadCalender()
    {

        $cal="SELECT * FROM `tbl_calender` ORDER BY `tbl_calender`.`post_date` DESC";
        $outputOfQuery=mysqli_query($this->db->makeConnect(),$cal);
        if($outputOfQuery){
        echo "<div class=\"row\">";
        while(($row=mysqli_fetch_assoc($outputOfQuery))>0){
        ?>
                                                                        <div class="col-md-6">
                                                                            <h1 style="color:cyan;">
                                                                                <?php echo $row['cal_type'];?></h1>
                                                                            <p style="color:lightgreen;">
                                                                                <?php echo $row['cal_title'];?></p>
                                                                            <p><?php echo $row['cal_description'];?>
                                                                                <small><i
                                                                                        class="glyphicon glyphicon-time">
                                                                                    </i>
                                                                                    <?php echo $row['post_date'];?></small>
                                                                            </p>

                                                                            <a
                                                                                href="manage_calender.php?cal_id=<?php echo $row['cal_id'];?>&cal_type=<?php echo $row['cal_type'];?>"><strong>Edit</strong>
                                                                                | </a>
                                                                            <a
                                                                                href="manage_calender.php?cal_del_id=<?php echo $row['cal_id'];?>"><strong>Delete</strong></a>
                                                                        </div>

                                                                        <?php
                        }
                    echo"</div>";
        }
    }

        public function getCalDescrpnById($calId)
        {
         $cal="SELECT * FROM `tbl_calender` WHERE `cal_id`=$calId";
        $outputOfQuery=mysqli_query($this->db->makeConnect(),$cal);
        return $outputOfQuery;
        }

        public function editCalender(){
            $ttl=$_POST["cal_ttl"];
            $dscr = $_POST['mdescriptioncal2'];
            $md = date('Y/M/D');
            $clId=$_POST['cal_id'];
            $edtCal = "UPDATE `tbl_calender` SET `cal_title`='$ttl',`cal_description`='$dscr',`post_date`='$md' WHERE `cal_id`=$clId";
            $processEdt = mysqli_query($this->db->makeConnect(),$edtCal);
                   if($processEdt)
                    {
                        header("Location: ../manage_calender.php");
                    }
                    else
                    {
                        header("Location: ../manage_calender.php");
                    }
        }


        public function deleteCalSchedule()
    {
        $id=$_POST['query'];
        $dltCal = "DELETE FROM `tbl_calender` WHERE `cal_id`=$id";
        if(mysqli_query($this->db->makeConnect(),$dltCal)){
            echo "<script>alert(\"You have deleted the calender\")</script>";
        }else{
            echo "<script>alert(\"Please try it again\")</script>";
        }

    }


}



/***********************************
 * now let's identify which is which
 **********************************/


// end of calendar managment


function processor($option)
{

    $tester = new program();
    $mngDp = new manageDepartment();
    $sec=new section();
    $mng = new manageSchool();
    $fetch=new fetch();
    $cal = new calender();


    if($option=='crtProg'){
        $tester->createNewProgram();
    }
    else if($option=='deletprogram'){
        $tester->dltProg($_POST['query']);
    }else if($option=='loadProgram'){

    $tester->displayProg_details();
    }
    else if($option=='editProgram'){

    procesProgAction();
    }

    else if($option == 'addDepart')
    {
        $mngDp->createDepart();
    }
    else if($option == 'editDepart')
    {
        $mngDp->editDepartment();
    }
    else if($option == 'depart_program')
    {
        $mngDp->dpCombination();
    }
    else if($option == 'deleteDepart')
    {
        $mngDp->deleteDepartment();
    }
    else if($option=='addSem')
    {
        $mngDp->addSemesterToSdp();
    }
    else if($option == 'loadDepart') {
        $mngDp->loadDepartment();
    }
    else if($option=='addSection'){
        $sec->createSection();
    }
    else if($option=='editSection'){
        $sec->editSection();
    }
    else if($option=='addStudToSection')
    {
        $sec->addStudToSection();
    }
    else if($option == 'sectFacAlloc')
    {
        $sec->addSectFacAlloc();
    }
    else if($option=='altdFac')
    {
        $sec->loadAllocTeach();
    }
    else if($option=='delet_Section'){
        $sec->removeSection($_POST['deleteSection']);
    }
    else if($option=='loadSection'){
        $sec->loadSection();
    }
	else if($option=='addSchool')
	{
	$mng->createSchool();
	}
	else if($option=='editSchool')
	{
		$mng->editSchool();
    }
    else if($option=='deletschlid')
    {
        $mng->deleteSchool($_POST['school_del_query']);
    }
	else if($option=='loadSchool')
	{
		$mng->loadSchool();
    }
    $mngcrs = new manageCourse();
    if($option == 'addCourses'){
        $mngcrs->createCourse();
    }
    else if($option == 'editCourses'){
        $mngcrs->editCourse();
    }
    else if($option == 'delete'){
        $mngcrs->deleteDepartment();
    }
    else if($option == 'allocCourse')
    {
        $mngcrs->crsAllocation();
    }
    else if($option == 'allocFac')
    {
        $mngcrs->facultyCrsAllocation();
    }
    else if($option=='loadCourses') {
        $mngcrs->loadCourse();
    }
    else if($option=='fetchEmploInfo'){
        //start fetching
        $fetch->fetchEmplyee();
    }
    else if(isset($_REQUEST['createmtngAcadCal']))
    {
        $cal->createCalender();
    }
    else if($option=='ldmcal')
    {
        $cal->loadCalender();
    }
    else if($option=='deletCal')
    {
        $cal->deleteCalSchedule();
    }
    else if(isset($_POST['editExmSchdlbtn'])){
        $cal->editCalender();
    }


}
processor($choose)
?>