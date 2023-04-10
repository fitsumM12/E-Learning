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
                                            <option
                                                value="<?php echo "student_activity.php?search_course=&crs_id=$crs_id";?>">
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
                                        <select id="custom-course" name="select" size=="1" class=" form-control
                                            form-control-lg" onchange="selectedOption(this.form);">
                                            <option><a href="#">Select Section</a></option>
                                            <?php
                                             if(isset($_GET['search_course']))
                                             {           
                                                 $fac_id = $_SESSION['fac_id'];
                                                 $crs_id = $_GET['crs_id'];
                                                 $_SESSION['crs_id'] =$crs_id;
                                                 $result = $operation->MyCourseAllocationId($crs_id, $conn);
                                                 $fac_crs_id = implode(" ",$result->fetch_assoc());
                                                 $result =$operation->Mysection($fac_crs_id, $conn);
                                                 while($rows = $result->fetch_assoc()){
                                                     $sec_id =$rows['sec_id'];
                                                     ?>
                                            <option
                                                value="<?php echo "student_activity.php?search_section=&sec_id=$sec_id";?>">
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
                                        $sql = "select * from student_activity where crs_id = '$crs_id' and sec_id= $sec_id";
                                        $result = $conn->query($sql);
                                    ?>
                                    <!-- view of the mark details for specific section -->
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <div class="text-right">

                                                <button type="button" class="btn btn-primary">
                                                    <i>
                                                        <?php echo"<a href='student_activity.php?upload=&crs_id=$crs_id&sec_id=$sec_id' style='color:black'>Upload New</a>";?></i></button>
                                            </div>
                                            <table
                                                class="table table-striped  table-bordered table-hover dt-responsive nowrap"
                                                style="font-size:12px;">
                                                <thead id="custom-edit">
                                                    <tr>
                                                        <th><i>Type</i></th>
                                                        <th><i>Alloted on</i></th>
                                                        <th><i>Deadline</i></th>
                                                        <th colspan="5"><i>Action </i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    while($rows = $result->fetch_assoc()){
                                                        $id = $rows['act_id'];
                                                        $link =$rows['link'];
                                                       ?>
                                                    <tr>
                                                        <td><?php echo $rows['act_type']  ?></td>

                                                        <td><?php echo $rows['allot_date']  ?></td>
                                                        <td><?php echo $rows['sub_date']  ?></td>
                                                        <td>
                                                            <div class="text-center">
                                                                <button type="button" style="width:120px;" class=" btn
                                                                    btn-secondary">
                                                                    <i>
                                                                        <?php echo"<a style='color:black;' href='manage_activity.php?download={$id}&sec_id=$sec_id'>Download file</a>";?></i></button>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="text-center">
                                                                <button type="button" style="width:120px;"
                                                                    class="btn btn-secondary">
                                                                    <i>
                                                                        <?php echo"<a  style='color:black;' href='$link' target='_blank'>View a link</a>";?></i></button>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="text-center">
                                                                <button type="button" style="width:120px;"
                                                                    class="btn btn-success">
                                                                    <i>
                                                                        <?php echo"<a style='color:black;' href='student_activity.php?edit={$id}'>Edit</a>";?></i></button>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="text-center">
                                                                <button type="button" class="btn btn-danger"
                                                                    style="width:120px;">
                                                                    <i>
                                                                        <?php echo"<a style='color:black;' href='manage_activity.php?delete={$id}&sec_id=$sec_id'>Delete</a>";?></i></button>
                                                            </div>


                                                        </td>
                                                        <td>
                                                            <div class="text-center">
                                                                <button type="button" style="width:120px;" class=" btn
                                                                    btn-secondary">
                                                                    <i>
                                                                        <?php echo"<a style='color:black;' href='student_activity.php?response={$id}&sec_id=$sec_id'>Response</a>";?></i></button>
                                                            </div>
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


                                <!-- student response  -->
                                <div class="row">
                                    <?php
                                    if(isset($_GET['response']))
                                    {
                                        $sec_id=$_GET['sec_id'];
                                        $act_id = $_GET['response'];
                                        $sql = "SELECT * FROM `submitted_activity` WHERE `act_id`=$act_id";
                                        $result = $conn->query($sql);
                                    ?>
                                    <!-- view of the mark details for specific section -->
                                    <div class="col-md-12">
                                        <div class="table-responsive">

                                            <table
                                                class="table table-striped  table-bordered table-hover dt-responsive nowrap"
                                                style="font-size:12px;">
                                                <thead id="custom-edit">
                                                    <tr>
                                                        <th><i>Student ID</i></th>
                                                        <th><i>Date</i></th>
                                                        <th><i>Response File</i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    while($rows = $result->fetch_assoc()){
                                                        $id = $rows['id'];
                                                        $std_id = $rows['std_id'];
                                                        $sub_date = $rows['sub_date'];
                                                        $file=$rows['response_file']; 
                                                       ?>
                                                    <tr>
                                                        <td><?php echo $std_id;  ?></td>
                                                        <td><?php echo $sub_date;  ?></td>
                                                        <td>
                                                            <div class="text-left">
                                                                <button type="button" style="width:120px;" class=" btn
                                                                    btn-secondary">
                                                                    <i>
                                                                        <?php echo"<a style='color:black;' href='manage_activity.php?response={$id}&sec_id=$sec_id'>Download file</a>";?></i></button>
                                                            </div>
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
                                    <!-- modify marks -->
                                    <?php
                                        //modify the section mark
                                        if(isset($_GET['edit'])){
                                            $act_id = $_GET['edit'];
                                            $row = $activity->get_activity_details($conn);
                                            $sec_id = $row['sec_id'];
                                            $crs_id = $row['crs_id'];
                                            // $link = $row['link'];
                                            $title = $row['act_type'];
                                            $link = $row['link'];
                                            $allot_date = $row['allot_date'];
                                            $sub_date = $row['sub_date'];
                                            ?>
                                    <form method="POST" action="manage_activity.php" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <legend id="custom-title"
                                                        style="background:#f1f2f3; text-align:center;border-radius:5px;">
                                                        Modify Activity
                                                    </legend>
                                                </div>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Activity ID:</label>
                                                    <input type="text" name="act_id" value="<?php echo $act_id; ?>"
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
                                                <div class="form-group">
                                                    <label>File In PDF:</label>
                                                    <input type="file" name="file"
                                                        accept="application/pdf,application/msword"
                                                        class=" form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Link:</label>
                                                    <input type="text" name="link" class=" form-control"
                                                        value="<?php echo $link; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Type:</label>
                                                    <input type="text" name="title" class="form-control"
                                                        value="<?php echo $title ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Allotted Date:</label>
                                                    <input type="date" name="allot_date" class="form-control"
                                                        value="<?php echo $allot_date ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Submission Date:</label>
                                                    <input type="date" name="sub_date" class="form-control"
                                                        value="<?php echo $sub_date ?>" required>
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
                                    <?php   }?>
                                    <?php
                                    if(isset($_GET['upload']))
                                    {
                                        $crs_id = $_GET['crs_id'];
                                        $sec_id = $_GET['sec_id'];
                                    ?>
                                    <form method="POST" action="manage_activity.php" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <legend id="custom-title"
                                                        style="background:#f1f2f3; text-align:center;border-radius:5px;">
                                                        Upload New Activity
                                                    </legend>
                                                </div>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Activity ID:</label>
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
                                                <div class="form-group">
                                                    <label>File In PDF:</label>
                                                    <input type="file" name="file"
                                                        accept="application/pdf,application/msword" class="form-control"
                                                        value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    Link<input type="text" name="link" class=" form-control" value=""
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Type:</label>
                                                    <input type="text" name="title" placeholder="project or assignment"
                                                        class="form-control" value="" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Allotted Date:</label>
                                                    <input type="date" name="allot_date" class="form-control" value=""
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Submission Date:</label>
                                                    <input type="date" name="sub_date" class="form-control" value=""
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <div class="text-center">
                                                        <button name="assign" type="submit"
                                                            class="btn btn-primary">Assign</button>
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