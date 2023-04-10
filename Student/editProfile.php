<?php 
  require_once 'includes/header.php';
?>

<style>
  .frm {
    margin:auto;
    width:50%;
  }
  .user{
    margin:10px;
  }
  thead{
    background-color:skyblue;

  }
</style>

<?php


  if(!isset($_GET['id'])){
    echo "<alert>Invalid User Id try again error 101</alert>";
   }
   else{
      $email = $_GET['id'];
      $result = $user->viewProfile($email);

      $profile_db = $result['profile_picture'];
      $rs_db = $result['residential_certificate'];
      $std_name = $result['std_name'];
      $std_id = $result['std_id'];
      $std_ca = $result['current_address'];
      $std_pa = $result['permanent_address'];
      $contact = $result['contact'];

   }

?>

<?php 
  if(isset($_POST['saveChange'])){
    $std_id=$_POST['id'];
    $std_name = $_POST['std_name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $ms = $_POST['marital'];
    $ca = $_POST['c_address'];
    $pa = $_POST['p_address'];


    //upload 10th,12th certifcate and profile picture to the server
        $target_dir = '../upload/';

        $profile = $_FILES['profile']['name'];
        $profile_temp = $_FILES['profile']['tmp_name'];
            
          // empty profile set the existing one
          if(empty($profile)){
            $profile = $profile_db;
          }

        $RC = $_FILES['rs']['name'];
        $RC_temp = $_FILES['rs']['tmp_name'];
    //if empty choose existing one
        if(empty($RC)){
          $RC = $rs_db;
        }

    //move to folder we need
    move_uploaded_file($profile_temp,$target_dir.$profile);
    move_uploaded_file($RC_temp,$target_dir.$RC);

    
  $result = $user->updateProfile($std_id,$email,$contact,$ms,$ca,$pa,$profile,$RC);

  if($result){
    echo "<script>alert('profile update success')</script>";
    header("Location: viewProfile.php?id=$email");

  }else{
    echo "<script>alert('failed to  update profile try again')</script>";

  }

  }
?>


<style>
  label{
    color:#cca2ec;
  }
</style>

  <pre><h1 class="text-center text-primary">EDIT RECORDS </h1></pre>
  
  <form action="" class="frm" method="POST" enctype="multipart/form-data">
    <legend class="text-center text-success">Profile Update</legend>
    <input type="hidden" name="id" id="id" value="<?php echo $result['std_id'];?>"/>

    <div class="form-group">
      <label for="st_name">Student Name</label>
      <input type="text" disabled class="form-control" value="<?php echo $std_name; ?>" id="std_name" name="std_name" >
    </div>
  
    <div class="form-group">
      <label for="email">Student Email</label>
      <input type="email" class="form-control" value="<?php echo $email; ?>" id="email" name="email" >
    </div>
    <div class="form-group">
      <label for="lname">Contact NO</label>
      <input type="text"  value="<?php echo $contact; ?>" class="form-control" id="contacct" name="contact">
    </div>
    <div class="form-group">
      <label for="">Marital Status</label>
      <select class="form-control" name="marital" id="marital">
            <option selected="selected" hidden><?php echo $result['marital_status']?></option>
            <option  value="single">Single</option>
            <option  value="Engaged">Engaged</option>
            <option  value="Married">Married</option>
            <option  value="divorced">Divorced</option>
      </select>
    </div>
    <div class="form-group">
      <label for="email">Current Address</label>
      <textarea class="form-control" value="<?php echo $std_ca; ?>" name="c_address" id="c_address" cols="30" rows="10">
            <?php echo $result['current_address']?>
      </textarea>
    </div>
    <div class="form-group">
      <label for="email">permanent Address</label>
      <textarea class="form-control" value="<?php echo $std_pa; ?>" name="p_address" id="p_address" cols="30" rows="10">
            <?php echo $result['current_address']?>
      </textarea>
    </div>

    <label for="profile" class="pro">Upload Profile Picture</label><span color="red"> *</span><br>
    <div class="custom-file">
        <input type="file" accept="image/*"  value=""  class="custom-file-input pro" id="profile" name="profile">
        <label class="custom-file-label pro" for="profile" >Choose file</label>

    </div><br><br>
    <label for="profile" class="pro">Upload Residential Certificate</label><span color="red"> *</span><br>
    <div class="custom-file">
        <input type="file" accept=".doc,.pdf,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" value=""  class="custom-file-input pro" id="rs" name="rs">
        <label class="custom-file-label pro" for="profile" >Choose file</label>
    </div><br><br>
  
    
  
    <button type="submit" name="saveChange" width="80" onclick="return confirm('are you sure you want to make change to this record?')" class="btn btn-primary " id="submit"  >Save Change</button>
    <a class="btn btn-warning" href="index.php">Go Back</a>
  </form>




<br><br><br><br><br><br><br><br><br><br><br>
<?php require_once 'includes/footer.php';?>
