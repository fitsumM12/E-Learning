<?php require_once 'includes/header.php'?>
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

<pre><h2 class="text-center text-primary">Exam Catalog</h2></pre>
<table class="user table table-hover bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Subject</th>
      <th>Exam Name</th>
      <th>Exam Link</th>
      <th>Start Date</th>
      <th>End Date</th>
    </tr>
  </thead>
  <tbody>
  <?php 
      $sec_id = $_SESSION['sec_id'];
      $result = $user->viewExam($sec_id);
      while($row = $result->fetch(PDO::FETCH_ASSOC)){
   
  ?>
    <tr>
      <td> <?php echo $row['exam_id'];?> </td>
      <td> <?php echo $row['crs_name'];?> </td>
      <td> <?php echo $row['exam_name'];?> </td>
      <td>
          <li style="list-style:none;">
              <a  href="<?php echo $row['exam_link'] ?> " title="open link" target="_blank">
                  <i class=" btn btn-info btn-md fa fa-link"  aria-hidden="true"> <?php echo $row['crs_name'].' '.$row['exam_name']; ?></i>
              </a>
          </li>
      </td>
      <td> <?php echo $row['start_date'];?> </td>
      <td> <?php echo $row['end_date'];?> </td>
    </tr>
      <?php }?>
  </tbody>
</table>




<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>

<?php require_once 'includes/footer.php'?>