<?php 
      require_once 'includes/header.php';
      $day = array('Monday','Tuesday','Wednesday','Thursday','Friday');
?>
<style>
  .table{
    margin:auto;
    width:50%;
  }
  thead{
    background-color:skyblue;
  }
</style>

<pre><h3 class="text-primary text-center">Time Table</h3></pre>
<table class="table table-hover table-bordered">
  <thead color="skyblue">
    <tr>
      <th>#</th>
      <th>Date|Period</th>
      <th>Monday</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $sec_id = $_SESSION['sec_id'];
      $result = $user->getTimeTable($sec_id,$day[0]);
      $count = 1;
      while($row = $result->fetch(PDO::FETCH_ASSOC)){ ?>
      <tr>
        <td> <?php echo $count; ?></td>
        <td> <?php echo $row['start_time'].'-'.$row['end_time']; ?></td> 
        <td> <?php echo $row['crs_name']; ?></td>
      </tr>
      <?php $count++;} ?>
     
  </tbody>
</table>
<table class="table table-hover table-bordered">
<thead color="skyblue">
    <tr>
      <th>#</th>
      <th>Date|Period</th>
      <th>Tuesday</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $sec_id = $_SESSION['sec_id'];
      $result = $user->getTimeTable($sec_id,$day[1]);
      $count = 1;
      while($row = $result->fetch(PDO::FETCH_ASSOC)){ ?>
      <tr>
        <td> <?php echo $count; ?></td>
        <td> <?php echo $row['start_time'].'-'.$row['end_time']; ?></td> 
        <td> <?php echo $row['crs_name']; ?></td>
      </tr>
      <?php $count++;} ?>
     
  </tbody>
</table>
<table class="table table-hover table-bordered">
<thead color="skyblue">
    <tr>
      <th>#</th>
      <th>Date|Period</th>
      <th>Wednesday</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $sec_id = $_SESSION['sec_id'];
      $result = $user->getTimeTable($sec_id,$day[2]);
      $count = 1;
      while($row = $result->fetch(PDO::FETCH_ASSOC)){ ?>
      <tr>
        <td> <?php echo $count; ?></td>
        <td> <?php echo $row['start_time'].'-'.$row['end_time']; ?></td> 
        <td> <?php echo $row['crs_name']; ?></td>
      </tr>
      <?php $count++;} ?>
     
  </tbody>
</table>
<table class="table table-hover table-bordered">
<thead color="skyblue">
    <tr>
      <th>#</th>
      <th>Date|Period</th>
      <th>Thursday</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $sec_id = $_SESSION['sec_id'];
      $result = $user->getTimeTable($sec_id,$day[3]);
      $count = 1;
      while($row = $result->fetch(PDO::FETCH_ASSOC)){ ?>
      <tr>
        <td> <?php echo $count; ?></td>
        <td> <?php echo $row['start_time'].'-'.$row['end_time']; ?></td> 
        <td> <?php echo $row['crs_name']; ?></td>
      </tr>
      <?php $count++;} ?>
     
  </tbody>
</table>
<table class="table table-hover table-bordered">
<thead color="skyblue">
    <tr>
      <th>#</th>
      <th>Date|Period</th>
      <th>Friday</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $sec_id = $_SESSION['sec_id'];
      $result = $user->getTimeTable($sec_id,$day[4]);
      $count = 1;
      while($row = $result->fetch(PDO::FETCH_ASSOC)){ ?>
      <tr>
        <td> <?php echo $count; ?></td>
        <td> <?php echo $row['start_time'].'-'.$row['end_time']; ?></td> 
        <td> <?php echo $row['crs_name']; ?></td>
      </tr>
      <?php $count++;} ?>
     
  </tbody>
</table>




<br><br><br><br><br><br><br><br><br><br><br><br>

<?php require_once 'includes/footer.php'?>