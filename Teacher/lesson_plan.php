<?php

include_once("includes/db.inc.php");
 if(isset($_POST['submit'])){
    $fac_id = $_POST['fac_id'];
    $crs_id = $_POST['crs_id'];
    $content = $_POST['content'];
    $time = $_POST['time'];

    $sql22 = "INSERT INTO `faculty_lesson_plan`(`fac_id`, `crs_id`, `time`, `content`) VALUES ('$fac_id','$crs_id','$time','$content')";
    $result22 = $conn->query($sql22);
    if($result22){
        header("Location:  index.php?view_plan");
        exit();
    }
    else{
        echo $conn->error;
    }
}
if(isset($_GET['delete_plan'])){
    $id = $_GET['delete_plan'];
    
    $sql = "DELETE FROM faculty_lesson_plan where id=$id";
    $result = $conn->query($sql);
    if($result){
        header("Location:  index.php?view_plan");
        exit();
    } else{
        echo $conn->error;
    }
}
?>