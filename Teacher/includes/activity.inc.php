<?php 
class activity
{
    function get_activity_details($conn)
    {
        $id = $_GET['edit'];
        $sql = "SELECT * from student_activity where act_id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }
   function get_exam_details($exam_id,$conn){
        $sql = "SELECT * from exam where exam_id = $exam_id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row;       
   }
    // search the section for acivity 
    function searchSection($crs_id, $sec_id,$conn)
    {
        $sql = "select * from student_activity where crs_id = $crs_id and sec_id=$sec_id";
        $result = $conn->query($sql);
        return $result;
    }
    // get the submitted  activity details
    function getSubmittedActivity($conn)
    {
        $act_id = $_POST['activity'];
        $sql = "SELECT * FROM submitted_activity where act_id = $act_id";
        $result = $conn->query($sql);
        return $result;
    }
}
$activity = new activity();
?>