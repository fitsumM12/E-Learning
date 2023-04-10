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
                            <div class="row">
                                <!-- menu for managing the student -->
                                <div class="col-md-3 col-sm-3 manage-student-menu">
                                    <?php echo"<a class='custom-menu'href='manage_student.php?View='>STUDENT LIST </a>";?></a>
                                </div>
                                <div class="col-md-4 col-sm-4 manage-student-menu">
                                    <?php echo"<a class='custom-menu' href='manage_student.php?Attendance='>ADD TO ATTENDANCE</a>";?></a>
                                </div>
                                <div class="col-md-3 col-sm-3 manage-student-menu">
                                    <?php echo"<a class='custom-menu' href='manage_student.php?Mark='>ADD TO GRADING </a>";?></a>
                                </div>
                                <!-- end of the menu -->
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <!-- VIEW STUDENT LIST -->
                                    <?php
                                    if(isset($_GET['view2']) && isset($_GET['search_section']))
                                    {?>

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead id="custom-edit">
                                                <tr>
                                                    <th></th>
                                                    <th>Student ID</th>
                                                    <th>Student Name</th>
                                                    <th>Action</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sec_id = $_GET['sec_id'];
                                                $sql = "select * from student_detail where sec_id = $sec_id";
                                                $result = $conn->query($sql);
                                                 while($rows = $result->fetch_assoc())
                                                {
                                                $std_id = $rows['std_id'];
                                                $std_name = $rows['std_name'];
                                                ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $std_id ?></td>
                                                    <td><?php echo $std_name ?></td>
                                                    <td>
                                                        <div class="text-center">
                                                            <?php echo"<a href='manage_student.php?View=&readmore=&std_id=$std_id'><button type='button'
                                                                class='btn btn-primary'>Readmore</button> </a>";?></a>


                                                        </div>

                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <?php } ?>
                                    <?php if(isset($_GET['readmore'])){
                                    $std_id = $_GET['std_id'];
                                    $sql = "SELECT * from student_detail where std_id='$std_id'";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    ?>
                                    <div style="border:0.5px solid; border-radius:5px; padding:5px;">
                                        <div class="form-group">
                                            <div class="text-center">Student Detail</div>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <pre>Student ID:    <i><?php echo $row['std_id']; ?></i></pre>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <pre>Student Name:    <i><?php echo $row['std_name']; ?></i></pre>
                                            </label>

                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <pre>Student Email:    <i><?php echo $row['email']; ?></i></pre>
                                            </label>

                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <pre>Contact:    <i><?php echo $row['contact']; ?></i></pre>
                                            </label>

                                        </div>
                                    </div>
                                    <?php
                                    } ?>
                                    <!-- ADD TO ATTENDANCE  -->

                                    <?php
                                    if(isset($_GET['attendance2'])&&isset($_GET['search_section']))
                                    {?>
                                    <?php
                                    $sec_id = $_GET['sec_id'];
                                    $crs_id = $_SESSION['crs_id'];
                                    $row_from_att = $manage_std->getStdFromAttendance($crs_id, $sec_id,$conn);
                                    $row_from_std = $manage_std->getStdFromStudent($sec_id,$conn);
                                    $flag = 0;
                                    if(count($row_from_att)!=count($row_from_std))
                                    { ?>
                                    <div class="table-responsive">
                                        <form action="add_to_attendance.php" method="post">
                                            <table class="table table-hover">
                                                <thead id="custom-edit">
                                                    <tr>
                                                        <th></th>
                                                        <th>Student ID</th>
                                                        <!-- <th>Student Name</th> -->
                                                        <th><input type="checkbox"
                                                                onclick="toggle(this);" />&nbsp;Select
                                                            All
                                                        </th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    for($i = 0; $i < count($row_from_std);$i++)
                                                    {
                                                    for($j = 0; $j < count($row_from_att);$j++)
                                                    {
                                                        if($row_from_att[$j] == $row_from_std[$i])
                                                        {
                                                        $flag=0;
                                                        break;
                                                        }
                                                        else
                                                        {
                                                        $flag=1;
                                                        }
                                                    }
                                                    if($flag==1)
                                                    {
                                                        $std_id = $row_from_std[$i];
                                                        // $std_name =$row_from_std[$i+1];
                                                        ?>
                                                    <tr>
                                                        <th></th>
                                                        <td><?php echo $std_id ?></td>

                                                        <td>
                                                            <input type="checkbox" name="attend[]"
                                                                value="<?php echo $std_id ?>">
                                                        </td>
                                                        <td><input type="text" name="crs_id"
                                                                value="<?php echo $crs_id  ?>" hidden></td>
                                                        <td><input type="text" name="sec_id"
                                                                value="<?php echo $sec_id  ?>" hidden></td>
                                                    </tr>
                                                    <?php } 
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <button name="submit" type="submit" class="btn btn-primary">Add</button>
                                            </div>
                                        </form>
                                    </div>

                                    <?php } 
                                
                               
                                    else
                                    { echo "All student are added to the attendance Section";
                                    } 
                                    if(isset($_GET['message'])){
                                        $message = $_GET['message'];
                                        echo"<script>alert($message);</script>";
                                        }
                                
                                    }?>
                                    <!-- ADD TO GRADING -->
                                    <?php  
                                     if(isset($_GET['mark2'])&&isset($_GET['search_section']))
                                        {
                                    $sec_id = $_GET['sec_id'];
                                    $crs_id = $_SESSION['crs_id'];
                                    $row_from_mrk = $manage_std->getStdFromMark($crs_id, $sec_id,$conn);
                                    $row_from_std = $manage_std->getStdFromStudent($sec_id,$conn);
                                    $flag = 0;
                                    // $check = 0;
                                    if(count($row_from_mrk)!=count($row_from_std))
                                    {
                                       ?>
                                    <div class="table-responsive">
                                        <form action="add_to_grading.php" method="post">


                                            <table class="table table-hover">
                                                <thead id="custom-edit">
                                                    <tr>
                                                        <th></th>
                                                        <th>Student ID</th>
                                                        <th><input type="checkbox"
                                                                onclick="toggle(this);" />&nbsp;Select
                                                            All
                                                        </th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    for($i = 0; $i < count($row_from_std);$i++)
                                                    {
                                                    for($j = 0; $j < count($row_from_mrk);$j++)
                                                    {
                                                        if($row_from_mrk[$j] == $row_from_std[$i])
                                                        {
                                                        // $check++;
                                                        $flag=0;
                                                        break;
                                                        }
                                                        else
                                                        {
                                                        $flag=1;
                                                        // $check;
                                                        }
                                                    }
                                                    if($flag==1)
                                                    {
                                                        $std_id = $row_from_std[$i];
                                                        ?>
                                                    <tr>
                                                        <th></th>
                                                        <td><?php echo $std_id ?></td>

                                                        <td>
                                                            <input type="checkbox" name="mark[]"
                                                                value="<?php echo $std_id ?>">
                                                        </td>
                                                        <td><input type="text" name="crs_id"
                                                                value="<?php echo $crs_id  ?>" hidden></td>
                                                        <td><input type="text" name="sec_id"
                                                                value="<?php echo $sec_id  ?>" hidden></td>
                                                    </tr>
                                                    <?php } 
                                                        }
                                                        ?>
                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <button name="submit" type="submit" class="btn btn-primary">Add</button>
                                            </div>

                                        </form>
                                    </div>
                                    <?php
                                    
                                                        }
                                                        else{
                                                            echo "All Student Are Added To Grading Section";
                                                       
                                                        }
                                                
                                                    if(isset($_GET['message'])){
                                                        $message = $_GET['message'];
                                                        echo"<script>alert($message);</script>";
                                                        }
                                                    
                                                        }

                                                        ?>

                                </div>
                                <!--selection Options  -->
                                <!-- view -->
                                <?php
                                if(isset($_GET['View']) || isset($_GET['view2'])&&isset($_GET['search_section'])){?>
                                <div class="col-md-4">
                                    <form name="form1">
                                        <select id="custom-course" name="select" size=="1" class=" form-control
                                            form-control-lg" onchange="selectedOption(this.form);">
                                            <option><a href="#" selected="true">Select Course</a></option>
                                            <?php
                                            $result = $operation->Mycourse($conn);
                                            while($temp = $result->fetch_assoc()){
                                                $crs_id = $temp['crs_id'];
                                                $sql2 = "SELECT crs_name from course_detail where crs_id = '$crs_id' limit 1";
                                                $result2= $conn->query($sql2);
                                                $crs_name = implode(" ", $result2->fetch_assoc());
                                                
                                        ?>
                                            <option
                                                value="<?php echo "manage_student.php?View=&search_course=&crs_id=$crs_id";?>">
                                                <?php echo $crs_name;?>
                                            </option>
                                            <?php
                                        }?>
                                        </select>
                                    </form>
                                    <br>

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
                                                value="<?php echo "manage_student.php?view2&search_section=&sec_id=$sec_id";?>">
                                                <?php echo $sec_id;?>
                                            </option>
                                            <?php }} ?>
                                        </select>
                                    </form>
                                </div>
                                <?php }?>
                                <?php
                                if(isset($_GET['Mark']) || isset($_GET['mark2'])&&isset($_GET['search_section'])){?>
                                <!-- Mark -->
                                <div class="col-md-4">
                                    <form name="form1">
                                        <select id="custom-course" name="select" size=="1" class=" form-control
                                            form-control-lg" onchange="selectedOption(this.form);">
                                            <option><a href="#" selected="true">Select Course</a></option>
                                            <?php
                                            $result = $operation->Mycourse($conn);
                                            while($temp = $result->fetch_assoc()){
                                                $crs_id = $temp['crs_id'];
                                                $sql2 = "SELECT crs_name from course_detail where crs_id = '$crs_id' limit 1";
                                                $result2= $conn->query($sql2);
                                                $crs_name = implode(" ", $result2->fetch_assoc());
                                                
                                        ?>
                                            <option
                                                value="<?php echo "manage_student.php?Mark=&search_course=&crs_id=$crs_id";?>">
                                                <?php echo $crs_name;?>
                                            </option>
                                            <?php
                                        }?>
                                        </select>
                                    </form>
                                    <br>

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
                                                value="<?php echo "manage_student.php?mark2&search_section=&sec_id=$sec_id";?>">
                                                <?php echo $sec_id;?>
                                            </option>
                                            <?php }} ?>
                                        </select>
                                    </form>
                                </div>
                                <?php }?>
                                <?php
                                if(isset($_GET['Attendance'])|| isset($_GET['attendance2'])&&isset($_GET['search_section'])){?>
                                <!-- attendance -->
                                <div class="col-md-4">
                                    <form name="form1">
                                        <select id="custom-course" name="select" size=="1" class=" form-control
                                            form-control-lg" onchange="selectedOption(this.form);">
                                            <option><a href="#" selected="true">Select Course</a></option>
                                            <?php
                                            $result = $operation->Mycourse($conn);
                                            while($temp = $result->fetch_assoc()){
                                                $crs_id = $temp['crs_id'];
                                                $sql2 = "SELECT crs_name from course_detail where crs_id = '$crs_id' limit 1";
                                                $result2= $conn->query($sql2);
                                                $crs_name = implode(" ", $result2->fetch_assoc());
                                                
                                        ?>
                                            <option
                                                value="<?php echo "manage_student.php?Attendance=&search_course=&crs_id=$crs_id";?>">
                                                <?php echo $crs_name;?>
                                            </option>
                                            <?php
                                        }?>
                                        </select>
                                    </form>
                                    <br>

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
                                                value="<?php echo "manage_student.php?attendance2&search_section=&sec_id=$sec_id";?>">
                                                <?php echo $sec_id;?>
                                            </option>
                                            <?php }} ?>
                                        </select>
                                    </form>
                                </div>
                                <?php }?>

                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- /.row -->

        </div>
    </div><!-- /# column -->
</div>
<!--  /Traffic -->
<!-- /.content -->
<div class="clearfix"></div>
<!-- Footer -->
<?php
        require_once './partials/footer.php'
      ?>