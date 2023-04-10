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
                                        <select id="custom-course" name="select" size="1" class=" form-control
                                            form-control-lg" onchange="selectedOption(this.form);">
                                            <option><a href="#">Select Course</a></option>
                                            <?php
                                            $result = $operation->Mycourse($conn);
                                            while($temp = $result->fetch_assoc()){
                                                $crs_id = $temp['crs_id'];
                                                $sql2 = "SELECT crs_name from course_detail where crs_id = '$crs_id'";
                                                $result2= $conn->query($sql2);
                                                $crs_name = implode(" ", $result2->fetch_assoc());     
                                              ?>
                                            <option
                                                value="<?php echo "googleClassroom.php?search_course=&crs_id=$crs_id";?>">
                                                <?php echo $crs_name;?>
                                            </option>
                                            <?php
                                        }?>
                                        </select>
                                    </form>
                                </div>
                                <!-- section to select the class for the specified course -->
                                <div class="col-md-6">
                                    <form name="form1">
                                        <select id="custom-course" name="select" size="1" class=" form-control
                                            form-control-lg" onchange="selectedOption(this.form);">
                                            <option><a href="#">Select Section</a></option>
                                            <?php
                                             if(isset($_GET['search_course']))
                                             {           
                                                 $fac_id = $_SESSION['fac_id'];
                                                 $crs_id = $_GET['crs_id'];
                                                 $_SESSION['crs_id'] = $crs_id;
                                                 $result = $operation->MyCourseAllocationId($crs_id, $conn);
                                                 $fac_crs_id = implode(" ",$result->fetch_assoc());
                                                 $result =$operation->Mysection($fac_crs_id, $conn);
                                                 while($rows = $result->fetch_assoc()){
                                                     $sec_id =$rows['sec_id'];
                                                     ?>
                                            <option
                                                value="<?php echo "googleClassroom.php?search_section=&sec_id=$sec_id";?>">
                                                <?php echo $sec_id;?>
                                            </option>
                                            <?php }} ?>
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
                                    if(isset($_GET['search_section']))
                                    {
                                        if(isset($_GET['message'])){
                                            $message = $_GET['message'];
                                            echo"<script>alert($message);</script>";
                                        }
                                        $fac_id = $_SESSION['fac_id'];
                                        $sec_id = $_GET['sec_id'];
                                        $crs_id = $_SESSION['crs_id'];
                                        $sql = "SELECT * from google_link gl inner join course_detail cr on gl.crs_id=cr.crs_id
                                             where gl.crs_id = '$crs_id' and gl.fac_id='$fac_id' and gl.sec_id= '$sec_id'";
                                            $result = $conn->query($sql);
                                    ?>
                                    <!-- `link_id`, `crs_id`, `sec_id`, `google_link`, `fac-id` FROM `google_link` -->
                                    <!-- view of the class link details for specific section -->
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <div class="text-right">

                                                <button type="button" class="btn btn-primary">
                                                    <i>
                                                        <?php echo"<a href='googleClassroom.php?upload=&crs_id=$crs_id&sec_id=$sec_id' style='color:black'>Upload New</a>";?></i></button>
                                            </div>
                                            <table
                                                class="table table-striped  table-bordered table-hover dt-responsive nowrap"
                                                style="font-size:12px;">
                                                <thead id="custom-edit">
                                                    <tr>
                                                        <th><i>Id</i></th>
                                                        <th><i>Course Name</i></th>
                                                        <th><i>Google Link</i></th>
                                                        <th><i>section</i></th>
                                                        <th colspan="2"><i>Action</i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    if($result){
                                                    while($rows = $result->fetch_assoc()){
                                                        $id = $rows['link_id'];
                                                        $crs_id = $rows['crs_id'];
                                                        $crs_name = $rows['crs_name'];
                                                        $fac_id = $rows['fac_id'];
                                                        $google_link = $rows['google_link'];
                                                        $sec_id = $rows['sec_id'];
                                                       
                                                       ?>
                                                    <tr>
                                                        <td><?php echo $id; ?></td>

                                                        <td><?php echo $crs_name;  ?></td>
                                                        <td>
                                                            <a href="<?php echo $google_link;  ?>"
                                                                class=" btn btn-primary btn-lg" target="_blank"
                                                                title="<?php echo $google_link;  ?>">
                                                                <i class="fa fa-link">Join Class</i>
                                                            </a>
                                                        </td>
                                                        <td><?php echo $sec_id;  ?></td>
                                                        <td>
                                                            <div class="text-center">
                                                                <button type="button" style="width:120px;" class=" btn
                                                                    btn-secondary">
                                                                    <i>
                                                                        <?php echo"<a style='color:black;' href='googleClassroom.php?edit_id=$id&crs_id=$crs_id&sec_id=$sec_id'>Edit</a>";?></i></button>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="text-center">
                                                                <button type="button" class="btn btn-danger"
                                                                    style="width:120px;">
                                                                    <i>
                                                                        <?php echo"<a style='color:black;' href='manage_googleClassroom.php?delete_id=$id&sec_id=$sec_id'>Delete</a>";?></i></button>
                                                            </div>


                                                        </td>
                                                    </tr>
                                                    <?php
                                                     }}
                                                     
                                                     else{
                                                         echo "Connection Problem";
                                                     }
                                                     ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php }?>
                                </div>



                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="card-body">
                                                <!-- modify activity -->
                                                <?php
                                        //modify the section mark
                                        if(isset($_GET['edit_id'])){
                                            $id = $_GET['edit_id'];
                                            $sql = "SELECT * FROM google_link where link_id=$id";
                                            $result = $conn->query($sql);
                                            $row = $result->fetch_array();
                                            $link_id = $row['link_id'];
                                            $crs_id = $row['crs_id'];
                                            $sec_id = $row['sec_id'];
                                            $fac_id = $row['fac_id'];
                                            $link = $row['google_link'];
                                          
                                            ?>
                                                <form method="POST" action="manage_googleClassroom.php"
                                                    enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <legend id="custom-title"
                                                                    style="background:#f1f2f3; text-align:center;border-radius:5px;">
                                                                    Modify Class Link
                                                                </legend>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Link ID:</label>
                                                                <input type="text" name="link_id"
                                                                    value="<?php echo $link_id; ?>" class="form-control"
                                                                    readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Course ID:</label>
                                                                <input type="text" name="crs_id" class="form-control"
                                                                    value="<?php echo $crs_id ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Section ID:</label>
                                                                <input type="text" name="sec_id" class="form-control"
                                                                    value="<?php echo $sec_id ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Faculty ID:</label>
                                                                <input type="text" name="fac_id" class="form-control"
                                                                    value="<?php echo $fac_id ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Link:</label>
                                                                <input type="text" name="link" class=" form-control"
                                                                    value="<?php echo $link; ?>" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="text-center">
                                                                    <button name="modify" type="submit"
                                                                        class="btn btn-primary">Save/update</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- update google link -->

                                                <?php   
                        
                                    
                                   }
                                    
                                    ?>

                                                <?php
                                    if(isset($_GET['upload']))
                                    {
                                        $crs_id = $_GET['crs_id'];
                                        $sec_id = $_GET['sec_id'];
                                    ?>
                                                <form method="POST" action="manage_googleClassroom.php"
                                                    enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <legend id="custom-title"
                                                                    style="background:#f1f2f3; text-align:center;border-radius:5px;">
                                                                    Upload New Class Link
                                                                </legend>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Link ID:</label>
                                                                <input type="text" name="act_id"
                                                                    value="ID will be generated after submission"
                                                                    class="form-control" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Course ID:</label>
                                                                <input type="text" name="crs_id" class="form-control"
                                                                    value="<?php echo $crs_id ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Section ID:</label>
                                                                <input type="text" name="sec_id" class="form-control"
                                                                    value="<?php echo $sec_id ?>" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                Faculty Id:<input type="text" name="fac_id"
                                                                    class=" form-control" value="<?php echo $fac_id ?>"
                                                                    readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                Link:<input type="text" name="link"
                                                                    class=" form-control" value="" required>
                                                            </div>


                                                            <div class="form-group">
                                                                <div class="text-center">
                                                                    <button name="assign" type="submit"
                                                                        class="btn btn-primary">Upload Link</button>
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
                <?php
// upload new link

?>

                <!-- Footer -->
                <?php
        require_once './partials/footer.php'
      ?>