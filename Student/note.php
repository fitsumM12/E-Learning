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

<pre><h2  class="text-center text-primary">Select Subject to View Note</h2></pre>
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
    $matrial = $user->getMaterial($dp_id,$sem,$crs_name);
    if($crs_name==''){
      echo "please select course !!!";

    }
    // get matrial for the course selected
  ?>

<!-- display the value inside the table -->
<table class=" user table table-hover table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Course Name</th>
            <th>Course ID</th>
            <th>Title</th>
            <th>Link</th>
            <th>PDF</th>

        </tr>
    </thead>
    <tbody>
        <?php 
        $count = 1;
        while( $row=$matrial->fetch(PDO::FETCH_ASSOC) ){
          $crs_id = $row['crs_id'];
          $crs_name = $row['crs_name'];
          $title = $row['title'];
          $link = $row['link'];
          $pdf = $row['pdf'];

      ?>
        <tr>

            <td> <?php echo $count; ?> </td>
            <td> <?php echo $crs_name; ?> </td>
            <td> <?php echo $crs_id; ?> </td>
            <td> <?php echo $title; ?> </td>
            <td>
                <a color="skyblue" href="<?php echo $link;?>" title="open Link" target="_blank">>
                    <i class="btn btn-info btn-sm fa fa-link" aria-hidden="true">
                        <?php echo trim($crs_name."-link"," ") ?>
                    </i>

                </a>
            </td>
            <!-- view uploaded file in pdf -->
            <td>
                <li style="list-style:none;">
                    <a color="pink" href="<?php echo '../'.$pdf; ?>" title="open File">
                        <i class="btn btn-info btn-sm fa fa-file-pdf-o" aria-hidden="true"> <?php echo $title;?> </i>
                    </a>
                    <a href="download.php?fileName = <?php echo $title?>" class="btn btn-primary btn-sm"
                        title="download">
                        <i class=" fa fa-download" aria-hidden="true"></i>
                    </a>
                </li>

            </td>


        </tr>
        <?php $count = $count+1; } ?>
    </tbody>
</table>

<?php
  }
?>



<br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br>
<?php require_once 'includes/footer.php';?>