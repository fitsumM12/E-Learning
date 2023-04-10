<?php 
    require_once 'includes/header.php';
    $std_id = $_SESSION['std_id'];
    $result = $user->viewAttendace($std_id);


?>
<style>
 .user{
   margin:20px;
   padding:10px;
 }

</style>

<pre><h2 class="text-primary text-center">VIEW ATTENDANCE</h2></pre>
<table class="user table table-hover table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>SUBJECT</th>
      <th>CLASS PROVIDED</th>
      <th>CLASS PRESSENT</th>
      <th>CLASS ABSENT</th>
      <th>Percentage(%)</th>
    </tr>
  </thead>
  <tbody>
  
  <?php 
    while($row=$result->fetch(PDO::FETCH_ASSOC)){ 
      
    ?> 
    <tr>
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['crs_name']?></td>
      <td><?php echo $row['class_provided']?></td>
      <td><?php echo $row['class_present']?></td>
      <td><?php echo $row['class_absent']?></td>
      <td><?php echo $row['percentage']?></td>
    </tr>
  <?php } ?>
  </tbody>
</table>

<a class="btn btn-primary btn-lg text-center" href="feedback.php" >SEND FEEDBACK</a>





<br><br><br><br><br><br><br><br><br><br><br><br>

<?php require_once 'includes/footer.php'?>