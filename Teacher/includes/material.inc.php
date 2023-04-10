<?php
class Material
{
    //Delete material from material database
    function delete_from_material($conn)
    {
        if(isset($_GET['Delete']))
        {
            $mat_id = $_GET['Delete'];
            $query = "DELETE FROM student_material WHERE mat_id = '$mat_id';";
            $result = $conn->query($query);
            if($result)
            {
                return "Succesfully Deleted";
            }
            else
            {
                return 'Not Deleted '.$conn->error;
            }
        }
    }
    
    // Edit material which is uploaded on material datebase
    function get_material_details($conn)
    {
        $mat_id = $_GET['Edit'];
        $sql = "SELECT * from student_material where mat_id = $mat_id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }


    // Modify material information
    function modify_material($conn)
    {
        $mat_id = $_POST['mat_id'];
        $crs_id = $_POST['crs_id'];
        $title = $_POST['title'];
        $link = $_POST['link'];

        //////
        $video = $_FILES['video']['name'];
        $video_tmp =$_FILES['video']['tmp_name'];        
        move_uploaded_file($video, "files/$video_tmp");
        $pdf = $_FILES['pdf']['name'];
        $pdf_tmp = $_FILES['pdf']['tmp_name'];
        move_uploaded_file($pdf, "files/$pdf_tmp");

        $sql = "UPDATE `student_material` SET `crs_id`='$crs_id',`title`='$title',`pdf`='$pdf',`link`='$link',`video`='$video' WHERE mat_id='$mat_id';";
        $result = $conn->query($sql);
        if($result)
        {
            return "modified  successfully";
        }
        else
        {
            return "Not modified".$conn->error;
        }
    }

    // upload material for student
    function uploadMaterial($conn)
    {
        $fac_id = $_POST['fac_id'];
        $crs_id = $_POST['crs_id'];
            $dpt_prg_id = $_POST['dpt_prg_id'];
            $title = $_POST['title'];
            $pdf= $_FILES['pdf']['name'];
            $video = $_FILES['video']['name'];
            $link = $_POST['link'];
            // file handling
            $pdf_temp_name = $_FILES['pdf']['tmp_name'];
            $video_temp_name = $_FILES['video']['tmp_name'];
            // upload a file into the destination folder
            move_uploaded_file($pdf, "files/$pdf_temp_name");
            move_uploaded_file($video, "files/$video_temp_name");
            $sql = "INSERT INTO student_material(dpt_prg_id, crs_id, title, pdf, link, video,fac_id) VALUES ('$dpt_prg_id','$crs_id','$title','$pdf','$link','$video','$fac_id')";
            $result = $conn->query($sql);
            if($result)
            {
                return "Uploaded successfully";
            }
            else
            {
                return "Not uploaded".$conn->error;
            } 
    }
    function getCurrentsem($dpt_prg_id,$crs_id, $conn)
    {
        $sql = "SELECT * FROM `course_allocation` WHERE crs_id = '$crs_id' and dpt_prg_id='$dpt_prg_id';";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['current_sem'];
    }

    // get the prg departement ID
    function getPrgDptId($sec_id,$conn)
    {
        $query = " SELECT dpt_prg_id FROM section_detail where sec_id = $sec_id;";
        $result = $conn->query($query);
        $rows =$result->fetch_assoc();
        return $rows['dpt_prg_id'];
    }

}
$material = new Material();
?>