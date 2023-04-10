<?php
include_once("includes/db.inc.php");
if(isset($_POST['upload'])){
    $fac_id = $_POST['fac_id'];
    $crs_id = $_POST['crs_id'];
    $title = $_POST['title'];
    $link = $_POST['link'];
    $semester = $_POST['semester'];
    $temp = "SELECT `dpt_prg_id` FROM `course_allocation` WHERE `crs_id`='$crs_id' limit 1";
    $output = $conn->query($temp);
    $res = $output->fetch_assoc();
    $dpt_prg_id = $res['dpt_prg_id'];
    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp,"../upload/$file");
    
    $video = $_FILES['video']['name'];
    $video_tmp = $_FILES['video']['tmp_name'];
    move_uploaded_file($video_tmp,"../upload/$video");
    

    $sql = "INSERT INTO `student_material`(`dpt_prg_id`, `crs_id`, `title`, `pdf`, `link`, `video`, `current_sem`, `fac_id`) 
    VALUES ($dpt_prg_id,'$crs_id','$title','$file','$link','$video',$semester,'$fac_id')";

    $result = $conn->query($sql);
    if($result){
        header("Location: material.php?search_course=&crs_id=$crs_id&message='Uploaded seccussfully'");
        exit; 
    }
    else{
      echo "Not modified".$conn->error;
    }
    
    header("Location: material.php?upload=&crs_id=$crs_id&message='Not uploaded'");
        exit; 
   
}

if(isset($_GET['delete'])){
  $mat_id = $_GET['mat_id'];
  $crs_id = $_GET['delete'];
  $query = "DELETE FROM student_material WHERE mat_id = {$mat_id};";
  $result = $conn->query($query);

  if($result){
     header("Location: material.php?mymaterial=&crs_id=$crs_id&message='Deleted successfully'");
     exit; 
  }
  else{
    header("Location: material.php?mymaterial=&crs_id=$crs_id&message='Not Deleted '");
     exit; 
  }
  
}




if(isset($_GET['download'])){
  $crs_id = $_GET['crs_id'];
  $mat_id=$_GET['download'];
  $sql = "SELECT `pdf` FROM student_material where mat_id ={$mat_id}";
  $result = $conn->query($sql);
  $row = $result->fetch_array();
  if($row['pdf']){
    
  $FilePaths = '../upload/'.$row['pdf'];
  download_file($FilePaths);
  }
  else{
    header("Location: material.php?search_course=&crs_id=$crs_id&message='No file exist'");
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
  else{
    die('File Not Found');}

}







if(isset($_POST['modify'])){
  $mat_id = $_POST['mat_id'];
  $fac_id = $_POST['fac_id'];
  $title = $_POST['title'];
  $link = $_POST['link'];
  $semester = $_POST['semester'];
  $crs_id =$_POST['crs_id'];
  // handling the file(pdf and video)
  $file = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"../upload/$file");
  
  $video = $_FILES['video']['name'];
  $video_tmp = $_FILES['video']['tmp_name'];
  move_uploaded_file($video_tmp,"../upload/$video");
  

  $sql = "UPDATE `student_material` SET `title`='$title',`pdf`='$file',`link`='$link',`video`='$video',`current_sem`=$semester WHERE `mat_id`={$mat_id}";

  $result = $conn->query($sql);
  if($result){
      header("Location: material.php?mymaterial=&crs_id=$crs_id&message='Uploaded seccussfully'");
      exit; 
  }
  else{
    //  echo "Not modified".$conn->error;
  }
  
  header("Location: material.php?modify=&mat_id=$mat_id&message='Not uploaded'");
      exit; 
 
}

?>