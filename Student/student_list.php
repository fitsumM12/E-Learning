

<?php 
  require_once 'includes/header.php';
  $id = $_SESSION['std_id'];
  $section = $user->getSection($id);
  $result = $user->getStudentList($section['sec_id']);


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

<pre><h1 class="text-primary text-center">View Student's</h1></pre>
<table class="user table table-hover table-bordered">
  <thead>
    <tr bgcolor="skyblue">
      <th>#</th>
      <th>Student Name</th>
      <th>Student Id</th>
      <th>Student Email</th>
      <th>Student Mobile</th>
      <th>Section ID</th>
    </tr>
  </thead>
  <tbody>
  <?php 
       $count = 1;
       while( $row=$result->fetch(PDO::FETCH_ASSOC) ){
         $std_name = $row['std_name'];
         $std_id = $row['std_id'];
         $std_email = $row['email'];
         $std_mobile = $row['contact'];
         $sec_id = $row['sec_id']; 
        
  ?>

    <tr>
      <td> <?php echo $count; ?> </td>
      <td> <?php echo  $std_name; ?> </td>
      <td> <?php echo $std_id; ?> </td>
      <td> <?php echo $std_email; ?> </td>
      <td> <?php echo $std_mobile; ?> </td>
      <td> <?php echo $sec_id ;?> </td>
    </tr>
    <?php   $count = $count+1; }  ?>
  </tbody>
</table>




<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php require_once 'includes/footer.php'?>