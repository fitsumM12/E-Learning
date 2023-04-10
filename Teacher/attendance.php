<?php 
    require_once './partials/header.php';
?>
<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">

        <!--  Traffic  -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12" id="custom-head">
                            <!-- select options -->
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
                                                value="<?php echo "attendance.php?search_course=&crs_id=$crs_id";?>">
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
                                                value="<?php echo "attendance.php?search_section=&sec_id=$sec_id";?>">
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
                                    $fac_id = $_SESSION['fac_id'];
                                    $sec_id = $_GET['sec_id'];
                                    $crs_id = $_SESSION['crs_id'];
                                    $sql = "select * from student_attendance inner join student_detail on student_detail.std_id = student_attendance.std_id where student_attendance.crs_id = '$crs_id' and student_detail.sec_id='$sec_id'";
                                    $result = $conn->query($sql);
                                    // $result =$
                                    ?>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <form method="POST" action="manage_attendance.php">
                                                <table class="table table-hover">
                                                    <thead id="custom-edit">
                                                        <tr>
                                                            <th><i>ID</i></th>
                                                            <th><i>Name</i></th>
                                                            <th><i>Total</i></th>
                                                            <th><i>Today</i></th>
                                                            <th><i>Present</i> </th>
                                                            <th><i>Absent</i></th>
                                                            <th><i>Percentage</i></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th><i>Action</i></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        while($rows = $result->fetch_assoc()){
                                                            $class_absent = $rows['class_absent'];
                                                            $class_present= $rows['class_present'];
                                                            $class_provided= $rows['class_provided'];
                                                            $std_id = $rows['std_id'];
                                                            $percentage = $rows['percentage'];
                                                            ?>
                                                        <tr>
                                                            <td><?php echo $rows['std_id']  ?></td>
                                                            <td><?php echo $attendance->getStdName($rows['std_id'],$conn) ?>
                                                            </td>
                                                            <td><?php echo $rows['class_provided']  ?></td>
                                                            <td><input type="checkbox" name="attend[]"
                                                                    value="<?php echo $rows['std_id']  ?>"></td>
                                                            <td><?php echo $rows['class_present']  ?></td>
                                                            <td><?php echo $rows['class_absent']  ?></td>
                                                            <td><?php echo $rows['percentage']  ?></td>
                                                            <td><input type="text" name="crs_id"
                                                                    value="<?php echo $crs_id  ?>" hidden></td>
                                                            <td><input type="text" name="sec_id"
                                                                    value="<?php echo $sec_id  ?>" hidden></td>
                                                            <td>
                                                                <div class="text-center">
                                                                    <?php echo"<a href='attendance.php?Modify=&std_id=$std_id&crs_id=$crs_id&sec_id=$sec_id&class_present=$class_present&class_absent=$class_absent&class_provided=$class_provided' style='color:black; padding:5px; border-radius:5px;'><button type='button'
                                                                class='btn btn-success'>Edit</button> </a>";?></a>
                                                                </div>
                                                            </td>
                                                            <th><?php echo "" ?>
                                                            </th>
                                                        </tr>
                                                        <?php
                                                        }?>
                                                    </tbody>
                                                </table>
                                                <div class="text-right">
                                                    <button name="submit" type="submit" class="btn btn-primary">Save
                                                        Attendance
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php }
                                    ?>
                                    <?php 
                                     if(isset($_GET['message'])){
                                        $message = $_GET['message'];
                                        echo"<script>alert($message);</script>";
                                        }
                                
                                    
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                if(isset($_GET['Modify'])){
                                ?>
                                <!-- Beginning of Editing form section -->
                                <form method="GET" action="manage_attendance.php" enctype=" multipart/form-data"
                                    id="custom-edit">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <legend id="custom-title"
                                                    style="background:#f1f2f3; text-align:center;border-radius:5px;">
                                                    Editing
                                                    Student
                                                    Attendance
                                                </legend>
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>student ID:</label>
                                                <input type="text" name="std_id" value="<?php echo $_GET['std_id']?>"
                                                    class="form-control" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Course ID:</label>
                                                <input type="text" name="crs_id" class="form-control"
                                                    value="<?php echo $_GET['crs_id'] ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Provided class:</label>
                                                <input type="text" name="class_provided" class="form-control"
                                                    value="<?php echo $_GET['class_provided'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Section:</label>
                                                <input type="text" name="sec_id" class="form-control"
                                                    value="<?php echo $_GET['sec_id'] ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>class present:</label>
                                                <input type="text" name="class_present" class="form-control"
                                                    value="<?php echo $_GET['class_present'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Class absent:</label>
                                                <input type="text" name="class_absent" class="form-control"
                                                    value="<?php echo $_GET['class_absent'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <div class="text-right">
                                                    <button name="Edit" type="submit" class=" btn btn-primary">Update
                                                        Attendance
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- Ending of Editing form section -->
                                <?php }?>
                            </div>
                        </div>
                        <div class=" col-md-2">
                        </div>
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