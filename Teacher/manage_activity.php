<?php
include_once("includes/db.inc.php");
 if(isset($_POST['modify']))
 { 
    $id = $_POST['act_id'];
    $sec_id = $_POST['sec_id'];
    $crs_id = $_POST['crs_id'];
    $title = $_POST['title'];
    $link =$_POST['link'];
    // handling the file
    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp,"../upload/$file");
    $allot_date = $_POST['allot_date'];
    // $link = $_POST['link'];
    $sub_date = $_POST['sub_date'];

    if($file){
        $sql = "UPDATE `student_activity` SET `sec_id`='$sec_id',`crs_id`='$crs_id',`act_type`='$title',`file`='$file',`link`='$link',`allot_date`='$allot_date',`sub_date`='$sub_date' WHERE `act_id` = $id;";

    $result = $conn->query($sql);
    if($result){
        header("Location: student_activity.php?search_section=&sec_id=$sec_id&message='{$file} uploaded'");
        exit; 
    }
    else{
        // return "Not modified".$conn->error;
    }
    
    header("Location: student_activity.php?edit=$id&message='Not Modified'");
    exit; 
    }
    else{
        $sql = "UPDATE `student_activity` SET `sec_id`='$sec_id',`crs_id`='$crs_id',`act_type`='$title',`link`='$link',`allot_date`='$allot_date',`sub_date`='$sub_date' WHERE `act_id` = $id;";

    $result = $conn->query($sql);
    if($result){
        header("Location: student_activity.php?search_section=&sec_id=$sec_id&message='Modified seccussfully'");
        exit; 
    }
    else{
        // return "Not modified".$conn->error;
    }
    
    header("Location: student_activity.php?edit=$id&message='Not Modified'");
    exit; 
    }
    
 }


 if(isset($_GET['response'])){
  $id=$_GET['response'];
  $sec_id = $_GET['sec_id'];
  $sql = "SELECT `response_file` FROM `submitted_activity` WHERE `id`={$id}";
  $result = $conn->query($sql);
  $row = $result->fetch_array();
if($row['response_file']){
  $FilePaths = '../upload/'.$row['response_file'];

  download_file($FilePaths);
      }
    else{
      header("Location: student_activity.php?search_section=&sec_id=$sec_id&message='No file exist'");
      exit; 
    }
 }


 
 if(isset($_GET['delete'])){
     $act_id = $_GET['delete'];
     $sec_id = $_GET['sec_id'];
     $query = "DELETE FROM student_activity WHERE act_id = {$act_id};";
     $result = $conn->query($query);
   
     if($result){
        header("Location: student_activity.php?search_section=&sec_id=$sec_id&message='Deleted successfully'");
        exit; 
     }
     else{
         $message = $result->error;
        header("Location: student_activity.php?search_section=&sec_id=$sec_id&message=$message");
        exit; 
     }
     
 }


if(isset($_GET['download'])){
    $sec_id = $_GET['sec_id'];
    $act_id=$_GET['download'];
    $sql = "SELECT `file` FROM student_activity where act_id ={$act_id}";
  $result = $conn->query($sql);
$row = $result->fetch_array();
if($row['file']){
    
$FilePaths = '../upload/'.$row['file'];
download_file($FilePaths);
}
else{
    header("Location: student_activity.php?search_section=&sec_id=$sec_id&message='No file exist'");
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
    $id = $_POST['act_id'];
    $sec_id = $_POST['sec_id'];
    $crs_id = $_POST['crs_id'];
    $title = $_POST['title'];
    $link = $_POST['link'];
    // handling the file
    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp,"../upload/$file");
    $allot_date = $_POST['allot_date'];
    // $link = $_POST['link'];
    $sub_date = $_POST['sub_date'];

    $sql = "INSERT INTO `student_activity` (`act_id`, `sec_id`, `crs_id`, `act_type`, `file`, `link`,`allot_date`, `sub_date`) VALUES (NULL, '$sec_id', '$crs_id', '$title', '$file','$link', '$allot_date', '$sub_date');";

    $result = $conn->query($sql);
    if($result){
        header("Location: student_activity.php?search_section=&sec_id=$sec_id&message='Uploaded seccussfully'");
        exit; 
    }
    else{
        // return "Not modified".$conn->error;
    }
    
    header("Location: student_activity.php?edit=$id&message='Not uploaded'");
    exit; 
    
 }
?>