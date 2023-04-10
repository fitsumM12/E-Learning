<?php   require_once 'includes/header.php'; ?>
<style>
.frm {
    margin: auto;
    width: 50%;
}

thead {
    background-color: skyblue;
}
</style>


<pre><h1 color="blue" class="text-center text-primary">View Courses</h1></pre>
<form method="post" class="frm" action="<?php htmlentities($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
    <legend color="black"></legend>
    <div class="fmg form-group">
        <label for="sem" class="fml text-left">Search course by semester</label>
        <input type="number" class="form-control" id="sem" name="sem" default="1">
        <button type="submit" name="submit" class="btn btn-primary">Search</button>
    </div>

</form>


<?php 
  $sem = $_SESSION['current_sem'];
  $std_id = $_SESSION['std_id'];
  $dp_id = $_SESSION['dp_id'];

  if(isset($_POST['submit'])){
  $sem = $_POST['sem'];
      

  $result = $user->getCourse($dp_id,$sem);

  }
  else{
    $result=$user->getCourse($dp_id,$sem);
  }
?>


<h1 color="blue">Subject's</h1>
<table class="user table table-hover table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Course Name</th>
            <th>Course ID</th>
            <th>Credit Hour</th>
            <th>Current sem</th>
            <th>Catagory</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $count = 1;
        while( $row=$result->fetch(PDO::FETCH_ASSOC) ){
      ?>
        <tr>

            <td> <?php echo $count; ?> </td>
            <td> <?php echo $row['crs_name']; ?> </td>
            <td> <?php echo $row['crs_id']; ?> </td>
            <td> <?php echo $row['crs_credit']; ?> </td>
            <td> <?php echo $row['current_sem']; ?> </td>
            <td> <?php echo $row['category']; ?> </td>
        </tr>
        <?php $count = $count+1; } ?>
    </tbody>
</table>




<br><br><br><br><br><br><br><br><br><br><br><br>

<?php require_once 'includes/footer.php'?>