
<?php require_once 'includes/header.php';?>
<style>
  .user{
    margin:20px;
  }
</style>



    <pre><h2 class="text-primary text-center">Academic Calendar</h2></pre>


    

<table class="user table table-hover table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Calander Year</th>
      <th>Semester</th>
      <th>Mid Exam</th>
      <th>Final Exam</th>
      <th>Summar Break</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php 
        $count = 1;
        $result = $user->ViewAcademic_Calendar();
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
      ?>
    <tr>

      <td> <?php echo $count; ?> </td>
      <td> <?php echo $row['acad_cal_strtng_date']." - ".$row['acad_cal_end_date']; ?> </td>
      <td> <?php echo $row['acad_cal_title']; ?> </td>
      <td> <?php echo $row['mid_exam_start_date']." - ".$row['mid_exam_end_date']; ?> </td>
      <td> <?php echo $row['final_exam_start_date']." - ".$row['final_exam_end_date'];; ?> </td>
      <td> <?php echo $row['break']; ?> </td>
    </tr>
    <?php $count = $count+1; } ?>
    </tr>
  </tbody>
</table>
<marquee><pre ><h4>Any change regarding exam schedule will be notified directly to student portal</h4></pre></marquee>









<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php require_once 'includes/footer.php';?>