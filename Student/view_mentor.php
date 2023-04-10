<?php 
  require_once 'includes/header.php';
  $sec_id= $_SESSION['sec_id'];

  $result = $user->ViewMentor($sec_id);

?>
<style>
.frm {
    margin: auto;
    width: 50%;
}

.user {
    margin: 10px;
}

thead {
    background-color: skyblue;

}
</style>
<pre><h2 class="text-center text-primary">Mentor Detail</h2></pre>
<div class="px-5 py-5">
    <small class="text-center text-info">Please contact your mentor first for any help</small><br>
    <small class="text-center text-info">Click on view detail to view mentor contact detail and address</small>
</div>
<div class="col-md-6">
    <table class="user table table-hover table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Mentor NAME</th>
                <th>Mentor ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $count = 1;
            while($row = $result->fetch(PDO::FETCH_ASSOC)){ 
              $fac_id = $row['fac_id'];
              $fac_name = $row['fac_name'];
              $fac_email = $row['fac_email'];
              $fac_mobile = $row['fac_contact'];
              $fac_address = $row['current_address'];
          
            ?>
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $fac_name;?></td>
                <td><?php echo $fac_id;?></td>
                <td><a href="view_mentor.php?id=veiw_mentor">View Detail</a></td>
            </tr>
            <?php $count++;} ?>
        </tbody>
    </table>
</div>

<div class="col-md-6">

    <?php if(isset($_GET['id'])){?>
    <div class="card">
        <h3 class="card-header">Mentor Detail</h3>
        <div class="card-body">

            <p class="card-text">
            <pre><b>Mentor Id:</b><?php echo " ".$fac_id;?></p></pre>
            <h5> </h5>
            <p class="card-text">
            <pre><b>Mentor Name:  </b><span class="fa fa-user"></span> <?php echo $fac_name;?></p> </pre>
            <h5> </h5>
            <p class="card-text">
            <pre><b>Mentor Email:  </b><span class="fa fa-envelope"></span> <a href="mailto:<?php echo $fac_email;?>"><?php echo $fac_email;?></a></p></pre>
            <h5></h5>
            <p class="card-text">
            <pre><b>Mentor Mobile:  </b> <span class="fa fa-phone"></span><a href="tel://<?php $fac_mobile?>"><?php echo $fac_mobile;?></a></p></pre>
            <h5> </h5>
            <p class="card-text">
            <pre><b>Mentor Address:  </b> <span class="fa fa-address-book"></span><?php echo $fac_address;?></p></pre>
        </div>
        <?php } ?>
    </div>
</div>





<!-- 
<a class="btn btn-primary btn-lg text-center" href="feedback.php" >SEND FEEDBACK</a> -->




<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>

<?php require_once 'includes/footer.php'?>