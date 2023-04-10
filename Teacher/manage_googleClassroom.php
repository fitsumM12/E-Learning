<?php

include_once("includes/db.inc.php");
              if(isset($_GET['delete_id'])){
                $del_id = $_GET['delete_id'];
                $sec_id = $_GET['sec_id'];
                $sql = "DELETE FROM google_link where link_id=$del_id";
                $result = $conn->query($sql);
                if($result){
                  header("Location:googleClassroom.php?search_section=&sec_id=$sec_id&message='Link Deleted Successfully'");
                }else{
                  header("Location:googleClassroom.php?search_section=&sec_id=$sec_id&message='Failed to Delete Link Try Again'");
                }
              }





              if(isset($_POST['modify'])){
                $link_id = $_POST['link_id'];
                $link = $_POST['link'];
                echo $sec_id = $_POST['sec_id'];
                $sql = "UPDATE google_link set google_link='$link' where link_id=$link_id";
                $result = $conn->query($sql);
                if($result){
                  header("Location:googleClassroom.php?search_section=&sec_id=$sec_id&message='Link Updated'");
                }
                else{
                  header("Location:googleClassroom.php?search_section=&sec_id=$sec_id&message='Failed to Update Link'");
                }
                
              }



              if(isset($_POST['assign'])){
                $crs_id = $_POST['crs_id'];
                $fac_id = $_POST['fac_id'];
                $sec_id = $_POST['sec_id'];
                $link  = $_POST['link'];
                $sql = "INSERT INTO google_link(crs_id,fac_id,sec_id,google_link)
                        VALUES('$crs_id','$fac_id',$sec_id,'$link')";
                $result = $conn->query($sql);
                if($result){
                  header("Location:googleClassroom.php?search_section=&sec_id=$sec_id&message='New Link Uploaded'");
              
                }else{
                  header("Location:googleClassroom.php?search_section=&sec_id=$sec_id&message='Failed to Upload New Link'");
                }
              }
?>