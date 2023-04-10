<?php

include_once("includes/db.inc.php");
if(isset($_POST['modify'])){
$std_id = $_POST['std_id'];
$crs_id = $_POST['crs_id'];
$sec_id = $_POST['sec_id'];
$mid_exam = (float)$_POST['mid_exam'];
$final_exam = (float)$_POST['final_exam'];
$class_asses =(float)$_POST['class_asses'];
if($mid_exam+$final_exam+$class_asses<=100){
    $sql = "UPDATE `student_mark` SET `mid_exam`='$mid_exam',`final_exam`='$final_exam',`class_asses`='$class_asses' WHERE crs_id='$crs_id' and std_id ='$std_id';";
$result = $conn->query($sql);
if($result)
{
    
    header("Location: mark.php?search_section=&sec_id=$sec_id&message='Modified seccussfully'");
    exit; 
    
}
else
{
    return "Not Modified".$conn->error;
}

}
else{
    header("Location: mark.php?search_section=&sec_id=$sec_id&message='please provide convinent information'");
    exit; 
}
}
?>