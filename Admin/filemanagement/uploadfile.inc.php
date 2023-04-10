<?php
error_reporting(0);
if(isset($_POST['submit']))
{
    $file=$_FILES['file'];
    $filename=$_FILES['file']['name'];
    $fileTempName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileType=$_FILES['file']['type'];
    $fileError=$_FILES['file']['error'];

    $fileEx=explode('.',$filename);
    $actualFileExt=strtolower(end($fileEx));

    $allowedEx=array('jpg','jpeg','pdf','txt','ppt','png');

  
        if(in_array($actualFileExt,$allowedEx))
        {
            if($fileError===0){
                if($fileSize< 10000000)
                {
                    // now create a uniqid for a file
                    $unicode =  uniqid('',true);
                    $uniqFileName =$unicode.".".$filename;
                    // now create the destination
                    $fileTitle=$_POST['name'];
                    $fileDestination = "../assets/uploaded_files/".$uniqFileName;
                    move_uploaded_file($fileTempName,$fileDestination);
                    // header('Location: ../file_management.php?Succesfullyuploaded');
                    $db=mysqli_connect("localhost","root","","elearning");
                    //write query
                    $insrt = "INSERT INTO file_management (fil_id, fil_name, fil, fil_size, filType, download_status, dpt_id) VALUES ('$unicode','$fileTitle','$fileDestination','$fileSize','$actualFileExt','',123)";
                    $res=mysqli_query($db,$insrt);
                    if($res)
                    {
                       
                       header("Location: ../file_management.php?FileUploaded");
                       
                        
                    }else{
                        
                        header("Location: ../file_management.php?<script>alert(\"file is not saved!\");</script>");
                    }
                }
                else{
  
                header("Location: ../file_management.php?<script>alert(\"The File Size is too big!\");</script>");
                }

            }else{
                echo("There is Some Error occured!");
            }
          
    }
        else{
            echo('You are allowed to upload of the following type<br>');
            $length=count($allowedEx);
            for($i=0; $i<$length;$i++)
            {
                echo($allowedEx[$i]."&nbsp;");
            }
                    
        }
    }
?>