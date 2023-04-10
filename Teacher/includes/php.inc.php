<?php

/////////////////////////////////////////////////
// fetching  the faculty menu from the database//
/////////////////////////////////////////////////
function FacultyMenu($conn)
    { 
    $sql = "SELECT * FROM faculty_menu";
    $data = $conn->query($sql);
    return $data;
    }
/////////////////////////////////////////////////
function FacultyDetail($conn)
    { 
        $fac_id = $_SESSION['fac_id'];
    $sql = "SELECT * FROM faculty_detail WHERE fac_id='$fac_id' limit 1";
    $data = $conn->query($sql);
    $result = $data->fetch_assoc();
    return $result;
    }
//////////////////////////////////////////////////////
// fetching  the student feedback for notification////
//////////////////////////////////////////////////////
function studentFeedback($conn){
    $sql = "SELECT * FROM student_feedback where `status`='pending' LIMIT 3";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            echo " <div class='message media-body'><span class='name float-left'>".$row['std_id']."</span><br><p> ".$row['message']." </p> </div>";
} } 
    
}
?>