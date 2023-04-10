<?php 
  require_once 'includes/header.php';
  $std_id= $_SESSION['std_id'];

  $result = $user->getStudentMark($std_id);

?>
<style>
  .frm .table{
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

<pre><h2 class="text-center text-primary">Mark Detail</h2></pre>
<table class="user table table-hover table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Course Name</th>
      <th>Course ID</th>
      <th>Assesement</th>
      <th>Mid Exam</th>
      <th>Final Exam</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $count = 1;
      while($row = $result->fetch(PDO::FETCH_ASSOC)){ 
        $subject = $row['crs_name'];
        $crs_id = $row['crs_id'];
        $asses = $row['class_asses'];
        $mid = $row['mid_exam'];
        $final = $row['final_exam'];
        $total = $asses + $mid + $final;
      ?>
    <tr>
      <td><?php echo $count?></td>
      <td><?php echo $subject?></td>
      <td><?php echo $crs_id?></td>
      <td><?php echo $asses?></td>
      <td><?php echo $mid?></td>
      <td><?php echo $final?></td>
      <td><?php echo $total?></td>
    </tr>
  <?php $count++;} ?>
  </tbody>
</table>
<a class="btn btn-primary btn-lg text-center user" href="feedback.php" >SEND FEEDBACK</a>




<br><br><br><br><br><br><br><br><br><br><br><br>

<?php require_once 'includes/footer.php'?>