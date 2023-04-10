<?php
    class Attendance
    {
        // fetch attendance information
        function  getStdName($std_id,$conn)
        {
            $sql = "SELECT * from student_detail where std_id = '$std_id'";
            $result = $conn->query($sql);
            $rows = $result->fetch_assoc();
            return $rows['std_name'];
        }





        
        // get student attendance
        function getStudentAttendance($crs_id,$value,$conn)
        {
            $value = (string)$value;
           $sql = "SELECT * FROM student_attendance where std_id='$value' and crs_id='$crs_id'";
           $result = $conn->query($sql);
           $rows = $result->fetch_assoc();
           return $rows;
        }
    
    }
$attendance = new Attendance();
?>