<?php
include_once "db.inc.php";
if(isset($_POST['submit'])==1){
    // storing  the value onto the vaibale
    $fac_id=$conn->real_escape_string($_POST['fac_id']);
    $email_address = $_POST['email_address'];
    $permanent_address=$conn->real_escape_string($_POST['permanent_address']);
    $current_address=$conn->real_escape_string($_POST['current_address']);
    $fac_contact=$conn->real_escape_string($_POST['fac_contact']);
    $emergency_email=$conn->real_escape_string($_POST['emergency_email']);
    $emergency_mobile=$conn->real_escape_string($_POST['emergency_mobile']);
    $emergency_email=$conn->real_escape_string($_POST['emergency_email']);
    $permanent_address=$conn->real_escape_string($_POST['permanent_address']);
    
    
    // handling the profile picture
    $pro_pic = $_FILES['img']['name'];
    $pro_pic_tmp = $_FILES['img']['tmp_name'];
    move_uploaded_file($pro_pic_tmp,"../images/$pro_pic");
    // handling the query
    $sql = "UPDATE `faculty_detail` SET `fac_contact` = '$fac_contact',`permanent_address`='$permanent_address',`current_address`='$current_address' ,`emergency_email`='$emergency_email',`emergency_mobile`='$emergency_mobile',`pro_pic` ='$pro_pic' WHERE `faculty_detail`.`fac_id` = '$fac_id'";
    $res = $conn->query($sql);
    if($res){
        header("Location: ../viewProfile.php");
        exit;
        }
    else{
    echo "Failed to updated Your Profile";
    }
}

if(isset($_POST['update'])==1){
    
    $fac_id=$conn->real_escape_string($_POST['fac_id']);
    $pro_pic = $_FILES['img']['name'];
    $pro_pic_tmp = $_FILES['img']['tmp_name'];
    move_uploaded_file($pro_pic_tmp,"../images/$pro_pic");
    // handling the query
    $sql = "UPDATE `faculty_detail` SET `pro_pic` ='$pro_pic' WHERE `faculty_detail`.`fac_id` = '$fac_id'";
    $res = $conn->query($sql);
    if($res){
        // echo "welcome";
        header("Location: ../viewProfile.php");
        exit;
        }
    else{
    echo "Failed to updated Your Profile";
    }
}
if(isset($_POST['edit'])==1){
    // storing  the value onto the vaibale
    $fac_id=$conn->real_escape_string($_POST['fac_id']);
    $email_address = $_POST['email_address'];
    $permanent_address=$conn->real_escape_string($_POST['permanent_address']);
    $current_address=$conn->real_escape_string($_POST['current_address']);
    $fac_contact=$conn->real_escape_string($_POST['fac_contact']);
    $emergency_email=$conn->real_escape_string($_POST['emergency_email']);
    $emergency_mobile=$conn->real_escape_string($_POST['emergency_mobile']);
    $emergency_email=$conn->real_escape_string($_POST['emergency_email']);
    $permanent_address=$conn->real_escape_string($_POST['permanent_address']);
    
    
    // handling the profile picture
    $pro_pic = $_FILES['img']['name'];
    $pro_pic_tmp = $_FILES['img']['tmp_name'];
    move_uploaded_file($pro_pic_tmp,"../images/$pro_pic");
    // handling the query
    $sql = "UPDATE `faculty_detail` SET `fac_contact` = '$fac_contact',`permanent_address`='$permanent_address',`current_address`='$current_address' ,`emergency_email`='$emergency_email',`emergency_mobile`='$emergency_mobile',`pro_pic` ='$pro_pic' WHERE `faculty_detail`.`fac_id` = '$fac_id'";
    $res = $conn->query($sql);
    if($res){
        header("Location: ../account.php");
exit;
}
else{
echo "Failed to updated Your Profile";
}
}

?>