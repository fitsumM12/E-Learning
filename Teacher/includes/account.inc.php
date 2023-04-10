<?php
class Account{

    // get faculty information
    function get_faculty_information($conn,$fac_id)
    {
        $sql = "SELECT * FROM faculty_detail where fac_id = '$fac_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    // modify faculty information
    function modify_faculty_information($conn)
    {
        $fac_id = $_POST['fac_id'];
        $fac_email = $_POST['fac_email'];
        $fac_contact = $_POST['fac_contact'];
        $permanent_address = $_POST['permanent_address'];
        $current_address = $_POST['current_address'];
        $emergency_mobile = $_POST['emergency_mobile'];
        $emergency_email = $_POST['emergency_email'];
        $emergency_address = $_POST['emergency_address'];
        // original name of the file
        $pro_pic = $_FILES['pro_pic']['name'];
        $residential_certificate = $_FILES['residential_certificate']['name'];
        $btech_certificate = $_FILES['btech_certificate']['name'];
        $mtech_certificate = $_FILES['mtech_certificate']['name'];
        $phd_certificate = $_FILES['phd_certificate']['name'];
        // temporary name of the file
        $pro_pic_temp = $_FILES['pro_pic']['tmp_name'];
        $residential_certificate_temp= $_FILES['residential_certificate']['tmp_name'];
        $btech_certificate_temp = $_FILES['btech_certificate']['tmp_name'];
        $mtech_certificate_temp = $_FILES['mtech_certificate']['tmp_name'];
        $phd_certificate_temp = $_FILES['phd_certificate']['tmp_name'];

        // upload the file to the target directory
        move_uploaded_file($residential_certificate, "files/$residential_certificate_temp");
        move_uploaded_file($btech_certificate, "files/$btech_certificate_temp");
        move_uploaded_file($mtech_certificate, "files/$mtech_certificate_temp");
        move_uploaded_file($phd_certificate, "files/$phd_certificate_temp");
        move_uploaded_file($pro_pic, "files/$pro_pic_temp");

        $sql = "UPDATE `faculty_detail` SET `fac_email`='$fac_email',`fac_contact`='$fac_contact',`pro_pic`='$pro_pic',`permanent_address`='$permanent_address',`current_address`='$current_address',`emergency_mobile`='$emergency_mobile',`emergency_email`='$emergency_email',`emergency_address`='$emergency_address',`residential_certificate`='$residential_certificate',`btech_certificate`= '$btech_certificate',`mtech_certificate`='$mtech_certificate',`phd_certificate`='$phd_certificate' WHERE `fac_id`=$fac_id";

        $result = $conn->query($sql);
        if($result)
        {
            return "Modified  successfully";
        }
        else
        {
            return "Not modified".$conn->error;
        }
    }
   
}
$account = new Account();
?>