<?php 
    require_once './partials/header.php';
?>
<!-- Content -->
<div class="content">
  <!-- Animated -->
  <div class="animated fadeIn">
    <!-- Widgets  -->
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-body">

            <?php
                            if(isset($_GET['video'])){
                            if($_GET['video']!=""){
                                
                            $id = $_GET['video'];
                            $sql = "SELECT video from student_material where mat_id='$id' limit 1";
                            $result = $conn->query($sql);
                            $rows=$result->fetch_assoc();
                            $video = $rows['video'];
                            if($video){
                                
                                ?>

            <video width="100%" height="60%" controls>
              <source src="../upload/<?php echo $video;  ?>" type="video/mp4">
              <source src="../upload/<?php echo $video;  ?>" type="video/ogg">
              Your browser does not support the video tag.
            </video>

            <?php
                        }
                        else{
                            
                        echo "<p>There is no video which is uploaded. </p>";
                        }
                        }}
                        ?>
          </div>
        </div>

      </div>



    </div>
    <!-- .animated -->
  </div>
  <!-- /.content -->
  <div class="clearfix"></div>
  <!-- Footer -->
  <?php
        require_once './partials/footer.php'
      ?>