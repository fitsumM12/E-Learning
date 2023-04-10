<?php
    require_once 'includes/header.php';
    $std_id = $_SESSION['std_id'];
    $sec_id = $_SESSION['sec_id'];

?>


<form class="act" action="<?php htmlentities($_SERVER['PHP_SELF'])?>" method="POST" role="form"
    enctype="multipart/form-data">
    <div class="form-group">

        <pre><h3 class="text text-success">Update Activity Here</h3></pre>
        <div class="fmg form-group custom-file ">

            <input type="file" accept=".pdf" class="custom-file-input pro" id="activity" name="activity">
            <label class="custom-file-label pro" for="activity">Choose file</label>
            <small id="activity" class="form-text text-warning">file should be in .pdf format only.</small>
        </div>
        <div class="text-center">
            <button class="btn btn-primary btn-md" name="submit">Update</button>
        </div>

</form>

<?php
    if(isset($_GET['act_id'])){
      $act_id = $_GET['act_id'];

      if(isset($_POST['submit'])){
        
       $file = $_FILES['activity']['name'];
       $file_tmp = $_FILES['activity']['tmp_name'];
       move_uploaded_file($file_tmp,"../upload/$file");
        $sub_date = date('Y-m-d');
       
  
        $result = $user->updateActivity($act_id,$std_id,$file,$sub_date);
        if($result){
          echo "<script>alert('Activity Updated Successfully')</script>";
          echo "<h3 color='skyblue'>your updated response has submitted successfully</h3><br>";
        }
        else{
          echo "<script>alert('failed to update activity please try again')</script>";

        }
    
        ?>
<div class="btn  btn-lg btn-success"><a href="index.php">Return Home</a></div>
<?php

      }

    }
?>































<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>

<?php require_once 'includes/footer.php'?>