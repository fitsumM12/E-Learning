<?php 
  require_once 'includes/header.php';
  $dp_id = $_SESSION['dp_id'];
  $sem = $_SESSION['current_sem'];
  //get list of course for  student in the option menu
  $result = $user->getCourse($dp_id,$sem);
  //get student section to send the matrial using student id
  $id = $_SESSION['std_id'];
  $section = $user->getSection($id);
  $sec_id = $section['sec_id'];

?>
<style>
  .frm{
    margin:auto;
    width:50%;
  }
  .user{
    margin:10px;
  }
</style>


<pre><h1 color="blue" class="text-center text-primary">Previous Year Exam Catalog</h1></pre>
<form method="post" class="frm" action="<?php htmlentities($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
 
     <div class="fmg form-group">
            <select name="subject" id="subject" class="form-control">
            
                <option value="Select Subject">Select Subject</option>
                
                <?php while( $row=$result->fetch(PDO::FETCH_ASSOC) ){?>

                      <option value="<?php echo $row['crs_name'] ?>">
                        <?php echo $row['crs_name']?>
                      </option>
                <?php

                } ?>

            </select>
            <button class="btn btn-primary" name="submit"> Submit</button> 
        </div>
</form>
<?php
  if(isset($_POST['submit'])){
    // $_SERVER['REQUEST_METHOD']=='POST'
    $crs_name = $_POST['subject'];
    $prevExam = $user->getPrevExam($std_id,$crs_name);

    // get matrial for the course selected
  ?>

  <!-- display the value inside the table -->
  <table class="user table table-hover table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Course Name</th>
      <th>Course ID</th>
      <th>Exam Link</th>
      <th>Exam File</th>
      <th>Semester</th>
   
    </tr>
  </thead>
  <tbody>
     <?php 
        while( $row=$prevExam->fetch(PDO::FETCH_ASSOC) ){

          $id = $row['id'];
          $crs_id = $row['crs_id'];
          $crs_name = $row['crs_name'];
          $examFile = $row['exam_file'];
          $examLink = $row['exam_link'];
          $sem = $row['current_sem'];

      ?>
    <tr>        
        <td> 
            <?php 
              if($crs_name=='Select Subject' || $crs_name==' '){ echo "no data found for this course"; } 
           ?>
        </td>
    </tr> 
    <tr>
          <td> <?php echo $id; ?> </td>
          <td> <?php echo $crs_name; ?> </td>
          <td> <?php echo $crs_id; ?> </td>
          <td> 
              <a color="skyblue" href="<?php echo $examLink;?>" title="open Link" target="_blank">>
              <i class="btn btn-info btn-sm fa fa-link"  aria-hidden="true">
                <?php echo trim($crs_name." exam-link"," ") ?>
              </i>
              </a>
          </td>
          <!-- view uploaded file in pdf -->
          <td>
              <li class="active" style="list-style:none;">
                  <a  href = "<?php echo '../'.$examFile; ?>" title="open file" >
                      <i class=" btn btn-success btn-sm fa fa-file-pdf-o" aria-hidden="true">
                      <?php echo $crs_name." exam-file" ;?></i>
                  </a>
                  <a href = "download.php?fileName = <?php echo $examFile?>" title="download" class="btn btn-primary btn-sm">
                  <i class="fa fa-download"  aria-hidden="true"></i>
                  </a>
              </li>
          </td>
          <td><?php echo $sem; ?> </td>
      
    </tr>
    <?php } ?>
  </tbody>
</table>

  <?php
  }
?>



<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<script>
function playPause(){
  var video1 = document.getElementById('vid1');
  var btn1 = document.getElementById('btn1');
  if(video1.paused){
    video1.play();
    btn1.value = "Pause";
  }
  else{
    video1.pause();
    btn1.value ="Play";
  }


}


</script>
<?php require_once 'includes/footer.php';?>
