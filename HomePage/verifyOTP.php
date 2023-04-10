<style>
  .otp_v{
    margin:auto;
    width:50%;
    padding:20px;
    border-radius:10px;
    background:darkblue;

  }
  /* .otp_v:hover{
    background:skyblue;

  } */

</style>


<?php
     require_once 'includes/header.php';
     require_once 'redirect.php';
     require_once 'sms.php';
     require_once 'sendEmail.php';
     $navigate = new navigate();
     $title = "Choose Verification";
     require_once 'includes/db.php';
   
?>

  <div class="otp_v col-md-6 text-center">
  <form action="" method="POST" role="form">
      <a href="verifyOTP.php?mobile_id=verify_mobile" class="btn btn-success btn-lg">Verify Via Mobile</a>
      <a href="confirmEmailOTP.php?email_id=verify_email" class="btn btn-info btn-lg">Verify Via Email</a>
  </form>
  </div>


  

<?php
if(isset($_GET['mobile_id'])){
?>
  <div class="otp_v col-md-6 text-center">
    <form action="" method="POST" role="form" id="mobile_form">
        <div class="form-group">
        <label for="mobileno" class="text-info">Enter Registered Mobile Number</label>
        <input type="text" class="form-control" name="mobileno" id="mobileno" required>
        <button type="submit" class="btn btn-primary" name="submit_mobile">Submit</button> 
        </div>
    </form>
  </div>

  <?php } ?>

  <?php
if(isset($_GET['email_id'])){
?>
  <div class="otp_v col-md-6 text-center">
    <form action="" method="POST" role="form" id="email_form">
        <div class="form-group">
        <label for="email" class="text-info">Enter Registered Email Address</label>
        <input type="email" class="form-control" name="email" id="email">
        <button type="submit" class="btn btn-primary" name="submit_email">Submit</button> 
        </div>
    </form>
  </div>
<?php } ?>

<?php
if(isset($_POST['submit_mobile'])){
  $mobile = $_POST['mobileno'];
  $OTP_sent = rand(1000,9999);
  $result = $crud->stdLogin($mobile);
  $mobile_db1 = $result['contact'];
  if($mobile==""){
    echo "<script>alert('Please Enter Valid Mobile Number')</script>";
  }
  else if($mobile != $mobile_db1){
    echo "<script>alert('This Mobile Number is not registered with us')</script>";
  }else{
    //hide previous form
    echo "<script>document.getElementById('mobile_form').style.display='none';</script>";
          $created_time = date('h:i:s',time());
          $expire_time =  date('h:i:s',time()+(30*60));
          $res = $user->insertOTP($mobile,$OTP_sent,$created_time,$expire_time);
          
          $content = "Your Mobile Verification code for Password change is:".$OTP_sent;
          $sendSMS = sendSMS($mobile,$content);
          if($sendSMS){
            $_SESSION['otp'] = $OTP_sent;
            $_SESSION['mobileno'] = $mobile;
             echo "<div class='text-success text-center'>OTP sent to your mobile</div>";
          }
   
       ?>

 <div class="otp_v col-md-6 text-center">
    <form action="" method="POST" role="form">
        <div class="form-group">
        <label for="mob_otp" class="text-info">Enter OTP sent to Your Mobile</label>
        <input type="number" class="form-control" name="mob_otp" id="mob_otp" required>
        <button type="submit" class="btn btn-primary btn-lg" name="submit_otp">Submit</button>  
        </div>
    </form>
  </div>
  </div>


  <?php } }  ?>
  <!-- submit otp to change password -->

  <?php
  if(isset($_POST['submit_otp'])){
    $OTP_user = $_POST['mob_otp'];
 
  
    if($OTP_user==$_SESSION['otp']){
      header("Location:changePassword.php");
      }
      else{
      echo "<script>alert('Invalid OTP!!! please enter the right OTP ')</script>";
      echo "<script>document.getElementById('mobile_form').style.display='none';</script>";
//let the user enter Otp again
?>
<div class="otp_v col-md-6 text-center">
<form action="" method="POST" role="form">
    <div class="form-group">
    <label for="mob_otp" class="text-info">Enter OTP sent to Your Mobile</label>
    <input type="number" class="form-control" name="mob_otp" id="mob_otp" required>
    <button type="submit" class="btn btn-primary btn-lg" name="submit_otp">Submit</button> 
    <a href="verifyOTP.php" name="submit_mobile">Resend OTP</a> 
    </div>
</form>
</div>
</div>
   <?php   
    }
  }



  ?>
  










<br><br><br><br><br><br><br><br><br><br><br><br>


<?php require_once 'includes/footer.php'; ?>
