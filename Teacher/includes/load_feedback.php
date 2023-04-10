<?php
include_once "database.php";
        $commentNewCount = $_POST['commentNewCount'];
        $sql = "SELECT * FROM comments LIMIT $commentNewCount";
        $sql = "SELECT * FROM student_feedback where `status`='pending' LIMIT $commentNewCount";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                echo " <div class='message media-body'><span class='name float-left'>".$row['std_id']."</span><br><p> ".$row['message']." </p> </div>";
    } 
}   
?>