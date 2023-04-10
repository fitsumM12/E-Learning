<?php

class manage_std
{
    public function getStdFromAttendance($crs_id, $sec_id,$conn)
    {
        $sql= "SELECT * FROM student_attendance inner join student_detail on student_detail.std_id =student_attendance.std_id where student_attendance.crs_id = '$crs_id' and student_detail.sec_id = '$sec_id'";
        $result = $conn->query($sql);
        $data = array("0");
        while($row = $result->fetch_assoc())
        {
          array_push($data,$row['std_id']);
        }
        return $data;
    }
    public function getStdFromStudent($sec_id,$conn)
    {
        $sql ="SELECT std_id FROM student_detail WHERE sec_id = '$sec_id'";
        $result = $conn->query($sql);
        $data = array("0");
        while($row = $result->fetch_assoc())
        {
          array_push($data,$row['std_id']);
        }
        return $data;
    }
    public function addToAtt($conn)
    {
        if(isset($_POST['AddToAtt']))
        {
            $std_id = $_POST['std_id'];
            $crs_id =$_POST['crs_id'];
            $sql = "INSERT INTO student_attendance(std_id,crs_id) values('$std_id','$crs_id');";
            $result = $conn->query($sql);
            if($result)
            {
                return "Successfully Added";
            }
            else
            {
                return "Not Added ".$conn->error;
            }
        }
    }
    public function getStdFromMark($crs_id, $sec_id,$conn)
    {
        $sql= "SELECT * FROM student_mark inner join student_detail on student_detail.std_id =student_mark.std_id where student_mark.crs_id = '$crs_id' and student_detail.sec_id = '$sec_id'";
        $result = $conn->query($sql);
        $data = array("0");
        while($row = $result->fetch_assoc())
        {
          array_push($data,$row['std_id']);
        }
        return $data;
    }
    public function addToMrk($conn)
    {
        if(isset($_POST['AddToMrk']))
        {
            $std_id = $_POST['std_id'];
            $crs_id =$_POST['crs_id'];
            $sql = "INSERT INTO student_mark(std_id,crs_id) values('$std_id','$crs_id');";
            $result = $conn->query($sql);
            if($result)
            {
                return "Successfully Added";
            }
            else
            {
                return "Not Added ".$conn->error;
            }
        }
    }
}

$manage_std = new manage_std();

?>