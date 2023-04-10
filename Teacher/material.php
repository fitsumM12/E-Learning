<?php 
    require_once './partials/header.php';
?>
<div class="content">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="col-md-12" id="custom-head">
              <div class="row">
                <!-- section to select the course for the faculty -->
                <div class="col-md-6">
                  <form name="form1">
                    <select id="custom-course" name="select" size=="1" class=" form-control
                                            form-control-lg" onchange="selectedOption(this.form);">
                      <option><a href="#">Select Course</a></option>
                      <?php
                                            $result = $operation->Mycourse($conn);
                                            while($temp = $result->fetch_assoc()){
                                                $crs_id = $temp['crs_id'];
                                                $sql2 = "SELECT crs_name from course_detail where crs_id = '$crs_id' limit 1";
                                                $result2= $conn->query($sql2);
                                                $crs_name = implode(" ", $result2->fetch_assoc());     
                                              ?>
                      <option value="<?php echo "material.php?search_course=&crs_id=$crs_id";?>">
                        <?php echo $crs_name;?>
                      </option>
                      <?php
                                            }?>
                    </select>
                  </form>
                </div>

              </div>
            </div>
            <!-- -->
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="card-body">
                <div class="row">
                  <?php
                                    if(isset($_GET['search_course']))
                                    {
                                        if(isset($_GET['message'])){
                                        $message = $_GET['message'];
                                        echo"<script>alert($message);</script>";
                                        }
                                    $fac_id = $_SESSION['fac_id'];
                                    $crs_id = $_GET['crs_id'];
                                    $sql = "SELECT * FROM `student_material` WHERE  `crs_id` = '{$crs_id}'";
                                    $result = $conn->query($sql);
                                    ?>
                  <!-- view of the mark details for specific section -->
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <div class="text-right">

                        <button type="button" class="btn btn-primary">
                          <i>
                            <?php echo"<a href='material.php?upload=&crs_id=$crs_id' style='color:black'>Upload New</a>";?></i></button>


                        <button type="button" class="btn btn-primary">
                          <i>
                            <?php echo"<a href='material.php?mymaterial=&crs_id=$crs_id' style='color:black'>My Material</a>";?></i></button>
                      </div>
                      <table class="table table-striped  table-bordered dt-responsive nowrap">
                        <thead id="custom-edit">
                          <tr>
                            <th><i>Title</i></th>
                            <th><i>PDF file</i></th>
                            <th><i>Link</i></th>
                            <th><i>Video</i></th>
                            <th><i>semester</i></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                                                    while($rows = $result->fetch_assoc()){
                                                        $id =$rows['mat_id'];
                                                        $video =$rows['video'];
                                                       ?>
                          <tr>
                            <td><?php echo $rows['title']  ?></td>
                            <td>
                              <div class="text-center">
                                <button type="button" style="width:120px;" class=" btn
                                                                    btn-secondary">
                                  <i>
                                    <?php echo"<a style='color:black;' href='manage_material.php?download={$id}&crs_id=$crs_id'>Download</a>";?></i></button>
                              </div>
                            </td>
                            <td>
                              <div class="text-center">
                                <button type="button" style="width:120px;" class="btn btn-secondary">
                                  <i>
                                    <a style='color:black;' href='<?php echo $rows['link']  ?>' target='_blank'>View a
                                      link</a></i></button>
                              </div>
                            </td>
                            <td>
                              <div class="text-center">
                                <button type="button" style="width:120px;" class="btn btn-secondary">
                                  <i>
                                    <a style='color:black;' href='Watch_video.php?video=<?php echo
                                                                            $id;?>'>Watch</a></i></button>
                              </div>
                            </td>
                            <td><?php echo $rows['current_sem']  ?></td>

                          </tr>
                          <?php
                                                     }?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                  <?php }?>
                </div>


                <!-- my material -->
                <div class="row">
                  <?php
                                    if(isset($_GET['mymaterial']))
                                    {
                                        if(isset($_GET['message'])){
                                        $message = $_GET['message'];
                                        echo"<script>alert($message);</script>";
                                        }
                                    $fac_id = $_SESSION['fac_id'];
                                    $crs_id = $_GET['crs_id'];
                                    $sql = "SELECT * FROM `student_material` WHERE  `crs_id` = '{$crs_id}' and `fac_id`='$fac_id'";
                                    $result = $conn->query($sql);
                                    ?>
                  <!-- view of the mark details for specific section -->
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <div class="text-right">

                        <button type="button" class="btn btn-primary">
                          <i>
                            <?php echo"<a href='material.php?upload=&crs_id=$crs_id' style='color:black'>Upload New</a>";?></i></button>


                        <button type="button" class="btn btn-primary">
                          <i>
                            <?php echo"<a href='material.php?mymaterial=&crs_id=$crs_id' style='color:black'>My Material</a>";?></i></button>
                      </div>
                      <table class="table table-striped  table-bordered dt-responsive nowrap">
                        <thead id="custom-edit">
                          <tr>
                            <th><i>Title</i></th>
                            <th><i>PDF file</i></th>
                            <th><i>Link</i></th>
                            <th><i>Video</i></th>
                            <th><i>semester</i></th>
                            <th colspan="2"><i>Action</i></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                                                    while($rows = $result->fetch_assoc()){
                                                        $id =$rows['mat_id'];
                                                        $video =$rows['video'];
                                                       ?>
                          <tr>
                            <td><?php echo $rows['title']  ?></td>
                            <td>
                              <div class="text-center">
                                <button type="button" style="width:120px;" class=" btn
                                                                    btn-secondary">
                                  <i>
                                    <?php echo"<a style='color:black;' href='manage_material.php?download={$id}'>Download</a>";?></i></button>
                              </div>
                            </td>
                            <td>
                              <div class="text-center">
                                <button type="button" style="width:120px;" class="btn btn-secondary">
                                  <i>
                                    <a style=' color:black;' href='<?php echo $rows['link']  ?>' target='_blank'>View a
                                      link</a></i></button>
                              </div>
                            </td>
                            <td>
                              <div class="text-center">
                                <button type="button" style="width:120px;" class="btn btn-secondary">
                                  <i>
                                    <?php echo"<a style='color:black;' href='Watch_video.php?video='$video''>Watch</a>";?></i></button>
                              </div>
                            </td>
                            <td><?php echo $rows['current_sem']  ?></td>
                            <td>
                              <button type="button" class="btn btn-success">
                                <i>
                                  <?php echo"<a href='material.php?modify=&mat_id=$id' style='color:black'>Modify</a>";?></i></button>


                            </td>
                            <td>
                              <button type="button" class="btn btn-danger">
                                <i>
                                  <?php echo"<a href='manage_material.php?delete=$crs_id&mat_id=$id' style='color:black'>Delete</a>";?></i></button>


                            </td>

                          </tr>
                          <?php
                                                     }?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>

          <div class="card-body">
            <div class="row">

              <div class="col-lg-12">
                <div class="card-body">

                  <!-- upload material -->
                  <?php
                                    if(isset($_GET['upload']))
                                    {
                                        
                                        if(isset($_GET['message'])){
                                            $message = $_GET['message'];
                                            echo"<script>alert($message);</script>";
                                            }
                                        $crs_id = $_GET['crs_id'];
                                        $fac_id =$_SESSION['fac_id'];
                                    ?>
                  <form method="POST" action="manage_material.php" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <legend id="custom-title" style="background:#f1f2f3; text-align:center;border-radius:5px;">
                            Upload New Material
                          </legend>
                        </div>
                      </div>
                      <div class="col-md-2"></div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" name="fac_id" class="form-control" value="<?php echo $fac_id ?>" hidden>
                        </div>
                        <div class="form-group">
                          <input type="text" name="crs_id" class="form-control" value="<?php echo $crs_id ?>" hidden>
                        </div>

                        <div class="form-group">
                          <label>File In PDF:</label>
                          <input type="file" name="file" accept="application/pdf,application/msword"
                            class="form-control" value="">
                        </div>
                        <div class="form-group">
                          <label>File In Video(optional):</label>
                          <input type="file" name="video" accept="video/*" class="form-control" value="">
                        </div>
                        <div class="form-group">
                          Link(optional):<input type="text" name="link" class=" form-control" value="">
                        </div>

                      </div>
                      <div class="col-md-6">

                        <div class="form-group">
                          <label>Title:</label>
                          <input type="text" name="title" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                          <label>Semester:</label>
                          <input type="number" name="semester" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                          <div class="text-center">
                            <button name="upload" type="submit" class="btn btn-primary">upload</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>

                  <?php } ?>














                  <!-- modify material -->
                  <?php
                                    if(isset($_GET['modify']))
                                    {
                                        if(isset($_GET['message'])){
                                        $message = $_GET['message'];
                                        echo"<script>alert($message);</script>";
                                        }
                                        $mat_id = $_GET['mat_id'];
                                        $sql = "SELECT * FROM `student_material` WHERE  `mat_id`='$mat_id'";
                                        $result = $conn->query($sql);
                                        $rows = $result->fetch_assoc();
                                        $video =$rows['video'];
                                        $title = $rows['title'];
                                        $link = $rows['link'];
                                        $semester = $rows['current_sem'];
                                        $title = $rows['title'];
                                        
                                    ?>
                  <form method="POST" action="manage_material.php" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <legend id="custom-title" style="background:#f1f2f3; text-align:center;border-radius:5px;">
                            Modify Uploaded Material
                          </legend>
                        </div>
                      </div>
                      <div class="col-md-2"></div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" name="fac_id" class="form-control" value="<?php echo $fac_id ?>" hidden>
                        </div>
                        <div class="form-group">
                          <input type="text" name="mat_id" class="form-control" value="<?php echo $mat_id ?>" hidden>
                        </div>
                        <div class="form-group">
                          <input type="text" name="crs_id" class="form-control" value="<?php echo $crs_id ?>" hidden>
                        </div>

                        <div class="form-group">
                          <label>File In PDF:</label>
                          <input type="file" name="file" accept="application/pdf,application/msword"
                            class="form-control" value="" reuqired>
                        </div>
                        <div class="form-group">
                          <label>File In Video(optional):</label>
                          <input type="file" name="video" accept="video/*" class="form-control" value="">
                        </div>
                        <div class="form-group">
                          Link(optional):<input type="text" name="link" class=" form-control"
                            value="<?php echo $link;  ?>">
                        </div>

                      </div>
                      <div class="col-md-6">

                        <div class="form-group">
                          <label>Title:</label>
                          <input type="text" name="title" class="form-control" value="<?php echo $title;  ?>" required>
                        </div>
                        <div class="form-group">
                          <label>Semester:</label>
                          <input type="number" name="semester" class="form-control" value="<?php echo $semester;  ?>"
                            required>
                        </div>
                        <div class="form-group">
                          <div class="text-center">
                            <button name="modify" type="submit" class="btn btn-primary">Update</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>

                  <?php } ?>
                </div>
              </div>

            </div> <!-- /.row -->

          </div>


        </div><!-- /# column -->
      </div>
      <!--  /Traffic -->

    </div>
    <!-- .animated -->
  </div>
  <!-- /.content -->
  <div class="clearfix"></div>
  <!-- Footer -->
  <?php
        require_once './partials/footer.php'
      ?>