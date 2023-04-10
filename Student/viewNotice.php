<?php
  require_once 'includes/header.php';
  $std_id = $_SESSION['std_id'];
  $sec_id = $_SESSION['sec_id'];
  

  if(isset($_GET['notice_id'])){
    $notice_id = $_GET['notice_id'];
    $result = $user->NoticeDetail($notice_id);

    ?>
  <style>
    .notice{
      margin:auto; 
      width:50%;
      padding : 6px;
      border:5px solid skyblue;
      border-radius:12px;
      position:fixed;

  
    }
 
  </style>
   <pre><h2 class="text-primary text-center">Notice Detail</h2></pre>
    <div class="table table-responsive col-md-6 notice" >
      <table class="table table-hover table-borderless">
        <thead>
          <tr>
            <th>From</th>
            <td class="text-success"><?php echo $result['noticer_email']; ?></td>
          </tr>

          <tr>
            <th>Date</th>
            <td class="text-success"><?php echo $result['ann_date']; ?></td>
          </tr>

          <tr>
            <th>Message</th>

            <td class="text-success"><?php echo $result['message']; ?></td>
  
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    

 <?php } ?>
 <br><br><br><br><br><br><br><br><br><br><br><br><br>
 <br><br><br><br><br><br><br><br><br><br><br><br><br>
 <br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php require_once 'includes/footer.php';?>
