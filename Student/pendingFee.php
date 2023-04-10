<?php 
    require_once 'includes/header.php';
    $std_id = $_SESSION['std_id'];
    $result = $user->Pending_Payment($std_id);


?>
<style>
 .user{
   margin:20px;
   padding:10px;
 }

</style>

<pre><h2 class="text-primary text-center">Pending Fee</h2></pre>
<table class="user table table-hover table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Student Name</th>
      <th>Item Name</th>
      <th>Amount($)</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  
  <?php 
    while($row=$result->fetch(PDO::FETCH_ASSOC)){ 
      
    ?> 
    <tr>
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['std_name']?></td>
      <td><?php echo $row['payment_reason']?></td>
      <td><?php echo $row['fee_amount']?></td>
      <td><?php echo "pending"; ?></td>
      <td><a href="../stripe-payment/index.php?id=<?php echo $std_id; ?>">PAY</a></td>
   
    </tr>
  <?php } ?>
  </tbody>
</table>

<a class="btn btn-primary btn-lg text-center" href="feedback.php" >SEND FEEDBACK</a>





<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>

<?php require_once 'includes/footer.php'?>