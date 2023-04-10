<?php
    require_once 'includes/header.php';
    function grading($total){
          if($total>=90){
            echo "O";
          }
          else if($total<90 && $total>=80){
            echo 'E';
          }
          else if($total<80 && $total>=70){
            echo  'A';
          }
          else if($total<70 && $total>=60){
            echo 'B';
          }
          else if($total<60 && $total>=50){
            echo 'C';
          }
          else if($total<50 && $total>=40){
            echo 'D';
          }
          else{
            echo 'F';

          }
      }
?>
<style>
  .frm{
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
    

<pre><h2 class = "text-primary text-center">Academic Result</h2></pre>
<form class="frm" action="<?php htmlentities($_SERVER['PHP_SELF'])?>" method="POST" role="form">
<legend color="black"></legend>
<div class="fmg form-group">
  <strong for="sem" class="fml text-left">Find semester Result</strong>
  <select name="sem" class="form-control">">
      <option value="1">1st</option>
      <option value="2">2nd</option>
      <option value="3">3rd</option>
      <option value="4">4th</option>
      <option value="5">5th</option>
      <option value="6">6th</option>
      <option value="7">7th</option>
      <option value="8">8th</option>
  </select>
  <button type="submit" name="submit" class="btn btn-primary">Search</button>
</div>

</form>



<?php 
$std_id = $_SESSION['std_id'];
$dp_id = $_SESSION['dp_id'];

if(isset($_POST['submit'])){
    $sem = $_POST['sem'];
    $result = $user->getgradeReport($std_id,$sem,$dp_id);
    if($result->rowCount()==0){
      echo "<h5 align='center' style='color:#ff0012;'> No Result Published for semester $sem </h5>";
      echo "<script>alert('No Result Published for semester $sem') </script>";
    }

  }
else{
  $result = $user->getgradeReport($std_id,$_SESSION['current_sem'],$dp_id);

}

?>

<table class = "user table table-hover table-bordered">
<thead>
  <tr>
    <th>#</th>
    <th>Acadamic Year</th>
    <th>Course Name</th>
    <th>grade Symbol</th>
    <th>Semester</th>
    <th>Status</th>
  </tr>
</thead>
<tbody>
   <?php 
      $count = 1;
      while($row = $result->fetch(PDO::FETCH_ASSOC) )
      {
        
        $total = $row['mid_exam'] + $row['final_exam'] + $row['class_asses'];
        

       

    ?>
  <tr>

    <td> <?php echo $count; ?> </td>
    <td> <?php echo "2019-".date('Y'); ?> </td>
    <td> <?php echo $row['crs_name']; ?> </td>
    <td> <?php grading($total); ?> </td>
    <td> <?php echo $row['current_sem']; ?> </td>
    <td> <?php echo 'approved' ?> </td>
  </tr>
  <?php $count = $count+1; } ?>
</tbody>
</table>





























<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
    require_once 'includes/footer.php';
?>