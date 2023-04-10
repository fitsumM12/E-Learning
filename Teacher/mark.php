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
                                            <option value="<?php echo "mark.php?search_course=&crs_id=$crs_id";?>">
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
                                            <option value="<?php echo "mark.php?search_section=&sec_id=$sec_id";?>">
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
                                    // fetch alloctaed student for the section  from 
                                    $sql = "SELECT * from student_mark mrk inner join student_detail sa on mrk.std_id=sa.std_id where mrk.crs_id ='$crs_id' and sa.sec_id = '$sec_id'";
                                    $result = $conn->query($sql);
                                    ?>
                                    <!-- view of the mark details for specific section -->
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead id="custom-edit">
                                                    <tr>
                                                        <th><i>std ID</i></th>
                                                        <th><i>course ID</i></th>
                                                        <th><i>mid exam</i></th>
                                                        <th><i>final exam</i></th>
                                                        <th><i>class assessement</i></th>
                                                        <th><i>Total</i></th>
                                                        <th><i>Action</i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    while($rows = $result->fetch_assoc()){
                                                        $std_id = $rows['std_id'];
                                                        $crs_id = $rows['crs_id'];
                                                        $mid_exam = $rows['mid_exam'];
                                                        $final_exam = $rows['final_exam'];
                                                        $class_asses = $rows['class_asses'];
                                                        ?>
                                                    <tr>
                                                        <td><?php echo $std_id  ?></td>
                                                        <td><?php echo $crs_id ?></td>
                                                        <td><?php echo $mid_exam  ?></td>
                                                        <td><?php echo $final_exam  ?></td>
                                                        <td><?php echo $class_asses ?></td>
                                                        <td><?php echo (float)$class_asses+(float)$mid_exam+(float)$final_exam; ?>
                                                        </td>
                                                        <td>
                                                            <div class="text-center">
                                                                <button type="button" class="btn btn-primary">
                                                                    <i><?php echo "<a style='color:black;'href='mark.php?Edit=true&std_id=$std_id&sec_id=$sec_id&crs_id=$crs_id&mid_exam=$mid_exam&final_exam=$final_exam&class_asses=$class_asses'> Edit</a>" ?></i></button>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                    <?php
                                                     }?>
                                                    <?php 
                                     if(isset($_GET['message'])){
                                        $message = $_GET['message'];
                                        echo"<script>alert($message);</script>";
                                        }
                                
                                    
                                    ?>
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
                                        if(isset($_GET['Edit'])){
                                            $std_id = $_GET['std_id'];
                                            $crs_id = $_GET['crs_id'];
                                            $sec_id = $_GET['sec_id'];
                                            $mid_exam = $_GET['mid_exam'];
                                            $final_exam = $_GET['final_exam'];
                                            $class_asses =$_GET['class_asses'];
                                            ?>
                                    <form method="POST" action="manage_mark.php" enctpe="multipart/form-data">

                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <legend id="custom-title"
                                                        style="background:#f1f2f3; text-align:center;border-radius:5px;">
                                                        Editing
                                                        Student
                                                        Mark
                                                    </legend>
                                                </div>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Student ID:</label>
                                                    <input type="text" name="std_id" value="<?php echo $std_id; ?>"
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
                                                    <label>Mid Exam:</label>
                                                    <input type="text" name="mid_exam" class="form-control"
                                                        value="<?php echo $mid_exam ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Final Exam:</label>
                                                    <input type="text" name="final_exam" class="form-control"
                                                        value="<?php echo $final_exam ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Class Assessment:</label>
                                                    <input type="text" name="class_asses" class="form-control"
                                                        value="<?php echo $class_asses ?>">
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

                                    <?php
                                        if(isset($_POST['modify']))
                                        {
                                            echo $mark->modifyMark($conn);
                                        }
                                        }?>
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