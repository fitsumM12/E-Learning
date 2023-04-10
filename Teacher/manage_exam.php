<?php
include_once("includes/db.inc.php");
 if(isset($_POST['modify']))
 { 
    $id = $_POST['exam_id'];
    $sec_id = $_POST['sec_id'];
    $crs_id = $_POST['crs_id'];
    $title = $_POST['title'];
    $link =$_POST['link'];
    // handling the file
    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp,"../upload/$file");
    $allot_date = $_POST['allot_date']." ".$_POST['allot_time'];
    // $link = $_POST['link'];
    $sub_date = $_POST['sub_date']." ".$_POST['sub_time'];

    if($file){
        $sql = "UPDATE `exam` SET `sec_id`='$sec_id',`crs_id`='$crs_id',`exam_name`='$title',`exam_file`='$file',`exam_link`='$link',`start_date`='$allot_date',`end_date`='$sub_date' WHERE `exam_id` = '$id';";

    $result = $conn->query($sql);
    if($result){
        header("Location: student_exam.php?search_section=&sec_id=$sec_id&message='{$file} uploaded'");
        exit; 
    }
    else{
        //return "Not modified".$conn->error;
    }
    
    header("Location: student_exam.php?edit=$id&message='Not Modified'");
    exit; 
    }
    else{
        $sql = "UPDATE `exam` SET `sec_id`='$sec_id',`crs_id`='$crs_id',`exam_name`='$title',`exam_link`='$link',`start_date`='$allot_date',`end_date`='$sub_date' WHERE `exam_id` = '$id';";

    $result = $conn->query($sql);
    if($result){
        header("Location: student_exam.php?search_section=&sec_id=$sec_id&message='Modified seccussfully'");
        exit; 
    }
    else{
        // return "Not modified".$conn->error;
    }
    
    header("Location: student_exam.php?edit=$id&message='Not Modified'");
    exit; 
    }
    
 }


 if(isset($_GET['response'])){
  $id=$_GET['response'];
  $sec_id = $_GET['sec_id'];
  $sql = "SELECT `response` FROM `exam_response` WHERE `id`=$id";
  $result = $conn->query($sql);
  $row = $result->fetch_array();
if($row['response_file']){
$FilePaths = '../upload/'.$row['response_file'];

download_file($FilePaths);
}
else{
  header("Location: student_exam.php?search_section=&sec_id=$sec_id&message='No file exist'");
  exit; 
}
 }


 
 if(isset($_GET['delete'])){
     $exam_id = $_GET['delete'];
     $sec_id = $_GET['sec_id'];
     $query = "DELETE FROM exam WHERE exam_id = $exam_id;";
     $result = $conn->query($query);
   
     if($result){
        header("Location: student_exam.php?search_section=&sec_id=$sec_id&message='Deleted successfully'");
        exit; 
     }
     else{
         $message = $result->error;
        header("Location: student_exam.php?search_section=&sec_id=$sec_id&message=$message");
        exit; 
     }
     
 }


if(isset($_GET['download'])){
    $sec_id = $_GET['sec_id'];
    $id=$_GET['download'];
    $sql = "SELECT response FROM exam_response where id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_array();
if($row['response']){
    
$FilePaths = '../upload/'.$row['response'];
download_file($FilePaths);
}
else{
    header("Location: student_exam.php?search_section=&sec_id=$sec_id&message='No file exist'");
    exit; 
}

}

function download_file($fullPath )
{
  if( headers_sent() )
    die('Headers Sent');

  if(ini_get('zlib.output_compression'))
    ini_set('zlib.output_compression', 'Off');


  if( file_exists($fullPath) )
  {

    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);

    switch ($ext) 
    {
      case "pdf": $ctype="application/pdf"; break;
      case "doc": $ctype="application/msword"; break;      
      default: $ctype="application/force-download";
    }

    header("Pragma: public"); 
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false); 
    header("Content-Type: $ctype");
    header("Content-Disposition: attachment; filename=\"".basename($fullPath)."\";" );
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".$fsize);
    ob_clean();
    flush();
    readfile( $fullPath );

  } 
  else
    die('File Not Found');

}

 if(isset($_POST['assign']))
 { 
    $id = $_POST['exam_id'];
    $sec_id = $_POST['sec_id'];
    $crs_id = $_POST['crs_id'];
    $title = $_POST['title'];
    $link = $_POST['link'];
    // handling the file
    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp,"../upload/$file");
    $allot_date = $_POST['allot_date']." ".$_POST['allot_time'];
    // $link = $_POST['link'];
    $sub_date = $_POST['sub_date']." ".$_POST['sub_time'];

    $sql = "INSERT INTO `exam` (`sec_id`, `crs_id`, `exam_name`, `exam_file`, `exam_link`,`start_date`, `end_date`)
           VALUES ('$sec_id', '$crs_id', '$title', '$file','$link', '$allot_date', '$sub_date');";

    $result = $conn->query($sql);
    // echo "welcome";
    if($result){
        header("Location: student_exam.php?search_section=&sec_id=$sec_id&message='Uploaded seccussfully'");
        exit; 
    }
    else{
        // echo "Not modified".$conn->error;
    }
    
    header("Location: student_exam.php?edit=$id&message='Not uploaded'");
    exit; 
    
 }
//  <!-- change status of exam  -->
   
        if(isset($_GET['status']))
        {
            $exam_id=$_GET['status'];
            $sec_id=$_GET['sec_id'];
            date_default_timezone_set('Asia/Kolkata');
            $time_now = date("Y-m-d H:i:s",time());

            $sql = "SELECT * FROM `exam` WHERE `exam_id`='$exam_id'";
            $result = $conn->query($sql);
            $row = $result->fetch_array();
            $exam_status = $row['exam_status'];
            $exam_start = $row['start_date'];
            $exam_end = $row['end_date'];
            // echo "<script>alert('$time_now>$exam_end')</script>";

            if($exam_status=='inactive'){
                if($time_now>=$exam_start && $time_now<=$exam_end){
                    $sql = "UPDATE exam set exam_status='active' where exam_id=$exam_id";
                    $result = $conn->query($sql);
                    header("Location: student_exam.php?search_section=&sec_id=$sec_id&message='Exam Activated'");
                    exit();
                }
                else if($time_now>$exam_end){
                    header("Location: student_exam.php?search_section=&sec_id=$sec_id&message='This Exam has completed on $exam_end'");exit();
                  
                }else if($time_now<$exam_start){
                    header("Location: student_exam.php?search_section=&sec_id=$sec_id&message='You Can not Activate This Exam Before $exam_start'");exit();
                 
                }else{
                    header("Location: student_exam.php?search_section=&sec_id=$sec_id&message='Sorry Exam Activation Time is Over'");exit();

                }
            }else{
                if($time_now>=$exam_start && $time_now<=$exam_end){
                    header("Location: student_exam.php?search_section=&sec_id=$sec_id&message='Sorry This Exam should be Active from $exam_start to $exam_end'");  exit();
                }else{
                    $sql = "UPDATE exam set exam_status='inactive' where exam_id=$exam_id";
                    $result = $conn->query($sql);
                    header("Location: student_exam.php?search_section=&sec_id=$sec_id&message='Exam Deactivated'");exit();
                }
            }
        }

  
?>