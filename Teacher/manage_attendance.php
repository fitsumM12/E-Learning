<?php
include_once("includes/db.inc.php");
if(isset($_POST['submit'])){
    echo "manage attendance";
    $sec_id = $_POST['sec_id'];
    $crs_id = $_POST['crs_id'];
    if(isset($_POST['attend'])){
    $class_provided = (int)getClassProvided($sec_id,$crs_id,$conn)+1;
    updateClassProvided($class_provided,$sec_id,$crs_id,$conn);
        foreach($_POST['attend'] as $value){
            $class_present =(int)getPresentClass($value,$crs_id, $sec_id, $conn) + 1;
            updateClassPresent($value,$class_present, $crs_id, $sec_id, $conn);
              
        }
        $sql= "SELECT * from student_attendance inner join student_detail on student_detail.std_id = student_attendance.std_id where student_detail.sec_id='$sec_id' and student_attendance.crs_id='$crs_id'";
        $result = $conn->query($sql);
        while($rows = $result->fetch_assoc()){
            $class_provided = (int)$rows['class_provided'];
            $class_present = (int)$rows['class_present'];
            $percentage = (float)$rows['percentage'];
            $class_absent = $class_provided - $class_present;
            $percentage = (float)$class_present / (float)$class_provided;
            $percentage = (float)$percentage*100;
            $std_id = $rows['std_id'];
            updateFinal($class_absent, $percentage, $std_id, $crs_id, $sec_id,$conn);
        }
        header("Location: attendance.php?search_section=&sec_id=$sec_id&message='The student attendance has updated succesfully'");
        exit;     
     }
     else{
         header("Location: attendance.php?search_section=&sec_id=$sec_id&message='Please Select The student attendance'");
         exit;
     }
}

if(isset($_GET['Edit'])){
    $crs_id = $_GET['crs_id'];
    $std_id= $_GET['std_id'];
    $sec_id =$_GET['sec_id'];
    $class_absent= (int)$_GET['class_absent'];
    $class_present= (int)$_GET['class_present'];
    $class_provided= (int)$_GET['class_provided'];
    if($class_provided>=$class_present && $class_absent+$class_present==$class_provided){
        $sql = "UPDATE student_attendance  set class_provided='$class_provided', class_absent='$class_absent', class_present='$class_present' where crs_id ='$crs_id' and std_id='$std_id'";
    if($conn->query($sql))
    {
        
            $percentage = (float)$class_present / (float)$class_provided;
            $percentage = (float)$percentage*100;
            updateFinal($class_absent, $percentage, $std_id, $crs_id, $sec_id,$conn);
        
        header("Location: attendance.php?search_section=&sec_id=$sec_id&message='The student attendance has updated succesfully'");
        exit;  
    }
    else
    {
        echo "not updated".$conn->error;
    }
    }
    else{
        header("Location: attendance.php?search_section=&sec_id=$sec_id&message='Please provide correct information'");
        exit;  
    }
}

// final insertion
function updateFinal($class_absent, $percentage, $std_id, $crs_id, $sec_id,$conn)
{
$sql = "UPDATE student_attendance inner join student_detail on student_detail.std_id=student_attendance.std_id set student_attendance.class_absent =
$class_absent, student_attendance.percentage=$percentage where student_detail.sec_id ='$sec_id' and student_attendance.crs_id ='$crs_id' and
student_attendance.std_id='$std_id';";
$result =$conn->query($sql);
if($result){
return "updated successfully";
}
else{
return "Not updated".$conn->error;
}
}
// get class provide
function getClassProvided($sec_id, $crs_id,$conn)
{
$sql = "SELECT * from student_attendance inner join student_detail on student_attendance.std_id = student_detail.std_id where student_detail.sec_id='$sec_id'
and student_attendance.crs_id='$crs_id' limit 1 ";
$result = $conn->query($sql);

$data =0;
while($rows = $result->fetch_assoc()){
$data = $rows['class_provided'];
}
return $data;
}

// update class provided
function updateClassProvided($class_provide, $sec_id,$crs_id,$conn)
{

$sql ="UPDATE student_attendance inner join student_detail on student_attendance.std_id = student_detail.std_id set student_attendance.class_provided =
'$class_provide' where student_detail.sec_id='$sec_id' and student_attendance.crs_id='$crs_id'";
$result = $conn->query($sql);
if($result)
{
return "Class attendance Updated";
}
else
{
die("failed to update the class provided <br>".$conn->error);
}
}
// get class present
function getPresentClass($value, $crs_id, $sec_id, $conn)
{
$sql = "SELECT * from student_attendance where std_id='$value' and crs_id = '$crs_id'";
$result = $conn->query($sql);
if($result){
$rows=$result->fetch_assoc();
if($rows)
{
return $rows['class_present'];
}
else
{
return "no value".$conn->error;
}
}
else{
return "error".$conn->error;
}

}
// update attendance class
function updateClassPresent($value,$class_present, $crs_id, $sec_id, $conn)
{
$sql ="UPDATE student_attendance set `class_present`= '$class_present' where crs_id='$crs_id' and std_id='$value'";
$result = $conn->query($sql);
if($result)
{
return "Class attendance Updated";
}
else
{
die("failed to update the class provided <br>".$conn->error);
}
}