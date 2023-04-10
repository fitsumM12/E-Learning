<?php
    require_once 'includes/header.php';
    $std_id = $_SESSION['std_id'];
    $sec_id = $_SESSION['sec_id'];

?>
<style>
.frm {
    margin: auto;
    width: 50%;
}

.pro {
    height: 30px;
}
</style>


<pre><h1 color="blue" class="text-center text-primary">Upload Activity</h1></pre>
<form method="post" class="frm" action="<?php htmlentities($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
    <div class="form-group">

        <h3 class="text text-success">Upload Activity Here</h3>
        <div class="fmg form-group custom-file ">

            <input type="file" accept=".pdf" class="custom-file-input pro" id="activity" name="activity">
            <label class="custom-file-label pro" for="activity">Choose file</label>
            <small id="activity" class="form-text text-warning">file should be in .pdf format only.</small>
        </div>
        <div class="text-center">
            <button class="btn btn-primary btn-md" name="submit">Submit</button>
        </div>

</form>

<?php
    if(isset($_GET['act_id'])){
      $act_id = $_GET['act_id'];

      if(isset($_POST['submit'])){
        $sub_date = date('Y-m-d');
        $file = $_FILES['activity']['name'];
        $file_tmp = $_FILES['activity']['tmp_name'];
         move_uploaded_file($file_tmp,"../upload/$file");
  
        $result = $user->subimtActivity($act_id,$std_id,$file,$sub_date);
        if($result){
          echo "<script>alert('Activity Uploaded Successfully')</script>";
          $_SESSION['act_id']=$act_id;
        }
        else{
          echo "<script>alert('failed to upload activity')</script>";

        }
        echo "<h3 color='skyblue'>your response has submitted successfully</h3><br>";
        ?>
<div class="btn  btn-lg btn-success"><a href="index.php">Return Home</a></div>
<?php

      }

    }
?>






























<br><br><br><br><br><br><br><br><br><br><br><br> <br><br><br><br><br><br><br><br><br><br><br><br>

<?php require_once 'includes/footer.php'?>