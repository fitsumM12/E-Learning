
<html>
<head>
<title>confirm Registration</title>

</head>
<body>

<?php
  require_once 'includes/db.php';
  require_once 'sendEmail.php';
  
  // $crud = new crud();
  //  generate random password
function randomPassword() {
  $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@#$%&?';
  $pass = array(); 
  $alphaLength = strlen($alphabet) - 1; 
  for ($i = 0; $i < 8; $i++) {
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
  }
  return implode($pass); 
}
// generate uinque id for student
  $std_id = uniqid();
  $mypass = randomPassword();
  $registered = false;

  // encrypt password using encrypt() method of jelly fish
        // $hash = "$2y$10$";
        // $salt = $hash."iusesomecrazystrings22";
        // $mypass = crypt($mypass,$salt);
    $mypass = password_hash($mypass,PASSWORD_DEFAULT);


   if(isset($_POST['submit'])){
    
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $name = $fname.' '.$mname.' '.$lname;
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $dobmonth = $_POST['month'];
    $dobdate = $_POST['date'];
    $dobyear = $_POST['year'];
    $dob = $dobyear.'-'.$dobmonth.'-'.$dobdate;

    $gender = $_POST['gender'];
    
    // cuurent address
    $c_street1 = $_POST['c_street1'];
    $c_street2 = $_POST['c_street2'];
    $c_city = $_POST['c_city'];
    $c_state = $_POST['c_state'];
    $c_zipcode = $_POST['c_zipcode'];
    $c_country = $_POST['c_country'];
    $current_address = $c_street1.' '.$c_street2.' '.$c_city.' '.$c_state.' '.$c_zipcode.' '.$c_country;
    // permannet address
    $p_street1 = $_POST['p_street1'];
    $p_street2 = $_POST['p_street2'];
    $p_city = $_POST['p_city'];
    $p_state = $_POST['p_state'];
    $p_zipcode = $_POST['p_zipcode'];
    $p_country = $_POST['p_country'];
    $permanent_address = $p_street1.' '.$p_street2.' '.$p_city.' '.$p_state.' '.$p_zipcode.' '.$p_country;

    //detail of person to contact during emergency
    $em_name = $_POST['em_name'];
    $em_mobile = $_POST['em_mobile'];
    $em_email = $_POST['em_email'];

  
    # rs stands for residential certificate
    
     
     $maritalStatus = $_POST['maritalStatus'];
    
     #acadamic detail
    //  $profilePicture = $_POST['profilePicture'];
    //  $rs = $_POST['rs'];
    //  $highSchoolname = $_POST['highSchoolname'];
    //  $p10thCertificate = $_POST['p10thCertificate'];
    //  $p12thCertificate = $_POST['p12thCertificate'];
     $p10thPercentage = $_POST['p10thPercentage'];
     $p12thPercentage = $_POST['p12thPercentage'];
     $date = date('Y-m-d');

     //upload 10th,12th certifcate and profile picture to the server
      $origional_profile = $_FILES['profilePicture']['tmp_name'];
      $origional_10th = $_FILES['p10thCertificate']['tmp_name'];
      $origional_12th = $_FILES['p12thCertificate']['tmp_name'];
      $origional_RC = $_FILES['RC']['tmp_name'];
      // set extension
      $ext1 = pathinfo($_FILES['profilePicture']['name'],PATHINFO_EXTENSION);
      $ext2 = pathinfo($_FILES['p10thCertificate']['name'],PATHINFO_EXTENSION);
      $ext3 = pathinfo($_FILES['p12thCertificate']['name'],PATHINFO_EXTENSION);
      $ext4 = pathinfo($_FILES['RC']['name'],PATHINFO_EXTENSION);


      $target_dir = 'upload/';
      // $destination = $target_dir.basename($_FILES['profile']['name']);
      $destination1 = $target_dir.$name.'profile'.'.'.$ext1;
      $destination2 = $target_dir.$name.'10th'.'.'.$ext2;
      $destination3 = $target_dir.$name.'12th'.'.'.$ext3;
      $destination4 = $target_dir.$name.'RC'.'.'.$ext4;
  


      move_uploaded_file($origional_profile,$destination1);
      move_uploaded_file($origional_10th,$destination2);
      move_uploaded_file($origional_12th,$destination3);
      move_uploaded_file($origional_RC,$destination4);

     $dept_id = $_POST['dept'];
     $prog_id = $_POST['program'];
     $current_sem = 1;
     //get school department and program combination that matchs the depratment
     $result = $crud->getDept_prog($dept_id,$prog_id);
     $dp_id = $result['dpt_prg_id'];
 
      $result = $crud->insertForm($std_id,$name,$email,$mobile,$gender,$dob,$maritalStatus,$current_address,$permanent_address,$destination1,$destination2,$destination3,$p10thPercentage,$p12thPercentage,$destination4,$em_name,$em_email,$em_mobile,$date,$mypass,$dp_id,$current_sem);
    
      if(!$result){
        echo "Regestraion failed try again";
      }
      else{
        $result = $crud->getDeptDetail($dept_id);
        $content = "Welcome to Gloabal E-Learning Site <br> You have sucessfully Registered in the following course detail
                      Department: ".$result['dept_name']."<br>"."Degree_program: "."B-Tech"."<br>"."Registration Date:".$date.
                      "<br><br> Use the following credential to login to student dashboard:<br> Email_Id: <b style=color:'blue'>".$email. "</b></b><br> Password: <b style=color:'blue'>".$mypass."</b><br> Your School ID : <b style=color:'blue'>".$std_id."<br><br>";
          $sendEmail = myPHPMailer::sendEmail($email,$content);
          if($sendEmail){
            $_SESSION['email']==$email;
            $registered = true;
            include('includes/success_msg.php');

          }
          $message = 'Congra your registration is succssfully completed!! \n Check your Email for Registration detail';
          echo ("<script type='text/javascript'>alert(\"$message\");</script>");
         
          header('Location:index.php');
          }
        }



      ?>

      <script>
        function verify(){
          alert("Registraion successfull!!!");
        let result = <?php echo json_encode($result); ?>
        let pass = <?php echo json_encode($mypass);?>
        let std_id = <?php echo json_encode($std_id);?>
        if(result=true){
          alert("NOTE DOWN YOUR CREDENTIAL:<br> your Password="+mypass+"<br>"+"your id="+std_id);
          alert("Login using your email and password provided");

        }
        }
      </script>
      </body>

      </html>