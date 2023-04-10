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
.frm {
  margin: auto;
  width: 50%;
}

.user {
  margin: 10px;
}

thead {
  background-color: skyblue;

}
</style>


<pre><h1 color="blue" class="text-center text-primary">View Project Subject Wise</h1></pre>
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
    <button class="btn btn-primary" name="submit"> Search</button>
  </div>
</form>

<?php
  if(isset($_POST['submit'])){
    // $_SERVER['REQUEST_METHOD']=='POST'
    $crs_name = $_POST['subject'];
    $act_type = "Project";
    $activity = $user->getActivity($crs_name,$sec_id,$act_type);

  ?>


<table class="user table table-hover table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Subject Name</th>
      <th>Activity ID</th>
      <th>Activity Type</th>
      <th>Activity File</th>
      <th>Activity Link</th>
      <th>Assigned Date</th>
      <th>Submission Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $count = 1;
      while( $row=$activity->fetch(PDO::FETCH_ASSOC) ){
        $crs_name = $row['crs_name'];
        $act_id = $row['act_id'];
        $act_type = $row['act_type'];
        $act_file = $row['file'];
        $act_link = $row['link'];
        $assign_date = $row['allot_date'];
        $sub_date = $row['sub_date'];
        $status = 'not submitted';
    
    ?>

    <tr>
      <td><?php echo $count ?> </td>
      <td><?php echo $crs_name ?> </td>
      <td><?php echo $act_id ?> </td>
      <td><?php echo $act_type ?> </td>
      <td>
        <li style="list-style:none;">
          <a href="<?php echo '../upload/'.$act_file; ?>" title="open file">
            <i class=" btn btn-primary btn-md fa fa-file-pdf-o" aria-hidden="true"> <?php echo $act_id.'-file';?> </i>
          </a>
        </li>
      </td>
      <td>
        <li style="list-style:none;">
          <a href="<?php echo $act_link ?> " title="open link" target="_blank">
            <i class=" btn btn-info btn-md fa fa-link" aria-hidden="true"> <?php echo $act_id.'-link'; ?></i>
          </a>
        </li>
      </td>
      <td><?php echo $assign_date ?> </td>
      <td><?php echo $sub_date ?> </td>
      <td>
        <div class="row">
          <div class="col-md-4">
            <a class="btn btn-info btn-sm" href="submit_activity.php?act_id=<?php echo $act_id; ?>" title="submit"
              name="upload">
              <i class="fa fa-subway" aria-hidden="true"></i>
            </a>
          </div>
          <div class="col-md-4">
            <a class="btn btn-success btn-sm" href="update_activity.php?act_id=<?php echo $act_id; ?>" title="edit"
              name="edit">
              <i class="fa fa-pencil-square" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </td>

    </tr>
    <!-- close while loop -->
    <?php $count++; }?>
  </tbody>
</table>
<!-- close the form -->
<?php }?>
<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>

<?php require_once 'includes/footer.php'?>