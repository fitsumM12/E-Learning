<?php 
    require_once 'includes/header.php';
    $std_id = $_SESSION['std_id'];
    $result = $user->Payment_history($std_id);


?>
<style>
 .user{
   margin:20px;
   padding:10px;
 }

</style>

<pre><h2 class="text-primary text-center">Payment History</h2></pre>
<table class="user table table-hover table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Txt Id</th>
      <th>Name</th>
      <th>Item Name</th>
      <th>Item Number</th>
      <th>Item Price($)</th>
      <th>Payment Date</th>
      <th>Payment Status</th>
    </tr>
  </thead>
  <tbody>
  
  <?php 
    while($row=$result->fetch(PDO::FETCH_ASSOC)){ 
      
    ?> 
    <tr>
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['txn_id']?></td>
      <td><?php echo $row['name']?></td>
      <td><?php echo $row['item_name']?></td>
      <td><?php echo $row['item_number']?></td>
      <td><?php echo $row['item_price']?></td>
      <td><?php echo $row['created']?></td>
      <td><?php echo $row['payment_status']?></td>
    </tr>
  <?php } ?>
  </tbody>
</table>

<a class="btn btn-primary btn-lg text-center" href="feedback.php" >SEND FEEDBACK</a>





<br><br><br><br><br><br><br><br><br><br><br><br>

<br><br><br><br><br><br><br><br><br><br><br><br>

<br><br><br><br><br><br><br><br><br><br><br><br>

<?php require_once 'includes/footer.php'?>