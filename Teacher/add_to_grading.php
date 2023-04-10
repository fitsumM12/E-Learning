<?php
include_once("includes/db.inc.php");
// adding to the grading section
if(isset($_POST['submit'])){
 $crs_id = $_POST['crs_id'];
 $sec_id =$_POST['sec_id'];
 if(isset($_POST['mark'])){
    foreach($_POST['mark'] as $value){
        $std_id = $value;
            $crs_id =$_POST['crs_id'];
            $sql = "INSERT INTO student_mark(std_id,crs_id) values('$std_id','$crs_id');";
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
    header("Location: manage_student.php?mark2=&search_section=&sec_id=$sec_id&message='The student has added succesfully'");
    exit;     
 }
 else{
     header("Location: manage_student.php?mark2=&search_section=&sec_id=$sec_id&message='Please Select The student to be added'");
     exit;
 }

}

?>