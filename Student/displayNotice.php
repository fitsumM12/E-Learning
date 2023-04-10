<?php require_once 'includes/header.php';?>

<?php
  require_once 'includes/header.php';
  $std_id = $_SESSION['std_id'];
  $sec_id = $_SESSION['sec_id'];
  $result = $user->getNotice($sec_id);
?>

<style>
  .table{
    margin:auto;
    width:50%;
    font-size:22px;
  }

</style>

<div class="table-responsive table-borderless">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>notification</th>
        <th>date</th>
      </tr>
    </thead>
    <tbody>
    <?php while($notice = $result->fetch(PDO::FETCH_ASSOC)){?>
      <tr>
        <td><a class="text-primary text-lg" href="viewNotice.php?notice_id=<?php echo $notice['id']?>"><?php echo substr($notice['message'],0,20)?></a></td>
        <td><a class="text-primary text-lg" href="viewNotice.php?notice_id=<?php echo $notice['id']?>"><?php echo $notice['ann_date'];?></a></td>
      </tr>
      <?php  } ?>
    </tbody>
  </table>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php require_once 'includes/footer.php';?>

 



