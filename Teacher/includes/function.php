<?php
// For the Most common Operations
class  Operation
{
    //get faculty course allocation
    public function Mycourse($conn)
    {
        $fac_id = $_SESSION['fac_id'];
        $sql = "SELECT * FROM faculty_course_allocation where fac_id = '$fac_id';";
        $result = $conn->query($sql);
        return $result;
    }
    public function MyCourseAllocationId($crs_id, $conn)
    
    {
        $fac_id = $_SESSION['fac_id'];
        $sql = "SELECT fac_crs_id FROM faculty_course_allocation where fac_id = '$fac_id' and crs_id = '$crs_id' limit 1;";
        $result = $conn->query($sql);
        if(!$result)
        {
            return "not correct".$conn->error;
        }
        
        return $result;
    }

    //get faculty section allocation{
    public function Mysection($fac_crs_id, $conn)
    {
        $sql = "SELECT * FROM faculty_section_allocation where fac_crs_id = '$fac_crs_id';";
        $result = $conn->query($sql);
        return $result;
    }   
}
$operation =  new Operation();
include_once "includes/db.inc.php";
include_once "includes/material.inc.php";
include_once "includes/attendance.inc.php";
include_once "includes/activity.inc.php";
include_once "includes/account.inc.php";
include_once "includes/manage_std.inc.php";
include_once "includes/announcement.inc.php";
include_once "includes/calendar.inc.php";

?>