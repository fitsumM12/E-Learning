<?php
include_once("includes/db.inc.php");
// adding to the grading section
if(isset($_POST['submit'])){
 echo $crs_id = $_POST['crs_id'];
 echo $sec_id =$_POST['sec_id'];
 if(isset($_POST['attend'])){
    foreach($_POST['attend'] as $value){
        $std_id = $value;
            $crs_id =$_POST['crs_id'];
            $sql = "INSERT INTO student_attendance(std_id,crs_id) values('$std_id','$crs_id');";
            $result = $conn->query($sql);
            if($result)
            {
               
                // return "Successfully Added";
            }
            else
            {
                // return "Not Added ".$conn->error;
            }
    }
    header("Location: manage_student.php?attendance2=&search_section=&sec_id=$sec_id&message='The student has added succesfully'");
    exit;     
 }
 else{
     header("Location: manage_student.php?attendance2=&search_section=&sec_id=$sec_id&message='Please Select The student to be added'");
     exit;
 }

}

?>