<?php 
     require_once 'includes/header.php';
     $dp_id = $_SESSION['dp_id'];
     $sem = $_SESSION['current_sem'];
     //get list of course for  student in the option menu
     $result = $user->getCourse($dp_id,$sem);
     //get student section to send the matrial using student id
     $id = $_SESSION['std_id'];
     $section = $user->getSection($id);
     $sec_id = $section['sec_id'];

?>
<style>
  .frm{
    margin:auto;
    width:50%;
  }
</style>
<pre><h2 class="text-primary text-center">Find Active Class</h2></pre>
<form method="post" class="frm" action="<?php htmlentities($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
 
<div class="fmg form-group">
      <select name="subject" id="subject" class="form-control">
      
          <option value="Select Subject"></option>
          
          <?php while( $row=$result->fetch(PDO::FETCH_ASSOC) ){?>

                <option value="<?php echo $row['crs_name'] ?>" required>
                  <?php echo $row['crs_name']?>
                </option>
          <?php

          } ?>

      </select>
      <button class="btn btn-primary" name="submit"> Procced</button> 
  </div>
</form>

<?php
  if(isset($_POST['submit'])){
    $crs_name = $_POST['subject'];
    $result = $user->goToClassRoom($crs_name);

  ?>
<table class="user table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Course Name</th>
      <th>Google Link</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php 
        $count = 1;
        while( $row=$result->fetch(PDO::FETCH_ASSOC) ){
      ?>
    <tr>

      <td> <?php echo $row['link_id']; ?> </td>
      <td> <?php echo $row['crs_name']; ?> </td>
      <td> 
          <i class=" btn btn-info btn-md fa fa-link"  aria-hidden="true">
           <a href="<?php echo $row['google_link']; ?>" target="_blank">
              <?php echo $row['google_link']; ?>
          </a>
      </td>
      

    </tr>
    <?php  }} ?>
    </tr>
  </tbody>
</table>




<br><br><br><br><br><br><br><br><br><br><br><br>

<?php require_once 'includes/footer.php'?>